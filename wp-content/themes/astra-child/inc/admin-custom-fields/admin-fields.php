<?php

add_filter('woocommerce_product_data_tabs', 'add_new_tabs', 10, 1);

function add_new_tabs($tabs){
    $tabs['composition'] = array(
        'label'    => 'Состав продукта',
        'target'   => 'composition_product_data',
        'class'    => array( 'hide_if_grouped' ),
        'priority' => 15,
    );

    $tabs['sections'] = array(
        'label'    => 'Настройка секции',
        'target'   => 'section_product_data',
        'class'    => array( 'hide_if_grouped' ),
        'priority' => 15,
    );

    return $tabs;
}

add_action( 'admin_footer', function(){
    ?>
    <style>
        #woocommerce-coupon-data ul.wc-tabs .composition_options a::before,
        #woocommerce-product-data ul.wc-tabs .composition_options a::before,
        .woocommerce ul.wc-tabs .composition_options a::before {
            font-family: WooCommerce;
            content: "\e034"
        }
    </style>
    <?php
});

add_action('woocommerce_product_data_panels', 'add_new_tabs_panel');
function add_new_tabs_panel(){
    global $post;
    ?>
    <div id="composition_product_data" class="panel woocommerce_options_panel">
        <div class="options_group">
            <style>
                .composition_admin_head h2{
                    display: inline-block;
                }
            </style>
            <div class="options_group" style="text-align: center;">
                <h2><strong>Таблица "Дозировки". Модальное окно.</strong></h2>
            </div>
            <div class="composition_admin_head options_group">
                <h2 style="width: 15.75%"><strong>Состав</strong></h2>
                <h2 style="width: 15.75%"><strong>Дозировка</strong></h2>
                <h2 style="width: 15.75%"><strong>Суточная норма</strong></h2>
                <h2 style="width: 15.75%"><strong>% от РСП</strong></h2>
            </div>
            <p class="custom_field_type">
                <span class="wrap">
                <input
                        placeholder="Введите название"
                        class="input-text"
                        type="text"
                        name="_row_one_name"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_one_name', true)); ?>"
                        style="width: 15.75%;margin-right: 2%;"/>
                <input
                        placeholder="Введите значение"
                        class="input-text"
                        type="text"
                        name="_row_one_col_1"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_one_col_1', true)); ?>"
                        style="width: 15.75%;margin-right: 2%;"/>
                <input
                        placeholder="Введите значение"
                        class="input-text"
                        type="text"
                        name="_row_one_col_2"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_one_col_2', true)); ?>"
                        style="width: 15.75%;margin-right: 2%;"/>
                <input
                        placeholder="Введите значение"
                        class="input-text"
                        type="text"
                        name="_row_one_col_3"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_one_col_3', true)); ?>"
                        style="width: 15.75%;margin-right: 0;"/>
                </span>
            </p>
            <p class="custom_field_type">
                <span class="wrap">
                <input
                        placeholder="Введите название"
                        class="input-text"
                        type="text"
                        name="_row_two_name"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_two_name', true)); ?>"
                        style="width: 15.75%;margin-right: 2%;"/>
                <input
                        placeholder="Введите значение"
                        class="input-text"
                        type="text"
                        name="_row_two_col_1"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_two_col_1', true)); ?>"
                        style="width: 15.75%;margin-right: 2%;"/>
                <input
                        placeholder="Введите значение"
                        class="input-text"
                        type="text"
                        name="_row_two_col_2"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_two_col_2', true)); ?>"
                        style="width: 15.75%;margin-right: 2%;"/>
                <input
                        placeholder="Введите значение"
                        class="input-text"
                        type="text"
                        name="_row_two_col_3"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_two_col_3', true)); ?>"
                        style="width: 15.75%;margin-right: 0;"/>
                </span>
            </p>
            <p class="custom_field_type">
                <span class="wrap">
                <input
                        placeholder="Введите название"
                        class="input-text"
                        type="text"
                        name="_row_three_name"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_three_name', true)); ?>"
                        style="width: 15.75%;margin-right: 2%;"/>
                <input
                        placeholder="Введите значение"
                        class="input-text"
                        type="text"
                        name="_row_three_col_1"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_three_col_1', true)); ?>"
                        style="width: 15.75%;margin-right: 2%;"/>
                <input
                        placeholder="Введите значение"
                        class="input-text"
                        type="text"
                        name="_row_three_col_2"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_three_col_2', true)); ?>"
                        style="width: 15.75%;margin-right: 2%;"/>
                <input
                        placeholder="Введите значение"
                        class="input-text"
                        type="text"
                        name="_row_three_col_3"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_three_col_3', true)); ?>"
                        style="width: 15.75%;margin-right: 0;"/>
                </span>
            </p>
            <p class="custom_field_type">
                <span class="wrap">
                <input
                        placeholder="Введите название"
                        class="input-text"
                        type="text"
                        name="_row_four_name"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_four_name', true)); ?>"
                        style="width: 15.75%;margin-right: 2%;"/>
                <input
                        placeholder="Введите значение"
                        class="input-text"
                        type="text"
                        name="_row_four_col_1"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_four_col_1', true)); ?>"
                        style="width: 15.75%;margin-right: 2%;"/>
                <input
                        placeholder="Введите значение"
                        class="input-text"
                        type="text"
                        name="_row_four_col_2"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_four_col_2', true)); ?>"
                        style="width: 15.75%;margin-right: 2%;"/>
                <input
                        placeholder="Введите значение"
                        class="input-text"
                        type="text"
                        name="_row_four_col_3"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_four_col_3', true)); ?>"
                        style="width: 15.75%;margin-right: 0;"/>
                </span>
            </p>
            <p class="custom_field_type">
                <span class="wrap">
                <input
                        placeholder="Введите название"
                        class="input-text"
                        type="text"
                        name="_row_five_name"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_five_name', true)); ?>"
                        style="width: 15.75%;margin-right: 2%;"/>
                <input
                        placeholder="Введите значение"
                        class="input-text"
                        type="text"
                        name="_row_five_col_1"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_five_col_1', true)); ?>"
                        style="width: 15.75%;margin-right: 2%;"/>
                <input
                        placeholder="Введите значение"
                        class="input-text"
                        type="text"
                        name="_row_five_col_2"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_five_col_2', true)); ?>"
                        style="width: 15.75%;margin-right: 2%;"/>
                <input
                        placeholder="Введите значение"
                        class="input-text"
                        type="text"
                        name="_row_five_col_3"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_five_col_3', true)); ?>"
                        style="width: 15.75%;margin-right: 0;"/>
                </span>
            </p>
            <p class="custom_field_type">
                <span class="wrap">
                <input
                        placeholder="Введите название"
                        class="input-text"
                        type="text"
                        name="_row_six_name"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_six_name', true)); ?>"
                        style="width: 15.75%;margin-right: 2%;"/>
                <input
                        placeholder="Введите значение"
                        class="input-text"
                        type="text"
                        name="_row_six_col_1"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_six_col_1', true)); ?>"
                        style="width: 15.75%;margin-right: 2%;"/>
                <input
                        placeholder="Введите значение"
                        class="input-text"
                        type="text"
                        name="_row_six_col_2"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_six_col_2', true)); ?>"
                        style="width: 15.75%;margin-right: 2%;"/>
                <input
                        placeholder="Введите значение"
                        class="input-text"
                        type="text"
                        name="_row_six_col_3"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_row_six_col_3', true)); ?>"
                        style="width: 15.75%;margin-right: 0;"/>
                </span>
            </p>
        </div>
    </div>
    <div id="section_product_data" class="panel woocommerce_options_panel">
        <div class="options_group">
            <div class="options_group" style="text-align: center;">
                <h2><strong>Секция 1</strong></h2>
            </div>
            <div class="composition_admin_head options_group">
                <h2 style="width: 40%"><strong>Состав</strong></h2>
                <h2 style="width: 40%"><strong>Польза</strong></h2>
            </div>
            <p class="custom_field_type">
                <span class="wrap">
                <textarea
                        placeholder="Введите текст"
                        class="input-text"
                        name="_section_one_col_1"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_section_one_col_1', true)); ?>"
                        style="width: 40%;margin-right: 2%;height: 119px;"/>
                        <?php echo get_post_meta($post->ID, '_section_one_col_1', true); ?>
                </textarea>
                <textarea
                        placeholder="Введите текст"
                        class="input-text"
                        name="_section_one_col_2"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_section_one_col_2', true)); ?>"
                        style="width: 40%;margin-right: 2%;height: 119px;"/>
                        <?php echo get_post_meta($post->ID, '_section_one_col_2', true); ?>
                    </textarea>
                </span>
            </p>
            <div class="options_group" style="border-top: 0">
                <h2 style="width: 15.75%"><strong>Ссылка на изображение</strong></h2>
            </div>
            <p class="custom_field_type">
                <input
                        placeholder="Введите значение"
                        class="input-text"
                        type="text"
                        name="_image_link"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_image_link', true)); ?>"
                        style="width: 30%;margin-right: 0;"/>
                <span class="woocommerce-help-tip" data-tip='Загрузите изображение в "Медиафайлы" и вставьте ссылку в поле'></span>
            </p>
            <div class="options_group" style="text-align: center;">
                <h2><strong>Секция 2</strong></h2>
            </div>
            <div class="composition_admin_head options_group">
                <h2 style="width: 40%"><strong>Содержится в продуктах питания:</strong></h2>
                <h2 style="width: 40%"><strong>Советуем принимать, если:</strong></h2>
            </div>
            <p class="custom_field_type">
                <span class="wrap">
                <textarea
                        placeholder="Введите текст"
                        class="input-text"
                        name="_section_two_col_1"
                        value="<?php echo esc_attr(get_post_meta($post->ID, '_section_two_col_1', true)); ?>"
                        style="width: 40%;margin-right: 2%;height: 119px;"/>
                        <?php echo get_post_meta($post->ID, '_section_two_col_1', true); ?>
                    </textarea>
                    <textarea
                            placeholder="Введите текст"
                            class="input-text"
                            name="_section_two_col_2"
                            value="<?php echo esc_attr(get_post_meta($post->ID, '_section_two_col_2', true)); ?>"
                            style="width: 40%;margin-right: 2%;height: 119px;"/>
                        <?php echo get_post_meta($post->ID, '_section_two_col_2', true); ?>
                    </textarea>
                </span>
                <span class="woocommerce-help-tip" data-tip="Чтобы вывести списком, после предложения перейдите на следующую строчку с помощью кнопки 'Enter'"></span>
            </p>
        </div>
    </div>
    <?php
}

