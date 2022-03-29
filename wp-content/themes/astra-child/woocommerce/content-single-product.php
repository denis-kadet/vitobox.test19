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
            do_action( 'woocommerce_after_single_product_summary' );
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
                                Наш витамин D разработан с использованием пребиотической
                                растительной клетчатки акации, чтобы облегчить ее
                                усвоение вашим организмом
                            </p>
                            <span class="product__desc-num">1 капсула</span>
                            <span class="product__desc-dosage">600 ME Витамина D</span>
                            <a href="javascript:void(0)" type="button" class="single_product__compose" data-bs-toggle="modal" data-bs-target="#composeModal">Точный состав</a>
                        </div>
                    </li>
                    <li class="block-9__accordion-inner">
                        <h3 class="product__desc-title">Польза</h3>
                        <div>
                            <p class="product__desc-text">
                                Витамин D необходим для укрепления костей и общего состояния здоровья.
                                Исследование 2011 года показало, что более 70% американцев получают меньше рекомендуемого количества витамина D.
                                Если вы не получаете много солнца или если в вашем рационе мало продуктов, содержащих его, вы можете оказаться в их числе.
                                Продукты, содержащие витамин D, - это жирная рыба, говяжья печень, обогащенное молоко и злаки.
                            </p>
                        </div>
                    </li>

                </ul>

            </div>
            <div class="product__desc-image">
                <img src="/wp-content/themes/astra-child/assets/img/vitamins_hand.jpg" alt="Витамины в руке">
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
                    <p>печень рыбы, яичный желток, говяжья печень, сыр, творог, сливочное масло</p>
                </div>
            </div>
            <div class="product__block-addition">
                <div class="product__addition-image">
                    <img src="/wp-content/themes/astra-child/assets/img/smart.svg" alt="Состав">
                </div>
                <div class="product__addition-text">
                    <h3 class="product__addition-title">Советуем принимать, если</h3>
                    <ul>
                        <li>проводите меньше 15 минут в день на солнце</li>
                        <li>живете выше 37-ой параллели</li>
                        <li>Наблюдаете депрессивные состояния в осенне-зимний период</li>
                        <li>мало употребляете рыбу и яйца</li>
                        <li>у вас смуглая кожа и/или вы быстро загораете</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="product-recommend">
    <div class="ast-container">
        <div class="product__recommended-content">
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
            </div>
        </div>
    </div>
