<?php $sections = $this->get('sections'); 
$banner = isset($sections['banner'])?$sections['banner']:[];

if(get_option_value($banner, 'content')){
    $post = sw_get_post(get_option_value($banner, 'content'));
    $long = $post->getRefItems( 'text', 'long', 'default' ) ;
    $label = $long->getLabel()->first();
    $content = $long->getContent()->first();
    $media = $post->getRefItems( 'media', 'default', 'default' );
    $image_url = $media->getUrl()->first();
} else{
    $label = '';
    $content = '';
    $image_url = '';
}
?> 
  <section id="hero" class="d-flex align-items-center">
    <div class="container-fluid" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1><?=$label?></h1>
          <h2><?=$content?></h2>
          <div><a href="<?=get_option_value($banner, 'link')?>" class="btn-get-started scrollto"><?=$this->translate('client', 'Get Started')?></a></div>
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
          <img src="<?=$image_url?>" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section>

