<?php

/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

$featured_image_url = null;

if (!post_password_required()) {
    $featured_image_url = esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium'));
}

?>

<header class="entry-header logovo-entry-header header-footer-group has-text-align-center">

	<?php
	if ($featured_image_url !== null && !is_page_template('templates/template-video.php')) {
		echo '<img src="' . $featured_image_url . '" alt="' . get_the_title() . '" class="logovo-entry-header-backfill" />';
	}
	?>

	<div class="logovo-entry-header-inner section-inner medium">

		<?php
		/**
		 * Allow child themes and plugins to filter the display of the categories in the entry header.
		 *
		 * @since 1.0.0
		 *
		 * @param bool   Whether to show the categories in header, Default true.
		 */
		$show_categories = apply_filters('twentytwenty_show_categories_in_entry_header', true);

		if (true === $show_categories && has_category()) {
		?>

			<div class="entry-categories">
				<span class="screen-reader-text"><?php _e('Рубрика', 'twentytwenty'); ?></span>
				<div class="entry-categories-inner">
					<?php the_category(' '); ?>
				</div><!-- .entry-categories-inner -->
			</div><!-- .entry-categories -->

		<?php
		}

        /**
         * Display explicit content
         */
        $isExplicitContent = get_post_meta(get_the_ID(), 'explicit', true);
        if (!empty($isExplicitContent)) {
            // Explicit Content block
            get_template_part('template-parts/parental-advisory');
        }

        the_title('<h1 class="entry-title">', '</h1>');
        if (function_exists('the_subtitle')) the_subtitle('<h2 class="entry-subtitle">', '</h2>');
	
		if (has_excerpt()) {
		?>

			<div class="intro-text section-inner max-percentage small">
				<?php the_excerpt(); ?>
			</div>

		<?php
		}

		// Default to displaying the post meta.
		twentytwenty_the_post_meta(get_the_ID(), 'single-top');
		?>

	</div><!-- .logovo-entry-header-inner -->

</header><!-- .logovo-entry-header -->