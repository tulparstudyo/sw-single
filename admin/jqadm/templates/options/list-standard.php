<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2020
 */

$enc = $this->encoder();

//$abouts = techie_get_posts(['type'=>'about']);

$target = $this->config( 'admin/jqadm/url/save/target' );
$controller = $this->config( 'admin/jqadm/url/save/controller', 'Jqadm' );
$action = $this->config( 'admin/jqadm/url/save/action', 'save' );
$config = $this->config( 'admin/jqadm/url/save/config', [] );

$newTarget = $this->config( 'admin/jqadm/url/create/target' );
$newCntl = $this->config( 'admin/jqadm/url/create/controller', 'Jqadm' );
$newAction = $this->config( 'admin/jqadm/url/create/action', 'create' );
$newConfig = $this->config( 'admin/jqadm/url/create/config', [] );

$getTarget = $this->config( 'admin/jqadm/url/get/target' );
$getCntl = $this->config( 'admin/jqadm/url/get/controller', 'Jqadm' );
$getAction = $this->config( 'admin/jqadm/url/get/action', 'get' );
$getConfig = $this->config( 'admin/jqadm/url/get/config', [] );

$copyTarget = $this->config( 'admin/jqadm/url/copy/target' );
$copyCntl = $this->config( 'admin/jqadm/url/copy/controller', 'Jqadm' );
$copyAction = $this->config( 'admin/jqadm/url/copy/action', 'copy' );
$copyConfig = $this->config( 'admin/jqadm/url/copy/config', [] );

$delTarget = $this->config( 'admin/jqadm/url/delete/target' );
$delCntl = $this->config( 'admin/jqadm/url/delete/controller', 'Jqadm' );
$delAction = $this->config( 'admin/jqadm/url/delete/action', 'delete' );
$delConfig = $this->config( 'admin/jqadm/url/delete/config', [] );

$default = [ 'slider.status', 'slider.type', 'slider.label', 'slider.provider', 'slider.domain' ];
$default = $this->config( 'admin/jqadm/slider/fields', $default );
$fields = $this->session( 'aimeos/admin/jqadm/slider/fields', $default );

$searchParams = $params = $this->get( 'pageParams', [] );
$searchParams[ 'page' ][ 'start' ] = 0;

$typeList = [];
foreach ( $this->get( 'itemTypes', [] ) as $typeItem ) {
    $typeList[ $typeItem->getCode() ] = $typeItem->getCode();
}
$sections = isset($this->items['sections'])?$this->items['sections']:[];
?>
<?php $this->block()->start( 'jqadm_content' ); ?>
<nav class="main-navbar"> <span class="navbar-brand">
  <?= $enc->html( $this->translate( 'admin', 'Swordbros Template Options' ) ); ?>
  <span class="navbar-secondary">(
  <?= $enc->html( $this->site()->label() ); ?>
  )</span> </span> </nav>
