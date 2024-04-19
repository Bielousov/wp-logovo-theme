/* global jQuery, window */

( ( $, window ) => {
  	let throttlePaginationReflow;
    /* Scroll pagination to current page */
    const setPaginationPosition = () => {
        const $navPagination = $('.x-pagination__all ul.page-numbers');
        const $currentPage = $navPagination.find('li:has(.page-numbers.current)');

        if (!$navPagination.length || !$currentPage.length) {
            return;
        }

        const currentPageLeft = $currentPage.position().left + $navPagination.scrollLeft();
        const centerPosition = currentPageLeft - $navPagination.width()/2;
        $navPagination.scrollLeft(centerPosition);
    };

    /* Bind update on window resize */
    $(window).on('resize', () => {
      if (throttlePaginationReflow) {
      	clearTimeout(throttlePaginationReflow);
      }
      throttlePaginationReflow = setTimeout(setPaginationPosition, 100);
    });

    setPaginationPosition();
})( jQuery, window );
