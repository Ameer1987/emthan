jQuery(function ($) {
    $('li').on('click', function (event) {
        event.stopPropagation();
        $(this).parent().children().find('ul, li, a').hide();
        $(this).parent().children().children('a').show();
        $(this).show().children().show().children().show().children('a').show();
    })

    $(window).load(function () {
        $('.tree').find('ul, li, a').hide();
        $('.tree').show().children().show().children().show()
                .children().show().children().show().children('a').show();
    })
})