<?= $this->partial (
    $this->config( 'admin/jqadm/partial/pagination', 'common/partials/pagination-standard' ), [ 'pageParams' => $params, 'pos' => 'top', 'total' => $this->get( 'total' ),
        'page' => $this->session( 'aimeos/admin/jqadm/slider/page', [] )
    ]
);
?>
<form class="item item-techie form-horizontal" method="POST" action="<?= $enc->attr( $this->url( $target, $controller, $action, $searchParams, [], $config ) ); ?>">
  <?= $this->csrf()->formfield(); ?>
  <div class="row item-container">
    <div class="col-md-3 item-navbar">
      <div class="navbar-content">
        <ul class="nav nav-tabs flex-md-column flex-wrap d-flex justify-content-between" role="tablist">
          <li class="nav-item basic"> <a class="nav-link active" href="#basic" data-toggle="tab" role="tab" aria-expanded="true" aria-controls="basic"> Basic</a> </li>
          <li class="nav-item header"> <a class="nav-link" href="#header" data-toggle="tab" role="tab"> Header</a> </li>
          <li class="nav-item home-page"> <a class="nav-link" href="#footer" data-toggle="tab" role="tab"> Footer</a> </li>
          <li class="nav-item home-page"> <a class="nav-link" href="#home-page" data-toggle="tab" role="tab"> Home Page</a> </li>
          <li class="nav-item legals"> <a class="nav-link" href="#legals" data-toggle="tab" role="tab"> Legals</a> </li>
          <li class="nav-item sections"> <a class="nav-link" href="#sections" data-toggle="tab" role="tab"> Home Sections</a> </li>
          <!--<li class="nav-item custom"> <a class="nav-link" href="#custom" data-toggle="tab" role="tab"> Custom Css/Js</a> </li>
          <li class="nav-item socials"> <a class="nav-link" href="#socials" data-toggle="tab" role="tab"> Socials</a> </li>-->
          <li class="nav-item help"> <a class="nav-link" href="#help" data-toggle="tab" role="tab"> Support</a> </li>
        </ul>
        <br>
        <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
      </div>
    </div>
    <div class="col-md-9 item-content tab-content">
      <div id="basic" class="row item-basic tab-pane fade active show col-md-12" role="tabpanel" aria-labelledby="basic">
        <h2>Basic</h2>
        <div class="col-md-12 home-section">
          <h4>Store Info</h4>
          <nav>
            <div class="nav nav-tabs nav-fill" id="tore-nav-tab" role="tablist">
              <?php if( ( $languages = $this->get( 'pageLangItems', map() ) )->count() >0 ) : ?>
              <?php foreach($languages as $language){ ?>
              <a class="nav-item nav-link" id="store-nav-<?=$language->getCode()?>-tab" data-toggle="tab" href="#store-nav-<?=$language->getCode()?>" role="tab" aria-controls="nav-<?=$language->getCode()?>" aria-selected="true"><img src="/packages/swordbros/common/img/flags/<?=$language->getCode()?>.png" width="24">
              <?=$language->getCode()?>
              </a>
              <?php }?>
              <?php endif; ?>
            </div>
          </nav>
          <div class="tab-content py-3 px-3 px-sm-0" id="tore-nav-tabContent">
            <?php if( ( $languages = $this->get( 'pageLangItems', map() ) )->count() >0 ) : ?>
            <?php foreach($languages as $language){?>
            <div class="tab-pane fade show" id="store-nav-<?=$language->getCode()?>" role="tabpanel" aria-labelledby="store-nav-<?=$language->getCode()?>-tab">
              <div class="tab-content clearfix">
                <h5>
                  <?=$language->getLabel()?>
                  Content's Tab</h5>
                  <div class="form-group row ">
                    <label class="col-sm-4 form-control-label help" >Store Name</label>
                    <div class="col-sm-8">
                      <input type="text" name="option[store_name][<?=$language->getCode()?>]"  value="<?=get_option_value($this->items, 'store_name', $language->getCode())?>" class="form-control item-label">
                    </div>
                  </div>
                  <div class="form-group row ">
                  <label class="col-sm-4 form-control-label help">Slogan</label>
                  <div class="col-sm-8">
                    <input type="text" name="option[topbar_text][<?=$language->getCode()?>]"  value="<?=get_option_value($this->items, 'topbar_text', $language->getCode())?>" class="form-control item-label">
                  </div>
                </div>

                  <div class="form-group row ">
                    <label class="col-sm-4 form-control-label help" >Store Address</label>
                    <div class="col-sm-8">
                      <input type="text" name="option[store_address][<?=$language->getCode()?>]"  value="<?=get_option_value($this->items, 'store_address', $language->getCode())?>" class="form-control item-label">
                    </div>
                  </div>
                  <div class="form-group row ">
                    <label class="col-sm-4 form-control-label help" >Store Phone</label>
                    <div class="col-sm-8">
                      <input type="text" name="option[store_phone][<?=$language->getCode()?>]"  value="<?=get_option_value($this->items, 'store_phone', $language->getCode())?>" class="form-control item-label">
                    </div>
                  </div>
                  <div class="form-group row ">
                    <label class="col-sm-4 form-control-label help" >Store Email</label>
                    <div class="col-sm-8">
                      <input type="text" name="option[store_email][<?=$language->getCode()?>]"  value="<?=get_option_value($this->items, 'store_email', $language->getCode())?>" class="form-control item-label">
                    </div>
                  </div>
                  <div class="form-group row ">
                    <label class="col-sm-4 form-control-label help" >Google Map Url</label>
                    <div class="col-sm-8">
                      <textarea name="option[store_google_map][<?=$language->getCode()?>]" class="form-control item-label"><?=get_option_value($this->items, 'store_google_map', $language->getCode())?></textarea>
                    </div>
                  </div>
              </div>
            </div>
            <?php }?>
            <?php endif; ?>
          </div>


        </div>
        <div class="col-md-12 home-section">
          <h4>Store Social Links</h4>
          <div class="form-group row ">
            <label class="col-sm-4 form-control-label help" >Facebook</label>
            <div class="col-sm-8">
              <input type="text" name="option[facebook_url]"  value="<?=get_option_value($this->items, 'facebook_url')?>" class="form-control item-label">
            </div>
          </div>
          <div class="form-group row ">
            <label class="col-sm-4 form-control-label help" >Twitter</label>
            <div class="col-sm-8">
              <input type="text" name="option[twitter_url]"  value="<?=get_option_value($this->items, 'twitter_url')?>" class="form-control item-label">
            </div>
          </div>
          <div class="form-group row ">
            <label class="col-sm-4 form-control-label help" >Youtube</label>
            <div class="col-sm-8">
              <input type="text" name="option[youtube_url]"  value="<?=get_option_value($this->items, 'youtube_url')?>" class="form-control item-label">
            </div>
          </div>
          <div class="form-group row ">
            <label class="col-sm-4 form-control-label help" >Instagram</label>
            <div class="col-sm-8">
              <input type="text" name="option[instagram_url]"  value="<?=get_option_value($this->items, 'instagram_url')?>" class="form-control item-label">
            </div>
          </div>
        </div>
      </div>
      <div id="header" class="row item-header tab-pane col-md-12" role="tabpanel" aria-labelledby="header">
        <h2>Header</h2>
        <div class="col-md-12 home-section">
          <h4>Header</h4>
          <div class="form-group row">
            <label class="col-sm-4 form-control-label help">Header Type</label>
            <div class="col-sm-8 header-type">
            <label class="text-left">
            <input type="radio" name="option[header_type]" value="standard" <?php if(isset($this->items['header_type'])) echo is_selected($this->items, 'header_type', 'standard')?>> Standard<img style="max-width:100%" src="<?=techie_url('assets\img\header\header-standard.png')?>">
            </label>
            <label class="text-left">
            <input type="radio" name="option[header_type]" value="clear" <?php if(isset($this->items['header_type'])) echo is_selected($this->items, 'header_type', 'clear')?>> Clear<img style="max-width:100%" src="<?=techie_url('assets\img\header\header-clear.png')?>">
            </label>
            </div>
          </div>
          <div class="form-group row ">
            <label class="col-sm-4 form-control-label help">Show Language Selector</label>
            <div class="col-sm-8">
              <input type="hidden" name="option[show_language_select]"  value="0">
              <input type="checkbox" name="option[show_language_select]"  value="1" <?=is_checked($this->items, 'show_language_select')?> class="item-label">
            </div>
          </div>
          <div class="form-group row ">
            <label class="col-sm-4 form-control-label help">Show Currency Selector</label>
            <div class="col-sm-8">
              <input type="hidden" name="option[show_currency_select]"  value="0">
              <input type="checkbox" name="option[show_currency_select]"  value="1" <?=is_checked($this->items, 'show_currency_select')?> class="item-label">
            </div>
          </div>
          <div class="form-group row ">
            <label class="col-sm-4 form-control-label help">Show Slider</label>
            <div class="col-sm-8">
              <input type="hidden" name="option[show_slider]"  value="0">
              <input type="checkbox" name="option[show_slider]"  value="1" <?=is_checked($this->items, 'show_slider')?> class="item-label">
              <a class="text-danger" href="/admin/default/jqadm/search/swordbros/slider"> Edit Slider</a> </div>
          </div>
        </div>

      </div>
      <div id="footer" class="row item-header tab-pane col-md-12" role="tabpanel" aria-labelledby="footer">
        <h2>Footer</h2>
        <div class="col-md-12 home-section">
          <h4>Footer</h4>
          <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
              <?php if( ( $languages = $this->get( 'pageLangItems', map() ) )->count() >0 ) : ?>
              <?php foreach($languages as $language){ ?>
              <a class="nav-item nav-link" id="nav-<?=$language->getCode()?>-tab" data-toggle="tab" href="#nav-<?=$language->getCode()?>" role="tab" aria-controls="nav-<?=$language->getCode()?>" aria-selected="true"><img src="/packages/swordbros/common/img/flags/<?=$language->getCode()?>.png" width="24">
              <?=$language->getCode()?>
              </a>
              <?php }?>
              <?php endif; ?>
            </div>
          </nav>
          <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <?php if( ( $languages = $this->get( 'pageLangItems', map() ) )->count() >0 ) : ?>
            <?php foreach($languages as $language){?>
            <div class="tab-pane fade show" id="nav-<?=$language->getCode()?>" role="tabpanel" aria-labelledby="nav-<?=$language->getCode()?>-tab">
              <div class="tab-content clearfix">
                <h5>
                  <?=$language->getLabel()?>
                  Content's Tab</h5>
                <div class="form-group row ">
                  <label class="col-sm-4 form-control-label help">Copyright</label>
                  <div class="col-sm-8">
                    <input type="text" name="option[copyright_text][<?=$language->getCode()?>]"  value="<?=get_option_value($this->items, 'copyright_text', $language->getCode())?>" class="form-control item-label">
                  </div>
                </div>
                <div class="form-group row ">
                  <label class="col-sm-4 form-control-label help">Column-1</label>
                  <div class="col-sm-8">
                    <textarea name="option[col_1][<?=$language->getCode()?>]"  class="form-control htmleditor form-control item-content"><?=get_option_value($this->items, 'col_1', $language->getCode())?></textarea>
                  </div>
                </div>
                <div class="form-group row ">
                  <label class="col-sm-4 form-control-label help">Column-2</label>
                  <div class="col-sm-8">
                    <textarea name="option[col_2][<?=$language->getCode()?>]"  class="form-control htmleditor form-control item-content"><?=get_option_value($this->items, 'col_2', $language->getCode())?></textarea>
                  </div>
                </div>
                <div class="form-group row ">
                  <label class="col-sm-4 form-control-label help">Column-3</label>
                  <div class="col-sm-8">
                    <textarea name="option[col_3][<?=$language->getCode()?>]"  class="form-control htmleditor form-control item-content"><?=get_option_value($this->items, 'col_3', $language->getCode())?></textarea>
                  </div>
                </div>
                <div class="form-group row ">
                  <label class="col-sm-4 form-control-label help">Column-4</label>
                  <div class="col-sm-8">
                    <textarea name="option[col_4][<?=$language->getCode()?>]"  class="form-control htmleditor form-control item-content"><?=get_option_value($this->items, 'col_4', $language->getCode())?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div id="home-page" class="row item-home-page tab-pane col-md-12" role="tabpanel" aria-labelledby="home-page">
        <h2>Home Page</h2>
        <div class="col-md-12 home-section">
          <h4>Body</h4>
          <div class="form-group row ">
            <label class="col-sm-4 form-control-label help" >Top Banner Image-1</label>
            <div class="col-sm-8 techie-img">
              <span class="preview"><img class="image" width="64"> </span>
              <input type='file' name="files[show_top_banner_1]" class="image-file" />
              <input type="hidden" name="option[show_top_banner_1]"  value="<?=get_option_value($this->items, 'show_top_banner_1')?>" class="form-control item-label">
            </div>
          </div>
          <div class="form-group row ">
            <label class="col-sm-4 form-control-label help">Top Banner Image-2</label>
            <div class="col-sm-8">
              <input type="text" name="option[show_top_banner_2]"  value="<?=get_option_value($this->items, 'show_top_banner_2')?>" class="form-control item-label">
            </div>
          </div>
          <div class="form-group row ">
            <label class="col-sm-4 form-control-label help">Middle Banner Image</label>
            <div class="col-sm-8">
              <input type="text" name="option[show_middle_banner]"  value="<?=get_option_value($this->items, 'show_middle_banner')?>" class="form-control item-label">
            </div>
          </div>
            <hr><h5>Show On Home Page</h5>
            <?php $show_sections = isset($this->items['show_section'])?$this->items['show_section']:[] ;?> 
            <?php $menu = isset($this->items['menu'])?$this->items['menu']:[] ;?> 

          <?php foreach(techie_sections($this) as $section_code=>$section){ ?>
            <?php $section_menu = isset($menu[$section_code])?$menu[$section_code]:[]?>
          <div class="form-group row ">
            <label class="col-sm-4 form-control-label help"><?=$section['label']?></label>
            <div class="col-sm-2">
              <input type="hidden" name="option[show_section][<?=$section_code?>]" value="0">
              <input type="checkbox" name="option[show_section][<?=$section_code?>]"  value="1" <?=is_checked($show_sections, $section_code)?> class="item-label"> Page
            </div>
            <div class="col-sm-2">
              <input type="hidden" name="option[menu][<?=$section_code?>][show]" value="0">
              <input type="checkbox" name="option[menu][<?=$section_code?>][show]"  value="1" <?=is_checked($section_menu, 'show')?> class="item-label"> Menu
            </div>
          </div>
        <div class="form-group row ">
          <?php if( ( $languages = $this->get( 'pageLangItems', map() ) )->count() >0 ) : ?>
          <?php foreach($languages as $language){ ?>
            <label class="col-sm-4 form-control-label help"><img src="/packages/swordbros/common/img/flags/<?=$language->getCode()?>.png" width="16"></label>
            <div class="col-sm-8">
                <input type="text" name="option[menu][<?=$section_code?>][label][<?=$language->getCode()?>]" value="<?=get_option_value($section_menu, 'label', $language->getCode())?>"  class="form-control">
            </div>
          <?php }?>
          <?php endif; ?>
        </div><hr>

          <?php } ?>
<a href="/admin/default/jqadm/search/type/swpost"><?=$this->translate('admin', 'Add New Section')?></a><br>
            <span>If you add a new section type, this section  is required a template file .</span>
        </div>
      </div>
      <div id="sections" class="row item-sections tab-pane col-md-12" role="tabpanel" aria-labelledby="sections">
        <h2><?=$this->translate('admin', 'Home Sections')?></h2>
          <?php foreach(techie_sections($this) as $section_code=>$section){ ?>
        <div class="col-md-12 home-section">
          <h5><?=$section['label']?></h5>
            <?php if(is_file(__DIR__ . '/section_'.$section_code.'.php')){
                    include_once(__DIR__ . '/section_'.$section_code.'.php'); 
            } else { 
                echo '<span class="text-danger">section_'.$section_code.'.php is not exists</span>';
            }?>
        </div>
          <?php } ?>
<a href="/admin/default/jqadm/search/type/swpost"><?=$this->translate('admin', 'Add New Section')?></a> <br>
<span>&nbsp;If you add a new section type, this section  is required a template file .</span>

      </div>
      <div id="legals" class="row item-legals tab-pane col-md-12" role="tabpanel" aria-labelledby="legals">
        <h2>Legals Page Content</h2>
        <div class="col-md-12 home-section"><br>
          <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
              <?php if( ( $languages = $this->get( 'pageLangItems', map() ) )->count() >0 ) : ?>
              <?php foreach($languages as $language){ ?>
              <a class="nav-item nav-link" id="nav-legal-<?=$language->getCode()?>-tab" data-toggle="tab" href="#nav-legal-<?=$language->getCode()?>" role="tab" aria-controls="nav-legal-<?=$language->getCode()?>" aria-selected="true"><img src="/packages/swordbros/common/img/flags/<?=$language->getCode()?>.png" width="24">
              <?=$language->getCode()?>
              </a>
              <?php }?>
              <?php endif; ?>
            </div>
          </nav>
          <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <?php if( ( $languages = $this->get( 'pageLangItems', map() ) )->count() >0 ) : ?>
            <?php foreach($languages as $language){?>
            <div class="tab-pane fade" id="nav-legal-<?=$language->getCode()?>" role="tabpanel" aria-labelledby="nav-legal-<?=$language->getCode()?>-tab">
              <div class="tab-content clearfix">
                <h5>
                  <?=$language->getLabel()?>
                  Legal's Tab</h5>
                <div class="form-group row ">
                  <label class="col-sm-4 form-control-label help">Terms and conditions</label>
                  <div class="col-sm-8">
                    <textarea name="option[terms_conditions][<?=$language->getCode()?>]"  class="form-control htmleditor form-control item-content"><?=get_option_value($this->items, 'terms_conditions', $language->getCode())?></textarea>
                  </div>
                </div>
                <div class="form-group row ">
                  <label class="col-sm-4 form-control-label help">Privacy policy</label>
                  <div class="col-sm-8">
                    <textarea name="option[privacy_policy][<?=$language->getCode()?>]"  class="form-control htmleditor form-control item-content"><?=get_option_value($this->items, 'privacy_policy', $language->getCode())?></textarea>
                  </div>
                </div>
                <div class="form-group row ">
                  <label class="col-sm-4 form-control-label help">Cancellation policy</label>
                  <div class="col-sm-8">
                    <textarea name="option[cancellation_policy][<?=$language->getCode()?>]"  class="form-control htmleditor form-control item-content"><?=get_option_value($this->items, 'cancellation_policy', $language->getCode())?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div id="custom" class="row item-custom tab-pane col-md-12" role="tabpanel" aria-labelledby="custom">
        <h2>Custom Css/Js</h2>
      </div>
      <div id="socials" class="row item-socials tab-pane col-md-12" role="tabpanel" aria-labelledby="socials">
        <h2>Socials</h2>
      </div>
      <div id="help" class="row item-help tab-pane col-md-12" role="tabpanel" aria-labelledby="help">
        <h2>Support</h2>
      </div>
    </div>
  </div>
</form>
<style>
	.home-section{
		border: 1px solid #e5e5e5;
		box-shadow: 0;
		transition: box-shadow .5s;
		margin-bottom: 15px;
	}
	.home-section:hover {
		box-shadow: 0 0 3px #00ffff;
	}
	.home-section h5{
		color: #a0a0a0;
        border-bottom: dotted 1px #e5e5e5;
	}
	.nav-tabs .nav-item {
		min-width: auto;
	}
</style>
<?php $this->block()->stop(); ?>
<?= $this->render( $this->config( 'admin/jqadm/template/page', 'common/page-standard' ) ); ?>
