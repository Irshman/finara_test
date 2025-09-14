<?php

namespace Thm\Finara;

use Thm\Finara\Modules\GoogleFontsModule;
use Thm\Finara\Modules\WpRegisterModule;

class CoreTheme
{
    public static function initHooks(): void
    {
        WpRegisterModule::registerHooks();
        GoogleFontsModule::registerHooks();
    }
}
