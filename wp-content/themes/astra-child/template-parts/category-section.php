<?php
$get_categories_products = get_terms("product_cat", [
    "orderby" => "name", // Тип сортировки
    "order" => "ASC", // Направление сортировки
    "slug" => $args,
    "hide_empty" => 1, // Скрывать пустые. 1 - да, 0 - нет.
    "exclude" => array(34,35),
]);
?>
<?if( $get_categories_products ):?>
    <?php foreach( $get_categories_products as $get_categories_product ): ?>
        <?php if($get_categories_product->parent) :?>
        <?php
        $category_thumbnail = get_term_meta($get_categories_product->term_id, 'thumbnail_id', true);
        $image = wp_get_attachment_url($category_thumbnail);
        // Выполнение запроса по категориям и атрибутам
        $args = array(
            'product_cat' => $get_categories_product->slug,
            'posts_per_page' => -1, // количество выводимых товаров
            'post_type' => 'product',
            'orderby' => 'title', // сортировка
        );
        ?>
        <div class="category">
            <div class="category-wrapp">
                <div class="category-info">
                    <h2 class="category-title"><?=esc_html($get_categories_product->name); ?></h2>
                    <div class="category-desc">
                        <?=esc_html($get_categories_product->description); ?>
                    </div>
                </div>
                <div class="category-image" style='background-image:url("<?=$image;?>")'></div>
                <ul class="catalog-list row">
                    <li class="col-md-3"></li>
                    <?php
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                        global $product, $post;
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
                                <div class="catalog-top" href="<?php echo get_permalink($loop->post->ID) ?>">
                                    <div class="catalog-image">
                                        <?=get_the_post_thumbnail($loop->post->ID, 'shop_single');?>
                                    </div>
                                    <div class="catalog-item-info">
                                        <h3 class="catalog-title"><?php the_title(); ?></h3>
                                        <span class="catalog-dosage"><?=$product->get_meta('_recommended_count');?></span>
                                        <div class="category-attribute">
                                            <?php $subheadingvalues = get_the_terms( $product->id, 'pa_targets');
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
                                            <?=the_excerpt($loop->post); ?>
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
                                    <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
                                </div>
                            </a>
                        </li>
                    <?php endwhile; ?>
                    <!-- Сброс данных запроса -->
                    <?php wp_reset_query(); ?>
                </ul>
            </div>
        </div>
        <?php endif ;?>
    <?php endforeach; ?>
<?php endif; ?>