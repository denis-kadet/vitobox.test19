<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;
?>



<div class="woocommerce-billing-fields">

    <h3>Информация для доставки:</h3>


    <div class="pvz-container-wrapper">
        <div class="pvz-container-modal-back">
        <div style="display: " id="pvz-container" class="custom-flow">

            <div class="pvz-container-heading__close-button pvz-container-heading__close-button-mobile">
                <button>
                    x
                </button>
            </div>

            <div class="pvz-container-heading">

                <div  class="pvz-container-heading__header">
                    <h3>Выберите удобный пункт</h3>
                </div>
                <div  class="pvz-container-heading__buttons">
                    <div class="pvz-container-heading__ready-button">
                        <button id="pvz-ready" class="checkout-transparent-button ">
                            Готово
                        </button>
                    </div>
                    <div class="pvz-container-heading__close-button">
                        <button>
                            x
                        </button>
                    </div>
                </div>
            </div>
            <div class="pvz-container-heading-select-wrapper">
                <div class="pvz-container-heading-select">
                    <div class="pvz-container-heading-select__string">
                        <a id="pvz-by-list">Списком</a>
                    </div>
                    <div class="pvz-container-heading-select__string">
                        <a id="pvz-by-map">На карте</a>
                    </div>
                </div>
            </div>



            <div class="pvz-container-heading__buttons-mobile">
                <div class="pvz-container-heading__ready-button">
                    <button id="pvz-ready" class="checkout-transparent-button ">
                        Готово
                    </button>
                </div>
                <div class="pvz-container-heading__close-button">
                    <button>
                        x
                    </button>
                </div>
            </div>





            <div id="pvz-container-list" class="pvz-modal-togglable" >
                <div class="CDEK-widget__preloader" id="y90DW_preloader" style=""><div class="CDEK-widget__preloader-truck"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 440.34302 315.71001">  <g><path class="path1" d="M416.43,188.455q-1.014-1.314-1.95-2.542c-7.762-10.228-14.037-21.74-19.573-31.897-5.428-9.959-10.555-19.366-16.153-25.871-12.489-14.513-24.24-21.567-35.925-21.567H285.128c-0.055.001-5.567,0.068-12.201,0.068h-9.409a14.72864,14.72864,0,0,0-14.262,11.104l-0.078.305V245.456l0.014,0.262a4.86644,4.86644,0,0,1-1.289,3.472c-1.587,1.734-4.634,2.65-8.812,2.65H14.345C6.435,251.839,0,257.893,0,265.334v46.388c0,7.441,6.435,13.495,14.345,13.495h49.36a57.8909,57.8909,0,0,0,115.335,0h82.61a57.89089,57.89089,0,0,0,115.335,0H414.53a25.8416,25.8416,0,0,0,25.813-25.811v-44.29C440.344,219.47,425.953,200.805,416.43,188.455ZM340.907,320.132a21.5865,21.5865,0,1,1-21.59-21.584A21.61074,21.61074,0,0,1,340.907,320.132ZM390.551,207.76c-0.451.745-1.739,1.066-3.695,0.941l-99.197-.005V127.782h42.886c11.539,0,19.716,5.023,28.224,17.337,5.658,8.19,20.639,33.977,21.403,35.293,0.532,1.027,1.079,2.071,1.631,3.125C386.125,191.798,392.658,204.279,390.551,207.76ZM121.372,298.548a21.58351,21.58351,0,1,1-21.583,21.584A21.6116,21.6116,0,0,1,121.372,298.548Z" transform="translate(0 -62.31697)"></path><path class="path2" d="M30.234,231.317h68a12.51354,12.51354,0,0,0,12.5-12.5v-50a12.51354,12.51354,0,0,0-12.5-12.5h-68a12.51354,12.51354,0,0,0-12.5,12.5v50A12.51418,12.51418,0,0,0,30.234,231.317Z" transform="translate(0 -62.31697)"></path><path class="path3" d="M143.234,231.317h68a12.51354,12.51354,0,0,0,12.5-12.5v-50a12.51354,12.51354,0,0,0-12.5-12.5h-68a12.51354,12.51354,0,0,0-12.5,12.5v50A12.51418,12.51418,0,0,0,143.234,231.317Z" transform="translate(0 -62.31697)"></path><path class="path4" d="M30.234,137.317h68a12.51354,12.51354,0,0,0,12.5-12.5v-50a12.51355,12.51355,0,0,0-12.5-12.5h-68a12.51355,12.51355,0,0,0-12.5,12.5v50A12.51418,12.51418,0,0,0,30.234,137.317Z" transform="translate(0 -62.31697)"></path><path class="path5" d="M143.234,137.317h68a12.51354,12.51354,0,0,0,12.5-12.5v-50a12.51354,12.51354,0,0,0-12.5-12.5h-68a12.51354,12.51354,0,0,0-12.5,12.5v50A12.51418,12.51418,0,0,0,143.234,137.317Z" transform="translate(0 -62.31697)"></path>  </g></svg><div class="CDEK-widget__preloader-truck__grass"></div><div class="CDEK-widget__preloader-truck__road"></div></div></div>
                <?php require "CdekPvz.php";?>
            </div>
            <div id="pvz-container-map" style="width:100%; height:600px;"  class="pvz-modal-togglable">

            </div>



        </div></div>
        <script id="ISDEKscript" type="text/javascript" src="https://widget.cdek.ru/widget/widjet.js"></script>
