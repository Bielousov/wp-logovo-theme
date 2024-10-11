<?php
$postClass = '';
if (!is_page_template('templates/template-full-width.php')) {
    if (is_page_template('templates/template-full-headless.php') || is_page_template('templates/template-full-screen.php')) {
        $postClass = 'full';
    } else {
        $postClass = 'medium';
    }
}

if (!is_page_template('templates/template-full-headless.php')) {
    get_template_part('template-parts/entry-header');
}
?>

<div class="post-inner <?php echo $postClass; ?>">
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
</div>