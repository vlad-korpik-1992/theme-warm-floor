<?php
/**
  * Template Name: Контакты
*/
?>
<?php get_header();?>
<section class="hero">
    <div class="wrapper">
        <div class="hero__cart">
            <div class="hero__cart__items">
                <h1><?the_field('contacts_die_heading');?></h1>
                <? echo wpautop(get_field('contacts_die_text'));?>
            </div>
        </div>
    </div>
</section>
<section class="breadcrumbs">
    <div class="wrapper">
        <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(''); ?>
    </div>
</section>
<section class="contacts">
    <div class="wrapper">
        <h2 class="section-head"><?php single_post_title(); ?></h2>
        <div class="contacts__box">
            <div class="contacts__box__items">
                <span class="contacts__meta">Вопросы и предложения</span>
                <?php $phone = str_replace([' ', '(', ')', '-'], '', get_field('contacts_phone'));?>
                <a class="contacts__link" href="tel:<?php echo $phone;?>"><?php the_field('contacts_phone')?></a>
            </div>
            <div class="contacts__box__items">
                <span class="contacts__meta">email</span>
                <a class="contacts__link" href="mailto:<?php the_field('contacts_mail')?>"><?php the_field('contacts_mail')?></a>
            </div>
            <div class="contacts__box__items">
                <span class="contacts__meta">Адрес</span>
                <address class="contacts__address"><?php the_field('contacts_address')?></address>
            </div>
        </div>
    </div>
</section>
<section class="maps">
    <div class="wrapper">
        <div class="maps__box">
            <?php the_field('contacts_maps')?>
        </div>
    </div>
</section>
<? get_footer();?>