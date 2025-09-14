<header class="header">
    <div class="header__container container">
        <div class="header__content">
            <div class="header__logo"><?php the_custom_logo(); ?></div>

            <div class="header__menu menu-h">
                <?php
                    wp_nav_menu([
                        'theme_location' => 'header_menu',
                        'container' => false,
                    ]);
                ?>
            </div>


            <div class="header__wrap">
                <div class="header__phone">
                    <?php echo Kirki::get_option("theme_phone") ?>
                </div>

                <button class="header__button btn">Få op til 3 tilbud</button>

                <div class="header__burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</header>

