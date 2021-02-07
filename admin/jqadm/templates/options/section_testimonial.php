<?php $testimonials = isset($sections['testimonial'])?$sections['testimonial']:[] ;?> 
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help">
        <?=$this->translate('admin', 'Select a Post for Content')?>
    </label>
    <div class="col-sm-8">
        <select name="option[sections][testimonial][content]" class="form-control custom-select item-type">
            <option value="">
            <?=$this->translate('admin', 'Select a Post')?>
            </option>
            <?php foreach(sw_get_posts(['type'=>'testimonial']) as $testimonial) {?>
            <option <?=is_selected($testimonials, 'content', $testimonial['id'])?> value="<?=$testimonial['id']?>">
            <?=$testimonial['label']?>
            </option>
            <?php }?>
        </select>
    </div>
</div>
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help"><?=$this->translate('admin', 'Select Posts')?></label>
    <div class="col-sm-8">
        <ul class="jqtree-tree">
    <?php foreach(sw_get_posts(['type'=>'testimonial']) as $testimonial) { if($testimonial['id']==get_option_value($testimonials, 'content')) continue; ?>
        <li><label class="item-label"><input type="checkbox"  name="option[sections][testimonial][item][<?=$testimonial['id']?>]" <?=is_checked(get_option_value($testimonials, 'item', 0, 1), $testimonial['id'])?> value="<?=$testimonial['id']?>"> <?=$testimonial['label']?></label></li>
    <?php }?>
        </ul>
    </div>
</div>