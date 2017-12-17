<?php
$i            = 1;
$img          = ' src="' . get_no_image('') . '"';
$google_meta  = get_option('Google_Webmaster');
$bing         = get_option('Bing_Webmaster');
$pin          = get_option('Pinterest');
$is_amp       = is_amp();
$is_home      = is_home();
$theme_uri    = get_template_directory_uri();
$site_url     = site_url();
$home_url     = esc_url(home_url());
$meta_url     = get_meta_url();
$meta_img     = get_meta_image();
$blog_name    = get_bloginfo('name');
$description  = get_meta_description();
$URLbar_color = get_option('GoogleChrome_URLbar');
if($google_meta!==''){
    echo'<meta name="google-site-verification" content="' . $google_meta . '">';
}
if($bing!==''){
    echo'<meta name="msvalidate.01" content="' . $bing . '">';
}
if($pin!==''){
    echo'<meta name="p:domain_verify" content="' . $pin . '">';
}?>
<meta name="referrer" content="<?php echo get_theme_mod('referrer_setting','default');?>">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="renderer" content="webkit">
<meta name="description" content="<?php echo $description;?>">
<meta name="theme-color" content="<?php echo $URLbar_color;?>">
<meta name="msapplication-TileColor" content="<?php echo $URLbar_color;?>">
<meta property="og:type" content="article">
<?php if($is_home===true):?>
    <meta property="og:title" content="<?php echo $blog_name;?>">
<?php else:?>
    <meta property="og:title" content="<?php wp_title('｜',true,'right');echo $blog_name;?>">
<?php endif;?>
<meta property="og:url" content="<?php echo $meta_url;?>">
<meta property="og:description" content="<?php echo $description;?>">
<meta property="og:site_name" content="<?php echo $blog_name;?>">
<meta property="og:image" content="<?php echo $meta_img;?>">
<meta name="twitter:card" content="summary">
<meta name="twitter:domain" content="<?php echo $_SERVER['SERVER_NAME'];?>">
<meta name="twitter:title" content="<?php wp_title('');?>">
<meta name="twitter:description" content="<?php echo $description;?>">
<meta name="twitter:image" content="<?php echo $meta_img;?>">
<meta name="twitter:site" content="@<?php echo get_option('Twitter_URL');?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url');?>">
<?php if($is_amp===false):?>
    <link rel="fluid-icon" href="<?php echo $meta_img;?>" title="<?php echo $blog_name;?>">
    <link rel="image_src" href="<?php echo $meta_img;?>" url="<?php echo $meta_img;?>" height="256" width="256">
    <?php if(get_option('x_domain_ad_preload')===true):?>
        <link rel="preload" as="script" href="//ad.xdomain.ne.jp/js/server-wp.js">
    <?php endif;?>
    <?php if(get_post_format()==='link'):?>
        <link rel="preload" as="script" href="//cdn.embedly.com/widgets/platform.js">
    <?php endif;?>
    <link rel="preload" as="script" href="//www.google-analytics.com/analytics.js">
    <link rel="preload" as="script" href="<?php echo $theme_uri;?>/inc/js/script.php">
    <link rel="preload" as="font" href="<?php echo $theme_uri;?>/inc/font-awesome/fontawesome-webfont.woff2" crossorigin>
	<link rel="preload" as="font" href="<?php echo $theme_uri;?>/inc/font-awesome/fontawesome-webfont.woff" crossorigin>
    <link rel="amphtml" href="<?php echo $meta_url;?>?amp=1">
