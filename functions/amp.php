<?php
add_rewrite_endpoint('amp',EP_ALL);
define('AMP_QUERY_VAR','amp');
function is_amp(){
    return false !== get_query_var(AMP_QUERY_VAR,false);
}

function corect_amp_script($array){
    $scripts = '';
    $name    = get_meta_url();
	if($array[0] > 0){
		$scripts .= '<script async custom-element="amp-twitter" src="https://cdn.ampproject.org/v0/amp-twitter-0.1.js"></script>' . PHP_EOL;
	}
    if($array[1] > 0){
		$scripts .= '<script async custom-element="amp-vine" src="https://cdn.ampproject.org/v0/amp-vine-0.1.js"></script>' . PHP_EOL;
	}
	if($array[2] > 0){
		$scripts .= '<script async custom-element="amp-facebook" src="https://cdn.ampproject.org/v0/amp-facebook-0.1.js"></script>' . PHP_EOL;
	}
	if($array[3] > 0){
		$scripts .= '<script custom-element="amp-instagram" src="https://cdn.ampproject.org/v0/amp-instagram-0.1.js" async></script>' . PHP_EOL;
	}
	if($array[4] > 0){
		$scripts .= '<script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>' . PHP_EOL;
	}
	if($array[5] > 0 || $array[6] > 0 || $array[7] > 0){
		$scripts .= '<script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>' . PHP_EOL;
	}
    $amp_script = make_transit_name($name);
    if(get_option('delete_amp_script_cache')===true){
        delete_site_transient($amp_script);
        set_site_transient($amp_script,$scripts,12 * WEEK_IN_SECONDS);
        return;
    }elseif(get_site_transient($amp_script)){
        return;
    }else{
        set_site_transient($amp_script,$scripts,12 * WEEK_IN_SECONDS);
        return;
    }
}

function sanitize_for_amp($content){
    $img     = 'src=' . get_parent_theme_file_uri('/inc/no-image/no-image_160x160.png');
    $insta   = array('/<iframe src="\/\/instagram.com\/p\/(.*?)\/embed\/\".*<\/iframe>/i','/<blockquote class="instagram-media".+?"https:\/\/www.instagram.com\/p\/(.+?)\/".+?<\/blockquote>.*?<script async defer src="\/\/platform.instagram.com\/.+?\/embeds.js"><\/script>/is');
    $content = preg_replace('/<blockquote class="twitter-tweet".*>.*<a href="https:\/\/twitter.com\/.*\/status\/(.*?).*<\/blockquote>.*<script async src="\/\/platform.twitter.com\/widgets.js" charset="utf-8"><\/script>/i','<div class=embed-container><amp-twitter width="800" height="600" layout="responsive" data-tweetid="$1" data-conversation="all" data-align="center"></amp-twitter></div>',$content,-1,$tw_count);
    $content = preg_replace('/<iframe width=\'100%\' src=\'https:\/\/vine.co\/v\/(.*?)\/embed\/simple\'.*><\/iframe>/i','<div class=embed-container><amp-vine data-vineid="$1" width="592" height="592" layout="responsive"></amp-vine></div>',$content,-1,$vine_count);
    $content = preg_replace('/<iframe src="https:\/\/(www\.)?facebook\.com\/plugins\/(post|video)\.php\?href=(.*?)&.+?".+?><\/iframe>/is','<div class=embed-container><amp-facebook width=486 height=657 layout="responsive" data-href="$1"></amp-facebook></div>',$content,-1,$fb_count);
    $content = preg_replace($insta,'<div class=embed-container><amp-instagram layout="responsive" data-shortcode="$1" width="592" height="716"></amp-instagram></div>',$content,-1,$insta_count);
    $content = preg_replace('/<iframe width="(.*?)" height="(.*?)" src="https:\/\/www.youtube.com\/embed\/(.*?)" allowfullscreen><\/iframe>/i','<div class=embed-container><amp-youtube width="$1" height="$2" layout="responsive" data-videoid="$3"></amp-youtube></div>',$content,-1,$youtube_count);
    $content = preg_replace('/<iframe src="https:\/\/www.google.com\/maps\/embed?(.*?)" (.*?)><\/iframe>/i','<div class=embed-container><amp-iframe layout="responsive" src="https://www.google.com/maps/embed?$1" width="600" height="450" layout="responsive" sandbox="allow-scripts allow-same-origin allow-popups" frameborder="0" allowfullscreen></amp-iframe></div>',$content,-1,$map_count);
    $content = preg_replace('/<iframe(.*?)src="https:\/\/(.*?).amazon(.*?)><\/iframe>/i','<div class=embed-container><amp-iframe width="120" height="240" sandbox="allow-scripts allow-same-origin" frameborder="0" $1src="https://$2.amazon$3></amp-iframe></div>',$content,-1,$aws_count);
    $content = preg_replace('/<iframe(.*?)><\/iframe>/i','<div class=embed-container><amp-iframe layout="responsive" height="576" width="1344" sandbox="allow-scripts" $1></amp-iframe></div>',$content,-1,$count);
    $content = preg_replace('/<img(.*?)>/i','<div><amp-img layout="responsive" height="576" width="1344" $1></amp-img></div>',$content);
    $content = preg_replace('/style="(.*?)"/','',$content);
    //$content = preg_replace('/onclick="(.*?)"/','',$content);
    //$content = preg_replace('/onmouseover="(.*?)"/','',$content);
    //$content = preg_replace('/onmouseout="(.*?)"/','',$content);
    //$content = preg_replace('/oncontextmenu="(.*?)"/','',$content);
    //$content = preg_replace('/<script>(.*?)<\/script>/i','',$content);
    //$content = preg_replace('/<script(.*?)><\/script>/i','',$content);
    $content = str_replace('href="javascript:void(0)"','',$content);
    $content = str_replace('href=javascript:void(0);','',$content);
    $content = str_replace('src=""',$img,$content);
    $array   = array($tw_count,$vine_count,$fb_count,$insta_count,$youtube_count,$map_count,$aws_count,$count);
    corect_amp_script($array);
    return $content;
}