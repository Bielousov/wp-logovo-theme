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

  <div class="logovo-404">
    <header class="section-inner medium has-text-align-center">

      <img src="/wp-content/themes/wp-logovo-theme/assets/images/search-no-results.webp" alt="No search results" class="logovo-no-results-image" />

      <h1 class="logovo-404-title">
        <?php _e('Ошиблись адресом?', 'twentytwenty'); ?>
      </h1>

      <div class="logovo-search-results-subtitle">
        <p><?php _e('Такой страницы пока (или больше) нет, попробуйте найти интересующий вас пост:', 'twentytwenty'); ?></p>
      </div>
    </header>

    <div class="logovo-no-results-form section-inner thin">
      <?php
      get_search_form(
        array(
          'label' => __('404 not found', 'twentytwenty'),
        )
      );
      ?>
    </div>


    <div class="section-inner thin">
      <div class="entry-content">
        <?php
        $id = 18089;
        $post = get_post($id);
        $content = apply_filters('the_content', $post->post_content);
        echo $content;
        ?>
      </div>
    </div>

    <?php the_ad_group(643); ?>
  </div><!-- .section-inner -->

</main><!-- #site-content -->

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php
get_footer();
