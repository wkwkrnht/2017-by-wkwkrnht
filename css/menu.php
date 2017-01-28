/*
1.toggle
2.wrap
3.share menu
4.main menu
5.main-nav
6.social-nav
7.page-nation
*/
#menu-toggle{
    border-radius:50%;
    bottom:4vh;
    box-shadow:0 0 3vmin rgba(0,0,0,.2);
    display:inline-block;
    font-size:5rem;
    font-weight:900;
    height:15vh;
    left:calc(50% - 7.5vh);
    line-height:15vh;
    opacity:.7;
    position:fixed;
    text-align:center;
    vertical-align:middle;
    width:15vh;
    z-index:100;
}
#menu-wrap.block ~ #menu-toggle{
    transform:rotate(45deg);
}
#menu-toggle{
    background-color:<?php echo get_option('footer_background','#03a9f4');?>;
}
#menu-toggle,#menu-toggle:visited{
    color:<?php echo get_option('footer_color','#fff');?>;
}

#menu-wrap{
    background-color:<?php echo get_option('menu_background','#fff');?>;
    box-shadow:0 0 3vmin rgba(0,0,0,.3);
    height:74vh;
    left:0;
    margin:0 7vw;
    opacity:.85
    padding-top:2vh;
    position:fixed;
    width:86vw;
    z-index:111;
}
#menu-wrap > ul{
    width:80vw;
}

.main-nav ul{
    list-style-type:none;
}
.main-nav a{
    border-bottom:1px dashed #aaa;
    display:inline-block;
    font-size:1.8rem;
    text-decoration:none;
    width:inherit;
}

.social-nav{
    display:block;
    margin:2vh auto;
    min-height:4em;
    width:100%;
}
.social-nav ul{
    list-style:none;
    margin:0 0 -1.6em 0;
}
.social-nav li{
    float:left;
}
.social-nav a{
    display:block;
    height:4em;
    position:relative;
    width:4em;
}
.social-nav a::before,.social-nav a::after{
    display:inline-block;
    font:400 1.8rem/1.9 "FontAwesome";
    font-style:normal;
    font-variant:normal;
    speak:none;
    text-align:center;
    text-decoration:none;
    text-transform:none;
}
.social-nav a::before{
    content:"\f07b";
    font-size:2.5rem;
    left:0;
    position:absolute;
    top:0;
}
.social-nav a::after{
    bottom:0;
    position:relative;
    right:0;
}
.social-nav a[href*="amazon"]::before{
    content:"\f270";
}
.social-nav a[href*="codepen.io"]::before{
    content:"\f1cb";
    color:#ffc700;
}
.social-nav a[href*="digg.com"]::before{
    content:'\f1a6';
}
.social-nav a[href*="dribbble.com"]::before{
    content:'\f17d';
    color:#ea4c89;
}
.social-nav a[href*="dropbox.com"]::before{
    content:"\f16b";
    color:#00b8ff;
}
.social-nav a[href*="facebook.com"]::before{
    content:"\f230";
    color:#0033ff;
}
.social-nav a[href*="reader.livedwango.com/"]::before,.social-nav a[href*="/feed"]::before,.social-navigation a[href*="/feed/"]::before{
    content:'\f09e';
    color:#2aff00;
}
.social-nav a[href*="feedly.com"]::before{
    content:'\f143';
    color:#2aff00;
    transform:rotate(-15deg);
}
.social-nav a[href*="flickr.com"]::before{
    content:'\f16e';
    color:#ff0084;
}
.social-nav a[href*="foursquare.com"]::before{
    content:'\f180';
    color:#f94877;
}
.social-nav a[href*="plus.google.com"]::before{
    content:"\f0d5";
    color:#ff0033;
}
.social-nav a[href*="github.com"]::before{
    content:'\f09b';
    color:#0033ff;
}
.social-nav a[href*="instagram.com"]::before{
    content:'\f16d';
    color:#3f729b;
}
.social-nav a[href*="linkedin.com"]::before{
    content:"\f0e1";
    color:#0077b5;
}
.social-nav a[href*="mailto:"]::before{
    content:"\f0e0";
}
.social-nav a[href*="nicovideo"]::before,.social-nav a[href*="reader.livedwango.com/"]::after{
    content:"\f26c";
}
.social-nav a[href*="pinterest.com"]::before{
    content:"\f231";
    color:#ff0033;
}
.social-nav a[href*="getpocket.com"]::before{
    content:"\f265";
    color:#ee4056;
}
.social-nav a[href*="polldaddy.com"]:before{
    content:'\f200';
}
.social-nav a[href*="push.dog"]::before,.social-nav a[href*="bpush.net"]::before,.social-nav a[href*="pushnate.com"]::before,.social-nav a[href*="pushsan.com"]::before,.social-nav a[href*="onesignal.com"]::before{
    content:'\f0f3';
}
.social-nav a[href*="push7.jp"]::before{
    content:'\f0e7';
    color:#fffc00;
}
.social-nav a[href*="reddit.com"]::before{
    content:'\f1a1';
    color:#ff5700;
}
.social-nav a[href*="skype.com"]::before{
    content:'\f17e';
    color:#00aff0;
}
.social-nav a[href*="stumbleupon.com"]::before{
    content:'\f1a4';
    color:#eb4924;
}
.social-nav a[href*="spotify.com"]::before{
    content:"\f1bc";
    color:#1db954;
}
.social-nav a[href*="soundcloud.com"]::before{
    content:'\f1be';
    color:#ffcc00;
}
.social-nav a[href*="tumblr.com"]::before{
    content:"\f173";
    color:#2c4762;
}
.social-nav a[href*="twitch.tv"]::before{
    content:'\f1e8';
    color:#0033ff;
}
.social-nav a[href*="twitter.com"]::before{
    content:"\f099";
    color:#00b8ff;
}
.social-nav a[href*="twilog.org"]::before{
    content:"\f099";
    color:#00b8ff;
}
.social-nav a[href*="twilog.org"]::after{
    content:"\f022";
}
.social-nav a[href*="twipf.jp"]::before{
    content:"\f099";
    color:#00b8ff;
}
.social-nav a[href*="twipf.jp"]::after{
    content:"\f007";
}
.social-nav a[href*="vimeo.com"]::before{
    content:'\f27d';
    color:#1ab7ea;
}
.social-nav a[href*="youtube.com"]::before{
    content:'\f167';
    color:#ff0033;
}
.social-nav a[href*="wordpress.com"]::before,.social-navigation a[href*="wordpress.org"]::before{
    content:'\f19a';
    color:#21759b;
}
.social-nav a[data-title*="問い合わせ"]::before,.social-nav a[data-title*="質問"]::before,.social-nav a[data-title*="Q&A"]::before{
    content:"\f298";
}

