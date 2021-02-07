<?php
$enc = $this->encoder();
?>
<!-- ::::::  Start Newsletter Section  ::::::  -->
<div class="newsletter m-t-100 pos-relative">
  <div class="newsletter__bg"> <img src="<?=techie_url('assets/img/newsletter/newsletter-bg.jpg') ?>" alt=""> </div>
  <div class="newsletter__content pos-absolute absolute-center text-center">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-content__inner">
            <h2><?= $this->translate( 'client', 'Subscribe To Our Newsletter' ); ?></h2>
          </div>
        </div>
        <div class="col-10 offset-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
          <form class="newsletter__form" action="#" method="post">
            <div class="newsletter__form-content pos-relative">
              <label class="pos-absolute" for="newsletter-mail"><i class="icon-mail"></i></label>
              <input type="email" name="newsletter-mail" id="newsletter-mail" placeholder="<?= $this->translate( 'client', 'Your mail address' ); ?>">
              <button class="text-uppercase pos-absolute" type="submit" ><?= $this->translate( 'client', 'Subscribe' ); ?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ::::::  End newsletter Section  ::::::  --> 

