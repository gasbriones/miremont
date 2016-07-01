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


    var page = $.getURLParam("page");
    if(page != null && page != '' ){
        setTimeout(function () {
            $('#'+page).animatescroll({scrollSpeed:2000,easing:'easeInOutBack',padding:40});
        },1000)

        console.log(page);
    }

    $('.menu li a').click(function () {
        var section = $(this).attr('href');
        $(section).animatescroll({scrollSpeed:2000,easing:'easeInOutBack',padding:40});
        return false;
    });

    $('.bxslider').bxSlider({
        captions: false,
        controls:false,
        auto:true,
        pager:false
    });


    $("#header").sticky({topSpacing:0});
    $('#header').on('sticky-start', function() { console.log("Started"); });

});
