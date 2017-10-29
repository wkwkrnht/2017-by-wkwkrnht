<?php
function nav_menu_with_markup($output){
	return preg_replace('/(<li>)/','<li itemprop="name" class="menu-item">',$output);
}
add_filter('walker_nav_menu_start_el','nav_menu_with_markup',10,4);
function exted_meta_for_url($atts,$item,$args){
    $atts['itemprop']   = 'url';
    $atts['tabindex']   = '0';
    $atts['data-title'] = esc_attr($item->title);
	return $atts;
}
add_filter('nav_menu_link_attributes','exted_meta_for_url',10,5);
/*function my_nav_menu_item_title($title,$item,$args,$depth){
	$theme_location = $args->theme_location;
    if($theme_location==='social'){
        $title = '';
    }
    return $title;
}
add_filter('nav_menu_item_title','social_menu_item_title');*/