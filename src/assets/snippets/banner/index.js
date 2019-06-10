import './style.styl';

define(['jquery', 'slick-carousel'], ($) => {
    $('[data-carousel=banner-principal]').slick({
        autoplay: true,
        autoplaySpeed: 5000,
        centerMode: true,
        variableWidth: true,
        nextArrow: '<button class="slick-next" type="button"><i class="fas fa-chevron-right"></i></button>',
        prevArrow: '<button class="slick-prev" type="button"><i class="fas fa-chevron-left"></i></button>',
        infinite: true,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    dots: true,
                    arrows: false,
                    centerMode: false,
                    variableWidth: false,
                }
            }
        ]
    });
}); 