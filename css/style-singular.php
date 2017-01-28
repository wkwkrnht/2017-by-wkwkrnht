/*
1.header
2.p & a
3.hx
4.pre & address & quote & embed
5.list
6.table
7.img
8.page-navigation
9.for chat format
10.original
11.codex
*/
.article-header{
    background-color:<?php echo get_option('article_header_background','#f4f4f4');?>;
    border:1px dashed <?php echo get_option('article_header_border','#ccc');?>;
    box-shadow:0 2vh 3vh -1vh rgba(0,0,0,.1) inset;
    box-sizing:border-box;
    height:45vw;
    margin:4vh auto;
    overflow:auto;
    padding:2vh 4vh;
    width:80vw;
}
.article-eyecatch,.article-meta,.article-date,.article-author{
    display:inline-block;
}
.article-eyecatch{
    height:25vw;
    width:25vw;
}
.article-meta{
    box-sizing:border-box;
    padding:1vh 2vh;
    width:45vw;
}
.article-title,.article-meta > div{
    width:100%;
}
.article-date,.article-author{
    width:49%;
}

.article-main{
    font-size:1.6rem;
}
.article-main p{
    margin:2vh auto;
    max-width:calc(1.6rem * 40);
    padding:1vh .5vh;
}
.article-main a[href^="http"]:empty::before{
    content:attr(href);
}
.article-main a[href^="http"][title]:empty::before{
    content:attr(title);
}
.article-main a[href*=".png"],.article-main a[href*=".jpg"],.article-main a[href*=".jpeg"],.article-main a[href*=".gif"]{
    display:block;
    margin:2vh auto;
}
.article-main a:hover,.article-main a:focus{
    border-bottom:solid 1px <?php echo get_option('article_main_a_hover_border','#03a9f4');?>;
}

.article-main h1,.article-main h2,.article-main h3,.article-main h4,.article-main h5,.article-main h6{
    line-height:6vh;
    margin:2vh auto;
    max-width:90%;
    min-height:6vh;
    text-align:center;
}
.article-main h3,.article-main h4,.article-main h5,.article-main h6{
    font-size:2rem;
}
.article-main h1{
    background-color:<?php echo get_option('article_main_h1_background','#f4f4f4');?>;
    border-bottom:1px dashed <?php echo get_option('article_main_h1_border','#ccc');?>;
    border-top:1px dashed <?php echo get_option('article_main_h1_border','#ccc');?>;
    box-shadow:0 7px 10px -5px rgba(0,0,0,.1) inset;
    counter-increment:counter-h1;
    counter-reset:counter-h2;
    padding:.75em;
}
.article-main h2{
    background-color:<?php echo get_option('article_main_h2_background','#03a9f4');?>;
    box-shadow:0 0 3vmin rgba(0,0,0,.2);
    color:<?php echo get_option('article_main_h2_color','#fff');?>;
    counter-increment:counter-h2;
    counter-reset:counter-h3;
}
.article-main h2 > a:visited{
    color:<?php echo get_option('article_main_h2_color','#fff');?>;
}
.article-main h3{
    border:1vmin solid <?php echo get_option('article_main_h3_border','#03a9f4');?>;
    box-shadow:0 0 3vmin rgba(0,0,0,.1);
    color:<?php echo get_option('article_main_h3_color','#03a9f4');?>;
    counter-increment:counter-h3;
    counter-reset:counter-h4;
}
.article-main h3 > a:visited{
    color:<?php echo get_option('article_main_h3_color','#03a9f4');?>;
}
.article-main h4{
    border-bottom:1px solid;
    border-left:.5em solid <?php echo get_option('article_main_h4_border','#03a9f4');?>;
    counter-increment:counter-h4;
    counter-reset:counter-h5;
}
.article-main h5{
    border-left:.5em solid <?php echo get_option('article_main_h5_border','#03a9f4');?>;
    counter-increment:counter-h5;
    counter-reset:counter-h6;
}
.article-main h6{
    border-bottom:.75vmin dashed <?php echo get_option('article_main_h6_border','#03a9f4');?>;
    counter-increment:counter-h6;
}

.article-main pre,.article-main address{
    margin:1vh auto;
    max-width:94%;
}
.article-main pre{
    font-weight:bold;
}
.article-main code{
    overflow-x:auto;
    white-space:pre;
}
.article-main address,.article-main code,.article-main q{
    background-color:#eee;
}
.article-main blockquote,.article-main q{
    padding:1em 2em;
    quotes:none;
}
.article-main blockquote{
    border:1px solid <?php echo get_option('article_main_bq_border','#bbb');?>;
    border-radius:3vmin;
}
.article-main blockquote::after{
    border-top:1px solid <?php echo get_option('article_main_bq_border','#bbb');?>;
    content:attr(title)"\a" attr(cite);
    display:block;
    padding-top:1em;
    text-align:right;
    white-space:pre-wrap;
    word-wrap:break-word;
}
.article-main > div{
    margin:4vh auto;
    max-width:80%;
}
.article-main iframe[src*="youtu.be"],.article-main iframe[src*="youtube.com"],.article-main iframe[src*="www.youtube.com"]{
    height:calc(80vw / 100 * 56.25);
    margin:4vh auto;
    width:80vw;
}
.article-main p iframe[src*="youtu.be"],.article-main p iframe[src*="youtube.com"],.article-main p iframe[src*="www.youtube.com"]{
    height:calc(80vw / 100 * 56.25);
    margin:4vh 0;
    max-height:calc(720px / 100 * 56.25);
    max-width:720px;
    width:80vw;
}

