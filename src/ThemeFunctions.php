<?php

namespace Thm\Finara;

use ariColor;
use WP_Query;

class ThemeFunctions
{
    public static function hexToRGB($color): string
    {
        if (!is_string($color)) {
            return '0, 0, 0';
        }

        if (!class_exists(ariColor::class)) {
            return $color;
        }

        $ari = ariColor::newColor($color);

        if (isset($ari->red, $ari->green, $ari->blue)) {
            return "{$ari->red}, {$ari->green}, {$ari->blue}";
        }

        return '0, 0, 0';
    }
    
    public static function getInlineSvg($name): false|string
    {
        if ($name) {
            $file_path = get_template_directory() . '/assets/icons/' . $name . '.svg';

            if (file_exists($file_path)) {
                return file_get_contents($file_path);
            }
        }
        return '';
    }
}
