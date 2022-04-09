<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>
    <?php
        $basket = urldecode($_COOKIE['basketVitobox']);
        $basket = json_decode($basket, true);
        $in_cart = false;
    ?>
	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<?php
//		do_action( 'woocommerce_before_add_to_cart_quantity' );

		woocommerce_quantity_input(
			array(
				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
			)
		);

//		do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>
        <?foreach ($basket as $value):?>
            <?if($value["id"] === $product->get_id() ):?>
                <?php $in_cart = true; ;?>
            <?endif;?>
        <?endforeach;?>
        <?if ($in_cart):?>
            <div class="product__simple-quantity" style="display: block;">
                <span class="product__simple-text-quantity"><?=$value["quantity"]?></span>
                <ul class="list-quantity-options">
                    <li class="item-quantity-option">1</li>
                    <li class="item-quantity-option">2</li>
                    <li class="item-quantity-option">3</li>
                </ul>
            </div>
            <button id="single-btn" type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" data-product_sku="<?=$product->get_sku();?>" style="background-color: rgb(255, 255, 255); color: rgb(247, 184, 1);<?=wp_is_mobile() ? 'width:calc( 100% - 64px )' : ''?>" class="single_add_to_cart_button button alt" disabled><?php echo 'Добавлено';?></button>
        <? else :?>
            <div class="product__simple-quantity">
                <span class="product__simple-text-quantity">1</span>
                <ul class="list-quantity-options">
                    <li class="item-quantity-option">1</li>
                    <li class="item-quantity-option">2</li>
                    <li class="item-quantity-option">3</li>
                </ul>
            </div>
            <button id="single-btn" type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" data-product_sku="<?=$product->get_sku();?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
        <?endif;?>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
