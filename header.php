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
	$bing      = false;
	$google    = false;
	$pi        = false;
	$txt       = false;
	$bing      = get_option('Bing_Webmaster');
	$google    = get_option('Google_Webmaster');
	$pin       = get_option('Pinterest');
	$txt       = get_option('header_txt');
	$site_url  = site_url();
	$theme_dir = get_template_directory();
	$blogname  = get_bloginfo('name');
	if($bing!==false){echo'<meta name="msvalidate.01" content="' . $bing . '">';}
	if($google!==false){echo'<meta name="google-site-verification" content="' . $google . '">';}
	if($pin!==false){echo'<meta name="p:domain_verify" content="' . $pin . '">';}?>
	<meta name="theme-color" content="<?php echo get_option('GoogleChrome_URLbar');?>">
	<meta name="msapplication-TileColor" content="<?php echo get_option('GoogleChrome_URLbar');?>">
	<meta property="fb:app_id" content="<?php echo get_option('facebook_appid');?>">
	<meta property="og:type" content="article">
	<?php if(is_home()===true):?>
		<meta property="og:title" content="<?php bloginfo('name');?>">
	<?php else:?>
		<meta property="og:title" content="<?php wp_title('｜',true,'right');bloginfo('name')?>">
	<?php endif;?>
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
	<?php include_once($theme_dir . '/inc/meta-json.php');?>
	<style>
	    <?php
	    $root_color = get_option('root_color','#333');
	    $theme_uri  = get_template_directory_uri();
	    include_once($theme_dir . '/css/fontawesome.php');
	    include_once($theme_dir . '/css/sanitize.php');
	    include_once($theme_dir . '/css/menu.php');
	    include_once($theme_dir . '/css/card.php');
	    include_once($theme_dir . '/css/short-code.php');
	    if(is_singular()===true){
	        include_once($theme_dir . '/css/style-singular.php');
	    }
	    include_once($theme_dir . '/css/night-mode.php');
	    ?>
	    @media screen and (max-width:720px;) {
	        .toc,.article-main .toc-title{
				width:94%;
			}
			.hatenablogcard{
				margin:5vh auto;
				max-width:70vw;
			}
	        .ogp-blogcard-share-toggle{
	            height:2em;
	            line-height:2em;
	            width:2em;
	        }
			.ogp-blogcard-title{
				font-size:1.6rem;
			}
			.ogp-blogcard-description{
				display:none;
			}
			.information,.question{
				width:96%;
			}
	        <?php if(is_singular()===true):?>
				.article-meta > div{
					display:none;
				}
			    .article-main h3,.article-main h4,.article-main h5,.article-main h6{
					font-size:2.2rem;
				}
			    .article-main table,.article-main table caption,.article-main table thead,.article-main table tbody,.article-main table tr,.article-main table tr th{
					display:block;
				}
			    .article-main table tr th{
					margin:-1px;
				}
			    .article-main table tr td{
					display:list-item;
					list-style:disc inside;
					border:0;
				}
			    .article-main table tr td + td{
					padding-top:0;
				}
			<?php endif;?>
	    }
	    @media print{
			:root{
				font-size:10pt;
			}
			#menu-toggle,#menu-wrap{
				display:none;
			}
		}
	</style>
	<?php
	wp_head();
	if($txt!==false){echo $txt;}?>
</head>
<body <?php body_class();?>>
	<?php if(is_author()===true):
		include_once($theme_dir . '/widget/author-bio.php');
	else:?>
		<header class="site-header" itemscope itemtype="http://schema.org/WPHeader">
			<?php if(is_404()===true):?>
				<a href="<?php echo $site_url;?>" tabindex="0" itemprop="url">
					<h1 class="site-title" itemprop="name headline">
						404 Not Found｜<?php echo $blogname;?>
					</h1><br>
					<p class="site-description" itemprop="about">
						このサイトにはお探しのものはございません。お手数を掛けますが、再度お探しください。
					</p>
				</a>
			<?php elseif(is_category()===true):?>
				<h1 class="site-title" itemprop="name headline about">
					<?php echo'「' . single_cat_title('',false) . '」の記事一覧｜' . $blogname;?>
				</h1>
			<?php elseif(is_tag()===true):?>
				<h1 class="site-title" itemprop="name headline about">
					<?php echo'「' . single_tag_title('',false) . '」の記事一覧｜' . $blogname;?>
				</h1>
			<?php elseif(is_search()===true):
				global $wp_query;
				$serachresult = $wp_query->found_posts;
				$maxpage      = $wp_query->max_num_pages;
				wp_reset_query();?>
				<h1 class="site-title" itemprop="name headline about">
					<?php '「' . get_search_query() . '」の検索結果｜' . $blogname;?>
				</h1><br>
				<p class="site-description">
					<?php echo $serachresult . ' 件 / ' . $maxpage . ' ページ';?>
				</p>
			<?php elseif(is_singular()===true):?>
				<a href="<?php echo $site_url;?>" tabindex="0" itemprop="url">
					<span class="site-title" itemprop="name headline">
						<?php echo $blogname;?>
					</span>
				</a>
			<?php else:?>
				<a href="<?php echo $site_url;?>" tabindex="0" itemprop="url">
					<h1 class="site-title" itemprop="name headline">
						<?php echo $blogname;?>
					</h1>
				</a>
			<?php endif;?>
			<br>
			<span class="copyright">
				<span itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Organization">
					<span itemprop="name">
						<b>
							<?php echo $blogname;?>
						</b>
					</span>
				</span>
				&nbsp;&nbsp;&copy;
				<span itemprop="copyrightYear">
					<?php echo get_first_post_year();?>
				</span>
			</span>
		</header>
	<?php endif;?>
	<main id="site-main">
