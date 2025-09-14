<?php
use ESC\Luna\ThemeFunctions;

new \Kirki\Panel(
    'theme_settings',
    [
        'priority'    => 10,
        'title'       => esc_html__('Theme Settings', 'kirki'),
    ]
);

new \Kirki\Section(
    'global_settings',
    [
        'title'       => esc_html__('Global Settings', 'kirki'),
        'description' => esc_html__('Globals Setting', 'kirki'),
        'panel'       => 'theme_settings',
        'priority'    => 160,
    ]
);


new \Kirki\Field\Textarea(
    [
        'settings' => 'theme_fonts_link',
        'label'    => esc_html__('Fonts Link', 'kirki'),
        'section'  => 'global_settings',
        'tab'      => 'fonts',
        'default'  => 'https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&display=swap',
        'priority' => 10,
    ]
);

new \Kirki\Field\Text(
    [
        'settings' => 'theme_fonts_heading',
        'label'    => esc_html__('Heading Font', 'kirki'),
        'section'  => 'global_settings',
        'default'  => esc_html__("Nunito", 'kirki'),
        'priority' => 10,
        'output'   => [
            [
                'element'  => ':root',
                'property' => '--font-heading-family',
            ],
        ],
    ]
);

new \Kirki\Field\Text(
    [
        'settings' => 'theme_fonts_content',
        'label'    => esc_html__('Content Font', 'kirki'),
        'section'  => 'global_settings',
        'default'  => esc_html__("Nunito", 'kirki'),
        'priority' => 10,
        'output'   => [
            [
                'element'  => ':root',
                'property' => '--font-content-family',
            ],
        ],
    ]
);

new \Kirki\Field\Text(
    [
        'settings' => 'theme_phone',
        'label'    => esc_html__('Header Phone', 'kirki'),
        'section'  => 'global_settings',
        'default'  => esc_html__("+45 44 40 40 63", 'kirki'),
        'priority' => 10,
    ]
);