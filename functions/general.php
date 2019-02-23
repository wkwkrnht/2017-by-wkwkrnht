<?php
/*
    general
1.ADD iquery
2.DELETE emoji
3.DELETE hash from URL
4.SANITIZE resource tag
5.ADD body class
6.REMOVE author ID from comment's class
7.FILLTER content
    ●ADD alt=""
    ●linked @hogehoge to Twitter
    ●ADD rel="noopener"(if it have target="_blank")
8.CUSTOM oEmbed
    ●Twitter
9.description filltered by the_content
10.upload to cloudinary
*/
add_filter('rest_post_collection_params','my_prefix_change_post_per_page',10,1);
function my_prefix_change_post_per_page($params){
    if(isset($params['per_page'])){
        $params['per_page']['maximum'] = 99999999999999999;
    }
    return $params;
}
add_filter('rest_endpoints','my_prefix_change_tag_per_page');
function my_prefix_change_tag_per_page($endpoints){
    if(isset($endpoints['/wp/v2/tags'][0]['args']['per_page']['maximum'])){
        $endpoints['/wp/v2/tags'][0]['args']['per_page']['maximum'] = 99999999999999999;
    }
    return $endpoints;
}

remove_action('wp_head','print_emoji_detection_script',7);
remove_action('wp_print_styles','print_emoji_styles');

function vc_remove_wp_ver_asset($src){
    if(strpos($src,'ver=')){
        $src = remove_query_arg('ver',$src);
    }
    return $src;
}
add_filter('style_loader_src','vc_remove_wp_ver_asset',9999);
add_filter('script_loader_src','vc_remove_wp_ver_asset',9999);

function replace_link_stylesheet_tag($tag){
    return preg_replace(array("/'/",'/ \/>/'),array('"','>'),$tag);
}
add_filter('style_loader_tag','replace_link_stylesheet_tag');
function replace_script_tag($tag){
	return preg_replace(array("/'/",'/ type=\"text\/javascript\"/'),array('"',''),$tag);
}
add_filter('script_loader_tag','replace_script_tag');

add_filter('body_class','add_body_class');
function add_body_class($classes){
    $classes = preg_grep('/\Aauthor\-.+\z/i',$classes,PREG_GREP_INVERT);
    if(is_singular()===true){
        global $post;
        foreach((get_the_category($post->ID)) as $category){$classes[] = 'categoryid-' . $category->cat_ID;}
    }
    return $classes;
}
function themeslug_comment_class($classes){
	return preg_grep('/\comment\-author\-.+\z/i',$classes,PREG_GREP_INVERT);
}
add_action('comment_class','themeslug_comment_class');

function wkwkrnht_replace($content){
    $content = str_replace(']]>',']]&gt;',$content);
    $content = preg_replace('/border=".*?"/','',$content);
    $content = preg_replace('/frameborder=".*?"/','',$content);
    $content = preg_replace('/marginwidth=".*?"/i','',$content);
    $content = preg_replace('/marginheight=".*?"/i','',$content);
    $content = preg_replace_callback('#(<code.*?>)(.*?)(</code>)#imsu',function($match){return $match[1] . esc_html($match[2]) . $match[3];},$content);
    $content = preg_replace('/<img((?![^>]*alt=)[^>]*)>/i','<img alt=""${1}>',$content);
    $content = preg_replace('/<a href="(.*?)" target="_blank"/',"<a href=\"$1\" target=\"_blank\" rel=\"noopener\"",$content);
    $content = preg_replace('/([^a-zA-Z0-9-_&])@([0-9a-zA-Z_]+)/',"$1<a href=\"http://twitter.com/$2\" target=\"_blank\" rel=\"noopener nofollow\">@$2</a>",$content);
    if(is_amp()===true){
        $content = sanitize_for_amp($content);
    }
    return $content;
}
add_filter('the_content','wkwkrnht_replace');
add_filter('comment_text','wkwkrnht_replace');

