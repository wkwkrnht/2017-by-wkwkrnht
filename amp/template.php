<!DOCTYPE html>
<html amp class="amp">
<head>
	<meta charset="utf-8">
	<link rel="canonical" href="<?php the_permalink();?>">
	<title><?php wp_title('｜',true,'right');bloginfo();?></title>
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<?php
	$theme_dir = get_template_directory();
	$name      = get_meta_url();
	if(strlen($url) > 20){
        $amp_script = wordwrap($url,20);
    }else{
        $amp_script = $url;
    }
	include_once($theme_dir . '/inc/meta-info.php');
	echo get_site_transient(make_transit_name($name));
	wkwkrnht_load_analytics();?>
	<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	<style amp-custom>
		<?php wkwkrnht_load_style();?>
	</style>
</head>
<body>
	<header class="site-header" itemscope itemtype="http://schema.org/WPHeader">
	    <?php if(is_404()===true):?>
	        <a href="<?php echo $site_url;?>" tabindex="0" itemprop="url">
	            <h1 class="site-title" itemprop="name headline">
	                404 Not Found｜<?php echo $blog_name;?>
	            </h1>
	            <summary class="site-description" itemprop="about">
	                このサイトにはお探しのものはございません。お手数を掛けますが、再度お探しください。
	            </summary>
	        </a>
	    <?php elseif(is_category()===true):?>
	        <h1 class="site-title" itemprop="name headline about">
	            <?php echo'「' . single_cat_title('',false) . '」の記事一覧｜' . $blog_name;?>
	        </h1>
	    <?php elseif(is_tag()===true):?>
	        <h1 class="site-title" itemprop="name headline about">
	            <?php echo'「' . single_tag_title('',false) . '」の記事一覧｜' . $blog_name;?>
	        </h1>
	    <?php elseif(is_search()===true):
	        global $wp_query;
	        $serachresult = $wp_query->found_posts;
	        $maxpage      = $wp_query->max_num_pages;
	        wp_reset_query();?>
	        <h1 class="site-title" itemprop="name headline">
	            <?php '「' . get_search_query() . '」の検索結果｜' . $blogname;?>
	        </h1>
	        <summary class="site-description" itemprop="about">
	            <?php echo $serachresult . ' 件 / ' . $maxpage . ' ページ';?>
	        </summary>
	    <?php elseif(is_author()===true):
	        $author_name = the_author_meta('display_name');?>
	        <amp-img src-"<?php echo get_avatar_url(get_the_author_meta('ID'),array('sizes'=>256,));?>" alt="bio-img" class="bio-img" height="256" width="256" layout="fixed"></amp-img>
	        <div class="bio-info" itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Organization">
	            <h2 itemprop="name"><?php echo $author_name;?></h2><br>
	            <p class="bio-description" itemprop="about"><?php the_author_meta('user_description');?></p>
	        </div>
	    <?php else:?>
	        <a href="<?php echo $site_url;?>" tabindex="0" itemprop="url">
	            <h1 class="site-title" itemprop="name headline">
	                <?php echo $blog_name;?>
	            </h1>
	        </a>
	    <?php endif;?>
	    <div class="copyright">
	        <span itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Organization">
	            <span itemprop="name">
	                <?php echo $blog_name;?>
	            </span>
	        </span>
	        &nbsp;&nbsp;&copy;
	        <span itemprop="copyrightYear">
	            <?php echo get_first_post_year();?>
	        </span>
	    </div>
	    <?php if(has_nav_menu('header')===true):?>
	        <nav>
	            <?php wp_nav_menu(array('theme_location'=>'header','container'=>false,'items_wrap'=>'<ul id="%1$s" class="header-nav %2$s" itemscope itemtype="http://schema.org/SiteNavigationElement">%3$s</ul>'));?>
	        </nav>
	    <?php endif;?>
	</header>
	<?php
	if(is_singular()===true){
		include_once($theme_dir . '/amp/content-singular.php');
	}else{
		include_once($theme_dir . '/amp/content-list.php');
	}?>
</body>
</html>