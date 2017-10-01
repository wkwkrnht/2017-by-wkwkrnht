<?php
$size_full = array(2560,1440);
$size_128  = array(128,128);
$size_256  = array(256,256);
$size_512  = array(512,512);
$size_800  = array(800,800);
$size_1024 = array(1024,1024);
$size_1270 = array(1270,720);
$size_1344 = array(1344,576);
$size_1920 = array(1920,1080);
if(is_amp()===true):
	require_once(get_template_directory() . '/amp/template.php');
else:
    get_header();
    if(is_singular()===true):
		require_once(get_template_directory() . '/content/inner-single.php');
	else:
        require_once(get_template_directory() . '/content/inner-list.php');
    endif;
    get_footer();
endif;?>