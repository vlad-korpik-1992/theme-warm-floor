<?php get_header();?>
<section class="hero">
    <div class="wrapper">
        <div class="hero__cart">
            <div class="hero__cart__items">
                <?$term = get_queried_object();?>
                <h1><?the_field('title_for_banner', $term);?></h1>
                <? echo wpautop(get_field('content_for_banner', $term));?>
            </div>
        </div>
    </div>
</section>
<section class="breadcrumbs">
    <div class="wrapper">
        <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(''); ?>
    </div>
</section>
<section class="catalog">
<div class="wrapper"><?
            $cat = get_term_by('name', single_cat_title('',false), 'products'); 
            $catSlug = $cat->slug;
            $mypost = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'tax_query' => array(
                  array(
                    'taxonomy' => 'products',
                    'field' => 'slug',
                    'terms' => $catSlug
                  ),
                ),
              );
            $loop = new WP_Query( $mypost );
        ?>        
        <h2 class="section-head"><?php echo  $cat->name; ?></h2>
        <div class="box">
            <div class="box__items">
                <div class="category__box">
                    <?php
                        while ( $loop->have_posts() ) : $loop->the_post();
                            $title = get_the_title();
                            $short_title = mb_strimwidth($title, 0, 11, "...");?>
                            <a class="category__box__link" href="<?php echo get_permalink($posts['ID']); ?>">
                                <img class="category__box__circle" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $posts['ID'] ) ); ?>" alt="<?echo $posts['post_title'];?>">
                                <p class="category__box__title"><?echo $short_title;?></p>
                            </a>
                        <?php endwhile;
                    wp_reset_query();?>
                </div>
                </div>
                <div class="box__items"></div>
            </div>
            <div class="box box_pt">
                <div class="box__items">
                    <div class="catalog__box">
                        <? while ( $loop->have_posts() ) : $loop->the_post();?>
                            <div class="catalog__box__items catalog__box__items_bottom">
                                <a href="<?php echo get_permalink($posts['ID']); ?>" class="similar__box__items__cover<?if($catSlug === 'boilers'):?> catalog__box__items__cover_height<?endif;?>">
                                    <img class="similar__box__items__img <?if($catSlug === 'warm-floor'):?> similar__box__items__img_height<?endif;?>" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $posts['ID'] ) ); ?>" alt="<?echo $posts['post_title'];?>">
                                </a>
                                <div class="similar__box__items__option">1 м.п.</div>
                                <a href="<?php echo get_permalink($posts['ID']); ?>" class="similar__box__items__link"><? echo get_the_title();?></a>
                                <div class="similar__box__items__footer">
                                    <p class="similar__box__items__none"><? echo get_the_title();?></p>
                                    <p class="similar__box__items__price"><?php the_field('cart_price', $posts['ID']);?> BYN</p>
                                    <button class="similar__box__items__btn">Заказать в один клик</button>
                                </div>
                            </div>
                        <?endwhile;?>
                    </div>
                </div>
                <div class="box__items">
                    <div class="box__sidebar box__sidebar_border-blue">
                        <h3 class="box__sidebar__title">Рассчитать стоимость</h3>
                        <form class="box__sidebar__form" id="sidebar-form">
                            <select class="box__sidebar__input" name="typethermostat" id="typethermostat">
                                <option value="">Тип терморегулятора</option>
                                <option value="Тип 1">Тип 1</option>
                                <option value="Тип 2">Тип 2</option>
                                <option value="Тип 3">Тип 3</option>
                                <option value="Тип 4">Тип 4</option>
                                <option value="Тип 5">Тип 5</option>
                            </select>
                            <input class="box__sidebar__input" name="firstname-cost" id="firstname-cost" type="text" placeholder="Как к вам обращаться?">
                            <input class="box__sidebar__input" name="phone-cost" id="phone-cost" type="text" placeholder="Номер телефона">
                            <select class="box__sidebar__input" name="social" id="social">
                                <option value="">Связаться через соц.сеть</option>
                                <option value="Viber">Viber</option>
                                <option value="Whatsapp">Whatsapp</option>
                                <option value="Telegram">Telegram</option>
                            </select>
                            <div class="letter__form__error letter__form__error_sidebartop  error" id="sidebar_status__error"></div>
                            <button class="box__sidebar__btn box__sidebar__btn_blue" type="send" id="btn-cost">Рассчитать стоимость</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
