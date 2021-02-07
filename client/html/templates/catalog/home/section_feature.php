<?php
$sections = $this->get( 'sections' );
$feature = isset( $sections[ 'feature' ] ) ? $sections[ 'feature' ] : [];
if ( get_option_value( $feature, 'content' ) ) {
    $post = sw_get_post( get_option_value( $feature, 'content' ) );
    $long = $post->getRefItems( 'text', 'long', 'default' );
    $label = $long->getLabel()->first();
    $content = $long->getContent()->first();
    $media = $post->getRefItems( 'media', 'default', 'default' );
    $image_url = $media->getUrl()->first();
    $items = isset( $feature[ 'item' ] ) ? $feature[ 'item' ] : [];
} else {
    $label = '';
    $content = '';
    $image_url = '';
    $items = [];
}
?>
<section id="feature" class="features">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2><?=$label?></h2>
            <p><?=$content?></p>
        </div>
        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column align-items-lg-center">
                <?php foreach($items as $item){ ?>
                <?php
                    $post = sw_get_post( $item  );
                    $long = $post->getRefItems( 'text', 'long', 'default' );
                    $iten_label = $long->getLabel()->first();
                    $item_content = $long->getContent()->first();
                    $media = $post->getRefItems( 'media', 'default', 'default' );
                    $item_image_url = $media->getUrl()->first();
                ?>
                <div class="icon-box mt-5 mt-lg-0" data-aos="fade-up" data-aos-delay="100"> <i class="bx bxl-<?=$post->getConfigValue('icon')?>"></i>
                    <h4><?=$iten_label?></h4>
                    <p><?=$item_content?></p>
                </div>
                <?php } ?>
            </div>
            <div class="image col-lg-6 order-1 order-lg-2 " data-aos="zoom-in" data-aos-delay="100"> <img src="<?=$image_url?>" alt="" class="img-fluid"> </div>
        </div>
    </div>
</section>
<!-- End Features Section --> 
