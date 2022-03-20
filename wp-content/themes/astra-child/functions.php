<?php

require __DIR__. '/includes/custom-header.php';
require __DIR__. '/includes/woocommerce-inc-functions.php';
require( __DIR__. "/includes/custom-footer.php");
ini_set("allow_url_fopen", "1");
ini_set("mbstring.func_overload", "2");


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
//    unset($fields['billing']['billing_first_name']);
//    unset($fields['billing']['billing_last_name']);
//    unset($fields['billing']['billing_phone']);
    unset($fields['shipping']['shipping_first_name']);
    unset($fields['shipping']['shipping_last_name']);
    unset($fields['shipping']['shipping_address_1']);
    unset($fields['shipping']['shipping_city']);


//    unset($fields['billing']['billing_city']);
    $fields["billing"]["billing_city"]["required"] = false;
    unset($fields['billing']['billing_company']);
//    unset($fields['billing']['billing_address_1']);
    $fields["billing"]["billing_address_1"]["required"] = false;
    unset($fields['billing']['billing_address_2']);
//    $fields['shipping']['ship_to_different_address'] = false;
    unset($fields['billing']['billing_postcode']);
////    unset($fields['billing']['billing_country']);
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
        'cart_hash' => WC()->cart->get_cart_hash(),
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

    if( $product_id && !$quantity['key_id'] && !$quantity['count'] ) {
        WC()->cart->add_to_cart($product_id);
    }

    if( $product_id && $quantity['key_id'] && $quantity['count']) {
        $count = $quantity['count'];
        WC()->cart->set_quantity($quantity['key_id'], $count);
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
        'name' =>  $product->get_title(),
        'total' => WC()->cart->get_cart_subtotal()
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
            'id'      => '_recommended_note',
            'label'   => 'Рекомендовано капсул',
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
    update_post_meta($post_id, 'is_new', $checkboxNew);
    update_post_meta($post_id, '_recommended_note', $textRecommended);
    update_post_meta($post_id, '_recommended_count', $textRecommendedCount);
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
    }

    if(!$_POST['query']['target'] && !$_POST['query']['category']){
        get_template_part( 'template-parts/category', 'section', '' );
    }
}