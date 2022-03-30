<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<section class="s" style='background-image:url("/wp-content/themes/astra-child/assets/img/yellow_background.png")'>
    <div class="ast-container">
        <div id="product-<?php the_ID(); ?>" class="row header__product">
            <div class="row col-md-7 justify-content-center align-items-center">
                <?php
                /**
                 * Hook: woocommerce_before_single_product_summary.
                 *
                 * @hooked woocommerce_show_product_sale_flash - 10
                 * @hooked woocommerce_show_product_images - 20
                 */
                do_action( 'woocommerce_before_single_product_summary' );
                ?>
            </div>

            <div class="header__info col-md-5">
                <div class="product__attribute-list">
                    <?php $subheadingvalues = get_the_terms( $product->id, 'pa_targets');
                    if($subheadingvalues){
                        foreach ( $subheadingvalues as $subheadingvalue ) {
                            ?>
                            <div class="product__attribute-icon">
                                <span class="product__desc-icon"><?=$subheadingvalue->name;?></span>
                                <svg>
                                    <use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#<?=$subheadingvalue->slug;?>"></use>
                                </svg>
                            </div>
                            <?
                        }
                    }?>
                </div>
                <?php
                /**
                 * Hook: woocommerce_single_product_summary.
                 *
                 * @hooked woocommerce_template_single_title - 5
                 * @hooked woocommerce_template_single_rating - 10
                 * @hooked woocommerce_template_single_price - 10
                 * @hooked woocommerce_template_single_excerpt - 20
                 * @hooked woocommerce_template_single_add_to_cart - 30
                 * @hooked woocommerce_template_single_meta - 40
                 * @hooked woocommerce_template_single_sharing - 50
                 * @hooked WC_Structured_Data::generate_product_data() - 60
                 */
                do_action( 'woocommerce_single_product_summary' );
                ?>
            </div>

            <?php
            /**
             * Hook: woocommerce_after_single_product_summary.
             *
             * @hooked woocommerce_output_product_data_tabs - 10
             * @hooked woocommerce_upsell_display - 15
             * @hooked woocommerce_output_related_products - 20
             */
//            do_action( 'woocommerce_after_single_product_summary' );
            ?>
        </div>
    </div>
</section>
<section class="s" style="background-color: #F5CC83;">
    <div class="ast-container">
        <ul class="product__note-list">
            <li class="product__note-item">
                <div class="product__note-img">
                    <img src="/wp-content/themes/astra-child/assets/img/No_GMO.svg" alt="Нет ГМО">
                </div>
                <p class="product__note-text">
                    GMO free
                </p>
            </li>
            <li class="product__note-item">
                <div class="product__note-img">
                    <img src="/wp-content/themes/astra-child/assets/img/no_sugar.svg" alt="Нет сахара">
                </div>
                <p class="product__note-text">
                    Sugar free
                </p>
            </li>
            <li class="product__note-item">
                <div class="product__note-img">
                    <img src="/wp-content/themes/astra-child/assets/img/gluteen_free.svg" alt="не содержит глютен">
                </div>
                <p class="product__note-text">
                    Gluten free
                </p>
            </li>
        </ul>
    </div>
</section>
<section class="s" id="product-desc">
    <div class="ast-container">
        <div class="product__desc-content">
            <div class="product__desc-note">

                <ul id="block-9__accordion" class="block-9__accordion">
                    <li class="block-9__accordion-inner">
                        <h3 class="product__desc-title">Рекомендации по приему</h3>
                        <div>
                            <p class="product__desc-text">
                                Все наши продукты созданы с учетом оптимального поглощения.
                                Как правило, мы рекомендуем вам принимать наши добавки вместе с едой,
                                такой как завтрак или обед.
                            </p>
                        </div>
                    </li>
                    <li class="block-9__accordion-inner">
                        <h3 class="product__desc-title">Cостав</h3>
                        <div>
                            <p class="product__desc-text">
                                <?=$product->get_meta('_section_one_col_1');?>
                            </p>
                            <span class="product__desc-num">1 капсула</span>
                            <span class="product__desc-dosage"><?=$product->get_meta('_recommended_count').' '.$product->name;?></span>
                            <a href="javascript:void(0)" type="button" class="single_product__compose" data-bs-toggle="modal" data-bs-target="#composeModal">Точный состав</a>
                        </div>
                    </li>
                    <li class="block-9__accordion-inner">
                        <h3 class="product__desc-title">Польза</h3>
                        <div>
                            <p class="product__desc-text">
                                <?=$product->get_meta('_section_one_col_2');?>
                            </p>
                        </div>
                    </li>

                </ul>

            </div>
            <div class="product__desc-image">
                <img src="<?=$product->get_meta('_image_link');?>" alt="Рекоммендации по витаминам">
            </div>
        </div>
    </div>
</section>
<section class="s" id="product-addition">
    <div class="ast-container">
        <div class="product__addition-content">
            <div class="product__block-addition">
                <div class="product__addition-image">
                    <img src="/wp-content/themes/astra-child/assets/img/little.svg" alt="Рекомендуем">
                </div>
                <div class="product__addition-text">
                    <h3 class="product__addition-title">Содержится в продуктах питания:</h3>
                    <p><?=$product->get_meta('_section_two_col_1');?></p>
                </div>
            </div>
            <div class="product__block-addition">
                <div class="product__addition-image">
                    <img src="/wp-content/themes/astra-child/assets/img/smart.svg" alt="Состав">
                </div>
                <div class="product__addition-text">
                    <h3 class="product__addition-title">Советуем принимать, если</h3>
                    <p><?=$product->get_meta('_section_two_col_2');?></p>
