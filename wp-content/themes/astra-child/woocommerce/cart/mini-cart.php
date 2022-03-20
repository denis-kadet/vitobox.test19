<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */
$products = WC()->cart->get_cart();
defined( 'ABSPATH' ) || exit;
do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>
        <ul class="product__list <? echo (count($products) > 6 ? 'scrolled' : '') ;?>">
            <?php
    //		do_action( 'woocommerce_before_mini_cart_contents' );
    //        add_filter( 'woocommerce_enqueue_styles', '__return_false' );

            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                $recNum = $_product->get_attribute('rekomendovannoe-kolichestvo');
                $monthNum = $_product->get_attribute('kolichestvo-v-mesyacz');

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                    $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                    $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image('cart-image'), $cart_item, $cart_item_key );
                    $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                    ?>
                    <li class="product__item" id="<?=$product_id;?>" data-cart_item_key="<?=$cart_item_key;?>">
                        <div class="product__image">
                            <?=$thumbnail;?>
                        </div>
                        <div class="product__info">
                            <div class="product__name">
                                <?=$product_name;?>
                            </div>
                            <div class="product__note">
                                <?=$monthNum;?>
    <!--                            30 капсул/месяц (1 в день)-->
                            </div>
                            <div class="product__price">
                                <?=$product_price;?>
                            </div>
                        </div>
                        <div class="product__control">
                            <?php
                            echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                'woocommerce_cart_item_remove_link',
                                sprintf(
                                    '<a href="%s" class="remove_product" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">
                                    <img src="http://test19.softmg.ru/wp-content/themes/astra-child/assets/img/close_mark.svg" alt="Удалить продукт">
                                </a>',
                                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                    esc_attr__( 'Remove this item', 'woocommerce' ),
                                    esc_attr( $product_id ),
                                    esc_attr( $cart_item_key ),
                                    esc_attr( $_product->get_sku() )
                                ),
                                $cart_item_key
                            );
                            ?>
                            <div class="recommended">
                                <div class="recommended__wrapper">
                                    <div class="recommended__count"><?=$cart_item['quantity']?></div>
                                    <ul class="recommended_list">
                                        <?php for($i = 1; $i<=4; $i++) { ?>
                                            <? if( (int)$i == $recNum ):?>
                                                <li class="recommended__item"><?=$i;?>(рекомендуется)</li>
                                            <? else :?>
                                                <li class="recommended__item"><?=$i;?></li>
                                            <? endif ;?>
                                        <?php } ;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php //echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </li>
                    <?php
                }
            }

    //		do_action( 'woocommerce_mini_cart_contents' );
            ?>
        </ul>
    <?php if(WC()->cart->get_cart_subtotal()) :?>
        <div class="block__price">
            <div class="block__text">Подытог</div>
            <div id="subtotal" class="subtotal"><?=WC()->cart->get_cart_subtotal();?></div>
        </div>
    <?php endif; ?>
	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

<!--	<p class="woocommerce-mini-cart__buttons buttons">--><?php //do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?><!--</p>-->

	<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

<?php else : ?>
        <span style="padding:15px 0">Ваша корзина пуста.</span>
<!--	<p class="woocommerce-mini-cart__empty-message">--><?php //esc_html_e( 'No products in the cart.', 'woocommerce' ); ?><!--</p>-->

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
