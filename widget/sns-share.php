<?php $url_now = get_meta_url();?>
<ul>
    <li class="toot">
        <a href="https://mastoshare.net/post.php" target="_blank" rel="noopener" title="Mastodonへの共有リンク">
            <span class="fa fa-paw" aria-hidden="true"></span>
        </a>
    </li>
    <li class="tweet">
        <a href="https://twitter.com/share?url=<?php echo $url_now;?>&amp;text=<?php wp_title('');if(get_twitter_acount()!==null){echo'&amp;via=' . get_twitter_acount();}?>" target="_blank" rel="noopener" title="Twitterへの共有リンク">
            <span class="fa fa-twitter" aria-hidden="true"></span>
        </a>
    </li>
    <li class="fb-like">
        <a href="http://www.facebook.com/share.php?u=<?php echo rawurlencode($url_now);?>" target="_blank" rel="noopener" title="Facebookへの共有リンク">
            <span class="fa fa-thumbs-up" aria-hidden="true"></span>
        </a>
    </li>
    <li class="line">
        <a href="http://lineit.line.me/share/ui?url=<?php echo $url_now;?>" target="_blank" rel="noopener" title="LINEへの共有リンク">
            <span class="fa fa-comments" aria-hidden="true"></span>
        </a>
    </li>
    <li class="g-plus">
        <a href="https://plus.google.com/share?url=<?php echo $url_now;?>" target="_blank" rel="noopener" title="Google+への共有リンク">
            <span class="fa fa-google-plus-official" aria-hidden="true"></span>
        </a>
    </li>
    <li class="linkedin">
        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url_now;?>&amp;title=<?php wp_title('');?>" target="_blank" rel="noopener" title="Linkedinへの共有リンク">
            <span class="fa fa-linkedin-square" aria-hidden="true"></span>
        </a>
    </li>
    <li class="buffer">
        <a href="https://bufferapp.com/add?url<?php echo $url_now;?>&amp;title=<?php wp_title('');?>" target="_blank" rel="noopener" title="Bufferへの共有リンク">
            Buffer
        </a>
    </li>
    <li class="reddit">
        <a href="https://www.reddit.com/submit?url=<?php echo $url_now;?>" target="_blank" rel="noopener" title="Redditへの共有リンク">
            <span class="fa fa-reddit-alien" aria-hidden="true"></span>
        </a>
    </li>
    <li class="vk">
        <a href="http://vkontakte.ru/share.php?url=<?php echo $url_now;?>" target="_blank" rel="noopener" title="VKへの共有リンク">
            <span class="fa fa-vk" aria-hidden="true"></span>
        </a>
    </li>
    <li class="stumbleupon">
        <a href="http://www.stumbleupon.com/submit?url=<?php echo $url_now;?>&amp;title=<?php wp_title('');?>" target="_blank" rel="noopener" title="StumbleUponの共有リンク">
            <span class="fa fa-stumbleupon-circle" aria-hidden="true"></span>
        </a>
    </li>
    <li class="hatebu">
        <a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_now;?>&amp;title=<?php wp_title('');?>" target="_blank" rel="noopener" title="はてなブックマークへの共有リンク">
            B!
        </a>
    </li>
    <li class="pocket">
        <a href="http://getpocket.com/edit?url=<?php echo $url_now;?>&amp;title=<?php wp_title('');?>" target="_blank" rel="noopener" title="Pocketへの共有リンク">
            <span class="fa fa-get-pocket" aria-hidden="true"></span>
        </a>
    </li>
    <li class="pinterest">
        <a href="http://pinterest.com/pin/create/button/?url=<?php echo $url_now;?>&amp;media=<?php meta_image();?>" target="_blank" rel="noopener" title="Pinterestへの共有リンク">
            <span class="fa fa-pinterest" aria-hidden="true"></span>
        </a>
    </li>
    <li class="instapaper">
        <a href="http://www.instapaper.com/text?u=<?php echo $url_now;?>" target="_blank" rel="noopener" title="Instapaperへの共有リンク">
            I
        </a>
    </li>
    <li class="tumblr">
        <a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo $url_now;?>" target="_blank" rel="noopener" title="thumblrへの共有リンク">
            <span class="fa fa-tumblr" aria-hidden="true"></span>
        </a>
    </li>
    <?php if(is_singular()===false):?>
        <li class="pushdog">
            <a href="https://push.dog/subscribe?url=<?php echo $url_now;?>" target="_blank" rel="noopener" title="puahdogへの共有リンク">
                <span class="fa fa-paw" aria-hidden="true"></span>
            </a>
        </li>
    <?php endif;?>
</ul>
<script type="application/ld+json">
    {
        "@context" : "http://schema.org",
        "@type" : "SiteNavigationElement",
        "url" : "https://twitter.com/share?url=<?php echo $url_now;?>&amp;text=<?php wp_title('');if(get_twitter_acount()!==null){echo'&amp;via=' . get_twitter_acount();}?>",
        "name" : "Twitter",
        "url" : "http://www.facebook.com/share.php?u=<?php echo rawurlencode($url_now);?>",
        "name" : "facebook",
        "url" : "http://lineit.line.me/share/ui?url=<?php echo $url_now;?>",
        "name" : "LINE",
        "url" : "https://plus.google.com/share?url=<?php echo $url_now;?>",
        "name" : "Google+",
        "url" : "https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url_now;?>&amp;title=<?php wp_title('');?>",
        "name" : "LinkedIn",
        "url" : "https://bufferapp.com/add?url<?php echo $url_now;?>&amp;title=<?php wp_title('');?>",
        "name" : "buffer",
        "url" : "https://www.reddit.com/submit?url=<?php echo $url_now;?>",
        "name" : "Reddit",
        "url" : "http://vkontakte.ru/share.php?url=<?php echo $url_now;?>",
        "name" : "VK",
        "url" : "http://www.stumbleupon.com/submit?url=<?php echo $url_now;?>&amp;title=<?php wp_title('');?>",
        "name" : "stumbleupon",
        "url" : "http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_now;?>&amp;title=<?php wp_title('');?>",
        "name" : "はてなブックマーク",
        "url" : "http://getpocket.com/edit?url=<?php echo $url_now;?>&amp;title=<?php wp_title('');?>",
        "name" : "Pocket",
        "url" : "http://pinterest.com/pin/create/button/?url=<?php echo $url_now;?>&amp;media=<?php meta_image();?>",
        "name" : "Pinterest",
        "url" : "http://www.instapaper.com/text?u=<?php echo $url_now;?>",
        "name" : "Instapaper",
        "url" : "https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo $url_now;?>",
        "name" : "tumblr"
    }
</script>