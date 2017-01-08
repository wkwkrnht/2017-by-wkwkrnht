<?php
$blog_name   = get_bloginfo('name');
$home_url    = esc_url(home_url());
$meta_img    = get_meta_image();
$description = get_meta_description();
if(is_singular()===true):
    echo'<link rel="amphtml" href="' . get_permalink() . '?amp=1">';
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
    $i          = 1;
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
    $meta_url = get_meta_url();
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
    $i   = 1;
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
            "description": "' . mb_substr(get_bloginfo('description'),0,60) . '…",
            "url": "' . $homeurl . '",
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
endif;?>
