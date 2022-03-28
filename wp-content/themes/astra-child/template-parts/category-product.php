<?php
global $post;
$products = new WP_Query( array(
    'post_type'      => array('product'),
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'tax_query'      => array( array(
        'taxonomy'        => 'pa_targets',
        'field'           => 'slug',
        'terms'           =>  array($args),
        'operator'        => 'IN',
    ) )
) );
?>
<ul class="catalog-list row">
    <?php
    // The Loop
    if ( $products->have_posts() ): while ( $products->have_posts() ):
        $products->the_post();
        global $product;
        ?>
        <li class="col-md-3">
            <a href="<?=$product->get_permalink();?>" class="catalog-item">
                <? if($product->get_meta('is_new') === 'yes' && $product->is_in_stock() ) :?>
                    <div class="catalog-status new">
                        new
                    </div>
                <? endif ;?>
                <? if(!$product->is_in_stock()) :?>
                    <div class="catalog-status disabled">
                        нет в наличии
                    </div>
                <? endif ;?>
                <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
                <div class="catalog-top" href="<?php echo get_permalink($product->post->ID) ?>">
                    <div class="catalog-image">
                        <?=get_the_post_thumbnail($products->post->ID, 'shop_single');?>
                    </div>
                    <div class="catalog-item-info">
                        <h3 class="catalog-title"><?php the_title(); ?></h3>
                        <span class="catalog-dosage"><?=$product->get_meta('_recommended_count');?></span>
                        <div class="category-attribute">
                            <?php
                                $subheadingvalues = get_the_terms( $product->id, 'pa_targets');
                                if(isset($subheadingvalues)){
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
                                }
                            ?>
                        </div>
                        <div class="catalog-desc-item">
                            <?= the_excerpt($product->post); ?>
                        </div>
                        <div class="catalog-item-price">
                            <?php echo $product->get_price_html(); ?>
                        </div>
                        <div class="catalog-recommended">
                            <?=$product->get_meta('_recommended_note');?>
                        </div>
                    </div>
                </div>
                <div class="catalog-bottom">
                    <?php woocommerce_template_loop_add_to_cart( $product->post, $product ); ?>
                </div>
            </a>
        </li>
    <?php
    endwhile;
        wp_reset_postdata();
    endif;
    ?>
</ul>