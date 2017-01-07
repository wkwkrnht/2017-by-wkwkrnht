        </main>
        <div id="menu-wrap" class="close">
            <nav class="menu-tab">
                <a href="javascript:void(0)" id="main-menu-toggle" tabindex="0" role="button" title="メニューへのリンク">menu</a>
                <a href="javascript:void(0)" id="share-menu-toggle" tabindex="0" role="button" title="共有機能へのリンク"><i class="fa fa-share-alt fa-5x"></i></a>
            </nav>
            <nav id="share-menu" class="block">
                <ul>
                    <li class="tweet"><a href="https://twitter.com/share?url=<?php echo get_meta_url();?>&amp;text=<?php wp_title('');?><?php if(get_twitter_acount()!==null):echo '&amp;via=' . get_twitter_acount();endif;?>" target="_blank" title="Twitterへの共有リンク"><i class="fa fa-twitter fa-5x" aria-hidden="true"></i></a></li>
                    <li class="fb-like"><a href="http://www.facebook.com/share.php?u=<?php echo rawurlencode(get_meta_url());?>" target="_blank" title="Facebookへの共有リンク"><i class="fa fa-thumbs-up fa-5x" aria-hidden="true"></i></a></li>
                    <li class="line"><a href="http://lineit.line.me/share/ui?url=<?php echo get_meta_url();?>" target="_blank" title="LINEへの共有リンク"><i class="fa fa-comments fa-5x" aria-hidden="true"></i></a></li>
                    <li class="g-plus"><a href="https://plus.google.com/share?url=<?php echo get_meta_url();?>" target="_blank" title="Google+への共有リンク"><i class="fa fa-google-plus-official fa-5x" aria-hidden="true"></i></a></li>
                    <li class="linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_meta_url();?>&amp;title=<?php wp_title('');?>" target="_blank" title="Linkedinへの共有リンク"><i class="fa fa-linkedin-square fa-5x" aria-hidden="true"></i></a></li>
                    <li class="buffer"><a href="https://bufferapp.com/add?url<?php echo get_meta_url();?>&amp;title=<?php wp_title('');?>" target="_blank" title="Bufferへの共有リンク">Buffer</a></li>
                    <li class="reddit"><a href="https://www.reddit.com/submit?url=<?php echo get_meta_url();?>" target="_blank" title="Redditへの共有リンク"><i class="fa fa-reddit-alien fa-5x" aria-hidden="true"></i></a></li>
                    <li class="vk"><a href="http://vkontakte.ru/share.php?url=<?php echo get_meta_url();?>" target="_blank" title="VKへの共有リンク"><i class="fa fa-vk fa-5x" aria-hidden="true"></i></a></li>
                    <li class="stumbleupon"><a href="http://www.stumbleupon.com/submit?url=<?php echo get_meta_url();?>&amp;title=<?php wp_title('');?>" target="_blank" title="StumbleUponの共有リンク"><i class="fa fa-stumbleupon-circle fa-5x" aria-hidden="true"></i></a></li>
                    <li class="hatebu"><a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo get_meta_url();?>&amp;title=<?php wp_title('');?>" target="_blank" title="はてなブックマークへの共有リンク">B!</a></li>
                    <li class="pocket"><a href="http://getpocket.com/edit?url=<?php echo get_meta_url();?>&amp;title=<?php wp_title('');?>" target="_blank" title="Pocketへの共有リンク"><i class="fa fa-get-pocket fa-5x" aria-hidden="true"></i></a></li>
                    <li class="pinterest"><a href="http://pinterest.com/pin/create/button/?url=<?php echo get_meta_url();?>&amp;media=<?php meta_image();?>" target="_blank" title="Pinterestへの共有リンク"><i class="fa fa-pinterest fa-5x" aria-hidden="true"></i></a></li>
                    <li class="instapaper"><a href="http://www.instapaper.com/text?u=<?php echo get_meta_url();?>" target="_blank" title="Instapaperへの共有リンク">I</a></li>
                    <li class="tumblr"><a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo get_meta_url();?>" target="_blank" title="thumblrへの共有リンク"><i class="fa fa-tumblr fa-5x" aria-hidden="true"></i></a></li>
                </ul>
            </nav>
            <div id="main-menu" class="none">
                <?php if(has_nav_menu('social')):?>
                    <nav class="social-nav">
                        <?php wp_nav_menu(array('theme_location'=>'social','container'=>false,'items_wrap'=>'<ul id="%1$s" class="%2$s" itemscope itemtype="http://schema.org/SiteNavigationElement">%3$s</ul>','walker'=>new add_meta_Social_Menu));?>
                    </nav>
                <?php endif;?>
                <?php if(has_nav_menu('main')):?>
                    <nav class="main-nav">
                        <?php wp_nav_menu(array('theme_location'=>'main','container'=>false,'items_wrap'=>'<ul id="%1$s" class="%2$s" itemscope itemtype="http://schema.org/SiteNavigationElement">%3$s</ul>','walker'=>new add_meta_Nav_Menu));?>
                    </nav>
                <?php endif;?>
                <?php if(is_active_sidebar('floatmenu')):?>
                    <ul class="widget-area">
                        <?php dynamic_sidebar('floatmenu');?>
                    </ul>
                <?php endif;?>
            </div>
        </div>
        <a href="javascript:void(0)" id="menu-toggle" tabindex="0" role="button" title="メニューウィンドウの切り替えボタン">+</a>
        <?php
        wp_footer();
        $key = false;
        $key = get_option('cookie_key');
        if($key===false){$key = '2016-by-wkwkrnht';}
        if(get_post_format()==='link'){
            echo'
            <script>var targets = document.querySelectorAll(".format-link .article-main a");for(var i = 0; i < targets.length; i++){var target = targets[i];target.classList.add("embedly-card");}</script>
            <script async="" charset="UTF-8" src="//cdn.embedly.com/widgets/platform.js"></script>';
        }
        ?>
        <script>
            (function(){
                document.getElementById("menu-toggle").onclick = function(){
                    document.getElementById('menu-wrap').classList.toggle('close');
                    document.getElementById('menu-wrap').classList.toggle('open');
                };
                document.getElementById("main-menu-toggle").onclick = function(){
                    document.getElementById('share-menu').classList.add("none");
                    document.getElementById('share-menu').classList.remove("block");
                    document.getElementById('main-menu').classList.toggle("none");
                    document.getElementById('main-menu').classList.toggle("block");
                };
                document.getElementById("share-menu-toggle").onclick = function(){
                    document.getElementById('main-menu').classList.add("none");
                    document.getElementById('main-menu').classList.remove("block");
                    document.getElementById('share-menu').classList.toggle("none");
                    document.getElementById('share-menu').classList.toggle("block");
                };
            })();
            (function(){
                if((new Date()).getHours() >= 21 || (new Date()).getHours() < 6 ){
                    document.body.className += " night-mode";
                }
            })();
            (function(){
                var targetElements = document.getElementsByClassName("twitter-tweet");
                for ( var i = 0, l = targetElements.length; l > i; i++ ) {
                    var targetElement = targetElements[i] ;
                    targetElement.classList.add("tw-align-center");
                }
            })();
            (function(){
                var wpCss = document.getElementById("wpcss");
                if (wpCss === null) {
                    return;
                }
                var wpCssL = wpCss.length;
                for ( i = 0; i < wpCssL; i++ ) {
                    var wpStyle = document.createElement("style");
                    wpStyle.textContent = wpCss[i].textContent.replace(/\s{2,}/g,"");
                    document.head.appendChild(wpStyle);
                }
            })();
            (function(){
                var key = "<?php echo $key;?>";
                function getCookie(key){
                    var s,e;
                    var c = document.cookie + ";";
                    var b = c.indexOf(key,0);
                    if(b!=-1){
                        c = c.substring(b,c.length);
                        s = c.indexOf("=",0) + 1;
                        e = c.indexOf(";",s);
                        return(unescape(c.substring(s,e)));
                    }
                    return("");
                }
                function setCookie(key,n){
                    var myDate = new Date();
                    myDate.setTime(myDate.getTime() + 6 * 30 * 24 * 60 * 60 * 1000);
                    document.cookie = " " + key + "=" + escape(n) + ";expires=" + myDate.toGMTString();
                }
                var n = getCookie(key);
                if(n === ""){
                    window.alert("このサイトでは、よりよいサイト運営のためにCookieを使用しています。そこでお預かりした情報は、各提携先と共有する場合があります。ご了承ください。");
                }
                n++;
                setCookie(key,n);
            })();
        </script>
        <?php $txt=false;$txt=get_option('footer_txt');if($txt!==false){echo $txt;}?>
    </body>
</html>