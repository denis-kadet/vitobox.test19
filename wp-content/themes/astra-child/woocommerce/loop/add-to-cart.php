<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
$basket = urldecode($_COOKIE['basketVitobox']);
$basket = json_decode($basket, true);
$in_cart = false;
?>
<?foreach ($basket as $value):?>
    <?if($value["id"] === $product->get_id() ):?>
        <?php $in_cart = true; ;?>
    <?endif;?>
<?endforeach;?>

<? if($in_cart) :?>
    <?php
        echo apply_filters(
            'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
            sprintf(
                '<button data-quantity="%s" class="%s" %s>%s<svg style="width:44px;height: 44px;" class="mobile-basket-icon"><use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#%s"></use></svg></button>',
                esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
                esc_attr( isset( $args['class'] ) && $product->is_in_stock() ? $args['class'].' added' : $args['class'].' disabled' ),
                isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ).' disabled' : '',
                esc_html( $product->is_in_stock() ? 'Добавлено' : 'Нет в наличии' ),
                wp_is_mobile() ? 'success' : 'box'
            ),
            $product,
            $args
        );
    ?>
<? else :?>
    <?php
        echo apply_filters(
            'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
            sprintf(
                '<button data-quantity="%s" class="%s" %s>%s<svg class="mobile-basket-icon"><use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#box"></use></svg></button>',
                esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
                esc_attr( isset( $args['class'] ) && $product->is_in_stock() ? $args['class'] : $args['class'].' disabled' ),
                isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
                esc_html( $product->is_in_stock() ? $product->add_to_cart_text() : 'Нет в наличии' )
            ),
            $product,
            $args
        );
    ?>
<? endif ;?>

