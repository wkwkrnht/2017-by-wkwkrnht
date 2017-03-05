<!DOCTYPE html>
<html amp class="amp">
<head>
	<meta charset="utf-8">
	<?php
	global $post;
	$root_color  = get_option('root_color','#333');
	$theme_dir   = get_template_directory();
	$content     = '';
	$content     = $post->post_content;?>
	<link rel="canonical" href="<?php echo get_permalink();?>">
	<title><?php wp_title('｜',true,'right');?></title>
	<?php include_once($theme_dir . '/inc/meta-info.php');?>
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<?php
	function amp_script($content){
		$html    = '';
		$pattern = '/https:\/\/twitter.com\/.*?\/status\/(.*?)"/i';
		if(preg_match($pattern,$content,$matches)===1){
			$html .= '<script async custom-element="amp-twitter" src="https://cdn.ampproject.org/v0/amp-twitter-0.1.js"></script>' . PHP_EOL;
		}
		$pattern = '/https:\/\/www.instagram.com\/p\/(.+?)\/"/i';
		if(preg_match($pattern,$content,$matches)===1){
			$html .= '<script custom-element="amp-instagram" src="https://cdn.ampproject.org/v0/amp-instagram-0.1.js" async></script>' . PHP_EOL;
		}
		$pattern = '/<iframe.+?src="https:\/\/www.youtube.com\/embed\/(.+?)(\?feature=oembed)?".*?><\/iframe>/i';
		if(preg_match($pattern,$content,$matches)===1){
			$html   .= '<script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>' . PHP_EOL;
			$content = preg_replace($pattern,'',$content);
		}
		$pattern = '/<iframe[^>]+?src="https:\/\/vine.co\/v\/(.+?)\/embed\/simple".+?><\/iframe>/i';
		if(preg_match($pattern,$content,$matches)===1){
			$html   .= '<script async custom-element="amp-vine" src="https://cdn.ampproject.org/v0/amp-vine-0.1.js"></script>' . PHP_EOL;
			$content = preg_replace($pattern,'',$content);
		}
		$pattern = '/<iframe[^>]+?src="https:\/\/www\.facebook\.com\/plugins\/(.*?)&.+?".+?><\/iframe>/i';
		if(preg_match($pattern,$content,$matches)===1){
			$html   .= '<script async custom-element="amp-facebook" src="https://cdn.ampproject.org/v0/amp-facebook-0.1.js"></script>' . PHP_EOL;
			$content = preg_replace($pattern,'',$content);
		}
		$pattern = '/<iframe/i';
		if(preg_match($pattern,$content,$matches)===1){
			$html .= '<script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>' . PHP_EOL;
		}
		echo $html;
	}amp_script();?>
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
			include_once($theme_dir . '/css/amp-style-singular.php');
		}elseif(is_author()===true){
			?>
			.bio-wrapper{
		        background-color:#fff;
				border-radius:3vmin;
				box-shadow:0 0 3vmin rgba(0,0,0,.2);
				box-sizing:border-box;
		        display:block;
				font-size:1.8rem;
				margin:4vh 2vh;
				min-height:40.5vmin;
				padding:2vh 4vh;
		        position:relative;
				text-align:center;
		        width:80vw;
		    }
		    .bio-img{
		        left:4vmin;
		        position:absolute;
		        top:2vmin;
		        width:calc(80vw / 10 * 3 - 1vmin);
		    }
		    .bio-info{
		        position:absolute;
		        right:0;
		        top:0;
				width:calc(80vw / 10 * 7);
		    }
		    .bio-name{
		        font-size:2.3rem;
		        text-align:center;
		        vertical-align:middle;
		    }
		    .bio-description{
		        font-size:1.6rem;
		    }
			<?php
		}
		include_once($theme_dir . '/css/mediaqueri.php');?>
	</style>
</head>
<body>
	<?php
	if(is_singular()===true){
		include_once($theme_dir . '/amp/content-singular.php');
	}else{
		include_once($theme_dir . '/amp/content-list.php');
	}?>
</body>
</html>