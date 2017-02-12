.card-list{
    -webkit-align-content:space-around;
    align-content:space-around;
    align-items:baseline;
    background-color:<?php echo get_option('card_list_background','#fff');?>;
    display:-webkit-flex;
    display:flex;
    -webkit-flex-flow:row wrap;
    flex-flow:row wrap;
    justify-content:space-around;
}

.card,.article-card{
    box-shadow:0 0 3vmin rgba(0,0,0,.2);
    margin:6vh auto;
    overflow:hidden;
    position:relative;
    width:29vmax;
}
.card{
    background-color:#fff;
    font-size:1.8rem;
    min-height:29vmax;
}
.info-card{
    width:calc(29vmax * 3);
}
.article-card{
    display:block;
    height:29vmax;
}
.article-card,.article-card:visited{
    color:#fff;
}

.card-img,.card-meta{
    bottom:0;
    position:absolute;
}
.card-img{
    height:29vmax;
    width:29vmax;
}
.card-meta{
    background-color:rgba(0,0,0,.5);
    height:calc(29vmax / 10 * 4);
    width:30vmax;
}
.card-meta > h2{
    overflow:hidden;
    text-align:center;
    text-overflow:ellipsis;
    white-space:nowrap;
}
.card-meta > div{
    font-size:1.8rem;
    width:29vmax;
}
.card-meta > div > span{
    box-sizing:border-box;
    display:inline-block;
    padding:0 1em;
    width:calc(29vmax / 2 - 1vmin);
}


.site-header{
    <?php
    if(get_header_image()){
        echo'background-image:url(' . get_header_image() . ');';
    }else{
        echo'background-color:' . get_option('site_header_background','#03a9f4') . ';';
    }?>
    box-shadow:0 0 3vmin rgba(0,0,0,.1);
    height:10%;
    margin:0 0 5vh 0;
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