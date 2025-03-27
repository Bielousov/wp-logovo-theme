<?php

/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header();
?>

<main id="site-content" role="main">

  <div class="section-inner thin logovo-404">

    <h1 class="entry-title"><?php _e('Ошиблись адресом?', 'twentytwenty'); ?></h1>

    <div class="intro-text">
      <p><?php _e('Такой страницы пока (или больше) нет, попробуйте найти интересующий вас пост:', 'twentytwenty'); ?></p>
    </div>

    <?php
    get_search_form(
      array(
        'label' => __('404 not found', 'twentytwenty'),
      )
    );
    ?>
  </div>


  <div class="post-inner thin">
    <div class="entry-content">
      <?php
      $id = 18089;
      $post = get_post($id);
      $content = apply_filters('the_content', $post->post_content);
      echo $content;
      ?>
    </div>
  </div>


  <div class="section-inner">
    <?php the_ad_group(643); ?>
  </div><!-- .section-inner -->

</main><!-- #site-content -->

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php
get_footer();
