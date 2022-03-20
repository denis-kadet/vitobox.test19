<?php
///**
// * The template for displaying product content within loops
// *
// * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
// *
// * HOWEVER, on occasion WooCommerce will need to update template files and you
// * (the theme developer) will need to copy the new files to your theme to
// * maintain compatibility. We try to do this as little as possible, but it does
// * happen. When this occurs the version of the template file will be bumped and
// * the readme will list any important changes.
// *
// * @see     https://docs.woocommerce.com/document/template-structure/
// * @package WooCommerce\Templates
// * @version 3.6.0
// */
//
//defined( 'ABSPATH' ) || exit;
//
//global $product;
//// Ensure visibility.
//if ( empty( $product ) || ! $product->is_visible() ) {
//	return;
//}
//
//$products = new WP_Query( array(
//    'post_type'      => array('product'),
//    'post_status'    => 'publish',
//    'posts_per_page' => -1,
//    'tax_query'      => array( array(
//        'taxonomy'        => 'pa_targets',
//        'field'           => 'slug',
//        'terms'           =>  array('energy_level'),
//        'operator'        => 'IN',
//    ) )
//) );
//?>
<!--<ul class="catalog-list row">-->
<?php
//// The Loop
//if ( $products->have_posts() ): while ( $products->have_posts() ):
//    $products->the_post();
//    ?>
<!--            <li class="col-3 col-md-3">-->
<!--                <div class="catalog-item">-->
<!--                    --><?// if(!empty($product->get_meta('is_new'))) :?>
<!--                        <div class="catalog-status-new">-->
<!--                            new-->
<!--                        </div>-->
<!--                    --><?// endif ;?>
<!--                    --><?php //woocommerce_show_product_sale_flash( $post, $product ); ?>
<!--                    <div class="catalog-top" href="--><?php //echo get_permalink($products->post->ID) ?><!--">-->
<!--                        <div class="catalog-image">-->
<!--                            --><?//=get_the_post_thumbnail($products->post->ID, 'shop_single');?>
<!--                        </div>-->
<!--                        <div class="catalog-item-info">-->
<!--                            <h3 class="catalog-title">--><?php //the_title(); ?><!--</h3>-->
<!--                            <span class="catalog-dosage">--><?//=$product->get_meta('_recommended_count');?><!--</span>-->
<!--                            <div class="category-attribute">-->
<!--                                <div class="catalog-icon" data-attr="">-->
<!--                                    <svg width="27" height="29" viewBox="0 0 27 29" fill="none"-->
<!--                                         xmlns="http://www.w3.org/2000/svg">-->
<!--                                        <path d="M13.3288 0.711914C12.1301 5.34116 9.9041 4.80701 8.70547 9.43625C7.50685 14.0655 9.9041 14.7777 8.70547 19.4069C7.50685 24.0362 5.28081 23.502 4.08218 28.1313"-->
<!--                                              stroke="#2C1E2F" stroke-miterlimit="10" stroke-linecap="round"-->
<!--                                              stroke-linejoin="round"/>-->
<!--                                        <path d="M18.4657 0.711914C17.2671 5.34116 15.0411 4.80701 13.8424 9.43625C12.6438 14.0655 15.0411 14.7777 13.8424 19.4069C12.6438 24.0362 10.4178 23.502 9.21915 28.1313"-->
<!--                                              stroke="#2C1E2F" stroke-miterlimit="10" stroke-linecap="round"-->
<!--                                              stroke-linejoin="round"/>-->
<!--                                        <path d="M23.6028 0.711914C22.4041 5.34116 20.1781 4.80701 18.9794 9.43625C17.7808 14.0655 20.1781 14.7777 18.9794 19.4069C17.7808 24.0362 15.5548 23.502 14.3561 28.1313"-->
<!--                                              stroke="#2C1E2F" stroke-miterlimit="10" stroke-linecap="round"-->
<!--                                              stroke-linejoin="round"/>-->
<!--                                        <path d="M22.9178 27.9532C24.62 27.9532 26 26.5183 26 24.7483C26 22.9783 24.62 21.5435 22.9178 21.5435C21.2155 21.5435 19.8356 22.9783 19.8356 24.7483C19.8356 26.5183 21.2155 27.9532 22.9178 27.9532Z"-->
<!--                                              stroke="#2C1E2F" stroke-miterlimit="10" stroke-linecap="round"-->
<!--                                              stroke-linejoin="round"/>-->
<!--                                        <path d="M4.08218 8.36798C5.78442 8.36798 7.16437 6.93311 7.16437 5.16311C7.16437 3.39312 5.78442 1.95825 4.08218 1.95825C2.37993 1.95825 1 3.39312 1 5.16311C1 6.93311 2.37993 8.36798 4.08218 8.36798Z"-->
<!--                                              stroke="#2C1E2F" stroke-miterlimit="10" stroke-linecap="round"-->
<!--                                              stroke-linejoin="round"/>-->
<!--                                    </svg>-->
<!--                                </div>-->
<!--                                <div class="catalog-icon" data-attr="">-->
<!--                                    <svg width="25" height="29" viewBox="0 0 25 29" fill="none"-->
<!--                                         xmlns="http://www.w3.org/2000/svg">-->
<!--                                        <path d="M9.98558 7.89573C9.63028 7.36604 8.70851 7.34497 8.32639 7.8578C6.24483 9.89648 1.29064 16.042 1.19227 19.8646C1.07155 24.5559 4.13404 27.4076 8.55855 27.5088C12.9831 27.6099 15.9998 25.0711 16.125 20.206C16.2234 16.3834 11.9598 10.0271 9.98558 7.89573Z"-->
<!--                                              stroke="#2C1E2F" stroke-miterlimit="10" stroke-linecap="round"-->
<!--                                              stroke-linejoin="round"/>-->
<!--                                        <path d="M19.3609 9.1532C21.8045 9.20907 23.8334 7.38734 23.8927 5.08427C23.952 2.78121 22.0191 0.868929 19.5755 0.813065C17.1319 0.757201 15.1029 2.57891 15.0437 4.88197C14.9844 7.18503 16.9173 9.09734 19.3609 9.1532Z"-->
<!--                                              stroke="#2C1E2F" stroke-miterlimit="10" stroke-linecap="round"-->
<!--                                              stroke-linejoin="round"/>-->
<!--                                    </svg>-->
<!--                                </div>-->
<!--                                <div class="catalog-icon" data-attr="">-->
<!--                                    <svg width="16" height="29" viewBox="0 0 16 29" fill="none"-->
<!--                                         xmlns="http://www.w3.org/2000/svg">-->
<!--                                        <path d="M15 9.7119V27.7119H7.5679H1V9.7119C1 7.3719 2.03705 5.21191 3.76544 3.9519V13.1319C3.76544 15.6519 5.66667 17.6319 8.08643 17.6319C10.5062 17.6319 12.4074 15.6519 12.4074 13.1319V3.9519C12.5802 4.1319 12.9259 4.3119 13.0988 4.4919C14.3086 5.9319 15 7.7319 15 9.7119Z"-->
<!--                                              stroke="#2C1E2F" stroke-miterlimit="10" stroke-linecap="round"-->
<!--                                              stroke-linejoin="round"/>-->
<!--                                        <path d="M12.4074 3.95192V2.51192C12.4074 1.43191 11.5432 0.711914 10.679 0.711914H5.49386C4.45683 0.711914 3.76547 1.61191 3.76547 2.51192V3.95192"-->
<!--                                              stroke="#2C1E2F" stroke-miterlimit="10" stroke-linecap="round"-->
<!--                                              stroke-linejoin="round"/>-->
<!--                                    </svg>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="catalog-desc-item">-->
<!--                                --><?//= the_excerpt($products->post); ?>
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="catalog-bottom">-->
<!--                        <div class="catalog-item-price">-->
<!--                            --><?php //echo $product->get_price_html(); ?>
<!--                        </div>-->
<!--                        <div class="catalog-recommended">-->
<!--                            --><?//=$product->get_meta('_recommended_note');?>
<!--                        </div>-->
<!--                        --><?php //woocommerce_template_loop_add_to_cart( $products->post, $product ); ?>
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!--    --><?php
//endwhile;
//    wp_reset_postdata();
//endif;
//?>
<!--</ul>-->
<!---->
