<?php
if (is_archive() && !is_search() && !is_home()) {
    $archive_title    = get_the_archive_title();
    $archive_subtitle = get_the_archive_description();
?>
    <header class="archive-header has-text-align-center header-footer-group">
        <div class="section-inner medium">
            <?php if ($archive_title) { ?>
                <h1 class="archive-title"><?php echo wp_kses_post($archive_title); ?></h1>
            <?php } ?>
            <?php if ($archive_subtitle) { ?>
                <div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post(wpautop($archive_subtitle)); ?></div>
            <?php } ?>
        </div>
    </header><!-- .archive-header -->
<?php
}
?>