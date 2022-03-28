jQuery().ready(function($){
    let cityDefault = 'Москва';

    try{
        var ourWidjet = new ISDEKWidjet ({
            defaultCity: jQuery('input[name=billing_city]').val(), //какой город отображается по умолчанию
            cityFrom: cityDefault, // из какого города будет идти доставка
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
            jQuery('.pvz-container-address-details__address .pvz-container-address-details-data').html(' ' + wat.id + ', ' + wat.PVZ.Address);
            jQuery('.pvz-container-address-details__price .pvz-container-address-details-data').html(' ' + wat.price);
            jQuery('.pvz-container-address-details__terms .pvz-container-address-details-data').html(' ' + wat.term);
            jQuery('#pvz-container-address-details').show();
        }
    }catch(e){
        console.log(e);
    }



    // let timer;
    //
    // jQuery('input[name=billing_city]').on('input', function(){
    //     let self = $(this).val();
    //     clearTimeout(timer);
    //     if(self.length){
    //         timer = setTimeout(function (){
    //             let value = self.split('');
    //             let firstWord = value.shift().toUpperCase();
    //             value.unshift(firstWord);
    //             value = value.join('');
    //             console.log(firstWord, value)
    //             let dataStr = {city_name: value, action: 'show_pvz'};
    //             try{
    //                 ourWidjet.city.set(value);
    //             }catch (e) {
    //                 console.log(e);
    //             }
    //             jQuery.ajax({
    //                 type: "POST",
    //                 data: dataStr,
    //                 url: "/CdekPvz.php",
    //                 success: function(data){
    //                     jQuery('#pvz-container-list').html(data);
    //                     jQuery('.pvz-container-wrapper').show();
    //                     jQuery('body').addClass('basket-fixed');
    //                 }
    //
    //             })
    //         }, 2000);
    //     }
    // });//Виджет пвз + отправка ajax для получения списка пвз

    // jQuery('input[name=shipping_city]').on('input', function(){
    //     let dataStr = jQuery('input[name=shipping_city]').val();
    //     jQuery('input[name=town]').val(dataStr);
    //     jQuery('input[name=town]').trigger('input')
    //     let townList = jQuery('#GnnnW_city_list');
    //     console.log(townList);
    // })

    jQuery('#shipping-to-pvz, .customer-info-container-shipping-select__button #shipping-to-pvz').on('click', function(event){//Открывает выбор пвз
        event.preventDefault();
        cityDefault = jQuery('input[name=billing_city]').val();
        if( cityDefault == '' ){
            cityDefault = "Москва";
        }
//
        let self = $('input[name=billing_city]').val();
        if(self.length){
            let value = self.split('');
            let firstWord = value.shift().toUpperCase();
            value.unshift(firstWord);
            value = value.join('');
            console.log(value)
            let dataStr = {city_name: value, action: 'show_pvz'};
            try {
                ourWidjet.city.set(value);
            } catch (e) {
                console.log(e);
            }
            jQuery.ajax({
                type: "POST",
                data: dataStr,
                url: "/CdekPvz.php",
                success: function (data) {
                    jQuery('#pvz-container-list').html(data);
                    jQuery('.pvz-container-wrapper').show();
                    jQuery('body').addClass('basket-fixed');
                }

            })
        }
//


        try{
            ourWidjet.city.set(cityDefault);
        }catch (e) {
            console.log(e);
        }
        jQuery('.customer-info-container-shipping-select button ').each(function(){
            jQuery(this).removeClass('checkout-selected-button');
        })
        jQuery(this).addClass('checkout-selected-button');
        window.scrollTo(0, 0)
        jQuery('.pvz-container-wrapper').show(350);
        jQuery('body').addClass('basket-fixed');
    });

    jQuery('.pvz-container-modal-back').on('click', function(event){//Скрывает окно выбора пвз
        event.preventDefault();
        let el = jQuery(event.target);
        if(el[0] == jQuery(this)[0]){
            if(jQuery('body').hasClass('basket-fixed')){
                jQuery('body').removeClass('basket-fixed');
            }
            jQuery('.pvz-container-wrapper').hide(350);
        }
    });
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

    jQuery('#pvz-ready').on('click', function (){//Отправка выбранного пвз в форму
        let selectedPvz = jQuery('.selected-pvz')
        jQuery('.pvz-container-address-details__address .pvz-container-address-details-data').html(jQuery(selectedPvz).find('.pvz-owner-name').text());
        /**/
        jQuery('#billing_address_1').val(jQuery(selectedPvz).find('.pvz-owner-name').text());
        jQuery('.pvz-container-address-details__price .pvz-container-address-details-data').html(jQuery(selectedPvz).find('.pvz-price').text());
        jQuery('.pvz-container-address-details__terms .pvz-container-address-details-data').html(jQuery(selectedPvz).find('.devivery-time').text());
        if(jQuery('body').hasClass('basket-fixed')){
            jQuery('body').removeClass('basket-fixed');
        }
        jQuery('.pvz-container-wrapper').hide(350);
        jQuery('#pvz-container-address-details').show(350);
    });

    jQuery(document).on("click", ".pvz-container", function(e){//Выбор пвз
        jQuery(".pvz-container").each(function(){
            jQuery(this).removeClass('selected-pvz');
        });
        jQuery(this).addClass('selected-pvz');

    });


    jQuery('.pvz-container-heading-select a').each(function(){
        let link = jQuery(this)
        link.on('click', function(e){
            e.preventDefault();
            $('.pvz-container-heading-select__selected-string').each(function(){
                $(this).removeClass('pvz-container-heading-select__selected-string');
            });
            link.addClass('pvz-container-heading-select__selected-string');
            $('.pvz-modal-togglable').each(function(){
                $(this).toggle();
            });
        });

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
    jQuery('#shipping-address-modal-close').on('click', function (){
        jQuery('#shipping-address-modal').hide();
        if(jQuery('body').hasClass('basket-fixed')){
            jQuery('body').removeClass('basket-fixed');
        }
    });
    jQuery('#fill-address-button').on('click', function(e){
        e.preventDefault();
        let addr= jQuery('.shipping-address-modal-container-right-house input').val();
        addr = addr + ', ' + jQuery('.shipping-address-modal-container-right-apparts input').val();
        addr = jQuery('.shipping-address-modal-container-right-street input').val() + ', ' + addr
        jQuery('#billing_address_1').val(addr);
        jQuery('#shipping-address-modal').hide(350);
        if(jQuery('body').hasClass('basket-fixed')){
            jQuery('body').removeClass('basket-fixed');
        }
    });
    /*DaData начало*/
//     // Замените на свой API-ключ
//     var token = "0753a0723c75eafdb5ab0db93f21dc29cb95b2de";
//     var city   = jQuery("#shipping_city");
//     // var $street = $("#street");
//     // var $house  = $("#house");
//
// // город и населенный пункт
//     city.suggestions({
//         token: token,
//         type: "ADDRESS",
//         hint: false,
//         bounds: "city-settlement"
//     });

// // улица
//     $street.suggestions({
//         token: token,
//         type: "ADDRESS",
//         hint: false,
//         bounds: "street",
//         constraints: $city
//     });
//
// // дом
//     $house.suggestions({
//         token: token,
//         type: "ADDRESS",
//         hint: false,
//         noSuggestionsHint: false,
//         bounds: "house",
//         constraints: $street
//     });


    /*DaData конец*/


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
            // 'custom-address-street': {
            //     required: true,
            //     minlength: 3
            // },
            // 'custom-address-house': {
            //     required: true
            // },
            // 'custom-address-apparts': {
            //     required: true
            // }
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
        let checkPromo = '.coupon-' + promoStr;
        let promoField = $(this);
        let correctPromoLabel = '<label id="custom-promo-label" class="valid" for="custom-promo">промокод активирован(скидка 25%)</label>';
        let inCorrectPromoLabel = '<label id="custom-promo-label-incorrect" class="error custom-error" for="custom-promo">Некорректный промокод</label>';

        $.ajax({
            type: "POST",
            data: '',
            url: "/?coupon-code=" + promoStr + "&sc-page=checkout",
            success: function(data){
                let promoResponse = $(data).find('.order_review__container').html();

                if( $(promoResponse).find(checkPromo).length > 0 ){
                    $('.order_review__container').html(promoResponse);
                    promoField.removeClass('error custom-error')
                    promoField.addClass('valid');
                    promoField.after(correctPromoLabel);
                    $('#custom-promo-label-incorrect').remove();
                }else{
                    promoField.removeClass('valid')
                    promoField.addClass('error custom-error');
                    promoField.after(inCorrectPromoLabel);
                    $('#custom-promo-label').remove();
                }

            }

        })
    })

    /*промокод конец*/

    /*Изменение кнопки оформить заказ - начало*/
    let chckChckt = () => {

    }
    $('form[name=checkout]').on('change', function(){
        console.log($('input.error').length)
        let btn = $('#place_order')

        if( $('input.error').length == 0 ){
            btn.removeClass('disable-place-order');
        }else{
            btn.addClass('disable-place-order');
        }
    });
    /*Изменение кнопки оформить заказ - конец*/
});