</section>
<section class="s" id="product-recommend" style="background-image:url('/wp-content/themes/astra-child/assets/img/light_motion.png');background-position-y: -400px;">
    <div class="ast-container">
        <div class="product__recommended-content">
            <div class="recommend-text">
                <h3 class="recommend-title">Рекомендуем также</h3>
                <p class="recommend-desc">Отлично сочетается с другими витаминами</p>
            </div>
            <ul class="catalog-list row" id="recommend-slide">
                <li class="col-md-3">
                    <a href="http://test19.softmg.ru/product/kompleks-zhirnyh-kislot-omega-3-6-9/" class="catalog-item">
                        <div class="catalog-top" href="http://test19.softmg.ru/product/kompleks-zhirnyh-kislot-omega-3-6-9/">
                            <div class="catalog-image">
                                <img width="100" height="48" src="http://test19.softmg.ru/wp-content/uploads/2021/05/omega-1.png" class="attachment-shop_single size-shop_single wp-post-image" alt="" loading="lazy">                                    </div>
                            <div class="catalog-item-info">
                                <h3 class="catalog-title">Омега 3, 6, 9</h3>
                                <span class="catalog-dosage">2000 МЕ</span>
                                <div class="category-attribute">
                                    <div class="catalog-icon">
                                        <svg>
                                            <title>Здоровье кожи</title>
                                            <use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#health_skin"></use>
                                        </svg>
                                    </div>
                                    <div class="catalog-icon">
                                        <svg>
                                            <title>Поддержка иммунитета</title>
                                            <use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#immune_support"></use>
                                        </svg>
                                    </div>
                                    <div class="catalog-icon">
                                        <svg>
                                            <title>Уровень энергии</title>
                                            <use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#energy_level"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="catalog-desc-item">
                                    <p><strong>•</strong>Улучшает абсорбцию кальция и здоровье костей<br>
                                        <strong>•</strong>Лучшая форма для усвоения<br>
                                        <strong>•</strong>Укрепляет иммунитет</p>
                                </div>
                                <div class="catalog-item-price">
                                    <span class="woocommerce-Price-amount amount"><bdi>2 500<span class="woocommerce-Price-currencySymbol">₽</span></bdi></span>                                        </div>
                                <div class="catalog-recommended">
                                    за 30 шт. /1 мес.                                        </div>
                            </div>
                        </div>
                        <div class="catalog-bottom">
                            <button data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="13406" data-product_sku="1004" aria-label="Добавить &quot;Омега 3, 6, 9&quot; в корзину" rel="nofollow">Добавить<svg class="mobile-basket-icon"><use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#box"></use></svg></button>                                </div>
                    </a>
                </li>
                <li class="col-md-3">
                    <a href="http://test19.softmg.ru/product/koferment-q10/" class="catalog-item">
                        <div class="catalog-status new">
                            new
                        </div>
                        <div class="catalog-top" href="http://test19.softmg.ru/product/koferment-q10/">
                            <div class="catalog-image">
                                <img width="100" height="52" src="http://test19.softmg.ru/wp-content/uploads/2021/05/cofferment.png" class="attachment-shop_single size-shop_single wp-post-image" alt="" loading="lazy">                                    </div>
                            <div class="catalog-item-info">
                                <h3 class="catalog-title">Кофермент Q10</h3>
                                <span class="catalog-dosage">2000 ME</span>
                                <div class="category-attribute">
                                    <div class="catalog-icon">
                                        <svg>
                                            <title>Здоровье волос</title>
                                            <use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#health_hair"></use>
                                        </svg>
                                    </div>
                                    <div class="catalog-icon">
                                        <svg>
                                            <title>Здоровье кожи</title>
                                            <use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#health_skin"></use>
                                        </svg>
                                    </div>
                                    <div class="catalog-icon">
                                        <svg>
                                            <title>Здоровье ногтей</title>
                                            <use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#nail_health"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="catalog-desc-item">
                                    <p><strong>•</strong>Улучшает абсорбцию кальция и здоровье костей<br>
                                        <strong>•</strong>Лучшая форма для усвоения<br>
                                        <strong>•</strong>Укрепляет иммунитет</p>
                                </div>
                                <div class="catalog-item-price">
                                    <span class="woocommerce-Price-amount amount"><bdi>1 500<span class="woocommerce-Price-currencySymbol">₽</span></bdi></span>                                        </div>
                                <div class="catalog-recommended">
                                    за 30 шт. /1 мес.                                        </div>
                            </div>
                        </div>
                        <div class="catalog-bottom">
                            <button data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="13405" data-product_sku="1005" aria-label="Добавить &quot;Кофермент Q10&quot; в корзину" rel="nofollow">Добавить<svg class="mobile-basket-icon"><use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#box"></use></svg></button>                                </div>
                    </a>
                </li>
                <li class="col-md-3">
                    <a href="http://test19.softmg.ru/product/vitamin-d/" class="catalog-item">
                        <div class="catalog-status new">
                            new
                        </div>
                        <div class="catalog-top" href="http://test19.softmg.ru/product/vitamin-d/">
                            <div class="catalog-image">
                                <img width="76" height="46" src="http://test19.softmg.ru/wp-content/uploads/2021/08/vitamin_d.png" class="attachment-shop_single size-shop_single wp-post-image" alt="" loading="lazy">                                    </div>
                            <div class="catalog-item-info">
                                <h3 class="catalog-title">Витамин D</h3>
                                <span class="catalog-dosage">2000 МЕ</span>
                                <div class="category-attribute">
                                    <div class="catalog-icon">
                                        <svg>
                                            <title>Здоровье волос</title>
                                            <use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#health_hair"></use>
                                        </svg>
                                    </div>
                                    <div class="catalog-icon">
                                        <svg>
                                            <title>Здоровье кожи</title>
                                            <use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#health_skin"></use>
                                        </svg>
                                    </div>
                                    <div class="catalog-icon">
                                        <svg>
                                            <title>Здоровье ногтей</title>
                                            <use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#nail_health"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="catalog-desc-item">
                                    <p><strong>•</strong>Улучшает абсорбцию кальция и здоровье костей<br>
                                        <strong>•</strong>Лучшая форма для усвоения<br>
                                        <strong>•</strong>Укрепляет иммунитет</p>
                                </div>
                                <div class="catalog-item-price">
                                    <span class="woocommerce-Price-amount amount"><bdi>700<span class="woocommerce-Price-currencySymbol">₽</span></bdi></span>                                        </div>
                                <div class="catalog-recommended">
                                    за 30 шт. /1 мес.                                        </div>
                            </div>
                        </div>
                        <div class="catalog-bottom">
                            <button data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="13407" data-product_sku="1003" aria-label="Добавить &quot;Витамин D&quot; в корзину" rel="nofollow">Добавить<svg class="mobile-basket-icon"><use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#box"></use></svg></button>                                </div>
                    </a>
                </li>
                <li class="col-md-3">
                    <a href="http://test19.softmg.ru/product/bodrost-i-konczentracziya/" class="catalog-item">
                        <div class="catalog-status disabled">
                            нет в наличии
                        </div>
                        <div class="catalog-top" href="http://test19.softmg.ru/product/bodrost-i-konczentracziya/">
                            <div class="catalog-image">
                                <img width="100" height="44" src="http://test19.softmg.ru/wp-content/uploads/2021/05/b-complex.png" class="attachment-shop_single size-shop_single wp-post-image" alt="" loading="lazy">                                    </div>
                            <div class="catalog-item-info">
                                <h3 class="catalog-title">B-комплекс</h3>
                                <span class="catalog-dosage">2000 ME</span>
                                <div class="category-attribute">
                                    <div class="catalog-icon">
                                        <svg>
                                            <title>Качество сна</title>
                                            <use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#sleep_quality"></use>
                                        </svg>
                                    </div>
                                    <div class="catalog-icon">
                                        <svg>
                                            <title>Набор мышечной массы</title>
                                            <use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#muscle_mass"></use>
                                        </svg>
                                    </div>
                                    <div class="catalog-icon">
                                        <svg>
                                            <title>Поддержка иммунитета</title>
                                            <use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#immune_support"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="catalog-desc-item">
                                    <p><strong>• </strong>Улучшает абсорбцию кальция и здоровье костей<br>
                                        <strong>• </strong>Лучшая форма для усвоения<br>
                                        <strong>• </strong>Укрепляет иммунитет</p>
                                </div>
                                <div class="catalog-item-price">
                                    <span class="woocommerce-Price-amount amount"><bdi>300<span class="woocommerce-Price-currencySymbol">₽</span></bdi></span>                                        </div>
                                <div class="catalog-recommended">
                                    за 30 шт. /1 мес.                                        </div>
                            </div>
                        </div>
                        <div class="catalog-bottom">
                            <button data-quantity="1" class="button product_type_simple disabled" data-product_id="13408" data-product_sku="1002" aria-label="Прочитайте больше о “B-комплекс”" rel="nofollow">Нет в наличии<svg class="mobile-basket-icon"><use xlink:href="/wp-content/themes/astra-child/assets/img/icons.svg#box"></use></svg></button>                                </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
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
