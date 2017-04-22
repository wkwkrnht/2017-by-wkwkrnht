<style>
    .widget_sns_follow{
        background-color:#333;
        color:#fff;
        height:15vmax;
        position:relative;
    }
    .widget_sns_follow > .wrapper{
        box-sizing:border-box;
        display:inline-block;
        margin:none;
        position:absolute;
        top:0;
        width:49%;
    }
    .widget_sns_follow > .eyecatch{
        height:inherit;
        left:0;
    }
    .widget_sns_follow > .wrapper:not(.eyecatch){
        right:0;
    }
    .widget_sns_follow .title{
        font-size:1.8rem;
    }
    .widget_sns_follow .description{
        display:block;
    }
    .widget_sns_follow .follow-button-area{
        display:flex;
        jutify-conent:space-evenly;
        list-style-type:none;
    }
    .widget_sns_follow .follow-button-area > .follow-button{
        font-size:1.5rem;
        margin:1em .5em;
        padding:.3em 0 .45em 0;
        text-align:center;
        width:32%;
    }
    .widget_sns_follow .follow-button-area > .twitter{
        background-color:#1b95e0;
    }
    .widget_sns_follow .follow-button-area > .facebook{
        background-color:#0033ff;
    }
    .widget_sns_follow .follow-button-area > .feedly{
        background-color:#2bb24c;
    }
    .widget_sns_follow .follow-button-area > .twitter:hover{
        background-color:#31a3ea;
    }
    .widget_sns_follow .follow-button-area > .feedly:hover{
        background-color:#2ebc50;
    }
    .widget_sns_follow .follow-button-area > .follow-button > a{
        color:#fff;
        text-align:center;
    }
</style>
<img src="<?php wkwkrnht_eyecatch(array(512,512));?>" alt="eyecatch" class="eyecatch wrapper">
<div class="wrapper">
    <h3 class="title"><?php wp_title('');?>が気に入ったらフォローお願いします！</h3>
    <ul class="follow-button-area">
        <li class="twitter follow-button"><a href="https://twitter.com/<?php echo get_twitter_acount();?>" title="Twitterでフォローする"><i class="fa fa-twitter" aria-hidden="true"></i>フォローする</a></li>
        <li class="facebook follow-button"><a href="https://facebook.com/<?php echo get_option('facebook_appid');?>" title="Facebookでフォローする"><i class="fa fa-facebook" aria-hidden="true"></i>フォローする</a></li>
        <li class="feedly follow-button"><a href="<?php bloginfo('atom_url');?>" title="RSSで購読する"><i class="fa fa-rss" aria-hidden="true"></i>RSSで購読する</a></li>
    </ul>
    <p class="description">フォロー先で最新情報をお届けします。</p>
</div>