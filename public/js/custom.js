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


})(jQuery);