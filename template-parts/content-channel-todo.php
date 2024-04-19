<?php
/**
 * The default template for displaying content шт фксршму мшукц
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="channel-video">
        <?php
            $bg_image_url = esc_url( the_post_thumbnail() );
            $custom_fields = get_post_custom();
            if ($bg_image_url) {
                echo '<img class="channel-video-thumbnail" src="' . $bg_image_url . '" alt="' . $post_title . '" />';
            }

            if (isset($custom_fields['video'])) {
                echo '<iframe title="Video player" src="' . $custom_fields['video'][0] .'?origin=https://www.bielousov.com" width="100%" height="80%" frameborder="0" allowfullscreen="allowfullscreen" class="channel-video-player"></iframe>';
            }
        ?>
        
    </div>
   

    <div class="post-inner">

        <div class="entry-content">

        <?php
            the_content();
        ?>

        </div><!-- .entry-content -->

    </div><!-- .post-inner -->

    <div class="section-inner">
    <?php
        edit_post_link();

        // Single bottom post meta.
        twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );
    ?>
    </div><!-- .section-inner -->
</article>