add_action('woocommerce_product_options_general_product_data', function(){
    ?>
    <div class="options_group">
        <?php
        woocommerce_wp_text_input( array(
            'id'      => '_recommended_count',
            'label'   => 'Дозировка',
            'description' => 'Параметр выводит рекомендованную дозировку',
            'desc_tip'    => 'true',
            'type'        => 'text',
        ) );
        ?>
    </div>
    <div class="options_group">
        <?php
        woocommerce_wp_text_input( array(
            'id'      => '_recommended_number',
            'label'   => 'Рекомендованое число',
            'description' => 'Параметр выводит возле числа "Рекомендовано"',
            'desc_tip'    => 'true',
            'type'        => 'number',
            'custom_attributes' => array( 'step'  => 'any', 'min'   => '0', 'max' => '3'),
        ) );
        ?>
    </div>
    <div class="options_group">
        <?php
        woocommerce_wp_text_input( array(
            'id'      => '_recommended_note',
            'label'   => 'Рекомендовано шт.',
            'description' => 'Параметр выводит рекомендованное сообщение',
            'desc_tip'    => 'true',
            'type'        => 'text',
        ) );
        ?>
    </div>
    <div class="options_group">
        <?php
        woocommerce_wp_checkbox( array(
            'id'      => 'is_new',
            'label'   => 'Шильд "NEW"',
            'description' => 'Параметр выставляет на товаре шильд "NEW"',
            'desc_tip'    => 'true',
        ) );
        ?>
    </div>
    <?php
});

