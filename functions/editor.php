<?php
/*
    editor custom
1.script
    ●category filter
    ●regulated excerpt
    ●NOT to upload without title
2.ADD TinyMCE Buttons
3.ADD quicktag
4.ADD article drived list
5.ADD editor's data
*/
function add_post_edit_featuer(){ ?>
<script>
	jQuery(function($){function catFilter(header,list){var form = $('<form>').attr({'class':'filterform','action':'#'}).css({'position':'absolute','top':'3vmin'}),input=$('<input>').attr({'class':'filterinput','type':'text','placeholder':'カテゴリー検索'});$(form).append(input).appendTo(header);$(header).css({'padding-top':'3.5vmin'});$(input).change(function(){var filter=$(this).val();if(filter){$(list).find('label:not(:contains('+filter+'))').parent().hide();$(list).find('label:contains('+filter+')').parent().show();}else{$(list).find('li').show();}return false;}).keyup(function(){$(this).change();});}$(function(){catFilter($('#category-all'),$('#categorychecklist'));});});
    jQuery(function($){var count=100;jQuery('#postexcerpt .hndle span').after('<span style=\"padding-left:1em;color:#888;font-size:1rem;\">現在の文字数： <span id=\"excerpt-count\"></span> / '+ count +'</span>');jQuery('#excerpt-count').text($('#excerpt').val().length);jQuery('#excerpt').keyup(function(){$('#excerpt-count').text($('#excerpt').val().length);if($(this).val().length > count){$(this).val($(this).val().substr(0,count));}});jQuery('#postexcerpt .inside p').html('※ここには <strong>"'+ count +'文字"</strong> 以上は入力できません。').css('color','#888');});
    jQuery(function($){if('post' == $('#post_type').val() || 'page' == $('#post_type').val()){$("#post").submit(function(e){if('' == $('#title').val()){alert('タイトルを入力してください！');$('.spinner').hide();$('#publish').removeClass('button-primary-disabled');$('#title').focus();return false;}});}});
    (function(){for(var textareas=document.getElementsByTagName("textarea"),count=textareas.length,i=0;count>i;i++)textareas[i].onkeydown=function(t){if(9===t.keyCode||9===t.which){t.preventDefault();var e=this.selectionStart;this.value=this.value.substring(0,this.selectionStart)+"	"+this.value.substring(this.selectionEnd),this.selectionEnd=e+1}};})();
</script>
<?php }
add_action('admin_head-post-new.php','add_post_edit_featuer');
add_action('admin_head-post.php','add_post_edit_featuer');

add_filter('tiny_mce_before_init','wkwkrnht_add_mce_settings');
function wkwkrnht_add_mce_settings($settings){
    $settings['extended_valid_elements'] .= "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width],script[src|defer|async|id]";
    $settings['fontsize_formats'] = '10px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px 0.5rem 0.6rem 0.8rem 1rem 1.1rem 1.2rem 1.3rem 1.4rem 1.5rem 1.6rem 1.7rem 1.8rem 1.9rem 2rem 2.1rem 2.2rem 2.3rem 2.4rem 2.5rem 0.5em 0.6em 0.7em 0.8em 0.9em 1em 1.1em 1.2em 1.3em 1.4em 1.5em 1.6em 1.7em 1.8em 1.9em 2em 2.1em 2.2em 2.3em 2.4em 2.5em 50% 55% 60% 65% 70% 75% 80% 85% 90% 95% 100% 105% 110% 115% 120% 125% 130% 135% 140% 145% 150% 175% 200% 250% 300%';
    return $settings;
}
add_filter('mce_buttons_2','wkwkrnht_add_mce_buttons');
function wkwkrnht_add_mce_buttons($buttons){
    $buttons[] = 'fontsizeselect';
    $buttons[] = 'fontselect';
    $buttons[] = 'styleselect';
    $buttons[] = 'backcolor';
    $buttons[] = 'newdocument';
    $buttons[] = 'copy';
    $buttons[] = 'paste';
    return $buttons;
}

