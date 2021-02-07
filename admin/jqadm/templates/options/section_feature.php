<?php $features = isset($sections['feature'])?$sections['feature']:[] ;?> 
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help">
        <?=$this->translate('admin', 'Select a Post for Content')?>
    </label>
    <div class="col-sm-8">
        <select name="option[sections][feature][content]" class="form-control custom-select item-type">
            <option value="">
            <?=$this->translate('admin', 'Select a Post')?>
            </option>
            <?php foreach(sw_get_posts(['type'=>'feature']) as $feature) {?>
            <option <?=is_selected($features, 'content', $feature['id'])?> value="<?=$feature['id']?>">
            <?=$feature['label']?>
            </option>
            <?php }?>
        </select>
    </div>
</div>
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help"><?=$this->translate('admin', 'Select Posts')?></label>
    <div class="col-sm-8">
        <ul class="jqtree-tree">
    <?php foreach(sw_get_posts(['type'=>'feature']) as $feature) { if($feature['id']==get_option_value($features, 'content')) continue; ?>
        <li><label class="item-label"><input type="checkbox"  name="option[sections][feature][item][<?=$feature['id']?>]" <?=is_checked(get_option_value($features, 'item', 0, 1), $feature['id'])?> value="<?=$feature['id']?>"> <?=$feature['label']?></label></li>
    <?php }?>
        </ul>
    </div>
</div>