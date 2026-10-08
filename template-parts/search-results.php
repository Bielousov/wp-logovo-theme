<?php

/**
 * Search results page header
 */

//  global $wp_query;

if ($wp_query->found_posts) {
    $search_title = sprintf(
        '%1$s %2$s',
        '<span class="color-accent">' . __('Где тут у вас', 'twentytwenty') . '</span>',
        '<span class="logovo-search-result-term">' . get_search_query() . '</span>?',
    );

    $count = $wp_query->found_posts;

    if ($count > 4) {
        $search_subtitle = sprintf(
            'Ну, этого добра у нас навалом. Найдено аж %s постов',
            number_format_i18n($count)
        );
    } elseif ($count > 1) {
        $search_subtitle = sprintf(
            'Об этом я писал в %s-х постах.',
            number_format_i18n($count)
        );
    } else {
        $search_subtitle = sprintf(
            'Фух, нашел. Всего один пост, зато какой!',
            number_format_i18n($count)
        );
    }
} else {
    $search_title = sprintf(
        '%1$s %2$s',
        '<span class="color-accent">' . __('А нет у меня ничего про', 'twentytwenty') . '</span>',
        '<span class="logovo-search-result-term">' . get_search_query() . '</span>',
    );
    $search_subtitle = __('Б****! Никогда такого не было, и вот опять…', 'twentytwenty');
}

if (is_search()) {
?>
    <div class="logovo-search-results">
        <header class="section-inner medium has-text-align-center">
            <?php
            if (!$wp_query->found_posts) {
            ?>
                <img src="/wp-content/themes/wp-logovo-theme/assets/images/search-no-results.webp" alt="No search results" class="logovo-no-results-image" />
            <?php
            }
            ?>

            <h1 class="logovo-search-results-title">
                <?php echo wp_kses_post($search_title); ?>
            </h1>

            <p class="logovo-search-results-subtitle thin has-text-align-center">
                <?php echo wp_kses_post($search_subtitle); ?>
            </p>
        </header>


        <?php
        if (!$wp_query->found_posts) {
        ?>
            <div class="logovo-no-results-form section-inner">
                <?php
                get_search_form(
                    array(
                        'aria_label' => __('search again', 'twentytwenty'),
                    )
                );
                ?>
            </div>

            <div class="section-inner thin">
                <div class="entry-content">
                    <?php
                    $id = 18089;
                    $post = get_post($id);
                    $content = apply_filters('the_content', $post->post_content);
                    echo $content;
                    ?>
                </div>

                <?php
                // Stay22 GetYourGuild Canada
                the_ad('26563');
                ?>
            </div>
        <?php
        }
        ?>
    <?php
}
    ?>
    </div>