( ( $, window ) => {
    const $panos = $('.entry-media:has(img.panorama)');
    if (!$panos.length) return;

    const $panoramaIcon = $('<span class="panoramaIcon"></span>');
    
    $panos.addClass('panorama-canvas panorama-loading');
    $panos.find('img.panorama')
        .one('load', e => {
            const $img = $(e.currentTarget);
            const $canvas = $img.parent('.panorama-canvas');

            $canvas
                .removeClass('panorama-loading')
                .addClass('panorama-loaded')
                .prop('scrollLeft', $img.width()/2 - $canvas.width()/2)
                .append($panoramaIcon.clone());
            
            $img
                .removeAttr('sizes')
                .removeAttr('data-sizes');
        }).each((_, img) => {
            // If loading from cache
            if(img.complete) {
                img.dispatchEvent(new Event('load'));
            }
        });
})( jQuery, window );