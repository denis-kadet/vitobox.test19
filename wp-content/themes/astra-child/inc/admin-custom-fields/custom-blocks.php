<?php
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

add_filter('woocommerce_before_add_to_cart_quantity', 'add_block_quantity_simple_product');

function add_block_quantity_simple_product(){
    global $product;
    ?>
    <div class="product__simple-quantity">
        <span class="product__simple-text-quantity">1</span>
        <ul class="list-quantity-options">
            <?php for($i = 1; $i<=3; $i++) { ?>
                 <? if( (int)$i == $product->get_meta('_recommended_number') ):?>
                     <li class="item-quantity-option"><?=$i;?>(рекомендуется)</li>
                 <? else :?>
                     <li class="item-quantity-option"><?=$i;?></li>
               <? endif ;?>
            <?php } ;?>
        </ul>
    </div>
    <?
};