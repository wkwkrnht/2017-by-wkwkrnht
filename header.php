<!DOCTYPE html>
<html <?php language_attributes();?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<meta charset="utf-8">
	<?php
	$theme_uri = get_template_directory_uri();
	include_once(get_template_directory() . '/inc/meta-info.php');?>
	<link rel="preload"  as="font" type="application/vnd.ms-fontobject" href="<?php echo $theme_uri;?>/inc/font-awesome/fontawesome-webfont.eot" crossorigin>
	<link rel="preload"  as="font" type="font/woff2" href="<?php echo $theme_uri;?>/inc/font-awesome/fontawesome-webfont.woff2" crossorigin>
	<link rel="preload"  as="font" type="font/woff" href="<?php echo $theme_uri;?>/inc/font-awesome/fontawesome-webfont.woff" crossorigin>
	<link rel="preload"  as="font" type="application/x-font-ttf" href="<?php echo $theme_uri;?>/inc/font-awesome/fontawesome-webfont.ttf" crossorigin>
	<style>
		<?php wkwkrnht_load_style();?>
	</style>
	<?php
	$txt = get_option('header_txt');
	wkwkrnht_load_analytics()
	wp_head();
	if($txt!==false){
		echo $txt;
	}?>
</head>
<body <?php body_class();?>>
	<?php
	if(is_author()===true):
		include_once($theme_dir . '/widget/author-bio.php');
	elseif(is_singular()===false):?>
		<header itemscope itemtype="http://schema.org/WPHeader">
			<section class="site-header">
				<?php if(is_404()===true):?>
					<a href="<?php echo $site_url;?>" tabindex="0" itemprop="url">
						<h1 class="site-title" itemprop="name headline">
							404 Not Found｜<?php echo $blog_name;?>
						</h1><br>
						<p class="site-description" itemprop="about">
							このサイトにはお探しのものはございません。お手数を掛けますが、再度お探しください。
						</p>
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
					</h1><br>
					<p class="site-description" itemprop="about">
						<?php echo $serachresult . ' 件 / ' . $maxpage . ' ページ';?>
					</p>
				<?php else:?>
					<a href="<?php echo $site_url;?>" tabindex="0" itemprop="url">
						<h1 class="site-title" itemprop="name headline">
							<?php echo $blog_name;?>
						</h1>
					</a>
				<?php endif;?>
				<br>
				<span class="copyright">
					<span itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Organization">
						<span itemprop="name">
							<?php echo $blog_name;?>
						</span>
					</span>
					&nbsp;&nbsp;&copy;
					<span itemprop="copyrightYear">
						<?php echo get_first_post_year();?>
					</span>
				</span>
			</section>
			<nav class="header-nav">
				<?php wp_nav_menu(array('theme_location'=>'header','container'=>false,'items_wrap'=>'<ul id="%1$s" class="%2$s" itemscope itemtype="http://schema.org/SiteNavigationElement">%3$s</ul>'));?>
			</nav>
		</header>
	<?php endif;?>
	<main id="site-main">