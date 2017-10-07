<?php
/*
    utility
1.is_subpage
2.is_actived_plugin
3.is_user_agent_bot
4.#xxxxxx turn to rgb(xx,xx,xx) (for CSS)
5.ADD param of AMP
*/
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