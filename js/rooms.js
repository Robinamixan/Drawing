$(function () {

    $('#field_draw').hide();

    $('.rooms').click(function (evt) {
        $(arguments).get(0).preventDefault();

        if ($('#user_name').text() !== 'undefined user '){
            $('#field_draw').show();
            $('#title_room_panel').show();
            var link = $(evt.target);
            resetLinks();
            link.removeClass('no_active');
            link.addClass('active');
            $('#title_room').text(link.text());
            change_title_canvas(link.text());
            reload_iframe();
        }

    });

    $('#add_room').click(function (evt) {
        $(arguments).get(0).preventDefault();
        $('#create_form').show();
        $('#room_name').focus();
        $('#add_room').hide();
    });

    $('#delete_room_btn').click(function (evt) {
        $(arguments).get(0).preventDefault();
        $.get('../Delete_new_file.php?room_name=' + $('#title_room').text());
        location.reload();
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
            change_brush_color($("#custom").spectrum("get"));
        });
    }
    function change_brush_color(color) {
        var h = $('#field_draw').contents().find('#color_brush');
        h.text(color.toHexString());
    }

    $("#custom").spectrum({
        color: "#f00",
        change: function(color) {
            change_brush_color(color);
         }
    });
});