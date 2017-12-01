<?php
$size_160       = array(160,90);
$size_160_crop  = array(160,160);
$size_240       = array(240,135);
$size_240_crop  = array(240,240);
$size_320       = array(320,180);
$size_320_crop  = array(320,320);
$size_480       = array(480,320);
$size_480_crop  = array(480,480);
$size_560       = array(560,315);
$size_560_crop  = array(560,560);
$size_640       = array(640,360);
$size_640_crop  = array(640,640);
$size_720       = array(720,405);
$size_720_crop  = array(720,720);
$size_800       = array(800,450);
$size_800_crop  = array(800,800);
$size_1024      = array(1024,768);
$size_1024_crop = array(1024,1024);
$size_1280      = array(1280,720);
$size_1280_crop = array(1280,1280);
$size_1366      = array(1366,768);
$size_1366_crop = array(1366,1366);
$size_1600      = array(1600,900);
$size_1600_crop = array(1600,1600);
$size_1920      = array(1920,1080);
$size_1920_crop = array(1920,1920);
$size_2560      = array(2560,1440);
$size_2560_crop = array(2560,2560);
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