function custom_oembed_element($html){
    if(strpos($html,'twitter.com')!==false || strpos($html,'mobile.twitter.com')!==false){
        $html = preg_replace('/ class="(.*?)\d+"/','class="$1" align="center"',$html);
        return $html;
    }
    return $html;
}
add_filter('embed_handler_html','custom_oembed_element');
add_filter('embed_oembed_html','custom_oembed_element');
wp_embed_register_handler('gist','/https?:\/\/gist\.github\.com\/([a-z0-9]+)\/([a-z0-9]+)(#file=.*)?/i','wp_embed_register_handler_for_gist');
function wp_embed_register_handler_for_gist($matches,$attr,$url,$rawattr){
    $embed = sprintf('<script src="https://gist.github.com/%1$s/%2$s.js"></script>',esc_attr($matches[1]),esc_attr($matches[2]));
    return apply_filters('embed_gist',$embed,$matches,$attr,$url,$rawattr);
}

add_filter('term_description','wkwkrnht_term_description');
function wkwkrnht_term_description($term){
    if(empty($term)===true){
        return false;
    }
    return apply_filters('the_content',$term);
}

add_action('pre_get_posts','wkwkrnht_pre_get_posts');
function wkwkrnht_pre_get_posts($query){
    if(is_admin()===true){
        return $query;
    }
    if($query->is_main_query()===true){
        if($query->is_feed('gunosy')===true || $query->is_feed('smartnews')===true){
            $query->set('post_type',['post','any']);
            $query->set('post_status',['publish','trash']);
        }
    }
    return $query;
}





//以下、寝ログコピペ

//Amazon
//外部ファイルの取得
if ( !function_exists( 'get_http_content' ) ):
function get_http_content($url){
  try {
    $ch = curl_init();
    curl_setopt_array($ch, [
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
    ]);
    $body = curl_exec($ch);
    $errno = curl_errno($ch);
    $error = curl_error($ch);
    curl_close($ch);
    if (CURLE_OK !== $errno) {
      throw new RuntimeException($error, $errno);
    }
    return $body;
  } catch (Exception $e) {
    return false;
    //echo $e->getMessage();
  }
}
endif;

//シンプルなアソシエイトURLの作成（PA-API制限時用）
if ( !function_exists( 'get_amazon_associate_url' ) ):
function get_amazon_associate_url($asin, $associate_tracking_id){
  $base_url = 'https://www.amazon.co.jp/exec/obidos/ASIN';
  $associate_url = $base_url.'/'.$asin.'/';
  if (!empty($associate_tracking_id)) {
    $associate_url .= $associate_tracking_id.'/';
  }
  $associate_url = esc_url($associate_url);
  return $associate_url;
}
endif;

//Amazon商品紹介リンクの外枠で囲む
if ( !function_exists( 'wrap_amazon_item_box' ) ):
function wrap_amazon_item_box($message){
  return '<div class="amazon-item-box no-icon amazon-item-error cf"><div>'.$message.'</div></div>';
}
endif;

