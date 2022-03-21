<?php
$support = carbon_get_theme_option('crb_places');
$check__support_1 = carbon_get_theme_option('crb_show_content-1');
$title_support_1 = carbon_get_theme_option('crb_show_content-title-1');
?>
<section class="section">
    <div class="block-9">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="block__title block-9__title"><?= esc_html( $title_support_1) ?></div>
                </div>
                <?php if (isset($support) && ($check__support_1 == false)): ?>
                <div class="col-lg-7 offset-lg-3">
                    <div class="block-9__bg"></div>
                    <ul id="block-9__accordion" class="block-9__accordion">


                        <?php foreach ($support as $items): ?>
                            <li class="block-9__accordion-inner">
                                <h3 class="block-9__accordion-title"><span><?= esc_html($items['support__text-faq']) ?></span></h3>
                                <ul class="block-9__accordion-items">
                                    <?php foreach ($items['support__text-faq_sub'] as $item): ?>
                                        <li class="block-9__accordion-item"><?= esc_html($item['support__fragment-text']) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