.article-main li::after{
    border-bottom:1px dashed <?php echo get_option('article_main_li_border','#aaa');?>;
    content:"";
    display:block;
    height:0;
    left:0;
    position:relative;
    top:0;
    width:100%;
}
.article-main ul{
    list-style:none;
    margin:2em auto;
    max-width:80%;
}
.article-main ul li::before{
    color:<?php echo get_option('article_main_li_color','#03a9f4');?>;
    content:"●";
    display:inline;
    font-size:.8em;
    padding-right:1em;
}
.article-main ol{
    counter-reset:counter-name;
}
.article-main ol li:before{
    background-color:<?php echo get_option('article_main_ol_background','#03a9f4');?>;
    border-radius:50%;
    color:<?php echo get_option('article_main_ol_color','#fff');?>;
    content:counter(counter-name);
    counter-increment:counter-name;
    display:inline-block;
    height:1.5em;
    left:0;
    line-height:1.5em;
    position:absolute;
    text-align:center;
    width:1.5em;
}
.article-main ol li{
    list-style:none;
    margin:0;
    padding-left:2em;
    padding-top:.1em;
    position:relative;
}

.article-main table{
    border-collapse:collapse;
    box-sizing:border-box;
    margin:2vh auto;
    table-layout:fixed;
    width:calc(100% - 16vmin);
}
.article-main table caption{
    background-color:<?php echo get_option('article_main_table_caption_background','#ffc045');?>;
    padding:1.2em;
    text-align:center;
}
.article-main table tr th{
    background-color:<?php echo get_option('article_main_th_background','#03a9f4');?>;
    color:<?php echo get_option('article_main_th_color','#fff');?>;
}
.article-main table tr th,.article-main table tr td{
    border:1px solid <?php echo get_option('article_main_li_border','#cfcfcf');?>;
    padding:1.2em;
    text-align:center;
}
.article-main table tr:last-child{
    border-left:none;
}
.article-main table:last-child{
    border-bottom:none;
}

.article-main .toc-title{
    max-width:80%;
}
.article-main .toc-title:hover::before{
    content:"";
}
.article-main .cutin-box > h3{
    box-shadow:none;
    color:#fff;
}
.article-main .ogp-blogcard-share > ul > li::before,.article-main .ogp-blogcard-share > ul > li::after{
    display:none;
}
.article-main .ogp-blogcard-main{
    border:0;
    padding:0;
}
.article-main .ogp-blogcard-main::after{
    display:none;
}
.article-main .ogp-blogcard img{
    display:inline-block;
}
.article-main .ogp-blogcard-title{
    box-shadow:none;
}
.article-main .ogp-blogcard-description,.article-main .ogp-blogcard-site-name{
    color:<?php echo $root_color;?>;
}
.article-main .ogp-blogcard-description:visited,.article-main .ogp-blogcard-site-name:visited{
    color:<?php echo $root_color;?>;
}

.article-main img{
    display:block;
    height:auto;
    margin:4vh auto;
    text-align:center;
    width:100%;
}
.wp-caption{
    background-color:#f4f4f4;
    box-shadow:0 0 3vmin rgba(0,0,0,.1);
    height:3em;
    margin:4vh auto;
    max-width:96%;
    padding:1em .5em;
    text-align:center;
}
.wp-caption.alignleft{
    margin-left:0;
}
.wp-caption.alignright{
    margin-right:0;
}
.wp-caption img{
    border:0;
    height:auto;
    margin:0;
    max-width:100%;
    padding:0;
    width:auto;
}
.wp-caption p.wp-caption-text{
    font-size:.9em;
    margin:0;
    padding:1.5em 2em;
}
.alignnone,a img.alignnone{
    margin:2vh 3vw 6vh 0;
}
.alignright,a img.alignright{
    float:right;
    margin:2vh 0 6vh 3vw;
}
.aligncenter,div.aligncenter{
    display:block;
    margin:1vh auto;
}
.alignleft,a img.alignleft{
    float:left;
    margin:2vh 3vw 6vh 0;
}
a img.aligncenter{
    display:block;
    margin-left:auto;
    margin-right:auto;
}

.page-nav{
    text-align:center;
}
.page-nav a{
    color:<?php echo get_option('page_nav_color','#03a9f4');?>;
    margin:0 1em;
}
.page-nav a:hover{
    border-bottom:solid 1px <?php echo get_option('page_nav_hover_border','#03a9f4');?>;
}

.format-chat .article-main p{
    border:1px solid #777;
    border-radius:5vmin;
    display:block;
    font-size:1.8rem;
    height:3em;
    margin-bottom:2em;
    padding:1em;
    vertical-align:middle;
    width:60%;
}
.format-chat .article-main p:nth-of-type(odd){
    background-color:rgba(139,195,74,.6);
    clear:both;
    float:left;
    margin-left:3vmin;
}
.format-chat .article-main p:nth-of-type(even){
    background-color:rgba(230,230,230,.6);
    clear:both;
    float:right;
    margin-right:3vmin;
}

.sticky,.gallery-caption,.bypostauthor{}