//Amazon商品リンク作成
//API処理参考：https://qiita.com/yokkong/items/efd3b4dcdeeb1555de8f
add_shortcode('amazon', 'generate_amazon_product_link');
if ( !function_exists( 'generate_amazon_product_link' ) ):
function generate_amazon_product_link($atts){
  extract( shortcode_atts( array(
    'asin' => null,
    'id' => null,
    //'isbn ' => null,
    'kw' => null,
    'title' => null,
    'amazon' => 1,
    'rakuten' => 1,
    'yahoo' => 1,
  ), $atts ) );

  $asin = esc_html(trim($asin));

  //ASINが取得できない場合はID
  if (empty($asin)) {
    $asin = $id;
  }

  //アクセスキー
  $access_key_id = 'ACCESS_KEY_ID';
  //シークレットキー
  $secret_access_key = 'SECRET_ACCESS_KEY';
  //アソシエイトタグ
  $associate_tracking_id = 'ASSOCIATE_TRACKING_ID';
  //楽天アフィリエイトID
  $rakuten_affiliate_id = 'RAKUTEN_AFFILIATE_ID';
  //Yahoo!バリューコマースSID
  $sid = 'SID';
  //Yahoo!バリューコマースPID
  $pid = 'PID';
  //キャッシュ更新間隔
  $days = 60;
  //キーワード
  $kw = trim($kw);


  //アクセスキーもしくはシークレットキーがない場合
  if (empty($access_key_id) || empty($secret_access_key)) {
    $error_message = 'Amazon APIのアクセスキーもしくはシークレットキーが設定されていません。';
    return wrap_amazon_item_box($error_message);
  }

  //ASINがない場合
  if (empty($asin)) {
    $error_message = 'Amazon商品リンクショートコード内にASINが入力されていません。';
    return wrap_amazon_item_box($error_message);
  }

  //アソシエイトurlの取得（デフォルト）
  $associate_url = get_amazon_associate_url($asin, $associate_tracking_id);

  $new_cache = false;
  //キャッシュの存在
  $transient_id = 'nlg_amazon_api_asin_'.$asin;
  $xml_cache = get_transient( $transient_id );
  if ($xml_cache) {
    $res = $xml_cache;
  } else {
    //APIエンドポイントURL
    $endpoint = 'https://ecs.amazonaws.jp/onca/xml';

    // パラメータ
    $params = array(
      //共通↓
      'Service' => 'AWSECommerceService',
      'AWSAccessKeyId' => $access_key_id,
      'AssociateTag' => $associate_tracking_id,
      //リクエストにより変更↓
      'Operation' => 'ItemLookup',
      'ItemId' => $asin,
      'ResponseGroup' => 'ItemAttributes,Images',
      //署名用タイムスタンプ
      'Timestamp' => gmdate('Y-m-d\TH:i:s\Z'),
    );

    //パラメータと値のペアをバイト順？で並べかえ。
    ksort($params);


    // エンドポイントを指定します。
    $endpoint = 'webservices.amazon.co.jp';

    $uri = '/onca/xml';

    $pairs = array();

    // パラメータを key=value の形式に編集します。
    // 同時にURLエンコードを行います。
    foreach ($params as $key => $value) {
      array_push($pairs, rawurlencode($key)."=".rawurlencode($value));
    }

    // パラメータを&で連結します。
    $canonical_query_string = join("&", $pairs);

    // 署名に必要な文字列を先頭に追加します。
    $string_to_sign = "GET\n".$endpoint."\n".$uri."\n".$canonical_query_string;

    // RFC2104準拠のHMAC-SHA256ハッシュアルゴリズムの計算を行います。
    // これがSignatureの値になります。
    $signature = base64_encode(hash_hmac("sha256", $string_to_sign, $secret_access_key, true));

    // Siginatureの値のURLエンコードを行い、リクエストの最後に追加します。
    $request_url = 'https://'.$endpoint.$uri.'?'.$canonical_query_string.'&Signature='.rawurlencode($signature);

    $res = get_http_content($request_url);
    $new_cache = true;
  }

  //XMLが取得できた場合
  if ($res) {
    $responsed_xml = $res;

    // xml取得
    $xml = simplexml_load_string($res);
    //_v($xml);

    if (property_exists($xml->Error, 'Code')) {
      $error_message = '<a href="'.$associate_url.'" target="_blank">'.'Amazonで詳細を見る'.'</a>';

      if (is_user_logged_in()) {
        $admin_message = '<b>'.'管理者用エラーメッセージ'.'</b><br>';
        $admin_message .= 'アイテムを取得できませんでした。'.'<br>';
        $admin_message .= '<pre class="nohighlight"><b>'.$xml->Error->Code.'</b><br>'.preg_replace('/AWS Access Key ID: .+?\. /', '', $xml->Error->Message).'</pre>';
        $admin_message .= '<span style="colof:red;">このエラーメッセージは"サイト管理者のみ"に表示されています。少し時間おいてリロードしてください。</span>';
        $error_message .= '<br><br>'.$admin_message;
      }
      return wrap_amazon_item_box($error_message);
    }

    //var_dump($item);

    if (!property_exists($xml->Items, 'Item')) {
      $error_message = '商品を取得できませんでした。存在しないASINを指定している可能性があります。';
      return wrap_amazon_item_box($error_message);
    }

    if (property_exists($xml->Items, 'Item')) {
      $item = $xml->Items->Item;

      //var_dump($xml);

      //var_dump($xml->Items->Errors);
      // _v($item);
      $ASIN = esc_html($item->ASIN);
      $DetailPageURL = esc_url($item->DetailPageURL);
      if ($DetailPageURL) {
        $associate_url = $DetailPageURL;
      }

      $SmallImage = $item->SmallImage;
      $MediumImage = $item->MediumImage;
      $MediumImageUrl = esc_url($MediumImage->URL);
      $MediumImageWidth = esc_html($MediumImage->Width);
      $MediumImageHeight = esc_html($MediumImage->Height);
      $LargeImage = $item->LargeImage;

      $ItemAttributes = $item->ItemAttributes;

      if ($title) {
        $Title = $title;
      } else {
        $Title = $ItemAttributes->Title;
      }

      $TitleAttr = esc_attr($Title);
      $TitleHtml = esc_html($Title);

      $ProductGroup = esc_html($ItemAttributes->ProductGroup);
      $ProductGroupClass = strtolower($ProductGroup);
      $ProductGroupClass = str_replace(' ', '-', $ProductGroupClass);
      $Publisher = esc_html($ItemAttributes->Publisher);
      $Manufacturer = esc_html($ItemAttributes->Manufacturer);
      $Binding = esc_html($ItemAttributes->Binding);
      if ($Publisher) {
        $maker = $Publisher;
      } elseif ($Manufacturer) {
        $maker = $Manufacturer;
      } else {
        $maker = $Binding;
      }

      $ListPrice = $item->ListPrice;
      $FormattedPrice = esc_html($item->FormattedPrice);

      $buttons_tag = null;
      if ($kw) {
        //Amazonボタンの取得
        $amazon_btn_tag = null;
        if ($amazon) {
          $amazon_url = 'https://www.amazon.co.jp/gp/search?keywords='.urlencode($kw).'&tag='.$associate_tracking_id;
          $amazon_btn_tag =
            '<div class="shoplinkamazon">'.
              '<a href="'.$amazon_url.'" target="_blank" rel="nofollow">'.'Amazon'.'</a>'.
            '</div>';
        }

        //楽天ボタンの取得
        $rakuten_btn_tag = null;
        if ($rakuten_affiliate_id && $rakuten) {
          $rakuten_url = 'https://hb.afl.rakuten.co.jp/hgc/'.$rakuten_affiliate_id.'/?pc=https%3A%2F%2Fsearch.rakuten.co.jp%2Fsearch%2Fmall%2F'.urlencode($kw).'%2F-%2Ff.1-p.1-s.1-sf.0-st.A-v.2%3Fx%3D0%26scid%3Daf_ich_link_urltxt%26m%3Dhttp%3A%2F%2Fm.rakuten.co.jp%2F';
          $rakuten_btn_tag =
            '<div class="shoplinkrakuten">'.
              '<a href="'.$rakuten_url.'" target="_blank" rel="nofollow">'.'楽天市場'.'</a>'.
            '</div>';
        }

        //Yahoo!ボタンの取得
        $yahoo_tag = null;
        if ($sid && $pid && $yahoo) {
          $yahoo_url = 'https://ck.jp.ap.valuecommerce.com/servlet/referral?sid='.$sid.'&pid='.$pid.'&vc_url=http%3A%2F%2Fsearch.shopping.yahoo.co.jp%2Fsearch%3Fp%3D'.$kw;
          $yahoo_tag =
            '<div class="shoplinkyahoo">'.
              '<a href="'.$yahoo_url.'" target="_blank" rel="nofollow">'.'Yahoo!'.'</a>'.
            '</div>';
        }
        //ボタンコンテナ
        $buttons_tag =
          '<div class="amazon-item-buttons">'.
            $amazon_btn_tag.
            $rakuten_btn_tag.
            $yahoo_tag.
          '</div>';
      }

      $tag =
        '<div class="amazon-item-box no-icon '.$ProductGroupClass.' '.$asin.' cf">'.
          '<figure class="amazon-item-thumb">'.
            '<a href="'.$associate_url.'" class="amazon-item-thumb-link" target="_blank" title="'.$TitleAttr.'" rel="nofollow">'.
              '<img src="'.$MediumImageUrl.'" alt="'.$TitleAttr.'" width="'.$MediumImageWidth.'" height="'.$MediumImageHeight.'" class="amazon-item-thumb-image">'.
            '</a>'.
          '</figure>'.
          '<div class="amazon-item-content">'.
            '<div class="amazon-item-title">'.
              '<a href="'.$associate_url.'" class="amazon-item-title-link" target="_blank" title="'.$TitleAttr.'" rel="nofollow">'.
                 $TitleHtml.
              '</a>'.
            '</div>'.
            '<div class="amazon-item-snippet">'.
              '<div class="amazon-item-maker">'.
                $maker.
              '</div>'.
              $buttons_tag.
            '</div>'.
          '</div>'.
        '</div>';
    } else {
      $error_message = '商品を取得できませんでした。存在しないASINを指定している可能性があります。';
      $tag = wrap_amazon_item_box($error_message);
    }

    if ($new_cache) {
      //キャッシュ更新間隔
      $expiration = 60 * 60 * 24 * $days;
      //Amazon APIキャッシュの保存
      set_transient($transient_id, $responsed_xml, $expiration);
    }

    return $tag;
  }

}
endif;


