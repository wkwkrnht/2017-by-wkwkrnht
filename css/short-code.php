/*
1.ToC
2.marker
3.columun
4.blogcard by OGP
5.area for notice
6.move to search
*/
<?php $singular = is_singular();?>
<?php if(has_shortcode($content,'toc')===true):?>
    .toc{
        box-shadow:0 0 3vmin rgba(0,0,0,.2);
        margin:4vh auto;
        padding:4vh 0;
        width:90%;
    }
    .toc > ul{
        margin:0;
    }
    <?php if($singular===true):?>
        .article-main .toc-title{
            max-width:80%;
        }
        .article-main .toc-title:hover::before{
            content:"";
        }
    <?php endif;?>
<?php endif;?>


<?php if(has_shortcode($content,'marker')===true):?>
    .marker{
        box-shadow:0 -0.3em 0 -0.1em rgb(255,255,0) inset;
    }
<?php endif;?>


<?php if(has_shortcode($content,'OGPBlogcard')===true):?>
    .ogp-blogcard{
        height:36vh;
        position:relative;
    }
    .ogp-blogcard-share,.ogp-blogcard-main{
        left:0;
        position:absolute;
        top:0;
    }
    .ogp-blogcard-share{
        background-color:rgba(0,0,0,.3);
        height:36vh;
        width:100%;
        z-index:3;
    }
    .ogp-blogcard-share-close{
        font-size:3em;
        position:absolute;
        right:1em;
        top:.5em;
    }
    .ogp-blogcard-share > ul{
        list-style:none;
    }
    .ogp-blogcard-share > ul > li{
        border:1px solid #fff;
        display:inline-block;
        font-size:2.2em;
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
        height:2em;
        left:-1em;
        line-height:2em;
        margin:0;
        position:absolute;
        text-align:center;
        top:-1em;
        vertical-align:middle;
        width:2em;
        z-index:2;
    }
    .ogp-blogcard-main{
        background-color:#fff;
        border:1px solid #ddd;
        box-sizing:border-box;
        height:36vh;
        margin:0;
        overflow:hidden;
        padding:1vmin 4vmin;
        width:100%;
    }
    .ogp-blogcard-img,.ogp-blogcard-info{
        display:inline-block;
    }
    .ogp-blogcard-img{
        margin:auto;
        max-height:36vh;
        max-width:20%;
    }
    .ogp-blogcard-info{
        max-height:100%;
        max-width:70%;
        text-align:center;
    }
    .ogp-blogcard-title{
        font-size:2rem;
    }
    <?php if($singular===true):?>
        .article-main .ogp-blogcard-share > ul > li::before,.article-main .ogp-blogcard-share > ul > li::after{
            display:none;
        }
        .article-main .ogp-blogcard-img{
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
        border:.1vmin solid #000;
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
        background-color:#000;
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
        border-color:#000;
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
        max-width:30%;
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
        overflow:hidden;
        position:relative;
    }
    .ba-slider img{
        display:block;
        width:100%;
    }
    .resize{
        height:inherit;
        left:0;
        overflow: hidden;
        position: absolute;
        top:0;
        width:50%;
    }
    .handle{
        background-color:rgba(0,0,0,.5);
        bottom:0;
        cursor:ew-resize;
        left:50%;
        margin-left:-2px;
        position:absolute;
        top:0;
        width:4px;
    }
    .handle::after{
        background-color:#ffb800;
        border:1px solid #e6a600;
        border-radius: 50%;
        box-shadow:0 2px 6px rgba(0,0,0,.3),inset 0 2px 0 rgba(255,255,255,.5),inset 0 60px 50px -30px #ffd466;
        color:#fff;
        content:'\21d4';
        font-weight:bold;
        font-size:36px;
        height:64px;
        line-height:64px;
        margin: -32px 0 0 -32px;
        position:absolute;
        text-align:center;
        top:50%;
        transition:all 0.3s ease;
        width:64px;
    }
    .draggable::after{
        font-size:30px;
        line-height:48px;
        height:48px;
        margin:-24px 0 0 -24px;
        width:48px;
    }
<?php endif;?>