<section class="full">
    <div class="fluidimg fluidimg_top">
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
                    <?$term = get_queried_object();
                        $mechanical = get_field('catalog_mechanical_remote_control', $term);
                        $programmable = get_field('catalog_programmable_remote_control', $term);
                        $wifi = get_field('catalog_wifi_remote_control', $term);
                    ?>
                    <div class="tabs__box__tab tabs__box__tab_active" id="mech">Механический</div>
                    <div class="tabs__box__tab" id="prog">Программируемый</div>
                    <div class="tabs__box__tab" id="wi">WI - FI</div>
                </div>
                <div class="tabs__box__items">
                    <div class="tabs__box__content tabs__box__content_active" id="1mech">
                        <h3 class="tabs__box__content__head">Механический</h3>
                        <?
                        if($mechanical != ''):
                            echo wpautop($mechanical);
                            else:
                                echo wpautop('Информация отсуствует');
                        endif;
                        ?>
                    </div>
                    <div class="tabs__box__content" id="1prog">
                        <h3 class="tabs__box__content__head">Программируемый</h3>
                        <?
                        if($programmable != ''):
                            echo wpautop($programmable);
                            else:
                                echo wpautop('Информация отсуствует');
                        endif;
                        ?>
                    </div>
                    <div class="tabs__box__content" id="1wi">
                        <h3 class="tabs__box__content__head">WI - FI</h3>
                        <?
                        if($wifi != ''):
                            echo wpautop($wifi);
                            else:
                                echo wpautop('Информация отсуствует');
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pictures">
        <div class="pictures__box">
            <div class="pictures__box__items">
                <img class="pictures__box__items__img" src="<?php bloginfo('template_url'); ?>/assets/img/pictures-1.jpg" alt="">
            </div>
            <div class="pictures__box__items">
                <img class="pictures__box__items__img" src="<?php bloginfo('template_url'); ?>/assets/img/pictures-2.jpg" alt="">
            </div>
        </div>
    </section>
    <section class="company">
        <div class="wrapper">
            <div class="company__box">
                <div class="company__box__items">
                    <h2 class="section-head" id="about">О компании</h2>
                </div>
                <div class="company__box__items">
                    <?echo wpautop(get_field('home_company_text', 36));?>
                </div>
            </div>
        </div>
    </section>
    <?$args = array(
            'number'  => 10,
            'orderby' => 'comment_date',
            'order'   => 'DESC',
            'status'  => 1,
            'type'    => 'comment', 
        );
    $comments = get_comments( $args );?>
    <section class="reviews">
        <div class="wrapper">
            <h2 class="section-head">Реальные отзывы</h2>
            <div class="box box_reviews">
                <?php if( $comments = get_comments( $args ) ):?>
                    <div class="box__items">
                        <?php foreach( $comments as $comment ):?>
                            <div class="reviews__items">
                                <h4 class="reviews__items__title"><?php echo $comment->comment_author; ?></h4>
                                <?php echo wpautop($comment->comment_content);?>
                            </div>
                        <?endforeach;?>
                    </div>
                <? else:?>
                    <div class="box__items">
                        <div class="reviews__items">
                            <h4 class="reviews__items__title">Будьте первым, оставте свой отзыв</h4>
                        </div>
                    </div> 
                <?endif;?>
                <div class="box__items">
                    <div class="box__sidebar box__sidebar_border-blue">
                        <h3 class="box__sidebar__title">Оставить отзыв</h3>
                        <form class="box__sidebar__form" id="review-form">
                            <input class="box__sidebar__input" name="reviewname" id="reviewname" type="text" placeholder="Имя">
                            <input class="box__sidebar__input" name="reviewemail" id="reviewemail" type="email" placeholder="Email">
                            <textarea class="box__sidebar__textarea" name="reviewletter" id="reviewletter" type="text" cols="30" rows="10" placeholder="Cообщение"></textarea>
                            <div class="letter__form__error letter__form__error_sidebartop error" id="review__error"></div>
                            <button class="box__sidebar__btn box__sidebar__btn_blue" id="review-send" type="send">Оставить отзыв</button>
                        </form>
                    </div>
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
<?php get_footer(); ?>