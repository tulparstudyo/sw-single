<?php $faqs = isset($sections['faq'])?$sections['faq']:[] ;?>
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help">
        <?=$this->translate('admin', 'Select a Post for Content')?>
    </label>
    <div class="col-sm-8">
        <select name="option[sections][faq][content]" class="form-control custom-select item-type">
            <option value="">
            <?=$this->translate('admin', 'Select a Post')?>
            </option>
            <?php foreach(sw_get_posts(['type'=>'faq']) as $faq) {?>
            <option <?=is_selected($faqs, 'content', $faq['id'])?> value="<?=$faq['id']?>">
            <?=$faq['label']?>
            </option>
            <?php }?>
        </select>
    </div>
</div>
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help"><?=$this->translate('admin', 'Select Posts')?></label>
    <div class="col-sm-8">
        <ul class="jqtree-tree">
    <?php foreach(sw_get_posts(['type'=>'faq']) as $faq) { if($faq['id']==get_option_value($faqs, 'content')) continue; ?>
        <li><label class="item-label"><input type="checkbox"  name="option[sections][faq][item][<?=$faq['id']?>]" <?=is_checked(get_option_value($faqs, 'item', 0, 1), $faq['id'])?> value="<?=$faq['id']?>"> <?=$faq['label']?></label></li>
    <?php }?>
        </ul>
    </div>
</div>