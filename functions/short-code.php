<?php
/*
    MAKE
1.blogcard by OGP
2.TOC
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

function make_TOC($atts){
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
function load_TOC($atts){
    $url = get_meta_url();
    if(strlen($url) > 20){
        $transitname = wordwrap($url,20);
    }else{
        $transitname = $url;
    }
    $cache = get_site_transient($transitname);
    if(get_option('delete_TOC_cache')){
        delete_site_transient($transitname);
        $result = make_TOC($atts);
        set_site_transient($transitname,$result,12 * WEEK_IN_SECONDS);
    }elseif($cache){
        $result = $cache;
    }else{
        $result = make_TOC($atts);
        set_site_transient($transitname,$result,12 * WEEK_IN_SECONDS);
    }
    return $result;
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
add_shortcode('toc','load_TOC');