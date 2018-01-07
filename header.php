<!DOCTYPE html>
<html <?php language_attributes();?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<?php include_once(get_parent_theme_file_path('/inc/meta-info.php'));?>
	<style>
		<?php wkwkrnht_load_style();?>
	</style>
	<?php
	$header = get_option('insert_into_header');
	wkwkrnht_load_analytics();
	wp_head();
	if($header!==false){
		echo $header;
	}?>
</head>
<body <?php body_class();?>>
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
		<?php else:?>
			<a href="<?php echo $site_url;?>" tabindex="0" itemprop="url">
				<h1 class="site-title" itemprop="name headline">
					<?php echo wp_get_document_title();?>
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
	<main id="site-main">
		<?php if(is_author()===true){
		    include_once(get_template_directory() . '/widget/author-bio.php');
		}?>