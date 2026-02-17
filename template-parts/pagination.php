<?php
/**
 * Pagination
 *
 * @subpackage Logovo
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
  <nav class="logovo-pagination section-inner">
    <hr class="styled-separator pagination-separator is-style-wide" aria-hidden="true" />
    <div class="logovo-pagination__all">
      <?php
        echo paginate_links(
          array(
            'show_all' => true,
            'prev_next' => false,
            'type' => 'list'
          )
        );
      ?>
    </div>

    <div class="logovo-pagination__prev-next">
      <div class="logovo-pagination__prev">
        <?php
          previous_posts_link( __( '<span class="logovo-pagination__arrow">&larr;</span> <span class="logovo-pagination__arrow-hint">Назад в будущее</span>', 'myblog' ) );
        ?>
      </div>
      <div class="logovo-pagination__next">
        <?php
          next_posts_link( __( '<span class="logovo-pagination__arrow-hint">Дальше в прошлое</span> <span class="logovo-pagination__arrow">&rarr;</span>', 'myblog' ) );
        ?>
      </div>
      <div class="logovo-pagination__hint">
        <span class="logovo-pagination__arrow">&larr;</span>
        <span class="x__pc">Ctrl</span> / <span class="x__os">&#8984;</span>
        <span class="logovo-pagination__arrow">&rarr;</span>
      </div>
    </div>
  </nav>
<?php endif; ?>