<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post, $product;

$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

if ( ! $short_description ) {
	return;
}

?>
<div class="woocommerce-product-details__short-description">
    <?php echo $short_description; // WPCS: XSS ok. ?>
</div>
<!-- Button trigger modal -->
<a href="javascript:void(0)" type="button" class="single_product__compose" data-bs-toggle="modal" data-bs-target="#exampleModal">Дозировки</a>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog product__modal modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?=$product->name;?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <strong>Состав</strong>
                    </div>
                    <div class="col-2">
                        <strong>Дозировка</strong>
                    </div>
                    <div class="col-4">
                        <strong>Суточная норма</strong>
                    </div>
                    <div class="col-2">
                        <strong>% от РСП</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <strong>Витамин С (Аскорбиновая кислота)</strong>
                    </div>
                    <div class="col-2">
                        <strong>800 мг</strong>
                    </div>
                    <div class="col-4">
                        <strong>90 мг</strong>
                    </div>
                    <div class="col-2">
                        <strong>889</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <strong>Витамин А (Ретинола ацетат)</strong>
                    </div>
                    <div class="col-2">
                        <strong>3 мг</strong>
                    </div>
                    <div class="col-4">
                        <strong>20 мг</strong>
                    </div>
                    <div class="col-2">
                        <strong>5 мг</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <strong>Витамин В3 (Никотиновая кислота)</strong>
                    </div>
                    <div class="col-2">
                        <strong>800 мг</strong>
                    </div>
                    <div class="col-4">
                        <strong>20 мг</strong>
                    </div>
                    <div class="col-2">
                        <strong>889</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <strong>Витамин В6 (Пиридоксин)</strong>
                    </div>
                    <div class="col-2">
                        <strong>800 мг</strong>
                    </div>
                    <div class="col-4">
                        <strong>90 мг</strong>
                    </div>
                    <div class="col-2">
                        <strong>889</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
