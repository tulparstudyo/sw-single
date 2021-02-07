<?php $counters = isset($sections['counter'])?$sections['counter']:[] ;?> 
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help">
        <?=$this->translate('admin', 'Select a Post for Content')?>
    </label>
    <div class="col-sm-8">
        <select name="option[sections][counter][content]" class="form-control custom-select item-type">
            <option value="">
            <?=$this->translate('admin', 'Select a Post')?>
            </option>
            <?php foreach(sw_get_posts(['type'=>'counter']) as $counter) {?>
            <option <?=is_selected($counters, 'content', $counter['id'])?> value="<?=$counter['id']?>">
            <?=$counter['label']?>
            </option>
            <?php }?>
        </select>
    </div>
</div>
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help"><?=$this->translate('admin', 'Value')?></label>
    <div class="col-sm-2">
        <input type="number" name="option[sections][counter][client]" value="<?=get_option_value($counters, 'client')?>"  class="form-control"><label>Clients</label>
    </div>
    <div class="col-sm-2">
        <input type="number" name="option[sections][counter][project]" value="<?=get_option_value($counters, 'project')?>"  class="form-control"><label>Projects</label>
    </div>
    <div class="col-sm-2">
        <input type="number" name="option[sections][counter][support]" value="<?=get_option_value($counters, 'support')?>"  class="form-control"><label>Hours Of Support

</label>
    </div>
    <div class="col-sm-2">
        <input type="number" name="option[sections][counter][worker]" value="<?=get_option_value($counters, 'worker')?>"  class="form-control"><label>Hard Workers

</label>
    </div>
</div>
