<?php
/**
 * The default template for displaying content шт фксршму мшукц
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<?php
  $isShort = get_post_meta(get_the_ID(), 'ad-post', true);

  get_template_part( 'template-parts/entry-header' );

  if (!$isShort) {
    get_template_part( 'template-parts/featured-image' );
?>

  <div class="post-inner">
    <div class="entry-content">
      <div class="entry-excerpt">
      <?php the_excerpt( __( 'Читать дальше', 'twentytwenty' ) ); ?>
      </div>
    </div><!-- .entry-content -->
  </div><!-- .post-inner -->

  <div class="section-inner">
    <?php
      wp_link_pages(
      array(
      'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Страница', 'twentytwenty' ) . '"><span class="label">' . __( 'Страница:', 'twentytwenty' ) . '</span>',
      'after'       => '</nav>',
      'link_before' => '<span class="page-number">',
      'link_after'  => '</span>',
      )
      );

      edit_post_link();

      // Single bottom post meta.
      twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );
    ?>
  </div><!-- .section-inner -->

<?php } else { ?>

  <div class="section-inner">
    <?php edit_post_link(); ?>
  </div>

<?php } ?>