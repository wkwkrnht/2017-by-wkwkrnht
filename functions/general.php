<?php
/*
    general
1.ADD iquery
2.DELETE emoji
3.DELETE hash from URL
4.SANITIZE resource tag
5.ADD body class
6.REMOVE author ID from comment's class
7.FILLTER content
    ●ADD alt=""
    ●linked @hogehoge to Twitter
    ●ADD rel="noopener"(if it have target="_blank")
8.description filltered by the_content
9.ADD feed for smartnews
10.SETTING for amp list
*/
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
    return preg_replace(array("/'/",'/ \/>/'),array('"','>'),$tag);
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

function wkwkrnht_replace($content){
    $content = str_replace(']]>',']]&gt;',$content);
    $content = preg_replace_callback('#(<code.*?>)(.*?)(</code>)#imsu',function($match){return $match[1] . esc_html($match[2]) . $match[3];},$content);
    $content = preg_replace('/<img((?![^>]*alt=)[^>]*)>/i','<img alt=""${1}>',$content);
    $content = preg_replace('/<a href="(.*?)" target="_blank"/',"<a href=\"$1\" target=\"_blank\" rel=\"noopener\"",$content);
    $content = preg_replace('/([^a-zA-Z0-9-_&])@([0-9a-zA-Z_]+)/',"$1<a href=\"http://twitter.com/$2\" target=\"_blank\" rel=\"noopener nofollow\">@$2</a>",$content);
    if(is_amp()===true){$content = sanitize_for_amp($content);}
    return $content;
}
add_filter('the_content','wkwkrnht_replace');
add_filter('comment_text','wkwkrnht_replace');

add_filter('term_description',function($term){if(empty($term)){return false;}return apply_filters('the_content',$term);});

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