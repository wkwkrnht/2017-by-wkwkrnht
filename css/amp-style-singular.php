.widget_related_posts{
    align-items:center;
    display:flex;
    flex-wrap:nowrap;
    height:25vw;
    justify-content:space-between;
    margin:5vh 0;
    overflow-x:auto;
    overflow-y:hidden;
    width:100%;
    -webkit-overflow-scrolling:touch;
}
.widget_related_posts > *{
    -webkit-transform:translateZ(0px);
}
.widget_related_posts .related-wrapper{
    background-color:<?php echo get_option('related_background','#fff');?>;
    border-radius:3vmin;
    box-shadow:0 0 2vmin rgba(0,0,0,.3);
    display:block;
    height:15vw;
    margin:2vw;
    min-width:28vw;
    padding:.5em 1em;
    text-decoration:none;
}
.widget_related_posts .related-wrapper,.widget_related_posts .related-wrapper:visited{
    color:<?php echo get_option('related_color','#000');?>;
}
.widget_related_posts .related-title{
    background-color:<?php echo get_option('related_title_background','#03a9f4');?>;
    box-shadow:0 3px 6px rgba(0,0,0,.1);
    color:<?php echo get_option('related_title_color','#fff');?>;
    font-size:2rem;
    text-align:center;
    vertical-align:middle;
}
.widget_related_posts .related-date,.widget_related_posts .related-category{
    font-size:1.6rem;
    text-align:left;
}
.amp-sharebutton > ul{
    list-style:none;
}
.amp-sharebutton > ul > li{
    display:inline-block;
}