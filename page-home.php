<?php
/**
  * Template Name: Главная страница
*/
?>
<?php get_header();?>
    <section class="hero">
        <div class="wrapper">
            <div class="hero__box">
                <div class="hero__box__items">
                    <h1><?php single_post_title(); ?></h1>
                    <p><?php echo wpautop(the_field('home_main_screen'));?></p>
                    <a class="hero__link" href="<?php echo get_page_link(160)?>">История бренда</a>
                </div>
            </div>
        </div>
    </section>
    <section class="catalog">
        <div class="wrapper">
            <h2 class="section-head">Радиатор</h2>
            <div class="box">
                <div class="box__items">
                    <div class="category__box">
                        <?php
                            $tax_posts = array(
                                'post_type' => 'product',
                                'posts_per_page' => 999,
                                'order' => 'ASC',
                                'tax_query' => array(
                                      array(
                                           'taxonomy' => 'products',
                                           'field' => 'slug',
                                           'terms' => 'radiators'
                                      )
                                 )
                            );
                            $result = wp_get_recent_posts($tax_posts);
                            foreach ($result as $post):
                                $title = $post['post_title'];
                                $short_title = mb_strimwidth($title, 0, 11, "...");
                            ?>
                                <a class="category__box__link" href="<?php echo get_permalink($post['ID']); ?>">
                                    <img class="category__box__circle" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post['ID'] ) ); ?>" alt="<?echo $post['post_title'];?>">
                                    <p class="category__box__title"><?echo $short_title;?></p>
                                </a>
                            <?
                                endforeach;
                        ?>
                    </div>
                </div>
                <div class="box__items"></div>
            </div>
            <div class="box box_pt">
                <div class="box__items">
                    <div class="catalog__box">
                        <?php
                            $result = wp_get_recent_posts($tax_posts);
                            foreach ($result as $post):?>
                                <a class="catalog__box__items" href="<?php echo get_permalink($post['ID']); ?>">
                                    <div class="catalog__box__items__cover">
                                        <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post['ID'] ) ); ?>" alt="<?echo $post['post_title'];?>">
                                    </div>
                                    <h3 class="catalog__box__items__title"><?echo $post['post_title'];?></h3>
                                </a>
                            <?
                                endforeach;
                                wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <div class="box__items">
                    <div class="box__sidebar">
                        <h3 class="box__sidebar__title">Радиаторы</h3>
                        <img class="box__sidebar__img" src="<?echo the_field('home_block_radiators_image');?>" alt="Радиатор в Гродно">
                        <p class="box__sidebar__content"><?echo the_field('home_block_radiators_text');?></p>
                        <a class="box__sidebar__btn" href="#">Записаться на консультацию</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="rating">
        <div class="rating__bg">
            <div class="wrapper">
                <h2 class="section-head section-head_white">Отзывы клиентов</h2>
                <div class="rating__box">
                    <div class="rating__box__circle"><?echo the_field('video_reviews_rating');?></div>
                    <div class="rating__box__items">
                        <div class="rating__video rating__video--one">
                            <img class="rating__video__img rating__video--one" src="<?php bloginfo('template_url'); ?>/assets/img/rating-video.jpg" alt="">
                            <h3 class="rating__video--one"><?echo the_field('video_reviews_title');?></h3>
                        </div>
                        <div class="rating__video rating__video--two">
                            <img class="rating__video__img rating__video--two" src="<?php bloginfo('template_url'); ?>/assets/img/rating-video.jpg" alt="">
                            <h3 class="rating__video--two"><?echo the_field('video_reviews_title_2');?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="catalog">
        <div class="wrapper">
            <h2 class="section-head">Теплый пол</h2>
            <div class="box">
                <div class="box__items">
                    <div class="category__box">
                    <?php
                            $tax_posts = array(
                                'post_type' => 'product',
                                'posts_per_page' => 999,
                                'order' => 'ASC',
                                'tax_query' => array(
                                      array(
                                           'taxonomy' => 'products',
                                           'field' => 'slug',
                                           'terms' => 'warm-floor'
                                      )
                                 )
                            );
                            $result = wp_get_recent_posts($tax_posts);
                            foreach ($result as $post):
                                $title = $post['post_title'];
                                $short_title = mb_strimwidth($title, 0, 11, "...");
                            ?>
                                <a class="category__box__link" href="<?php echo get_permalink($post['ID']); ?>">
                                    <img class="category__box__circle" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post['ID'] ) ); ?>" alt="<?echo $post['post_title'];?>">
                                    <p class="category__box__title"><?echo $short_title;?></p>
                                </a>
                            <?
                            endforeach;
                            wp_reset_postdata();
                    ?>
                    </div>
                </div>
                <div class="box__items"></div>
            </div>
            <div class="box box_pt">
                <div class="box__items">
                    <div class="catalog__box">
                        <?php
                            $count = 0;
                            foreach ($result as $post):?>
                                <a href="#" class="catalog__box__items <?if($count === 0):?>catalog__box__items_first<?endif;?>">
                                    <img class="catalog__box__items__img" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post['ID'] ) ); ?>" alt="<?echo $post['post_title'];?>">
                                    <h3 class="catalog__box__items__title"><?echo $post['post_title'];?></h3>
                                </a>
                                <?$count += 1;
                            endforeach;
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <div class="box__items">
                    <div class="box__sidebar">
                        <h3 class="box__sidebar__title">Теплый пол</h3>
                        <img class="box__sidebar__img" src="<?echo the_field('home_warm-floor_image');?>" alt="">
                        <p class="box__sidebar__content"><?echo the_field('home_warm-floor_text');?></p>
                        <a class="box__sidebar__btn" href="#">Записаться на консультацию</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="rating">
        <div class="rating__bg">
            <div class="wrapper">
                <h2 class="section-head section-head_news">Новости компании</h2>
                <?php 
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publich',
                        'posts_per_page' => 2
                    );
                    $wp_query = new WP_Query($args);
                    while($wp_query -> have_posts()) : $wp_query -> the_post();
                        $title = get_the_title();
                        $short_title = mb_strimwidth($title, 0, 95, "...");
                    ?>
                        <div class="rating__items">
                            <a class="rating__items__link" href="<?php echo get_permalink($posts['ID']); ?>"><? echo $short_title;?></a>
                            <p class="rating__items__data"><?php echo get_the_time($d = 'j', $posts['ID']);?> <?echo get_the_time($d = 'F', $posts['ID']);?></p>
                        </div>
                    <?php endwhile;
                    wp_reset_query();
                ?>
            </div>
        </div>
    </section>
    <section class="catalog">
        <div class="wrapper">
            <h2 class="section-head">Бойлеры</h2>
            <div class="box">
                <div class="box__items">
                    <div class="category__box">
                        <?php
                            $tax_posts = array(
                                'post_type' => 'product',
                                'posts_per_page' => 999,
                                'order' => 'ASC',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'products',
                                        'field' => 'slug',
                                        'terms' => 'boilers'
                                    )
                                )
                            );
                            $result = wp_get_recent_posts($tax_posts);
                            foreach ($result as $post):
                                $title = $post['post_title'];
                                $short_title = mb_strimwidth($title, 0, 11, "...");
                            ?>
                                <a class="category__box__link" href="<?php echo get_permalink($post['ID']); ?>">
                                    <img class="category__box__circle" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post['ID'] ) ); ?>" alt="<?echo $post['post_title'];?>">
                                    <p class="category__box__title"><?echo $short_title;?></p>
                                </a>
                            <?
                            endforeach;
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <div class="box__items"></div>
            </div>
            <div class="box box_pt">
                <div class="box__items">
                    <div class="catalog__box catalog__box_three">
                        <?php
                            foreach ($result as $post):?>
                                <a href="<?php echo get_permalink($post['ID']); ?>" class="catalog__box__three">
                                    <div class="catalog__box__items__cover catalog__box__items__cover_height">
                                        <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post['ID'] ) ); ?>" alt="<?echo $post['post_title'];?>">
                                    </div>
                                    <h3 class="catalog__box__items__title"><?echo $post['post_title'];?></h3>
                                </a><?
                            endforeach;
                        ?>
                    </div>
                </div>
                <div class="box__items">
                    <div class="box__sidebar">
                        <h3 class="box__sidebar__title">Бойлеры</h3>
                        <img class="box__sidebar__img" src="<?echo the_field('home_boilers_image');?>" alt="">
                        <p class="box__sidebar__content"><?echo the_field('home_boilers_text');?></p>
                        <a class="box__sidebar__btn" href="#">Записаться на консультацию</a>
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
                    <?echo wpautop(get_field('home_company_text'));?>
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
                    <?echo the_field('video_reviews_link');?>
                </div>
            </div>
        </div>
    </section>
    <section class="popup video--two">
        <a href="#" class="popup__area"></a>
        <div class="popup__body">
            <button class="popup__header_close popup__header_close_video">
                <svg class="close-icon close-icon--video" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                    <path d="M 9.15625 6.3125 L 6.3125 9.15625 L 22.15625 25 L 6.21875 40.96875 L 9.03125 43.78125 L 25 27.84375 L 40.9375 43.78125 L 43.78125 40.9375 L 27.84375 25 L 43.6875 9.15625 L 40.84375 6.3125 L 25 22.15625 Z"></path>
                </svg>
            </button>
            <div class="popup__content popup__content--video">
                <div class="popup__video">
                    <?echo the_field('video_reviews_link_2');?>
                </div>
            </div>
        </div>
    </section>
    <section id="popup" class="popup consultation">
        <a href="#" class="popup__area"></a>
        <div class="popup__body">
            <div class="popup__content">
                <div class="popup__header">
                    <button class="popup__header_close">
                        <svg class="close-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                            <path d="M 9.15625 6.3125 L 6.3125 9.15625 L 22.15625 25 L 6.21875 40.96875 L 9.03125 43.78125 L 25 27.84375 L 40.9375 43.78125 L 43.78125 40.9375 L 27.84375 25 L 43.6875 9.15625 L 40.84375 6.3125 L 25 22.15625 Z"></path>
                        </svg>
                    </button>
                    <div class="popup__title">Запись на консультацию</div>
                </div>
                <div class="popup__text">
                    <form class="ajax__form" method="post" id="ajax__form">
                        <input type="hidden" id="modaltitle" name="modaltitle" value="">
                        <div class="form__group">
                            <input type="text" class="form__group_text" required="required" id="modalname" name="modalname" value="" placeholder="Ваше имя*">
                        </div>
                        <div class="form__group">
                            <input type="text" class="form__group_text" required="required" id="modalphone" name="modalphone" value="" placeholder="Номер телефона*">
                        </div>
                        <div class="form__group">
                            <textarea class="form__group_textarea" name="letter" id="messages" type="text" cols="80" rows="10" placeholder="Напишите что Вас интересует"></textarea>
                        </div>
                        <div class="letter__form__error letter__form__error_mt error" id="status__error"></div>
                        <div class="form__group">
                            <button id="consultation-send" class="form__btn" type="submit">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>