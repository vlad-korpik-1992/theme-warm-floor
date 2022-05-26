<?php
/**
  * Template Name: Новости
*/
?>
<?php get_header();?>
<section class="hero">
    <div class="wrapper">
        <div class="hero__cart">
            <div class="hero__cart__items">
                <h1><?the_field('news_die_heading');?></h1>
                <? echo wpautop(get_field('news_die_text'));?>
            </div>
        </div>
    </div>
</section>
<section class="breadcrumbs">
    <div class="wrapper">
        <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(''); ?>
    </div>
</section>
<section class="news">
  <div class="wrapper">
    <h2 class="section-head"><?php single_post_title(); ?></h2>
    <div class="news__box">
      <?
        if ( get_query_var('paged') ) { 
          $paged = get_query_var('paged'); 
        } 
        else if ( get_query_var('page') ) {
          $paged = get_query_var('page'); 
        } else {
              $paged = 1; 
          }								
          $args = array(
            'post_type' => 'post',
            'post_status'       => 'publish',
            'paged'             => $paged,
            'posts_per_page'    => 999
          );
          $temp = $wp_query;
          $wp_query= null;
          $wp_query = new WP_Query($args);
          while ($wp_query -> have_posts()) : $wp_query -> the_post();
      ?>
        <div class="news__box__items">
          <div class="news__box__cover">
            <a class="news__box__link" href="<?php echo get_permalink($posts['ID']); ?>">
              <img class="news__box__img" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $posts['ID'] ) ); ?>" alt="<?php echo the_title();?>">
              <h2 class="news__box__title"><?php echo the_title()?></h2>
              <div class="news__box__date"><?php echo get_the_time($d = 'j', $posts['ID']); ?> / <?php echo get_the_time($d = 'm', $posts['ID']); ?> / <?php echo get_the_time($d = 'Y', $posts['ID']); ?></div>
            </a>
          </div>
        </div>
      <? endwhile; wp_reset_query();?>
    </div>
  </div>
</section>
<?php get_footer(); ?>