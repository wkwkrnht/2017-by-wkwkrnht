<!DOCTYPE html>
<html amp class="amp">
<head>
	<meta charset="utf-8">
	<?php
	$root_color  = get_option('root_color','#333');
	$theme_dir   = get_template_directory();
	$content     = '';?>
	<link rel="canonical" href="<?php echo get_permalink();?>">
	<title><?php wp_title('｜',true,'right');?></title>
	<?php include_once($theme_dir . '/inc/meta-info.php');?>
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
	<style amp-custom>
		<?php
		include_once($theme_dir . '/css/initial.php');
		include_once($theme_dir . '/css/card.php');
		if(is_singular()===true){
			$id      = url_to_postid($meta_url);
			$post    = get_post($id);
			$content = $post->post_content;
			global $shortcode_tags;
			foreach($shortcode_tags as $code_name => $function){
				$has_short_code = has_shortcode($content,$code_name);
				if($has_short_code===true){
					include_once($theme_dir . '/css/short-code.php');
					break;
				}
			}
			include_once($theme_dir . '/css/style-singular.php');
		}
		include_once($theme_dir . '/css/mediaqueri.php');?>
		article{
			margin-top:6vh;
		}
		.widget_related_posts{
			align-items:center;
			display:flex;
			flex-wrap:nowrap;
			height:25vw;
			justify-content:space-between;
			margin:5vh 0;
			overflow-x:auto;
			overflow-y:hidden;
			width:100%;
			-webkit-overflow-scrolling:touch;
		}
		.widget_related_posts > *{
			-webkit-transform:translateZ(0px);
		}
		.widget_related_posts .related-wrapper{
			background-color:<?php echo get_option('related_background','#fff');?>;
			border-radius:3vmin;
			box-shadow:0 0 2vmin rgba(0,0,0,.3);
			color:<?php echo get_option('related_color','#333');?>;
			display:block;
			height:15vw;
			margin:2vw;
			min-width:28vw;
			padding:.5em 1em;
			text-decoration:none;
		}
		.widget_related_posts .related-wrapper:visited{
			color:<?php echo get_option('related_color','#333');?>;
		}
		.widget_related_posts .related-title{
			background-color:<?php echo get_option('related_title_background','#03a9f4');?>;
			box-shadow:0 3px 6px rgba(0,0,0,.1);
			color:<?php echo get_option('related_title_color','#fff');?>;
			font-size:2rem;
			text-align:center;
			vertical-align:middle;
		}
		.widget_related_posts .related-date,.widget_related_posts .related-category{
			font-size:1.6rem;
			text-align:left;
		}
		.amp-sharebutton > ul{
			list-style:none;
		}
		.amp-sharebutton > ul > li{
			display:inline-block;
		}
		.amp-copyright{
			text-align:center;
		}
	</style>
</head>
<body>
	<article>
		<header class="article-header">
			<a href="<?php echo esc_url(home_url());?>" tabindex="0" class="article-img">
				<amp-img src="<?php wkwkrnht_eyecatch('wkwkrnht-thumb');?>" alt="eyecatch" height="576" width="1344" layout="responsive" class="article-eyecatch"></amp-img>
			</a>
			<div class="article-meta">
				<h1 class="article-title entry-title">
					<?php the_title();?>
				</h1>
				<div>
					<span class="article-date">
						<time class="updated" datetime="<?php get_mtime('Y/m/d');?>" content="<?php the_time('Y/n/j G:i.s');?>">
							<?php the_time('Y/n/j');?>
						</time>
					</span>
					<span class="author article-author">
						<a href="<?php echo site_url() . '?author=' . $author_id;?>" title="<?php echo $author_name;?>" tabindex="0">
							<span class="vcard author">
								<span class="fn">
									<?php echo $author_name;?>
								</span>
							</span>
						</a>
					</span>
				</div>
				<div class="widget_tag_cloud">
					<?php the_tags('','','');?>
				</div>
			</div>
		</header>
		<main class="article-main">
			<?php if(have_posts()):while(have_posts()):the_post();the_content();endwhile;endif;?>
		</main>
		<footer itemscope itemtype="http://schema.org/WPFooter">
			<aside class="amp-sharebutton">
				<h2>share : </h2>
				<ul>
					<li><amp-social-share type="twitter"></amp-social-share></li>
					<li><amp-social-share type="facebook" data-param-app_id="<?php echo $fb_app_id;?>"></amp-social-share></li>
					<li><amp-social-share type="gplus"></amp-social-share></li>
					<li><amp-social-share type="linkedin"></amp-social-share></li>
					<li><amp-social-share type="pinterest"></amp-social-share></li>
					<li><amp-social-share type="tumblr"></amp-social-share></li>
					<li><amp-social-share type="whatsapp"></amp-social-share></li>
					<li><amp-social-share type="email"></amp-social-share></li>
				</ul>
			</aside>
			<aside class="widget_related_posts">
				<?php $categories=get_the_category();$category_ID=array();foreach($categories as $category):array_push($category_ID,$category->cat_ID);endforeach;
				if(have_posts()):while(have_posts()):the_post();$now = get_the_ID();endwhile;endif;$array=array('numberposts'=>10,'category'=>$category_ID,'orderby'=>'rand','post__not_in'=>array($now),'no_found_rows'=>true,'update_post_term_cache'=>false,'update_post_meta_cache'=>false);
				$query = new WP_Query($array);
				if($query -> have_posts()):
					while($query -> have_posts()):$query -> the_post();
						$cat = get_the_category();?>
						<a href="<?php the_permalink()?>" title="<?php the_title_attribute();?>" tabindex="0" class="related-wrapper">
							<h3 class="related-title"><?php echo mb_strimwidth(get_the_title(),0,20,'…');?></h3><br>
							<span class="related-date">投稿日時 : <time datetime="<?php get_mtime('Y/n/j G:i.s');?>"><?php the_time('Y/n');?></time></span><br>
							<span class="related-category">カテゴリー : <?php echo $cat[0]->name;?></span>
						</a>
					<?php endwhile;?>
					<?php wp_reset_postdata();?>
				<?php else:
					wp_reset_postdata();
					$array=array('numberposts'=>10,'orderby'=>'rand','post__not_in'=>array($now),'no_found_rows'=>true,'update_post_term_cache'=>false,'update_post_meta_cache'=>false);
					$query = new WP_Query($array);
					while($query -> have_posts()):$query -> the_post();?>
						<a href="<?php the_permalink()?>" title="<?php the_title_attribute();?>" tabindex="0" class="related-wrapper">
							<h3 class="related-title"><?php echo mb_strimwidth(get_the_title(),0,20,'…');?></h3><br>
							<span class="related-date">投稿日時 : <time datetime="<?php get_mtime('Y/n/j G:i.s');?>"><?php the_time('Y/n');?></time></span><br>
							<span class="related-category">カテゴリー : <?php echo $cat[0]->name;?></span>
						</a>
					<?php endwhile;?>
					<?php wp_reset_postdata();?>
				<?php endif;?>
			</aside>
			<aside class="amp-copyright">
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
			</aside>
		</footer>
	</article>
</body>
</html>