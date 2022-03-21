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
            <!-- <div class="row"> -->
            <!-- <div class="col-xxl-12"> -->
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



<!--                    <li class="block-8__slider-item">-->
<!--                        <div class="block__text block-8__text">«‎Я использую VitoBox, потому что получаю персонализированные витамины отличного качества, подобранные и расфасованные специально для меня. Это сильно упростило мне выбор и регулярный приём витаминов»‎.</div>-->
<!--                        <picture>-->
<!--                            <source srcset="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/images/block-5-feed-2.webp" type="image/webp">-->
<!--                            <img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/images/block-5-feed-2.jpeg " alt="icon:app " class="block-8__img">-->
<!--                        </picture>-->
<!--                        <div class="block-8__text-name">Олег Тактаров</div>-->
<!--                        <div class="block__text">Чемпион UFC</div>-->
<!--                    </li>-->
<!--                    <li class="block-8__slider-item">-->
<!--                        <div class="block__text block-8__text">«‎Это безумно удобно. До этого видела такие продукты только в США. На сайте вы проходите тест, после чего система формирует индивидуальный набор витаминов именно под тебя, и его привозят уже расфасованным на каждый день»‎.-->
<!--                        </div>-->
<!--                        <picture>-->
<!--                            <source srcset="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/images/block-5-feed-3.webp" type="image/webp">-->
<!--                            <img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/images/block-5-feed-3.png " alt="icon:app" class="block-8__img">-->
<!--                        </picture>-->
<!--                        <div class="block-8__text-name">Олеся Романо</div>-->
<!--                        <div class="block__text">Модель, блогер</div>-->
<!--                    </li>-->
<!--                    <li class="block-8__slider-item">-->
<!--                        <div class="block__text block-8__text">«‎Мне очень важно следить за своим здоровьем, ведь это напрямую влияет на результат. Узнав о компании VitoBox, я решила пройти тест и сделать заказ. Сервис очень порадовал, буду следить за изменениями»‎.</div>-->
<!--                        <picture>-->
<!--                            <source srcset="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/images/block-5-feed-4.webp" type="image/webp">-->
<!--                            <img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/images/block-5-feed-4.jpeg" alt="icon:app" class="block-8__img">-->
<!--                        </picture>-->
<!--                        <div class="block-8__text-name">Вера Бирюкова</div>-->
<!--                        <div class="block__text">Олимпийская чемпионка по художественной гимнастике</div>-->
<!--                    </li>-->
<!--                    <li class="block-8__slider-item">-->
<!--                        <div class="block__text block-8__text">«‎Витамины, минералы и пищевые добавки должны быть подобраны индивидуально, учитывая особенности организма и цели, которые вы перед собой ставите. У меня уже были рекомендации от врача, а в VitoBox под меня собрали набор-->
<!--                            и предложили дополнить его».</div>-->
<!--                        <picture>-->
<!--                            <source srcset="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/images/block-5-feed-5.webp" type="image/webp">-->
<!--                            <img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/images/block-5-feed-5.jpeg " alt="icon:app" class="block-8__img">-->
<!--                        </picture>-->
<!--                        <div class="block-8__text-name">Миланна Химич</div>-->
<!--                        <div class="block__text">Чемпионка Росссии по бодибилдингу</div>-->
<!--                    </li>-->
<!--                    <li class="block-8__slider-item">-->
<!--                        <div class="block__text block-8__text">«Как нутрициолог, я бы особенно отметила составы и дозировки препаратов. Для корректного усвоения витаминов очень важно учитывать их совместимость, а с VitoBox можно об этом теперь не беспокоиться - все комплексы составлены-->
<!--                            с учетом личных потребностей клиента и совместимости самих витаминов».</div>-->
<!--                        <picture>-->
<!--                            <source srcset="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/images/block-5-feed-6.webp" type="image/webp">-->
<!--                            <img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/images/block-5-feed-6.jpeg" alt="icon:app" class="block-8__img">-->
<!--                        </picture>-->
<!--                        <div class="block-8__text-name">Анастасия Пискунова</div>-->
<!--                        <div class="block__text">Нутрициолог, эксперт по питанию и коррекции веса</div>-->
<!--                    </li>-->
<!--                    <li class="block-8__slider-item">-->
<!--                        <div class="block__text block-8__text">«Чувствую себя прекрасно, появилась энергия и сон наладился. Хочу отметить, что пить очень удобно, не нужно открывать 10 баночек, а все находится в одной маленькой упаковке».</div>-->
<!--                        <picture>-->
<!--                            <source srcset="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/images/block-5-feed-7.webp" type="image/webp">-->
<!--                            <img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/images/block-5-feed-7.jpeg" alt="icon:app" class="block-8__img">-->
<!--                        </picture>-->
<!--                        <div class="block-8__text-name">Виктория Толстоухова</div>-->
<!--                        <div class="block__text">Балерина, тренер в TopStretching</div>-->
<!--                    </li>-->
<!--                    <li class="block-8__slider-item">-->
<!--                        <div class="block__text block-8__text">«Чувствую себя прекрасно, появилась энергия и сон наладился. Хочу отметить, что пить очень удобно, не нужно открывать 10 баночек, а все находится в одной маленькой упаковке».</div>-->
<!--                        <picture>-->
<!--                            <source srcset="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/images/block-5-feed-8.webp" type="image/webp">-->
<!--                            <img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/images/block-5-feed-8.jpeg" alt="icon:app" class="block-8__img">-->
<!--                        </picture>-->
<!--                        <div class="block-8__text-name">Мария Эндальцева</div>-->
<!--                        <div class="block__text">Мастер спорта по синхронному плаванию, top coach TopStretching</div>-->
<!--                    </li>-->
<!--                    <li class="block-8__slider-item">-->
<!--                        <div class="block__text block-8__text">-->
<!--                            «У меня слишком активный образ жизни: работа, стресс. Вот уже 4 месяца я принимаю индивидуальный набор витаминов VitoBox каждое утро. Я вижу явный прогресс работы моего организма: я стала чувствовать себя гораздо лучше, более сконцентрированно, стала-->
<!--                            высыпаться и у меня прошла головная боль. С каждым месяцем я чувствую все больше гармонии с собой и своим телом».</div>-->
<!--                        <picture>-->
<!--                            <source srcset="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/images/block-5-feed-9.webp" type="image/webp">-->
<!--                            <img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/images/block-5-feed-9.jpeg" alt="icon:app" class="block-8__img">-->
<!--                        </picture>-->
<!--                        <div class="block-8__text-name">Виктория</div>-->
<!--                        <div class="block__text">Influence marketing, PR</div>-->
<!--                    </li>-->
<!--                    <li class="block-8__slider-item">-->
<!--                        <div class="block__text block-8__text">«Хочу поблагодарить за прекрасный сервис и очень подробную анкету, благодаря которой так доступно и приятно можно собрать себе бады. Пользуюсь уже второй месяц и уже вижу первые результаты».</div>-->
<!--                        <picture>-->
<!--                            <source srcset="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/images/block-5-user-10.webp" type="image/webp">-->
<!--                            <img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/images/block-5-user-10.png " alt="icon:app" class="block-8__img">-->
<!--                        </picture>-->
<!--                        <div class="block-8__text-name">Алена</div>-->
<!--                        <div class="block__text">Блогер, йога-мастер</div>-->
<!--                    </li>-->
                </ul>
            </div>
            <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>
</section>
