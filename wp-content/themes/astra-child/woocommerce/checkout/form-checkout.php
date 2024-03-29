<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>



<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
    <input id="shipping_to" type="hidden" name="shipping_to" value="address"/>
<!--    <h1 class="entry-title" itemprop="headline">Оформление заказа</h1>-->



    <?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
        <div class="customer-info-container">

            <div class="col2-set" id="customer_details">
                <div class="col-1">
                    <?php do_action( 'woocommerce_checkout_billing' ); ?>
                </div>

                <div class="col-2">
                    <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                    <div class="customer-info-container-shipping-select">
                        <div class="customer-info-container-shipping-select__button">
                            <button id="shipping-to-adress">
                                <div class="customer-info-container-shipping-select-circle"></div>
                                <span>Курьером до двери</span>
                            </button>
                        </div>
                        <div class="customer-info-container-shipping-select__button">
                            <button id="shipping-to-pvz">
                                <div class="customer-info-container-shipping-select-circle"></div>
                                <span>
                                    В пункты выдачи
                                </span>
                            </button>
                        </div>
                    </div>

                    <div id="shipping-address-modal">
                        <div class="shipping-address-modal-container">
                            <div class="shipping-address-modal-container-header">
                                <div class="shipping-address-modal-container-header__string">
                                    <h4>Введите адрес доставки:</h4>
                                </div>
                                <span id="shipping-address-modal-close" class=""><svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14 0.25C11.2805 0.25 8.62209 1.05642 6.36092 2.56729C4.09974 4.07816 2.33737 6.22562 1.29666 8.73811C0.255958 11.2506 -0.0163382 14.0153 0.514209 16.6825C1.04476 19.3497 2.35432 21.7998 4.27729 23.7227C6.20026 25.6457 8.65028 26.9553 11.3175 27.4858C13.9848 28.0164 16.7494 27.7441 19.2619 26.7034C21.7744 25.6626 23.9218 23.9003 25.4327 21.6391C26.9436 19.3779 27.75 16.7195 27.75 14C27.7457 10.3546 26.2957 6.85973 23.718 4.28203C21.1403 1.70434 17.6454 0.254301 14 0.25ZM19.3025 17.5363C19.4219 17.6516 19.5171 17.7895 19.5826 17.942C19.6481 18.0945 19.6826 18.2585 19.6841 18.4245C19.6855 18.5905 19.6539 18.7551 19.591 18.9087C19.5282 19.0623 19.4354 19.2019 19.318 19.3193C19.2006 19.4366 19.0611 19.5294 18.9074 19.5923C18.7538 19.6551 18.5892 19.6868 18.4233 19.6853C18.2573 19.6839 18.0933 19.6494 17.9408 19.5839C17.7882 19.5184 17.6503 19.4231 17.535 19.3038L14 15.7675L10.465 19.3038C10.2293 19.5315 9.9135 19.6574 9.58575 19.6546C9.25801 19.6518 8.94449 19.5203 8.71273 19.2885C8.48097 19.0568 8.34951 18.7433 8.34666 18.4155C8.34382 18.0878 8.46981 17.772 8.69751 17.5363L12.2325 14L8.69751 10.4638C8.57812 10.3484 8.48289 10.2105 8.41738 10.058C8.35187 9.90551 8.31739 9.74148 8.31594 9.57551C8.3145 9.40953 8.34613 9.24493 8.40898 9.09131C8.47183 8.93769 8.56465 8.79813 8.68201 8.68076C8.79938 8.56339 8.93894 8.47058 9.09256 8.40773C9.24618 8.34488 9.41078 8.31325 9.57676 8.31469C9.74273 8.31613 9.90676 8.35062 10.0593 8.41613C10.2118 8.48164 10.3497 8.57687 10.465 8.69625L14 12.2325L17.535 8.69625C17.6503 8.57687 17.7882 8.48164 17.9408 8.41613C18.0933 8.35062 18.2573 8.31613 18.4233 8.31469C18.5892 8.31325 18.7538 8.34488 18.9074 8.40773C19.0611 8.47058 19.2006 8.56339 19.318 8.68076C19.4354 8.79813 19.5282 8.93769 19.591 9.09131C19.6539 9.24493 19.6855 9.40953 19.6841 9.57551C19.6826 9.74148 19.6481 9.90551 19.5826 10.058C19.5171 10.2105 19.4219 10.3484 19.3025 10.4638L15.7675 14L19.3025 17.5363Z" fill="#2D1E2F"/>
