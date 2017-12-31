<!DOCTYPE html>
<html amp class="amp">
<head>
	<meta charset="utf-8">
	<link rel="canonical" href="<?php the_permalink();?>">
	<title><?php wp_title('｜',true,'right');bloginfo();?></title>
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<?php
	$theme_dir = get_template_directory();
	$url       = get_meta_url();
	if(strlen($url) > 20){
        $amp_script = wordwrap($url,20);
    }else{
        $amp_script = $url;
    }
	include_once($theme_dir . '/inc/meta-info.php');
	echo get_site_transient($amp_script);
	wkwkrnht_load_analytics();?>
	<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
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