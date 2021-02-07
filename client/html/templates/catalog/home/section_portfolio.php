<?php
$sections = $this->get( 'sections' );
$portfolio = isset( $sections[ 'portfolio' ] ) ? $sections[ 'portfolio' ] : [];
if ( get_option_value( $portfolio, 'content' ) ) {
    $post = sw_get_post( get_option_value( $portfolio, 'content' ) );
    $long = $post->getRefItems( 'text', 'long', 'default' );
    $label = $long->getLabel()->first();
    $content = $long->getContent()->first();
    $media = $post->getRefItems( 'media', 'default', 'default' );
    $image_url = $media->getUrl()->first();
    $items = isset( $portfolio[ 'item' ] ) ? $portfolio[ 'item' ] : [];
    $groups = get_option_value( $portfolio, 'group' );
} else {
    $label = '';
    $content = '';
    $image_url = '';
    $items = [];
    $groups = '';
}
?>
<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Portfolio</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <?php foreach(explode(',', $groups) as $group ){ ?>
                    <li data-filter=".filter-<?=strtolower($group)?>">
                        <?=$this->translate('client', $group)?>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="row portfolio-container">
            <?php foreach($items as $item){ ?>
            <?php
            $post = sw_get_post( $item );
            $long = $post->getRefItems( 'text', 'long', 'default' );
            $iten_label = $long->getLabel()->first();
            $item_content = $long->getContent()->first();
            $media = $post->getRefItems( 'media', 'default', 'default' );
            $item_image_url = $media->getUrl()->first();
            ?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-<?=strtolower($post->getConfigValue('group'))?>">
                <div class="portfolio-wrap"> <img src="<?=$item_image_url?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>
                            <?=$iten_label?>
                        </h4>
                        <p>
                            <?=$item_content?>
                        </p>
                    </div>
                    <div class="portfolio-links"> <a href="<?=$item_image_url?>" data-gall="portfolioGallery" class="venobox" title="<?=$iten_label?>"><i class="bx bx-plus"></i></a> <a href="#" title="<?=$this->translate('client', 'More Details')?>"><i class="bx bx-link"></i></a> </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- End Portfolio Section --> 
