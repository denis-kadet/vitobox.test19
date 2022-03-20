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
                <div class="promo-input-container">
                    <input type="text" name="" class="input-text" placeholder="Промокод" />
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
