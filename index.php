<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header();

$archive_title    = '';
$archive_subtitle = '';
?>

<main id="site-content" role="main">

	<?php
	if (is_search()) {
		get_template_part('template-parts/search-results');
	} elseif (! is_home()) {
		get_template_part('template-parts/archive-header');
	}

	if (have_posts()) {

		$i = 0;

		while (have_posts()) {
			$i++;
			if ($i > 1) {
				echo '<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />';

				if (($i + 3) % 5 == 0) {
					echo '<div class="featured-media-inner section-inner">';
					the_ad_group(647);
					echo '</div>';
					echo '<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />';
				}
			}
			the_post();

			get_template_part('template-parts/content', get_post_type());
		}
	}
	?>

	<?php get_template_part('template-parts/pagination'); ?>

	<!-- Merch store -->
	<?php the_ad('25802'); ?>
</main><!-- #site-content -->

<?php
get_template_part('template-parts/footer-menus-widgets');
get_footer();
?>