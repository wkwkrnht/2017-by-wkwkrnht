/*
    widget custom
1.generall
2.tag cloud
3.recent entries
4.archive
5.search
*/
.widget{
    display:block;
    margin:4vh auto;
    max-width:94%;
}
.widget-title{
    background-color:<?php echo get_option('wkwkrnht_widget_title_background','#03a9f4');?>;
    color:<?php echo get_option('wkwkrnht_widget_title_color','#fff');?>;
    line-height:5vh;
    margin:2vh auto;
    max-width:94%;
    min-height:5vh;
    text-align:center;
}
.widget li{
    max-width:93%;
}
.widget select{
    margin:2vh auto;
    width:70%;
}

<?php if(is_active_widget(false,false,'tag_cloud')):?>
    .widget_tag_cloud{
        padding:0;
        margin:3vmin;
    }
    .widget_tag_cloud a{
        background-color:#fff;
        border:1px solid <?php echo get_option('tag_cloud_border','#03a9f4');?>;
        border-radius:3vmin;
        color:<?php echo get_option('tag_cloud_hover_color','#333');?>;
        display:inline-block;
        font-size:1.6rem;
        height:28px;
        max-width:100px;
        margin:0 .3em .3em 0;
        overflow:hidden;
        padding:0 1em;
        text-decoration:none;
        text-overflow:ellipsis;
        white-space:nowrap;
    }
    .widget_tag_cloud a:hover{
        background-color:<?php echo get_option('tag_cloud_border','#03a9f4');?>;
        border:1px solid <?php echo get_option('tag_cloud_hover_border','#fff');?>;
        color:<?php echo get_option('tag_cloud_hover_color','#fff');?>;
    }
<?php endif;?>

<?php if(is_active_widget(false,false,'recent_entries')):?>
    .widget_recent_entries ul{
        list-style-type:none;
    }
    .widget_recent_entries ul li{
        border-bottom:1px dashed <?php echo get_option('article_main_li_border','#aaa');?>;
    }
    .widget_recent_entries ul li a{
        font-size:1.6rem;
        text-decoration:none;
    }
    .widget_recent_entries ul li span{
        font-size:calc(1.6rem * 0.8);
    }
<?php endif;?>

<?php if(is_active_widget(false,false,'archive')):?>
    .widget_archive ul{
        list-style-type:none;
        text-align:center;
    }
    .widget_archive ul li{
        font-size:calc(1.8rem * 0.8);
    }
    .widget_archive ul li a{
        font-size:1.8rem;
    }
<?php endif;?>

<?php if(is_active_widget(false,false,'search')):?>
    .search-form input[type*="text"]{
        width:98%;
    }
    .search-form select{
        margin:1vh 0;
        margin-right:2%;
        width:35%;
    }
    .search-form input[type*="submit"]{
        background-color:<?php echo get_option('search_background','#fff');?>;
        border:1px solid <?php echo get_option('search_border','#03a9f4');?>;
        border-radius:3vmin;
        color:#03a9f4;
        margin:1vh 0;
        width:20%;
    }
    .search-form input[type*="submit"]:hover{
        background-color:<?php echo get_option('search_hover_background','#03a9f4');?>;
        color:<?php echo get_option('search_hover_color','#fff');?>;
    }
<?php endif;?>

<?php if(is_active_widget(false,false,'author-bio') || is_author()===true):?>
    .bio-wrapper{
        background-color:#fff;
		border-radius:3vmin;
		box-shadow:0 0 3vmin rgba(0,0,0,.2);
		box-sizing:border-box;
        display:block;
		font-size:1.8rem;
		margin:4vh 2vh;
		min-height:40.5vmin;
		padding:2vh 4vh;
        position:relative;
		text-align:center;
        width:80vw;
    }
    .bio-img{
        left:4vmin;
        position:absolute;
        top:2vmin;
        width:calc(80vw / 10 * 3 - 1vmin);
    }
    .bio-info,.follow-button{
        width:calc(80vw / 10 * 7);
    }
    .bio-info{
        position:absolute;
        right:0;
        top:0;
    }
    .bio-name{
        font-size:2.3rem;
        text-align:center;
        vertical-align:middle;
    }
    .bio-description{
        font-size:1.6rem;
    }
    .follow-button{
        bottom:0;
        list-style:none;
        overflow-x:auto;
        overflow-y:hidden;
        position:absolute;
        right:0;
    }
    .follow-button li{
        display:inline-block;
        height:3em;
        padding:.5em;
        text-align:center;
        vertical-align:middle;
        width:3em;
    }
