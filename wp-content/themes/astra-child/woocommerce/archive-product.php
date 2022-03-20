<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action( 'woocommerce_before_main_content' );

?>
<?php get_template_part( 'woocommerce/content', 'product' ); ?>
    <style>
        .ast-container {
            flex-direction: column;
        }
    </style>
    <header class="woocommerce-products-header">
        <div class="intro-header">
            <div class="intro-title">
                Биодобавки, созданные специально для вас
            </div>
            <div class="intro-desc">
                Витамины, минералы и другие микронутриенты собранные со всего мира<br>
                и персонализированные специально для вас. Соберите собственный набор<br>
                витаминов на каждый день.
            </div>
        </div>
    </header>
    <div class="decor_container">
        <div class="background-decor top"></div>
        <div class="background-decor middle"></div>
        <div class="background-decor bottom"></div>
        <div class="ast-container">
            <div class="filter">
                <ul class="filter-list">
                    <li class="filter-item active">
                        <h2 class="title-filter">Категории</h2>
                    </li>
                    <li class="filter-item">
                        <h2 class="title-filter">Цели</h2>
                    </li>
                </ul>
                <div class="row">
                    <div class="filter-tabs col-12 col-md-12 active">
                        <div class="filter-wrapp">
                            <div class="filter-btn selected" data-category="all">Все продукты</div>
                            <?
                            $categories = get_terms( "product_cat", array(
                                "order" => "ASC", // Направление сортировки
                                "hide_empty" => 1,
                                "parent" => 0,
                                "exclude" => array(34,35),
                            ));
                            foreach ( $categories as $category ) {
                                ?>
                                <div class="filter-btn" id="<?=$category->term_id?>" data-category="<?=$category->slug?>">
                                    <?=$category->name?>
                                </div>
                                <?
                            }
                            ?>
                        </div>
                    </div>
                    <div class="filter-tabs col-12 col-md-12">
                        <div class="filter-wrapp">
                            <?
                            $attributes = wc_get_attribute_taxonomies();
                            foreach ($attributes as $attribute) {
                                if($attribute->attribute_name == 'targets'){
                                    $attribute->attribute_terms = get_terms(array(
                                        'taxonomy' => 'pa_'.$attribute->attribute_name,
                                        'hide_empty' => false,
                                    ));
                                    foreach ($attribute->attribute_terms as $target) {
                                        ?>
                                        <div class="filter-btn" data-target="<?=$target->slug?>">
                                            <svg class="inline-svg-icon cloud">
                                                <use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#<?=$target->slug?>"></use>
                                            </svg>
                                            <?=$target->name?>
                                        </div>
                                        <?
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ast-container" id="catalog-section">
            <?=getSections() ?>
        </div>
    </div>
<? get_footer( 'shop' ); ?>