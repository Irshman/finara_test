<?php

namespace Thm\Finara\Modules;

class WpRegisterModule
{
    public static function registerHooks(): void
    {
        add_action('wp_enqueue_scripts', [__CLASS__, 'enqueueScripts']);

        add_action('after_setup_theme', [__CLASS__, 'registerThemeSupports']);

        add_action('widgets_init', [__CLASS__, 'registerSidebars']);

        add_action('upload_mimes', [__CLASS__, 'addSvgSupport']);


        // Hide admin-menu elements
        add_action('admin_menu', [__CLASS__, 'restrictEditorAccess'], 10);
        add_action('admin_init', [__CLASS__, 'blockEditorAdminPages']);
       
        add_action('save_post', [__CLASS__, 'setParentTermForTaxonomy']);

        // Загружаем DashIcons для не авторизованыъ пользователей
        add_action('wp_enqueue_scripts', [__CLASS__, 'loadDashIcons']);
    }

    public static function enqueueScripts(): void
    {
        wp_enqueue_style(
            'finara-style',
            get_template_directory_uri() . '/style.css',
            '',
            THEME_VERSION
        );
        wp_enqueue_script('jquery');
        wp_enqueue_script(
            'finara-scripts',
            get_template_directory_uri() . '/assets/js/script.min.js',
            'jquery',
            THEME_VERSION,
            true
        );
    }

    public static function registerThemeSupports(): void
    {
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support(
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            ]
        );

        register_nav_menus([
            'header_menu' => 'Header Menu',
            'footer_menu' => 'Footer Menu',
            'header_mobile_menu' => 'Header Mobile Menu',
            'header_burger_menu' => 'Header Burger Menu',
        ]);

        add_theme_support(
            'custom-logo',
            [
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            ]
        );
    }

    public static function registerSidebars(): void
    {
        register_sidebar([
            'name' => 'Header Phone Widget',
            'id' => 'header-1',
            'description' => '1-nd place',
            'before_widget' => '<div class="phone-widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
        ]);

        register_sidebar([
            'name' => 'Footer Description Widget',
            'id' => 'footer-1',
            'description' => '1-nd place',
            'before_widget' => '<div class="footer-widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
        ]);

        register_sidebar([
            'name'          => 'Footer menu 1',
            'id'            => "footer-menu-1",
            'description'   => '',
            'class'         => '',
            'before_widget' => '<div class="menubox">',
            'after_widget'  => "</div>",
            'before_title'  => '<p class="menubox-title">',
            'after_title'   => "</p>",
        ]);

        register_sidebar([
            'name'          => 'Footer menu 2',
            'id'            => "footer-menu-2",
            'description'   => '',
            'class'         => '',
            'before_widget' => '<div class="menubox">',
            'after_widget'  => "</div>",
            'before_title'  => '<p class="menubox-title">',
            'after_title'   => "</p>",
        ]);

        register_sidebar([
            'name'          => 'Footer menu 3',
            'id'            => "footer-menu-3",
            'description'   => '',
            'class'         => '',
            'before_widget' => '<div class="menubox">',
            'after_widget'  => "</div>",
            'before_title'  => '<p class="menubox-title">',
            'after_title'   => "</p>",
        ]);
    }

    public static function addSvgSupport($allowed): array
    {
        if (!current_user_can('manage_options')) {
            return $allowed;
        }
        $allowed['svg'] = 'image/svg+xml';
        return $allowed;
    }

    public static function restrictEditorAccess(): void
    {
        if (current_user_can('editor') && !current_user_can('administrator')) {
            remove_menu_page('plugins.php');
            remove_menu_page('options-general.php');

            // Удаляем доступ к инструментам
            remove_menu_page('tools.php');

            // Удаляем доступ к внешнему виду
            remove_menu_page('themes.php');

            // Удаляем доступ к пользователям
            remove_menu_page('users.php');
        }
    }

    public static function blockEditorAdminPages(): void
    {
        if (current_user_can('editor') && !current_user_can('administrator')) {
            $restricted_pages = [
                'plugins.php',
                'options-general.php',
                'tools.php',
                'themes.php',
                'users.php',
                'edit.php?post_type=page',
                'edit-comments.php'
            ];

            $current_page = basename($_SERVER['PHP_SELF']);

            if (in_array($current_page, $restricted_pages)) {
                wp_die(__('У вас нет доступа к этой странице.'));
            }
        }
    }

    public static function setParentTermForTaxonomy($post_id): void
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        if (wp_is_post_revision($post_id)) {
            return;
        }

        $taxonomies = get_object_taxonomies(get_post_type($post_id));

        foreach ($taxonomies as $taxonomy) {
            $terms = wp_get_post_terms($post_id, $taxonomy);

            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    if ($term->parent != 0) {
                        $parent_term = get_term($term->parent, $taxonomy);

                        if ($parent_term) {
                            $existing_terms = wp_get_post_terms($post_id, $taxonomy, ['fields' => 'ids']);

                            if (!in_array($parent_term->term_id, $existing_terms)) {
                                wp_set_post_terms(
                                    $post_id,
                                    array_merge($existing_terms, [$parent_term->term_id]),
                                    $taxonomy
                                );
                            }
                        }
                    }
                }
            }
        }
    }

    public static function loadDashIcons(): void
    {
        if (!is_admin()) {
            wp_enqueue_style('dashicons');
        }
    }
}
