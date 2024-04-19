<?php
/**
 * The default template for displaying single content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 1.0.0
 */

$postClass = '';
if (!is_page_template( 'templates/template-full-width.php' )) {
  if (is_page_template( 'templates/template-full-headless.php' ) || is_page_template( 'templates/template-full-screen.php' )) {
	$postClass = 'full';
  } else {
    $postClass = 'medium';
  }
}
?>

<?php
if (!is_page_template( 'templates/template-full-headless.php' )) {
	get_template_part( 'template-parts/entry-header' );
}
?>

<div class="post-inner <?php echo $postClass; ?>">
	<div class="entry-content">
		<?php
		the_content();
		?>
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

// Single bottom post meta.
twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );
edit_post_link();

if (is_single()) {
  	get_template_part( 'template-parts/entry-footer' ); 
}

?>
</div><!-- .section-inner -->

<?php
/**
*  Output comments wrapper if it's a post, or if comments are open,
* or if there's a comment number – and check for password.
* */
if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
  ?>
  <div class="comments-wrapper section-inner" id="comments">
    <?php comments_template(); ?>
  </div><!-- .comments-wrapper -->
<?php
}
?>
