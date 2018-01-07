<?php
/*
    SEO
1.for category page
    ●description
    ●keyword
2.for tag page
    ●keyword
    ●description
3.meta_description
4.title
5.image
    ●yes_image
    ●no_image
    ●meta_image
    ●wkwkrnht_eyecatch
6.check account Twitter
*/


function get_meta_description_from_category(){
    $cat_desc = category_description();
    if(is_string($cat_desc)){
        return trim(strip_tags($cat_desc));
    }else{
        return '「' . single_cat_title('',false) . '」の記事一覧です。' . get_bloginfo('description');
    }
}
function get_meta_keyword_from_category(){
    return single_cat_title('',false) . ',カテゴリー,ブログ,記事一覧';
}


function get_meta_keyword_from_tag(){
    return single_tag_title('',false) . ',タグ,ブログ,記事一覧';
}
function get_meta_description_from_tag(){
    $tag_desc = tag_description();
    if(is_string($tag_desc)){
        return trim(strip_tags($tag_desc));
    }else{
        return '「' . single_tag_title('',false) . '」の記事一覧です。' . get_bloginfo('description');
    }
}


function get_meta_description(){
    if(is_singular()===true && has_excerpt()===true){
        return get_the_excerpt();
    }elseif(is_category()===true){
        return get_meta_description_from_category();
    }elseif(is_tag()===true){
        return get_meta_description_from_tag();
    }else{
        return get_bloginfo('description');
    }
}
function meta_description(){
    echo get_meta_description();
}


function wkwkrnht_title($title){
    if(empty($title)===true&&(is_home()===true||is_front_page()===true)){
        $title = bloginfo('name');
    }
    return $title;
}
add_filter('wp_title','wkwkrnht_title');


function get_yes_image($size){
    $img = wp_get_attachment_image_src(get_post_thumbnail_id(),$size);
    return $img[0];
}
function yes_image($size){
    echo get_yes_image($size);
}
function get_no_image($size){
    $uri = get_template_directory_uri() . '/inc/no-image/no-image_';
    switch($size){
        case 'wkwkrnht-thumb-160-crop':
            $src = $uri . '160x160.png';
            break;
        case 'wkwkrnht-thumb-240-crop':
            $src = $uri . '240x240.png';
            break;
        case 'wkwkrnht-thumb-320-crop':
            $src = $uri . '320x320.png';
            break;
        case 'wkwkrnht-thumb-480-crop':
            $src = $uri . '480x480.png';
            break;
        case 'wkwkrnht-thumb-560-crop':
            $src = $uri . '560x560.png';
            break;
        case 'wkwkrnht-thumb-640-crop':
            $src = $uri . '640x640.png';
            break;
        case 'wkwkrnht-thumb-720-crop':
            $src = $uri . '720x720.png';
            break;
        case 'wkwkrnht-thumb-800-crop':
            $src = $uri . '800x800.png';
            break;
        case 'wkwkrnht-thumb-1024-crop':
            $src = $uri . '1024x1024.png';
            break;
        case 'wkwkrnht-thumb-1280-crop':
            $src = $uri . '1280x1280.png';
            break;
        case 'wkwkrnht-thumb-1366-crop':
            $src = $uri . '1366x1366.png';
            break;
        case 'wkwkrnht-thumb-1600-crop':
            $src = $uri . '1600x1600.png';
            break;
        case 'wkwkrnht-thumb-1920-crop':
            $src = $uri . '1920x1920.png';
            break;
        case 'wkwkrnht-thumb-2560-crop':
            $src = $uri . '2560x2560.png';
            break;
        case array(1024,1024):
            $src = $uri . '1024x1024.png';
            break;
        case array(512,512):
            $src = $uri . '512x512.png';
            break;
        case array(256,256):
            $src = $uri . '256x256.png';
            break;
        case array(128,128):
            $src = $uri . '128x128.png';
            break;
        default:
            $src = $uri . 'full.png';
    }
    return $src;
}
function no_image($size){
    echo get_no_image($size);
}
function get_meta_image(){
    $size = 'wkwkrnht-thumb-480-crop';
    if(is_singular()===true && has_post_thumbnail()===true){
        return get_yes_image($size);
    }elseif(has_custom_logo()===true){
        $logo = get_theme_mod('custom_logo');
        return wp_get_attachment_url($logo);
    }else{
        return get_no_image($size);
    }
}
function meta_image(){
    echo get_meta_image();
}
function get_wkwkrnht_eyecatch($size){
    if(has_post_thumbnail()===true){
        return get_yes_image($size);
    }else{
        return get_no_image($size);
    }
}
function wkwkrnht_eyecatch($size){
    echo get_wkwkrnht_eyecatch($size);
}

function get_twitter_acount(){
    if(get_the_author_meta('twitter')!==''){
        return get_the_author_meta('twitter');
    }elseif(get_option('Twitter_URL')!==''){
        return get_option('Twitter_URL');
    }else{
        return null;
    }
}