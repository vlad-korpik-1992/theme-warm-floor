<?php get_header();?>
<section class="hero">
    <div class="wrapper">
        <div class="hero__cart">
            <div class="hero__cart__items">
                <h1><?the_field('cart_die_heading');?></h1>
                <? echo wpautop(get_field('cart_die_text'));?>
            </div>
        </div>
    </div>
</section>
<section class="breadcrumbs">
    <div class="wrapper">
        <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(''); ?>
    </div>
</section>
<section class="cart">
    <div class="wrapper">
        <h2 class="section-head section-head_cart"><?php single_post_title(); ?></h2>
        <?php if ( $slides = get_field('cart_gallery') ):?>
            <div class="cart__box">
                <div class="cart__box__items">
                    <div class="cart__slider">
                        <?php foreach ( $slides as $slide ): ?>
                            <img class="cart__slider__img" src="<?php echo $slide;?>" alt="">
                        <?php endforeach; ?>
                    </div>
                    <div class="cart__sliderprev">
                        <?php foreach ( $slides as $slide ): ?>
                            <img class="cart__sliderprev__img" src="<?php echo $slide;?>" alt="">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="cart__desc">
            <div class="cart__desc__content">
                <h3 class="cart__desc__title">Описание и характеристики</h3>
                <? echo wpautop(the_content()); ?>
                <button class="cart__desc__btn">Заказать в один клик</button>
            </div>
            <div class="cart__desc__video rating__video--one">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/video-img.jpg" alt="">
                <img class="btn-youtube" src="<?php bloginfo('template_url'); ?>/assets/img/video-btn.png" alt="">
            </div>
        </div>
    </div>
    <div class="fluidimg">
        <div class="fluidimg__items">
            <img class="fluidimg__items__img" src="<?php bloginfo('template_url'); ?>/assets/img/meter-one.png" alt="">
        </div>
        <div class="fluidimg__items">
            <img class="fluidimg__items__img" src="<?php bloginfo('template_url'); ?>/assets/img/meter-two.png" alt="">
        </div>
        <div class="fluidimg__items">
            <img class="fluidimg__items__img" src="<?php bloginfo('template_url'); ?>/assets/img/meter-three.png" alt="">
        </div>
    </div>
</section>
<section class="tabs">
    <div class="wrapper">
        <div class="tabs__box">
            <div class="tabs__box__items">
                <div class="tabs__box__tab tabs__box__tab_active" id="mech">Механический</div>
                <div class="tabs__box__tab" id="prog">Программируемый</div>
                <div class="tabs__box__tab" id="wi">WI - FI</div>
            </div>
            <div class="tabs__box__items">
                <div class="tabs__box__content tabs__box__content_active" id="1mech">
                    <h3 class="tabs__box__content__head">Механический</h3>
                    <?
                        if(get_field('cart_mechanical_remote_control') != ''):
                            echo wpautop(get_field('cart_mechanical_remote_control'));
                            else:
                                echo wpautop('Информация отсуствует');
                        endif;
                    ?>
                </div>
                <div class="tabs__box__content" id="1prog">
                    <h3 class="tabs__box__content__head">Программируемый</h3>
                    <?
                        if(get_field('cart_programmable_remote_control') != ''):
                            echo wpautop(get_field('cart_programmable_remote_control'));
                            else:
                                echo wpautop('Информация отсуствует');
                        endif;
                    ?>
                </div>
                <div class="tabs__box__content" id="1wi">
                    <h3 class="tabs__box__content__head">WI - FI</h3>
                    <?
                        if(get_field('cart_wi-fi_remote_control') != ''):
                            echo wpautop(get_field('cart_wi-fi_remote_control'));
                            else:
                                echo wpautop('Информация отсуствует');
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $categories = get_the_terms($post->ID, "products");
    foreach ( $categories as $category):
        $slug = $category->slug;
    endforeach;
	$args = array (
		'numberpost' => 9,
        'post_type' => 'product',
		'post__not_in' => array( $post->ID ),
        'posts_per_page' => 3,
		'orderby'  => 'rand',
		'post_status' => 'publish',
        'tax_query' => array(
            array(
                 'taxonomy' => 'products',
                 'field' => 'slug',
                 'terms' => $slug
            )
       )
	);
    $result = wp_get_recent_posts($args);
