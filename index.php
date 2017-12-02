<?php
$size_160       = 'wkwkrnht-thumb-160';
$size_160_crop  = 'wkwkrnht-thumb-160-crop';
$size_240       = 'wkwkrnht-thumb-240';
$size_240_crop  = 'wkwkrnht-thumb-240-crop';
$size_320       = 'wkwkrnht-thumb-320';
$size_320_crop  = 'wkwkrnht-thumb-320-crop';
$size_480       = 'wkwkrnht-thumb-480';
$size_480_crop  = 'wkwkrnht-thumb-480-crop';
$size_560       = 'wkwkrnht-thumb-560';
$size_560_crop  = 'wkwkrnht-thumb-560-crop';
$size_640       = 'wkwkrnht-thumb-640';
$size_640_crop  = 'wkwkrnht-thumb-640-crop';
$size_720       = 'wkwkrnht-thumb-720';
$size_720_crop  = 'wkwkrnht-thumb-720-crop';
$size_800       = 'wkwkrnht-thumb-800';
$size_800_crop  = 'wkwkrnht-thumb-800-crop';
$size_1024      = 'wkwkrnht-thumb-1024';
$size_1024_crop = 'wkwkrnht-thumb-1024-crop';
$size_1280      = 'wkwkrnht-thumb-1280';
$size_1280_crop = 'wkwkrnht-thumb-1280-crop';
$size_1366      = 'wkwkrnht-thumb-1366';
$size_1366_crop = 'wkwkrnht-thumb-1366-crop';
$size_1600      = 'wkwkrnht-thumb-1600';
$size_1600_crop = 'wkwkrnht-thumb-1600-crop';
$size_1920      = 'wkwkrnht-thumb-1920';
$size_1920_crop = 'wkwkrnht-thumb-1920-crop';
$size_2560      = 'wkwkrnht-thumb-2560';
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