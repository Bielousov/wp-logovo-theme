( ( $ ) => {
  const postImages = $('#post-inner .entry-content .entry-media img');

  if (postImages.length < 3) {
    return;
  }
  
  postImages.each(function(i) {
    var img = $(this);

    if (!img.hasClass('panorama')) {
      img.before('<ins id="img-count-' + (i+1) + '" class="logovo-image-number">' + (i+1) +'</ins>');
    }
  });
})( jQuery );