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
    ?>

    <aside class="section-inner">
        <?php
        $isAddFree = get_post_meta(get_the_ID(), 'ad-free', true);
        $isExplicitContent = get_post_meta(get_the_ID(), 'explicit-content', true);
        if (!empty($isExplicitContent)) {
            // No Adds: Explicit Content
            the_ad(22179);
        } else if (empty($isAddFree)) {
            // Display Adds
            the_ad_group(643);
        }
        ?>
    </aside>
<?php
}
?>