<?php

/**
 * Displays the content when the cover template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php
	// On the cover page template, output the cover header.
	$cover_header_style   = '';
	$cover_header_classes = '';
	$responsive_styles_tag = '';

	$color_overlay_style   = '';
	$color_overlay_classes = '';

	if (!post_password_required()) {
		$image_urls = array(
			esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')),
			esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')),
			esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')),
		);

		if ($image_urls[0]) {
			$responsive_styles = array(
				'.logovo-bg-image { background-image: url( ' . $image_urls[0] . ' ); }',
				'@media ( max-width: 1200px ) and (max-height: 800px) { .logovo-bg-image { background-image: url( ' . $image_urls[1] . ' ); } }',
				'@media ( max-width: 768px ) and (max-height: 512px) { .logovo-bg-image { background-image: url( ' . $image_urls[2] . ' ); } }',
			);

			echo "<style>\n" . implode("\n", $responsive_styles) . "\n</style>";
			$cover_header_classes = ' bg-image logovo-bg-image';
		}
	}

	// Get the color used for the color overlay.
	$color_overlay_color = get_theme_mod('cover_template_overlay_background_color');
	if ($color_overlay_color) {
		$color_overlay_style = ' style="color: ' . esc_attr($color_overlay_color) . ';"';
	} else {
		$color_overlay_style = '';
	}

	// Get the fixed background attachment option.
	if (get_theme_mod('cover_template_fixed_background', true)) {
		$cover_header_classes .= ' bg-attachment-fixed';
	}

	// Get the opacity of the color overlay.
	$color_overlay_opacity  = get_theme_mod('cover_template_overlay_opacity');
	$color_overlay_opacity  = (false === $color_overlay_opacity) ? 80 : $color_overlay_opacity;
	$color_overlay_classes .= ' opacity-' . $color_overlay_opacity;
	?>

	<div class="cover-header <?php echo $cover_header_classes; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output 
								?>" <?php echo $cover_header_style; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- We need to double check this, but for now, we want to pass PHPCS ;) 
									?>>
		<div class="cover-header-inner-wrapper screen-height">
			<div class="cover-header-inner">
				<div class="cover-color-overlay color-accent<?php echo esc_attr($color_overlay_classes); ?>" <?php echo $color_overlay_style; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- We need to double check this, but for now, we want to pass PHPCS ;) 
																												?>></div>

				<header class="entry-header has-text-align-center">
					<div class="entry-header-inner section-inner medium">
						<?php

						/**
						 * Allow child themes and plugins to filter the display of the categories in the article header.
						 *
						 * @since 1.0.0
						 *
						 * @param bool Whether to show the categories in article header, Default true.
						 */
						$show_categories = apply_filters('twentytwenty_show_categories_in_entry_header', true);

						if (true === $show_categories && has_category()) {
						?>

							<div class="entry-categories">
								<div class="entry-categories-inner">
									<?php the_category(' '); ?>
								</div><!-- .entry-categories-inner -->
							</div><!-- .entry-categories -->

							<?php
						}

						the_title('<h1 class="entry-title">', '</h1>');
						if (function_exists('the_subtitle')) the_subtitle('<h2 class="entry-subtitle">', '</h2>');

						/**
						 * Display explicit content
						 */
						$isExplicitContent = get_post_meta(get_the_ID(), 'explicit', true);
						if (!empty($isExplicitContent)) {
							// Explicit Content block
							get_template_part('template-parts/parental-advisory');
						}

						if (!is_page()) {

							$intro_text_width = '';

							if (is_singular()) {
								$intro_text_width = ' small';
							} else {
								$intro_text_width = ' thin';
							}

							if (has_excerpt()) {
							?>

								<div class="intro-text section-inner max-percentage<?php echo esc_attr($intro_text_width); ?>">
									<?php the_excerpt(); ?>
								</div>

						<?php
							}
						}
						?>

						<div class="to-the-content-wrapper">
							<a href="#post-inner" class="to-the-content fill-children-current-color">
								<?php twentytwenty_the_theme_svg('arrow-down'); ?>
								<div class="screen-reader-text"><?php _e('Scroll Down', 'twentytwenty'); ?></div>
							</a><!-- .to-the-content -->
						</div><!-- .to-the-content-wrapper -->

					</div><!-- .entry-header-inner -->
				</header><!-- .entry-header -->

			</div><!-- .cover-header-inner -->
		</div><!-- .cover-header-inner-wrapper -->
	</div><!-- .cover-header -->

	<div id="translation"></div>

	<div class="post-inner medium" id="post-inner">

		<div class="entry-content">

			<?php
			the_content();
			?>

		</div><!-- .entry-content -->
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__('Page', 'twentytwenty') . '"><span class="label">' . __('Pages:', 'twentytwenty') . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		// Single bottom post meta.
		twentytwenty_the_post_meta(get_the_ID(), 'single-bottom');
		edit_post_link();

		if (is_single()) {
			get_template_part('template-parts/entry-footer');
		}
		?>

	</div><!-- .post-inner -->

	<?php
	/**
	 *  Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 * */
	if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && ! post_password_required()) {
	?>

		<div class="comments-wrapper section-inner" id="comments">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

	<?php
	}
	?>

</article><!-- .post -->