<?php
$sections = $this->get( 'sections' );
$contact = isset( $sections[ 'contact' ] ) ? $sections[ 'contact' ] : [];

if ( get_option_value( $contact, 'content' ) ) {
    $post = sw_get_post( get_option_value( $contact, 'content' ) );
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
$store_address = techie_option('store_address');
$store_phone = techie_option('store_phone');
$store_email = techie_option('store_email');
$store_google_map = techie_option('store_google_map');
?>
<section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2><?=$label?></h2>
            <p><?=$content?></p>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="info-box mb-4"> <i class="bx bx-map"></i>
                    <h3><?=$this->translate('client', 'Our Address')?></h3>
                    <p><?=$store_address?></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4"> <i class="bx bx-envelope"></i>
                    <h3><?=$this->translate('client', 'Email Us')?></h3>
                    <p><?=$store_phone?></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4"> <i class="bx bx-phone-call"></i>
                    <h3><?=$this->translate('client', 'Call Us')?></h3>
                    <p><?=$store_email?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 store_google_map ">
                <div class="mb-4 mb-lg-0" style="border:0; width: 100%; height: 384px;" allowfullscreen><?=$store_google_map?></div>
            </div>
            <div class="col-lg-6">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="<?=$this->translate('client', 'Your Name')?>" data-rule="minlen:4" data-msg="<?=$this->translate('client', 'Please enter at least 4 chars')?>" />
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="<?=$this->translate('client', 'Your Email')?>" data-rule="email" data-msg="<?=$this->translate('client', 'Please enter a valid email')?>" />
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="<?=$this->translate('client', 'Subject')?>" data-rule="minlen:4" data-msg="<?=$this->translate('client', 'Please enter at least 8 chars of subject')?>" />
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="<?=$this->translate('client', 'Please write something for us')?>" placeholder="<?=$this->translate('client', 'Message')?>"></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="mb-3">
                        <div class="loading"><?=$this->translate('client', 'Loading')?></div>
                        <div class="error-message"></div>
                        <div class="sent-message"><?=$this->translate('client', 'Your message has been sent. Thank you!')?></div>
                    </div>
                    <div class="text-center">
                        <button type="submit"><?=$this->translate('client', 'Send Message')?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        .store_google_map iframe{
            max-width: 100%;
        }
    </style>
</section>
