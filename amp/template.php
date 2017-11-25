<!DOCTYPE html>
<html amp class="amp">
<head>
	<meta charset="utf-8">
	<?php
	global $post;
	$root_color  = get_option('root_color','#333');
	$theme_dir   = get_template_directory();
	$html        = '';
	$content     = '';
	$content     = $post->post_content;?>
	<link rel="canonical" href="<?php the_permalink();?>">
	<title><?php wp_title('｜',true,'right');bloginfo()?></title>
	<?php include_once($theme_dir . '/inc/meta-info.php');?>
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<?php
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
	wkwkrnht_load_analytics();?>
	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style amp-custom>
		<?php wkwkrnht_load_style();?>
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