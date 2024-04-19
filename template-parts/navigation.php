<?php
/**
 * Displays the next and previous post navigation in single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

$next_post = get_next_post();
$prev_post = get_previous_post();

if ( $next_post || $prev_post ) {

	$pagination_classes = '';

	if ( ! $next_post ) {
		$pagination_classes = ' only-one only-prev';
	} elseif ( ! $prev_post ) {
		$pagination_classes = ' only-one only-next';
	}

	?>

	<nav class="pagination-single section-inner<?php echo esc_attr( $pagination_classes ); ?>" aria-label="<?php esc_attr_e( 'Post', 'twentytwenty' ); ?>" role="navigation">

		<hr class="styled-separator is-style-wide" aria-hidden="true" />

		<div class="pagination-single-inner">

			<?php
			if ( $prev_post ) {
				?>

				<a class="previous-post" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
					<ins class="arrow" aria-hidden="true">&larr;</ins>
              		<span>
                      <span class="title">
                          <?php echo wp_kses_post( get_the_title( $prev_post->ID ) ); ?>
                      </span>
                      <?php if ( function_exists( 'get_the_subtitle' ) ) { ?>
                          <span class="subtitle">
                              <?php echo wp_kses_post( get_the_subtitle( $prev_post->ID ) ); ?>
                          </span>
                      <?php } ?>
             		</span>
				</a>

				<?php
			}

			if ( $next_post ) {
				?>

				<a class="next-post" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
					<ins class="arrow" aria-hidden="true">&rarr;</ins>
              		<span>
                      <span class="title">
                        <?php echo wp_kses_post( get_the_title( $next_post->ID ) ); ?>
                      </span>
                      <?php if ( function_exists( 'get_the_subtitle' ) ) { ?>
                          <span class="subtitle">
                              <?php echo wp_kses_post( get_the_subtitle( $next_post->ID ) ); ?>
                          </span>
                      <?php } ?>
             		</span>
				</a>
				<?php
			}
			?>

		</div><!-- .pagination-single-inner -->

		<hr class="styled-separator is-style-wide" aria-hidden="true" />

	</nav><!-- .pagination-single -->

	<?php
}
