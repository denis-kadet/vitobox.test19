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
            jQuery('.pvz-container-address-details__address .pvz-container-address-details-data').html(wat.id + ', ' + wat.PVZ.Address);
            jQuery('.pvz-container-address-details__price .pvz-container-address-details-data').html(wat.price);
            jQuery('.pvz-container-address-details__terms .pvz-container-address-details-data').html(wat.term);
            jQuery('#pvz-container-address-details').show();
        }
    }catch(e){
        console.log(e);
    }



    let timer;

    jQuery('input[name=billing_city]').on('input', function(){
        let self = $(this).val();
        clearTimeout(timer);
        if(self.length){
            timer = setTimeout(function (){
                let value = self.split('');
                let firstWord = value.shift().toUpperCase();
                value.unshift(firstWord);
                value = value.join('');
                console.log(firstWord, value)
                let dataStr = {city_name: value, action: 'show_pvz'};
                try{
                    ourWidjet.city.set(value);
                }catch (e) {
                    console.log(e);
                }
                jQuery.ajax({
                    type: "POST",
                    data: dataStr,
                    url: "/CdekPvz.php",
                    success: function(data){
                        jQuery('#pvz-container-list').html(data);
                        jQuery('.pvz-container-wrapper').show();
                        jQuery('body').addClass('basket-fixed');
                    }

                })
            }, 2000);
        }
    });//Виджет пвз + отправка ajax для получения списка пвз

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
        jQuery('.pvz-container-wrapper').show();
        jQuery('body').addClass('basket-fixed');
    });

    jQuery('.pvz-container-modal-back').on('click', function(event){//Скрывает окно выбора пвз
        event.preventDefault();
        let el = jQuery(event.target);
        if(el[0] == jQuery(this)[0]){
            if(jQuery('body').hasClass('basket-fixed')){
                jQuery('body').removeClass('basket-fixed');
            }
            jQuery('.pvz-container-wrapper').hide();
        }
    });
    jQuery('.pvz-container-heading__close-button').on('click', function(){//Скрывает окно выбора пвз
        window.scrollTo(0, 0)
        if(jQuery('body').hasClass('basket-fixed')){
            jQuery('body').removeClass('basket-fixed');
        }
        jQuery('.pvz-container-wrapper').hide();
    });

    jQuery(document).on("click", ".pvz-detail-link", function(e) {//Раскрывает Как добраться
        e.preventDefault();
        let par = jQuery(this).parents('.pvz-container')
        jQuery('.pvz-detail-description').each(function(){
            jQuery(this).hide();
        });
        par.find('.pvz-detail-description').show();
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
        jQuery('.pvz-container-wrapper').hide();
        jQuery('#pvz-container-address-details').show();
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
        jQuery('#shipping-address-modal').show();
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
            jQuery('#shipping-address-modal').hide();
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
        jQuery('#shipping-address-modal').hide();
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
});