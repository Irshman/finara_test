<?php

use Thm\Finara\CoreTheme;

require_once __DIR__ . '/vendor/autoload.php';

if (! defined('THEME_VERSION')) {
    define('THEME_VERSION', '1.0.0');
}

add_action('after_setup_theme', function () {
    if (class_exists('Kirki')) {
        require_once get_template_directory() . '/config/customizer.php';
    }
});

CoreTheme::initHooks();
