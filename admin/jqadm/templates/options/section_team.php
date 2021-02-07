<?php $teams = isset($sections['team'])?$sections['team']:[] ;?> 
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help">
        <?=$this->translate('admin', 'Select a Post for Content')?>
    </label>
    <div class="col-sm-8">
        <select name="option[sections][team][content]" class="form-control custom-select item-type">
            <option value="">
            <?=$this->translate('admin', 'Select a Post')?>
            </option>
            <?php foreach(sw_get_posts(['type'=>'team']) as $team) {?>
            <option <?=is_selected($teams, 'content', $team['id'])?> value="<?=$team['id']?>">
            <?=$team['label']?>
            </option>
            <?php }?>
        </select>
    </div>
</div>
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help"><?=$this->translate('admin', 'Select Posts')?></label>
    <div class="col-sm-8">
        <ul class="jqtree-tree">
    <?php foreach(sw_get_posts(['type'=>'team']) as $team) { if($team['id']==get_option_value($teams, 'content')) continue;?>
        <li><label class="item-label"><input type="checkbox"  name="option[sections][team][item][<?=$team['id']?>]" <?=is_checked(get_option_value($teams, 'item', 0, 1), $team['id'])?> value="<?=$team['id']?>"> <?=$team['label']?></label></li>
    <?php }?>
        </ul>
    </div>
</div>