<?php
require(get_parent_theme_file_path('/functions/util.php'));
require(get_parent_theme_file_path('/functions/setup.php'));
require(get_parent_theme_file_path('/functions/general.php'));
require(get_parent_theme_file_path('/functions/widget.php'));
require(get_parent_theme_file_path('/functions/nav.php'));
require(get_parent_theme_file_path('/functions/meta.php'));
require(get_parent_theme_file_path('/functions/editor.php'));
if(is_actived_plugin('wp-unit')===true){
    require(get_parent_theme_file_path('/inc/unit-test.php'));
}

/*
    original
1.blogcard by OGP
2.oEmbed content
*/
function make_OGPblogcard($url){
    require_once(get_parent_theme_file_path('/inc/OpenGraph.php'));
    $ogp           = OpenGraph::fetch($url);
    $url           = $ogp->url;
    $share_url     = urlencode($url);
    $id_url        = mb_strtolower(str_replace(':/.','',$url));
    $img           = $ogp->image;
    $title         = $ogp->title;
    $description   = str_replace(']]<>',']]＜＞',$ogp->description);
    $script      = "document.getElementById('ogp-blogcard-share-" . $id_url . "').classList.toggle('none');document.getElementById('ogp-blogcard-share-" . $id_url . "').classList.toggle('block');";
    $content     =
    '<div class="ogp-blogcard">
        <div id="ogp-blogcard-share-' . $id_url . '" class="ogp-blogcard-share none">
            <a href="javascript:void(0)" class="ogp-blogcard-share-close" tabindex="0" onclick="' . $script . '">×</a>
            <ul>
                <li>
                    <a href="https://twitter.com/share?url=' . $share_url . '&amp;text=' . $title . '" target="_blank" rel="noopener" tabindex="0">
                        <span class="fa fa-twitter" aria-hidden="true"></span>
                    </a>
                </li>
                <li>
                    <a href="http://www.facebook.com/share.php?u=' . $share_url . '" target="_blank" rel="noopener" tabindex="0">
                        <span class="fa fa-thumbs-up" aria-hidden="true"></span>
                    </a>
                </li>
                <li>
                    <a href="http://getpocket.com/edit?url=' . $share_url . '&amp;title=' . $title . '" target="_blank" rel="noopener" tabindex="0">
                        <span class="fa fa-get-pocket" aria-hidden="true"></span>
                    </a>
                </li>
                <li>
                    <a href="http://b.hatena.ne.jp/add?mode=confirm&url=' . $share_url . '&amp;title=' . $title . '" target="_blank" rel="noopener" tabindex="0">
                        B!
                    </a>
                </li>
            </ul>
        </div>
        <blockquote class="ogp-blogcard-main" cite="' . $url . '">
            <img class="ogp-blogcard-img" src="' . $img . '">
            <a href="' . $url . '" target="_blank" rel="noopener" tabindex="0" title="' . $title . '" class="ogp-blogcard-info">
                <h2 class="ogp-blogcard-title">' . $title . '</h2>
                <p class="ogp-blogcard-description">' . $description . '</p>
            </a>
        </blockquote>
        <a href="javascript:void(0)" class="ogp-blogcard-share-toggle fa fa-2x fa-share-alt" tabindex="0" onclick="' . $script . '"></a>
    </div>';
    return $content;
}

function custom_oembed_element($html){
    if(strpos($html,'twitter.com')!==false || strpos($html,'mobile.twitter.com')!==false){
        $html = preg_replace('/ class="(.*?)\d+"/','class="$1" align="center"',$html);
        return $html;
    }
    return $code;
}
add_filter('embed_handler_html','custom_oembed_element');
add_filter('embed_oembed_html','custom_oembed_element');

/*
    shortcode
1.customCSS
2.HTMLencode
3.embed.ly
4.blogcard by hatena
5.blogcard by OGP
6.embed spotify
7.display navi
*/
function style_into_article($atts){
    extract(shortcode_atts(array('style'=>'','display'=>'',),$atts));
    $none = '';
    if($display==='none'){
        $none='class="none"';
    }
    return'<pre id="wpcss"' . $none . '><code>' . $style . '</code></pre>';
}
function html_encode($args=array(),$content=''){
    return htmlspecialchars($content,ENT_QUOTES,'UTF-8');
}
function url_to_embedly($atts){
    extract(shortcode_atts(array('url'=>'',),$atts));
    return'<a class="embedly-card" href="' . $url . '">' . $url . '</a><script async="" charset="UTF-8" src="//cdn.embedly.com/widgets/platform.js"></script>';
}
function url_to_hatenaBlogcard($atts){
    extract(shortcode_atts(array('url'=>'',),$atts));
    return'<iframe src="https://hatenablog-parts.com/embed?url=' . $url . '" frameborder="0" scrolling="no" class="hatenablogcard"></iframe>';
    }
