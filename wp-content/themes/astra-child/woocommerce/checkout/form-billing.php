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

                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14 0.25C11.2805 0.25 8.62209 1.05642 6.36092 2.56729C4.09974 4.07816 2.33737 6.22562 1.29666 8.73811C0.255958 11.2506 -0.0163382 14.0153 0.514209 16.6825C1.04476 19.3497 2.35432 21.7998 4.27729 23.7227C6.20026 25.6457 8.65028 26.9553 11.3175 27.4858C13.9848 28.0164 16.7494 27.7441 19.2619 26.7034C21.7744 25.6626 23.9218 23.9003 25.4327 21.6391C26.9436 19.3779 27.75 16.7195 27.75 14C27.7457 10.3546 26.2957 6.85973 23.718 4.28203C21.1403 1.70434 17.6454 0.254301 14 0.25ZM19.3025 17.5363C19.4219 17.6516 19.5171 17.7895 19.5826 17.942C19.6481 18.0945 19.6826 18.2585 19.6841 18.4245C19.6855 18.5905 19.6539 18.7551 19.591 18.9087C19.5282 19.0623 19.4354 19.2019 19.318 19.3193C19.2006 19.4366 19.0611 19.5294 18.9074 19.5923C18.7538 19.6551 18.5892 19.6868 18.4233 19.6853C18.2573 19.6839 18.0933 19.6494 17.9408 19.5839C17.7882 19.5184 17.6503 19.4231 17.535 19.3038L14 15.7675L10.465 19.3038C10.2293 19.5315 9.9135 19.6574 9.58575 19.6546C9.25801 19.6518 8.94449 19.5203 8.71273 19.2885C8.48097 19.0568 8.34951 18.7433 8.34666 18.4155C8.34382 18.0878 8.46981 17.772 8.69751 17.5363L12.2325 14L8.69751 10.4638C8.57812 10.3484 8.48289 10.2105 8.41738 10.058C8.35187 9.90551 8.31739 9.74148 8.31594 9.57551C8.3145 9.40953 8.34613 9.24493 8.40898 9.09131C8.47183 8.93769 8.56465 8.79813 8.68201 8.68076C8.79938 8.56339 8.93894 8.47058 9.09256 8.40773C9.24618 8.34488 9.41078 8.31325 9.57676 8.31469C9.74273 8.31613 9.90676 8.35062 10.0593 8.41613C10.2118 8.48164 10.3497 8.57687 10.465 8.69625L14 12.2325L17.535 8.69625C17.6503 8.57687 17.7882 8.48164 17.9408 8.41613C18.0933 8.35062 18.2573 8.31613 18.4233 8.31469C18.5892 8.31325 18.7538 8.34488 18.9074 8.40773C19.0611 8.47058 19.2006 8.56339 19.318 8.68076C19.4354 8.79813 19.5282 8.93769 19.591 9.09131C19.6539 9.24493 19.6855 9.40953 19.6841 9.57551C19.6826 9.74148 19.6481 9.90551 19.5826 10.058C19.5171 10.2105 19.4219 10.3484 19.3025 10.4638L15.7675 14L19.3025 17.5363Z" fill="#2D1E2F"/>
                </svg>
 
            </div>

            <div class="pvz-container-heading">

                <div class="pvz-container-heading-inner-container">
                    <div  class="pvz-container-heading__header">
                        <h3>Выберите удобный пункт</h3>
                    </div>
                </div>



                <div  class="pvz-container-heading__buttons">
                    <div class="pvz-container-heading__ready-button">
                        <button id="pvz-ready" class="checkout-transparent-button ">
                            Готово
                        </button>
                    </div>
                    <div class="pvz-container-heading__close-button">

                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 0.25C11.2805 0.25 8.62209 1.05642 6.36092 2.56729C4.09974 4.07816 2.33737 6.22562 1.29666 8.73811C0.255958 11.2506 -0.0163382 14.0153 0.514209 16.6825C1.04476 19.3497 2.35432 21.7998 4.27729 23.7227C6.20026 25.6457 8.65028 26.9553 11.3175 27.4858C13.9848 28.0164 16.7494 27.7441 19.2619 26.7034C21.7744 25.6626 23.9218 23.9003 25.4327 21.6391C26.9436 19.3779 27.75 16.7195 27.75 14C27.7457 10.3546 26.2957 6.85973 23.718 4.28203C21.1403 1.70434 17.6454 0.254301 14 0.25ZM19.3025 17.5363C19.4219 17.6516 19.5171 17.7895 19.5826 17.942C19.6481 18.0945 19.6826 18.2585 19.6841 18.4245C19.6855 18.5905 19.6539 18.7551 19.591 18.9087C19.5282 19.0623 19.4354 19.2019 19.318 19.3193C19.2006 19.4366 19.0611 19.5294 18.9074 19.5923C18.7538 19.6551 18.5892 19.6868 18.4233 19.6853C18.2573 19.6839 18.0933 19.6494 17.9408 19.5839C17.7882 19.5184 17.6503 19.4231 17.535 19.3038L14 15.7675L10.465 19.3038C10.2293 19.5315 9.9135 19.6574 9.58575 19.6546C9.25801 19.6518 8.94449 19.5203 8.71273 19.2885C8.48097 19.0568 8.34951 18.7433 8.34666 18.4155C8.34382 18.0878 8.46981 17.772 8.69751 17.5363L12.2325 14L8.69751 10.4638C8.57812 10.3484 8.48289 10.2105 8.41738 10.058C8.35187 9.90551 8.31739 9.74148 8.31594 9.57551C8.3145 9.40953 8.34613 9.24493 8.40898 9.09131C8.47183 8.93769 8.56465 8.79813 8.68201 8.68076C8.79938 8.56339 8.93894 8.47058 9.09256 8.40773C9.24618 8.34488 9.41078 8.31325 9.57676 8.31469C9.74273 8.31613 9.90676 8.35062 10.0593 8.41613C10.2118 8.48164 10.3497 8.57687 10.465 8.69625L14 12.2325L17.535 8.69625C17.6503 8.57687 17.7882 8.48164 17.9408 8.41613C18.0933 8.35062 18.2573 8.31613 18.4233 8.31469C18.5892 8.31325 18.7538 8.34488 18.9074 8.40773C19.0611 8.47058 19.2006 8.56339 19.318 8.68076C19.4354 8.79813 19.5282 8.93769 19.591 9.09131C19.6539 9.24493 19.6855 9.40953 19.6841 9.57551C19.6826 9.74148 19.6481 9.90551 19.5826 10.058C19.5171 10.2105 19.4219 10.3484 19.3025 10.4638L15.7675 14L19.3025 17.5363Z" fill="#2D1E2F"/>
                        </svg>

                    </div>
                </div>


            </div>





            <div class="pvz-container-heading-select-wrapper">
                <div class="pvz-container-heading-select">
                    <div class="pvz-container-heading-select__string">
                        <a id="pvz-by-list" class="pvz-container-heading-select__selected-string">Списком</a>
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


    </div>


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
