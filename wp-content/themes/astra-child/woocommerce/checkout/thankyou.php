<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<style>
    .checkout-bottom-container__info{
        display: none;
    }


</style>
<div class="woocommerce-order">

	<?php
	if ( $order ) :
		do_action( 'woocommerce_before_thankyou', $order->get_id() );
        if( isset( $_COOKIE["basketVitobox"] ) ){
            $_COOKIE["basketVitobox"] = "[]";
            setcookie('basketVitobox', "[]", -1, '/');
        }
//        var_dump($order->get_shipping_address_1() );
		?>
		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

<!--			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">--><?php //echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><!--</p>-->
            <div class="thank-you-flex-container">
                <div class="thank-you-page-left-column">
                    <div class="thank-you-text">
                        <div class="thank-you-text-title">Спасибо за ваш заказ!</div>

                        <div class="">Мы уже отправили всю необходимую<br />информацию вам на почту.</div>
                        <br />
                        <div class="thank-you-text-track">Номер вашего заказа:
                            <?echo $order->get_order_number();?>
                        </div>
                        <br />

                    </div>

                    <div class="thank-you-text-mobile-img-container">

                    </div>

                    <div class="thank-you-support">Отались вопросы? Наша поддержка всегда готова ответить
                        на них, свяжитесь с нами любым удобным способом</div>
                </div>
            </div>

        <?php get_template_part( "template-parts/footer-social" );?>

		<?php endif; ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

	<?php endif; ?>

</div>
<script>
    jQuery(function ($){
        if($('.uuid-container')){
            let uuid = $('.uuid-container').text();
            dataStr = {uuid: uuid};
            $.ajax({
                    type: "POST",
                    data: dataStr,
                    url: "/AjaxCdekOrderGetter.php",
                    success: function (data) {
                        let dataObj = JSON.parse(data)
                        let cdekNumber = dataObj.entity.cdek_number;
                        let trackingLink = 'https://cdek.ru/tracking?order_id=' + cdekNumber;
                        $('.thank-you-text-track a').attr('href', trackingLink);
                        $('.thank-you-text-track a').text(cdekNumber);
                    }

                })
        }else{
            // console.log('not uuid')
        }
    })
</script>