</svg></span>
                            </div>
                            <div class="shipping-address-modal-container-body">
                                <div class="shipping-address-modal-container-left">
                                    <div class="shipping-address-modal-container-right-street">
                                        <input placeholder="Улица" class="ignore input-text" name="custom-address-street"/>
                                    </div>
                                    <div class="shipping-address-modal-container-details">
                                        <div class="shipping-address-modal-container-right-house">
                                            <input placeholder="Дом"  class="ignore input-text"  name="custom-address-house" />
                                        </div>
                                        <div class="shipping-address-modal-container-right-apparts">
                                            <input placeholder="Квартира"  class="ignore input-text"  name="custom-address-apparts"/>
                                        </div>
                                    </div>

                                    <div class="shipping-address-modal-container-bottom wp-block-button custom-color">
                                        <button id="fill-address-button" class="checkout-transparent-button">Готово</button>
                                    </div>

                                </div>

                                <div class="shipping-address-modal-container-right">
                                    <div class="shipping-address-modal-container-right-clock">
                                        <svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M41.5057 37.1947L41.5063 37.1951C42.1702 37.6923 42.3039 38.6327 41.8069 39.2928L41.8069 39.2928L41.8033 39.2977C41.5115 39.6906 41.0656 39.8971 40.6024 39.8971C40.2887 39.8971 39.9752 39.8003 39.7041 39.5969L39.7041 39.5969L30.0992 32.3931L30.0973 32.3918C29.7217 32.1115 29.4986 31.6666 29.4986 31.1921V16.7846C29.4986 15.9537 30.1691 15.2833 30.9999 15.2833C31.8308 15.2833 32.5012 15.9537 32.5012 16.7846V29.9913V30.4413L32.8612 30.7113L41.5057 37.1947Z" fill="#2C1E2F" stroke="white" stroke-width="1.8"/>
                                            <path d="M0.9 31C0.9 14.4026 14.4026 0.9 31 0.9C47.5974 0.9 61.1 14.4026 61.1 31C61.1 47.5974 47.5974 61.1 31 61.1C14.4026 61.1 0.9 47.5974 0.9 31ZM3.90246 31C3.90246 45.9405 16.0595 58.0975 31 58.0975C45.9405 58.0975 58.0975 45.9405 58.0975 31C58.0975 16.0595 45.943 3.90246 31 3.90246C16.0595 3.90246 3.90246 16.0595 3.90246 31Z" fill="#2C1E2F" stroke="white" stroke-width="1.8"/>
                                        </svg>
                                    </div>
                                    <div class="shipping-address-modal-container-right-expected-time">
                                        <div>
                                            <span class="shipping-address-modal-container-right-expected-time__legeng" >
                                                Ожидаемое время доставки
                                            </span>
                                            <span>
                                                3 дня
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div id="pvz-container-address-details">
                        <div class="pvz-container-address-details__address">
                            <div class="pvz-container-address-details-label">
                                Адрес ПВЗ:
                            </div>
                            <div class="pvz-container-address-details-data">

                            </div>
                        </div>
                        <div class="pvz-container-address-details__price">
                            <div class="pvz-container-address-details-label">
                                Стоимость:
                            </div>
                            <div class="pvz-container-address-details-data">

                            </div>
                        </div>
                        <div class="pvz-container-address-details__terms">
                            <div class="pvz-container-address-details-label">
                                Время доставки:
                            </div>
                            <div class="pvz-container-address-details-data">

                            </div>
                        </div>
                    </div>

                    <div id="personal-container-address-details">
                        <div class="personal-container-address-details__address">
                            <div class="personal-container-address-details-label">
                                Адрес:
                            </div>
                            <div class="personal-container-address-details-data">

                            </div>
                        </div>
                        <div class="personal-container-address-details__price">
                            <div class="personal-container-address-details-label">
                                Стоимость:
                            </div>
                            <div class="personal-container-address-details-data">
                                280 &#8381;
                            </div>
                        </div>
                        <div class="personal-container-address-details__terms">
                            <div class="personal-container-address-details-label">
                                Время доставки:
                            </div>
                            <div class="personal-container-address-details-data">
                                3 дня
                            </div>
                        </div>
                    </div>
                </div>

            <div class="after-shipping-container">

                <div class="after-shipping-container-heading">
                    <span>Оплата</span>
                </div>

                <div class="promo-input-container">
                    <input type="text" id="custom-promo" name="custom-promo" class="input-text custom-promo ignore" placeholder="Промокод" />
                </div>


                <div class="announcement-subscribe__container">
                    Оплачивая заказ, вы активируете подписку <br />
                    на ежемесячный набор витаминов и добавок.<br /><br />
                    В конце каждого месяца вам будет приходить уведомление на <br />
                    email и SMS с напоминанием, что ваш набор заканчивается.<br /><br />
                    Никаких рисков: подписку можно отменить в любое время - достаточно написать нам в поддержку любым удобным способом.
                </div>
            </div>

            </div>



        </div>



		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>



	<?php endif; ?>

	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
    <div class="order_review__wrapper">
        <div class="order_review__container">
            <h3 id="order_review_heading">Состав вашего заказа</h3>

            <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

            <div id="order_review" class="woocommerce-checkout-review-order">
                <?php do_action( 'woocommerce_checkout_order_review' ); ?>
            </div>
        </div>

        <div class="announcement__container">
            <div class="announcement__text">
                Нажимая кнопку “Оформить заказ”, вы соглашаетесь с нашей <a href="">политикой конфиденциальности,</a> принимаете <a href="">пользовательское соглашение</a>  и <a href="">договор оферты</a>.
            </div>
        </div>

    </div>
	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

