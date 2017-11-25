<?php
$base      = get_option('night_mode_base','#000');
$highlight = get_option('night_mode_highlight','#fff');?>
.night-mode .article-main h2.ogp-blogcard-title,
.night-mode .article-main p.ogp-blogcard-description,
.night-mode .article-main a.ogp-blogcard-site-name,
.night-mode .article-main h2.ogp-blogcard-title:visited,
.night-mode .article-main p.ogp-blogcard-description:visited,
.night-mode .article-main a.ogp-blogcard-site-name:visited,
.night-mode ul.page-nation,
.night-mode ul.page-nation a,
.night-mode ul.page-nation li span.dots,
.night-mode ul.page-nation li.current,
.night-mode .page-nav,
.night-mode .page-nav a:hover,
.night-mode .hide-nav-prev a,
.night-mode .hide-nav-next a,
body.night-mode,
.night-mode #main-menu,
.night-mode .card,
.night-mode div.article-list,
.night-mode div#menu-wrap,
.night-mode a#menu-toggle,
.night-mode nav.menu-tab,
.night-mode a#main-menu-toggle,
.night-mode a#share-menu-toggle{
    color:<?php echo $highlight;?>;
}
.night-mode .ogp-blogcard-main,
.night-mode ul.page-nation,
.night-mode ul.page-nation a,
.night-mode ul.page-nation li span.dots,
.night-mode ul.page-nation li.current,
.night-mode .page-nav,
.night-mode .page-nav a:hover{
    border-color:<?php echo $highlight;?>;
}
.night-mode ul.page-nation a:hover{
    background-color:<?php echo $highlight;?>;
}
body.night-mode,
.night-mode .ogp-blogcard-main,
.night-mode ul.page-nation,
.night-mode ul.page-nation a,
.night-mode ul.page-nation li span.dots,
.night-mode ul.page-nation li.current,
.night-mode .page-nav,
.night-mode .page-nav a:hover,
.night-mode .hide-nav-prev a,
.night-mode .hide-nav-next a,
.night-mode .article-header,
.night-mode #main-menu,
.night-mode .card,
.night-mode div.article-list,
.night-mode div#menu-wrap,
.night-mode a#menu-toggle{
    background-color:<?php echo $base;?>;
}
.night-mode ul.page-nation a:hover,
.night-mode .article-main h1,
.night-mode div.information,
.night-mode div.question{
    color:<?php echo $base;?>;
}
.night-mode aside.toc{
    border:0;
    box-shadow:none;
}