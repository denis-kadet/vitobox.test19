jQuery(document).ready(function ($) {


    $('.block-5__slider-wrap').slick({
        arrows: false,
        dots: false,
        arrows: false, // включение стрелок (если не нужны false)
        asNavFor: '.block-5__imagesnew_dotted', // указываем что навигация для слайдера будет отдельно (указываем класс куда вешаем навигацию),
        responsive: [{
            breakpoint: 992,
            settings: {
                dots: true,
            }
        }, ]
    });

    $('.block-5__imagesnew_dotted').slick({ // настройка навигации
        slidesToShow: 3, // указываем что нужно показывать 3 навигационных изображения
        asNavFor: '.block-5__slider-wrap', // указываем что это навигация для блока выше
        focusOnSelect: true,
        arrows: false,
    });

    //Playing with Ken Wheeler Slick carousel
    $('.block-6__slider-items').slick({
        arrows: false,
        infinite: true,
        centerMode: true,
        centerPadding: '12%',
        slidesToShow: 3,
        speed: 500,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 2
            }
        },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerPadding: '13%',
                }
            },
        ]
    });

    $('.block-8__slider-items').slick({
        dots: true,
        arrows: false,
        infinite: true,
        centerMode: true,
        centerPadding: '30%',
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        responsive: [{
            breakpoint: 992,
            settings: {
                centerPadding: '15%',
                slidesToShow: 1
            }
        },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerPadding: '0%',
                }
            },
        ]
    });



    $("#block-9__accordion").accordionjs({
        closeAble: true,
        closeOther: true,
        slideSpeed: 550,
        activeIndex: false,
    });

    $('.block-10__slider-wrap').slick({
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

    $('.block-10__list-items').on('click', '.block-10__list-item', function() {
        var lindex = $(this).index();
        $(".block-10__slider-wrap").slick('slickGoTo', parseInt(lindex)); // меняем слад на нужный индекс
        $('.block-10__list-item').removeClass('block-10__active'); // change class
        $(this).addClass('block-10__active');
    });
    $('.block-10__slider-wrap').on('afterChange', function(event, slick, currentSlide, nextSlide) {
        var slideIndex = $(this).index();
        $('.block-10__list-item').removeClass('block-10__active');
        $('.block-10__list-item').eq(currentSlide).addClass('block-10__active')
    });

    $("#block-10__accordion").accordionjs({
        closeAble: true,
        closeOther: true,
        slideSpeed: 550,
        activeIndex: false,
    });



    $('.block-11__slider-mobile').slick({
        dots: false,
        arrows: false,
        infinite: true,
        centerMode: true,
        centerPadding: '15%',
        slidesToShow: 1,
        speed: 500,
    });

});