.page-nation{
    background-color:<?php echo get_option('page_nation_background','#fff');?>;
    box-shadow:0 0 3vmin rgba(0,0,0,.2);
    height:10vw;
    list-style:none;
    margin:4vh auto;
    width:80vw;
}
.page-nation{
    align-items:center;
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
}
.page-nation a,.page-nation .current,.page-nation li .dots{
    border:solid .5vmin <?php echo get_option('page_nation_border','#03a9f4');?>;
    font-weight:bold;
    margin:0 .5vmin;
    padding:2vmin;
}
.page-nation a,.page-nation li .dots{
    background-color:<?php echo get_option('page_nation_a_background','#fff');?>;
    color:<?php echo get_option('page_nation_a_color','#03a9f4');?>;
    font-size:1.3rem;
    text-decoration:none;
}
.page-nation a:hover,.page-nation .current{
    background-color:<?php echo get_option('page_nation_hover_background','#03a9f4');?>;
    color:<?php echo get_option('page_nation_hover_color','#fff');?>;
}


/*
    widget custom
1.generall
2.tag cloud
3.recent entries
4.archive
*/
ul.widget-area{
    list-style:none;
}
.widget{
    margin:4vh auto;
    max-width:94%;
}
.widget li{
    max-width:93%;
}
.widget-title{
    background-color:<?php echo get_option('wkwkrnht_widget_title_background','#03a9f4');?>;
    color:<?php echo get_option('wkwkrnht_widget_title_color','#fff');?>;
    line-height:5vh;
    margin:2vh auto;
    max-width:94%;
    min-height:5vh;
    text-align:center;
}
.widget select{
    margin:2vh auto;
    width:70%;
}

.widget_tag_cloud{
    padding:0;
    margin:3vmin;
}
.widget_tag_cloud a{
    background-color:#fff;
    border:1px solid <?php echo get_option('tag_cloud_border','#03a9f4');?>;
    border-radius:3vmin;
    color:<?php echo get_option('tag_cloud_hover_color','#333');?>;
    display:inline-block;
    font-size:1.6rem;
    height:28px;
    max-width:100px;
    margin:0 .3em .3em 0;
    overflow:hidden;
    padding:0 1em;
    text-decoration:none;
    text-overflow:ellipsis;
    white-space:nowrap;
}
.widget_tag_cloud a:hover{
    background-color:<?php echo get_option('tag_cloud_border','#03a9f4');?>;
    border:1px solid <?php echo get_option('tag_cloud_hover_border','#fff');?>;
    color:<?php echo get_option('tag_cloud_hover_color','#fff');?>;
}

.widget_recent_entries ul{
    list-style-type:none;
}
.widget_recent_entries ul li{
    border-bottom:1px dashed <?php echo get_option('article_main_li_border','#aaa');?>;
}
.widget_recent_entries ul li a{
    font-size:1.6rem;
    text-decoration:none;
}
.widget_recent_entries ul li span{
    font-size:calc(1.6rem * 0.8);
}

.widget_archive ul{
    list-style-type:none;
    text-align:center;
}
.widget_archive ul li{
    font-size:calc(1.8rem * 0.8);
}
.widget_archive ul li a{
    font-size:1.8rem;
}