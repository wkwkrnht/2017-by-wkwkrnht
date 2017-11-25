<?php
$is_amp         = is_amp();
$root_color     = get_option('root_color','#333');
$url_short_code = get_parent_theme_file_path('/css/short-code.php');
if($is_amp===false){
    include_once(get_parent_theme_file_path('/css/fontawesome.php'));
}
include_once(get_parent_theme_file_path('/css/initial.php'));
include_once(get_parent_theme_file_path('/css/nav.php'));
include_once(get_parent_theme_file_path('/css/widget.php'));
include_once(get_parent_theme_file_path('/css/menu.php'));
include_once(get_parent_theme_file_path('/css/card.php'));
if(is_singular()===true){
    $id      = url_to_postid(get_meta_url());
    $post    = get_post($id);
    $content = $post->post_content;
    if(has_class('ba-slider')===true){
        include_once($url_short_code);
    }else{
        global $shortcode_tags;
        foreach($shortcode_tags as $code_name => $function){
            $has_short_code = has_shortcode($content,$code_name);
            if($has_short_code===true){
                include_once($url_short_code);
                break;
            }
        }
    }
    include_once(get_parent_theme_file_path('/css/style-singular.php'));
    if($is_amp===true){
        include_once(get_parent_theme_file_path('/css/amp-style-singular.php'));
    }
}
include_once(get_parent_theme_file_path('/css/mediaqueri.php'));?>