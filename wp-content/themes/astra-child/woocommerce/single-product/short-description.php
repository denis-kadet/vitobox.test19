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
<a href="javascript:void(0)" type="button" class="single_product__compose" data-bs-toggle="modal" data-bs-target="#composeModal">Дозировки</a>
<!-- Modal -->
<div class="modal fade" id="composeModal" tabindex="-1" aria-labelledby="composeModalLabel" aria-hidden="true">
    <div class="modal-dialog product__modal modal-dialog-centered">
        <div class="modal-content">
            <div class="btn__close-modal" data-bs-dismiss="modal" aria-label="Close"></div>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?=$product->name;?></h5>
            </div>
            <div class="modal-body">
                <table class="modal-table">
                    <tr class="table_header-popup">
                        <th>Состав</th>
                        <th>Дозировка</th>
                        <th>Суточная норма</th>
                        <th>% от РСП</th>
                    </tr>
                    <tr>
                        <td>
                            <?=htmlspecialchars($product->get_meta('_row_one_name'));?>
                        </td>
                        <td class="text-center">
                            <?=$product->get_meta('_row_one_col_1');?>
                        </td>
                        <td class="text-center">
                            <?=$product->get_meta('_row_one_col_2');?>
                        </td>
                        <td class="text-center">
                            <?=$product->get_meta('_row_one_col_3');?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Витамин А<br>
                            (Ретинола ацетат)
                        </td>
                        <td class="text-center">
                            3 мг
                        </td>
                        <td class="text-center">
                            0.9 мг
                        </td>
                        <td class="text-center">
                            333
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Витамин В3<br>
                            (Никотиновая кислота)
                        </td>
                        <td class="text-center">
                            20 мг
                        </td>
                        <td class="text-center">
                            20 мг
                        </td>
                        <td class="text-center">
                            100
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Витамин В6<br>
                            (Пиридоксин)
                        </td>
                        <td class="text-center">
                            5 мг
                        </td>
                        <td class="text-center">
                            2 мг
                        </td>
                        <td class="text-center">
                            250
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Железо<br>
                            (Железа фумарат)
                        </td>
                        <td class="text-center">
                            20 мг
                        </td>
                        <td class="text-center">
                            2 мг
                        </td>
                        <td class="text-center">
                            200
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
