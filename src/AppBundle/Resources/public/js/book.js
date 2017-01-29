jQuery(function ($) {
    $('.book_properties').on('click', function (event) {
        $('<div id="loading-overlay"><img src="/images/preloader.gif" />').prependTo($('body')).show();
        var book_id = $(this).data('book-id');
        $.get('/book/view_properties/' + book_id, null, function (data) {
            $('#loading-overlay').remove();
            $('#ajax_container').html(data);
        });
    })

    $('.book_units').on('click', function (event) {
        $('<div id="loading-overlay"><img src="/images/preloader.gif" />').prependTo($('body')).show();
        var book_id = $(this).data('book-id');
        $.get('/book/view_units/' + book_id, null, function (data) {
            $('#loading-overlay').remove();
            $('#ajax_container').html(data);
        });
    })

    $(window).load(function () {

    })
})