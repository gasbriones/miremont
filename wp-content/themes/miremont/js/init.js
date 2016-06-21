$(document).ready(function () {
    $('.fancybox').fancybox({
        padding:'60px',
        helpers: {
            overlay: {
                locked: false
            },
            title: {
                type: 'inside'
            }
        },
        beforeLoad: function () {
            this.title = $(this.element).attr('data-caption');
        }
    });

    $('#news').submit(function (e) {
        e.preventDefault();

        var $self = $(this);

        $.ajax({
            url: $self.attr('action'),
            data: $self.serialize(),
            success: function () {
                $self.get(0).reset();
                alert('Gracias por escribirnos! Le responderemos a la brevedad...');
            }
        });
    });


    $(window).scroll(function () {
        if ($(this).scrollTop() > 800) {
            $('#back-top').fadeIn();
        } else {
            $('#back-top').fadeOut();
        }
    });

    $('#back-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
});