<?php
get_header();
?>
<section class="hero">
    <div class="wrapper">
        <div class="hero__cart">
            <div class="hero__cart__items">
                <h1>Новости компании</h1>
                <p>Опрос подсознательно притягивает коллективный рекламоноситель, осознавая социальную ответственность бизнеса. Размещение конструктивно...</p>
            </div>
		</div>
    </div>
</section>
<section class="breadcrumbs">
    <div class="wrapper">
        <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(''); ?>
    </div>
</section>
<section class="single">
    <div class="wrapper">
		<?php 
            $attr = array(
                'class' => "single__img",
            );
        ?>
        <h2 class="section-head"><?php single_post_title(); ?></h2>
        <?php the_post_thumbnail('full', $attr);?>
        <div class="single__date"><?php echo get_the_time($d = 'j', get_the_ID()); ?> / <?php echo get_the_time($d = 'm', get_the_ID()); ?> / <?php echo get_the_time($d = 'Y', get_the_ID()); ?></div>
        <?php echo wpautop(the_content());?>
    </div>
</section>
<?
get_footer();
?>