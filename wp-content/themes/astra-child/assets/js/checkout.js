jQuery().ready(function($){
    let cityDefault = 'Москва';
    let shippingCity = 'Москва';

    try{
        var ourWidjet = new ISDEKWidjet ({
            defaultCity: cityDefault, //какой город отображается по умолчанию
            cityFrom: shippingCity, // из какого города будет идти доставка
            country: 'Россия', // можно выбрать страну, для которой отображать список ПВЗ
            link: 'pvz-container-map', // id элемента страницы, в который будет вписан виджет
            path: 'https://widget.cdek.ru/widget/scripts/', //директория с библиотеками виджета
            servicepath: '/service.php', //ссылка на файл service.php на вашем сайте
            hidedress: true,
            hidecash: true,
            hidedelt: true,
            apikey: '8c6bc6c3-1d38-4091-8db8-16ed2494ad17', // ключ для корректной работы Яндекс.Карт, получить необходимо тут
            onChoose: onChoose
        });

        function onChoose(wat) {
            console.log(wat)
            $('.CDEK-widget__panel').removeClass('open');

            // var flag = 0;
            // var element = $('.ymaps-2-1-79-events-pane ');
            // element.on("mousedown", function(){
            //     flag = 0;
            // }, false);
            // element.on("mousemove", function(){
            //     flag = 1;
            // }, false);
            // element.on("mouseup", function(){
            //     if(flag === 0){
            //         $('.CDEK-widget__panel').addClass('open');
            //     }
            //     else if(flag === 1){
            //         console.log("drag");
            //     }
            // }, false);

            // $('.ymaps-2-1-79-events-pane ').on('click', function(){
            //     console.log('testt')
            //
            // });
            $('.pvz-container-address-details__address .pvz-container-address-details-data').html(' ' + wat.id + ', ' + wat.PVZ.Address);
            $('.pvz-container-address-details__price .pvz-container-address-details-data').html(' ' + wat.price);
            $('.pvz-container-address-details__terms .pvz-container-address-details-data').html(' ' + wat.term);
            $('#pvz-container-address-details').show();
        }

        ourWidjet.city.set(cityDefault);

    }catch(e){
        console.log(e);
    }

    // $('.customer-info-container-shipping-select__button #shipping-to-pvz').on('click', function(event) {//Открывает выбор пвз
    //     event.preventDefault();
    //
    //     $('.customer-info-container-shipping-select button ').each(function(){
    //         $(this).removeClass('checkout-selected-button');
    //     })
    //     $(this).addClass('checkout-selected-button');
    //     window.scrollTo(0, 0);
    //     $('.pvz-container-wrapper').show(350);
    //     $('body').addClass('basket-fixed');
    // });

   // $('#shipping-to-pvz, .customer-info-container-shipping-select__button #shipping-to-pvz').on('click', function(event){//Открывает выбор пвз
    $('#shipping-to-pvz').on('click', function(event){//Открывает выбор пвз
        event.preventDefault();

        cityDefault = $('input[name=billing_city]').val();
        if( cityDefault == '' ){
            cityDefault = "Москва";
        }

        console.log(cityDefault)

        if(cityDefault.length){
            let value = cityDefault.split('');
            let firstWord = value.shift().toUpperCase();
            value.unshift(firstWord);
            cityDefault = value.join('');
            let dataStr = {city_name: cityDefault, action: 'show_pvz'};

            ourWidjet.city.set(cityDefault);

            $.ajax({
                type: "POST",
                data: dataStr,
                url: "/CdekPvz.php",
                success: function (data) {
                    // console.log(data)
                    if( data == '[]' ){
                        data = "<div class='empty-answer'>Извините, по вашему запросу ничего не нашлось</div>";
                    }
                    $('#pvz-container-list').html(data);
                    $('.pvz-container-wrapper').show(350);
                    $('body').addClass('basket-fixed');
                }

            })
        }

        try{
            ourWidjet.city.set(cityDefault);
        }catch (e) {
            console.log(e);
        }
        $('.customer-info-container-shipping-select button ').each(function(){
            $(this).removeClass('checkout-selected-button');
        })
        $(this).addClass('checkout-selected-button');
        window.scrollTo(0, 0);
        $('.pvz-container-wrapper').show(350);
        $('body').addClass('basket-fixed');
        $('#shipping_to').val('pvz');
        let name = "data_shipping_to";
        let value = $('#shipping_to').val();

        document.cookie = encodeURIComponent(name) + '=' + encodeURIComponent(value);
    });

    // $('.pvz-container-modal-back').on('click', function(event){//Скрывает окно выбора пвз
    //     event.preventDefault();
    //     let el = $(event.target);
    //     if(el[0] == $(this)[0]){
    //         if($('body').hasClass('basket-fixed')){
    //             $('body').removeClass('basket-fixed');
    //         }
    //         $('.pvz-container-wrapper').hide();
    //     }
    // });
    jQuery('.pvz-container-heading__close-button').on('click', function(){//Скрывает окно выбора пвз
        window.scrollTo(0, 0)
        if(jQuery('body').hasClass('basket-fixed')){
            jQuery('body').removeClass('basket-fixed');
        }
        jQuery('.pvz-container-wrapper').hide(350);
    });

    jQuery(document).on("click", ".pvz-detail-link", function(e) {//Раскрывает Как добраться
        e.preventDefault();
        let par = jQuery(this).parents('.pvz-container')
        jQuery('.pvz-detail-description').each(function(){
            jQuery(this).hide(350);
        });
        par.find('.pvz-detail-description').show(350);
    });

    $('#pvz-ready, #pvz-ready-mobile').on('click', function (e){//Отправка выбранного пвз в форму
        console.log(e.target);
        let selectedPvz = jQuery('.selected-pvz');
        $('.pvz-container-address-details__address .pvz-container-address-details-data').html($(selectedPvz).find('.pvz-owner-name').text());
        /**/
        $('#billing_address_1').val($(selectedPvz).find('.pvz-owner-name').text());
        $('.pvz-container-address-details__price .pvz-container-address-details-data').html($(selectedPvz).find('.pvz-price').text());
        $('.pvz-container-address-details__terms .pvz-container-address-details-data').html($(selectedPvz).find('.devivery-time').text());
        if($('body').hasClass('basket-fixed')){
            $('body').removeClass('basket-fixed');
        }
        $('#shipping_to').val('eco-pvz');

        $('.pvz-container-wrapper').hide(350);
        $('#pvz-container-address-details').show(350);
        $('#personal-container-address-details').hide(350);
    });


    jQuery(document).on("click", ".pvz-container", function(e){//Выбор пвз
        jQuery(".pvz-container").each(function(){
            jQuery(this).removeClass('selected-pvz');
        });
        jQuery(this).addClass('selected-pvz');

    });


    $('#pvz-by-list').on('click', function (e){
        e.preventDefault();
        let link = $(this);
        $('.pvz-container-heading-select__selected-string').each(function(){
            $(this).removeClass('pvz-container-heading-select__selected-string');
        });
        link.addClass('pvz-container-heading-select__selected-string');
        $('#pvz-container-list').show();
        $('#pvz-container-map').hide();
    });


    $('#pvz-by-map').on('click', function (e){
        e.preventDefault();
        let link = $(this);
        $('.pvz-container-heading-select__selected-string').each(function(){
            $(this).removeClass('pvz-container-heading-select__selected-string');
        });
        link.addClass('pvz-container-heading-select__selected-string');
        $('#pvz-container-map').show();
        $('#pvz-container-list').hide();
    });


    jQuery('#shipping-to-adress').on('click', function (e){
        e.preventDefault();
        jQuery('.customer-info-container-shipping-select button ').each(function(){
            jQuery(this).removeClass('checkout-selected-button');
        })
        jQuery(this).addClass('checkout-selected-button');
        window.scrollTo(0, 0)
        jQuery(this).addClass('')
        jQuery('#shipping-address-modal').show(350);
        jQuery('body').addClass('basket-fixed');
        $('#pvz-container-address-details').hide(350);
        $('#shipping_to').val('address');
    });

    jQuery('#shipping-address-modal').on('click', function (event){
        event.preventDefault();
        window.scrollTo(0, 0);
        let el = jQuery(event.target);
        if(el[0] == jQuery(this)[0]){
            if(jQuery('body').hasClass('basket-fixed')){
                jQuery('body').removeClass('basket-fixed');
            }
            jQuery('#shipping-address-modal').hide(350);
        }
    });
    $('#shipping-address-modal-close').on('click', function (){
        $('#shipping-address-modal').hide();
        if($('body').hasClass('basket-fixed')){
            $('body').removeClass('basket-fixed');
        }
    });
    $('#fill-address-button').on('click', function(e){
        e.preventDefault();
        let addr= ' ' + $('.shipping-address-modal-container-right-house input').val();
        addr = addr + ', ' + $('input[name=custom-address-apparts]').val();
        addr = $('.shipping-address-modal-container-right-street input').val() + ', ' + addr;

        $('.personal-container-address-details__address .personal-container-address-details-data').html(addr);
        // $('.personal-container-address-details__price .personal-container-address-details-data').html();
        // $('.personal-container-address-details__terms .personal-container-address-details-data').html();

        $('#personal-container-address-details').show(350);
        $('#pvz-container-address-details').hide(350);

        $('#shipping_to').val('eco-address');
        $('#billing_address_1').val(addr);
        $('#shipping-address-modal').hide(350);
        if($('body').hasClass('basket-fixed')){
            $('body').removeClass('basket-fixed');
        }
    });



    /*валидация полей начало*/
    Inputmask("+7 (9{3,3}) 9{3,3}-9{2,2}-9{2,2}").mask(document.querySelectorAll('#billing_phone'));

    jQuery.validator.addMethod("checkMaskPhone", function(value, element) {
        return /\+\d{1}\s\(\d{3}\)\s\d{3}-\d{2}-\d{2}/g.test(value);
    });
    jQuery.validator.addMethod("accept", function(value, element, param) {
        let res =  value.match(new RegExp("" + param + "$"));
        return res;
    });

    jQuery('form[name=checkout]').validate({
        errorClass: 'error custom-error',
        ignore: ".ignore",
        rules: {
            'billing_first_name': {
                accept: "^[a-zA-Zа-яА-Я]*",
                required: true,
                minlength: 2
            },
            'billing_last_name': {
                accept: "^[a-zA-Zа-яА-Я]*",
                required: true,
                minlength: 2
            },
            'billing_phone': {
                checkMaskPhone: true,
                required: true
            }

        },
        messages: {
            'billing_first_name': 'Введите имя корректно',
            'billing_last_name': 'Введите фамилию корректно',
            'billing_phone': 'Введите номер корректно',
            'custom-address-street': '',
            'custom-address-house': '',
            'custom-address-apparts': ''
        }
    });

    /*валидация полей конец*/

    /*промокод начало*/

    $('.custom-promo').on('change', function (){
        let promoStr = $(this).val();
        let checkPromo = '.coupon-' + promoStr.toLowerCase();
        let promoField = $(this);
        let inCorrectPromoLabel = '<label id="custom-promo-label-incorrect" class="error custom-error" for="custom-promo">Некорректный промокод</label>';
        $.ajax({
            type: "POST",
            data: '',
            url: "/?coupon-code=" + promoStr + "&sc-page=checkout",
            success: function(data){
                let promoResponse = $(data).find('.order_review__container').html();
                let promoDiscount = $(data).find('.cart-discount td .amount').text();
                let promoType = $(data).find('.cart-discount td .amount .woocommerce-Price-currencySymbol').text();
                let correctPromoLabel = '<label id="custom-promo-label" class="valid" for="custom-promo">промокод активирован(скидка ' + promoDiscount + ')</label>';



                if( $(promoResponse).find(checkPromo).length > 0 ){
                    $('.order_review__container').html(promoResponse);
                    promoField.removeClass('error custom-error')
                    promoField.addClass('valid');
                    promoField.after(correctPromoLabel);
                    $('#custom-promo-label-incorrect').remove();
                }else{
                    promoField.removeClass('valid')
                    promoField.addClass('error custom-error');
                    if( $('#custom-promo-label-incorrect').length == 0 ){
                        promoField.after(inCorrectPromoLabel);

                    }
                    $('#custom-promo-label').remove();
                }

            }

        })
    })

    /*промокод конец*/

    /*Изменение кнопки оформить заказ - начало*/
    function initCheck() {
        let btn = $('#place_order');
        let reqInput = ['billing_first_name', 'billing_last_name', 'billing_phone', 'billing_city'];
        let i = 0;

        reqInput.forEach((item) => {
            if (document.getElementById(item).value == '') {
                i++;
            }
        });

        if ($('input.error').not('.ignore').length == 0 && i == 0) {
            btn.removeClass('disable-place-order');
            btn.removeAttr( "disabled" );
        } else {
            btn.addClass('disable-place-order');
            btn.attr( "disabled", "disabled");

        }
    }
    $('form[name=checkout]').on('change', function(){
        initCheck()
    });
    /*Изменение кнопки оформить заказ - конец*/
    initCheck();

});