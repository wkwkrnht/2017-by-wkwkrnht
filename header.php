<!DOCTYPE html>
<html <?php language_attributes();?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<meta charset="utf-8">
	<meta name="referrer" content="<?php echo get_theme_mod('referrer_setting','default');?>">
	<meta name="description" content="<?php meta_description();?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="HandheldFriendly" content="true">
	<meta http-equiv="cleartype" content="on">
	<meta name="renderer" content="webkit">
	<?php
	$bing   = false;
	$google = false;
	$pi     = false;
	$txt    = false;
	$bing   = get_option('Bing_Webmaster');
	$google = get_option('Google_Webmaster');
	$pin    = get_option('Pinterest');
	$txt    = get_option('header_txt');
	if($bing!==false){echo'<meta name="msvalidate.01" content="' . $bing . '">';}
	if($google!==false){echo'<meta name="google-site-verification" content="' . $google . '">';}
	if($pin!==false){echo'<meta name="p:domain_verify" content="' . $pin . '">';}?>
	<meta name="theme-color" content="<?php echo get_option('GoogleChrome_URLbar');?>">
	<meta name="msapplication-TileColor" content="<?php echo get_option('GoogleChrome_URLbar');?>">
	<meta property="fb:app_id" content="<?php echo get_option('facebook_appid');?>">
	<meta property="og:type" content="article">
	<?php if(is_home()===false):?><meta property="og:title" content="<?php wp_title('｜',true,'right');bloginfo('name');?>"><?php endif;?>
	<meta property="og:url" content="<?php echo get_meta_url();?>">
	<meta property="og:description" content="<?php meta_description();?>">
	<meta property="og:site_name" content="<?php bloginfo('name');?>">
	<meta property="og:image" content="<?php meta_image();?>">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:domain" content="<?php echo $_SERVER['SERVER_NAME'];?>">
	<meta name="twitter:title" content="<?php wp_title('');?>">
	<meta name="twitter:description" content="<?php meta_description();?>">
	<meta name="twitter:image" content="<?php meta_image();?>">
	<meta name="twitter:site" content="@<?php echo get_option('Twitter_URL');?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url');?>">
	<link rel="prerender" href="<?php if(is_home()):echo get_permalink();else:echo site_url();endif;?>">
	<link rel="fluid-icon" href="<?php meta_image();?>" title="<?php bloginfo('name');?>">
	<link rel="image_src" href="<?php meta_image();?>" url="<?php meta_image();?>" height="256" width="256">
	<?php
	include_once(get_template_directory() . '/inc/meta-json.php');
	include_once(get_template_directory() . '/style.php');
	wp_head();
	if($txt!==false){echo $txt;}?>
</head>
<body <?php body_class();?>>
	<?php
	$site_url  = site_url();
	$year      = get_first_post_year();
	$blogname  = get_bloginfo('name');
	echo'<header class="site-header" itemscope itemtype="http://schema.org/WPHeader">';
		if(is_404()===true){
			echo'<a href="' . $site_url . '" tabindex="0" itemprop="url"><h1 class="site-title" itemprop="name headline">404 Not Found｜' . $blogname . '</h1><br><p class="site-description" itemprop="about">このサイトにはお探しのものはございません。お手数を掛けますが、再度お探しください。</p></a>';
		}elseif(is_category()===true){
			echo'<h1 class="site-title" itemprop="name headline about">「' . single_cat_title('',false) . '」の記事一覧｜' . $blogname . '</h1>';
		}elseif(is_tag()===true){
			echo'<h1 class="site-title" itemprop="name headline about">「' . single_tag_title('',false) . '」の記事一覧｜' . $blogname . '</h1>';
		}elseif(is_search()===true){
			global $wp_query;
			$serachresult = $wp_query->found_posts;
			$maxpage      = $wp_query->max_num_pages;
			wp_reset_query();
			echo'<h1 class="site-title" itemprop="name headline about">「' . get_search_query() . '」の検索結果｜' . $blogname . '</h1><br><p class="site-description">' . $serachresult . ' 件 / ' . $maxpage . ' ページ</p>';
		}elseif(is_singular()===true){
			echo'<a href="' . $site_url . '" tabindex="0" itemprop="url"><span class="site-title" itemprop="name headline">' . $blogname . '</span></a>';
		}else{
			echo'<a href="' . $site_url . '" tabindex="0" itemprop="url"><h1 class="site-title" itemprop="name headline">' . $blogname . '</h1></a>';
		}
		echo'<br>
		<span class="copyright"><span itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Organization"><span itemprop="name"><b>' . $blogname . '</b></span></span>&nbsp;&nbsp;&copy;<span itemprop="copyrightYear">' . $year . '</span></span>
	</header>';
	?>
	<main id="site-main">
