<?php
$sections = $this->get( 'sections' );
$testimonial = isset( $sections[ 'testimonial' ] ) ? $sections[ 'testimonial' ] : [];
if ( get_option_value( $testimonial, 'content' ) ) {
    $post = sw_get_post( get_option_value( $testimonial, 'content' ) );
    $long = $post->getRefItems( 'text', 'long', 'default' );
    $label = $long->getLabel()->first();
    $content = $long->getContent()->first();
    $media = $post->getRefItems( 'media', 'default', 'default' );
    $image_url = $media->getUrl()->first();
    $items = isset( $testimonial[ 'item' ] ) ? $testimonial[ 'item' ] : [];
    $groups = get_option_value( $testimonial, 'group' );
} else {
    $label = '';
    $content = '';
    $image_url = '';
    $items = [];
    $groups = '';
}
?>
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2><?=$label?></h2>
            <p><?=$content?></p>
        </div>

        <div class="owl-carousel testimonials-carousel">

            <?php foreach($items as $item){ ?>
            <?php
            $post = sw_get_post( $item );
            $long = $post->getRefItems( 'text', 'long', 'default' );
            $iten_label = $long->getLabel()->first();
            $item_content = $long->getContent()->first();
            $media = $post->getRefItems( 'media', 'default', 'default' );
            $item_image_url = $media->getUrl()->first();
            $short = $post->getRefItems( 'text', 'short', 'default' );
            $excerpt = $short->getContent()->first();
            ?>
          <div class="testimonial-item">
              <?=$item_content?>
            <img src="<?=$item_image_url?>" class="testimonial-img" alt="">
            <h3><?=$iten_label?></h3>
            <h4><?=$excerpt?></h4>
          </div>
            <?php } ?>

        </div>

      </div>
    </section><!-- End Testimonials Section -->