<!--                    <ul>-->
<!--                        <li>проводите меньше 15 минут в день на солнце</li>-->
<!--                        <li>живете выше 37-ой параллели</li>-->
<!--                        <li>Наблюдаете депрессивные состояния в осенне-зимний период</li>-->
<!--                        <li>мало употребляете рыбу и яйца</li>-->
<!--                        <li>у вас смуглая кожа и/или вы быстро загораете</li>-->
<!--                    </ul>-->
                </div>
            </div>
        </div>
    </div>
</section>
<section id="product-recommend">
    <div class="ast-container">
        <div class="product__research-content">
            <div class="product__research-text">
                <h2 class="recommend-title">Исследования</h2>
                <a href="#" class="research-read" title="Смотреть все" target="_blank">Смотреть все</a>
            </div>
        </div>
    </div>
    <div class="product__research-slide">
        <div class="research-item">
            <div class="research-content">
                <h4 class="research-title">Поддержка здоровья костей</h4>
                <p class="research-desc">
                    Потребление Витамина D
                    необходимо для поддержания
                    здоровья костей. Витамин D
                    необходим для усвоения кальция
                    и фосфора
                </p>
                <div class="research-directory">
                    <div class="research-block">
                        <span class="research-source">Год исследования</span>
                        <span class="research-value">2022</span>
                    </div>
                    <div class="research-block">
                        <span class="research-source">Источник</span>
                        <span class="research-value">HBR</span>
                    </div>
                </div>
            </div>
            <a href="#" class="research-read" target="_blank">Читать полностью</a>
        </div>
        <div class="research-item">
            <div class="research-content">
                <h4 class="research-title">Поддержка здоровья костей</h4>
                <p class="research-desc">
                    Потребление Витамина D
                    необходимо для поддержания
                    здоровья костей. Витамин D
                    необходим для усвоения кальция
                    и фосфора
                </p>
                <div class="research-directory">
                    <div class="research-block">
                        <span class="research-source">Год исследования</span>
                        <span class="research-value">2022</span>
                    </div>
                    <div class="research-block">
                        <span class="research-source">Источник</span>
                        <span class="research-value">HBR</span>
                    </div>
                </div>
            </div>
            <a href="#" class="research-read" target="_blank">Читать полностью</a>
        </div>
        <div class="research-item">
            <div class="research-content">
                <h4 class="research-title">Поддержка здоровья костей</h4>
                <p class="research-desc">
                    Потребление Витамина D
                    необходимо для поддержания
                    здоровья костей. Витамин D
                    необходим для усвоения кальция
                    и фосфора
                </p>
                <div class="research-directory">
                    <div class="research-block">
                        <span class="research-source">Год исследования</span>
                        <span class="research-value">2022</span>
                    </div>
                    <div class="research-block">
                        <span class="research-source">Источник</span>
                        <span class="research-value">HBR</span>
                    </div>
                </div>
            </div>
            <a href="#" class="research-read" target="_blank">Читать полностью</a>
        </div>
        <div class="research-item">
            <div class="research-content">
                <h4 class="research-title">Поддержка здоровья костей</h4>
                <p class="research-desc">
                    Потребление Витамина D
                    необходимо для поддержания
                    здоровья костей. Витамин D
                    необходим для усвоения кальция
                    и фосфора
                </p>
                <div class="research-directory">
                    <div class="research-block">
                        <span class="research-source">Год исследования</span>
                        <span class="research-value">2022</span>
                    </div>
                    <div class="research-block">
                        <span class="research-source">Источник</span>
                        <span class="research-value">HBR</span>
                    </div>
                </div>
            </div>
            <a href="#" class="research-read" target="_blank">Читать полностью</a>
        </div>
        <div class="research-item">
            <div class="research-content">
                <h4 class="research-title">Поддержка здоровья костей</h4>
                <p class="research-desc">
                    Потребление Витамина D
                    необходимо для поддержания
                    здоровья костей. Витамин D
                    необходим для усвоения кальция
                    и фосфора
                </p>
                <div class="research-directory">
                    <div class="research-block">
                        <span class="research-source">Год исследования</span>
                        <span class="research-value">2022</span>
                    </div>
                    <div class="research-block">
                        <span class="research-source">Источник</span>
                        <span class="research-value">HBR</span>
                    </div>
                </div>
            </div>
            <a href="#" class="research-read" target="_blank">Читать полностью</a>
        </div>
    </div>
</section>
<? woocommerce_upsell_display() ?>
<section id="product-vote">
    <div class="ast-container">
        <div class="product__vote-content">
            <div class="product__vote-block">
                <h2 class="product__vote-title">Пройдите тест и получите рекомендацию витаминов</h2>
                <div class="product__vote-text">
                    Не можете определится с выбором,
                    пройдите наш тест на основе
                    искусственного интелекта и получите
                    рекомендацию необходимых
                    микронутриентов
                </div>
                <a href="#" class="product__vote-btn" title="Пройти тест">Пройти тест</a>
            </div>
            <div class="product__vote-image">
                <picture>
                    <source srcset="/wp-content/themes/astra-child/assets/img/vitobox_pack3x.jpg 3x, /wp-content/themes/astra-child/assets/img/vitobox_pack2x.jpg 2x" type="image/svg+xml">
                    <img src="/wp-content/themes/astra-child/assets/img/vitobox_pack1x.jpg" alt="Vitobox набор">
                </picture>
            </div>
        </div>
    </div>
</section>

<?php do_action( 'woocommerce_after_single_product' ); ?>
