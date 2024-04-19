<?php
/**
 * Displays the content when the video template is used.
 *
 * @package WordPress
 * @subpackage logovo
 * @since 1.0.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php
		$custom_fields = get_post_custom();
        if(is_singular() && isset($custom_fields['video']) && !post_password_required()) {
    ?>
        <div class="logovo-video-header">
			<?php
				$bg_image_url = esc_url( get_the_post_thumbnail_url( get_the_ID(), 'fullscreen' ) );
				if ($bg_image_url) {
					echo '<img class="logovo-video-bg-image" src="' . $bg_image_url . '" alt="" />';
				}
			?>
            <iframe title="Video player" src="<?php echo $custom_fields['video'][0]; ?>?origin=https://www.bielousov.com" width="100%" height="80%" frameborder="0" allowfullscreen="allowfullscreen" class="logovo-video-header-player"></iframe>
	    </div>
    <?php
        }
    ?>

    <?php
        get_template_part( 'template-parts/entry-header' );
    ?>

	<div class="post-inner medium" id="post-inner">
		<div class="entry-content">
            <?php the_content(); ?>
		</div><!-- .entry-content -->
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		// Single bottom post meta.
		twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );
		edit_post_link();

		if ( is_single() ) {
           	get_template_part( 'template-parts/entry-footer' ); 
		}
		?>

	</div><!-- .post-inner -->

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

</article><!-- .post -->
