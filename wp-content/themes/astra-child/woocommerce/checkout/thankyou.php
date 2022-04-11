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
function sendToSdek( $ord ){

    $shipping_arr['recipient_name'] = $ord->data['billing']['first_name'] . " " . $ord->data['billing']['last_name'];
    $shipping_arr['recipient_phone'] = $ord->data['billing']['phone'];
    $shipping_arr['shipping_address'] = $ord->data['billing']["address_1"];
    $shipping_arr['shipping_city'] = $ord->data['billing']["city"];

//    $package = $ord->data['billing']["city"];
    require "CdekOrderSender.php";
    $cdekOrderSender = new CdekOrderSender($shipping_arr);

    return $cdekOrderSender->getUuid();
}
?>

<style>
    .checkout-bottom-container__info{
        display: none;
    }


</style>
<div class="woocommerce-order">

	<?php
	if ( $order ) :
//        var_dump($order);
		do_action( 'woocommerce_before_thankyou', $order->get_id() );
//        var_dump($order->get_shipping_address_1() );
        if( 1==1/*$order->get_shipping_address_1() == ""*/ ){

            echo "<div class='uuid-container'>";
            $uuid = sendToSdek($order);
            echo "</div>";
//            var_dump($uuid);
            update_post_meta( $order->get_id(), '_shipping_address_1', $order->get_billing_address_1());
            update_post_meta( $order->get_id(), '_shipping_address_2', $uuid);

        }else{
            echo "<div class='uuid-container'>";
            echo $uuid;
            echo "</div>";
        }


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
                        <div class="thank-you-text-track">Трек номер посылки <a href="https://cdek.ru/tracking?order_id=23456789">RP23456789</a></div>
                        <br />
                        <div class="thank-you-text-link">На следующий день после заказа вы сможете отследить доставку перейдя по ссылке:
                            <a href="https://cdek.ru/tracking">cdek.ru/tracking</a></div>
                    </div>

                    <div class="thank-you-text-mobile-img-container">

                    </div>

                    <div class="thank-you-support">Отались вопросы? Наша поддержка всегда готова ответить
                        на них, свяжитесь с нами любым удобным способом</div>
                </div>

                <div class="thank-you-page-right-column">
                    <img src="/wp-content/themes/astra-child/assets/img/thank-you-box.png" alt="thank-you-box" />

                </div>
            </div>



        <?php get_template_part( "template-parts/footer-social" );
//            var_dump(wc_shiptor_get_tracking_codes($order));
//            echo "<hr >";
//
//            var_dump($order);
//            echo "<hr >";
//            var_dump(wc_shiptor_get_tracking_codes("25027"));
//        echo "<hr >";
//
////        var_dump(wc_get_order(25026));

//            die();?>

<!--            <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">-->
<!---->
<!--				<li class="woocommerce-order-overview__order order">-->
<!--					--><?php //esc_html_e( 'Order number:', 'woocommerce' ); ?>
<!--					<strong>--><?php //echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><!--</strong>-->
<!--				</li>-->
<!---->
<!--				<li class="woocommerce-order-overview__date date">-->
<!--					--><?php //esc_html_e( 'Date:', 'woocommerce' ); ?>
<!--					<strong>--><?php //echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><!--</strong>-->
<!--				</li>-->
<!---->
<!--				--><?php //if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
<!--					<li class="woocommerce-order-overview__email email">-->
<!--						--><?php //esc_html_e( 'Email:', 'woocommerce' ); ?>
<!--						<strong>--><?php //echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><!--</strong>-->
<!--					</li>-->
<!--				--><?php //endif; ?>
<!---->
<!--				<li class="woocommerce-order-overview__total total">-->
<!--					--><?php //esc_html_e( 'Total:', 'woocommerce' ); ?>
<!--					<strong>--><?php //echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><!--</strong>-->
<!--				</li>-->
<!---->
<!--				--><?php //if ( $order->get_payment_method_title() ) : ?>
<!--					<li class="woocommerce-order-overview__payment-method method">-->
<!--						--><?php //esc_html_e( 'Payment method:', 'woocommerce' ); ?>
<!--						<strong>--><?php //echo wp_kses_post( $order->get_payment_method_title() ); ?><!--</strong>-->
<!--					</li>-->
<!--				--><?php //endif; ?>
<!---->
<!--			</ul>-->

		<?php endif; ?>

<!--		--><?php //do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
<!--		--><?php //do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

<!--        <div class="checkout-bottom-container__vitobox-logo">-->
<!--            <a href="vitobox.ru"></a>-->
<!--        </div>-->

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