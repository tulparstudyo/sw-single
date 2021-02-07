<?php $contacts = isset($sections['contact'])?$sections['contact']:[] ;?> 
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help">
        <?=$this->translate('admin', 'Select a Post for Content')?>
    </label>
    <div class="col-sm-8">
        <select name="option[sections][contact][content]" class="form-control custom-select item-type">
            <option value="">
            <?=$this->translate('admin', 'Select a Post')?>
            </option>
            <?php foreach(sw_get_posts(['type'=>'contact']) as $contact) {?>
            <option <?=is_selected($contacts, 'content', $contact['id'])?> value="<?=$contact['id']?>">
            <?=$contact['label']?>
            </option>
            <?php }?>
        </select>
    </div>
</div>