<?php endif;
if(is_singular()===true):
    $google_id  = get_the_author_meta('GoogleID');
    $fb         = get_the_author_meta('facebook');
    $tw         = get_the_author_meta('twitter');
    $logo       = get_theme_mod('custom_logo');
    $author_id  = $post->post_author;
    if($google_id!==''){
        echo'<link rel="publisher" href="http://plus.google.com/' . $google_id . '">';
    }
    if($fb!==''){
        echo'<meta property="article:author" content="' . $fb . '">';
    }
    if($tw!==''){
        echo'<meta name="twitter:creator" content="' . $tw . '">';
    }
    $meta_script = '
        {
            "@context": "http://schema.org",
            "@type": "NewsArticle",
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "https://google.com/article"
            },
            "headline": "' . wp_title('',false) . '",
                "image": {
                    "@type": "ImageObject",
                    "url": "' . $meta_img . '",
                    "height": 256,
                    "width": 696
                },
            "datePublished": "' . get_the_time('Y/n/j G:i.s') . '",
            "dateModified": "' . get_mtime('Y/n/j G:i.s') . '",
            "author": {
                "@type": "Person",
                "name": "' . get_the_author_meta('display_name',$author_id) . '"
            },
            "publisher": {
                "@type": "Organization",
                "name": "' . $blog_name . '",
                "logo": {
                    "@type": "ImageObject",
                    "url": "' . wp_get_attachment_url($logo) . '",
                    "width": 600,
                    "height": 60
                }
            },
            "description": "' . $description . '"
        }';
    if(is_subpage()===true){
        $obj = get_queried_object();
        $meta_script = '
            {
                "@context":"http://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement":
                [
                    {
                        "@type": "ListItem",
                        "position": 1,
                        "item":{
                            "@id": "' . $home_url . '",
                            "name": "ホーム"
                        }
                    },';
                    if($obj -> post_parent != 0){
                        $pageAncestors = array_reverse($post -> ancestors);
                        foreach($pageAncestors as $pageAncestor){
                            $i++;
                            $meta_script .= '
                            {
                                "@type": "ListItem",
                                "position": ' . $i . ',
                                "item":{
                                    "@id": "' . esc_url(get_permalink($pageAncestor)) . '",
                                    "name": "' . esc_html(get_the_title($pageAncestor)) . '"
                                }
                            },';
                        }
                    }
    }else{
        $categories = get_the_category($post->ID);
        $cat        = $categories[0];
        $meta_script .= '
            {
                "@context":"http://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement":
                [
                    {
                        "@type": "ListItem",
                        "position": 1,
                        "item":{
                            "@id": "' . $home_url . '",
                            "name": "ホーム"
                        }
                    },';
                    if($cat -> parent != 0){
                        $ancestors = array_reverse(get_ancestors($cat->cat_ID,'category'));
                        foreach($ancestors as $ancestor){
                            $i++;
                            $meta_script .= '
                            {
                                "@type": "ListItem",
                                "position": ' . $i . ',
                                "item":{
                                    "@id": "' . get_category_link($ancestor) . '",
                                    "name": "' . get_cat_name($ancestor) . '"
                                }
                            },';
                        }
                    }
                    $i++;
                    $meta_script .= '
                    {
                        "@type": "ListItem",
                        "position": ' . $i . ',
                        "item":{
                            "@id": "' . get_category_link($cat -> term_id) . '",
                            "name": "' . $cat-> cat_name . '"
                        }
                    },';
    }
        $i++;
        $meta_script .= '
            {
                "@type": "ListItem",
                "position": ' . $i . ',
                "item":{
                    "@id": "' . esc_url(get_permalink()) . '",
                    "name": "' . esc_html(get_the_title()) . '"
                }
            }
        ]
    }';
elseif(is_category()===true):
    $categories = get_the_category($post->ID);
    $cat        = $categories[0];
    $cattitle   = get_the_archive_title();
    $meta_script = '
        {
            "@context":"http://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement":
            [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "item":{
                        "@id": "' . $home_url . '",
                        "name": "ホーム"
                    }
                },';
                if($cat -> parent != 0){
                    $ancestors = array_reverse(get_ancestors($cat -> cat_ID,'category'));
                    foreach($ancestors as $ancestor){
                        $i++;
                        echo'
                        {
                            "@type": "ListItem",
                            "position": ' . $i . ',
                            "item":{
                                "@id": "' . get_category_link($ancestor) .'",
                                "name": "' . get_cat_name($ancestor) . '"
                            }
                        },';
                    }
                }
                $i++;
                echo'
                {
                    "@type": "ListItem",
                    "position": ' . $i . ',
                    "item":{
                        "@id": "' . get_category_link($cat -> term_id) . '",
                        "name": "' . $cattitle . '"
                    }
                }
            ]
        }';
elseif(is_tag()===true):
    $tagName = single_tag_title('',false);
    $tag     = get_term_by('name',$tagName,'post_tag');
    $link    = get_tag_link($tag->term_id);
    $meta_script = '
        {
            "@context":"http://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement":
            [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "item":{
                        "@id": "' . $home_url . '",
                        "name": "ホーム"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "item":{
                        "@id": "' . esc_url($link) . '",
                        "name": "' . esc_html($tagName) . '"
                    }
                }
            ]
        }';
elseif(is_author()===true):
        $userId     = get_query_var('author');
        $authorName = get_the_author_meta('display_name',$userId);
        $meta_script = '
        {
            "@context":"http://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement":
            [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "item":{
                        "@id": "' . $home_url . '",
                        "name": "ホーム"
                    }
                {
                    "@type": "ListItem",
                    "position": 2,
                    "item":{
                        "@id": "' . esc_url(get_author_posts_url($userId)) . '",
                        "name": "' . esc_html($authorName) . '"}}
            ]
        }';
elseif(is_date()===true):
        $y     = get_query_var('year');
        $m     = get_query_var('monthnum');
        $d     = get_query_var('day');
        $linkY = get_year_link($y);
        $linkM = get_month_link($y,$m);
        $linkD = get_month_link($y,$m,$d);
        $meta_script = '
                {
                    "@context":"http://schema.org",
                    "@type": "BreadcrumbList",
                    "itemListElement":
                    [
                        {
                            "@type": "ListItem",
                            "position": 1,
                            "item":{"@id": "' . $home_url . '",
                            "name": "ホーム"
                        }
                    },
                    {
                        "@type": "ListItem",
                        "position": 2,
                        "item":{
                            "@id": "' . esc_url($linkY) . '",
                            "name": "' . esc_html($y) . '年"
                        }
                    }';
                    if(is_month()===true || is_day()===true){
                        echo'
                        ,{
                            "@type": "ListItem",
                            "position": 3,
                            "item":{
                                "@id": "' . esc_url($linkM) . '",
                                "name": "' . esc_html($m) . '月"
                            }
                        }';
                        if(is_day()===true){
                            echo'
                            ,{
                                "@type": "ListItem",
                                "position": 4,
                                "item":{
                                    "@id": "' . esc_url($linkD) . '",
                                    "name": "' . esc_html($d) . '日"
                                }
                            }';
                        }
                    }
                    echo'
                    ]
                }';
elseif(is_search()===true):
    $meta_script = '
        [
            {
                "@context":"http://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement":
                [
                    {
                        "@type": "ListItem",
                        "position": 1,
                        "item":{
                            "@id": "' . $home_url . '",
                            "name": "ホーム"
                        }
                    },
                    {
                        "@type": "ListItem",
                        "position": 2,
                        "item":{
                            "@id": "' . esc_url(get_search_link()) . '",
                            "name": "「' . esc_html(get_search_query()) . '」の検索結果"
                        }
                    }
                ]
            },
            {
                "@context":"http://schema.org",
                "@type": "SearchResultsPage",
                "@id": "' . $meta_url . '",
                "headline": "' . $blog_name . '",
                "name": "' . $blog_name . '",
                "url": "' . $meta_url . '",
                "datePublished": "' .  date('c') . '",
                "image": "' . $meta_img . '",
                "description": "' . $description . '"
            }
        ]';
elseif(is_attachment()===true):
    $obj = get_queried_object();
    $meta_script = '
        {
            "@context":"http://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement":
            [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "item":{
                        "@id": "' . $home_url . '",
                        "name": "ホーム"
                    }
                },';
                if($obj -> parent != 0){
                    $i++;
                    echo'
                    {
                        "@type": "ListItem",
                        "position": ' . $i . ',
                        "item":{
                            "@id": "' . esc_url(get_permalink($pageAncestor)) . '",
                            "name": "' . esc_html(get_the_title($pageAncestor)) . '"
                        }
                    },';
                }
                $i++;
                echo'
                {
                    "@type": "ListItem",
                    "position": ' . $i . ',
                    "item":{
                        "@id": "' . esc_url(get_permalink()) . '",
                        "name": "' . esc_html(get_the_title()) . '"
                    }
                }
            ]
        }';
elseif($is_home===true):
    $meta_script = '
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "name":"' . $blog_name . '",
            "description": "' . mb_substr($description,0,60) . '…",
            "url": "' . $home_url . '",
            "inLanguage": "' . get_bloginfo('language') . '",
            "publisher":{
				"@type":"Organization",
				"name":"' . $blog_name . '",
				"logo":{
					"@type": "ImageObject",
					"url": "' . esc_url($meta_img) . '",
					"width":60,
					"height":60
				}
			},
            "copyrightYear": "' . get_first_post_year() . '",
            "copyrightHolder": {
                "@type": "Organization",
                "name": "' . $blog_name . '"
            },
            "potentialAction": {
                "@type": "SearchAction",
                "target": "' . $home_url . '?s={search_term}",
                "query-input": "required name=search_term"
            }
        }
    ';
endif;
if(isset($meta_script)===true){
    echo'<script async type="application/ld+json">' . $meta_script . '</script>';
}?>