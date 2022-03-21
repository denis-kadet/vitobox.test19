<div class="basket_background">
    <div class="basket_vitobox">
        <div class="products__control">
            <div class="basket__top">
                <div class="close">
                    <img src='<?=get_stylesheet_directory_uri()."/assets/img/close.svg";?>' alt="Закрыть">
                </div>
                <div class="basket__title">
                    Корзина
                </div>
                <div class="basket__desc">
                    Месячный набор витаминов в удобных <strong>пакетиках саше</strong>
                </div>
            </div>
            <div class="product_container">
                <?php woocommerce_mini_cart() ?>
            </div>
        </div>
        <div class="basket__bottom">
            <a  class="btn_vito" href="/checkout/">Перейти к оформлению</a>
        </div>
    </div>
</div>
<div class="popup__list-cart"></div>
