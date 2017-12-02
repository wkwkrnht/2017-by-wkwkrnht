<?php
if(post_password_required()===true || have_comments()===false){
    return;
}elseif(is_singular()===true){
    wp_enqueue_script('comment-reply');
}?>
<div class="comment">
    <h3 class="comment-title">コメント</h3>
    <ul class="comment-list">
        <?php wp_list_comments(array('avatar_size'=>96,'style'=>'ul','type'=>'comment',));?>
    </ul>
    <?php if(get_comment_pages_count() > 1):?>
        <ul class="comment-nav">
            <li class="prev"><?php previous_comments_link('&lt;');?></li>
            <li class="next"><?php next_comments_link('&gt;');?></li>
        </ul>
    <?php endif;?>
</div>
<?php comment_form();?>