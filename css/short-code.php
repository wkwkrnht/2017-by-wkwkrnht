/*
1.ToC
2.marker
3.columun
4.blogcard by OGP
5.area for notice
6.move to search
*/
<?php if(has_shortcode($content,'toc')===true):?>
    .toc{
        box-shadow:0 0 3vmin rgba(0,0,0,.2);
        margin:4vh auto;
        padding:4vh 0;
        width:90%;
    }
    .toc-toggle{
        background-color:#03a9f4;
        border-radius:50%;
        box-shadow:0 0 3vmin rgba(0,0,0,.3);
        color:#fff;
        display:block;
        font-size:1.8rem;
        height:2em;
        left:65vw;
        position:relative;
        text-align:center;
        top:-1em;
        width:2em;
    }
    .toc > ul{
        margin:0;
    }
    .article-main .toc-title{
        max-width:80%;
    }
    .article-main .toc-title:hover::before{
        content:"";
    }
<?php endif;?>


<?php if(has_shortcode($content,'marker')===true):?>
    .marker{
        box-shadow:0 -0.3em 0 -0.1em rgb(255,255,0) inset;
    }
<?php endif;?>


<?php if(has_shortcode($content,'OGPBlogcard')===true):?>
    .ogp-blogcard{
        display:block;
        height:36vh;
        position:relative;
    }
    .ogp-blogcard-share{
        background-color:rgba(0,0,0,.3);
        border-radius:3vmin;
        height:calc(36vh + 2vmin * 2);
        left:0;
        position:absolute;
        top:0;
        width:calc(80vw + 5vmin * 2);
        z-index:2;
    }
    .ogp-blogcard-share-close{
        font-size:3rem;
        position:absolute;
        right:2em;
        top:1em;
    }
    .ogp-blogcard-share > ul{
        list-style:none;
    }
    .ogp-blogcard-share > ul > li{
        border:1px solid #fff;
        display:inline-block;
        font-size:2.2rem;
        margin:2vmin auto;
        padding:1em;
    }
    .ogp-blogcard-share-close,.ogp-blogcard-share-close:visited,.ogp-blogcard-share > ul > li > a,.ogp-blogcard-share > ul > li > a:visited{
        color:#fff;
    }
    .ogp-blogcard-share-toggle{
        background-color:#03a9f4;
        border-radius:50%;
        color:#fff;
        display:block;
        height:3em;
        left:0;
        line-height:3em;
        margin:0;
        position:absolute;
        top:0;
        text-align:center;
        vertical-align:middle;
        width:3em;
    }
    .ogp-blogcard-main{
        background-color:#fff;
        border:1px solid #e5e5e5;
        border-radius:3vmin;
        box-shadow:0 0 3vmin rgba(0,0,0,.15);
        box-sizing:border-box;
        height:36vh;
        overflow-x:hidden;
        overflow-y:auto;
        padding:2vmin 5vmin;
        position:absolute;
        top:0;
        width:80vw;
    }
    .ogp-blogcard-img{
        display:inline-block;
        max-height:36vh;
        max-width:calc(80vw * .2);
    }
    .ogp-blogcard-info{
        display:inline-block;
        max-width:calc(80vw * .7);
        text-align:center;
    }
    .ogp-blogcard-title{
        font-size:2rem;
    }
    <?php if(is_singular()===true):?>
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
        .article-main .ogp-blogcard-description,.article-main .ogp-blogcard-description:visited{
            color:<?php echo $root_color;?>;
        }
    <?php endif;?>
<?php endif;?>


<?php if(has_shortcode($content,'info')===true || has_shortcode($content,'qa')===true):?>
    .information,.question,.attention{
        background-color:#f4f3eb;
        box-sizing:border-box;
        margin:1em auto;
        padding:2em 2em 2em calc(7rem + 2vmin);
        position:relative;
        width:80%;
    }
    .information::before,.question::before,.attention::before{
        background-color:#eae3b4;
        border-radius:50%;
        color:#f4f3eb;
        display:inline-block;
        font-size:5rem;font-weight:700;
        height:7rem;
        left:1vmin;
        line-height:7rem;
        margin-right:7rem;
        position:absolute;
        text-align:center;
        top:1vmin;
        width:7rem;
    }
    .information::before{
        content:"ｉ";
    }
    .question::before{
        content:"？";
    }
    .attention::before{
        content:"！";
    }
<?php endif;?>


<?php if(has_shortcode($content,'simple-box')===true):?>
    .simple-box{
        border:.1vmin solid #333;
        margin:2vh auto;
        width:80%;
    }
    .red.simple-box{
        border-color:#f44336;
    }
    .blue.simple-box{
        border-color:#03a9f4;
    }
    .orange.simple-box{
        border-color:#ff9800;
    }
    .yellow.simple-box{
        border-color:#ffeb3b;
    }
    .green.simple-box{
        border-color:#8bc34a;
    }
<?php endif;?>