<!--    <h1>changed chekcout</h1>-->

    <div class="CDEK-widget__preloader" id="copy_preloader" style=""><div class="CDEK-widget__preloader-truck"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 440.34302 315.71001">  <g><path class="path1" d="M416.43,188.455q-1.014-1.314-1.95-2.542c-7.762-10.228-14.037-21.74-19.573-31.897-5.428-9.959-10.555-19.366-16.153-25.871-12.489-14.513-24.24-21.567-35.925-21.567H285.128c-0.055.001-5.567,0.068-12.201,0.068h-9.409a14.72864,14.72864,0,0,0-14.262,11.104l-0.078.305V245.456l0.014,0.262a4.86644,4.86644,0,0,1-1.289,3.472c-1.587,1.734-4.634,2.65-8.812,2.65H14.345C6.435,251.839,0,257.893,0,265.334v46.388c0,7.441,6.435,13.495,14.345,13.495h49.36a57.8909,57.8909,0,0,0,115.335,0h82.61a57.89089,57.89089,0,0,0,115.335,0H414.53a25.8416,25.8416,0,0,0,25.813-25.811v-44.29C440.344,219.47,425.953,200.805,416.43,188.455ZM340.907,320.132a21.5865,21.5865,0,1,1-21.59-21.584A21.61074,21.61074,0,0,1,340.907,320.132ZM390.551,207.76c-0.451.745-1.739,1.066-3.695,0.941l-99.197-.005V127.782h42.886c11.539,0,19.716,5.023,28.224,17.337,5.658,8.19,20.639,33.977,21.403,35.293,0.532,1.027,1.079,2.071,1.631,3.125C386.125,191.798,392.658,204.279,390.551,207.76ZM121.372,298.548a21.58351,21.58351,0,1,1-21.583,21.584A21.6116,21.6116,0,0,1,121.372,298.548Z" transform="translate(0 -62.31697)"></path><path class="path2" d="M30.234,231.317h68a12.51354,12.51354,0,0,0,12.5-12.5v-50a12.51354,12.51354,0,0,0-12.5-12.5h-68a12.51354,12.51354,0,0,0-12.5,12.5v50A12.51418,12.51418,0,0,0,30.234,231.317Z" transform="translate(0 -62.31697)"></path><path class="path3" d="M143.234,231.317h68a12.51354,12.51354,0,0,0,12.5-12.5v-50a12.51354,12.51354,0,0,0-12.5-12.5h-68a12.51354,12.51354,0,0,0-12.5,12.5v50A12.51418,12.51418,0,0,0,143.234,231.317Z" transform="translate(0 -62.31697)"></path><path class="path4" d="M30.234,137.317h68a12.51354,12.51354,0,0,0,12.5-12.5v-50a12.51355,12.51355,0,0,0-12.5-12.5h-68a12.51355,12.51355,0,0,0-12.5,12.5v50A12.51418,12.51418,0,0,0,30.234,137.317Z" transform="translate(0 -62.31697)"></path><path class="path5" d="M143.234,137.317h68a12.51354,12.51354,0,0,0,12.5-12.5v-50a12.51354,12.51354,0,0,0-12.5-12.5h-68a12.51354,12.51354,0,0,0-12.5,12.5v50A12.51418,12.51418,0,0,0,143.234,137.317Z" transform="translate(0 -62.31697)"></path>  </g></svg><div class="CDEK-widget__preloader-truck__grass"></div><div class="CDEK-widget__preloader-truck__road"></div></div></div>
</form>



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
                        <button id="pvz-ready" href="javascript:void(0)" class="checkout-transparent-button ">
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
                    <button id="pvz-ready-mobile" class="checkout-transparent-button ">
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



<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