//タイムライン
/*
.timeline-box {
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 16px 5px;
  box-sizing: border-box;
}

.timeline-box *{
  box-sizing: border-box;
}

.timeline-box .timeline {
  list-style: none;
  padding: 0;
  margin: 0;
}

.timeline-title {
  font-weight: bold;
  font-size: 1.1em;
  text-align: center;
}

.timeline > li {
  margin-bottom: 60px;
}

.timeline > li.timeline-item {
  overflow: hidden;
  margin: 0;
  position: relative;
}

.timeline-item-label {
  width: 110px;
  float: left;
  padding-top: 18px;
  text-align: right;
  padding-right: 1em;
  font-size: 14px;
}

.timeline-item-title {
  font-weight: bold;
}

.timeline-item-content {
  width: calc(100% - 110px);
  float: left;
  padding: .8em 1.4em;
  border-left: 3px #e5e5d1 solid;
}

.timeline-item:before {
  content: '';
  width: 12px;
  height: 12px;
  background: #6fc173;
  position: absolute;
  left: 105px;
  top: 24px;
  border-radius: 100%;
}

@media screen and (max-width: 480px) {
  .timeline-box .timeline {
    padding-left: 10px;
  }

  .timeline > li.timeline-item {
    overflow: visible;
    border-left: 3px #e5e5d1 solid;
  }

  .timeline-item-label {
    width: auto;
    float: none;
    text-align: left;
    padding-left: 16px;
  }

  .timeline-item-content {
    width: auto;
    padding: 8px;
    float: none;
    border: none;
  }

  .timeline-item::before {
    left: -12px;
    top: 19px;
    width: 21px;
    height: 21px;
  }
}
*/
//timelineショートコードコンテンツ内に余計な改行や文字列が入らないように除外
if ( !function_exists( 'remove_wrap_shortcode_wpautop' ) ):
function remove_wrap_shortcode_wpautop($shortcode, $content){
  //tiショートコードのみを抽出
  $pattern = '/\['.$shortcode.'.*?\].*?\[\/'.$shortcode.'\]/is';
  if (preg_match_all($pattern, $content, $m)) {
    $all = null;
    foreach ($m[0] as $code) {
      $all .= $code;
    }
    return $all;
  }
}
endif;

