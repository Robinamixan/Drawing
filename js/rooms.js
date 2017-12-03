$(function () {

    $('#field_draw').hide();

    $('.rooms').click(function (evt) {
        $('#field_draw').show();
        $(arguments).get(0).preventDefault();
        var link = $(evt.target);
        resetLinks();
        link.removeClass('no_active');
        link.addClass('active');
        change_title_canvas(link.text());
        reload_iframe();
    });

    $('#add_room').click(function (evt) {
        $(arguments).get(0).preventDefault();
        $('#create_form').show();
        $('#room_name').focus();
        $('#add_room').hide();
    });

    $('#create_room').click(function (evt) {
        $(arguments).get(0).preventDefault();
        $('#create_form').hide();
        $('#add_room').show();
    });

    function resetLinks() {
        var link = $('.rooms.active');
        link.removeClass('active');
        link.addClass('no_active');
    }

    function reload_iframe() {
        var ifr = $('#field_draw');
        ifr.attr('src', function (i,val) {return val});
    }

    function change_title_canvas(title) {
        $('#field_draw').load(function () {
            var d = $(this).contents().find('title');
            d.text(title);
        })
    }
});