(function ($) {

    'use strict';

    $(".menu-items li a").filter(function () {
        return location.href.match($(this).attr("href"))
    }).parent().find('span.icon-thumbnail').addClass("bg-success");

    $(".btnpin").on( "click", function() {
        $(this).parent().parent().parent().parent().toggleClass('slim');
        $(this).find('.hicon').toggleClass('fa-circle-arrow-right fa-circle-arrow-left');
        $('.page-container ').toggleClass('page-smp');
        $('.page-container ').toggleClass('page-smp');

        $('.page_content').find('.white-desk').toggleClass('white-desk white-desk-short');
    });

    $(document).on('click', '.sidebar-menu a', function (e) {

        if ($(this).parent().children('.sub-menu') === false) {
            return;
        }
        var el = $(this);
        var parent = $(this).parent().parent();
        var li = $(this).parent();
        var sub = $(this).parent().children('.sub-menu');

        if (li.hasClass("open active")) {
            el.children('.arrow').removeClass("open active");
            sub.slideUp(200, function () {
                li.removeClass("open active");
            });

        } else {
            parent.children('li.open').children('.sub-menu').slideUp(200);
            parent.children('li.open').children('a').children('.arrow').removeClass('open active');
            parent.children('li.open').removeClass("open active");
            el.children('.arrow').addClass("open active");
            sub.slideDown(200, function () {
                li.addClass("open active");

            });
        }

    });
    
    $('.sidebar-slide-toggle').on('click touchend', function (e) {
        e.preventDefault();
        $(this).toggleClass('active');
        var el = $(this).attr('data-pages-toggle');
        if (el != null) {
            $(el).toggleClass('show');
        }
    });

    $(document).on('click touchend', '.toggle-sidebar', function (e) {
        $('body').find(".page-sidebar").toggle();
        e.preventDefault();
    });
    
    //$(":input").inputmask();

})(jQuery);