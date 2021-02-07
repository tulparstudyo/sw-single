<?php $products = isset($sections['product'])?$sections['product']:[] ;?> 
<div class="form-group row ">
    <label class="col-sm-4 form-control-label"><?=$this->translate('admin', 'Select a Post for Content')?></label>
    <div class="col-sm-8">
    <select name="option[sections][product][content]" class="form-control custom-select item-type">
        <option value=""><?=$this->translate('admin', 'Select a Post')?></option>
        <?php foreach(sw_get_posts(['type'=>'singleproduct']) as $product) {?>
        <option <?=is_selected($products, 'content', $product['id'])?> value="<?=$product['id']?>"><?=$product['label']?></option>
        <?php }?>
    </select>
    </div>
</div>
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help"><?=$this->translate('admin', 'Select Products')?></label>
    <div class="col-sm-8">
        <ul class="jqtree-tree">
    <?php foreach(techie_products('singleproduct') as $product) {  ?>
<?php $url = $enc->attr( $this->url( 'aimeos_shop_jqadm_get', 'Jqadm', 'get', ['id' => $product->getId(), 'site'=>'default', 'resource'=>'product'], [], [] ) ); ?>
        <li><label class="item-label"><input type="checkbox"  name="option[sections][product][item][<?=$product->getId()?>]" <?=is_checked(get_option_value($products, 'item', 0, 1), $product->getId())?> value="<?=$product->getId()?>"> <a href="<?=$url?>" target="_blank"><?=$product->getLabel()?></a></label></li>
    <?php }?>
        </ul>
    </div>
</div>
