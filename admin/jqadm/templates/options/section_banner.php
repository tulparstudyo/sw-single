<?php $banners = isset($sections['banner'])?$sections['banner']:[] ;?> 
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help"><?=$this->translate('admin', 'Select a Post for Content')?></label>
    <div class="col-sm-8">
<select name="option[sections][banner][content]" class="form-control custom-select item-type">
    <option value=""><?=$this->translate('admin', 'Select a Post')?></option>
    <?php foreach(sw_get_posts(['type'=>'banner']) as $banner) {?>
    <option <?=is_selected($banners, 'content', $banner['id'])?> value="<?=$banner['id']?>"><?=$banner['label']?></option>
    <?php }?>
</select>
    </div>
</div>
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help"><?=$this->translate('admin', 'Link')?></label>
    <div class="col-sm-8">
        <input type="text" name="option[sections][banner][link]" value="<?=get_option_value($banners, 'link')?>"  class="form-control">
    </div>
</div>
