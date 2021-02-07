<?php
if(!function_exists('techie_url')){
	function techie_url($file=''){
		return '/'.rtrim(config('shop.client.html.common.baseurl', 'packages/swordbros/shop/themes/techie'), '/').'/'.ltrim($file, '/').'?_v=1.7';	
	}
}

if(!function_exists('techie_get_language')){
	function techie_get_language(){
		return \Request::input('locale', 'ru');
	}
}

if(!function_exists('techie_is_home')){
	function techie_is_home(){
		return \Request::route()->getName()=='aimeos_home';
	}
}

if(!function_exists('techie_widget')){
	function techie_widget($file=''){
		return \Aimeos\Shop\Facades\Shop::get('swordbros/techie/widget')->getBody($file);
	}
}

if(!function_exists('techie_header')){
	function techie_header(){
		return \Aimeos\Shop\Facades\Shop::get('locale/select')->getBody();
	}
}

if(!function_exists('techie_footer')){
	function techie_footer(){
		return \Aimeos\Shop\Facades\Shop::get('swordbros/techie/footer')->getBody();
	}
}

if(!function_exists('get_username')){
	function get_username(){
		return \Auth::user()->name;
	}
}

if(!function_exists('techie_catalog_filter')){
	function techie_catalog_filter(){
		return \Aimeos\Shop\Facades\Shop::get('catalog/filter')->getBody();
	}
}

if(!function_exists('techie_products')){
	function techie_products($product_type='', $items=[]){
		$ctx = \Aimeos\Shop\Facades\Shop::get('swordbros/techie/widget')->getContext();
		$query = \Aimeos\Controller\Frontend::create( $ctx, 'product' )
			->uses( ['media', 'price', 'text'] );
        if($product_type)  $query->compare( '==', 'product.type', $product_type );
        if($items)  $query->compare( '==', 'product.id', $items );
		return($query->search());
	}
}

if(!function_exists('techie_top_products')){
	function techie_top_products(){
		$ctx = \Aimeos\Shop\Facades\Shop::get('swordbros/techie/widget')->getContext();
		$products = \Aimeos\Controller\Frontend::create( $ctx, 'product' )
			->uses( ['media', 'price', 'text'] )
			->search();
		return($products);
	}
}

if(!function_exists('techie_new_products')){
	function techie_new_products(){
		$ctx = \Aimeos\Shop\Facades\Shop::get('swordbros/techie/widget')->getContext();
		$products = \Aimeos\Controller\Frontend::create( $ctx, 'product' )
			->uses( ['media', 'price', 'text'] )
			->search();
		return($products);
	}
}
// ADMIN
if(!function_exists('techie_load_options')){
	function techie_load_options(){
		$options = [];
		$ctx = \Aimeos\Shop\Facades\Shop::get('swordbros/techie/widget')->getContext();
		$ctl = new \Aimeos\Admin\JQAdm\Swordbros\Techie\Standard($ctx);
		if($ctl){
			$locale = $ctx->getLocale();
			$options =$ctl->searchData();  
			$options['selectLanguageId'] = $locale->getLanguageId();
			$options['selectLanguageId'] = $locale->getCurrencyId();
		} else {
			$options['selectLanguageId'] =  \Request::input('locale', 'ru');
			$options['selectLanguageId'] =  \Request::input('locale', 'ru');
		}
        request()->session()->put('techie_options', $options);
        if(!defined('LOAD_TECHIE'))define('LOAD_TECHIE', true);
        return [];
	}
}

if(!function_exists('techie_option')){
	function techie_option($key, $lang=false){
        if(!defined('LOAD_TECHIE')) techie_load_options();
		$data = request()->session()->get('techie_options', []);
		return get_option_value($data, $key, $lang);  
	}
}

if(!function_exists('techie_options')){
	function techie_options($key, $lang=false){
        if(!defined('LOAD_TECHIE')) techie_load_options();
		$data = request()->session()->get('techie_options', []);
		return get_option_value($data, $key, $lang, true);  
	}
}

if(!function_exists('get_option_value')){
	function get_option_value($data, $key, $lang=false, $array=false){
		if(empty($lang)) $lang = \Request::input('locale', 'ru');
		if(isset($data[$key])){
			if($lang && isset($data[$key][$lang])){
				return $data[$key][$lang];
			} else if(!is_array($data[$key])){
                return $data[$key];
			} else{
                if($array){
                    return $data[$key];
                }
            }
		}
		return null;
	}
}

if(!function_exists('is_selected')){
	function is_selected($data, $key, $value){
		if(isset($data[$key]) ){
			if($data[$key]==$value){
				return "selected checked";
			} 
		}
		return "";
	}
}

if(!function_exists('is_checked')){
	function is_checked($data, $key){

		if(isset($data[$key])){
			if($data[$key]){
				return "checked";
			} 
		}
		return "";
	}
}

if(!function_exists('techie_sections')){
	function techie_sections($context, $params=[]){
        $result = [];
        $query = DB::table('sw_post_type')->orderByRaw('pos=0')->orderBy('pos', 'asc');
        if(isset($params['status']) && !empty($params['status'])){
            $query->where('status', $params['status']);
        }
        $rows = json_decode(json_encode($query->get()->all()), 1) ;
        if($rows){
            foreach($rows as $row){
                if($row['code']=='default') continue;
                $row['label'] = $context->translate( 'client', $row['label'] );
                $result[$row['code']] = $row;
            }
            $result['started'] = ['label'=>$context->translate( 'client', 'Started')];
        }
		return $result;
	}
}

if(!function_exists('techie_admin_bar')){
	function techie_admin_bar($context){
		echo '<span style="color:#FFF">'.get_username().' <a href="/" target="_blank">Front Page</a></span>';
	}
}
