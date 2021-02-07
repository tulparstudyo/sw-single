<?php $started = isset($sections['started'])?$sections['started']:[] ;?>
<div class="form-group row ">
    <label class="col-sm-4 form-control-label help"><?=$this->translate('admin', 'Link')?></label>
    <div class="col-sm-8">
        <input type="text" name="option[sections][started][link]" value="<?=get_option_value($started, 'link')?>"  class="form-control">
    </div>
</div>
