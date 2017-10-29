<?php add_action('customize_register','wkwkrnht_customizer');
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
    $wp_customize->add_setting('delete_TOC_cache',array('type'=>'option','sanitize_callback'=>'sanitize_checkbox',));
    $wp_customize->add_control('delete_TOC_cache',array('settings'=>'delete_TOC_cache','label'=>'目次のキャッシュを削除する','section'=>'security_section','type'=>'checkbox',));
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

    /*
        color
    1.
    */
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

    /*
        custom space for user
    1.header
    2.footer
    */
    $wp_customize->add_setting('header_txt',array('type'=>'option','sanitize_callback'=>'sanitize_text_field',));
    $wp_customize->add_control('header_txt',array('section'=>'custom_css','settings'=>'header_txt','label'=>'headタグ内に追加で出力するテキスト','type'=>'textarea'));
    $wp_customize->add_setting('footer_txt',array('type'=>'option','sanitize_callback'=>'sanitize_text_field',));
    $wp_customize->add_control('footer_txt',array('section'=>'custom_css','settings'=>'footer_txt','label'=>'bodyタグ直前に追加で出力するテキスト','type'=>'textarea'));
}