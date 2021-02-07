<?php $abouts = isset($sections['about'])?$sections['about']:[] ;?> 
<div class="form-group row ">
    <label class="col-sm-4 form-control-label"><?=$this->translate('admin', 'Select a Post for Content')?></label>
    <div class="col-sm-8">
<select name="option[sections][about][content]" class="form-control custom-select item-type">
    <option value=""><?=$this->translate('admin', 'Select a Post')?></option>
    <?php foreach(sw_get_posts(['type'=>'about']) as $about) {?>
    <option <?=is_selected($abouts, 'content', $about['id'])?> value="<?=$about['id']?>"><?=$about['label']?></option>
    <?php }?>
</select>
    </div>
</div>
