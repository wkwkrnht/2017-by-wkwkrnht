<img src="<?php wkwkrnht_eyecatch('wkwkrnht-thumb-480-crop');?>" alt="eyecatch" class="eyecatch wrapper">
<div class="wrapper">
    <p class="title">「<?php echo wp_get_document_title();?>」が気に入ったらフォローお願いします！<br>フォロー先で最新情報をお届けします。</p>
    <ul class="follow-button-area">
        <li class="twitter follow-button">
            <a href="https://twitter.com/<?php echo get_twitter_acount();?>" title="Twitterでフォローする">
                <span class="fa fa-twitter" aria-hidden="true"></span>でフォローする
            </a>
        </li>
        <li class="facebook follow-button">
            <a href="https://facebook.com/<?php echo get_option('facebook_appid');?>" title="Facebookでフォローする">
                <span class="fa fa-facebook" aria-hidden="true"></span>でフォローする
            </a>
        </li>
        <li class="feedly follow-button">
            <a href="<?php bloginfo('atom_url');?>" title="RSSで購読する">
                <span class="fa fa-rss" aria-hidden="true"></span>でフォローする
            </a>
        </li>
    </ul>
</div>