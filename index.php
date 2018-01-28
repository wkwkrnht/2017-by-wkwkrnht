<?php
if(is_amp()===true){
	require_once(get_template_directory() . '/amp/template.php');
}else{
	get_header();
    if(is_singular()===true){
		require_once(get_template_directory() . '/content/inner-singular.php');
	}else{
		require_once(get_template_directory() . '/content/inner-list.php');
	}
    get_footer();
}?>