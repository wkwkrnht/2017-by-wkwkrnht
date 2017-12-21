<?php
/*
    setup
1.setup
    ●content width
    ●theme feature
    ●ADD img size
    ●ADD menu area
2.ADD editor-style
3.ADD oEmbed-API
4.widget
    ●ADD area
    ●ADD original widget
    ●do short code
    ●custom
        ●search
        ●meta
            ●REMOVE link for WordPress
            ●ADD link
        ●comment
5.script
6.ADD data-title to element on social-nav
7.ADD & DELETE class into body_class
8.list page settings for AMP
*/
function wkwkrnht_setup(){
    /*
    1.DEFINE content_width
    2.ADD theme support
    3.ADD taxonomy
    4.REGIST menu
    5.SET image sizes
    6.ADD oEmbed provider
    */

    $GLOBALS['content_width'] = 1080;

    add_theme_support('custom-header',array('default-image'=>'','random-default'=>false,'width'=>1280,'height'=>720,'flex-height'=>true,'flex-width'=>true,'default-text-color'=>'#fff','header-text'=>true,'uploads'=>true,'video'=>true,));
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5',array('comment-list','comment-form','search-form','gallery','caption'));
    add_theme_support('starter-content');
    add_theme_support('post-formats',array('aside','gallery','quote','image','link','status','video','audio','chat'));
    add_theme_support('post-thumbnails');
    add_theme_support('custom-background');
    add_theme_support('custom-logo',array('height'=>512,'width'=>512,'flex-height'=>true,'flex-width'=>true,));

    register_taxonomy_for_object_type('category','page');
    register_taxonomy_for_object_type('post_tag','page');
    register_taxonomy_for_object_type('category','attachment');
    register_taxonomy_for_object_type('post_tag','attachment');

    register_nav_menu('header','header');
    register_nav_menu('main','main');
    register_nav_menu('social','social');

    add_image_size('wkwkrnht-thumb-2560',2560,1440);
    add_image_size('wkwkrnht-thumb-1920',1920,1080);
    add_image_size('wkwkrnht-thumb-1366',1366,768);
    add_image_size('wkwkrnht-thumb-1280',1280,720);
    add_image_size('wkwkrnht-thumb-1024',1024,768);
    add_image_size('wkwkrnht-thumb-800',800,450);
    add_image_size('wkwkrnht-thumb-720',720,405);
    add_image_size('wkwkrnht-thumb-640',640,360);
    add_image_size('wkwkrnht-thumb-560',560,315);
    add_image_size('wkwkrnht-thumb-480',480,320);
    add_image_size('wkwkrnht-thumb-320',320,180);
    add_image_size('wkwkrnht-thumb-240',240,135);
    add_image_size('wkwkrnht-thumb-160',160,90);
    add_image_size('wkwkrnht-thumb-2560-crop',2560,2560,true);
    add_image_size('wkwkrnht-thumb-1920-crop',1920,1920,true);
    add_image_size('wkwkrnht-thumb-1600-crop',1600,1600,true);
    add_image_size('wkwkrnht-thumb-1366-crop',1366,1366,true);
    add_image_size('wkwkrnht-thumb-1280-crop',1280,1280,true);
    add_image_size('wkwkrnht-thumb-1024-crop',1024,1024,true);
    add_image_size('wkwkrnht-thumb-800-crop',800,800,true);
    add_image_size('wkwkrnht-thumb-720-crop',720,720,true);
    add_image_size('wkwkrnht-thumb-640-crop',640,640,true);
    add_image_size('wkwkrnht-thumb-560-crop',560,560,true);
    add_image_size('wkwkrnht-thumb-480-crop',480,480,true);
    add_image_size('wkwkrnht-thumb-320-crop',320,320,true);
    add_image_size('wkwkrnht-thumb-240-crop',240,240,true);
    add_image_size('wkwkrnht-thumb-160-crop',160,160,true);


}
add_action('after_setup_theme','wkwkrnht_setup');


function wkwkrnht_admin_init(){
    add_editor_style('inc/editor-style.php');
    require_once(get_template_directory() . '/inc/theme-update-checker.php');
    $example_update_checker = new ThemeUpdateChecker('2017-by-wkwkrnht','https://raw.githubusercontent.com/wkwkrnht/2017-by-wkwkrnht/master/update-info.json');
}
add_action('admin_init','wkwkrnht_admin_init');


function wkwkrnht_sidebars_init(){
    register_sidebar(array('name'=>'Main Area','id'=>'floatmenu','before_widget'=>'<li id="%1$s" class="widget %2$s" role="widget">','after_widget'=>'</li>','before_title'=>'<h2 class="widget-title">','after_title' =>'</h2>',));
    register_sidebar(array('name'=>'Singular Header','id'=>'singularheader','before_widget'=>'<li id="%1$s" class="widget %2$s" role="widget">','after_widget'=>'</li>','before_title'=>'<h2 class="widget-title">','after_title' =>'</h2>',));
    register_sidebar(array('name'=>'Singular Footer','id'=>'singularfooter','before_widget'=>'<li id="%1$s" class="widget %2$s" role="widget">','after_widget'=>'</li>','before_title'=>'<h2 class="widget-title">','after_title' =>'</h2>',));
    register_sidebar(array('name'=>'List Above','id'=>'listabove','before_widget'=>'<aside id="%1$s" class="widget card info-card %2$s" role="widget">','after_widget'=>'</aside>','before_title'=>'<h2 class="widget-title">','after_title' =>'</h2>',));
    register_sidebar(array('name'=>'List Header','id'=>'listheader','before_widget'=>'<section class="card" role="widget"><div id="%1$s" class="widget %2$s">','after_widget'=>'</div></section>','before_title'=>'<h2 class="widget-title">','after_title' =>'</h2>',));
    register_sidebar(array('name'=>'List Footer','id'=>'listfooter','before_widget'=>'<section class="card" role="widget"><div id="%1$s" class="widget %2$s">','after_widget'=>'</div></section>','before_title'=>'<h2 class="widget-title">','after_title' =>'</h2>',));
    register_sidebar(array('name'=>'List Under','id'=>'listunder','before_widget'=>'<aside id="%1$s" class="widget card info-card %2$s" role="widget">','after_widget'=>'</aside>','before_title'=>'<h2 class="widget-title">','after_title' =>'</h2>',));
    register_sidebar(array('name'=>'404 Page','id'=>'404','before_widget'=>'<section class="card"><div id="%1$s" class="widget %2$s" role="widget">','after_widget'=>'</div></section>','before_title'=>'<h2 class="widget-title">','after_title' =>'</h2>',));
}
add_action('widgets_init','wkwkrnht_sidebars_init');


function wkwkrnht_init(){
    if(get_option('jetpack_open_graph')===true){
        add_filter('jetpack_enable_open_graph','__return_false',99);
    }
    if(get_option('jetpack.css')===true){
        add_filter('jetpack_implode_frontend_css','__return_false');
    }
    if(get_option('simple_payments')===true){
        add_action('wp_print_styles',function(){wp_deregister_style('simple-payments');});
    }
}
add_action('init','wkwkrnht_init');