<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $upsells ) : ?>
    <section class="s" id="product-upsell" style="background-image:url('/wp-content/themes/astra-child/assets/img/light_motion.png');background-position-y: -200px;">
        <div class="ast-container">
            <div class="product__recommended-content">
                <?php
                $heading = apply_filters( 'woocommerce_product_upsells_products_heading', __( 'Рекомендуем также', 'woocommerce' ) );

                if ( $heading ) :
                    ?>
                    <div class="recommend-text">
                        <h3 class="recommend-title"><?php echo esc_html( $heading ); ?></h3>
                        <p class="recommend-desc">Отлично сочетается с другими витаминами</p>
                    </div>
                <?php endif; ?>

                <ul class="catalog-list row" id="recommend-slide">

                    <?php foreach ( $upsells as $upsell ) : ?>
                        <?
                            $post_object = get_post( $upsell->get_id() );

                            setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
                        ?>
                        <li class="col-md-3">
                            <a href="<?=$upsell->get_permalink();?>" class="catalog-item">
                                <? if($upsell->get_meta('is_new') === 'yes' && $upsell->is_in_stock() ) :?>
                                    <div class="catalog-status new">
                                        new
                                    </div>
                                <? endif ;?>
                                <? if(!$upsell->is_in_stock()) :?>
                                    <div class="catalog-status disabled">
                                        нет в наличии
                                    </div>
                                <? endif ;?>
                                <?php woocommerce_show_product_sale_flash( $upsell ); ?>
                                <div class="catalog-top" href="<?php echo get_permalink($upsell->post->ID) ?>">
                                    <div class="catalog-image">
                                        <?=get_the_post_thumbnail($upsell->post->ID, 'shop_single');?>
                                    </div>
                                    <div class="catalog-item-info">
                                        <h3 class="catalog-title"><?=$upsell->name?></h3>
                                        <span class="catalog-dosage"><?=$upsell->get_meta('_recommended_count');?></span>
                                        <div class="category-attribute">
                                            <?php $subheadingvalues = get_the_terms( $upsell->id, 'pa_targets');
                                            if($subheadingvalues){
                                                foreach ( $subheadingvalues as $subheadingvalue ) {
                                                    ?>
                                                    <div class="catalog-icon">
                                                        <svg>
                                                            <title><?=$subheadingvalue->name;?></title>
                                                            <use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#<?=$subheadingvalue->slug;?>"></use>
                                                        </svg>
                                                    </div>
                                                    <?
                                                }
                                            }?>
                                        </div>
                                        <div class="catalog-desc-item">
                                            <?=the_excerpt($upsell->post); ?>
                                        </div>
                                        <div class="catalog-item-price">
                                            <?php echo $upsell->get_price_html(); ?>
                                        </div>
                                        <div class="catalog-recommended">
                                            <?=$upsell->get_meta('_recommended_note');?>
                                        </div>
                                    </div>
                                </div>
                                <div class="catalog-bottom">
                                    <?php woocommerce_template_loop_add_to_cart( $upsell->post, $upsell ); ?>
                                </div>
                            </a>
                        </li>

                    <?php endforeach; ?>

                </ul>
            </div>
        </div>
	</section>

	<?php
endif;

wp_reset_postdata();

?>

<!--<ul class="catalog-list row" id="recommend-slide">-->

<!--</ul>-->
