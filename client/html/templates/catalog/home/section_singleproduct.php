<?php
$sections = $this->get( 'sections' );
$options = isset( $sections[ 'product' ] ) ? $sections[ 'product' ] : [];
if ( get_option_value( $options, 'content' ) ) {
    $post = sw_get_post( get_option_value( $options, 'content' ) );
    $long = $post->getRefItems( 'text', 'long', 'default' );
    $label = $long->getLabel()->first();
    $content = $long->getContent()->first();
    $media = $post->getRefItems( 'media', 'default', 'default' );
    $image_url = $media->getUrl()->first();
    $items = isset( $options[ 'item' ] ) ? $options[ 'item' ] : [];
} else {
    $label = '';
    $content = '';
    $image_url = '';
    $items = [];
}

$products = techie_products( 'singleproduct', $items );
?>
<section id="singleproduct" class="pricing section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2><?=$label?></h2>
            <p><?=$content?></p>
        </div>
        <div class="row">
            <?php
            if ( $products ) {
                foreach ( $products as $id => $productItem ) {
                    echo $this->partial(
                        $this->config( 'client/html/common/partials/products', 'common/partials/section-product' ),
                        array(
                            'productItem' => $productItem,
                        )
                    );
                }
            }
            ?>
        </div>
    </div>
</section>
