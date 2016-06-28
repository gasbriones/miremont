$(document).ready(function () {
    $(".fancybox").click(function () {
        var img = $(this).data('images')

        var array = $.map(img, function (value) {
            return [value];
        });

        $.fancybox.open(array, {
            nextEffect : 'none',
            prevEffect : 'none',
            helpers: {
                overlay: {
                    locked: false
                },
                title: {
                    type: 'inside'
                }
            }
        });
        return false;
    });

    $('.menu li a').click(function () {
        scroll ($(this).attr('href'));
        return false;
    })
});

function scroll (anchor){
    $('html, body').animate({
        'scrollTop':   $(anchor).offset().top
    }, 1000);
}