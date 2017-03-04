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
			?>
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
			<?php
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
	if(is_singlar()===true){
		include_once($theme_dir . '/amp/content-singular.php');
	}else{
		include_once($theme_dir . '/amp/content-list.php');
	}?>
</body>
</html>