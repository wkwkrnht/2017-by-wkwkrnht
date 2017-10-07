<?php
add_action('wp_enqueue_scripts',function(){wp_enqueue_script('jquery');});
remove_action('wp_head','print_emoji_detection_script',7);
remove_action('wp_print_styles','print_emoji_styles');
function vc_remove_wp_ver_css_js($src){
    if(strpos($src,'ver=')){
        $src = remove_query_arg('ver',$src);
    }
    return $src;
}
add_filter('style_loader_src','vc_remove_wp_ver_css_js',9999);
add_filter('script_loader_src','vc_remove_wp_ver_css_js',9999);
function replace_link_stylesheet_tag($tag){
    return preg_replace(array("/'/",'/(id|type|media)=".+?" */','/ \/>/'),array('"','','>'),$tag);
}
add_filter('style_loader_tag','replace_link_stylesheet_tag');
function replace_script_tag($tag){
	return preg_replace(array("/'/",'/ type=\"text\/javascript\"/'),array('"',''),$tag);
}
add_filter('script_loader_tag','replace_script_tag');

add_filter('body_class','add_body_class');
function add_body_class($classes){
    $classes = preg_grep('/\Aauthor\-.+\z/i',$classes,PREG_GREP_INVERT);
    if(is_singular()===true){
        global $post;
        foreach((get_the_category($post->ID)) as $category){$classes[] = 'categoryid-' . $category->cat_ID;}
    }
    return $classes;
}
function themeslug_comment_class($classes){
	return preg_grep('/\comment\-author\-.+\z/i',$classes,PREG_GREP_INVERT);
}
add_action('comment_class','themeslug_comment_class');

add_action('do_feed_smartnews','do_feed_smartnews');
function do_feed_smartnews(){
    require(get_template_directory() . '/inc/smartnews.php');
}

add_filter('post_limits','amp_limits');
function amp_limits($limits){
    global $gloss_category;
    if(is_amp()===true){
        return'';
    }
    return $limits;
}