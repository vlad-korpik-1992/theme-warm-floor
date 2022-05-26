<footer class="footer">
    <div class="footer__bg">
        <div class="wrapper">
            <ul class="footer__menu">
                <li class="footer__menu__items">                            
                    <a class="footer__menu__link" href="<?php echo site_url(); ?>">Главная</a>
                </li>
                <li class="footer__menu__items">
                    <a class="footer__menu__link" href="<?php echo site_url(); ?>/products/radiators/">Радиаторы</a>
                </li>
                <li class="footer__menu__items">
                    <a class="footer__menu__link" href="<?php echo site_url(); ?>/products/warm-floor/">Теплый пол</a>
                </li>
                <li class="footer__menu__items">
                    <a class="footer__menu__link" href="<?php echo site_url(); ?>/products/boilers/">Бойлеры</a>
                </li>
                <li class="footer__menu__items">
                    <a class="footer__menu__link" href="<?php echo get_page_link(160)?>">История бренда</a>
                </li>
                <li class="footer__menu__items">
                    <a class="footer__menu__link" href="<?php echo get_page_link(140)?>">Новости</a>
                </li>
                <li class="footer__menu__items">
                    <a class="footer__menu__link" href="<?php echo get_page_link(153)?>">Контакты</a>
                </li>
            </ul>
            <div class="footer__box">  
                <div class="footer__box__items">
                    <a class="footer__link footer__link_underline" href="mailto:<?php the_field('contacts_mail', 153)?>"><?php the_field('contacts_mail', 153)?></a>
                    <?php $phone = str_replace([' ', '(', ')', '-'], '', get_field('contacts_phone', 153));?>
                	<a class="footer__link" href="tel:<?php echo $phone;?>"><?php the_field('contacts_phone', 153);?></a>
                </div>
                <div class="footer__box__items">
                    <address class="footer__address"><?php the_field('contacts_address', 153)?></address>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__copy">
        <div class="wrapper">
            <a class="footer__copy__link" href="https://nastarte.by/" target="_blank">Дизайн и разработка — NaStarte</a>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