<?php endif;?>

<?php if(is_active_widget(false,false,'wkwkrnht_manth_archive')):?>
    .widget_wkwkrnht_manth_archive > ul{
        list-style:none;
    }
    .widget_wkwkrnht_manth_archive > ul > .list-year{
        margin:1em 0;
    }
    .widget_wkwkrnht_manth_archive > ul > .list-year > h3{
        background-color:<?php echo get_option('manth_archive_year_background','#03a9f4');?>;
        display:inline-block;
        height:100%;
        text-align:center;
        width:calc(30% - 1vmin);
    }
    .widget_wkwkrnht_manth_archive > ul > .list-year > h3 > a{
        color:<?php echo get_option('manth_archive_year_h3_color','#fff');?>;
        font-size:1.8rem;
        text-decoration:none;
    }
    .widget_wkwkrnht_manth_archive > ul > .list-year > .article-list{
        box-sizing:border-box;
        display:inline-block;
        list-style:none;
        padding:.75em 2em;
        width:70%;
    }
    .widget_wkwkrnht_manth_archive > ul > .list-year > .article-list > li{
        display:inline-block;
        font-size:1.6rem;
        height:2em;
        text-align:center;
        width:4.5em;
    }
    .widget_wkwkrnht_manth_archive > ul > .list-year > .article-list > li > a{
        text-decoration:none;
    }
<?php endif;?>

<?php if(is_active_widget(false,false,'move_top')):?>
    .widget_move_top{
        background-color:<?php echo get_option('move_top_background','#03a9f4');?>;
        border-radius:50%;
        height:15vh;
        margin:5vh auto;
        width:15vh;
    }
    .widget_move_top a{
        color:<?php echo get_option('move_top_color','#fff');?>;
        font-size:5rem;
        font-weight:900;
        line-height:15vh;
        text-align:center;
        text-decoration:none;
        vertical-align:middle;
    }
<?php endif;?>

