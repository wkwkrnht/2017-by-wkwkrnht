<img src="<?php wkwkrnht_img_src('wkwkrnht-thumb-480-crop');?>" alt="eyecatch" class="eyecatch wrapper">
<div class="wrapper">
    <p class="title">
        「<?php echo wp_get_document_title();?>」が気に入ったらフォローお願いします！<br>フォロー先で最新情報をお届けします。
    </p>
    <ul class="follow-button-area">
        <li class="twitter follow-button">
            <a href="https://twitter.com/<?php echo get_twitter_acount();?>" title="Twitterでフォローする">
                <span class="fab fa-twitter" aria-hidden="true"></span>でフォローする
            </a>
        </li>
        <li class="facebook follow-button">
            <a href="https://facebook.com/<?php echo get_facebook_acount();?>" title="Facebookでフォローする">
                <span class="fab fa-facebook" aria-hidden="true"></span>でフォローする
            </a>
        </li>
        <li class="feedly follow-button">
            <a href="<?php bloginfo('rss2_url');?>" title="RSSで購読する">
                <span class="fas fa-rss" aria-hidden="true"></span>でフォローする
            </a>
        </li>
    </ul>
</div>