<?php
/**
 * The default template for displaying content
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

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php
  if ( is_single() || is_page() ) {
    get_template_part( 'template-parts/content-single' );
  } else {
    get_template_part( 'template-parts/content-archive' );
  }
?>
</article><!-- .post -->
