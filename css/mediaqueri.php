@media screen and (max-width:720px;) {
    .card(
        width:90%;
    )
    .toc,.article-main .toc-title{
        width:94%;
    }
    .hatenablogcard{
        margin:5vh auto;
        max-width:70vw;
    }
    .ogp-blogcard-share-toggle{
        height:2em;
        line-height:2em;
        width:2em;
    }
    .ogp-blogcard-title{
        font-size:1.6rem;
    }
    .ogp-blogcard-description{
        display:none;
    }
    .information,.question{
        width:96%;
    }
    <?php if(is_singular()===true):?>
        .article-meta > div{
            display:none;
        }
        .article-main{
            font-size:1.4rem;
        }
        .article-main h3,.article-main h4,.article-main h5,.article-main h6{
            font-size:2.2rem;
        }
    <?php endif;?>
}
@media print{
    :root{
        font-size:10pt;
    }
    #menu-toggle,#menu-wrap{
        display:none;
    }
}