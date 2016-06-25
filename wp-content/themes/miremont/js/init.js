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
});