?>
<section class="similar">
    <div class="wrapper">
        <div class="similar__box">
            <?foreach($result as $product):?>
                <div class="similar__box__items">
                    <a class="similar__box__items__cover<?if($slug === 'boilers'):?> catalog__box__items__cover_height<?endif;?>" href="<?php echo get_permalink($product['ID']); ?>">
                        <img class="similar__box__items__img <?if($slug === 'warm-floor'):?> similar__box__items__img_height<?endif;?>" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $product['ID'] ) ); ?>" alt="">
                    </a>
                    <a class="similar__box__items__link" href="<?php echo get_permalink($product['ID']); ?>"><?echo $product['post_title'];?></a>
                    <div class="similar__box__items__footer">
                        <p class="similar__box__items__none"><?echo $product['post_title'];?></p>
                        <p class="similar__box__items__price"><? echo get_field('cart_price', $product['ID'])?> BYN</p>
                        <button class="similar__box__items__btn">Заказать в один клик</button>
                    </div>
                </div>
            <?endforeach;?>
        </div>
    </div>
</section>
<section id="popup" class="popup productoneclick">
    <a href="#" class="popup__area"></a>
    <div class="popup__body">
        <div class="popup__content">
            <div class="popup__header popup__header--order">
                <button class="popup__header_close">
                    <svg class="close-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                        <path d="M 9.15625 6.3125 L 6.3125 9.15625 L 22.15625 25 L 6.21875 40.96875 L 9.03125 43.78125 L 25 27.84375 L 40.9375 43.78125 L 43.78125 40.9375 L 27.84375 25 L 43.6875 9.15625 L 40.84375 6.3125 L 25 22.15625 Z"></path>
                    </svg>
                </button>
            </div>
            <div class="popup__text">
                <form class="ajax__form" method="post" id="product_ajax__form">
                    <input type="hidden" name="productmodaltitle" value="<?php single_post_title(); ?>">
                    <input type="hidden" name="productmodalprice" value="<? echo get_field('cart_price', $product['ID'])?> BYN">
                    <div class="form__group">
                        <input type="text" class="form__group_text" required="required" id="productmodalname" name="productmodalname" value="" placeholder="Ваше имя*">
                    </div>
                    <div class="form__group">
                        <input type="text" class="form__group_text" required="required" id="productmodalphone" name="productmodalphone" value="" placeholder="Номер телефона*">
                    </div>
                    <div class="form__group">
                        <textarea class="form__group_textarea" name="productletter" id="productmessages" type="text" cols="80" rows="10" placeholder="Напишите что Вас интересует"></textarea>
                    </div>
                    <div class="letter__form__error letter__form__error_mt error" id="product_status__error"></div>
                    <div class="form__group">
                        <button id="product-send" class="form__btn" type="submit">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section id="popup" class="popup orderoneclick">
    <a href="#" class="popup__area"></a>
    <div class="popup__body">
        <div class="popup__content">
            <div class="popup__header popup__header--order">
                <button class="popup__header_close">
                    <svg class="close-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                        <path d="M 9.15625 6.3125 L 6.3125 9.15625 L 22.15625 25 L 6.21875 40.96875 L 9.03125 43.78125 L 25 27.84375 L 40.9375 43.78125 L 43.78125 40.9375 L 27.84375 25 L 43.6875 9.15625 L 40.84375 6.3125 L 25 22.15625 Z"></path>
                    </svg>
                </button>
            </div>
            <div class="popup__text">
                <form class="ajax__form" method="post" id="ajax__form">
                    <input type="hidden" id="modaltitle" name="modaltitle" value="">
                    <input type="hidden" id="modalprice" name="modalprice" value="">
                    <div class="form__group">
                        <input type="text" class="form__group_text" required="required" id="ordermodalname" name="ordermodalname" value="" placeholder="Ваше имя*">
                    </div>
                    <div class="form__group">
                        <input type="text" class="form__group_text" required="required" id="ordermodalphone" name="ordermodalphone" value="" placeholder="Номер телефона*">
                    </div>
                    <div class="form__group">
                        <textarea class="form__group_textarea" name="orderletter" id="ordermessages" type="text" cols="80" rows="10" placeholder="Напишите что Вас интересует"></textarea>
                    </div>
                    <div class="letter__form__error letter__form__error_mt error" id="status__error"></div>
                    <div class="form__group">
                        <button id="orderoneclick-send" class="form__btn" type="submit">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="popup video--one">
    <a href="#" class="popup__area"></a>
    <div class="popup__body">
        <button class="popup__header_close popup__header_close_video">
            <svg class="close-icon close-icon--video" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                <path d="M 9.15625 6.3125 L 6.3125 9.15625 L 22.15625 25 L 6.21875 40.96875 L 9.03125 43.78125 L 25 27.84375 L 40.9375 43.78125 L 43.78125 40.9375 L 27.84375 25 L 43.6875 9.15625 L 40.84375 6.3125 L 25 22.15625 Z"></path>
            </svg>
        </button>
        <div class="popup__content popup__content--video">
            <div class="popup__video">
                <?echo the_field('cart_video');?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>