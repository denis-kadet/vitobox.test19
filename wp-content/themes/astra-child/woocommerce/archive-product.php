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
        <div class="background__decor-container">
            <div class="background-decor top"></div>
            <div class="background-decor middle"></div>
            <div class="background-decor bottom"></div>
        </div>
        <div class="ast-container" id="filter-catalog">
            <div class="filter">
                <div class="mobile-filter-check">
                    <div class="mobile-filter-wrapper">
                        <span class="mobile-filter-name">Фильтр:</span>
                        <span id="select-filter">Моновитамины</span>
                        <button id="clearfilter">Очистить</button>
                    </div>
                </div>
                <ul class="filter-list">
                    <li class="filter-item">
                        <h2 class="title-filter" data-filter="category">Категории</h2>
                    </li>
                    <li class="filter-item" data-filter="target">
                        <h2 class="title-filter">Цели</h2>
                    </li>
                </ul>
                <div class="row">
                    <div class="filter-tabs col-12 col-md-12">
                        <div class="filter-wrapp">
                            <div class="mobile__header-filter">
                                Категории
                                <div class="mobile__filter-close"></div>
                            </div>
                            <?if(wp_is_mobile()):?>
                                <div class="mobile__filter-list">
                                    <div class="filter-btn" data-category="all" style="margin-bottom: 32px;">Все продукты</div>
                                    <?
                                    $categories = get_terms( "product_cat", array(
                                        "order" => "ASC", // Направление сортировки
                                        "hide_empty" => 1,
                                        'parent' => 0
                                    ));
                                    foreach ( $categories as $category ) {
                                        ?>
                                        <div class="filter__category-name" id="<?=$category->term_id?>" data-catindex="<?=$category->term_id?>">
                                            <?=$category->name?>
                                        </div>
                                        <div class="filter-list-subcategory" data-id_category="<?=$category->term_id?>">
                                            <div class="filter-wrapp-subcategory">
                                                <?
                                                $sub_cat_data = get_terms( "product_cat", array(
                                                    "order" => "ASC", // Направление сортировки
                                                    "hide_empty" => 1,
                                                    'parent' => $category->term_id
                                                ));
                                                ?>
                                                <?foreach ( $sub_cat_data as $subcategory ) :?>
                                                    <div class="filter-btn"  data-category="<?=$subcategory->slug?>">
                                                        <?=$subcategory->name?>
                                                    </div>
                                                <?endforeach;?>
                                            </div>
                                        </div>
                                        <?
                                    }
                                    ?>
                                </div>
                            <? else :?>
                                <div class="filter-list-items">
                                    <div class="filter-btn selected" data-category="all">Все продукты</div>
                                    <?
                                    $categories = get_terms( "product_cat", array(
                                        "order" => "ASC", // Направление сортировки
                                        "hide_empty" => 1,
                                        'parent' => 0
                                    ));
                                    $category_id = [];
                                    foreach ( $categories as $key => $category ) {
                                        array_push($category_id, $category->term_id );
                                        ?>
                                        <div class="filter-btn" id="<?=$category->term_id?>" data-catindex="<?=$key?>">
                                            <?=$category->name?>
                                        </div>
                                        <?
                                    }
                                    ?>
                                </div>
                                <?foreach ($category_id as $id):?>
                                    <div class="filter-list-subcategory" data-id_category="<?=$id?>">
                                        <div class="filter-wrapp-subcategory">
                                            <?
                                            $sub_cat_data = get_terms( "product_cat", array(
                                                "order" => "ASC", // Направление сортировки
                                                "hide_empty" => 1,
                                                'parent' => intval($id)
                                            ));
                                            ?>
                                            <?foreach ( $sub_cat_data as $subcategory ) :?>
                                                <div class="filter-btn"  data-category="<?=$subcategory->slug?>">
                                                    <?=$subcategory->name?>
                                                </div>
                                            <?endforeach;?>
                                        </div>
                                    </div>
                                <?endforeach;?>
                            <?endif;?>
                        </div>
                    </div>
                    <div class="filter-tabs col-12 col-md-12">
                        <div class="filter-wrapp">
                            <div class="mobile__header-filter">
                                Цели
                                <div class="mobile__filter-close"></div>
                            </div>
                            <div class="filter-list-items">
                                <div class="filter-btn selected" data-category="all">Все продукты</div>
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
        </div>

        <div class="ast-container" id="catalog-section">
            <?=getSections() ?>
        </div>
    </div>
<? get_footer( 'shop' ); ?>