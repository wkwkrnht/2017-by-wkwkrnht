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
8.CUSTOM oEmbed
    ●Twitter
9.description filltered by the_content
10.upload to cloudinary
*/
add_filter('rest_post_collection_params','my_prefix_change_post_per_page',10,1);
function my_prefix_change_post_per_page($params){
    if(isset($params['per_page'])){
        $params['per_page']['maximum'] = 99999999999999999;
    }
    return $params;
}
add_filter('rest_endpoints','my_prefix_change_tag_per_page');
function my_prefix_change_tag_per_page($endpoints){
    if(isset($endpoints['/wp/v2/tags'][0]['args']['per_page']['maximum'])){
        $endpoints['/wp/v2/tags'][0]['args']['per_page']['maximum'] = 99999999999999999;
    }
    return $endpoints;
}

remove_action('wp_head','print_emoji_detection_script',7);
remove_action('wp_print_styles','print_emoji_styles');

function vc_remove_wp_ver_asset($src){
    if(strpos($src,'ver=')){
        $src = remove_query_arg('ver',$src);
    }
    return $src;
}
add_filter('style_loader_src','vc_remove_wp_ver_asset',9999);
add_filter('script_loader_src','vc_remove_wp_ver_asset',9999);

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
    $content = preg_replace('/border=".*?"/','',$content);
    $content = preg_replace('/frameborder=".*?"/','',$content);
    $content = preg_replace('/marginwidth=".*?"/i','',$content);
    $content = preg_replace('/marginheight=".*?"/i','',$content);
    $content = preg_replace_callback('#(<code.*?>)(.*?)(</code>)#imsu',function($match){return $match[1] . esc_html($match[2]) . $match[3];},$content);
    $content = preg_replace('/<img((?![^>]*alt=)[^>]*)>/i','<img alt=""${1}>',$content);
    $content = preg_replace('/<a href="(.*?)" target="_blank"/',"<a href=\"$1\" target=\"_blank\" rel=\"noopener\"",$content);
    $content = preg_replace('/([^a-zA-Z0-9-_&])@([0-9a-zA-Z_]+)/',"$1<a href=\"http://twitter.com/$2\" target=\"_blank\" rel=\"noopener nofollow\">@$2</a>",$content);
    if(is_amp()===true){
        $content = sanitize_for_amp($content);
    }
    return $content;
}
add_filter('the_content','wkwkrnht_replace');
add_filter('comment_text','wkwkrnht_replace');

function custom_oembed_element($html){
    if(strpos($html,'twitter.com')!==false || strpos($html,'mobile.twitter.com')!==false){
        $html = preg_replace('/ class="(.*?)\d+"/','class="$1" align="center"',$html);
        return $html;
    }
    return $html;
}
add_filter('embed_handler_html','custom_oembed_element');
add_filter('embed_oembed_html','custom_oembed_element');
wp_embed_register_handler('gist','/https?:\/\/gist\.github\.com\/([a-z0-9]+)\/([a-z0-9]+)(#file=.*)?/i','wp_embed_register_handler_for_gist');
function wp_embed_register_handler_for_gist($matches,$attr,$url,$rawattr){
    $embed = sprintf('<script src="https://gist.github.com/%1$s/%2$s.js"></script>',esc_attr($matches[1]),esc_attr($matches[2]));
    return apply_filters('embed_gist',$embed,$matches,$attr,$url,$rawattr);
}

add_filter('term_description','wkwkrnht_term_description');
function wkwkrnht_term_description($term){
    if(empty($term)===true){
        return false;
    }
    return apply_filters('the_content',$term);
}

add_action('pre_get_posts','wkwkrnht_pre_get_posts');
function wkwkrnht_pre_get_posts($query){
    if(is_admin()===true){
        return $query;
    }
    if($query->is_main_query()===true){
        if($query->is_feed('gunosy')===true || $query->is_feed('smartnews')===true){
            $query->set('post_type',['post','any']);
            $query->set('post_status',['publish','trash']);
        }
    }
    return $query;
}