function wkwkrnht_add_quicktags(){
    if(wp_script_is('quicktags')===true){ ?>
    <script>
        QTags.addButton('qt-customcss','カスタムCSS','[customcss display= style=',']');
        QTags.addButton('qt-htmlencode','HTMLエンコード','[html_encode]','[/html_encode]');
        QTags.addButton('qt-nav','カスタムメニュー','[nav id=',']');
        QTags.addButton('qt-toc','目次','[toc id= class=toc title=目次 showcount=2 depth=0 toplevel=1 targetclass=article-main offset=]');
        QTags.addButton('qt-caption','caption','[caption id= class= align= width=]','[/caption]');
        QTags.addButton('qt-gallery','gallery','[gallery include=',' exclude= orderby=menu_order order=ASC columns=3 size=thumbnail itemtag=figure icontag"" captiontag=figcaption link=file]');
        QTags.addButton('qt-audio','audio','[audio src=',' loop=off autoplay=off preload=metadata]');
        QTags.addButton('qt-video','video','[video src=',' poster= loop=off autoplay=off preload=metadata]');
        QTags.addButton('qt-playlist','playlist','[playlist include=',' exclude= type=audio orderby=menu_order order=ASC style=light tracklist=true tracknumbers=true images=true artists=true]');
        QTags.addButton('qt-embed','embed','[embed]','[/embed]');
        QTags.addButton('qt-embedly','embedly','[embedly url=',']');
		QTags.addButton('qt-hatenablogcard','はてなブログカード','[hatenaBlogcard url=',']');
        QTags.addButton('qt-ogpblogcard','OGPブログカード','[OGPBlogcard url=',']');
        QTags.addButton('qt-spotify','spotify','[spotify url=',']');
        QTags.addButton('qt-mastodon','mastodon','[mastodon url=',']');
        QTags.addButton('qt-adsense','Googledsense','[adsaense client= slot=',']');
        QTags.addButton('qt-before_after_box','画像ビフォーアフター','[before_after_box after= before=',']');
        QTags.addButton('qt-columun','コラム','[columun color= title=]','[/columun]');
        QTags.addButton('qt-box','box','[box color= title=]','[/box]');
        QTags.addButton('qt-simple-box','simple-box','[simple-box color=]','[/simple-box]');
        QTags.addButton('qt-button','button','[button class=blue]','[/button]');
        QTags.addButton('qt-link-button','link_button','[link_button class=blue url=]','[/link_button]');
        QTags.addButton('qt-a','a','[link url=]','[/link]');
        QTags.addButton('qt-abbr','abbr','<abbr title="">','</abbr>');
		QTags.addButton('qt-q','q','<q>','</q>');
        QTags.addButton('qt-p','p','<p>','</p>');
        QTags.addButton('qt-h1','h1','<h1>','</h1>');
        QTags.addButton('qt-h2','h2','<h2>','</h2>');
		QTags.addButton('qt-h3','h3','<h3>','</h3>');
		QTags.addButton('qt-h4','h4','<h4>','</h4>');
        QTags.addButton('qt-h5','h5','<h5>','</h5>');
        QTags.addButton('qt-h6','h6','<h6>','</h6>');
        QTags.addButton('qt-table','table','<table>','</table>');
        QTags.addButton('qt-thead','thead','      <thead>','      </thead>');
        QTags.addButton('qt-tbody','tbody','      <tbody>','      </tbody>');
        QTags.addButton('qt-tfoot','tfoot','      <tfoot>','      </tfoot>');
        QTags.addButton('qt-tr','tr','         <tr>','         </tr>');
        QTags.addButton('qt-th','th','           <th>','</th>');
        QTags.addButton('qt-td','td','           <td>','</td>');
		QTags.addButton('qt-marker','marker','[marker]','[/marker]');
		QTags.addButton('qt-information','情報','[info]','[/info]');
		QTags.addButton('qt-question','疑問','[qa]','[/qa]');
        QTags.addButton('qt-searchbox','検索風表示','[search-box]','[/search-box]');
    </script><?php }
}
add_action('admin_print_footer_scripts','wkwkrnht_add_quicktags');

function add_posts_columns($columns){
    $columns['thumbnail'] = 'thumb';
    $columns['postid']    = 'ID';
    $columns['count']     = 'word count';
    return $columns;
}
function add_posts_columns_row($column_name,$post_id){
    if('thumbnail'===$column_name){
        $thumb = get_the_post_thumbnail($post_id);
        echo ($thumb) ? '○' : '×';
    }elseif('postid'===$column_name){
        echo $post_id;
    }elseif('count'===$column_name){
        $count = mb_strlen(strip_tags(get_post_field('post_content',$post_id)),'UTF-8');
        echo $count;
    }
}
add_filter('manage_posts_columns','add_posts_columns');
add_action('manage_posts_custom_column','add_posts_columns_row',10,2);
function custmuize_restrict_manage_posts_exsample(){
    global $post_type,$tag;
    if(is_object_in_taxonomy($post_type,'post_tag')){
        wp_dropdown_categories(array('show_option_all'=>get_taxonomy('post_tag')->labels->all_items,'hide_empty'=>0,'hierarchical'=>1,'show_count'=>0,'orderby'=>'name','selected'=>$tag,'name'=>'tag','taxonomy'=>'post_tag','value_field'=>'slug'));
    }
    wp_dropdown_users(array('show_option_all' => 'すべてのユーザー','name' => 'author'));
}
add_action('restrict_manage_posts','custmuize_restrict_manage_posts_exsample');
function custmuize_load_edit_php_exsample(){
    if(isset($_GET['tag']) && '0'===$_GET['tag']){unset($_GET['tag']);}
}
add_action('load-edit.php','custmuize_load_edit_php_exsample');
function nendebcom_register_bulk_actions_delete($bulk_actions){
    $bulk_actions['delete'] = 'いきなり削除する';
    return $bulk_actions;
}
add_filter('bulk_actions-edit-post','nendebcom_register_bulk_actions_delete');

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