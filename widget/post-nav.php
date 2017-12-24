<?php
$prev      = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false,'',true);
$next      = get_adjacent_post(false,'',false);
$prev_id   = $prev->ID;
$next_id   = $next->ID;
$prev_url  = get_permalink($prev_id);
$next_url  = get_permalink($next_id);
$prev_attr = the_title_attribute(array('post'=>$prev_id,'echo'=>false));
$next_attr = the_title_attribute(array('post'=>$next_id,'echo'=>false));?>
<a href="<?php echo $prev_url;?>" tabindex="0" title="<?php echo $prev_attr;?>へのリンク" class="prev">
    ←  <?php echo $prev_attr;?>
</a>
<a href="<?php echo $next_url;?>" tabindex="0" title="<?php echo $next_attr;?>へのリンク" class="next">
    <?php echo $next_attr;?>  →
</a>