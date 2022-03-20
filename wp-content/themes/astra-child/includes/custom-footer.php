<?php
function custom_footer(){
    echo '<footer class="site-footer" id="colophon" itemtype="https://schema.org/WPFooter" itemscope="itemscope" itemid="#colophon">

           <div class="footer-container">
           <div class="footer-container-wrapper">
           
           <div class="footer-container-wrapper__column1">
           
                <div class="footer-string" >Получите доступ к новым статьям, акциям и специальным предложениям для вас</div>
            <div class="footer-email-field">
                <div class="footer-email-field-container">
                    <form id="footer-email-field-container__subscribe">
                    <input type="text" name="subscribe-email" placeholder="Email" /><img src="http://test19.softmg.ru/wp-content/uploads/2022/02/footer-right-arrow.png" class="footer-email-sender"/>
                    </form>
                    <div class="footer-email-field-container__success_message valid">Вы успешно подписались на новости</div>
                </div>
                
            
            </div>
            <div class="footer-social">
                <div class="footer-social-instagramm footer-social__element">
                    <a class="footer-social-link" target="_blank" href="https://www.instagram.com/vitobox.ru/ "><img src="http://test19.softmg.ru/wp-content/themes/astra-child/assets/img/instagram.svg" /><!--<img src="http://test19.softmg.ru/wp-content/uploads/2022/02/footer-instagram.png">-->
                    </a>
                </div>
                <div class="footer-social-telegramm footer-social__element">
                    <a class="footer-social-link" target="_blank"  href="https://t.me/VitoBoxbot"><img src="http://test19.softmg.ru/wp-content/themes/astra-child/assets/img/telegram.svg" /><!--<img src="http://test19.softmg.ru/wp-content/uploads/2022/02/footer-telegram.png">--></a>

                </div>
                <div class="footer-social-whatsapp footer-social__element">
                     <a class="footer-social-link" target="_blank"  href="https://api.whatsapp.com/send?phone=79100150306"><img src="http://test19.softmg.ru/wp-content/themes/astra-child/assets/img/whatsapp.svg" /><!--<img src="http://test19.softmg.ru/wp-content/uploads/2022/02/footer-whatsapp.png" alt="">--></a>

                </div>
    
            </div>
           
           </div>
           
           
           <div class="footer-container-wrapper__element2" >
           
                 <div class="footer-menu footer-hidden-menu-container">
                <div class="footer-chapter">
                    <div class="footer-menu-name footer-chapter__str">
                        Меню
                    </div>
                    <img class="footer-menu__arrow" src="http://test19.softmg.ru/wp-content/uploads/2022/02/footer-arrow-down.png" />

                </div>
                ';
    wp_nav_menu( [ 'menu' => 'footer-menu Astra', 'container_class' => 'footer-hidden-menu-container__element' ] );
    echo '</div>

            <div class="footer-contacts footer-hidden-menu-container">
                
                <div class="footer-chapter">
                
                    <div class="footer-contacts-name footer-chapter__str">
                    Контакты
                    </div>
                    <img class="footer-menu__arrow" src="http://test19.softmg.ru/wp-content/uploads/2022/02/footer-arrow-down.png" />

                </div>
               
               <div class="footer-contacts-links footer-hidden-menu-container__element">
                    <div class="footer-contacts-links_phone">
                        <a href="tel:88002502091">8 (800) 250 20-91</a>
                    </div>
                    <div class="footer-contacts-links_mail"></div>
                        <a href="mailto:support@vitobox.ru">support@vitobox.ru</a>
                    </div>
                

    
               </div>
           
           </div>
           
    
           
           
               </div>
            
            
               <div class="footer-commerce-block">
                      <div class="footer-commerce-block-agreement" id="footer-commerce-block-agreement"><a href="#">Пользовательское соглашение</a></div>
                      <div><a href="#">Политика конфиденциальности</a></div>
                      <div>© 2022 VitoBox. Все права защищены</div>
                    
               </div>
           
        </div>
        
        </footer>';
//    global $woocommerce;
//    echo $woocommerce->cart->get_cart_contents();
//    var_dump(WC()->cart);
//    WC()->cart;
//    var_dump(WC()->cart->get_cart_contents());
}


