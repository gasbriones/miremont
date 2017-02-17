$(document).ready(function () {

    /*
    var page = $.getURLParam("page");
    if(page != null && page != '' ){
        setTimeout(function () {
            $('#'+page).animatescroll({scrollSpeed:2000,easing:'easeInOutBack',padding:40});
        },1000);
    } */

    $('.menu li > ul li a').click(function () {
        $('.overlay').css({display:'block'});
    });

    $("#header").sticky({topSpacing:0});

    $('.slider').cycle();

    $('.gallery').each(function () {
        var selft= $(this);
        selft.find('.carousel').cycle({
            fx:     'fade',
            speed:  'fast',
            timeout: 0,
            next:   selft.find('.next'),
            prev:   selft.find('.prev')
        });
    })

    $('.learn-more').each(function () {
        var self= $(this);
        self.click(function () {
            self.find('.more-text').slideToggle("slow");
        })
    })

    $('.linkedin').on('click', function(){
        var self= $(this);

        $.fancybox.open({
            width: '75%',
            height: '95%',
            autoSize: false,
            href: self.attr('href'),
            type: 'ajax',
            helpers: {
                overlay: {
                    locked: false
                }
            }
        });
        return false;
    });

    $('#news').submit(function (e) {
        e.preventDefault();
        var $self = $(this);

        if($('#verify').val() == $('#cap-code').val()){
            $.ajax({
                url: $self.attr('action'),
                data: $self.serialize(),
                success: function () {
                    alert("Su mensaje fue enviado, nos pondremos en contacto a la brevedad.")
                    location.reload();

                }
            });
        }else{
            alert('El código ingresado no es correcto, intente nuevamente.');
        }
    });

    setTimeout(function () {
        $('.overlay').css({display:'none'});
    },1000)



});
