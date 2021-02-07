<?php
/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2020
 */
$enc = $this->encoder();
$pos = 0;
$sections =  techie_options('show_section');
foreach($sections as $section_code=>$section_show){
    if($section_show) echo $this->partial( $this->config( 'client/html/catalog/home/section', 'catalog/home/section_'.$section_code ), array('sections'=>techie_options('sections')) );   
 }
?>