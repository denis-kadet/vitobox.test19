jQuery(document).ready(function ($) {
    // let header = $("#ast-desktop-header");
    //
    // header.addClass('fixed');
    // let scrollChange = 1;
    // $(window).scroll(function() {
    //     let scroll = $(window).scrollTop();
    //
    //     if (scroll >= scrollChange) {
    //         header.addClass('custom-blur');
    //     } else {
    //         header.removeClass("custom-blur");
    //     }
    // });

    // let headerArr = ["#ast-desktop-header", "#ast-mobile-header"];
    //
    // headerArr.forEach( function( curEl){
    //     let header = $(curEl);
    //
    //     header.addClass('fixed');
    //     // let scrollChange = 1;
    //     // $(window).scroll(function() {
    //     //     let scroll = $(window).scrollTop();
    //     //
    //     //     if (scroll >= scrollChange) {
    //     //         header.addClass('custom-blur');
    //     //     } else {
    //     //         header.removeClass("custom-blur");
    //     //     }
    //     // });
    // } );

    let headerMenu = $('.site-header');
    $(window).on('scroll', function (){
        if($(this).scrollTop() > 10){
            headerMenu.addClass('menu-fixed');
        } else {
            headerMenu.removeClass('menu-fixed');
        }
    })

    let pathname = location.pathname;
    if(pathname == '/katalog/') {
        if($(window).width() > 480 ){
            $('.filter-item').eq(1).addClass('active')
            $('.filter-tabs').eq(1).addClass('active')
        }
        headerMenu.addClass('light-blue');
        $(window).on('scroll', function (){
            if($(this).scrollTop() > 80){
                headerMenu.removeClass('light-blue');
                headerMenu.addClass('menu-fixed');
            } else {
                headerMenu.addClass('light-blue');
                headerMenu.removeClass('menu-fixed');
            }
        })
    }
    
    function menuToggle(event, time = 0){
        let arrow = $(event.target, open);
        let block = arrow.parents('.footer-hidden-menu-container').find('.footer-hidden-menu-container__element');

        if(block.css('display') == 'none' ){
            arrow.css('transform', 'rotate(180deg)');
        }else{
            arrow.css('transform', 'rotate(0deg)');
        }
        block.toggle(time);
    }


    $('.footer-menu__arrow').on('click', function (event){
        menuToggle(event, 500);
        // $('#footer-commerce-block-agreement').toggle(500);
    });

    $('.footer-email-sender').on('click', function (event){
        if($(this).parent().find('input').hasClass('valid')){
            let link = $(event.target);
            link.parent()
            $('.footer-email-field-container__success_message').show();
        }

    });

    $('#footer-email-field-container__subscribe').validate({
        errorPlacement: function (error, element) {
            if (element.attr('name') == 'subscribe-email' ) {
                // error.insertAfter(element.parent());
                if( !!!document.getElementById('subscribe-email-error') ) error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        errorClass: 'error custom-error',
        rules: {
            'subscribe-email': {
                email: true
            }
        },
        messages: {
            'subscribe-email': 'Некорректный email'
        }
    });
    $('#footer-email-field-container__subscribe').on('input', function( event ){
        let checkField = $(event.target);
        if( !checkField.hasClass('error') ){
            checkField.parent().parent().find('label').remove();
        }else{
        }

    });

    if($(window).width() < 768 ) {
        artEvent = new Object();
        artEvent.target = $('.footer-menu__arrow');
        menuToggle(artEvent, 100, false);
        // $('#footer-commerce-block-agreement').toggle(500);
    }

    $('.ast-mobile-menu-trigger-minimal').click(function(){
        let mobileHeader = $('#ast-mobile-header')
        if( mobileHeader.hasClass('custom-white-background') ){
            mobileHeader.removeClass('custom-white-background');
        }else{
            mobileHeader.addClass('custom-white-background');
        }
    });

    //screen
    let screen = $(window).width();
    //mini basket
    var cart = $('.ast-site-header-cart');
    var backgroundBasket = $('.basket_background');
    var basket = $('.basket_vitobox');
    var popupContainer = $('.popup__list-cart');
    var basketWrapper = $('.basket__wrapper');
    var container = $('.basket_vitobox .product__list');
    var urlAjax = '/wp-admin/admin-ajax.php';

    $(document).keydown(function(e) {
        if (e.keyCode === 27) {
            backgroundBasket.fadeOut();
            basket.removeClass('basket__visible');
            $('body').removeClass('basket-fixed');
        }
    });

    backgroundBasket.click(function (e){
        var el = $(e.target);
        if(el[0] == $(this)[0]){
            el.find('.basket_vitobox').removeClass('basket__visible');
            $('body').removeClass('basket-fixed');
            $(this).fadeOut();
        }
    });

    cart.on('click', function (e){
        e.preventDefault();
        backgroundBasket.fadeIn();
        basket.addClass('basket__visible');
        $('body').addClass('basket-fixed');
        if($('.product__list').hasClass('scrolled')){
            let scrolledWindow = ( $(window).height() * 60 ) / 100;
            $('.product__list').css('height', scrolledWindow)
        }
        jQuery("html, body").animate({scrollTop: 0}, 800);
    })

    $('.close').on('click', function (){
        backgroundBasket.fadeOut();
        basket.removeClass('basket__visible');
        $('body').removeClass('basket-fixed');
    });

    function changeQuantity(){
        $('.recommended').on('click', function (){
            let id = $(this).parents('.product__item').attr('id');
            let recommended_list = $(this).find('.recommended_list');
            $(this).toggleClass('open');
            if($('.product__item .open').length > 1){
                $('.product__item .open').each(function (){
                    if($(this).parents('.product__item').attr('id') == id){
                        return;
                    }
                    $(this).removeClass('open');
                })
            }
            //проверяем вышел ли блок за пределы родителя
            if($(this).parents('.product__list').children().length >= 6){
                let innerBlock = $(this).offset().top + recommended_list.outerHeight();
                let block = $(this).parents('.product__list').outerHeight();
                if(innerBlock > block) {
                    recommended_list.css('top','-120px');
                } else {
                    recommended_list.css('top','30px');
                }
            } else {
                $(this).parents('.product__list').removeClass('scrolled');
            }
        });

        $('.recommended__item').on('click', function (){
            var recommendedItem = $(this).parent().siblings('.recommended__count');
            var product_id = $(this).parents('.product__item').attr('id');
            var count = parseInt($(this).text());
            $(this).addClass('active').siblings().removeClass('active');
            $(this).parent().removeAttr('style');
            recommendedItem.text(count);
            updateBasket('add-product', product_id, count, false);
        });
    }

    function removeAjaxProductMiniBasket(btnclose){
        btnclose.on('click', function (e){
            e.preventDefault();
            var product = $(this).parents('.product__item');
            var id = $(this).data('cart_item_key');
            if(product.parent().children().length <= 6){
                $(this).parents('.product__list').removeClass('scrolled');
            }
            updateBasket('remove-product', id, null, false);
        });
    }

    changeQuantity();
    removeAjaxProductMiniBasket($('.remove_product'));

    function updateBasket(arg, id, count, showModal){
        $.ajax({
            url: urlAjax,
            method: 'POST',
            data: {
                action: arg,
                product_id: id,
                quantity: count
            },
            beforeSend: function(){
                $('.product__list').prepend('<div class="filter-loader"><div class="image-loader"><img src="/wp-content/themes/astra-child/assets/img/loader.svg" alt="loading"></div></div>');
            },
            success: function (data){
                var result = JSON.parse(data);
                $('.product_container').html(result.fragments.products)
                $('.subtotal').html(result.total);
                console.log(result.count)
                changeQuantity();
                if(showModal || (result.count > 7)){
                    createPopupAddCart(result.count, result.name);
                }
                removeAjaxProductMiniBasket($('.remove_product'));
                $('.ast-site-header-cart').eq(0).find('.ast-site-header-cart-li').html(result.fragments['a.cart-container']); //desktop icon
                $('.ast-site-header-cart').eq(1).find('.ast-site-header-cart-li').html(result.fragments['a.cart-container']); //mobile icon
            }
        });
    }

    function createPopupAddCart(count, name){
        var item = $('<div class="popup__item-cart"></div>');
        var image = $('<div></div>');
        var textProduct = $('<div class="popup_text"></div>');
        var mouse = false;
        var posX = 0;
        if(count > 7){
            image.addClass("popup__attention-img");
            textProduct.html('В одно саше не поместиться <strong>больше 7 капсул</strong>,<br class="mobile__hidden">предлагаем вам оформить дополнительный заказ');
        } else {
            image.addClass("popup__success-img");
            textProduct.html('<strong>' + name + '</strong> добавлен в корзину.');
        }
        item.append(image);
        item.append(textProduct);
        popupContainer.prepend(item);
        item.click( function (){
            item.css('transform','translate3d(500px , 0 , 0)');
        })
        return setTimeout(function (){
            item.css('transform','translate3d(0 , 0 , 0)');
            item.fadeOut(4000);
        },0);
    }

    function catalogBackground(){
        let h = $('.decor_container').height();
        if(h > 2000){
           $('.background-decor').eq(0).show();
        } else {
            $('.background-decor').eq(0).hide();
        }
        if(h > 3000){
            $('.background-decor').eq(1).show();
        } else {
            $('.background-decor').eq(1).hide();
        }
        if(h > 5000){
            $('.background-decor').eq(2).show();
        } else {
            $('.background-decor').eq(2).hide();
        }
    }

    catalogBackground();

    function addToCart(button){
        button.on('click', function (e){
            e.preventDefault();
            var id = $(this).attr('data-product_id');
            var self = $(this);
            $.ajax({
                url: urlAjax,
                method: 'POST',
                data: {
                    action: 'add-product',
                    product_id: id
                },
                success: function (data){
                    if(data){
                        var result = JSON.parse(data);
                        var product_list = $('.basket_vitobox .product__list');
                        createPopupAddCart(result.count, result.name);
                        if(result.count <= 7){
                            $('.product_container').html(result.fragments.products);
                            removeAjaxProductMiniBasket($('.remove_product'));
                            changeQuantity();
                            self.text('Добавлено');
                            self.attr('disabled', 'true');
                            self.addClass('added')
                            $('.ast-site-header-cart').eq(0).find('.ast-site-header-cart-li').html(result.fragments['a.cart-container']); //desktop icon
                            $('.ast-site-header-cart').eq(1).find('.ast-site-header-cart-li').html(result.fragments['a.cart-container']); //mobile icon
                            if(screen < 768 && pathname == '/katalog/'){
                                let svgSuccess = '<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"></circle><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path></svg>';
                                self.css('background','transparent');
                                self.find('svg').remove();
                                self.append(svgSuccess);
                            }
                        }
                    }
                }
            });
        });
    }

    addToCart($('.add_to_cart_button'));

    //tabs
    $('.filter-item').on('click', function (){
        let index = $(this).index();
        $(this)
            .addClass('active')
            .siblings()
            .removeClass('active')
        $('.filter-tabs')
            .eq(index)
            .addClass('active')
            .siblings()
            .removeClass('active')
    })

    //Фильтр по категориям и атрибутам
    let catBtn = $('.filter-btn');
    catBtn.on('click', function (e){
        let catValue = $(this).data('category');
        console.log(e.target, catValue)
        let targetValue = $(this).data('target');
        $(this).addClass('selected').siblings().removeClass('selected');
        $.ajax({
            url: urlAjax,
            method: 'POST',
            data: {
                action: 'section',
                query: {
                    category: catValue,
                    target: targetValue
                }
            },
            beforeSend: function(){
                $('.decor_container').prepend('<div class="filter-loader"><div class="image-loader"><img src="/wp-content/themes/astra-child/assets/img/loader.svg" alt="loading"></div></div>');
            },
            success: function (data){
                $('.filter-loader').remove();
                $('#catalog-section').html(data);
                catalogBackground();
                addToCart($('.add_to_cart_button'));
            }
        })
    });

    //mobile filter
    $('.mobile__filter-close').on('click', function (){
        $(this).parents('.filter-tabs').removeClass('active');
    })

    if(screen < 961){
        $('.filter-tabs').each(function (){
            $(this).removeClass('active');
        });

        $('.filter-btn').on('click', function(){
            $(this).parents('.filter-tabs').removeClass('active');
            $('#select-filter').text($(this).text().trim());
            $('.filter-list').fadeOut();
            $('.mobile-filter-check').fadeIn();
        });
        $('#clearfilter').on('click', function (){
            jQuery('.filter-btn').eq(0).attr('data-category','all').trigger('click');
            $('.mobile-filter-check').fadeOut(0);
            $('.filter-list').fadeIn(0);
        })
    }

    //single page product
    $('.product__attribute-icon').on('click', function (){
        $(this)
            .addClass('active')
            .siblings()
            .removeClass('active');
    });

    $('#single-btn').on('click', function (e){
        e.preventDefault();
        let product_id = $(this).val();
        updateBasket('add-product', product_id);
        $('.product__simple-quantity').fadeIn();
        $(this).text('Добавлено');
        $(this).css({
            'background-color': '#fff',
            'color' : '#F7B801'
        });
        $(this).attr('disabled', 'true')
    })

    $('.product__simple-quantity').on('click', function (e){
        $(this).toggleClass('open');
    });

    $('.item-quantity-option').on('click', function (e){
        let product_id = $('#single-btn').val();
        $(this)
            .parent()
            .siblings('.product__simple-text-quantity')
            .text(parseInt($(this).text()));
        updateBasket('add-product', product_id, parseInt($(this).text()), false);
    })

    $('.product__research-slide').slick({
        dots: true,
        infinite: false,
        slidesToShow: 2,
        speed: 500,
        variableWidth: true,
        vertical: false,
        arrows: false,
        useCSS: false,
        // useTransform: false,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true
                }
            }
        ]
    });

    if(screen < 768){
        $('#recommend-slide').slick({
            dots: true,
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 500,
            variableWidth: true,
            vertical: false,
            arrows: false,
            useCSS: false,
        });
    }

});