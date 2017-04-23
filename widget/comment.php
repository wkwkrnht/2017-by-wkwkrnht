<?php if(post_password_required()===true){return;}elseif(is_singular()===true){wp_enqueue_script('comment-reply');}?>
<style>
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
</style>
<div class="comment">
    <?php if(have_comments()):?>
        <h3 class="comment-title">コメント</h3>
        <ul class="comment-list">
            <?php wp_list_comments(array('avatar_size'=>96,'style'=>'ul','type'=>'comment',));?>
        </ul>
        <?php if(get_comment_pages_count() > 1):?>
            <ul class="comment-nav">
                <li class="prev"><?php previous_comments_link('&lt;');?></li>
                <li class="next"><?php next_comments_link('&gt;');?></li>
            </ul>
        <?php endif;
    endif;?>
    <?php comment_form();?>
</div>