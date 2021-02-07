<?php
$sections = $this->get( 'sections' );
$faq = isset( $sections[ 'faq' ] ) ? $sections[ 'faq' ] : [];
if ( get_option_value( $faq, 'content' ) ) {
    $post = sw_get_post( get_option_value( $faq, 'content' ) );
    $long = $post->getRefItems( 'text', 'long', 'default' );
    $label = $long->getLabel()->first();
    $content = $long->getContent()->first();
    $media = $post->getRefItems( 'media', 'default', 'default' );
    $image_url = $media->getUrl()->first();
    $items =  isset( $faq[ 'item' ] ) ? $faq[ 'item' ] : [];
} else {
    $label = '';
    $content = '';
    $image_url = '';
    $items = [];
}
?>
<section id="faq" class="faq">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2><?=$label?></h2>
            <p><?=$content?></p>
        </div>
        <div class="faq-list">
            <ul>
                <?php foreach($items as $key=>$item){ ?>
                <?php
                    $post = sw_get_post(  $item  );
                    $long = $post->getRefItems( 'text', 'long', 'default' );
                    $iten_label = $long->getLabel()->first();
                    $item_content = $long->getContent()->first();
                    $media = $post->getRefItems( 'media', 'default', 'default' );
                    $item_image_url = $media->getUrl()->first();
                ?>
                <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse collapsed" href="#faq-list-<?=$key?>"><?=$iten_label?><i class="bx bx-chevron-down  icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-<?=$key?>" class="collapse" data-parent=".faq-list">
                    <p><?=$item_content?></p>
                    <?php if($item_image_url){ ?><p><img src="<?=$item_image_url?>"></p><?php }?>
                    
                </div>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</section>