<?php
add_rewrite_endpoint('amp',EP_ALL);
define('AMP_QUERY_VAR','amp');
function is_amp(){
    return false !== get_query_var(AMP_QUERY_VAR,false);
}

function corect_amp_script($array){
    $scripts = '<script async src="https://cdn.ampproject.org/v0.js"></script>';
	if($array[0] > 0){
		$scripts .= '<script async custom-element="amp-twitter" src="https://cdn.ampproject.org/v0/amp-twitter-0.1.js"></script>' . PHP_EOL;
	}
    if($array[1] > 0){
		$scripts .= '<script async custom-element="amp-vine" src="https://cdn.ampproject.org/v0/amp-vine-0.1.js"></script>' . PHP_EOL;
	}
	if($array[2] > 0 || $array[3] > 0){
		$scripts .= '<script async custom-element="amp-facebook" src="https://cdn.ampproject.org/v0/amp-facebook-0.1.js"></script>' . PHP_EOL;
	}
	if($array[4] > 0 || $array[5] > 0){
		$scripts .= '<script custom-element="amp-instagram" src="https://cdn.ampproject.org/v0/amp-instagram-0.1.js" async></script>' . PHP_EOL;
	}
	if($array[6] > 0 || $array[7] > 0){
		$scripts .= '<script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>' . PHP_EOL;
	}
	if($array[8] > 0 || $array[9] > 0 || $array[10] > 0){
		$scripts .= '<script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>' . PHP_EOL;
	}
    function enque_amp_scripts($scripts){
        $amp_scripts = $scripts;
        return $amp_scripts;
    }
    add_filter('wkwkrnht_amp_scripts',enque_amp_scripts($scripts));
}

function sanitize_for_amp($content){
    $img     = get_parent_theme_file_uri('/inc/no-image/no-image_128x128.png');
    $content = preg_replace('/<blockquote class="twitter-tweet".*>.*<a href="https:\/\/twitter.com\/.*\/status\/(.*).*<\/blockquote>.*<script async src="\/\/platform.twitter.com\/widgets.js" charset="utf-8"><\/script>/i','<div class=\'embed-container\'><amp-twitter width="800" height="600" layout="responsive" data-tweetid="$1" data-conversation="all" data-align="center"></amp-twitter></div>',$content,-1,$tw_count);
    $content = preg_replace('/<iframe width=\'100%\' src=\'https:\/\/vine.co\/v\/(.*)\/embed\/simple\'.*><\/iframe>/i','<div class=\'embed-container\'><amp-vine data-vineid="$1" width="592" height="592" layout="responsive"></amp-vine></div>',$content,-1,$vine_count);
    $content = preg_replace('/<iframe[^>]+?src="https:\/\/www\.facebook\.com\/plugins\/post\.php\?href=(.*?)&.+?".+?><\/iframe>/is','<amp-facebook width=486 height=657 layout="responsive" data-href="$1"></amp-facebook>',$content,-1,$fb_count);
    $content = preg_replace('/<iframe[^>]+?src="https:\/\/www\.facebook\.com\/plugins\/video\.php\?href=(.*?)&.+?".+?><\/iframe>/is','<amp-facebook width=486 height=657 layout="responsive" data-href="$1"></amp-facebook>',$content,-1,$fb_v_count);
    $content = preg_replace('/<blockquote class="instagram-media".+?"https:\/\/www.instagram.com\/p\/(.+?)\/".+?<\/blockquote>.*?<script async defer src="\/\/platform.instagram.com\/.+?\/embeds.js"><\/script>/is','<div class=\'embed-container\'><amp-instagram layout="responsive" data-shortcode="$1" width="592" height="716"></amp-instagram></div>',$content,-1,$insta_count);
    $content = preg_replace('/<iframe src=\'\/\/instagram.com\/p\/(.*)\/embed\/\'.*<\/iframe>/i','<div class=\'embed-container\'><amp-instagram layout="responsive" data-shortcode="$1" width="592" height="716" ></amp-instagram></div>',$content,-1,$insta_2_count);
    $content = preg_replace('/https:\/\/youtu.be\/(.*)/i','<div class=\'embed-container\'><amp-youtube layout="responsive" data-videoid="$1" width="592" height="363"></amp-youtube></div>',$content,-1,$youtube_count);
    $content = preg_replace('/<iframe width="853" height="480" src="https:\/\/www.youtube.com\/embed\/(.*)" frameborder="0" allowfullscreen><\/iframe>.*<\/div>/i','<div class=\'embed-container\'><amp-youtube layout="responsive" data-videoid="$1" width="592" height="363"></amp-youtube></div>',$content,-1,$youtube_2_count);
    $content = preg_replace('/<iframe src="https:\/\/www.google.com\/maps\/embed?(.*?)" (.*?)><\/iframe>/i','<div><amp-iframe layout="responsive" src="https:\/\/www.google.com\/maps\/embed?$1" width="600" height="450" layout="responsive" sandbox="allow-scripts allow-same-origin allow-popups" frameborder="0" allowfullscreen></amp-iframe></div>',$content,-1,$map_count);
    $content = preg_replace('/<iframe (.*?)src="https:\/\/(.*?).amazon(.*?)><\/iframe>/i','<amp-iframe width="120" height="240" sandbox="allow-scripts allow-same-origin" frameborder="0" $1src="https://$2.amazon$3 ></amp-iframe>',$content,-1,$aws_count);
    $content = preg_replace('/<iframe(.*?)><\/iframe>/i','<div><amp-iframe layout="responsive" height="576" width="1344" $1></amp-iframe></div>',$content,-1,$count);
    $content = preg_replace('/<img(.*?)>/i','<div><amp-img layout="responsive" height="576" width="1344" $1></amp-img></div>',$content);
    $content = preg_replace('/<a class="embedly-card" href="(.*?)"><\/a><script async src="\/\/cdn.embedly.com\/widgets\/platform.js"><\/script>/i','<a href="$1">$1</a>',$content);
    $content = preg_replace('/<(.*?)frameborder=".*?"(.*?)>/','<$1$2>',$content);
    $content = preg_replace('/<(.*?)border=".*?"(.*?)>/','<$1$2>',$content);
    $content = preg_replace('/<(.*?)style=".*?"(.*?)>/','<$1$2>',$content);
    $content = preg_replace('/<(.*?)onclick=".*?"(.*?)>/','<$1$2>',$content);
    $content = preg_replace('/<(.*?)onmouseover=".*?"(.*?)>/','<$1$2>',$content);
    $content = preg_replace('/<(.*?)onmouseout=".*?"(.*?)>/','<$1$2>',$content);
    $content = preg_replace('/<(.*?)oncontextmenu=".*?"(.*?)>/','<$1$2>',$content);
    $content = preg_replace('/<(.*?)target=".*?"(.*?)>/','<$1$2>',$content);
    $content = preg_replace('/<(.*?)marginwidth=".*?"(.*?)>/i','<$1$2>',$content);
    $content = preg_replace('/<(.*?)marginheight=".*?"(.*?)>/i','<$1$2>',$content);
    $content = preg_replace('/<script>(.*?)<\/script>/i','',$content);
    $content = str_replace('href="javascript:void(0)"','',$content);
    $content = str_replace('href=javascript:void(0);','',$content);
    $content = str_replace('src=""',$img,$content);
    $array   = array($tw_count,$vine_count,$fb_count,$fb_v_count,$insta_count,$insta_2_count,$youtube_count,$youtube_2_count,$map_count,$aws_count,$count);
    corect_amp_script($array);
    return $content;
}