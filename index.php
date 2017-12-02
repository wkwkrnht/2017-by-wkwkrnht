<?php
$size_160       = array(160,90);
$size_160_crop  = 'wkwkrnht-thumb-160-crop';
$size_240       = array(240,135);
$size_240_crop  = 'wkwkrnht-thumb-240-crop';
$size_320       = array(320,180);
$size_320_crop  = 'wkwkrnht-thumb-320-crop';
$size_480       = array(480,320);
$size_480_crop  = 'wkwkrnht-thumb-480-crop';
$size_560       = array(560,315);
$size_560_crop  = 'wkwkrnht-thumb-560-crop';
$size_640       = array(640,360);
$size_640_crop  = 'wkwkrnht-thumb-640-crop';
$size_720       = array(720,405);
$size_720_crop  = 'wkwkrnht-thumb-720-crop';
$size_800       = array(800,450);
$size_800_crop  = 'wkwkrnht-thumb-800-crop';
$size_1024      = array(1024,768);
$size_1024_crop = 'wkwkrnht-thumb-1024-crop';
$size_1280      = array(1280,720);
$size_1280_crop = 'wkwkrnht-thumb-1280-crop';
$size_1366      = array(1366,768);
$size_1366_crop = 'wkwkrnht-thumb-1366-crop';
$size_1600      = array(1600,900);
$size_1600_crop = 'wkwkrnht-thumb-1600-crop';
$size_1920      = array(1920,1080);
$size_1920_crop = 'wkwkrnht-thumb-1920-crop';
$size_2560      = array(2560,1440);
$size_2560_crop = 'wkwkrnht-thumb-2560-crop';
if(is_amp()===true){
	require_once(get_template_directory() . '/amp/template.php');
}else{
	get_header();
    if(is_singular()===true){
		require_once(get_template_directory() . '/content/inner-single.php');
	}else{
		require_once(get_template_directory() . '/content/inner-list.php');
	}
    get_footer();
}?>