<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

 $has_sidebar =  is_active_sidebar( 'sidebar-footer' );
 $has_subscription =  is_active_sidebar( 'sidebar-footer-subscription' );

?>
	<footer id="site-footer" role="contentinfo" class="footer logovo-footer header-footer-group">
    <?php if ( $has_sidebar ) { ?>
      <div class="logovo-footer-subscription">
        <div class="section-inner">
          <div class="logovo-footer-widgets">
            <?php dynamic_sidebar( 'sidebar-footer-subscription' ); ?>
          </div>
        </div>
      </div>
    <?php } ?>

    <?php if ( $has_sidebar ) { ?>
      <div class="section-inner">
        <div class="logovo-footer-widgets">
          <?php dynamic_sidebar( 'sidebar-footer' ); ?>
        </div>
      </div>
    <?php } ?>

    <div class="section-inner logovo-footer-bottom">
      <div class="logovo-footer-credits">
        <copyright class="logovo-footer-copyright">&copy;
          <?php
          echo date_i18n(
            /* translators: Copyright date format, see https://secure.php.net/date */
            _x( 'Y', 'copyright date format', 'twentytwenty' )
          );
          ?>
          Logovo Solutions, Inc.
        </copyright>
      </div>

      <a class="to-the-top" href="#site-header">
        <span class="to-the-top-long">
          <?php
          /* translators: %s: HTML character for up arrow */
          printf( __( 'To the top %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
          ?>
        </span><!-- .to-the-top-long -->
        <span class="to-the-top-short">
          <?php
          /* translators: %s: HTML character for up arrow */
          printf( __( 'Up %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
          ?>
        </span><!-- .to-the-top-short -->
      </a><!-- .to-the-top -->

      </div><!-- .section-inner -->

		</footer><!-- #site-footer -->

		<?php wp_footer(); ?>

	</body>
</html>
