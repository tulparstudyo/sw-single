<?php $services = isset($sections['service'])?$sections['service']:[] ;?>
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help">
        <?=$this->translate('admin', 'Select a Post for Content')?>
    </label>
    <div class="col-sm-8">
        <select name="option[sections][service][content]" class="form-control custom-select item-type">
            <option value="">
            <?=$this->translate('admin', 'Select a Post')?>
            </option>
            <?php foreach(sw_get_posts(['type'=>'service']) as $service) { ?>
            <option <?=is_selected($services, 'content', $service['id'])?> value="<?=$service['id']?>">
            <?=$service['label']?>
            </option>
            <?php }?>
        </select>
    </div>
</div>
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help">
        <?=$this->translate('admin', 'Select Posts')?>
    </label>
    <div class="col-sm-8">
        <ul class="jqtree-tree">
            <?php foreach(sw_get_posts(['type'=>'service']) as $service) { if($service['id']==get_option_value($services, 'content')) continue;?>
            <li>
                <label class="item-label">
                    <input type="checkbox"  name="option[sections][service][item][<?=$service['id']?>]" <?=is_checked(get_option_value($services, 'item', 0, 1), $service['id'])?> value="<?=$service['id']?>">
                    <?=$service['label']?>
                </label>
            </li>
            <?php }?>
        </ul>
    </div>
</div>
