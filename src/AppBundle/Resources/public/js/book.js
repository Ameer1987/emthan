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

    $('.book_contents').on('click', function (event) {
        $('<div id="loading-overlay"><img src="/images/preloader.gif" />').prependTo($('body')).show();
        var book_id = $(this).data('book-id');
        $.get('/book/view_contents/' + book_id, null, function (data) {
            $('#loading-overlay').remove();
            $('#ajax_container').html(data);
        });
    })

    $('.add-book').on('click', function (event) {
        $('<div id="loading-overlay"><img src="/images/preloader.gif" />').prependTo($('body')).show();
        var category_id = $(this).data('category-id');
        $.get('/category/add_book/' + category_id, null, function (data) {
            $('#loading-overlay').remove();
            $('#ajax_container').html(data);
        });
    })

    $('#ajax_container').on('click', '.edit-book', function () {
        $('<div id="loading-overlay"><img src="/images/preloader.gif" />').prependTo($('body')).show();
        var book_id = $(this).data('book-id');
        $.get('/book/edit_properties/' + book_id, null, function (data) {
            $('#loading-overlay').remove();
            $('#ajax_container').html(data);
        });
    })

    $(window).load(function () {

    })
})