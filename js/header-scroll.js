jQuery(document).ready(function($) {
    $(window).on('scroll', function() {
        var header = $('.header2');
        if ($(this).scrollTop() > 300) {
            header.addClass('opaque');
        } else {
            header.removeClass('opaque');
        }
    });
});
