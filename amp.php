<!DOCTYPE html>
<html amp class="amp">
<head>
	<meta charset="utf-8">
	<?php
	$meta_image  = get_meta_image();
	$blog_name   = get_bloginfo('name');
	$description = get_meta_description();
	$fb_app_id   = get_option('facebook_appid');
	$root_color  = get_option('root_color','#333');
	$theme_dir   = get_template_directory();
	$img         = ' src="' . get_no_image('') . '"';
	$content     = '';?>
	<link rel="canonical" href="<?php echo get_permalink();?>">
	<title><?php wp_title('｜',true,'right');?></title>
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
	<meta name="google-site-verification" content="<?php echo get_option('Google_Webmaster');?>">
	<meta name="msvalidate.01" content="<?php echo get_option('Bing_Webmaster');?>">
	<meta name="theme-color" content="<?php echo get_option('GoogleChrome_URLbar');?>">
	<meta name="msapplication-TileColor" content="<?php echo get_option('GoogleChrome_URLbar');?>">
	<meta name="renderer" content="webkit">
	<meta name="description" content="<?php echo $description;?>">
	<meta property="fb:app_id" content="<?php echo $fb_app_id;?>">
	<meta property="og:type" content="article">
	<meta property="og:title" content="<?php wp_title('｜',true,'right');?>">
	<meta property="og:url" content="<?php echo get_permalink();?>">
	<meta property="og:description" content="<?php echo $description;?>">
	<meta property="og:site_name" content="<?php echo $blog_name;?>">
	<meta property="og:image" content="<?php echo $meta_image;?>">
	<meta property="article:author" content="<?php the_author_meta('facebook');?>">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:domain" content="<?php echo $_SERVER['SERVER_NAME'];?>">
	<meta name="twitter:title" content="<?php wp_title('');?>">
	<meta name="twitter:description" content="<?php echo $description;?>">
	<meta name="twitter:image" content="<?php echo $meta_image;?>">
	<meta name="twitter:site" content="<?php get_twitter_acount();?>">
	<meta name="twitter:creator" content="<?php the_author_meta('twitter');?>">
	<link rel="publisher" href="http://plus.google.com/'<?php the_author_meta('GoogleID');?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url');?>">
	<link rel="fluid-icon" href="<?php echo $meta_image;?>" title="<?php echo $blog_name;?>">
	<link rel="image_src" href="<?php echo $meta_image;?>">
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<script type="application/ld+json">
		{
			"@context":"http://schema.org",
			"@type":"NewsArticle",
			"mainEntityOfPage":{
				"@type":"WebPage",
				"@id":"<?php the_permalink();?>"
			},
			"headline":"<?php the_title();?>",
			"image":{
				"@type":"ImageObject",
				"url":"<?php echo esc_url(get_wkwkrnht_eyecatch(array(800,800)));?>",
				"height":800,
				"width":800
			},
			"datePublished":"<?php the_time('Y/m/d');?>",
			"dateModified":"<?php the_modified_date('Y/m/d');?>",
			"author":{
				"@type":"Person",
				"name":"<?php the_author_meta('display_name');?>"
			},
			"publisher":{
				"@type":"Organization",
				"name":"<?php bloginfo('name');?>",
				"homeLocation" : {
                    "@type" : "Place",
                    "name" : "<?php echo get_locale( );?>"
                },
				"logo":{
					"@type": "ImageObject",
					"url": "<?php echo esc_url($meta_image);?>",
					"width":60,
					"height":60
				}
			},
			"description": "<?php echo mb_substr(strip_tags($post->post_content),0,60);?>…"
		}
	</script>
	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
	<style amp-custom>
		<?php
		include_once($theme_dir . '/css/sanitize.php');
		include_once($theme_dir . '/css/card.php');
		include_once($theme_dir . '/css/short-code.php');
		if(is_singular()===true){
			include_once($theme_dir . '/css/style-singular.php');
		}
		include_once($theme_dir . '/css/mediaqueri.php');?>
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
	</style>
