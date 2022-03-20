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

    let pathname = location.pathname;
    if(pathname == '/katalog/') {
        let headerMenu = $('.site-header');
        headerMenu.addClass('light-blue');
        $(window).on('scroll', function (){
            if($(this).scrollTop() > 80){
                headerMenu.removeClass('light-blue');
            } else {
                headerMenu.addClass('light-blue');
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
                    recommended_list.css('top','-233px');
                } else {
                    recommended_list.css('top','30px');
                }
                console.log($(this).offset().top, recommended_list.outerHeight());
            } else {
                $(this).parents('.product__list').removeClass('scrolled');
            }
        });

        $('.recommended__item').on('click', function (){
            var recommendedItem = $(this).parent().siblings('.recommended__count');
            var product_id = $(this).parents('.product__item').attr('id');
            var key = $(this).parents('.product__item').data('cart_item_key');
            var count = parseInt($(this).text());
            $(this).addClass('active').siblings().removeClass('active');
            $(this).parent().removeAttr('style');
            recommendedItem.text(count);
            updateBasket('add-product', product_id, key, count);
        });
    }

    function removeAjaxProductMiniBasket(btnclose){
        btnclose.on('click', function (e){
            e.preventDefault();
            var product = $(this).parents('.product__item');
            var listProduct = product.parent();
            var id = $(this).data('cart_item_key');
            if(product.parent().children().length <= 6){
                $(this).parents('.product__list').removeClass('scrolled');
            }
            product.remove();
            updateBasket('remove-product', id);
        });
    }

    changeQuantity();
    removeAjaxProductMiniBasket($('.remove_product'));

    function updateBasket(arg, id, key, number){
        $.ajax({
            url: urlAjax,
            method: 'POST',
            data: {
                action: arg,
                product_id: id,
                quantity: {
                    key_id: key,
                    count: number
                }
            },
            success: function (data){
                var result = JSON.parse(data);
                $('.subtotal').html(result.total);
                removeAjaxProductMiniBasket($('.remove_product'));
                $('#ast-site-header-cart').find('.ast-site-header-cart-li').html(result.fragments['a.cart-container']);
            }
        });
    }

    function createPopupAddCart(name){
        var item = $('<div class="popup__item-cart"></div>');
        var imageSuccess = $('<div class="popup__success-img"></div>');
        var textProduct = $('<div class="popup_success-text"></div>');
        textProduct.html('<strong>' + name + '</strong> добавлен в корзину.');
        item.append(imageSuccess);
        item.append(textProduct);
        return item;
    }

    $('.add_to_cart_button').on('click', function (e){
        e.preventDefault();
        var id = $(this).attr('data-product_id');
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
                    var popupAdd = createPopupAddCart(result.name);
                    var product_list = $('.basket_vitobox .product__list');
                    $('.product_container').html(result.fragments.products);
                    removeAjaxProductMiniBasket($('.remove_product'));
                    $('#ast-site-header-cart').find('.ast-site-header-cart-li').html(result.fragments['a.cart-container']);
                    popupContainer.prepend(popupAdd);
                    changeQuantity();
                    setTimeout(function (){
                        popupAdd.css('transform','translateX(0%)');
                        popupAdd.fadeOut(8000);
                    },0);
                }
            }
        });
    });

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
    catBtn.on('click', function (){
        let catValue = $(this).data('category');
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
                $('#catalog-section').prepend('<div class="filter-loader"><div class="image-loader"><img src="/wp-content/themes/astra-child/assets/img/loader.svg" alt="loading"></div></div>');
            },
            success: function (data){
                $('#catalog-section').html(data);
            }
        })
    })

    


});