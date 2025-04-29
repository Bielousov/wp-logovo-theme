<?php

/**
 * Search results page header
 */

//  global $wp_query;

$search_title = sprintf(
    '%1$s %2$s',
    '<span class="color-accent">' . __('Где тут у вас', 'twentytwenty') . '</span>',
    '<span class="logovo-search-result-term">' . get_search_query() . '</span>?',
);

if ($wp_query->found_posts) {
    $search_subtitle = sprintf(
        /* translators: %s: Number of search results */
        _n(
            'Фух, нашел. Всего один пост, зато какой!',
            'Этого добра у нас навалом. Найдено %s постов',
            $wp_query->found_posts,
            'twentytwenty'
        ),
        number_format_i18n($wp_query->found_posts)
    );
} else {
    $search_subtitle = __('Ну вот, опять потерялись!', 'twentytwenty');
}

if (is_search()) {
?>

    <header class="has-text-align-center logovo-search-results has-text-align-center">
        <div class="section-inner medium">
            <?php
            if (!$wp_query->found_posts) {
            ?>
                <img src="/wp-content/themes/wp-logovo-theme/assets/images/search-no-results.webp" alt="No search results" class="logovo-search-results-image" />
            <?php
            }
            ?>

            <h1 class="logovo-search-results-title ">
                <?php echo wp_kses_post($search_title); ?>
            </h1>

            <p class="logovo-search-results-subtitle thin has-text-align-center">
                <?php echo wp_kses_post($search_subtitle); ?>
            </p>
        </div>
    </header>


    <?php
    if (!$wp_query->found_posts) {
    ?>
        <div class="logovo-search-no-results-form section-inner thin">
            <?php
            get_search_form(
                array(
                    'aria_label' => __('search again', 'twentytwenty'),
                )
            );
            ?>
            <p class="logovo-search-no-results-map has-text-align-center">Попробуйте <a href="/travel">свериться с картой</a> 🗺️</p>
        </div>
    <?php
    }
    ?>
<?php
}
?>