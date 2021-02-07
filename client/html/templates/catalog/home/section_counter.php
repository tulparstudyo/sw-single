<?php
$sections = $this->get( 'sections' );
$counters = isset( $sections[ 'counter' ] ) ? $sections[ 'counter' ] : [];

if ( get_option_value( $counters, 'content' ) ) {
    $post = sw_get_post( get_option_value( $counters, 'content' ) );
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
$client = get_option_value( $counters, 'client' );
$project = get_option_value( $counters, 'project' );
$support = get_option_value( $counters, 'support' );
$worker = get_option_value( $counters, 'worker' );
?>
<section id="counts" class="counts">
    <div class="container">
        <div class="row counters">
            <div class="col-lg-3 col-6 text-center"> <span data-toggle="counter-up"><?=$client?></span>
                <p><?=$this->translate('client', 'Clients')?></p>
            </div>
            <div class="col-lg-3 col-6 text-center"> <span data-toggle="counter-up"><?=$client?></span>
                <p><?=$this->translate('client', 'Projects')?></p>
            </div>
            <div class="col-lg-3 col-6 text-center"> <span data-toggle="counter-up"><?=$project?></span>
                <p><?=$this->translate('client', 'Hours Of Support')?></p>
            </div>
            <div class="col-lg-3 col-6 text-center"> <span data-toggle="counter-up"><?=$worker?></span>
                <p><?=$this->translate('client', 'Hard Workers')?></p>
            </div>
        </div>
    </div>
</section>
