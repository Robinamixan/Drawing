$(function () {

    $(".waves-effect").click(function (evt) {
        $(arguments).get(0).preventDefault();
        var link = $(evt.target);
        resetLinks();
        link.removeClass("no_active");
        link.addClass("active");
        change_title_canvas(link.text());
        reload_iframe();
    });

    function resetLinks() {
        var link = $(".waves-effect.active");
        link.removeClass("active");
        link.addClass("no_active");
    }

    function reload_iframe() {
        var ifr = $("#field_draw");
        ifr.attr('src', function (i,val) {return val});
    }

    function change_title_canvas(title) {
        $("#field_draw").load(function () {
            var d = $(this).contents().find('title');
            d.text(title);
        })
    }
})