add_action( 'woocommerce_process_product_meta', function ($post_id){
    $checkboxNew = isset($_POST['is_new']) ? 'yes' : 'no';
    $textRecommended = isset($_POST['_recommended_note']) ? sanitize_text_field($_POST['_recommended_note']) : '';
    $textRecommendedCount = isset($_POST['_recommended_note']) ? sanitize_text_field($_POST['_recommended_count']) : '';
    $textRecommendedNumber = isset($_POST['_recommended_number']) ? $_POST['_recommended_number'] : '';
    $hrefImage = isset($_POST['_image_link']) ? $_POST['_image_link'] : '';
    update_post_meta($post_id, 'is_new', $checkboxNew);
    update_post_meta($post_id, '_recommended_note', $textRecommended);
    update_post_meta($post_id, '_recommended_count', $textRecommendedCount);
    update_post_meta($post_id, '_recommended_number', $textRecommendedNumber);
    update_post_meta($post_id, '_image_link', $hrefImage);
    //вкладка состав
    // Сохранение текстового поля.
    $woocommerce_table_name_row_one = $_POST['_row_one_name'];
    if ( !empty( $woocommerce_table_name_row_one ) ) {
        update_post_meta( $post_id, '_row_one_name', esc_attr( $woocommerce_table_name_row_one ) );
    }
    $woocommerce_table_col_one_row_one = $_POST['_row_one_col_1'];
    if ( !empty( $woocommerce_table_col_one_row_one ) ) {
        update_post_meta( $post_id, '_row_one_col_1', esc_attr( $woocommerce_table_col_one_row_one ) );
    }
    $woocommerce_table_col_two_row_one = $_POST['_row_one_col_2'];
    if ( !empty( $woocommerce_table_col_two_row_one ) ) {
        update_post_meta( $post_id, '_row_one_col_2', esc_attr( $woocommerce_table_col_two_row_one ) );
    }
    $woocommerce_table_col_three_row_one = $_POST['_row_one_col_3'];
    if ( !empty( $woocommerce_table_col_three_row_one ) ) {
        update_post_meta( $post_id, '_row_one_col_3', esc_attr( $woocommerce_table_col_three_row_one ) );
    }
    //Строка 2
    $woocommerce_table_name_row_two = $_POST['_row_two_name'];
    if ( !empty( $woocommerce_table_name_row_two ) ) {
        update_post_meta( $post_id, '_row_two_name', esc_attr( $woocommerce_table_name_row_two ) );
    }
    $woocommerce_table_col_one_row_two = $_POST['_row_two_col_1'];
    if ( !empty( $woocommerce_table_col_one_row_two ) ) {
        update_post_meta( $post_id, '_row_two_col_1', esc_attr( $woocommerce_table_col_one_row_two ) );
    }
    $woocommerce_table_col_two_row_two = $_POST['_row_two_col_2'];
    if ( !empty( $woocommerce_table_col_two_row_two ) ) {
        update_post_meta( $post_id, '_row_two_col_2', esc_attr( $woocommerce_table_col_two_row_two ) );
    }
    $woocommerce_table_col_three_row_two = $_POST['_row_two_col_3'];
    if ( !empty( $woocommerce_table_col_three_row_two ) ) {
        update_post_meta( $post_id, '_row_two_col_3', esc_attr( $woocommerce_table_col_three_row_two ) );
    }
    //Строка 3
    $woocommerce_table_name_row_three = $_POST['_row_three_name'];
    if ( !empty( $woocommerce_table_name_row_three ) ) {
        update_post_meta( $post_id, '_row_three_name', esc_attr( $woocommerce_table_name_row_three ) );
    }
    $woocommerce_table_col_one_row_three = $_POST['_row_three_col_1'];
    if ( !empty( $woocommerce_table_col_one_row_three ) ) {
        update_post_meta( $post_id, '_row_three_col_1', esc_attr( $woocommerce_table_col_one_row_three ) );
    }
    $woocommerce_table_col_two_row_three = $_POST['_row_three_col_2'];
    if ( !empty( $woocommerce_table_col_two_row_three ) ) {
        update_post_meta( $post_id, '_row_three_col_2', esc_attr( $woocommerce_table_col_two_row_three ) );
    }
    $woocommerce_table_col_three_row_three = $_POST['_row_three_col_3'];
    if ( !empty( $woocommerce_table_col_three_row_three ) ) {
        update_post_meta( $post_id, '_row_three_col_3', esc_attr( $woocommerce_table_col_three_row_three ) );
    }
    //Строка 4
    $woocommerce_table_name_row_four = $_POST['_row_four_name'];
    if ( !empty( $woocommerce_table_name_row_four ) ) {
        update_post_meta( $post_id, '_row_four_name', esc_attr( $woocommerce_table_name_row_four ) );
    }
    $woocommerce_table_col_one_row_four = $_POST['_row_four_col_1'];
    if ( !empty( $woocommerce_table_col_one_row_four ) ) {
        update_post_meta( $post_id, '_row_four_col_1', esc_attr( $woocommerce_table_col_one_row_four ) );
    }
    $woocommerce_table_col_two_row_four = $_POST['_row_four_col_2'];
    if ( !empty( $woocommerce_table_col_two_row_four ) ) {
        update_post_meta( $post_id, '_row_four_col_2', esc_attr( $woocommerce_table_col_two_row_four ) );
    }
    $woocommerce_table_col_three_row_four = $_POST['_row_four_col_3'];
    if ( !empty( $woocommerce_table_col_three_row_four ) ) {
        update_post_meta( $post_id, '_row_four_col_3', esc_attr( $woocommerce_table_col_three_row_four ) );
    }
    //Строка 5
    $woocommerce_table_name_row_five = $_POST['_row_five_name'];
    if ( !empty( $woocommerce_table_name_row_five ) ) {
        update_post_meta( $post_id, '_row_five_name', esc_attr( $woocommerce_table_name_row_five ) );
    }
    $woocommerce_table_col_one_row_five = $_POST['_row_five_col_1'];
    if ( !empty( $woocommerce_table_col_one_row_five ) ) {
        update_post_meta( $post_id, '_row_five_col_1', esc_attr( $woocommerce_table_col_one_row_five ) );
    }
    $woocommerce_table_col_two_row_five = $_POST['_row_five_col_2'];
    if ( !empty( $woocommerce_table_col_two_row_five ) ) {
        update_post_meta( $post_id, '_row_five_col_2', esc_attr( $woocommerce_table_col_two_row_five ) );
    }
    $woocommerce_table_col_three_row_five = $_POST['_row_five_col_3'];
    if ( !empty( $woocommerce_table_col_three_row_five ) ) {
        update_post_meta( $post_id, '_row_five_col_3', esc_attr( $woocommerce_table_col_three_row_five ) );
    }
    //Строка 6
    $woocommerce_table_name_row_six = $_POST['_row_six_name'];
    if ( !empty( $woocommerce_table_name_row_six ) ) {
        update_post_meta( $post_id, '_row_six_name', esc_attr( $woocommerce_table_name_row_six ) );
    }
    $woocommerce_table_col_one_row_six = $_POST['_row_six_col_1'];
    if ( !empty( $woocommerce_table_col_one_row_six ) ) {
        update_post_meta( $post_id, '_row_six_col_1', esc_attr( $woocommerce_table_col_one_row_six ) );
    }
    $woocommerce_table_col_two_row_six = $_POST['_row_six_col_2'];
    if ( !empty( $woocommerce_table_col_two_row_six ) ) {
        update_post_meta( $post_id, '_row_six_col_2', esc_attr( $woocommerce_table_col_two_row_six ) );
    }
    $woocommerce_table_col_three_row_six = $_POST['_row_six_col_3'];
    if ( !empty( $woocommerce_table_col_three_row_six ) ) {
        update_post_meta( $post_id, '_row_six_col_3', esc_attr( $woocommerce_table_col_three_row_six ) );
    }
    //Вкладка "Настройка секций"
    //Сохранение textarea в секциях
    $woocommerce_section_one_col_1 = $_POST['_section_one_col_1'];
    if ( !empty( $woocommerce_section_one_col_1 ) ) {
        update_post_meta( $post_id, '_section_one_col_1', esc_attr($woocommerce_section_one_col_1) );
    }
    $woocommerce_section_one_col_2 = $_POST['_section_one_col_2'];
    if ( !empty( $woocommerce_section_one_col_2 ) ) {
        update_post_meta( $post_id, '_section_one_col_2', esc_attr( $woocommerce_section_one_col_2 ) );
    }
    $woocommerce_section_two_col_1 = $_POST['_section_two_col_1'];
    if ( !empty( $woocommerce_section_two_col_1 ) ) {
        update_post_meta( $post_id, '_section_two_col_1', esc_attr( $woocommerce_section_two_col_1 ) );
    }
    $woocommerce_section_two_col_2 = $_POST['_section_two_col_2'];
    if ( !empty( $woocommerce_section_two_col_2 ) ) {
        update_post_meta( $post_id, '_section_two_col_2', esc_attr( $woocommerce_section_two_col_2 ) );
    }
}, 10, 1 );

function remove_woo_content_from_single_product (){
    remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
    remove_action('woocommerce_single_product_summary','woocommerce_template_single_price');
    //tabs
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
    //filter
    add_filter( 'woocommerce_cart_item_removed_title',  '__return_null' );
}

add_action( 'init', 'remove_woo_content_from_single_product', 0);


//убираем оповещения woocommerce
add_filter( 'wc_add_to_cart_message', 'remove_add_to_cart_message' );

function remove_add_to_cart_message() {
    return;
}