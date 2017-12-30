/*
1.header nav
2.float menu
3.main-nav
4.social-nav
5.page nation
*/
<?php if(has_nav_menu('header')===true):?>
    .header-nav{
        background-color:<?php color_change_brightness($header_background,get_option('site_nav_background_brightness','-40'));?>;
        box-shadow:0 0 3vmin rgba(0,0,0,.1) inset;
        box-sizing:border-box;
        font-size:1.6rem;
        height:5%;
        margin:2vh 0 0;
        overflow-x:auto;
        overflow-y:hidden;
        white-space:nowrap;
        width:100%;
        word-break:break-all;
    }
    .header-nav,.header-nav a{
        color:<?php echo $header_color;?>;
    }
    .header-nav li{
        box-sizing:border-box;
        display:inline-block;
        padding:.3em .6em;
    }
<?php endif;?>

<?php
$social_nav = has_nav_menu('social');
$main_nav   = has_nav_menu('main');?>
<?php if($social_nav===true||$main_nav===true||is_active_sidebar('floatmenu')===ture):?>
    .menu-toggle{
        background-color:<?php echo get_option('footer_background','#03a9f4');?>;
        border:none;
        border-radius:50%;
        bottom:2vh;
        box-shadow:0 0 3vmin rgba(0,0,0,.2);
        color:<?php echo get_option('footer_color','#fff');?>;
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
    .menu-wrap.block ~ .menu-toggle{
        transform:rotate(45deg);
    }

    .menu-wrap{
        background-color:<?php echo get_option('menu_background','#fff');?>;
        bottom:19vh;
        box-shadow:0 0 3vmin rgba(0,0,0,.3);
        color:<?php echo get_option('menu_color','#000');?>;
        height:76vh;
        left:calc(50% - 90vw / 2);
        margin:0;
        opacity:.85;
        overflow-x:hidden;
        overflow-y:auto;
        position:fixed;
        width:90vw;
        z-index:111;
    }
    .menu-wrap > ul{
        width:80vw;
    }
<?php endif;?>

<?php if($main_nav===true):?>
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
<?php endif;?>

<?php if($social_nav===true):?>
    .social-nav{
        display:block;
        margin:4vh auto;
        min-height:4em;
        width:100%;
    }
    .social-nav ul{
        list-style:none;
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
        font:2rem "FontAwesome";
        position:absolute;
        speak:none;
        text-align:center;
        text-decoration:none;
    }
    .social-nav a::before{
        content:"\f07b";
        left:0;
        top:0;
    }
    .social-nav a::after{
        bottom:0;
        font-size:calc(2rem * .8);
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
    .social-nav a[href*="/feed"]::before,.social-navigation a[href*="/feed/"]::before{
        content:'\f09e';
        color:#2aff00;
    }
    .social-nav a[href*="feedly.com"]::before{
        content:"\f143";
        color:#2aff00;
        transform:rotate(-15deg);
    }
    .social-nav a[href*="flickr.com"]::before{
        content:"\f16e";
        color:#ff0084;
    }
    .social-nav a[href*="foursquare.com"]::before{
        content:"\f180";
        color:#f94877;
    }
    .social-nav a[href*="plus.google.com"]::before{
        content:"\f0d5";
        color:#ff0033;
    }
    .social-nav a[href*="github.com"]::before{
        content:"\f09b";
        color:#0033ff;
    }
    .social-nav a[href*="instagram.com"]::before{
        content:"\f16d";
        color:#3f729b;
    }
    .social-nav a[href*="linkedin.com"]::before{
        content:"\f0e1";
        color:#0077b5;
    }
    .social-nav a[href*="mailto:"]::before{
        content:"\f0e0";
    }
    .social-nav a[href*="nicovideo"]::before{
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
        content:"\f200";
    }
    .social-nav a[href*="push.dog"]::before{
        content:"\f1b0";
    }
    .social-nav a[href*="bpush.net"]::before,.social-nav a[href*="pushnate.com"]::before,.social-nav a[href*="pushsan.com"]::before,.social-nav a[href*="onesignal.com"]::before{
        content:"\f0f3";
    }
    .social-nav a[href*="push7.jp"]::before{
        content:"\f0e7";
        color:#fffc00;
    }
    .social-nav a[href*="reddit.com"]::before{
        content:"\f1a1";
        color:#ff5700;
    }
    .social-nav a[href*="skype.com"]::before{
        content:"\f17e";
        color:#00aff0;
    }
    .social-nav a[href*="slack.com"]::before{
        content:"\f198";
    }
    .social-nav a[href*="stumbleupon.com"]::before{
        content:"\f1a4";
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
        content:"\f1e8";
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
        content:"\f27d";
        color:#1ab7ea;
    }
    .social-nav a[href*="youtube.com"]::before{
        content:"\f167";
        color:#ff0033;
    }
    .social-nav a[href*="wordpress.com"]::before,.social-navigation a[href*="wordpress.org"]::before{
        content:"\f19a";
        color:#21759b;
    }
    .social-nav a[data-title*="contact"]::before,.social-nav a[data-title*="問い合わせ"]::before,.social-nav a[data-title*="質問"]::before{
        content:"\f298";
    }
<?php endif;?>

.page-nation{
    align-items:center;
    display:flex;
    flex-wrap:wrap;
    height:10vw;
    list-style:none;
    justify-content:center;
    margin:4vh auto;
    width:80vw;
}
.page-nation a,.page-nation .current,.page-nation li .dots{
    border:solid .5vmin <?php echo get_option('page_nation_border','#03a9f4');?>;
    font-size:1.3rem;
    font-weight:bold;
    margin:0 .5vmin;
    padding:2vmin;
}
.page-nation a{
    background-color:<?php echo get_option('page_nation_a_background','#fff');?>;
    color:<?php echo get_option('page_nation_a_color','#03a9f4');?>;
    text-decoration:none;
}
.page-nation a:hover,.page-nation .current,.page-nation li .dots{
    background-color:<?php echo get_option('page_nation_hover_background','#03a9f4');?>;
    color:<?php echo get_option('page_nation_hover_color','#fff');?>;
}