</head>
<body>
	<article>
		<header class="article-header">
			<a href="<?php echo esc_url(home_url());?>" tabindex="0" class="article-img">
				<amp-img src="<?php wkwkrnht_eyecatch('wkwkrnht-thumb');?>" alt="eyecatch" height="576" width="1344" layout="responsive" class="article-eyecatch"></amp-img>
			</a>
			<div class="article-meta">
				<time class="article-date" datetime="<?php get_mtime('Y/n/j G:i.s');?>"><?php the_time('Y/n/j');?></time>
				<span class="article-info">
					<h1 class="article-name"><?php the_title();?></h1>
					<?php the_author();the_category(', ');?>
					<?php
					$cat=get_the_category();
					if($cat && !is_wp_error($cat)){
						$par=get_category($cat[0]->parent);$echo='';
						echo'<div class="bread" itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><a href="' . home_url() . '" tabindex="0" itemprop="url"><span itemprop="title">ホーム</span></a><span class="sp">/</span>';
						while($par && !is_wp_error($par) && $par->term_id!==0){
							$echo='<a href="' . get_category_link($par->term_id) . '" tabindex="0" itemprop="url"><span itemprop="title">' . $par->name . '</span></a><span class="sp">/</span></div>' . $echo;
							$par=get_category($par->parent);
						}
						echo $echo . '<a href="'.get_category_link($cat[0]->term_id).'" tabindex="0" itemprop="url"><span itemprop="title">' . $cat[0]->name . '</span></a></div>';
					}
					?>
				</span>
			</div>
		</header>
		<main class="article-main">
			<?php
			if(have_posts()):while(have_posts()):the_post();$content = get_the_content();endwhile;endif;

			$content = apply_filters('the_content',$content);
			$content = str_replace(']]>',']]&gt;',$content);
			$content = preg_replace('/<blockquote class="twitter-tweet".*>.*<a href="https:\/\/twitter.com\/.*\/status\/(.*).*<\/blockquote>.*<script async src="\/\/platform.twitter.com\/widgets.js" charset="utf-8"><\/script>/i','<div class=\'embed-container\'><amp-twitter width="800" height="600" layout="responsive" data-tweetid="$1" data-conversation="all" data-align="center"></amp-twitter></div><script async custom-element="amp-twitter" src="https://cdn.ampproject.org/v0/amp-twitter-0.1.js"></script>',$content);
			$content = preg_replace('/<iframe width=\'100%\' src=\'https:\/\/vine.co\/v\/(.*)\/embed\/simple\'.*><\/iframe>/i','<div class=\'embed-container\'><amp-vine data-vineid="$1" width="592" height="592" layout="responsive"></amp-vine></div><script async custom-element="amp-vine" src="https://cdn.ampproject.org/v0/amp-vine-0.1.js"></script>',$content);
			$content = preg_replace('/<iframe src=\'\/\/instagram.com\/p\/(.*)\/embed\/\'.*<\/iframe>/i','<div class=\'embed-container\'><amp-instagram layout="responsive" data-shortcode="$1" width="592" height="716" ></amp-instagram></div><script async custom-element="amp-instagram" src="https://cdn.ampproject.org/v0/amp-instagram-0.1.js"></script>',$content);
			$content = preg_replace('/https:\/\/youtu.be\/(.*)/i','<div class=\'embed-container\'><amp-youtube layout="responsive" data-videoid="$1" width="592" height="363"></amp-youtube></div><script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>',$content);
			$content = preg_replace('/<iframe width="853" height="480" src="https:\/\/www.youtube.com\/embed\/(.*)" frameborder="0" allowfullscreen><\/iframe>.*<\/div>/i','<div class=\'embed-container\'><amp-youtube layout="responsive" data-videoid="$1" width="592" height="363"></amp-youtube></div><script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>',$content);
			$content = preg_replace('/<iframe class="hatenablogcard" src="http:\/\/hatenablog-parts.com\/embed?url=(.*?)" frameborder="0" scrolling="no"><\/iframe>/i','<a href="$1">$1</a>',$content);
			$content = preg_replace('/<a class="embedly-card" href="(.*?)"><\/a><script async="" charset="UTF-8" src="\/\/cdn.embedly.com\/widgets\/platform.js"><\/script>/i','<a href="$1">$1</a>',$content);
			$content = preg_replace('/<iframe src="https:\/\/www.google.com\/maps\/embed?(.*?)" (.*?)><\/iframe>/i','<div><amp-iframe layout="responsive" src="https:\/\/www.google.com\/maps\/embed?$1" width="600" height="450" layout="responsive" sandbox="allow-scripts allow-same-origin allow-popups" frameborder="0" allowfullscreen></amp-iframe></div><script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>',$content);
			$content = preg_replace('/<iframe (.*?)src="https:\/\/(.*?).amazon(.*?)><\/iframe>/i','<amp-iframe width="120" height="240" sandbox="allow-scripts allow-same-origin" frameborder="0" $1src="https://$2.amazon$3 ></amp-iframe><script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>',$content);
			$content = preg_replace('/<iframe(.*?)><\/iframe>/i','<div><amp-iframe layout="responsive" height="576" width="1344" $1></amp-iframe></div><script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>',$content);
			$content = preg_replace('/<img(.*?)>/i','<div><amp-img layout="responsive" height="576" width="1344" $1></amp-img></div>',$content);
			$content = preg_replace('/<(.*?)border=".*?"(.*?)>/','<$1$2>',$content);
			$content = preg_replace('/<(.*?)style=".*?"(.*?)>/','<$1$2>',$content);
  			$content = preg_replace('/<(.*?)onclick=".*?"(.*?)>/','<$1$2>',$content);
			$content = preg_replace('/<(.*?)onmouseover=".*?"(.*?)>/','<$1$2>',$content);
			$content = preg_replace('/<(.*?)onmouseout=".*?"(.*?)>/','<$1$2>',$content);
			$content = preg_replace('/<(.*?)oncontextmenu=".*?"(.*?)>/','<$1$2>',$content);
			$content = preg_replace('/<a(.*?)target=".*?"(.*?)>/','<a$1$2>',$content);
			$content = preg_replace('/<(.*?)marginwidth=".*?"(.*?)>/i','<$1$2>',$content);
			$content = preg_replace('/<(.*?)marginheight=".*?"(.*?)>/i','<$1$2>',$content);
			$content = str_replace('href="javascript:void(0)"','',$content);
			$content = str_replace('src=""',$img,$content);

			echo $content;
			?>
		</main>
		<footer>
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
			<div class="widget_related_posts">
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
			</div>
		</footer>
	</article>
</body>
</html>
