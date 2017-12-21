@media screen and (max-width:720px;) {
    .card(
        width:90%;
    )
    .toc,.article-main .toc-title{
        width:94%;
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
        .article-wrapper{
            font-size:1.4rem;
        }
    <?php endif;?>
}
@media print{
    :root{
        font-size:10pt;
    }
}