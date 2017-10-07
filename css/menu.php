.site-header{
    <?php
    if(get_header_image()){
        echo'background-image:url(' . get_header_image() . ');';
    }else{
        echo'background-color:' . get_option('site_header_background','#03a9f4') . ';';
    }?>
    box-shadow:0 0 3vmin rgba(0,0,0,.1);
    height:10%;
    padding:3vh 0 5vh;
    text-align:center;
    width:100%;
}
.site-header,.site-header a{
    color:<?php echo get_option('site_header_color','#fff');?>;
}
.site-title{
    font-size:2.5rem;
}
.site-description,.site-header .copyright{
    font-size:1.8rem;
}
span[itemprop*="copyrightHolder"] span[itemprop*="name"]{
    font-weight:bold;
}

.header-nav ul{
    background-color:<?php color_change_brightness(get_option('site_header_background','#03a9f4'),get_option('site_nav_background_brightness','-40'));?>;
    box-sizing:border-box;
    font-size:1.6rem;
    height:5%;
    margin:0 0 5vh 0;
    overflow-x:auto;
    overflow-y:hidden;
    white-space:nowrap;
    width:100%;
    word-break:break-all;
}
.header-nav ul,.header-nav  a{
    color:<?php echo get_option('site_header_color','#fff');?>;
}
.header-nav li{
    box-sizing:border-box;
    display:inline-block;
    padding:.3em .6em;
}

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