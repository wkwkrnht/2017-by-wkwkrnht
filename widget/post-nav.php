<?php
$prev      = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false,'',true);
if(is_attachment()===true&&'attachment'===$prev->post_type){
    return;
}
$next      = get_adjacent_post(false,'',false);
$prev_id   = $prev->ID;
$next_id   = $next->ID;
$prev_url  = get_permalink($prev_id);
$next_url  = get_permalink($next_id);
$prev_attr = the_title_attribute(array('post'=>$prev_id,'echo'=>false));
$next_attr = the_title_attribute(array('post'=>$next_id,'echo'=>false));?>
<a href="<?php echo $prev_url;?>" tabindex="0" title="previous" class="prev">
    ←  <?php echo $prev_attr;?>
</a>
<a href="<?php echo $next_url;?>" tabindex="0" title="next" class="next">
    <?php echo $next_attr;?>  →
</a>
<script type="application/ld+json">
    {
        "@context" : "http://schema.org",
        "@type" : "SiteNavigationElement",
        "url" : "<?php echo $prev_url;?>",
        "name" : "<?php echo $prev_attr;?>",
        "url" : "<?php echo $next_url;?>",
        "name" : "<?php echo $next_attr;?>"
    }
</script>