<?php if(has_shortcode($content,'box')===true):?>
    .cutin-box{
        color:#fff;
        box-sizing:border-box;
        margin:2vh auto;
        padding:1vh 2vh;
        text-align:center;
        width:calc(80% + (3vh * 2));
    }
    .red.cutin-box{
        background-color:#f44336;
    }
    .blue.cutin-box{
        background-color:#03a9f4;
    }
    .yellow.cutin-box{
        background-color:#ffeb3b;
    }
    .orange.cutin-box{
        background-color:#ff9800;
    }
    .green.cutin-box{
        background-color:#8bc34a;
    }
    .black.cutin-box{
        background-color:#333;
    }
    .cutin-box > h3{
        font-weight:700;
    }
    .cutin-box-inner{
        background-color:#fff;
        border:1vh solid;
        color:#333;
        box-sizing:border-box;
        margin:0;
        padding:1vh 2vh;
        text-align:initial;
        width:calc(80% + (2vh * 2));}
    .red.cutin-box > .cutin-box-inner{
        border-color:#f44336;
    }
    .blue.cutin-box > .cutin-box-inner{
        border-color:#03a9f4;
    }
    .yellow.cutin-box > .cutin-box-inner{
        border-color:#ffeb3b;
    }
    .orange.cutin-box > .cutin-box-inner{
        border-color:#ff9800;
    }
    .green.cutin-box > .cutin-box-inner{
        border-color:#8bc34a;
    }
    .black.cutin-box > .cutin-box-inner{
        border-color:#333;
    }
    .article-main .cutin-box > h3{
        box-shadow:none;
        color:#fff;
    }
<?php endif;?>


<?php if(has_shortcode($content,'button')===true || has_shortcode($content,'link_button')===true):?>
    .button{
        border-radius:1.5vmin;
        box-sizing:border-box;
        color:#fff;
        display:block;
        font-size:2rem;
        font-weight:600;
        line-height:2;
        margin:2vh auto;
        min-height:4rem;
        overflow:hidden;
        padding:2vmin 5vmin;
        position:relative;
        text-align:center;
        text-overflow:ellipsis;
        white-space:nowrap;
        width:80%;
    }
    .button:hover{
        top:.2vmin;
    }
    .red.button{
        background-color:#f44336;
        box-shadow:0 1vmin 0 #d32f2f;
    }
    .red.button:hover{
        box-shadow:0 .75vmin 0 #d32f2f;
    }
    .blue.button{
        background-color:#03a9f4;
        box-shadow:0 1vmin 0 #0288d1;
    }
    .blue.button:hover{
        box-shadow:0 .75vmin 0 #0288d1;
    }
    .yellow.button{
        background-color:#ffeb3b;
        box-shadow:0 1vmin 0 #fbc02d;
    }
    .yellow.button:hover{
        box-shadow:0 .75vmin 0 #fbc02d;
    }
    .orange.button{
        background-color:#ff9800;
        box-shadow:0 1vmin 0 #f57c00;
    }
    .orange.button:hover{
        box-shadow:0 .75vmin 0 #f57c00;
    }
    .green.button{
        background-color:#8bc34a;
        box-shadow:0 1vmin 0 #689f38;
    }
    .green.button:hover{
        box-shadow:0 .75vmin 0 #689f38;
    }
    .black.button{
        background-color:#333;
        box-shadow:0 1vmin 0 #9e9e9e;
        color:#333;
    }
    .black.button:hover{
        box-shadow:0 .75vmin 0 #9e9e9e;
    }
<?php endif;?>


<?php if(has_shortcode($content,'search-box')===true):?>
    .search-form{
        line-height:2;
        margin:4vh auto;
    }
    .search-form div{
        display:inline-block;
        margin-left:1em;
        padding:1em;
    }
    .search-form .sform{
        background-color:#fff;
        border:1px solid #555;
        max-width:70%;
        min-width:16em;
    }
    .search-form .sbtn{
        background-color:#1155ee;
        box-shadow:0 0 3vmin rgba(0,0,0,.2);
        color:#fff;
        padding-left:2rem;
        padding-right:3rem;
        position:absolute;
    }
    .search-form .sbtn::after{
        bottom:0;
        color:#000;
        content:"\f25a";
        font-family:"FontAwesome";
        font-size:2.5rem;
        position:absolute;
    }
<?php endif;?>

<?php if(has_class('ba-slider')===true):?>
    .ba-slider{
        position: relative;
        overflow: hidden;
    }
    .ba-slider img{
        width: 100%;
        display:block;
    }
    .resize{
        position: absolute;
        top:0;
        left:0;
        height:inherit;
        width:50%;
        overflow: hidden;
    }
    .handle{ /* Thin line seperator */
        position:absolute;
        left:50%;
        top:0;
        bottom:0;
        width:4px;
        margin-left:-2px;
        background:rgba(0,0,0,.5);
        cursor: ew-resize;
    }
    .handle::after {  /* Big orange knob  */
        position: absolute;
        top: 50%;
        width: 64px;
        height: 64px;
        margin: -32px 0 0 -32px;
        content:'\21d4';
        color:#fff;
        font-weight:bold;
        font-size:36px;
        text-align:center;
        line-height:64px;
        background: #ffb800; /* @orange */
        border:1px solid #e6a600; /* darken(@orange, 5%) */
        border-radius: 50%;
        transition:all 0.3s ease;
        box-shadow:
          0 2px 6px rgba(0,0,0,.3),
          inset 0 2px 0 rgba(255,255,255,.5),
          inset 0 60px 50px -30px #ffd466; /* lighten(@orange, 20%)*/
    }
    .draggable::after {
        width: 48px;
        height: 48px;
        margin: -24px 0 0 -24px;
        line-height:48px;
        font-size:30px;
    }
<?php endif;?>