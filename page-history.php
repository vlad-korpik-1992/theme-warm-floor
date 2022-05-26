<?php
/**
  * Template Name: История бренда
*/
?>
<?php get_header();?>
<section class="hero">
    <div class="wrapper">
        <div class="hero__cart">
            <div class="hero__cart__items">
                <h1><?the_field('history_die_heading');?></h1>
                <? echo wpautop(get_field('history_die_text'));?>
            </div>
		</div>
    </div>
</section>
<section class="breadcrumbs">
    <div class="wrapper">
        <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(''); ?>
    </div>
</section>
<section class="history">
    <div class="wrapper">
        <h2 class="section-head"><?php single_post_title(); ?></h2>
    </div>
</section>
<?php get_footer();?>
