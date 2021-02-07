<?php
$sections = $this->get( 'sections' );
$about = isset( $sections[ 'about' ] ) ? $sections[ 'about' ] : [];

if ( get_option_value( $about, 'content' ) ) {
    $post = sw_get_post( get_option_value( $about, 'content' ) );
    $long = $post->getRefItems( 'text', 'long', 'default' );
    $label = $long->getLabel()->first();
    $content = $long->getContent()->first();
    $media = $post->getRefItems( 'media', 'default', 'default' );
    $image_url = $media->getUrl()->first();
} else {
    $label = '';
    $content = '';
    $image_url = '';
}
?>
<section id="about" class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150"> <img src="<?=$image_url?>" class="img-fluid" alt=""> </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
                <h3><?=$label?></h3>
                <?=$content?>
            </div>
        </div>
    </div>
</section>
