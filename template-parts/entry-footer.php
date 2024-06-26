<?php

/**
 * Displays the menus and widgets at the end of the post.
 * Visually, this output is presented as part of the post.
 */

$has_sidebar = is_active_sidebar('sidebar-post-footer');

// Only output the container if there are elements to display.
if ($has_sidebar) {
?>
    <div class="post-footer-widgets-wrapper">
        <?php dynamic_sidebar('sidebar-post-footer'); ?>
    </div>

    <?php
    get_template_part('template-parts/navigation');

    $isAddFree = get_post_meta(get_the_ID(), 'ad-free', true);
    if (empty($isAddFree)) {
        the_ad_group(643);
    } else {
        echo the_ad(22179);
    }
    ?>
<?php
}
?>