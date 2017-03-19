<?php
$i            = 1;
$google_ana   = false;
$google_meta  = false;
$bing         = false;
$pi           = false;
$img          = ' src="' . get_no_image('') . '"';
$google_id    = get_the_author_meta('GoogleID');
$google_ana   = get_option('Google_Analytics');
$google_meta  = get_option('Google_Webmaster');
$bing         = get_option('Bing_Webmaster');
$pin          = get_option('Pinterest');
$site_url     = site_url();
$home_url     = esc_url(home_url());
$meta_url     = get_meta_url();
$meta_img     = get_meta_image();
$blog_name    = get_bloginfo('name');
$description  = get_meta_description();
$URLbar_color = get_option('GoogleChrome_URLbar');
if($google_meta!==false){echo'<meta name="google-site-verification" content="' . $google_meta . '">';}
if($bing!==false){echo'<meta name="msvalidate.01" content="' . $bing . '">';}
if($pin!==false){echo'<meta name="p:domain_verify" content="' . $pin . '">';}?>
<meta name="referrer" content="<?php echo get_theme_mod('referrer_setting','default');?>">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<meta name="renderer" content="webkit">
<meta name="HandheldFriendly" content="true">
<meta name="description" content="<?php echo $description;?>">
<meta name="theme-color" content="<?php echo $URLbar_color;?>">
<meta name="msapplication-TileColor" content="<?php echo $URLbar_color;?>">
<meta property="fb:app_id" content="<?php echo get_option('facebook_appid');?>">
<meta property="og:type" content="article">
<?php if(is_home()===true):?>
    <meta property="og:title" content="<?php $blog_name;?>">
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
<link rel="prerender" href="<?php if(is_home()){echo get_permalink();}else{echo $site_url;}?>">
<link rel="fluid-icon" href="<?php echo $meta_img;?>" title="<?php echo $blog_name;?>">
<?php if(is_amp()===false):?>
    <link rel="image_src" href="<?php echo $meta_img;?>" url="<?php echo $meta_img;?>" height="256" width="256">
    <link rel="amphtml" href="<?php echo $meta_url;?>/amp">
<?php endif;
if($google_id!==null):?>
    <link rel="publisher" href="http://plus.google.com/<?php echo $google_id;?>">
<?php endif;
if(is_singular()===true):
    $fb         = '';
    $tw         = '';
    $gp         = '';
    $logo       = '';
    $author_id  = '';
    $fb         = get_the_author_meta('facebook');
    $tw         = get_the_author_meta('twitter');
    $gp         = get_the_author_meta('Googleplus');
    $logo       = get_theme_mod('custom_logo');
    $author_id  = $post->post_author;
    $i          = 1;
    if($fb!==''){echo'<meta property="article:author" content="' . $fb . '">';}
    if($tw!==''){echo'<meta name="twitter:creator" content="' . $tw . '">';}
    if($gp!==''){echo'<link rel="publisher" href="http://plus.google.com/' . $gp . '">';}
    echo'
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "NewsArticle",
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "https://google.com/article"
            },
            "headline": "Article headline",
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
                "name": "' . get_the_author_meta('display_name',$author_id) . '",
                "homeLocation" : {
                    "@type" : "Place",
                    "name" : "' . get_locale() . '"
                }
            },
            "publisher": {
                "@type": "Organization",
                "name": "' . $blog_name . '",
                "homeLocation" : {
                    "@type" : "Place",
                    "name" : "<?php echo get_locale( );?>"
                },
                "logo": {
                    "@type": "ImageObject",
                    "url": "' . wp_get_attachment_url($logo) . '",
                    "width": 600,
                    "height": 60
                }
            },
            "description": "' . $description . '"
        }
    </script>';
    if(is_single() || is_page() && is_subpage()===false){
        $categories = get_the_category($post->ID);
        $cat        = $categories[0];
        echo'
        <script type="application/ld+json">
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
                            echo'
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
                    echo'
                    {
                        "@type": "ListItem",
                        "position": ' . $i . ',
                        "item":{
                            "@id": "' . get_category_link($cat -> term_id) . '",
                            "name": "' . $cat-> cat_name . '"
                        }
                    },';
    }
    if(is_page() && is_subpage()===true){
        $obj = get_queried_object();
        echo'
        <script type="application/ld+json">
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
                    }
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
        }
        </script>';
elseif(is_category()===true):
    $categories = get_the_category($post->ID);
    $cat        = $categories[0];
    $cattitle   = get_the_archive_title();
    echo'
    <script type="application/ld+json">
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
        }
    </script>';
elseif(is_tag()===true):
    $tagName = single_tag_title('',false);
    $tag     = get_term_by('name',$tagName,'post_tag');
    $link    = get_tag_link($tag->term_id);
    echo'
        <script type="application/ld+json">
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
        }
        </script>';
elseif(is_author()===true):
        $userId     = get_query_var('author');
        $authorName = get_the_author_meta('display_name',$userId);
        echo'
        <script type="application/ld+json">
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
        }
        </script>';
elseif(is_date()===true):
        $y     = get_query_var('year');
        $m     = get_query_var('monthnum');
        $d     = get_query_var('day');
        $linkY = get_year_link($y);
        $linkM = get_month_link($y,$m);
        $linkD = get_month_link($y,$m,$d);
        echo'
            <script type="application/ld+json">
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
                    if(is_month() || is_day()){
                        echo'
                        ,{
                            "@type": "ListItem",
                            "position": 3,
                            "item":{
                                "@id": "' . esc_url($linkM) . '",
                                "name": "' . esc_html($m) . '月"
                            }
                        }';
                        if(is_day()){
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
                }
            </script>';
elseif(is_search()===true):
    echo'
    <script type="application/ld+json">
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
        ]
    </script>';
elseif(is_attachment()===true):
    $obj = get_queried_object();
    echo'
    <script type="application/ld+json">
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
        }
    </script>';
elseif(is_home()===true):
    echo'
    <script type="application/ld+json">
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
    </script>';
endif;
if($google_ana!==false && !isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'],'Speed Insights')===false){
    echo'<script>window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;ga("create","' . $google_ana . '","auto");ga("send","pageview");</script><script async="" src="//www.google-analytics.com/analytics.js"></script>';
}?>