<?php
/*
    utility
1.GET URL accessed now
2.is_user_agent_bot
3.sanitize_checkbox
4.sanitize_radio
5.#xxxxxx exchange rgb(xx,xx,xx) (for CSS)
6.color changed by brigtness (for CSS)
7.ADD param of "is_amp"
8.is_subpage
9.is_actived_plugin
10.get_mtime
11.get_first_post_year
12.sanitize_for_amp
13.LOAD style
*/
function get_meta_url(){
    return (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

function is_user_agent_bot(){
    $bot_list = array('Google Page Speed Insights',);
    $is_bot   = false;
    foreach($bot_list as $bot){
        if(stripos($_SERVER['HTTP_USER_AGENT'],$bot) !== false){
            $is_bot = true;
            break;
        }
    }
    return $is_bot;
}

function sanitize_checkbox($input){
    if($input===true){
        return true;
    }else{
        return false;
    }
}

function sanitize_radio($input,$setting){
    global $wp_customize;
    $control = $wp_customize->get_control($setting->id);
    if(array_key_exists($input,$control->choices)){
        return $input;
    }else{
        return $setting->default;
    }
}

function has_class($name){
    global $post;
    $pattern = 'class="' . $name . '"';
    $content = apply_filters('the_content',$post->post_content);
    if(strpos($content,$pattern)!==false){
        return true;
    }else{
        return false;
    }
}

function color_to_rgb($colorcode = ''){
    $array_colorcode          = array();
    $colorcode                = str_replace('#','',$colorcode);
    $array_colorcode['red']   = hexdec(substr($colorcode,0,2));
    $array_colorcode['green'] = hexdec(substr($colorcode,2,2));
    $array_colorcode['blue']  = hexdec(substr($colorcode,4,2));
    return $array_colorcode;
}

function color_change_brightness($color,$steps){
    $return = '#';
    $color  = color_to_rgb($color);
    $steps  = max(-255,min(255,$steps));
    foreach($color as $value){
        $value = max(0,min(255,$value + $steps));
        if($value > 255){$value = '255';}
        if($value < 0){$value = '0';}
        $return .= str_pad(dechex($value),2,'0',STR_PAD_LEFT);
    }
    echo $return;
}

add_rewrite_endpoint('amp',EP_ALL);
define('AMP_QUERY_VAR','amp');
function is_amp(){
    return false !== get_query_var(AMP_QUERY_VAR,false);
}

function is_subpage(){
    global $post;
    if(is_page()===true && $post->post_parent){
        $parentID = $post->post_parent;
        return $parentID;
    }else{
        return false;
    }
}

function is_actived_plugin($plugin){
    $plugin_list = get_option('active_plugins');
	if(is_array($plugin_list)===true){
		foreach($plugin_list as $value){
			if($value===$plugin){
                return true;
            }
		}
	}elseif($plugin_list===$plugin){
        return true;
    }else{
        return false;
    }
}

function get_mtime($format){
    $mtime = get_the_modified_time('Ymd');
    $ptime = get_the_time('Ymd');
    if($ptime > $mtime || $ptime===$mtime){
        return get_the_time($format);
    }else{
        return get_the_modified_time($format);
    }
}

function get_first_post_year(){
    $year = null;
    query_posts('posts_per_page=1&order=ASC');
    if(have_posts()){
        while(have_posts()):
            the_post();
            $year = intval(get_the_time('Y'));
        endwhile;
    }
    wp_reset_query();
    return $year;
}

function sanitize_for_amp($content){
    $img     = get_parent_theme_file_uri('/inc/no-image/no-image_128x128.png');
    $content = preg_replace('/<blockquote class="twitter-tweet".*>.*<a href="https:\/\/twitter.com\/.*\/status\/(.*).*<\/blockquote>.*<script async src="\/\/platform.twitter.com\/widgets.js" charset="utf-8"><\/script>/i','<div class=\'embed-container\'><amp-twitter width="800" height="600" layout="responsive" data-tweetid="$1" data-conversation="all" data-align="center"></amp-twitter></div>',$content);
    $content = preg_replace('/<iframe width=\'100%\' src=\'https:\/\/vine.co\/v\/(.*)\/embed\/simple\'.*><\/iframe>/i','<div class=\'embed-container\'><amp-vine data-vineid="$1" width="592" height="592" layout="responsive"></amp-vine></div>',$content);
    $content = preg_replace('/<blockquote class="instagram-media".+?"https:\/\/www.instagram.com\/p\/(.+?)\/".+?<\/blockquote>.*?<script async defer src="\/\/platform.instagram.com\/.+?\/embeds.js"><\/script>/is','<div class=\'embed-container\'><amp-instagram layout="responsive" data-shortcode="$1" width="592" height="716" ></amp-instagram></div>',$content);
    $content = preg_replace('/<iframe src=\'\/\/instagram.com\/p\/(.*)\/embed\/\'.*<\/iframe>/i','<div class=\'embed-container\'><amp-instagram layout="responsive" data-shortcode="$1" width="592" height="716" ></amp-instagram></div>',$content);
    $content = preg_replace('/https:\/\/youtu.be\/(.*)/i','<div class=\'embed-container\'><amp-youtube layout="responsive" data-videoid="$1" width="592" height="363"></amp-youtube></div><script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>',$content);
    $content = preg_replace('/<iframe width="853" height="480" src="https:\/\/www.youtube.com\/embed\/(.*)" frameborder="0" allowfullscreen><\/iframe>.*<\/div>/i','<div class=\'embed-container\'><amp-youtube layout="responsive" data-videoid="$1" width="592" height="363"></amp-youtube></div>',$content);
    $content = preg_replace('/<a class="embedly-card" href="(.*?)"><\/a><script async="" charset="UTF-8" src="\/\/cdn.embedly.com\/widgets\/platform.js"><\/script>/i','<a href="$1">$1</a>',$content);
    $content = preg_replace('/<iframe src="https:\/\/www.google.com\/maps\/embed?(.*?)" (.*?)><\/iframe>/i','<div><amp-iframe layout="responsive" src="https:\/\/www.google.com\/maps\/embed?$1" width="600" height="450" layout="responsive" sandbox="allow-scripts allow-same-origin allow-popups" frameborder="0" allowfullscreen></amp-iframe></div>',$content);
    $content = preg_replace('/<iframe (.*?)src="https:\/\/(.*?).amazon(.*?)><\/iframe>/i','<amp-iframe width="120" height="240" sandbox="allow-scripts allow-same-origin" frameborder="0" $1src="https://$2.amazon$3 ></amp-iframe>',$content);
    $content = preg_replace('/<iframe(.*?)><\/iframe>/i','<div><amp-iframe layout="responsive" height="576" width="1344" $1></amp-iframe></div>',$content);
    $content = preg_replace('/<img(.*?)>/i','<div><amp-img layout="responsive" height="576" width="1344" $1></amp-img></div>',$content);
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
    $content = preg_replace_callback('/<iframe[^>]+?src="https:\/\/www\.facebook\.com\/plugins\/post\.php\?href=(.*?)&.+?".+?><\/iframe>/is',function ($m){return'<amp-facebook width=486 height=657 layout="responsive" data-href="' . urldecode($m[1]) . '"></amp-facebook><script async custom-element="amp-facebook" src="https://cdn.ampproject.org/v0/amp-facebook-0.1.js"></script>';},$content);
    $content = preg_replace_callback('/<iframe[^>]+?src="https:\/\/www\.facebook\.com\/plugins\/video\.php\?href=(.*?)&.+?".+?><\/iframe>/is',function ($m){return'<amp-facebook width=486 height=657 layout="responsive" data-href="' . urldecode($m[1]) . '"></amp-facebook><script async custom-element="amp-facebook" src="https://cdn.ampproject.org/v0/amp-facebook-0.1.js"></script>';},$content);
    return $content;
}

function wkwkrnht_load_style(){
    $is_amp     = is_amp();
    $root_color = get_option('root_color','#333');
    if($is_amp===true){
        echo'<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">';
    }else{
        include_once(get_parent_theme_file_path('/css/fontawesome.php'));
    }
    include_once(get_parent_theme_file_path('/css/initial.php'));
    include_once(get_parent_theme_file_path('/css/nav.php'));
    if(is_active_widget(false,false,$this->id_base,true)){
        include_once(get_parent_theme_file_path('/css/widget.php'));
    }
    include_once(get_parent_theme_file_path('/css/menu.php'));
    include_once(get_parent_theme_file_path('/css/card.php'));
    if(is_singular()===true){
        $id      = url_to_postid(get_meta_url());
        $post    = get_post($id);
        $content = $post->post_content;
        if(has_class('ba-slider')===true){
            include_once(get_parent_theme_file_path('/css/short-code.php'));
        }else{
            global $shortcode_tags;
            foreach($shortcode_tags as $code_name => $function){
                $has_short_code = has_shortcode($content,$code_name);
                if($has_short_code===true){
                    include_once(get_parent_theme_file_path('/css/short-code.php'));
                    break;
                }
            }
        }
        include_once(get_parent_theme_file_path('/css/style-singular.php'));
        if($is_amp===true){
			include_once(get_parent_theme_file_path('/css/amp-style-singular.php'));
        }
    }
    include_once(get_parent_theme_file_path('/css/mediaqueri.php'));
}

function wkwkrnht_load_analytics(){
    $google_ana = get_option('Google_Analytics');
    if($google_ana!==false){
        if(!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'],'Speed Insights')===false){
            if(is_amp()===true){
                echo'
                <script async custom-element="amp-analytics" src="//cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
                <amp-analytics type="googleanalytics" id="analytics">
                    <script type="application/json">
                        {
                            "vars": {
                                "account": "' . $google_ana . '"
                            },
                            "triggers": {
                                "trackPageview": {
                                    "on": "visible",
                                    "request": "pageview"
                                }
                            }
                        }
                    </script>
                </amp-analytics>';
            }else{
                echo'
                <script>
                    window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};
                    ga.l=+new Date;
                    ga("create","' . $google_ana . '","auto");
                    ga("send","pageview");
                </script>
                <script async="" src="//www.google-analytics.com/analytics.js"></script>';
            }
    	}
    }
}