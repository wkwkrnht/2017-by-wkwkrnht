<!DOCTYPE html>
<html <?php language_attributes();?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<meta charset="utf-8">
	<meta http-equiv="cleartype" content="on">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<?php
	$theme_dir = get_template_directory();
	$theme_uri = get_template_directory_uri();
	include_once($theme_dir . '/inc/meta-info.php');?>
	<link rel="preload"  as="font" type="application/vnd.ms-fontobject" href="<?php echo $theme_uri;?>/inc/font-awesome/fontawesome-webfont.eot" crossorigin>
	<link rel="preload"  as="font" type="font/woff2" href="<?php echo $theme_uri;?>/inc/font-awesome/fontawesome-webfont.woff2" crossorigin>
	<link rel="preload"  as="font" type="font/woff" href="<?php echo $theme_uri;?>/inc/font-awesome/fontawesome-webfont.woff" crossorigin>
	<link rel="preload"  as="font" type="application/x-font-ttf" href="<?php echo $theme_uri;?>/inc/font-awesome/fontawesome-webfont.ttf" crossorigin>
	<style>
	    <?php
	    $root_color = get_option('root_color','#333');
	    include_once($theme_dir . '/css/fontawesome.php');
	    include_once($theme_dir . '/css/initial.php');
	    include_once($theme_dir . '/css/menu.php');
	    include_once($theme_dir . '/css/card.php');
	    if(is_singular()===true){
			$id      = url_to_postid($meta_url);
			$post    = get_post($id);
			$content = $post->post_content;
			global $shortcode_tags;
			foreach($shortcode_tags as $code_name => $function){
				$has_short_code = has_shortcode($content,$code_name);
				if($has_short_code===true || has_class('ba-slider')===true){
					include_once($theme_dir . '/css/short-code.php');
					break;
				}
			}
	        include_once($theme_dir . '/css/style-singular.php');
	    }
	    include_once($theme_dir . '/css/night-mode.php');
	    include_once($theme_dir . '/css/mediaqueri.php');?>
	</style>
	<?php
	$txt = false;
	$txt = get_option('header_txt');
	wp_head();
	if($txt!==false){echo $txt;}?>
</head>
<body <?php body_class();?>>
	<?php if(is_author()===true):
		include_once($theme_dir . '/widget/author-bio.php');
	elseif(is_singular()===false):?>
		<header class="site-header" itemscope itemtype="http://schema.org/WPHeader">
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
				<h1 class="site-title" itemprop="name headline about">
					<?php '「' . get_search_query() . '」の検索結果｜' . $blogname;?>
				</h1><br>
				<p class="site-description">
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
						<b>
							<?php echo $blog_name;?>
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