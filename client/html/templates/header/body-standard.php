<?php
$nav = $this->get('nav', []);
$sections = $this->get('sections', []);
$menu = techie_options('menu');
$selectLanguageId = $this->get('selectLanguageId', '');
?>
<style>
.locale-select.nav-menu .dropdown-menu a {
    color: #000;
}
    .locale-select.nav-menu .dropdown-menu .active  a{
        
    }
    div.mobile-nav{
        display:none;
    }
</style>

<!-- ======= Header ======= -->
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-xl-9 d-flex align-items-center">
          <h1 class="logo mr-auto"><a href="/"><?=techie_option('store_name')?></a></h1>
          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li class="active">
<a href="/">
<svg viewBox="0 0 463.89 438.88" version="1.0" width="20">
  <g id="layer1" transform="translate(-42.339 -276.34)">
    <path id="rect2391" fill="#D3C2F7" d="m437.15 499.44zl-162.82-144.19-162.9 144.25v206.12c0 5.33 4.3 9.6 9.62 9.6h101.81v-90.38c0-5.32 4.27-9.62 9.6-9.62h83.65c5.33 0 9.6 4.3 9.6 9.62v90.38h101.84c5.32 0 9.6-4.27 9.6-9.6v-206.18zm-325.72 0.06z"/>
    <path id="path2399" d="m273.39 276.34l-231.05 204.59 24.338 27.45 207.65-183.88 207.61 183.88 24.29-27.45-231-204.59-0.9 1.04-0.94-1.04z"/>
    <path id="rect2404" d="m111.43 305.79h58.57l-0.51 34.69-58.06 52.45v-87.14z"/>
  </g>
</svg>
</a>
                </li>
        <?php if(techie_is_home()){?>
                <?php foreach($menu as $section=>$section_menu){ ?>
                    <?php if($section_menu['show']){ ?>
                      <li><a href="#<?=$section?>"><?=$this->translate('client', $section_menu['label'][$selectLanguageId])?></a></li>
                    <?php }?>
                <?php }?>
        <?php }?>
                <?=$nav['locale']?>
                <li class="catalog-detail-basket">
                    <a>
<form method="POST" action="/shop/basket">
<div class="addbasket">
    <?= $this->csrf()->formfield(); ?>
    <input type="hidden" value="add" name="b_action">
    <input type="hidden" name="b_prod[0][prodid]" value="0">
    <input type="hidden" class="form-control input-lg" name="b_prod[0][quantity]" min="1" max="" step="1" maxlength="10" value="0" required="required">
    <button class="btn-buy" type="submit" value="" style="background-color: transparent; border: 0;">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 512 512"  xml:space="preserve">
<g>
	<path d="M479.999,0h-64C400.53,0,387.28,11.063,384.53,26.281L377.655,64H31.999C20.905,64,10.608,69.75,4.78,79.188   s-6.359,21.188-1.406,31.125l96,192c5.422,10.844,16.5,17.688,28.625,17.688h203.094l-5.813,32H159.999c-17.672,0-32,14.313-32,32   s14.328,32,32,32h192c15.469,0,28.719-11.063,31.469-26.281L442.718,64h37.281c17.688,0,32-14.313,32-32S497.687,0,479.999,0z    M147.78,256l-64-128h282.25l-23.281,128H147.78z"/>
	<path d="M191.999,448c-17.672,0-32,14.313-32,32s14.328,32,32,32s32-14.313,32-32S209.67,448,191.999,448z"/>
	<path d="M319.999,448c-17.688,0-32,14.313-32,32s14.313,32,32,32s32-14.313,32-32S337.687,448,319.999,448z"/>
</g>
</svg>    
    </button>
</div>
</form>                
                    </a>
                </li>
            
            </ul>
          </nav><!-- .nav-menu -->
        <?php if($sections['started']){?>
            <?php if(get_option_value($sections['started'], 'link')){ ?>
              <a href="<?=get_option_value($sections['started'], 'link')?>" class="get-started-btn scrollto"><?=$this->translate('client', 'Get Started')?></a>
            <?php }?>
        <?php }?>
        </div>
      </div>
    </div>
<!-- End Header -->