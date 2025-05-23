<?php

/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name='ir-site-verification-token' value='317944902' />
	<meta name="msvalidate.01" content="717B060DB0EC88E10E103135B8B52D53" />

	<?php
	wp_head();

	/* Shareaholic HTTP counter fallback */
	$custom_fields = get_post_custom();
	if (is_singular() && isset($custom_fields['canonical_protocol'])) {
		$canonical_url = wp_get_canonical_url();
		// $canonical_share_url = preg_replace('/^https:/', 'http:', $canonical_url);
		$canonical_share_url = preg_replace('/^http:/', 'ftp:', $canonical_url);
		echo '<meta name="shareaholic:url" content="' . $canonical_share_url . '" />';
	}

	if (isset($custom_fields['og:video'])) {
		echo '<meta property="og:video" content="' . $custom_fields['og:video'][0] . '">';
	} else if (isset($custom_fields['video'])) {
		echo '<meta property="og:video" content="' . $custom_fields['video'][0] . '">';
	}
	?>

	<script>
		// Suppress annoying Stay22 styled console logs
		(function() {
			const urlParams = new URLSearchParams(window.location.search);
			const debugMode = urlParams.has('debug');

			if (!debugMode) {
				const originalLog = console.log;
				console.log = function(...args) {
					if (args.length && typeof args[0] === 'string' && args[0].includes('%c')) {
						return; // Suppress logs with "%c"
					}
					originalLog.apply(console, args);
				};
			}
		})();

		// Stay 22 script
		(function(s, t, a, y, twenty, two) {
			s.Stay22 = s.Stay22 || {};

			// Just fill out your configs here
			s.Stay22.params = {
				aid: "logovosolutionsinc",
			};

			// Leave this part as-is;
			twenty = t.createElement(a);
			two = t.getElementsByTagName(a)[0];
			twenty.async = 1;
			twenty.src = y;
			two.parentNode.insertBefore(twenty, two);
		})(window, document, "script", "https://scripts.stay22.com/letmeallez.js");
	</script>
</head>

<body <?php body_class(); ?>>

	<?php
	wp_body_open();
	?>

	<header id="site-header" class="header-footer-group logovo-header" role="banner">

		<div class="header-inner section-inner">

			<div class="header-titles-wrapper">

				<?php

				// Check whether the header search is activated in the customizer.
				$enable_header_search = get_theme_mod('enable_header_search', true);

				if (true === $enable_header_search) {

				?>

					<button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
						<span class="toggle-inner">
							<span class="toggle-icon">
								<?php twentytwenty_the_theme_svg('search'); ?>
							</span>
							<span class="toggle-text"><?php _e('Поиск', 'twentytwenty'); ?></span>
						</span>
					</button><!-- .search-toggle -->

				<?php } ?>

				<div class="header-titles">

					<?php
					// Site title or logo.
					twentytwenty_site_logo();
					?>

					<a class="rss-feed" href="https://feedly.com/i/subscription/feed/http://www.bielousov.com/feed/" target="_blank" rel="nofollow" onclick="return trackOutboundLink(this, 'RSS', 'Click RSS Link', false, false);" title="Подпишитесь на RSS-рассылку (Feedly) и не пропускайте ни одного поста."></a>

					<?php
					// Site description.
					twentytwenty_site_description();
					?>

				</div><!-- .header-titles -->

				<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
					<span class="toggle-inner">
						<span class="toggle-icon">
							<?php twentytwenty_the_theme_svg('ellipsis'); ?>
						</span>
						<span class="toggle-text"><?php _e('Меню', 'twentytwenty'); ?></span>
					</span>
				</button><!-- .nav-toggle -->

			</div><!-- .header-titles-wrapper -->

			<div class="header-navigation-wrapper">

				<?php
				if (has_nav_menu('primary') || !has_nav_menu('expanded')) {
				?>

					<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'twentytwenty'); ?>" role="navigation">

						<ul class="primary-menu reset-list-style">

							<?php
							if (has_nav_menu('primary')) {

								wp_nav_menu(
									array(
										'container'  => '',
										'items_wrap' => '%3$s',
										'theme_location' => 'primary',
									)
								);
							} elseif (!has_nav_menu('expanded')) {

								wp_list_pages(
									array(
										'match_menu_classes' => true,
										'show_sub_menu_icons' => true,
										'title_li' => false,
										'walker'   => new TwentyTwenty_Walker_Page(),
									)
								);
							}
							?>

						</ul>

					</nav><!-- .primary-menu-wrapper -->

				<?php
				}

				if (true === $enable_header_search || has_nav_menu('expanded')) {
				?>

					<div class="header-toggles hide-no-js">

						<?php
						if (has_nav_menu('expanded')) {
						?>

							<div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">

								<button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
									<span class="toggle-inner">
										<span class="toggle-text"><?php _e('Меню', 'twentytwenty'); ?></span>
										<span class="toggle-icon">
											<?php twentytwenty_the_theme_svg('ellipsis'); ?>
										</span>
									</span>
								</button><!-- .nav-toggle -->

							</div><!-- .nav-toggle-wrapper -->

						<?php
						}

						if (true === $enable_header_search) {
						?>

							<div class="toggle-wrapper search-toggle-wrapper">

								<button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
									<span class="toggle-inner">
										<?php twentytwenty_the_theme_svg('search'); ?>
										<span class="toggle-text"><?php _e('Поиск', 'twentytwenty'); ?></span>
									</span>
								</button><!-- .search-toggle -->

							</div>

						<?php
						}
						?>

					</div><!-- .header-toggles -->
				<?php
				}
				?>

			</div><!-- .header-navigation-wrapper -->

		</div><!-- .header-inner -->

		<?php
		// Output the search modal (if it is activated in the customizer).
		if (true === $enable_header_search) {
			get_template_part('template-parts/modal-search');
		}
		?>

	</header><!-- #site-header -->

	<?php
	// Output the menu modal.
	get_template_part('template-parts/modal-menu');
