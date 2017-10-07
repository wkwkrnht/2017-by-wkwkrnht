<?php
/*
    SEO
3.for category page
    ●description
    ●keyword
4.for tag page
    ●keyword
    ●description
5.meta_description
6.image
    ●yes_image
    ●no_image
    ●meta_image
    ●wkwkrnht_eyecatch
7.check account Twitter
*/


function get_meta_description_from_category(){
    $cat_desc=trim(strip_tags(category_description()));
    if($cat_desc){return $cat_desc;}
    $cat_desc='「' . single_cat_title('',false) . '」の記事一覧です。' . get_bloginfo('description');
    return $cat_desc;
}
function get_meta_keyword_from_category(){
    return single_cat_title('',false) . ',カテゴリー,ブログ,記事一覧';
}

function get_meta_keyword_from_tag(){
    return single_tag_title('',false) . ',タグ,ブログ,記事一覧';
}
function get_meta_description_from_tag(){
    $tag_desc=trim(strip_tags(tag_description()));
    if($tag_desc){return $tag_desc;}
    $tag_desc='「' . single_tag_title('',false) . '」の記事一覧です。' . get_bloginfo('description');
    return $tag_desc;
}

add_filter('wp_title',function($title){if(empty($title)&&(is_home()||is_front_page())){$title = bloginfo('name');}return $title;});

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

function get_yes_image($size){
    $img = wp_get_attachment_image_src(get_post_thumbnail_id(),$size);
    return $img[0];
}
function yes_image($size){
    echo get_yes_image($size);
}
function get_no_image($size){
    $uri = get_template_directory_uri() . '/inc/no-image/no-image_';
    if($size===array(1024,1024)){
        $src = $uri . '1024x1024.png';
    }elseif($size===array(512,512)){
        $src = $uri . '512x512.png';
    }elseif($size===array(256,256)){
        $src = $uri . '256x256.png';
    }elseif($size===array(128,128)){
        $src = $uri . '128x128.png';
    }else{
        $src = $uri . 'full.png';
    }
    return $src;
}
function no_image($size){
    echo get_no_image($size);
}
function get_meta_image(){
    $size = array(512,512);
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