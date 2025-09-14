(function ($) {
    window.handleSearch = function () {
        $(".search input").on("input", function () {
            const $input = $(this);
            const listId = $input.closest(".search").data("list-id");
            const $list = $(".list[data-list-id='" + listId + "']");
            const $options = $list.find("label");

            const searchValue = $input.val().toLowerCase();

            $options.each(function () {
                const optionText = $(this).text().toLowerCase();
                const isVisible = optionText.includes(searchValue);
                $(this).parent().toggle(isVisible);
            });
        });
    }

    window.resetSearch = function (inputSelector, listSelector) {
        const $input = $(inputSelector);
        const $options = $(listSelector).find('label');

        $options.each(function () {
            $(this).parent().show();
        });
        $input.val("");
    };
})(jQuery);
