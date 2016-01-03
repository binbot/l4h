$(document).ready(function() {
    window.addEventListener('scroll', function(e) {
        var distanceY = window.pageYOffset || document.documentElement
            .scrollTop,
            trigger = 150;
        if (distanceY > trigger) {
            if (!$('#nav').hasClass('pulldown')) {
                $('#nav').addClass('pulldown');
            }
        } else {
            if ($('#nav').hasClass('pulldown')) {
                $('#nav').removeClass('pulldown');
            }
        }
    });
    $('.staff-avatar').each(function() {
        var random = Math.random() * 10 - 5;
        $(this).css('transform', 'rotate(' + random + 'deg)');
    }, function() {
        $(this).css('transform', 'none');
    });
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname
            .replace(/^\//, '') || location.hostname == this.hostname
        ) {
            var link = $(this.hash);
            link = link.length ? target : $('[name=' + this.hash
                .slice(1) + ']');
            if (link.length) {
                $('html, body').animate({
                    scrollTop: link.offset().top
                }, 750);
                return false;
            }
        }
    });
});