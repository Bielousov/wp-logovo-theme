<?php
/**
 * Displays the menus and widgets at the end of the main element.
 * Visually, this output is presented as part of the footer element.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$has_footer_menu = has_nav_menu( 'footer' );
$has_social_menu = has_nav_menu( 'social' );

?>

<?php if ( $has_footer_menu || $has_social_menu ) { ?>
	<div class="footer-nav">
  		<div class="section-inner">
	      	<?php if ( $has_footer_menu ) { ?>
		        <nav aria-label="<?php esc_attr_e( 'Footer', 'twentytwenty' ); ?>" class="footer-menu-wrapper">
       				<ul class="footer-menu reset-list-style">
						<?php
					       	wp_nav_menu(
                				array(
			            	    	'container'      => '',
               						'depth'          => 1,
               						'items_wrap'     => '%3$s',
	               					'theme_location' => 'footer',
    	            			)
        	      			);
						?>
					</ul>
				</nav><!-- .site-nav -->
    	  	<?php } ?>

	      	<?php if ( $has_social_menu ) { ?>
				<nav aria-label="<?php esc_attr_e( 'Social links', 'twentytwenty' ); ?>" class="footer-social-wrapper">
    	   			<ul class="social-menu footer-social reset-list-style social-icons fill-children-current-color">
						<?php
							wp_nav_menu(
    	           				array(
        	       					'theme_location'  => 'social',
            	   					'container'       => '',
               						'container_class' => '',
               						'items_wrap'      => '%3$s',
               						'menu_id'         => '',
                  					'menu_class'      => '',
                  					'depth'           => 1,
	                  				'link_before'     => '<span class="screen-reader-text">',
    	          					'link_after'      => '</span>',
        	          				'fallback_cb'     => '',
            	    			)
              				);
						?>
					</ul><!-- .footer-social -->
				</nav><!-- .footer-social-wrapper -->
			<?php } ?>
  		</div>
	</div><!-- .footer-nav -->
<?php } ?>
