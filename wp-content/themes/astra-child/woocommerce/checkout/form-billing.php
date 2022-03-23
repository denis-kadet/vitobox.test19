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
            <div class="pvz-container-heading">
                <div  class="pvz-container-heading__header">
                    <h3>Выберите удобный пункт</h3>
                </div>
                <div  class="pvz-container-heading__buttons">
                    <div class="pvz-container-heading__ready-button">
                        <button id="pvz-ready">
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

            <div id="pvz-container-list" class="pvz-modal-togglable" >
                <?php require "CdekPvz.php";?>
            </div>
            <div id="pvz-container-map" style="width:100%; height:600px;"  class="pvz-modal-togglable">

            </div>



        </div></div>
        <script id="ISDEKscript" type="text/javascript" src="https://widget.cdek.ru/widget/widjet.js"></script>
        <script type="text/javascript">
            var ourWidjet = new ISDEKWidjet ({
                defaultCity: 'Москва', //какой город отображается по умолчанию
                cityFrom: 'Москва', // из какого города будет идти доставка
                country: 'Россия', // можно выбрать страну, для которой отображать список ПВЗ
                link: 'pvz-container-map', // id элемента страницы, в который будет вписан виджет
                path: 'https://widget.cdek.ru/widget/scripts/', //директория с библиотеками виджета
                servicepath: '/service.php', //ссылка на файл service.php на вашем сайте
                apikey: '8c6bc6c3-1d38-4091-8db8-16ed2494ad17' // ключ для корректной работы Яндекс.Карт, получить необходимо тут
            });
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@21.12.0/dist/css/suggestions.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@21.12.0/dist/js/jquery.suggestions.min.js"></script>

        <script>
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

        $fields['billing_city']['default'] = 'Москва';

        foreach ( $fields as $key => $field ){

            foreach( $field as $fieldKey => $fieldValue ){
                if( $fieldKey == "label" && $fieldValue == 'Телефон' ){
                    $fieldValue = "+7";
                }elseif( $fieldKey == "label" && $fieldValue == 'Населённый пункт' ){
                    $fieldValue = "Москва";
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
