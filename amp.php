<!DOCTYPE html>
<html amp class="amp">
<head>
	<meta charset="utf-8">
	<?php
	$root_color  = get_option('root_color','#333');
	$meta_image  = get_meta_image();
	$blog_name   = get_bloginfo('name');
	$description = get_meta_description();?>
	<link rel="canonical" href="<?php echo get_permalink();?>">
	<title><?php wp_title('｜',true,'right');?></title>
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
	<meta name="google-site-verification" content="<?php echo get_option('Google_Webmaster');?>">
	<meta name="msvalidate.01" content="<?php echo get_option('Bing_Webmaster');?>">
	<meta name="theme-color" content="<?php echo get_option('GoogleChrome_URLbar');?>">
	<meta name="msapplication-TileColor" content="<?php echo get_option('GoogleChrome_URLbar');?>">
	<meta name="renderer" content="webkit">
	<meta name="description" content="<?php echo $description;?>">
	<meta property="fb:app_id" content="<?php echo get_option('facebook_appid');?>">
	<meta property='og:type' content='article'>
	<meta property='og:title' content="<?php wp_title('｜',true,'right');?>">
	<meta property='og:url' content="<?php echo get_permalink();?>">
	<meta property='og:description' content="<?php echo $description;?>">
	<meta property='og:site_name' content="<?php echo $blog_name;?>">
	<meta property='og:image' content="<?php echo $meta_image;?>">
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
	<script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
	<script async custom-element="amp-facebook" src="https://cdn.ampproject.org/v0/amp-facebook-0.1.js"></script>
	<script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
	<script async custom-element="amp-vine" src="https://cdn.ampproject.org/v0/amp-vine-0.1.js"></script>
	<script async custom-element="amp-twitter" src="https://cdn.ampproject.org/v0/amp-twitter-0.1.js"></script>
	<script async custom-element="amp-instagram" src="https://cdn.ampproject.org/v0/amp-instagram-0.1.js"></script>
	<style amp-custom>
		:root{
			color:<?php echo $root_color;?>;
			font:400 62.5%/1.9 -apple-system,"Lucida Grande","Helvetica Neue","Hiragino Kaku Gothic ProN","游ゴシック","メイリオ",'Meiryo',sans-serif;
			font-feature-settings:"pkna" on;
			-webkit-font-smoothing:antialiased;
			-moz-osx-font-smoothing:grayscale;
			-ms-text-size-adjust:100%;
			-webkit-text-size-adjust:100%;
		}
		body{
			margin:0;
			overflow-y:scroll;
			scroll-behavior:smooth;
			width:100%;
		}
		article,aside,details,figcaption,figure,footer,header,main,menu,nav,section,summary{
			display:block;
		}
		audio,canvas,progress,video{
			display:inline-block;
		}
		audio:not([controls]){
			display:none;
			height:0;
		}
		progress{
			vertical-align:baseline;
		}
		template,[hidden]{
			display:none;
		}
		a{
			background-color:transparent;
			border-bottom:0;
			color:<?php echo get_option('a_color','#03a9f4');?>;
			-webkit-text-decoration-skip:objects;
			text-decoration:none;
		}
		a:visited{
			color:<?php echo get_option('a_visited_color','#03a9f4');?>;
		}
		a:active,a:hover{
			outline-width:0;
		}
		a:active{
			color:<?php echo get_option('a_active_color','#03a9f4');?>;
		}
		abbr[title]{
			border-bottom:0;
			text-decoration:underline;
			text-decoration:underline dotted;
		}
		b,strong{
			font-weight:inherit;
			font-weight:bolder;
		}
		dfn{
			font-style:italic;
		}
		h1{
			font-size:2em;
			margin:.67em 0;
		}
		mark{
			background-color:<?php echo get_option('mark_background','#ff0');?>;
			color:<?php echo get_option('mark_color','#333');?>;
		}
		small{
			font-size:80%;
		}
		sub,sup{
			font-size:75%;
			line-height:0;
			position:relative;
			vertical-align:baseline;
		}
		sub{
			bottom:-.25em;
		}
		sup{
			top:-0.5em;
		}
		img{
			border-style:none;
			-ms-interpolation-mode:bicubic;
			image-rendering:pixelated;
			object-fit:contain;
		}
		img[src$=".gif"],img[src$=".png"]{
			image-rendering:-moz-crisp-edges;
			image-rendering:-o-crisp-edges;
			image-rendering:-webkit-optimize-contrast;
			image-rendering:crisp-edges;
		}
		svg:not(:root){
			overflow:hidden;
		}
		code,kbd,pre,samp{
			font-family:monospace,monospace;
			font-size:1em;
		}
		pre{
			tab-size:4;
		}
		figure{
			margin:1em 2.5rem;
		}
		hr{
			box-sizing:content-box;
			height:0;
			overflow:visible;
		}
		button,input,select,textarea{
			font:inherit;
			margin:0;
		}
		optgroup{
			font-weight:700;
		}
		button,input{
			overflow:visible;
		}
		button,select{
			text-transform:none;
		}
		button,html [type="button"],[type="reset"],[type="submit"]{
			-webkit-appearance:button;
		}
		button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner{
			border-style:none;
			padding:0;
		}
		button:-moz-focusring,[type="button"]:-moz-focusring,[type="reset"]:-moz-focusring,[type="submit"]:-moz-focusring{
			outline:1px dotted ButtonText;
		}
		fieldset{
			border:1px solid silver;
			margin:0 2px;
			padding:.35em .625em .75em;
		}
		legend{
			box-sizing:border-box;
			color:inherit;
			display:table;
			max-width:100%;
			padding:0;
			white-space:normal;
		}
		textarea{
			overflow:auto;
		}
		[type="checkbox"],[type="radio"]{
			box-sizing:border-box;
			padding:0;
		}
		[type="number"]::-webkit-inner-spin-button,[type="number"]::-webkit-outer-spin-button{
			height:auto;
		}
		[type="search"]{
			-webkit-appearance:textfield;
			outline-offset:-2px;
		}
		[type="search"]::-webkit-search-cancel-button,[type="search"]::-webkit-search-decoration{
			-webkit-appearance:none;
		}
		::-webkit-input-placeholder{
			color:inherit;
			opacity:.54
		}
		::-webkit-file-upload-button{
			-webkit-appearance:button;
			font:inherit;
		}
		.vcard,.fn,.author{
			margin:0;
		}
		.card-list{
	        -webkit-align-content:space-around;
			align-content:space-around;
			align-items:baseline;
			background-color:<?php echo get_option('card_list_background','#fff');?>;
			display:-webkit-flex;
			display:flex;
			-webkit-flex-flow:row wrap;
			flex-flow:row wrap;
			justify-content:space-around;
	    }
	    .card{
	        background-color:#fff;
			border-radius:3vmin;
			box-shadow:0 0 3vmin rgba(0,0,0,.2);
			box-sizing:border-box;
			font-size:1.8rem;
			margin:4vh 2vh;
			min-height:30vmax;
			padding:2vh 4vh;
			text-align:center;
			width:30vmax;
	    }
	    .info-card{
	        width:60vmax;
	    }
	    .article-card{
	        box-shadow:0 0 3vmin rgba(0,0,0,.2);
	        display:block;
	        height:30vmax;
	        margin:6vh auto;
	        position:relative;
	        width:30vmax;
	    }
	    .article-card,.article-card:visited{
	        color:#fff;
	    }
	    .card-img,.card-meta{
	        bottom:0;
	        position:absolute;
	    }
	    .card-img{
	        height:100%;
	        width:100%;
	    }
	    .card-meta{
	        background-color:rgba(0,0,0,.5);
	        height:35%;
	        width:100%;
	    }
	    .card-meta > h2{
	        overflow:hidden;
	        text-align:center;
	        text-overflow:ellipsis;
	        white-space:nowrap;
	    }
	    .card-meta > div{
	        font-size:1.8rem;
	        width:100%;
	    }
	    .card-meta > div > span{
	        box-sizing:border-box;
	        display:inline-block;
	        padding:0 1em;
	        width:49%;
	    }

	    .site-header{
			<?php
			if(get_header_image()){
				echo'background-image:url(' . get_header_image() . ');';
			}else{
				echo'background-color:' . get_option('site_header_background','#03a9f4') . ';';
			}?>
			box-shadow:0 0 3vmin rgba(0,0,0,.1);
			height:10%;
			margin:0 0 5vh 0;
			padding:3vh 0 5vh;
			text-align:center;
			width:100%;
		}
		.site-header,.site-header a{
			color:<?php echo get_option('site_header_color','#fff');?>;
		}
		.site-title{
			font-size:2.5rem;
		}
		.site-description,.site-header .copyright{
			font-size:1.8rem;
		}

		.toc{
			box-shadow:0 0 3vmin rgba(0,0,0,.2);
			margin:4vh auto;
			padding:4vh 0;
			width:90%;
		}
		.toc-toggle{
			background-color:#03a9f4;
			border-radius:50%;
			box-shadow:0 0 3vmin rgba(0,0,0,.3);
			color:#fff;
			display:block;
			font-size:1.8rem;
			height:3em;
			left:85vw;
			position:relative;
			text-align:center;
			top:-1.5em;
			width:3em;
		}

		.marker{
			box-shadow:0 -0.3em 0 -0.1em rgb(255,255,0) inset;
		}

		.ogp-blogcard{
			background-color:#fff;
			border:1px solid #e5e5e5;
			border-radius:3vmin;
			box-shadow:0 0 3vmin rgba(0,0,0,.15);
			display:block;
			height:37vh;
			padding:2vmin 5vmin;
			position:relative;
			margin:3vmin auto;
			width:80vw;
		}
		.ogp-blogcard-share{
			background-color:rgba(0,0,0,.3);
			border-radius:3vmin;
			height:calc(37vh + 2vmin * 2);
			left:0;
			position:absolute;
			top:0;
			width:calc(80vw + 5vmin * 2);
			z-index:2;
		}
		.ogp-blogcard-share-close{
			font-size:3rem;
			position:absolute;
			right:2em;
			top:1em;
		}
		.ogp-blogcard-share > ul{
			list-style:none;
		}
		.ogp-blogcard-share > ul > li{
			border:1px solid #fff;
			display:inline-block;
			font-size:2.2rem;
			margin:2vmin auto;
			padding:1em;
		}
		.ogp-blogcard-share-close,.ogp-blogcard-share-close:visited,.ogp-blogcard-share > ul > li > a,.ogp-blogcard-share > ul > li > a:visited{
			color:#fff;
		}
		.ogp-blogcard-share-toggle{
			background-color:#03a9f4;
			border-radius:50%;
			color:#fff;
			display:block;
			height:4em;
			left:0em;
			line-height:4em;
			position:absolute;
			top:0em;
			text-align:center;
			width:4em;
		}
		.ogp-blogcard-main{
			height:calc(37vh * .8);
			margin-bottom:1vh;
			position:absolute;
			top:0;
			width:80vw;
		}
		.ogp-blogcard-img{
			display:inline-block;
			max-height:calc(37vh * .75);
			max-width:calc(80vw * .4);
		}
		.ogp-blogcard-info{
			display:inline-block;
			max-width:calc(80vw * .6);
			position:absolute;
			right:0;
			text-align:center;
		}
		.ogp-blogcard-title{
			font-size:2rem;
		}
		.ogp-blogcard-site-name{
			display:none;
		}

		.information,.question{
			background-color:#f4f3eb;
			border-radius:3vmin;
			margin:1em auto;
			padding:2em;
			padding-left:calc(7rem + 2vmin);
			position:relative;
		}
		.information::before,.question::before{
			background-color:#eae3b4;
			border-radius:50%;
			color:#f4f3eb;
			display:inline-block;
			font-size:5rem;font-weight:700;
			height:7rem;
			left:1vmin;
			line-height:7rem;
			margin-right:7rem;
			position:absolute;
			text-align:center;
			top:1vmin;
			width:7rem;
		}
		.information::before{
			content:"ｉ";
		}
		.question::before{
			content:"？";
		}

		.cutin-box{
			color:#fff;
			box-sizing:border-box;
			margin:2vh auto;
			padding:1vh 2vh;
			text-align:center;
			width:calc(80% + (3vh * 2));
		}
		.red.cutin-box{
			background-color:#f44336;
		}
		.blue.cutin-box{
			background-color:#03a9f4;
		}
		.yellow.cutin-box{
			background-color:#ffeb3b;
		}
		.orange.cutin-box{
			background-color:#ff9800;
		}
		.green.cutin-box{
			background-color:#8bc34a;
		}
		.black.cutin-box{
			background-color:#333;
		}
		.cutin-box > h3{
			font-weight:700;
		}
		.cutin-box-inner{
			background-color:#fff;
			border:1vh solid;
			color:#333;
			box-sizing:border-box;
			margin:0;
			padding:1vh 2vh;
			text-align:initial;
			width:calc(80% + (2vh * 2));}
		.red.cutin-box > .cutin-box-inner{
			border-color:#f44336;
		}
		.blue.cutin-box > .cutin-box-inner{
			border-color:#03a9f4;
		}
		.yellow.cutin-box > .cutin-box-inner{
			border-color:#ffeb3b;
		}
		.orange.cutin-box > .cutin-box-inner{
			border-color:#ff9800;
		}
		.green.cutin-box > .cutin-box-inner{
			border-color:#8bc34a;
		}
		.black.cutin-box > .cutin-box-inner{
			border-color:#333;
		}

		.button{
			border-radius:1.5vmin;
			box-sizing:border-box;
			color:#fff;
			display:block;
			font-size:2rem;
			font-weight:600;
			line-height:2;
			margin:2vh auto;
			min-height:4rem;
			padding:2vmin 5vmin;
			position:relative;
			text-align:center;
			width:80%;
		}
		.button:hover{
			top:.2vmin;
		}
		.red.button{
			background-color:#f44336;
			box-shadow:0 1vmin 0 #d32f2f;
		}
		.red.button:hover{
			box-shadow:0 .75vmin 0 #d32f2f;
		}
		.blue.button{
			background-color:#03a9f4;
			box-shadow:0 1vmin 0 #0288d1;
		}
		.blue.button:hover{
			box-shadow:0 .75vmin 0 #0288d1;
		}
		.yellow.button{
			background-color:#ffeb3b;
			box-shadow:0 1vmin 0 #fbc02d;
		}
		.yellow.button:hover{
			box-shadow:0 .75vmin 0 #fbc02d;
		}
		.orange.button{
			background-color:#ff9800;
			box-shadow:0 1vmin 0 #f57c00;
		}
		.orange.button:hover{
			box-shadow:0 .75vmin 0 #f57c00;
		}
		.green.button{
			background-color:#8bc34a;
			box-shadow:0 1vmin 0 #689f38;
		}
		.green.button:hover{
			box-shadow:0 .75vmin 0 #689f38;
		}
		.black.button{
			background-color:#333;
			box-shadow:0 1vmin 0 #9e9e9e;
			color:#333;
		}
		.black.button:hover{
			box-shadow:0 .75vmin 0 #9e9e9e;
		}

		.search-form{
			line-height:170%;
			margin:2vh auto;
		}
		.search-form div{
			border:1px solid #555;
			border-radius:3vmin;
			display:inline-block;
			margin-left:1em;
			padding:5px;
		}
		.search-form .sform{
			background-color:#fff;
			min-width:280px;
		}
		.search-form .sbtn{
			background-color:#1155ee;
			color:#fff;
			padding-left:2rem;
			padding-right:3rem;
			position:absolute;
		}
		.search-form .sbtn::after{
			bottom:-28px;
			color:#000;
			content:"\f25a";
			font-family:"FontAwesome";
			font-size:2.5rem;
			position:absolute;
		}
		/*
		    article
		1.header
		2.p & a
		3.hx
		4.pre & address & quote & embed
		5.list
		6.table
		7.img
		8.page-navigation
		9.for chat format
		10.original
		11.codex
		*/
        .article-header{
            background-color:<?php echo get_option('article_header_background','#f4f4f4');?>;
            border:1px dashed <?php echo get_option('article_header_border','#ccc');?>;
            box-shadow:0 2vh 3vh -1vh rgba(0,0,0,.1) inset;
            box-sizing:border-box;
            height:45vw;
            margin:4vh auto;
            padding:2vh 4vh;
            width:80vw;
        }
        .article-eyecatch,.article-meta,.article-date,.article-author{
            display:inline-block;
    	}
        .article-eyecatch{
            height:25vw;
            width:25vw;
        }
        .article-meta{
            box-sizing:border-box;
            padding:1vh 2vh;
            width:45vw;
        }
        .article-title,.article-meta > div{
            width:100%;
        }
        .article-date,.article-author{
            width:49%;
        }

        .article-main{
			font-size:1.6rem;
		}
		.article-main p{
			margin:2vh auto;
			max-width:calc(1.6rem * 40);
			padding:1vh .5vh;
		}
		.article-main a[href^="http"]:empty::before{
			content:attr(href);
		}
		.article-main a[href^="http"][title]:empty::before{
			content:attr(title);
		}
		.article-main a[href*=".png"],.article-main a[href*=".jpg"],.article-main a[href*=".jpeg"],.article-main a[href*=".gif"]{
			display:block;
			margin:2vh auto;
		}
		.article-main a:hover,.article-main a:focus{
			border-bottom:solid 1px <?php echo get_option('article_main_a_hover_border','#03a9f4');?>;
		}

		.article-main h1,.article-main h2,.article-main h3,.article-main h4,.article-main h5,.article-main h6{
			line-height:6vh;
			margin:2vh auto;
			max-width:90%;
			min-height:6vh;
			text-align:center;
		}
		.article-main h3,.article-main h4,.article-main h5,.article-main h6{
			font-size:2rem;
		}
		.article-main h1{
			background-color:<?php echo get_option('article_main_h1_background','#f4f4f4');?>;
			border-bottom:1px dashed <?php echo get_option('article_main_h1_border','#ccc');?>;
			border-top:1px dashed <?php echo get_option('article_main_h1_border','#ccc');?>;
			box-shadow:0 7px 10px -5px rgba(0,0,0,.1) inset;
			counter-increment:counter-h1;
			counter-reset:counter-h2;
			padding:.75em;
		}
		.article-main h2{
			background-color:<?php echo get_option('article_main_h2_background','#03a9f4');?>;
			box-shadow:0 0 3vmin rgba(0,0,0,.2);
			color:<?php echo get_option('article_main_h2_color','#fff');?>;
			counter-increment:counter-h2;
			counter-reset:counter-h3;
		}
		.article-main h2 > a:visited{
			color:<?php echo get_option('article_main_h2_color','#fff');?>;
		}
		.article-main h3{
			border:1vmin solid <?php echo get_option('article_main_h3_border','#03a9f4');?>;
			box-shadow:0 0 3vmin rgba(0,0,0,.1);
			color:<?php echo get_option('article_main_h3_color','#03a9f4');?>;
			counter-increment:counter-h3;
			counter-reset:counter-h4;
		}
		.article-main h3 > a:visited{
			color:<?php echo get_option('article_main_h3_color','#03a9f4');?>;
		}
		.article-main h4{
			border-bottom:1px solid;
			border-left:.5em solid <?php echo get_option('article_main_h4_border','#03a9f4');?>;
			counter-increment:counter-h4;
			counter-reset:counter-h5;
		}
		.article-main h5{
			border-left:.5em solid <?php echo get_option('article_main_h5_border','#03a9f4');?>;
			counter-increment:counter-h5;
			counter-reset:counter-h6;
		}
		.article-main h6{
			border-bottom:.75vmin dashed <?php echo get_option('article_main_h6_border','#03a9f4');?>;
			counter-increment:counter-h6;
		}

		.article-main pre,.article-main address{
			margin:1vh auto;
			max-width:94%;
		}
		.article-main pre{
			font-weight:bold;
		}
		.article-main code{
			overflow-x:auto;
			white-space:pre;
		}
		.article-main address,.article-main code,.article-main q{
			background-color:#eee;
		}
		.article-main blockquote,.article-main q{
			padding:1em 2em;
			quotes:none;
		}
		.article-main blockquote{
			border:1px solid <?php echo get_option('article_main_bq_border','#bbb');?>;
			border-radius:3vmin;
		}
		.article-main blockquote::after{
			border-top:1px solid <?php echo get_option('article_main_bq_border','#bbb');?>;
			content:attr(title)"\a" attr(cite);
			display:block;
			padding-top:1em;
			text-align:right;
			white-space:pre-wrap;
			word-wrap:break-word;
		}
		.article-main > div{
			margin:4vh auto;
			max-width:80%;
		}
		.article-main iframe[src*="youtu.be"],.article-main iframe[src*="youtube.com"],.article-main iframe[src*="www.youtube.com"]{
			height:calc(80vw / 100 * 56.25);
			margin:4vh auto;
			width:80vw;
		}
		.article-main p iframe[src*="youtu.be"],.article-main p iframe[src*="youtube.com"],.article-main p iframe[src*="www.youtube.com"]{
			height:calc(80vw / 100 * 56.25);
			margin:4vh 0;
			max-height:calc(720px / 100 * 56.25);
			max-width:720px;
			width:80vw;
		}

		.article-main li::after{
			border-bottom:1px dashed <?php echo get_option('article_main_li_border','#aaa');?>;
			content:"";
			display:block;
			height:0;
			left:0;
			position:relative;
			top:0;
			width:100%;
		}
		.article-main ul{
			list-style:none;
			margin:2em auto;
			max-width:80%;
		}
		.article-main ul li::before{
			color:<?php echo get_option('article_main_li_color','#03a9f4');?>;
			content:"●";
			display:inline;
			font-size:.8em;
			padding-right:1em;
		}
		.article-main ol{
			counter-reset:counter-name;
		}
		.article-main ol li:before{
			background-color:<?php echo get_option('article_main_ol_background','#03a9f4');?>;
			border-radius:50%;
			color:<?php echo get_option('article_main_ol_color','#fff');?>;
			content:counter(counter-name);
			counter-increment:counter-name;
			display:inline-block;
			height:1.5em;
			left:0;
			line-height:1.5em;
			position:absolute;
			text-align:center;
			width:1.5em;
		}
		.article-main ol li{
			list-style:none;
			margin:0;
			padding-left:2em;
			padding-top:.1em;
			position:relative;
		}

		.article-main table{
			border-collapse:collapse;
			box-sizing:border-box;
			margin:2vh auto;
			table-layout:fixed;
			width:calc(100% - 16vmin);
		}
		.article-main table caption{
			background-color:<?php echo get_option('article_main_table_caption_background','#ffc045');?>;
			padding:1.2em;
			text-align:center;
		}
		.article-main table tr th{
			background-color:<?php echo get_option('article_main_th_background','#03a9f4');?>;
			color:<?php echo get_option('article_main_th_color','#fff');?>;
		}
		.article-main table tr th,.article-main table tr td{
			border:1px solid <?php echo get_option('article_main_li_border','#cfcfcf');?>;
			padding:1.2em;
			text-align:center;
		}
		.article-main table tr:last-child{
			border-left:none;
		}
		.article-main table:last-child{
			border-bottom:none;
		}

		.article-main .toc-title{
			max-width:80%;
		}
		.article-main .toc-title:hover::before{
			content:"";
		}
		.article-main .cutin-box > h3{
			box-shadow:none;
			color:#fff;
		}
		.article-main .ogp-blogcard-share > ul > li::before,.article-main .ogp-blogcard-share > ul > li::after{
			display:none;
		}
		.article-main .ogp-blogcard-main{
			border:0;
			padding:0;
		}
		.article-main .ogp-blogcard-main::after{
			display:none;
		}
		.article-main .ogp-blogcard img{
			display:inline-block;
		}
		.article-main .ogp-blogcard-title{
			box-shadow:none;
		}
		.article-main .ogp-blogcard-description,.article-main .ogp-blogcard-site-name{
			color:<?php echo $root_color;?>;
		}
		.article-main .ogp-blogcard-description:visited,.article-main .ogp-blogcard-site-name:visited{
			color:<?php echo $root_color;?>;
		}

		.article-main img{
			display:block;
			height:auto;
			line-height:2;
			margin:4vh auto;
			min-height:50px;
			position:relative;
			text-align:center;
			width:100%;
		}
		.article-main img::before{
			background-color:#f1f1f1;
			border:1vmin dashed #ddd;
			border-radius:3vmin;
			content:"";
			display:block;
			height:calc(100% + 2em);
			left:0;
			position:absolute;
			top:-2em;
			width:100%;
		}
		.article-main img::after{
			color:rgb(100,100,100);
			content:"\f127" "この画像が読み込めませんでした。" attr(alt);
			display:block;
			font-family:"FontAwesome";
			font-size:1.8rem;
			font-style:normal;
			left:0;
			position:absolute;
			text-align:center;
			top:1em;
			width:100%;
		}
		.wp-caption{
			background-color:#f4f4f4;
			box-shadow:0 0 3vmin rgba(0,0,0,.1);
			height:3em;
			margin:4vh auto;
			max-width:96%;
			padding:1em .5em;
			text-align:center;
		}
		.wp-caption.alignleft{
			margin-left:0;
		}
		.wp-caption.alignright{
			margin-right:0;
		}
		.wp-caption img{
			border:0;
			height:auto;
			margin:0;
			max-width:100%;
			padding:0;
			width:auto;
		}
		.wp-caption p.wp-caption-text{
			font-size:.9em;
			margin:0;
			padding:1.5em 2em;
		}
		.alignnone,a img.alignnone{
			margin:2vh 3vw 6vh 0;
		}
		.alignright,a img.alignright{
			float:right;
			margin:2vh 0 6vh 3vw;
		}
		.aligncenter,div.aligncenter{
			display:block;
			margin:1vh auto;
		}
		.alignleft,a img.alignleft{
			float:left;
			margin:2vh 3vw 6vh 0;
		}
		a img.aligncenter{
			display:block;
			margin-left:auto;
			margin-right:auto;
		}

		.page-nav{
			text-align:center;
		}
		.page-nav a{
			color:<?php echo get_option('page_nav_color','#03a9f4');?>;
			margin:0 1em;
		}
		.page-nav a:hover{
			border-bottom:solid 1px <?php echo get_option('page_nav_hover_border','#03a9f4');?>;
		}

		.format-chat .article-main p{
			border:1px solid #777;
			border-radius:5vmin;
			display:block;
			font-size:1.8rem;
			height:3em;
			margin-bottom:2em;
			padding:1em;
			vertical-align:middle;
			width:60%;
		}
		.format-chat .article-main p:nth-of-type(odd){
			background-color:rgba(139,195,74,.6);
			clear:both;
			float:left;
			margin-left:3vmin;
		}
		.format-chat .article-main p:nth-of-type(even){
			background-color:rgba(230,230,230,.6);
			clear:both;
			float:right;
			margin-right:3vmin;
		}

		.sticky,.gallery-caption,.bypostauthor{}
	    /*
	        Media Queri
	    1.PC style
	    2.mobile style
	    */
	    @media screen and (min-width:720px){
	        .hatenablogcard{
				margin:5vh auto;
				max-width:60vw;
			}
			.information,.question{
				width:80%;
			}
	    }
	    @media screen and (max-width:720px;){
	        .toc,.article-main .toc-title{
				width:94%;
			}
			.hatenablogcard{
				margin:5vh auto;
				max-width:70vw;
			}
			.ogp-blogcard{
				border-width:2vmin;
				max-width:94%;
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
			$img     = ' src="' . get_no_image() . '"';
			$content = '';
			if(have_posts()):while(have_posts()):the_post();$content = get_the_content();endwhile;endif;

			$content = apply_filters('the_content',$content);
			$content = str_replace(']]>',']]&gt;',$content);
			$content = preg_replace('/<blockquote class="twitter-tweet".*>.*<a href="https:\/\/twitter.com\/.*\/status\/(.*).*<\/blockquote>.*<script async src="\/\/platform.twitter.com\/widgets.js" charset="utf-8"><\/script>/i','<div class=\'embed-container\'><amp-twitter width="800" height="600" layout="responsive" data-tweetid="$1" data-conversation="all" data-align="center"></amp-twitter></div>',$content);
			$content = preg_replace('/<iframe width=\'100%\' src=\'https:\/\/vine.co\/v\/(.*)\/embed\/simple\'.*><\/iframe>/i','<div class=\'embed-container\'><amp-vine data-vineid="$1" width="592" height="592" layout="responsive"></amp-vine></div>',$content);
			$content = preg_replace('/<iframe src=\'\/\/instagram.com\/p\/(.*)\/embed\/\'.*<\/iframe>/i','<div class=\'embed-container\'><amp-instagram layout="responsive" data-shortcode="$1" width="592" height="716" ></amp-instagram></div>',$content);
			$content = preg_replace('/https:\/\/youtu.be\/(.*)/i','<div class=\'embed-container\'><amp-youtube layout="responsive" data-videoid="$1" width="592" height="363"></amp-youtube></div>',$content);
			$content = preg_replace('/<iframe width="853" height="480" src="https:\/\/www.youtube.com\/embed\/(.*)" frameborder="0" allowfullscreen><\/iframe>.*<\/div>/i','<div class=\'embed-container\'><amp-youtube layout="responsive" data-videoid="$1" width="592" height="363"></amp-youtube></div>',$content);
			$content = preg_replace('/<iframe class="hatenablogcard" src="http:\/\/hatenablog-parts.com\/embed?url=(.*?)" frameborder="0" scrolling="no"><\/iframe>/i','<a href="$1">$1</a>',$content);
			$content = preg_replace('/<a class="embedly-card" href="(.*?)"><\/a><script async="" charset="UTF-8" src="\/\/cdn.embedly.com\/widgets\/platform.js"><\/script>/i','<a href="$1">$1</a>',$content);
			$content = preg_replace('/<iframe src="https:\/\/www.google.com\/maps\/embed?(.*?)" (.*?)><\/iframe>/i','<div><amp-iframe layout="responsive" src="https:\/\/www.google.com\/maps\/embed?$1" width="600" height="450" layout="responsive" sandbox="allow-scripts allow-same-origin allow-popups" frameborder="0" allowfullscreen></amp-iframe></div>',$content);
			$content = preg_replace('/<iframe (.*?)src="https:\/\/(.*?).amazon(.*?)><\/iframe>/i','<amp-iframe width="120" height="240" sandbox="allow-scripts allow-same-origin" frameborder="0" $1src="https://$2.amazon$3 ></amp-iframe>',$content);
			$content = preg_replace('/<iframe(.*?)><\/iframe>/i','<div><amp-iframe layout="responsive" height="576" width="1344" $1></amp-iframe></div>',$content);
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
		</footer>
	</article>
</body>
</html>
