<?php
/**
 * Подлючение carbon-fields
 */
use Carbon_Fields\Container;
use Carbon_Fields\Field;

require __DIR__. '/includes/custom-header.php';
require __DIR__. '/includes/woocommerce-inc-functions.php';
require_once __DIR__ . '/inc/admin-custom-fields/admin-fields.php';
require_once __DIR__ . '/inc/admin-custom-fields/custom-blocks.php';
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

    $uri = $_SERVER['REQUEST_URI'];
    $pathnames = explode('/', $uri);
    if( in_array("checkout", $pathnames) ){
        wp_register_style( 'checkout-style', get_stylesheet_directory_uri().'/assets/css/checkout-style.css' );
        wp_enqueue_style( 'checkout-style', get_stylesheet_uri(), array('astra-theme-css') );
    }

}

add_filter( 'woocommerce_product_categories_widget_args', 'organicweb_exclude_widget_category' );
function organicweb_exclude_widget_category( $args ) {
// Enter the id of the category you want to exclude in place of '30'
    $args['exclude'] = array('34' );
    return $args;
}

function load_scripts(){
//    wp_enqueue_script('jquery');
    wp_enqueue_script('newscript', get_stylesheet_directory_uri() . '/assets/js/main.js');
//    wp_enqueue_script('jquery');
    wp_enqueue_script('newscript1', get_stylesheet_directory_uri() . '/assets/js/jquery.validate.min.js');
    wp_enqueue_script('jquery-cookie',  get_stylesheet_directory_uri().'/assets/js/jquery.cookie.js');
    wp_enqueue_script('script_slick_slider',  get_stylesheet_directory_uri().'/assets/js/slick.min.js');
    wp_enqueue_script('script_accordion_js',  get_stylesheet_directory_uri().'/assets/js/accordion.min.js');
    wp_enqueue_script('script_main_page',  get_stylesheet_directory_uri().'/assets/js/page-main.js');
    wp_enqueue_script('script_inputmask',  get_stylesheet_directory_uri().'/assets/js/inputmask.js');
    wp_enqueue_script('script_bootstrap',  get_stylesheet_directory_uri().'/assets/js/bootstrap.js');
}

add_action('wp_enqueue_scripts', 'load_scripts');


add_filter( 'wp_nav_menu', 'filter_function_name_4792', 10, 2 );
function filter_function_name_4792( $items, $args ){
    $items = "<div class='custom-changed-menu'>" . $items . "</div>";
    return $items;
}


add_filter( 'woocommerce_checkout_fields' , 'remove_checkout_fields' , 1);
function remove_checkout_fields( $fields ) {

    unset($fields['shipping']['shipping_first_name']);
    unset($fields['shipping']['shipping_last_name']);
    unset($fields['shipping']['shipping_address_1']);
    unset($fields['shipping']['shipping_city']);
    $fields["billing"]["billing_city"]["required"] = false;
    unset($fields['billing']['billing_company']);
    $fields["billing"]["billing_address_1"]["required"] = false;
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_state']);
    unset($fields['shipping']['shipping_state']);
    $fields["shipping"]["shipping_postcode"]["required"] = false;
    unset($fields['order']['order_comments']);
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
    $quantity = $_POST['quantity'];;
    $product = wc_get_product( $product_id );
    $quantityBasket = '';

    if($quantity) {
        foreach( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            if ($cart_item['product_id'] == $product_id) {
                $quantityOld = $cart_item['quantity'];
                WC()->cart->set_quantity($cart_item_key, $quantity); //обновляем кол-во товара
                $quantityBasket = WC()->cart->get_cart_contents_count(); //вызываем обновленное число кол-во товара в корзине
                if($quantityBasket > 7){
                    WC()->cart->set_quantity($cart_item_key, $quantityOld);
                }
            }
        }
    }

//    $quantityBasket = WC()->cart->get_cart_contents_count() + 1;
    if( $product_id && !$quantity ) {
        $quantityBasket = WC()->cart->get_cart_contents_count() + 1; //вызываем обновленное число кол-во товара в корзине
        if($quantityBasket < 8){
            WC()->cart->add_to_cart($product_id);
        }
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
        'count' => $quantityBasket
    );

    echo json_encode( $data );
    die();
}


function custom_dequeue() {
     wp_dequeue_script('astra-mobile-cart');
}
add_action( 'wp_enqueue_scripts', 'custom_dequeue', 9999 );
add_action( 'wp_head', 'custom_dequeue', 9999 );

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


add_action( 'woocommerce_get_cart_contents', 'createUserBeforeCheckout', 1, 2 );

function createUserBeforeCheckout($data){

    if(!is_user_logged_in()){
        $login = 'tmp_user' . (time() - 1648551827);
        $pass = md5('tmp_user_pass' . time());
        $email = 'tmp_user_email' . (time() - 1648551827) . '@df.com';
        $userdata = [
            'user_login'           => $login,      // (string) Имя пользователя для входа в систему.
            'user_pass'            => $pass,
            'user_email'           => $email,      // (string) Адрес электронной почты пользователя.
            'role'                 => 'subscriber',      // (string) Роль пользователя.
        ];
        $user_id = wp_insert_user($userdata);

        $user = get_user_by( 'id', $user_id );
        if( $user ) {
            wp_set_current_user( $user_id, $user->user_login );
            wp_set_auth_cookie( $user_id );
            do_action( 'wp_login', $user->user_login, $user );
        }
    }
    return $data;
}


add_filter( 'woocommerce_order_number', 'change_woocommerce_order_number' );

function change_woocommerce_order_number( $order_id ) {

    $new_order_id =  $order_id + 15000;
    return $new_order_id;
}

add_filter( 'woocommerce_product_single_add_to_cart_text', 'changeCartButton', 100000, 1 );

function changeCartButton($data){
    return "Добавить";
}

/*public function single_add_to_cart_text() {
    return apply_filters( 'woocommerce_product_single_add_to_cart_text', WC_Subscriptions_Product::get_add_to_cart_text(), $this );
}*/

