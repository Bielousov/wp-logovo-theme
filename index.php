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
		global $wp_query;

		$archive_title = sprintf(
			'%1$s %2$s',
			'<span class="color-accent">' . __('Результаты поиска:', 'twentytwenty') . '</span>',
			'&ldquo;' . get_search_query() . '&rdquo;'
		);

		if ($wp_query->found_posts) {
			$archive_subtitle = sprintf(
				/* translators: %s: Number of search results */
				_n(
					'Найден всего один пост, зато какой!',
					'Найдено %s постов',
					$wp_query->found_posts,
					'twentytwenty'
				),
				number_format_i18n($wp_query->found_posts)
			);
		} else {
			$archive_subtitle = __('Я искал, искал, но ничего не нашел. Попробуйте иначе сформулировать свой запрос.', 'twentytwenty');
		}
	} elseif (! is_home()) {
		$archive_title    = get_the_archive_title();
		$archive_subtitle = get_the_archive_description();
	}

	if ($archive_title || $archive_subtitle) {
	?>

		<header class="archive-header has-text-align-center header-footer-group">

			<div class="archive-header-inner section-inner medium">

				<?php if ($archive_title) { ?>
					<h1 class="archive-title"><?php echo wp_kses_post($archive_title); ?></h1>
				<?php } ?>

				<?php if ($archive_subtitle) { ?>
					<div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post(wpautop($archive_subtitle)); ?></div>
				<?php } ?>

			</div><!-- .archive-header-inner -->

		</header><!-- .archive-header -->

	<?php
	}

	if (have_posts()) {

		$i = 0;

		while (have_posts()) {
			$i++;
			if ($i > 1) {
				echo '<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />';

				if (($i + 3) % 5 == 0) {
					echo the_ad(647);
				}
			}
			the_post();

			get_template_part('template-parts/content', get_post_type());
		}
	} elseif (is_search()) {
	?>

		<div class="no-search-results-form section-inner thin">

			<?php
			get_search_form(
				array(
					'label' => __('search again', 'twentytwenty'),
				)
			);
			?>

		</div><!-- .no-search-results -->

	<?php
	}
	?>

	<?php get_template_part('template-parts/pagination'); ?>

	<?php the_ad('25802'); ?>
</main><!-- #site-content -->

<?php
get_template_part('template-parts/footer-menus-widgets');
get_footer();
?>