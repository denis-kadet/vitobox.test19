<?php
$support_2 = carbon_get_theme_option('crb_places-2');
$check__support_2 = carbon_get_theme_option('crb_show_content-2');
$title_support_2 = carbon_get_theme_option('crb_show_content-title-2');
?>

<section class="section">
    <div class="block-8">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="block__title block-7__title"><?= esc_html( $title_support_2) ?></div>
                </div>
            </div>
        </div>
        <div class="block-8__bg"></div>
        <div class="container-fliud">
            <div class="block-8__slider-wrap">
                <ul class="block-8__slider-items">
                    <?php foreach ($support_2 as $items2): ?>
                        <li class="block-8__slider-item">
                            <div class="block__text block-8__text"><?= esc_html($items2['support__text-faq-2']) ?></div>
                            <picture>
<!--                          <source srcset="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/images/block-5-feed-1.webp" type="image/webp">-->
                              <img src="<?= esc_html($items2['crb_employee_photo']) ?>" alt="icon:app" class="block-8__img">
                            </picture>
                            <div class="block-8__text-name"><?= esc_html($items2['support__text-name']) ?></div>
                            <div class="block__text"><?= esc_html($items2['support__text-prof']) ?></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
