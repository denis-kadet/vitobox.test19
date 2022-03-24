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
                                <span id="shipping-address-modal-close" class="ahfb-svg-iconset ast-inline-flex svg-baseline"><svg class="ast-mobile-svg ast-close-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5.293 6.707l5.293 5.293-5.293 5.293c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0l5.293-5.293 5.293 5.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-5.293-5.293 5.293-5.293c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z"></path></svg></span>
                            </div>
                            <div class="shipping-address-modal-container-body">
                                <div class="shipping-address-modal-container-left">
                                    <div class="shipping-address-modal-container-right-street">
                                        <input placeholder="Улица" name="custom-address-street"/>
                                    </div>
                                    <div class="shipping-address-modal-container-details">
                                        <div class="shipping-address-modal-container-right-house">
                                            <input placeholder="Дом" name="custom-address-house/>
                                        </div>
                                        <div class="shipping-address-modal-container-right-apparts">
                                            <input placeholder="Квартира" name="custom-address-apparts"/>
                                        </div>
                                    </div>

                                    <div class="shipping-address-modal-container-bottom wp-block-button custom-color">
                                        <a id="fill-address-button" class="wp-block-button__link ">Готово</a>
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
                                        Ожидаемое время доставки
                                        <span>
                                            3 дня
                                        </span>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div id="pvz-container-address-details"><!--НЕ туда! Перенести ниже, в форму-->
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
</form>






<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
