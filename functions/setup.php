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

    add_image_size('wkwkrnht-thumb',2560,1440);
    add_image_size('wkwkrnht-thumb-1920',1920,1080);
    add_image_size('wkwkrnht-thumb-1344',1344,576);
    add_image_size('wkwkrnht-thumb-1270',1270,720);
    add_image_size('wkwkrnht-thumb-1024',1024,1024);
    add_image_size('wkwkrnht-thumb-800',800,800,true);
    add_image_size('wkwkrnht-thumb-512',512,512,true);
    add_image_size('wkwkrnht-thumb-256',256,256,true);
    add_image_size('wkwkrnht-thumb-128',128,128,true);

    wp_oembed_add_provider('#https?://(www.)?youtube.com/watch.*#i','http://www.youtube.com/oembed/',true);
	wp_oembed_add_provider('#https?://(www.)?youtube.com/playlist.*#i','http://www.youtube.com/oembed/',true);
	wp_oembed_add_provider('#https?://(www.)?youtu.be/.*#i','http://www.youtube.com/oembed/',true);
    wp_oembed_add_provider('#https?://(www\.)?twitter\.com/.+?/status(es)?/.*#i','https://api.twitter.com/1/statuses/oembed',true);
    wp_oembed_add_provider('#https?://(www.)?instagram.com/p/.*#i','http://api.instagram.com/oembed',true);
    wp_oembed_add_provider('#https?://(www.)?instagr.am/p/.*#i','http://api.instagram.com/oembed',true);
    wp_oembed_add_provider('http://*.hatenablog.com/*','http://hatenablog-parts.com/embed?url=');
    wp_oembed_add_provider('http://codepen.io/*/pen/*','http://codepen.io/api/oembed');
    wp_oembed_add_provider('#https?://(www.)?ifttt.com/recipes/.*#i','http://www.ifttt.com/oembed/',true);
    wp_oembed_add_provider('http://www.kickstarter.com/projects/*','http://www.kickstarter.com/services/oembed',false);
    wp_oembed_add_provider('#https?://(www.)?cloudup.com/.*#i','https://cloudup.com/oembed/',true);
    wp_oembed_add_provider('#https?://(www.)?playbuzz.com/.*#i','https://www.playbuzz.com/api/oembed/',true);
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


function wkwkrnht_init(){\
    if(get_option('jetpack.css')){
        add_filter('jetpack_implode_frontend_css','__return_false');
    }
    if(get_option('jetpack_open_graph')){
        add_filter('jetpack_enable_open_graph','__return_false',99);
    }
}
add_action('init','wkwkrnht_init');