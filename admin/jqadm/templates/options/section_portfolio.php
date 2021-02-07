<?php $portfolios = isset($sections['portfolio'])?$sections['portfolio']:[] ;?> 
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help">
        <?=$this->translate('admin', 'Select a Post for Content')?>
    </label>
    <div class="col-sm-8">
        <select name="option[sections][portfolio][content]" class="form-control custom-select item-type">
            <option value="">
            <?=$this->translate('admin', 'Select a Post')?>
            </option>
            <?php foreach(sw_get_posts(['type'=>'portfolio']) as $portfolio) {?>
            <option <?=is_selected($portfolios, 'content', $portfolio['id'])?> value="<?=$portfolio['id']?>">
            <?=$portfolio['label']?>
            </option>
            <?php }?>
        </select>
    </div>
</div>
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help"><?=$this->translate('admin', 'Portfolio Groups')?></label>
    <div class="col-sm-8">
        <input type="text" name="option[sections][portfolio][group]" class="form-control custom-select item-type" value="<?=get_option_value($portfolios, 'group')?>">
    </div>
</div>
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help"><?=$this->translate('admin', 'Select Posts')?></label>
    <div class="col-sm-8">
        <ul class="jqtree-tree">
    <?php foreach(sw_get_posts(['type'=>'portfolio']) as $portfolio) { if($portfolio['id']==get_option_value($portfolios, 'content')) continue;?>
        <li><label class="item-label"><input type="checkbox"  name="option[sections][portfolio][item][<?=$portfolio['id']?>]" <?=is_checked(get_option_value($portfolios, 'item', 0, 1), $portfolio['id'])?> value="<?=$portfolio['id']?>"> <?=$portfolio['label']?></label></li>
    <?php }?>
        </ul>
    </div>
</div>