//タイムラインの作成（timelineショートコード）
add_shortcode('timeline', 'timeline_shortcode');
if ( !function_exists( 'timeline_shortcode' ) ):
function timeline_shortcode( $atts, $content = null ){
  extract( shortcode_atts( array(
    'title' => null,
  ), $atts ) );
  $content = remove_wrap_shortcode_wpautop('ti', $content);
  $content = do_shortcode( shortcode_unautop( $content ) );
  $title_tag = null;
  if ($title) {
    $title_tag = '<div class="timeline-title">'.$title.'</div>';
  }
  $tag = '<div class="timeline-box">'.
            $title_tag.
            '<ul class="timeline">'.
              $content.
            '</ul>'.
          '</div>';
  return apply_filters('timeline_tag', $tag);
}
endif;

//タイムラインアイテム作成（タイムラインの中の項目）
add_shortcode('ti', 'timeline_item_shortcode');
if ( !function_exists( 'timeline_item_shortcode' ) ):
function timeline_item_shortcode( $atts, $content = null ){
  extract( shortcode_atts( array(
    'title' => null,
    'label' => null,
  ), $atts ) );
  $title_tag = null;
  if ($title) {
    $title_tag = '<div class="timeline-item-title">'.$title.'</div>';
  }

  $content = do_shortcode( shortcode_unautop( $content ) );
  $tag = '<li class="timeline-item">'.
            '<div class="timeline-item-label">'.$label.'</div>'.
            '<div class="timeline-item-content">'.
              '<div class="timeline-item-title">'.$title.'</div>'.
              '<div class="timeline-item-snippet">'.$content.'</div>'.
            '</div>'.
          '</li>';
  return apply_filters('timeline_item_tag', $tag);
}
endif;

