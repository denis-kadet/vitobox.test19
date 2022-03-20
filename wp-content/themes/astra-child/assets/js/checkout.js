jQuery().ready(function(){
    jQuery('input[name=shipping_city]').on('change', function(){
        let dataStr = {city_name: jQuery('input[name=shipping_city]').val(), action: 'show_pvz'};
        var ourWidjet = new ISDEKWidjet ({
            defaultCity: jQuery('input[name=shipping_city]').val(), //какой город отображается по умолчанию
            cityFrom: 'Москва', // из какого города будет идти доставка
            country: 'Россия', // можно выбрать страну, для которой отображать список ПВЗ
            link: 'pvz-container-map', // id элемента страницы, в который будет вписан виджет
            path: 'https://widget.cdek.ru/widget/scripts/', //директория с библиотеками виджета
            servicepath: '/service.php', //ссылка на файл service.php на вашем сайте
            apikey: '8c6bc6c3-1d38-4091-8db8-16ed2494ad17' // ключ для корректной работы Яндекс.Карт, получить необходимо тут
        });
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
    });
    // jQuery('input[name=shipping_city]').on('input', function(){
    //     let dataStr = jQuery('input[name=shipping_city]').val();
    //     jQuery('input[name=town]').val(dataStr);
    //     jQuery('input[name=town]').trigger('input')
    //     let townList = jQuery('#GnnnW_city_list');
    //     console.log(townList);
    // })

    jQuery('#shipping-to-pvz, .customer-info-container-shipping-select__button ').on('click', function(event){
        event.preventDefault();
        jQuery('.pvz-container-wrapper').show();
        jQuery('body').addClass('basket-fixed');
    });

    jQuery('.pvz-container-modal-back').on('click', function(event){
        event.preventDefault();
        var el = jQuery(event.target);
        if(el[0] == jQuery(this)[0]){
            if(jQuery('body').hasClass('basket-fixed')){
                jQuery('body').removeClass('basket-fixed');
            }
            jQuery('.pvz-container-wrapper').hide();
        }
    });
    jQuery('.pvz-container-heading__close-button').on('click', function(){
        if(jQuery('body').hasClass('basket-fixed')){
            jQuery('body').removeClass('basket-fixed');
        }

        jQuery('.pvz-container-wrapper').hide();
    });

    jQuery(document).on("click", ".pvz-detail-link", function(e) {
        e.preventDefault();
        let par = jQuery(this).parents('.pvz-container')
        jQuery('.pvz-detail-description').each(function(){
            jQuery(this).hide();
        });
        par.find('.pvz-detail-description').show();
    });
    jQuery(document).on("click", ".pvz-container", function(e){

        jQuery('.pvz-container-address-details__address .pvz-container-address-details-data').html(jQuery(this).find('.pvz-owner-name'));
        jQuery('.pvz-container-address-details__price .pvz-container-address-details-data').html(jQuery(this).find('.pvz-price').text());
        jQuery('.pvz-container-address-details__terms .pvz-container-address-details-data').html(jQuery(this).find('.devivery-time').text());

    });
        // jQuery('.pvz-detail-link').each(function(){
    //     console.log(this)
    //     jQuery(this).on('click', function(event){
    //         event.preventDefault();
    //         event.stopPropagation();
    //         console.log(this)
    //     });
    // });
    jQuery('.pvz-container').each(function(){
        jQuery(this).on('click', function(event){
            event.preventDefault();
            event.stopPropagation();
            console.log(this)
        });
    });
    jQuery('#pvz-by-list').on('click', function(){
        jQuery('#pvz-container-list').show();
        jQuery('#pvz-container-map').hide();
    });
    jQuery('#pvz-by-map').on('click', function(){
        jQuery('#pvz-container-map').show();
        jQuery('#pvz-container-list').hide();
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