function url_to_OGPBlogcard($atts){
    extract(shortcode_atts(array('url'=>'',),$atts));
    if(strlen($url) > 20){
        $transitname = wordwrap($url,20);
    }else{
        $transitname = $url;
    }
    $cache = get_site_transient($transitname);
    if(get_option('delete_OGPblogcard_cache')){
        delete_site_transient($transitname);
        $content = make_OGPblogcard($url);
        set_site_transient($transitname,$content,12 * WEEK_IN_SECONDS);
    }elseif($cache){
        $content = $cache;
    }else{
        $content = make_OGPblogcard($url);
        set_site_transient($transitname,$content,12 * WEEK_IN_SECONDS);
    }
    return $content;
}
function spotify_play_into_article($atts){
    extract(shortcode_atts(array('url'=>'',),$atts));
    return'<iframe src="https://embed.spotify.com/?uri=' . $url . '" frameborder="0" allowtransparency="true" class="spotifycard"></iframe>';
}
function toot_into_article($atts){
    extract(shortcode_atts(array('url'=>'',),$atts));
    $transitname = 'mastodon_status_';
    if(strlen($url) > 10){
        $transitname .= wordwrap(strrev($url),10);
    }else{
        $transitname .= strrev($url);
    }
    $cache = get_site_transient($transitname);
    if(get_option('delete_mastodon_embed_cache')){
        delete_site_transient($transitname);
        $response = wp_remote_get($url,array('sslverify'=>false));
        set_transient('mastodon_status_',$response,12 * WEEK_IN_SECONDS);
    }elseif($cache){
        $response = $cache;
    }else{
        $response = wp_remote_get($url,array('sslverify'=>false));
        set_transient($transitname,$response,12 * WEEK_IN_SECONDS);
    }
    $httpCode = wp_remote_retrieve_response_code($response);
    $body     = wp_remote_retrieve_body($response);
    if($httpCode !== 404 && $httpCode !== 301){
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($body);
        $xpath = new DOMXPath($doc);
        $url = $xpath->query("//link[@type='application/atom+xml']");
        if($url->length){
            $url = str_replace('.atom','/embed',$atomUrl[0]->getAttribute('href'));
            if(!isset($height) && $height===""){
                $height = '150';
            }
            return'<iframe src="' . $url . '" height="' . $height . '" width="400" scrolling="no" frameborder="0" class="spotifycard"></iframe>';
        }
    }
}
function navigation_in_article($atts){
    extract(shortcode_atts(array('id'=>'',),$atts));
    $content = wp_nav_menu(array('menu'=>$id,'echo'=>false));
    return $content;
}
function google_ads_in_article($atts){
    extract(shortcode_atts(array('client'=>'','slot'=>'',),$atts));
    return'
    <aside id="adsense">
        <script>google_ad_client = "pub-' . $client . '";google_ad_slot = "' . $slot . '";google_ad_width = 640;google_ad_height = 480;</script>
        <script src="//pagead2.googlesyndication.com/pagead/show_ads.js"></script>
    </aside>';
}
function make_before_after_box($atts){
    extract(shortcode_atts(array('before'=>'','after'=>'',),$atts));
    return'
    <div class="ba-slider">
        <img src="' . $after . '" alt="before">
        <div class="resize">
            <img src="' . $before . '" alt="after">
        </div>
        <span class="handle"></span>
    </div>';
}
function columun_in_article($args=array(),$content=''){
    extract(shortcode_atts(array('color'=>'','title'=>'',),$args));
    return'
    <aside class="cutin-box ' . $color . '">
        <h3>' . $title . '</h3>
        <p class="cutin-box-inner">' . do_shortcode($content) . '</p>
    </aside>';
}
function cutin_box($args=array(),$content=''){
    extract(shortcode_atts(array('color'=>'','title'=>'',),$args));
    return'
    <div class="cutin-box ' . $color . '">'
        . $title .
        '<div class="cutin-box-inner">' . do_shortcode($content) . '</div>
    </div>';
}
function simple_box($args=array(),$content=''){
    extract(shortcode_atts(array('color'=>'',),$args));
    return'
    <div class="simple-box ' . $color . '">'
         . do_shortcode($content) . '
    </div>';
}
function info_box($args=array(),$content=''){
    return'
    <div class="information">'
         . do_shortcode($content) . '
    </div>';
}
function qa_box($args=array(),$content=''){
    return'
    <div class="question">'
         . do_shortcode($content) . '
    </div>';
}
function search_box($args=array(),$content=''){
    return'
    <div class="search-form">
        <div class="sform">'
            . do_shortcode($content) . '
        </div>
        <div class="sbtn">
            <span class="fa fa-search fa-fw" aria-hidden="true"></span> 検索
        </div>
    </div>';
}
function make_a($args=array(),$content=''){
    extract(shortcode_atts(array('url'=>'',),$args));
    return'<a href="' . $url . '" title="' . $content . '" target="_blank" rel="noopener">' . $content . '</a>';
}
function make_marker($args=array(),$content=''){
    extract(shortcode_atts(array('color'=>'',),$args));
    return'<span class="marker ' . $color . '">' . do_shortcode($content) . '</span>';
}
function make_link_button($args=array(),$content=''){
    extract(shortcode_atts(array('url'=>'','color'=>'',),$args));
    return'<a href="' . $url . '" title="' . $content . '" tabindex="0" target="_blank" rel="noopener" class="button ' . $color . '">' . do_shortcode($content) . '</a>';
}
function make_button($args=array(),$content=''){
    extract(shortcode_atts(array('color'=>'',),$args));
    return'<span class="button ' . $color . '">' . do_shortcode($content) . '</span>';
}
function make_toc($atts){
    $atts = shortcode_atts(array(
        'id'          => '',
        'class'       => 'toc',
        'title'       => '目次',
        'showcount'   => 2,
        'depth'       => 0,
        'toplevel'    => 1,
        'targetclass' => 'article-main'
    ),$atts);

    $content     = get_the_content();
    $headers     = array();
    $html        = '';
    $toc_list    = '';
    $id          = $atts['id'];
    $toggle      = '';
    $depth       = $atts['depth'];
    $counter     = 0;
    $counters    = array(0,0,0,0,0,0);
    $top_level   = intval($atts['toplevel']);
    $harray      = array();
    $targetclass = trim($atts['targetclass']);
    if($targetclass===''){$targetclass = get_post_type();}
    for($h = $atts['toplevel']; $h <= 6; $h++){$harray[] = '"h' . $h . '"';}
    $harray = implode(',',$harray);

    preg_match_all('/<([hH][1-6]).*?>(.*?)<\/[hH][1-6].*?>/u',$content,$headers);
    $header_count = count($headers[0]);
    if($header_count > 0){
        $level = strtolower($headers[1][0]);
        if($top_level < $level){$top_level = $level;}
    }
    if($top_level < 1){$top_level = 1;}
    if($top_level > 6){$top_level = 6;}
    $atts['toplevel']       = $top_level;
    $current_depth          = $top_level - 1;
    $prev_depth             = $top_level - 1;
    if($depth == 0){
        $max_depth = 6 - $top_level + 1;
    }else{
        $max_depth = intval($depth) - $top_level + 1;
    }

    for($i = 0; $i < $header_count; $i++){
        $depth = 0;
        switch(strtolower($headers[1][$i])){
            case 'h1': $depth = 1 - $top_level + 1; break;
            case 'h2': $depth = 2 - $top_level + 1; break;
            case 'h3': $depth = 3 - $top_level + 1; break;
            case 'h4': $depth = 4 - $top_level + 1; break;
            case 'h5': $depth = 5 - $top_level + 1; break;
            case 'h6': $depth = 6 - $top_level + 1; break;
        }
        if($depth >= 1 && $depth <= $max_depth){
            while($current_depth > $depth){
                $toc_list .= '</ol>';
                $current_depth = $current_depth - 1;
                $counters[$current_depth] = 0;
            }
            if($current_depth < $depth){
                $toc_list .= '<ol' . (($current_depth == $top_level - 1) ? ' id="toc-inner" class="toc-list block"' : '') . '>';
                $current_depth++;
            }
            $counters[$current_depth - 1] ++;
            $counter++;
            $toc_list .= '<li><a href="#toc' . $counter . '" tabindex="0">' . $headers[2][$i] . '</a></li>';
            $prev_depth = $depth;
        }
    }
    while($current_depth >= 1 ){
        $toc_list .= '</ol>';
        $current_depth = $current_depth - 1;
    }
    if($counter >= $atts['showcount']){
        if($id!==''){
            $id = ' id="' . $id . '"';
        }else{
            $id = '';
        }
        $script = 'document.getElementById("toc-inner").classList.toggle("none");document.getElementById("toc-inner").classList.toggle("block");';
        $html  .= '
        <aside' . $id . ' class="' . $atts['class'] . '" role="navigation">
            <a href="javascript:void(0);" tabindex="0" class="toc-toggle" onclick="' . $script . '">∨</a>
            <h2 class="toc-title">' . $atts['title'] . '</h2>'
            . $toc_list .
        '</aside>
        <script>
            window.onload = function () {
                var idCounter = 0;
                var sub = [' . $harray . '];
                var targetClasses = document.getElementsByClassName("' . $targetclass . '");
                for (var i = 0; i < targetClasses.length; i++) {
                    var targetClass = targetClasses[i];
                    for (var m = 0; m < sub.length; m++) {
                        var targetHx = String(sub[m]);
                        var targetElements = targetClass.getElementsByTagName(targetHx);
                        for (var n = 0; n < targetElements.length; n++) {
                            var targetElement = targetElements[n];
                            if (targetElement.hasAttribute("class") === false) {
                                idCounter++;
                                targetElement.id = "toc" + idCounter;
                            }
                        }
                    }
                }
            };
        </script>';
    }
    return $html;
}
add_shortcode('customcss','style_into_article');
add_shortcode('html_encode','html_encode');
add_shortcode('embedly','url_to_embedly');
add_shortcode('hatenaBlogcard','url_to_hatenaBlogcard');
add_shortcode('OGPBlogcard','url_to_OGPBlogcard');
add_shortcode('spotify','spotify_play_into_article');
add_shortcode('mastodon','toot_into_article');
add_shortcode('nav','navigation_in_article');
add_shortcode('adsense','google_ads_in_article');
add_shortcode('before_after_box','make_before_after_box');
add_shortcode('columun','columun_in_article');
add_shortcode('info','info_box');
add_shortcode('qa','qa_box');
add_shortcode('search-box','search_box');
add_shortcode('simple-box','simple_box');
add_shortcode('box','cutin_box');
add_shortcode('link','make_a');
add_shortcode('marker','make_marker');
add_shortcode('button','make_button');
add_shortcode('link_button','make_link_button');
add_shortcode('toc','make_toc');
/*
    ADD item to customize
1.customizer
2.user profile
    ●ADD item
    ●accept HTML tag
*/
add_action('customize_register','wkwkrnht_customizer');
function wkwkrnht_customizer($wp_customize){
    $wp_customize->add_setting('Google_Analytics',array('type'=>'option','sanitize_callback'=>'sanitize_text_field',));
    $wp_customize->add_control('Google_Analytics',array('section'=>'title_tagline','settings'=>'Google_Analytics','label'=>'サイトのGoogleAnalyticsのIDを指定する','type'=>'text'));
    $wp_customize->add_setting('Google_Webmaster',array('type'=>'option','sanitize_callback'=>'sanitize_text_field',));
    $wp_customize->add_control('Google_Webmaster',array('section'=>'title_tagline','settings'=>'Google_Webmaster','label'=>'サイトのGoogleSerchconsole向け認証コードを指定する','type'=>'text'));
    $wp_customize->add_setting('Bing_Webmaster',array('type'=>'option','sanitize_callback'=>'sanitize_text_field',));
    $wp_customize->add_control('Bing_Webmaster',array('section'=>'title_tagline','settings'=>'Bing_Webmaster','label'=>'サイトのBingWebmaster向け認証コードを指定する','type'=>'text'));
    $wp_customize->add_setting('Pinterest',array('type'=>'option','sanitize_callback'=>'sanitize_text_field',));
    $wp_customize->add_control('Pinterest',array('section'=>'title_tagline','settings'=>'Pinterest','label'=>'サイトのPinterest向け認証コードを指定する','type'=>'text'));
    $wp_customize->add_section('security_section',array('title'=>'セキュリティ','description'=>'このテーマ独自のセキュリティ設定',));
    $wp_customize->add_setting('delete_OGPblogcard_cache',array('type'=>'option','sanitize_callback'=>'sanitize_checkbox',));
    $wp_customize->add_control('delete_OGPblogcard_cache',array('settings'=>'delete_OGPblogcard_cache','label'=>'OGPblogcardのキャッシュを削除する','section'=>'security_section','type'=>'checkbox',));
    $wp_customize->add_setting('delete_mastodon_embed_cache',array('type'=>'option','sanitize_callback'=>'sanitize_checkbox',));
    $wp_customize->add_control('delete_mastodon_embed_cache',array('settings'=>'delete_mastodon_embed_cache','label'=>'mastodon埋め込みのキャッシュを削除する','section'=>'security_section','type'=>'checkbox',));
    $wp_customize->add_setting('referrer_setting',array('default'=>'default','type'=>'theme_mod','sanitize_callback'=>'sanitize_radio',));
	$wp_customize->add_control('referrer_setting',array('settings'=>'referrer_setting','label'=>'メタタグのリファラーの値','section'=>'security_section','type'=>'radio','choices'=>array('default'=>'default','unsafe-url'=>'unsafe-url','origin-when-crossorigin'=>'origin-when-crossorigin','none-when-downgrade'=>'none-when-downgrade','none'=>'none',),));
    $wp_customize->add_setting('cookie_key',array('type'=>'option','sanitize_callback'=>'sanitize_text_field',));
    $wp_customize->add_control('cookie_key',array('section'=>'security_section','settings'=>'cookie_key','label'=>'Cookieのkeyを入力する','type'=>'text'));
    $wp_customize->add_setting('cookie_txt',array('type'=>'option','sanitize_callback'=>'sanitize_text_field',));
    $wp_customize->add_control('cookie_txt',array('section'=>'security_section','settings'=>'cookie_txt','label'=>'Cookieのテキストを入力する','type'=>'text'));
    $wp_customize->add_section('sns_section',array('title'=>'SNS','description'=>'このテーマ独自のSNS向け設定',));
    $wp_customize->add_setting('Twitter_URL',array('type'=>'option','sanitize_callback'=>'sanitize_text_field',));
    $wp_customize->add_control('Twitter_URL',array('section'=>'sns_section','settings'=>'Twitter_URL','label'=>'サイト全体のTwitterアカウントを指定する','type'=>'text'));
    $wp_customize->add_setting('facebook_appid',array('type'=>'option','sanitize_callback'=>'sanitize_text_field',));
    $wp_customize->add_control('facebook_appid',array('section'=>'sns_section','settings'=>'facebook_appid','label'=>'facebookのappidを表示する','type'=>'text'));
    $wp_customize->add_section('jetpack_section',array('title'=>'jetpack','description'=>'このテーマ独自のjetpack向け設定',));
    $wp_customize->add_setting('jetpack.css',array('type'=>'option','sanitize_callback'=>'sanitize_checkbox',));
    $wp_customize->add_control('jetpack.css',array('settings'=>'jetpack.css','label'=>'jetpack.cssの読み込みを停止する','section'=>'jetpack_section','type'=>'checkbox',));
    $wp_customize->add_setting('jetpack_open_graph',array('type'=>'option','sanitize_callback'=>'sanitize_checkbox',));
    $wp_customize->add_control('jetpack_open_graph',array('settings'=>'jetpack_open_graph','label'=>'jetpackによるOGPの出力を停止する','section'=>'jetpack_section','type'=>'checkbox',));
    $wp_customize->add_setting('GoogleChrome_URLbar',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'GoogleChrome_URLbar',array('label'=>'モバイル版GoogleChrome向けURLバーの色コードを指定する','settings'=>'GoogleChrome_URLbar','section'=>'colors',)));
    $wp_customize->add_setting('root_color',array('type'=>'option','default'=>'#333','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'root_color',array('label'=>':root color','settings'=>'root_color','section'=>'colors',)));
    $wp_customize->add_setting('a_color',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'a_color',array('label'=>'a color','settings'=>'a_color','section'=>'colors',)));
    $wp_customize->add_setting('a_visited_color',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'a_visited_color',array('label'=>'a:visited color','settings'=>'a_visited_color','section'=>'colors',)));
    $wp_customize->add_setting('a_active_color',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'a_active_color',array('label'=>'a:active,a:hover color','settings'=>'a_active_color','section'=>'colors',)));
    $wp_customize->add_setting('a_hover_border',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'a_hover_border',array('label'=>'a:hover border-color','settings'=>'a_hover_border','section'=>'colors',)));
    $wp_customize->add_setting('mark_color',array('type'=>'option','default'=>'#333','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'mark_color',array('label'=>'mark color','settings'=>'mark_color','section'=>'colors',)));
    $wp_customize->add_setting('mark_background',array('type'=>'option','default'=>'#ff0','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'mark_background',array('label'=>'mark background-color','settings'=>'mark_background','section'=>'colors',)));
    $wp_customize->add_setting('sitte_header_color',array('type'=>'option','default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'site_header_color',array('label'=>'.site-header color','settings'=>'site_header_color','section'=>'colors',)));
    $wp_customize->add_setting('site_header_background',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'site_header_background',array('label'=>'.site-header background-color','settings'=>'site_header_background','section'=>'colors',)));
    $wp_customize->add_setting('wkwkrnht_widget_title_background',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'wkwkrnt_widget_title_background',array('label'=>'.widget-title background-color','settings'=>'wkwkrnht_widget_title_background','section'=>'colors',)));
    $wp_customize->add_setting('wkwkrnht_widget_title_color',array('type'=>'option','default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'wkwkrnht_widget_title_color',array('label'=>'.widget-title color','settings'=>'wkwkrnht_widget_title_color','section'=>'colors',)));
    $wp_customize->add_setting('card_list_background',array('type'=>'option','default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'card_list_background',array('label'=>'.card-list background-color','settings'=>'card_list_background','section'=>'colors',)));
    $wp_customize->add_setting('footer_background',array('type'=>'option','default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_background',array('label'=>'footer background-color','settings'=>'footer_background','section'=>'colors',)));
    $wp_customize->add_setting('toggle_color',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'toggle_color',array('label'=>'toggle color','settings'=>'toggle_color','section'=>'colors',)));
    $wp_customize->add_setting('menu_background',array('type'=>'option','default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'menu_background',array('label'=>'menu-wrap background-color','settings'=>'menu_background','section'=>'colors',)));
    $wp_customize->add_setting('menu_color',array('type'=>'option','default'=>'#333','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'menu_color',array('label'=>'menu-wrap color','settings'=>'menu_color','section'=>'colors',)));
    $wp_customize->add_setting('hover_nav_a_background',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'hover_nav_a_background',array('label'=>'hover_nav a background-color','settings'=>'hover_nav_a_background','section'=>'colors',)));
    $wp_customize->add_setting('hover_nav_a_color',array('type'=>'option','default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'hover_nav_a_color',array('label'=>'hover_nav a color','settings'=>'hover_nav_a_color','section'=>'colors',)));
    $wp_customize->add_setting('tag_cloud_border',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'tag_cloud_border',array('label'=>',widget_tag_cloud border-color','settings'=>'tag_cloud_border','section'=>'colors',)));
    $wp_customize->add_setting('tag_cloud_hover_border',array('type'=>'option','default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'tag_cloud_hover_border',array('label'=>'.widget_tag_cloud:hover border-color','settings'=>'tag_cloud_hover_border','section'=>'colors',)));
    $wp_customize->add_setting('tag_cloud_hover_color',array('type'=>'option','default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'tag_cloud_hover_color',array('label'=>'.wigdet_tag_cloud:hover color','settings'=>'tag_cloud_hover_color','section'=>'colors',)));
    $wp_customize->add_setting('tag_cloud_color',array('type'=>'option','default'=>'#333','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'tag_cloud_color',array('label'=>'.wigdet_tag_cloud color','settings'=>'tag_cloud_color','section'=>'colors',)));
    $wp_customize->add_setting('search_border',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'search_border',array('label'=>',widget_tag_cloud border-color','settings'=>'search_border','section'=>'colors',)));
    $wp_customize->add_setting('search_background',array('type'=>'option','default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'search_background',array('label'=>'.widget_tag_cloud:hover border-color','settings'=>'search_background','section'=>'colors',)));
    $wp_customize->add_setting('search_hover_background',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'search_hover_background',array('label'=>'.wigdet_tag_cloud:hover color','settings'=>'search_hover_background','section'=>'colors',)));
    $wp_customize->add_setting('search_hover_color',array('type'=>'option','default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'search_hover_color',array('label'=>'.search:hover color','settings'=>'search_hover_color','section'=>'colors',)));
    $wp_customize->add_setting('page_nation_border',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'page_nation_border',array('label'=>'.page-nation border-color','settings'=>'page_nation_border','section'=>'colors',)));
    $wp_customize->add_setting('page_nation_a_background',array('type'=>'option','default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'page_nation_a_background',array('label'=>'.page-nation a background-color','settings'=>'page_nation_a_background','section'=>'colors',)));
    $wp_customize->add_setting('page_nation_a_color',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'page_nation_a_color',array('label'=>'.page-nation a color','settings'=>'page_nation_a_color','section'=>'colors',)));
    $wp_customize->add_setting('page_nation_hover_color',array('type'=>'option','default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'page_nation_hover_color',array('label'=>'.page-nation:hover color','settings'=>'page_nation_hover_color','section'=>'colors',)));
    $wp_customize->add_setting('page_nation_hover_background',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'page_nation_hover_background',array('label'=>'.page-nation:hover background-color','settings'=>'page_nation_hover_background','section'=>'colors',)));
    $wp_customize->add_setting('page_nav_color',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'page_nav_color',array('label'=>'.page-nav color','settings'=>'page_nav_color','section'=>'colors',)));
    $wp_customize->add_setting('page_nav_hover_border',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'page_nav_hover_border',array('label'=>'.page-nav border-color','settings'=>'page_nav_hover_border','section'=>'colors',)));
    $wp_customize->add_setting('wkwkrnht_comment_background',array('default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'wkwkrnht_comment_background',array('label'=>'.wiget_comment background-color','settings'=>'wkwkrnht_comment_background','section'=>'colors',)));
    $wp_customize->add_setting('wkwkrnht_comment_title_color',array('default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'wkwkrnht_comment_title_color',array('label'=>'.comment-title color','settings'=>'wkwkrnht_comment_title_color','section'=>'colors',)));
    $wp_customize->add_setting('wkwkrnht_comment_title_background',array('default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'wkwkrnht_comment_title_background',array('label'=>'.comment-title background-color','settings'=>'wkwkrnht_comment_title_background','section'=>'colors',)));
    $wp_customize->add_setting('manth_archive_year_background',array('default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'manth_archive_year_background',array('label'=>'.widget_manth_archive_year h3 background-color','settings'=>'manth_archive_year_background','section'=>'colors',)));
    $wp_customize->add_setting('move_top_color',array('default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'move_top_color',array('label'=>'.widge_move_top color','settings'=>'move_top_color','section'=>'colors',)));
    $wp_customize->add_setting('move_top_background',array('default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'move_top_background',array('label'=>'.widget_move_top background-color','settings'=>'move_top_background','section'=>'colors',)));
    $wp_customize->add_setting('related_background',array('default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'related_background',array('label'=>'.wiget_related background-color','settings'=>'related_background','section'=>'colors',)));
    $wp_customize->add_setting('related_color',array('default'=>'#333','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'related_color',array('label'=>'.widget_related color','settings'=>'related_color','section'=>'colors',)));
    $wp_customize->add_setting('related_title_background_color',array('default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'related_title_background_color',array('label'=>'.related-title background-color','settings'=>'article_main_li_color','section'=>'colors',)));
    $wp_customize->add_setting('related_title_color',array('default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'related_title_color',array('label'=>'.related-title color','settings'=>'related_title_color','section'=>'colors',)));
    $wp_customize->add_setting('wkwkrnht_article_meta_color',array('type'=>'option','default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'wkwkrnht_article_meta_color',array('label'=>'.article-meta color','settings'=>'wkwkrnht_article_meta_color','section'=>'colors',)));
    $wp_customize->add_setting('article_meta_background',array('type'=>'option','default'=>'#f1f1f1','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'article_meta_background',array('label'=>'article_meta background-color','settings'=>'article_meta_background','section'=>'colors',)));
    $wp_customize->add_setting('article_main_h1_background',array('type'=>'option','default'=>'#f4f4f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'article_main_h1_background',array('label'=>'.article-main h1 background-color','settings'=>'article_main_h1_background','section'=>'colors',)));
    $wp_customize->add_setting('article_main_h1_border',array('type'=>'option','default'=>'#ccc','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'article_main_h1_border',array('label'=>'.article-main h1 border-coor','settings'=>'article_main_h1_border','section'=>'colors',)));
    $wp_customize->add_setting('article_main_h2_color',array('type'=>'option','default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'article_main_h2_color',array('label'=>'.article-main h2 color','settings'=>'article_main_h2_color','section'=>'colors',)));
    $wp_customize->add_setting('article_main_h2_background',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'article_main_h2_background',array('label'=>'.article-main h2 background-color','settings'=>'article_main_h2_background','section'=>'colors',)));
    $wp_customize->add_setting('article_main_h3_color',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'article_main_h3_color',array('label'=>'.article-main h3 color','settings'=>'article_main_h3_color','section'=>'colors',)));
    $wp_customize->add_setting('article_main_h3_border',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'article_main_h3_border',array('label'=>'.article-main h3 border-color','settings'=>'article_main_h3_border','section'=>'colors',)));
    $wp_customize->add_setting('article_main_h4_border',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'article_main_h4_border',array('label'=>'.article-main h4 border-color','settings'=>'article_main_h4_border','section'=>'colors',)));
    $wp_customize->add_setting('article_main_h5_border',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'article_main_h5_border',array('label'=>'.article-main h5 border-color','settings'=>'article_main_h5_border','section'=>'colors',)));
    $wp_customize->add_setting('article_main_h6_border',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'article_main_h6_border',array('label'=>'.article-main h6 border-color','settings'=>'article_main_h6_border','section'=>'colors',)));
    $wp_customize->add_setting('article_main_bq_border',array('type'=>'option','default'=>'#bbb','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'article_main_bq_border',array('label'=>'.article-main bq border-color','settings'=>'article_main_bq_border','section'=>'colors',)));
    $wp_customize->add_setting('article_main_li_color',array('default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'article_main_li_color',array('label'=>'.article-main li color','settings'=>'article_main_li_color','section'=>'colors',)));
    $wp_customize->add_setting('article_main_li_border',array('default'=>'#aaa','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'article_main_li_border',array('label'=>'.article-main li border-color','settings'=>'article_main_li_border','section'=>'colors',)));
    $wp_customize->add_setting('article_main_ol_color',array('default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'article_main_ol_color',array('label'=>'.article-main ol color','settings'=>'article_main_ol_color','section'=>'colors',)));
    $wp_customize->add_setting('article_main_ol_background',array('default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'article_main_ol_background',array('label'=>'.article-main ol background-color','settings'=>'article_main_ol_background','section'=>'colors',)));
    $wp_customize->add_setting('article_main_table_caption_background',array('default'=>'#ffc045','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'article_main_table_caption_background',array('label'=>'.article-main table caption background-color','settings'=>'article_main_table_caption_background','section'=>'colors',)));
    $wp_customize->add_setting('article_main_tr_border',array('default'=>'#cfcfcf','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'article_main_tr_border',array('label'=>'.article-main tr border','settings'=>'article_main_tr_border','section'=>'colors',)));
    $wp_customize->add_setting('article_main_th_color',array('default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'article_main_th_color',array('label'=>'.article-main th color','settings'=>'article_main_th_color','section'=>'colors',)));
    $wp_customize->add_setting('article_main_th_background',array('default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'article_main_th_background',array('label'=>'.article-main th background-color','settings'=>'article_main_th_background','section'=>'colors',)));
    $wp_customize->add_setting('copyright_color',array('type'=>'option','default'=>'#fff','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'copyright_color',array('label'=>'.copyright color','settings'=>'copyright_h2_color','section'=>'colors',)));
    $wp_customize->add_setting('copyright_background',array('type'=>'option','default'=>'#03a9f4','sanitize_callback'=>'sanitize_hex_color',));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'copyright_background',array('label'=>'.copyright background-color','settings'=>'copyright_background','section'=>'colors',)));
    $wp_customize->add_setting('header_txt',array('type'=>'option','sanitize_callback'=>'sanitize_text_field',));
    $wp_customize->add_control('header_txt',array('section'=>'custom_css','settings'=>'header_txt','label'=>'headタグ内に追加で出力するテキスト','type'=>'textarea'));
    $wp_customize->add_setting('footer_txt',array('type'=>'option','sanitize_callback'=>'sanitize_text_field',));
    $wp_customize->add_control('footer_txt',array('section'=>'custom_css','settings'=>'footer_txt','label'=>'bodyタグ直前に追加で出力するテキスト','type'=>'textarea'));
}


function my_new_contactmethods($contactmethods){
    $contactmethods['TEL']='TEL';
    $contactmethods['FAX']='FAX';
    $contactmethods['Addres']='住所';
    $contactmethods['Graveter']='Graveter';
    $contactmethods['LINE']='LINE';
    $contactmethods['YO']='YO!';
    $contactmethods['twitter']='Twitter';
    $contactmethods['facebook']='Facebook';
    $contactmethods['Linkedin']='Linkedin';
    $contactmethods['Googleplus']='Google+';
    $contactmethods['Github']='Github';
    $contactmethods['Bitbucket']='Bitbucket';
    $contactmethods['Codepen']='Codepen';
    $contactmethods['JSbuddle']='JSbuddle';
    $contactmethods['Quita']='Quita';
    $contactmethods['xda']='xda';
    $contactmethods['hatenablog']='はてなブログ';
    $contactmethods['hatenadiary']='はてなダイアリー';
    $contactmethods['hatebu']='はてなブックマーク';
    $contactmethods['Pocket']='Pocket';
    $contactmethods['ameba']='アメーバ';
    $contactmethods['fc2']='fc2';
    $contactmethods['mixi']='mixi';
    $contactmethods['Instagram']='Instagram';
    $contactmethods['Pinterest']='Pinterest';
    $contactmethods['Flickr']='Flickr';
    $contactmethods['FourSquare']='FourSquare';
    $contactmethods['Swarm']='Swarm';
    $contactmethods['Steam']='Steam';
    $contactmethods['XboxLive']='XboxLive';
    $contactmethods['PSN']='PSN';
    $contactmethods['NINTENDOaccount']='ニンテンドーアカウント';
    $contactmethods['NINTENDONetworkID']='ニンテンドーネットワークID';
    $contactmethods['friendcode']='フレンドコード';
    $contactmethods['UPlay']='UPlay';
    $contactmethods['EAOrigin']='EAOrigin';
    $contactmethods['SQUAREENIXMembers']='SQUAREENIXMembers';
    $contactmethods['BANDAINAMCOID']='BANDAINAMCOID';
    $contactmethods['SEGAID']='SEGAID';
    $contactmethods['vine']='vine';
    $contactmethods['vimeo']='vimeo';
    $contactmethods['YouTube']='YouTube';
    $contactmethods['USTREAM']='USTREAM';
    $contactmethods['Twitch']='Twitch';
    $contactmethods['niconico']='niconico';
    $contactmethods['Skype']='Skype';
    $contactmethods['twitcasting']='ツイキャス';
    $contactmethods['MixCannel']='MixChannel';
    $contactmethods['Slideshare']='Slideshare';
    $contactmethods['Medium']='Medium';
    $contactmethods['note']='note';
    $contactmethods['Pxiv']='Pxiv';
    $contactmethods['Tumblr']='Tumblr';
    $contactmethods['Blogger']='Blogger';
    $contactmethods['livedoor']='livedoor';
    $contactmethods['wordpress.com']='wordpress.com';
    $contactmethods['wordpress.org']='wordpress.org';
    $contactmethods['Amazonlist']='Amazonの欲しいものリスト';
    $contactmethods['Yahooaction']='Yahoo!オークション';
    $contactmethods['Rakuma']='ラクマ';
    $contactmethods['Merukari']='メルカリ';
    $contactmethods['Bitcoin']='Bitcoin';
    return $contactmethods;
}
add_filter('user_contactmethods','my_new_contactmethods',10,1);
remove_filter('pre_user_description','wp_filter_kses');