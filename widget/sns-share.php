<style>
    .widget_sns_share > *{
        -webkit-transform:translateZ(0px);
    }
    .widget_sns_share ul{
        list-style:none;
        overflow-x:scroll;
        overflow-y:hidden;
        text-align:center;
        white-space:nowrap;
    }
    .widget_sns_share li{
        display:inline-block;
        height:10vmax;
        width:10vmax;
    }
    .widget_sns_share ul li a{
        color:#fff;
        font-size:2rem;
        position:relative;
        top:35%;
    }
    .widget_sns_share .tweet{
        background-color:#55acee;
    }
    .widget_sns_share .fb-like{
        background-color:#3b5998;
    }
    .widget_sns_share .buffer{
        background-color:#333;
        font-size:4rem;
        font-weight:900;
        overflow:hidden;
    }
    .widget_sns_share .line{
        background-color:#6cc655;
    }
    .widget_sns_share .g-plus{
        background-color:#dc4e41;
    }
    .widget_sns_share .linkedin{
        background-color:#36465d;
    }
    .widget_sns_share .reddit{
        background-color:#ff5700;
    }
    .widget_sns_share .vk{
        background-color:#83bad6;
    }
    .widget_sns_share .stumbleupon{
        background-color:#ffcc00;
    }
    .widget_sns_share .hatebu{
        background-color:#00a5de;
        font-size:5rem;
        font-weight:900;
    }
    .widget_sns_share li.instapaper{
        background-color:#fff;
    }
    .widget_sns_share li.instapaper > a{
        color:#333;
        font:900 5rem/1.9 serif;
    }
    .widget_sns_share .pinterest{
        background-color:#bd081c;
    }
    .widget_sns_share .pocket{
        background-color:#ef3f56;
    }
    .widget_sns_share .tumblr{
        background-color:#36465d;
    }
</style>
<ul>
    <li class="tweet">
        <a href="https://twitter.com/share?url=<?php echo get_meta_url();?>&amp;text=<?php wp_title('');if(get_twitter_acount()!==null){echo'&amp;via=' . get_twitter_acount();}?>" target="_blank" title="Twitterへの共有リンク">
            <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
    </li>
    <li class="fb-like">
        <a href="http://www.facebook.com/share.php?u=<?php echo rawurlencode(get_meta_url());?>" target="_blank" title="Facebookへの共有リンク">
            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
        </a>
    </li>
    <li class="line">
        <a href="http://lineit.line.me/share/ui?url=<?php echo get_meta_url();?>" target="_blank" title="LINEへの共有リンク">
            <i class="fa fa-comments" aria-hidden="true"></i>
        </a>
    </li>
    <li class="g-plus">
        <a href="https://plus.google.com/share?url=<?php echo get_meta_url();?>" target="_blank" title="Google+への共有リンク">
            <i class="fa fa-google-plus-official" aria-hidden="true"></i>
        </a>
    </li>
    <li class="linkedin">
        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_meta_url();?>&amp;title=<?php wp_title('');?>" target="_blank" title="Linkedinへの共有リンク">
            <i class="fa fa-linkedin-square" aria-hidden="true"></i>
        </a>
    </li>
    <li class="buffer">
        <a href="https://bufferapp.com/add?url<?php echo get_meta_url();?>&amp;title=<?php wp_title('');?>" target="_blank" title="Bufferへの共有リンク">
            Buffer
        </a>
    </li>
    <li class="reddit">
        <a href="https://www.reddit.com/submit?url=<?php echo get_meta_url();?>" target="_blank" title="Redditへの共有リンク">
            <i class="fa fa-reddit-alien" aria-hidden="true"></i>
        </a>
    </li>
    <li class="vk">
        <a href="http://vkontakte.ru/share.php?url=<?php echo get_meta_url();?>" target="_blank" title="VKへの共有リンク">
            <i class="fa fa-vk" aria-hidden="true"></i>
        </a>
    </li>
    <li class="stumbleupon">
        <a href="http://www.stumbleupon.com/submit?url=<?php echo get_meta_url();?>&amp;title=<?php wp_title('');?>" target="_blank" title="StumbleUponの共有リンク">
            <i class="fa fa-stumbleupon-circle" aria-hidden="true"></i>
        </a>
    </li>
    <li class="hatebu">
        <a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo get_meta_url();?>&amp;title=<?php wp_title('');?>" target="_blank" title="はてなブックマークへの共有リンク">
            B!
        </a>
    </li>
    <li class="pocket">
        <a href="http://getpocket.com/edit?url=<?php echo get_meta_url();?>&amp;title=<?php wp_title('');?>" target="_blank" title="Pocketへの共有リンク">
            <i class="fa fa-get-pocket" aria-hidden="true"></i>
        </a>
    </li>
    <li class="pinterest">
        <a href="http://pinterest.com/pin/create/button/?url=<?php echo get_meta_url();?>&amp;media=<?php meta_image();?>" target="_blank" title="Pinterestへの共有リンク">
            <i class="fa fa-pinterest" aria-hidden="true"></i>
        </a>
    </li>
    <li class="instapaper">
        <a href="http://www.instapaper.com/text?u=<?php echo get_meta_url();?>" target="_blank" title="Instapaperへの共有リンク">
            I
        </a>
    </li>
    <li class="tumblr">
        <a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo get_meta_url();?>" target="_blank" title="thumblrへの共有リンク">
            <i class="fa fa-tumblr" aria-hidden="true"></i>
        </a>
    </li>
</ul>