<!--        <script type="text/javascript">-->
<!--            var ourWidjet = new ISDEKWidjet ({-->
<!--                defaultCity: 'Москва', //какой город отображается по умолчанию-->
<!--                cityFrom: 'Москва', // из какого города будет идти доставка-->
<!--                country: 'Россия', // можно выбрать страну, для которой отображать список ПВЗ-->
<!--                link: 'pvz-container-map', // id элемента страницы, в который будет вписан виджет-->
<!--                path: 'https://widget.cdek.ru/widget/scripts/', //директория с библиотеками виджета-->
<!--                servicepath: '/service.php', //ссылка на файл service.php на вашем сайте-->
<!--                apikey: '8c6bc6c3-1d38-4091-8db8-16ed2494ad17' // ключ для корректной работы Яндекс.Карт, получить необходимо тут-->
<!--            });-->
<!--        </script>-->

<!--        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
<!--        <link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@21.12.0/dist/css/suggestions.min.css" rel="stylesheet" />-->
<!--        <script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@21.12.0/dist/js/jquery.suggestions.min.js"></script>-->

        <script>
            //Похоже, уже не нужно
            //Ни хрена не работает отсюда, зато пашет в консоли
            // jQuery().ready(function (){
            //     jQuery("#shipping_city").suggestions({
            //         token: "b65a5cdb6169ae07d375f4ff40f7065234690358",
            //         type: "ADDRESS",
            //         /* Вызывается, когда пользователь выбирает одну из подсказок */
            //         onSelect: function(suggestion) {
            //             console.log(suggestion);///Возможно, тут нужна обработка
            //         }
            //     });
            // });

        </script>
    </div>

<!--	--><?php //if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>
<!---->
<!--		<h3>--><?php //esc_html_e( 'Billing &amp; Shipping', 'woocommerce' ); ?><!--</h3>-->
<!---->
<!--	--><?php //else : ?>
<!---->
<!--		<h3>--><?php //esc_html_e( 'Billing details', 'woocommerce' ); ?><!--</h3>-->
<!---->
<!--	--><?php //endif; ?>

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

	<div class="woocommerce-billing-fields__field-wrapper">
		<?php
		$fields = $checkout->get_checkout_fields( 'billing' );

//        $fields['billing_city']['default'] = '';

        foreach ( $fields as $key => $field ){

            foreach( $field as $fieldKey => $fieldValue ){
                if( $fieldKey == "label" && $fieldValue == 'Телефон' ){
                    $fieldValue = "+7";
                }elseif( $fieldKey == "label" && $fieldValue == 'Населённый пункт' ){
                    $fieldValue = "Город";
                }

                if( $fieldKey == "label"  ){
                    $fields[$key]["placeholder"] = $fieldValue;
                    unset($fields[$key]["label"]);
                }
            }
        }

        function moveKeyBefore($arr, $find, $move) {
            if (!isset($arr[$find], $arr[$move])) {
                return $arr;
            }

            $elem = [$move=>$arr[$move]];  // cache the element to be moved
            $start = array_splice($arr, 0, array_search($find, array_keys($arr)));
            unset($start[$move]);  // only important if $move is in $start
            return $start + $elem + $arr;
        }

        $fields = moveKeyBefore($fields, 'billing_city', 'billing_phone');

//        var_dump($fields);

		foreach ( $fields as $key => $field ) {
            if( $key == 'billing_city'){
                echo "<span class='custom-checkout-field-separator' >Способ доставки:</span>";
            }
			woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
            if( $key == 'billing_phone' ){
                echo "<label class='custom-label' for='billing_phone' >На телефон поступит уведомление о доставке</label>";
            }elseif( $key == 'billing_city' ){
                echo "<label class='custom-label' for='billing_city' >Укажите ваш город, чтобы определить доступные способы доставки</label>";
            }
		}

		?>
	</div>

	<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
</div>

<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
	<div class="woocommerce-account-fields">
		<?php if ( ! $checkout->is_registration_required() ) : ?>

			<p class="form-row form-row-wide create-account">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ); ?> type="checkbox" name="createaccount" value="1" /> <span><?php esc_html_e( 'Create an account?', 'woocommerce' ); ?></span>
				</label>
			</p>

		<?php endif; ?>

		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

		<?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

			<div class="create-account">
				<?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
				<?php endforeach; ?>
				<div class="clear"></div>
			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
	</div>
<?php endif; ?>