<?php if(is_active_widget(false,false,'related_posts')):?>
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
		color:<?php echo get_option('related_color','#333');?>;
		display:block;
		height:15vw;
		margin:2vw;
		min-width:28vw;
		padding:.5em 1em;
		text-decoration:none;
	}
	.widget_related_posts .related-wrapper:visited{
		color:<?php echo get_option('related_color','#333');?>;
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
	li.widget.widget_related_posts{
		display:flex;
	}
<?php endif;?>

<?php if(is_active_widget(false,false,'related_posts_img')):?>
    .widget_related_posts_img{
        align-content:space-around;
		align-items:baseline;
		display:flex;
		height:calc(30vmax + 2vh * 2);
		justify-content:space-between;
		margin:6vh 0;
		overflow-x:auto;
		overflow-y:hidden;
		-webkit-overflow-scrolling:touch;
		width:100%;
	}
	.widget_related_posts_img .related-wrapper{
		background-color:#fff;
		box-shadow:0 0 2vmin rgba(0,0,0,.2);
		display:block;
		position:relative;
	}
    .widget_related_posts_img .related-wrapper,.widget_related_posts_img .related-img,.widget_related_posts_img .related-title{
        width:30vmax;
    }
	.widget_related_posts_img .related-wrapper,.widget_related_posts_img .related-img{
		height:30vmax;
	}
	.widget_related_posts_img .related-title{
		background-color:rgba(0,0,0,.5);
        bottom:0;
        color:#fff;
		font-size:1.8rem;
		height:calc(30vmax / 10 * 4);
        margin:0;
        position:absolute;
        text-align:center;
		vertical-align:middle;
	}
    .widget_related_posts_img .related-wrapper,.widget_related_posts_img .article-card{
        margin:2vh;
    }
	li.widget.widget_related_posts_img{
		display:flex;
	}
<?php endif;?>

<?php if(is_active_widget(false,false,'post_nav_hover')):?>
    .hide-nav-prev,.hide-nav-next{
        height:100%;
        position:fixed;
        top:0;
        width:10vw;
        z-index:5;
    }
    .hide-nav-prev{
        left:0;
    }
    .hide-nav-next{
        right:0;
    }
    .hide-nav-prev a,.hide-nav-next a{
        background-color:<?php echo get_option('hover_nav_a_background','#03a9f4');?>;
        color:<?php echo get_option('hover_nav_a_color','#fff');?>;
        display:table-cell;
        font-size:4rem;
        height:100vh;
        opacity:.85;
        text-align:center;
        transition:transform 0.2s linear;
        vertical-align:middle;
        width:10vw;
    }
    .hide-nav-prev a{
        transform:translateX(-10vw);
    }
    .hide-nav-next a{
        transform:translateX(10vw);
    }
    .hide-nav-prev:hover a,.hide-nav-next:hover a{
        transform:translate(0);
    }
    .hide-nav-next a:hover,.hide-nav-prev a:hover{
        background-color:<?php echo get_option('hover_nav_a_background','#03a9f4');?>;
        color:<?php echo get_option('hover_nav_a_color','#fff');?>;
    }
<?php endif;?>

<?php if(is_active_widget(false,false,'post_comment')):?>
    .comment{
        background-color:<?php echo get_option('wkwkrnht_comment_background','#fff');?>;
        border-radius:3vmin;
        box-shadow:0 0 3vmin rgba(0,0,0,.2);
        font-size:1.8rem;
        padding:4vmin 3vmin;
        margin:5vmin auto;
        min-height:10vmin;
        width:90%;
    }
    .comment-title{
        background-color:<?php echo get_option('wkwkrnht_comment_title_background','#03a9f4');?>;
        box-shadow:0 0 3vmin rgba(0,0,0,.2);
        color:<?php echo get_option('wkwkrnht_comment_title_color','#fff');?>;
        font-size:2rem;
        height:10%;
        margin:0 auto;
        text-align:center;
        width:80%;
    }
    .comment-list{
        list-style-type:none;
    }
    .comment-list li{
        box-shadow:none;
    }
    .comment-respond{
        margin:0 auto;
        width:80%;
    }
    .comment-form{
        max-width:100%;
    }
    .comment-form-comment textarea,.comment-form-author input,.comment-form-email input,.comment-form-url input{
        max-width:100%;
    }
    .night-mode .comment{
        background-color:#333;
    }
<?php endif;?>

<?php if(is_active_widget(false,false,'duck_duck_go_search_widget')):?>
    .widget_duck_duck_go_search_widget input{
        display:inline-block;
    }
    .widget_duck_duck_go_search_widget input[type*="search"]{
        margin-right:5%;
        width:70%;
    }
    .widget_duck_duck_go_search_widget input[type*="submit"]{
        background-color:#fff;
        border:1px solid #03a9f4;
        border-radius:3vmin;
        color:#03a9f4;
        width:15%;
    }
    .widget_duck_duck_go_search_widget input[type*="submit"]:hover{
        background-color:#03a9f4;
        color:#fff;
    }
<?php endif;?>

<?php if(is_active_widget(false,false,'google_search_ads_widget')):?>
    #cse-search-box input{
        display:inline-block;
    }
    #cse-search-box input[type="text"]{
        margin-right:5%;
        width:70%;
    }
    #cse-search-box input[type="submit"]{
        background-color:#fff;
        border:1px solid #03a9f4;
        border-radius:3vmin;
        color:#03a9f4;
        width:15%;
    }
    #cse-search-box input[type*="submit"]:hover{
        background-color:#03a9f4;
        color:#fff;
    }
