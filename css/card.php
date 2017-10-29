.article-list{
    align-content:space-around;
    align-items:baseline;
    background-color:<?php echo get_option('card_list_background','#fff');?>;
    display:flex;
    flex-flow:row wrap;
    justify-content:space-evenly;
}

.card,.article-card{
    box-shadow:0 0 3vmin rgba(0,0,0,.2);
    display:block;
    font-size:1.8rem;
    height:29vmax;
    margin:4vh auto;
    position:relative;
    width:29vmax;
}
.card{
    background-color:#fff;
    min-height:29vmax;
}
.info-card{
    width:calc(29vmax * 2);
}

.card-img,.card-meta,.card-meta > div{
    width:29vmax;
}
.card-img{
    height:29vmax;
}
.card-meta{
    background-color:rgba(0,0,0,.5);
    bottom:0;
    color:#fff;
    height:calc(29vmax / 10 * 4);
    position:absolute;
}
.card-meta > time,.card-title{
    text-align:center;
}
.card-title{
    overflow:hidden;
    text-overflow:ellipsis;
    white-space:nowrap;
}
.card-meta > time{
    display:block;
    width:100%;
}