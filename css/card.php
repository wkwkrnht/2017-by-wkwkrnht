.card-list{
    align-content:space-around;
    align-items:baseline;
    background-color:<?php echo get_option('card_list_background','#fff');?>;
    display:flex;
    flex-flow:row wrap;
    justify-content:space-evenly;
}

.card,.article-card{
    box-shadow:0 0 3vmin rgba(0,0,0,.2);
    margin:4vh auto;
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
    transition-duration:.3s;
    width:29vmax;
}
.card-img:hover{
    transform:scale(1.1);
	transition-duration:.3s;
}
.card-meta{
    background-color:rgba(0,0,0,.5);
    height:calc(29vmax / 10 * 4);
    width:29vmax;
}
.card-title{
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