<?php endif;?>

<?php if(is_active_widget(false,false,'sns_follow')):?>
    .widget_sns_follow{
        background-color:#333;
        color:#fff;
        height:15vmax;
        position:relative;
    }
    .widget_sns_follow > .wrapper{
        box-sizing:border-box;
        display:inline-block;
        margin:none;
        position:absolute;
        top:0;
        width:49%;
    }
    .widget_sns_follow > .eyecatch{
        height:inherit;
        left:0;
    }
    .widget_sns_follow > .wrapper:not(.eyecatch){
        right:0;
    }
    .widget_sns_follow .title{
        font-size:1.6rem;
        position:absolute;
        top:0;
    }
    .widget_sns_follow .follow-button-area{
        display:flex;
        justify-content:space-evenly;
        list-style-type:none;
        position:absolute;
        top:8.5em;
    }
    .widget_sns_follow .follow-button-area > .follow-button{
        box-sizing:border-box;
        font-size:1.5rem;
        height:3em;
        margin:1em .5em;
        padding:.3em 0 .45em 0;
        text-align:center;
        width:32%;
    }
    .widget_sns_follow .follow-button-area > .twitter{
        background-color:#1b95e0;
    }
    .widget_sns_follow .follow-button-area > .facebook{
        background-color:#0033ff;
    }
    .widget_sns_follow .follow-button-area > .feedly{
        background-color:#2bb24c;
    }
    .widget_sns_follow .follow-button-area > .twitter:hover{
        background-color:#31a3ea;
    }
    .widget_sns_follow .follow-button-area > .feedly:hover{
        background-color:#2ebc50;
    }
    .widget_sns_follow .follow-button-area > .follow-button > a{
        color:#fff;
        text-align:center;
    }
<?php endif;?>

<?php if(is_active_widget(false,false,'sns_share')):?>
    .widget_sns_share > *{
        -webkit-transform:translateZ(0px);
    }
    .widget_sns_share ul{
        list-style:none;
        overflow-x:scroll;
        overflow-y:hidden;
        text-align:center;
        white-space:nowrap;
    }
    .widget_sns_share li{
        display:inline-block;
        height:10vmax;
        vertical-align:middle;
        width:10vmax;
    }
    .widget_sns_share ul li a{
        color:#fff;
        font-size:3rem;
        line-height:10vmax;
        vertical-align:middle;
    }
    .widget_sns_share .tweet{
        background-color:#55acee;
    }
    .widget_sns_share .fb-like{
        background-color:#3b5998;
    }
    .widget_sns_share .buffer{
        background-color:#333;
        font:4rem 900 monospace;
        overflow:hidden;
    }
    .widget_sns_share .line{
        background-color:#6cc655;
    }
    .widget_sns_share .g-plus{
        background-color:#dc4e41;
    }
    .widget_sns_share .linkedin{
        background-color:#36465d;
    }
    .widget_sns_share .reddit{
        background-color:#ff5700;
    }
    .widget_sns_share .vk{
        background-color:#83bad6;
    }
    .widget_sns_share .stumbleupon{
        background-color:#ffcc00;
    }
    .widget_sns_share .hatebu{
        background-color:#00a5de;
        font:4rem 900 monospace;
    }
    .widget_sns_share li.instapaper{
        background-color:#fff;
    }
    .widget_sns_share li.instapaper > a{
        color:#333;
        font:900 4rem serif;
    }
    .widget_sns_share .pinterest{
        background-color:#bd081c;
    }
    .widget_sns_share .pocket{
        background-color:#ef3f56;
    }
    .widget_sns_share .tumblr,.widget_sns_share .toot{
        background-color:#36465d;
    }
    .widget_sns_share .pushdog{
        background-color:#0082e4;
    }
<?php endif;?>