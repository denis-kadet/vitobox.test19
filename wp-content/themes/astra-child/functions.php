<?php
/**
 * Подлючение carbon-fields
 */
use Carbon_Fields\Container;
use Carbon_Fields\Field;

require __DIR__. '/includes/custom-header.php';
require __DIR__. '/includes/woocommerce-inc-functions.php';
require( __DIR__. "/includes/custom-footer.php");
ini_set("allow_url_fopen", "1");
ini_set("mbstring.func_overload", "2");


add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once('inc/carbon-fields/vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action( 'carbon_fields_register_fields', 'crb_register_custom_fields' );
function crb_register_custom_fields() {
    require_once __DIR__ . '/inc/custom-fields-option/theme-options.php';
    require_once __DIR__ . '/inc/custom-fields-option/tabs.php';
}

add_action( 'wp_enqueue_scripts', 'register_my_styles');

function register_my_styles() {
    wp_register_style( 'mystyle', get_stylesheet_directory_uri().'/style.css' );
//    wp_enqueue_style( 'mystyle', get_stylesheet_uri(), array('astra-theme-css') );
    wp_enqueue_style( 'parent-style', get_stylesheet_uri(), array('astra-theme-css') );

    wp_register_style( 'bootstrap', get_stylesheet_directory_uri().'/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap', get_stylesheet_uri(), array('astra-theme-css') );

    wp_register_style( 'bootstrap', get_stylesheet_directory_uri().'/assets/css/main.css' );
    wp_enqueue_style( 'bootstrap', get_stylesheet_uri(), array('astra-theme-css') );

    wp_register_style( 'mystyle1', get_stylesheet_directory_uri().'/assets/css/menu-style.css' );
    wp_enqueue_style( 'mystyle1', get_stylesheet_uri(), array('astra-theme-css') );

    wp_register_style( 'mystyle3', get_stylesheet_directory_uri().'/assets/css/header-style.css' );
    wp_enqueue_style( 'mystyle3', get_stylesheet_uri(), array('astra-theme-css') );

    wp_register_style( 'mystyle2', get_stylesheet_directory_uri().'/assets/css/footer-style.css' );
    wp_enqueue_style( 'mystyle2', get_stylesheet_uri(), array('astra-theme-css') );

    wp_register_style( 'mystyle4', get_stylesheet_directory_uri().'/assets/css/basket.css' );
    wp_enqueue_style( 'mystyle4', get_stylesheet_uri(), array('astra-theme-css') );

    wp_register_style( 'slick-css', get_stylesheet_directory_uri().'/assets/css/slick.css' );
    wp_enqueue_style( 'slick-css', get_stylesheet_uri(), array('astra-theme-css') );

    wp_dequeue_script('wc-checkout');
    wp_dequeue_style( 'woocommerce-general' );

    wp_register_style( 'owl-carousel', get_stylesheet_directory_uri().'/assets/css/owl.carousel.min.css' );
    wp_enqueue_style( 'owl-carousel', get_stylesheet_uri(), array('/assets/css/owl.carousel.min.css') );

    wp_register_style( 'owl-carousel-default', get_stylesheet_directory_uri().'/assets/css/owl.theme.default.min.css' );
    wp_enqueue_style( 'owl-carousel-default', get_stylesheet_uri(), array('astra-theme-css') );

    wp_register_style( 'main-page', get_stylesheet_directory_uri().'/assets/css/page-main.css' );
    wp_enqueue_style( 'main-page', get_stylesheet_uri(), array('astra-theme-css') );
}

add_filter( 'woocommerce_product_categories_widget_args', 'organicweb_exclude_widget_category' );
function organicweb_exclude_widget_category( $args ) {
// Enter the id of the category you want to exclude in place of '30'
    $args['exclude'] = array('34' );
    return $args;
}

function load_scripts(){
    wp_enqueue_script('jquery');
    wp_enqueue_script('newscript', get_stylesheet_directory_uri() . '/assets/js/main.js');

    wp_enqueue_script('jquery');
    wp_enqueue_script('newscript1', get_stylesheet_directory_uri() . '/assets/js/jquery.validate.min.js');
    wp_enqueue_script('script_slick_slider',  get_stylesheet_directory_uri().'/assets/js/slick.min.js');
    wp_enqueue_script('script_accordion_js',  get_stylesheet_directory_uri().'/assets/js/accordion.min.js');
    wp_enqueue_script('script_main_page',  get_stylesheet_directory_uri().'/assets/js/page-main.js');
    wp_enqueue_script('script_inputmask',  get_stylesheet_directory_uri().'/assets/js/inputmask.js');
    wp_enqueue_script('script_bootstrap',  get_stylesheet_directory_uri().'/assets/js/bootstrap.js');
    wp_enqueue_script('script_owl-carousel',  get_stylesheet_directory_uri().'/assets/js/owl.carousel.min.js');
    wp_enqueue_script('script_gsap',  get_stylesheet_directory_uri().'/assets/js/animation.gsap.js');
    wp_enqueue_script('script_draggable',  get_stylesheet_directory_uri().'/assets/js/draggable.gsap.js');
    wp_enqueue_script('script_scroll-magic',  get_stylesheet_directory_uri().'/assets/js/ScrollMagic.js');
//    wp_enqueue_script('jquery');
//    wp_enqueue_script('slickjs', get_stylesheet_directory_uri() . '/assets/js/slick.min.js');
}

add_action('wp_enqueue_scripts', 'load_scripts');


add_filter( 'wp_nav_menu', 'filter_function_name_4792', 10, 2 );
function filter_function_name_4792( $items, $args ){
    $items = "<div class='custom-changed-menu'>" . $items . "</div>";
    return $items;
}


add_filter( 'woocommerce_checkout_fields' , 'remove_checkout_fields' , 1);
function remove_checkout_fields( $fields ) {

    if( isset($_GET['dev']) && $_GET['dev'] == 'jshr' ){

    }

//    unset($fields['billing']['billing_first_name']);
//    unset($fields['billing']['billing_last_name']);
//    unset($fields['billing']['billing_phone']);
    unset($fields['shipping']['shipping_first_name']);
    unset($fields['shipping']['shipping_last_name']);
    unset($fields['shipping']['shipping_address_1']);
    unset($fields['shipping']['shipping_city']);
    $fields["billing"]["billing_city"]["required"] = false;
    unset($fields['billing']['billing_company']);
    $fields["billing"]["billing_address_1"]["required"] = false;
    unset($fields['billing']['billing_address_2']);
//    $fields['shipping']['ship_to_different_address'] = false;
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_state']);
    unset($fields['shipping']['shipping_state']);
//    unset($fields['shipping']['shipping_postcode']);
    $fields["shipping"]["shipping_postcode"]["required"] = false;
    unset($fields['order']['order_comments']);
//    unset($fields['billing']['billing_email']);
    $fields["billing"]["billing_email"]["required"] = false;
    return $fields;
}

add_action( 'wp_ajax_remove-product', 'find_product__ajax_remove' );
add_action( 'wp_ajax_nopriv_remove-product', 'find_product__ajax_remove' );
function find_product__ajax_remove() {

    $product_id = $_POST['product_id'];
    $countCarts = WC()->cart->get_cart_contents_count() + 1; //получаем число до обновления корзины

    WC()->cart->remove_cart_item($product_id);
    WC()->cart->calculate_totals();

    ob_start();

    woocommerce_mini_cart();

    $mini_cart = ob_get_clean();

    echo json_encode(array(
        'products' => WC()->cart->get_cart(),
        'total' => WC()->cart->get_cart_subtotal(),
        'fragments' => apply_filters(
            'woocommerce_add_to_cart_fragments',
            array(
                'products' => $mini_cart,
            )
        ),
        'cart_hash' => WC()->cart->get_cart_hash()
    ));
    die();
}

add_action( 'wp_ajax_add-product', 'find_product__ajax_add' );
add_action( 'wp_ajax_nopriv_add-product', 'find_product__ajax_add' );
function find_product__ajax_add() {
    ob_start();

    $product_id = $_POST['product_id'];
    $product = wc_get_product( $product_id );
    $quantity = $_POST['quantity'];
    $countCarts = WC()->cart->get_cart_contents_count() + 1; //получаем число до обновления корзины

    if( $product_id && !$quantity['key_id'] && ($countCarts <= 7)) {
        WC()->cart->add_to_cart($product_id);
    }

    if( $product_id && $quantity['key_id'] && $quantity['count'] && ($countCarts <= 7)) {
        WC()->cart->set_quantity($quantity['key_id'], $quantity['count']);
    }

    woocommerce_mini_cart();

    $mini_cart = ob_get_clean();

    $data = array(
        'fragments' => apply_filters(
            'woocommerce_add_to_cart_fragments',
            array(
                'products' => $mini_cart,
            )
        ),
        'cart_hash' => WC()->cart->get_cart_hash(),
        'name' =>  $product->name,
        'total' => WC()->cart->get_cart_subtotal(),
        'count' => $countCarts
    );

    echo json_encode( $data );
    die();
}


function custom_dequeue() {
     wp_dequeue_script('astra-mobile-cart');
//    wp_dequeue_style('astra-theme-css');
////    wp_dequeue_style('prettyPhoto');
//    wp_deregister_style('astra-theme-css');
////    wp_deregister_style('prettyPhoto');
}
add_action( 'wp_enqueue_scripts', 'custom_dequeue', 9999 );
add_action( 'wp_head', 'custom_dequeue', 9999 );

function gaga_lite_category_lists(){

    $categories = get_categories(

        array(
            'hide_empty' =>  1,
            "orderby" => "name",
            "order" => "ASC",
            'taxonomy'   =>  'product_cat' // mention taxonomy here.
        )
    );


    $category_lists = array();

    $category_lists[0] = __( 'Select Category' , 'gaga-lite' );

    foreach( $categories as $category ){

        $category_lists[$category->term_id] = $category->name;
    }

    return $category_lists;

}

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
                <span class="woocommerce-help-tip" data-tip="Чтобы вывести списком используйте символ \n"></span>
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

add_action( 'wp_ajax_section', 'getSections' );
add_action( 'wp_ajax_nopriv_section', 'getSections' );
function getSections(){
    if($_POST['query']['category']){
        $query = ( $_POST['query']['category'] !== 'all' ) ? $_POST['query']['category'] : '';
        get_template_part( 'template-parts/category', 'section', $query );
        die();
    }

    if($_POST['query']['target']){
        $query = $_POST['query']['target'];
        get_template_part( 'template-parts/category', 'product', $query );
        die();
    }

    if(!$_POST['query']['target'] && !$_POST['query']['category']){
        $uri = $_SERVER['REQUEST_URI'];
        $pathnames = explode('/', $uri);
        $pathnames = array_diff($pathnames, array(''));
        $pathname = '';
        if(!empty($pathnames[2])){
            $pathname = $pathnames[2];
        }
        if(!empty($pathnames[3])){
            $pathname = $pathnames[3];
        }
        get_template_part( 'template-parts/category', 'section', $pathname );
    }
    return;
}

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

add_filter('woocommerce_before_add_to_cart_form', 'add_price_and_note_simple_product');

function add_price_and_note_simple_product(){
    global $product;
    ?>
    <div class="simple__product-additionally">
        <div class="simple__product-price">
            <?=$product->get_price_html();?>
        </div>
        <div class="simple__product-note">
            <?=$product->get_meta('_recommended_note');?>
        </div>
    </div>
    <?
};

