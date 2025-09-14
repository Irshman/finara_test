(function ($) {
    $(document).ready(() => {
        if ($('header').hasClass('header')) {
            const burger = $('.header__burger');
            const navigation = $('.header__menu');
            const body = $('body');
            const currentUrl = window.location.href;

            initHamburger(burger, navigation, body);
            preventCurrentUrlNavigation(currentUrl);
            preventSubMenuClickPropagation();
        }
    });

    const initHamburger = (burger, navigation, body) => {
        burger.click(() => {
            burger.toggleClass("active");
            navigation.toggleClass("active");
            body.toggleClass('active');
        });
    };

    const preventCurrentUrlNavigation = (currentUrl) => {
        $('.menu-item a').click((event) => {
            const linkUrl = $(event.currentTarget).attr('href');
            if (linkUrl === currentUrl) {
                event.preventDefault();
            }
        });
    };

    const preventSubMenuClickPropagation = () => {
        $('.menu-item-has-children > .sub-menu').click((event) => {
            event.stopPropagation();
        });
    };
})(jQuery);
