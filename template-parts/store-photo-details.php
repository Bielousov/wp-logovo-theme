<?php
$source_src = wp_get_attachment_image_src(get_the_ID(), 'full');
$backdrop_src = wp_get_attachment_image_src(get_the_ID(), 'large');
$caption = wp_get_attachment_caption(get_the_ID());

$alt = get_post_meta(get_the_ID(), '_wp_attachment_image_alt', TRUE);
$src = get_post_meta(get_the_ID(), '_wp_attachment_image_src', TRUE);
$title = get_post_meta(get_the_ID(), '_wp_attachment_image_title', TRUE);

list($src, $width, $height) = $source_src;
$image_title = !empty($title) ? $tilte : (!empty($alt) ? $alt : $title);

$digital_download_price = 9.99;
?>


<h1 class="logovo-store-title">
    <small>Купить снимок:</small><?php echo $image_title; ?>
</h1>

<section class="logovo-store-product">
    <div class="logovo-store-product-image">
        <?php echo wp_get_attachment_image(get_the_ID(), 'medium'); ?>

        <?php if (!empty($caption)) {
            echo '<p class="logovo-store-product-image-caption">' . $caption . '</p>';
        } ?>
    </div>

    <div class="logovo-store-product-order">
        <div class="logovo-button-group">
            <button type="button">Скачать</button>
            <button type="button" disabled>Печать</button>
        </div>

        <blockquote>
            Гарантированное разрешение: не менее <?php echo $width . ' x ' . $height; ?>.
        </blockquote>
        <p>
            Снимок доступен для скачивания и использования в указанном разрешении немедленно после оплаты. В течение 48 часов ссылка на скачивание изображения в разрешении и качестве оригинального снимка (обычно не менее 3000 x 2000) в формате JPEG будет выслана на указанный при заказе электронный адрес.

        </p>

        <div class="logovo-store-product-cta">
            <div class="logovo-store-product-price">
                <span class="logovo-currency">CAD$</span><?php echo $digital_download_price ?>
            </div>
            <?php echo print_wp_cart_button_for_product($image_title, $digital_download_price, 0, null, null, null, []); ?>
        </div>
    </div>

</section>