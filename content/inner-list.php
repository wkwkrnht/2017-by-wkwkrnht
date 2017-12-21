<?php if(is_active_sidebar('listabove')){
    dynamic_sidebar('listabove');
}?>
<div class="article-list">
    <?php
    if(is_active_sidebar('listheader')){
        dynamic_sidebar('listheader');
    }
    if(is_404()===true&&is_active_sidebar('404')){
        dynamic_sidebar('404');
    }
    if(have_posts()):
        while(have_posts()):the_post();
            $title      = the_title_attribute(array('echo'=>false));
            $time       = get_mtime('Y/n/j G:i.s');
            $categories = get_the_category();
            $category   = $categories[0];
            ?>
            <a href="<?php the_permalink();?>" title="<?php echo $title;?>" tabindex="0" class="article-card">
                <img src="<?php wkwkrnht_eyecatch($size_60_crop);?>" srcset="<?php wkwkrnht_eyecatch($size_240_crop);?> 240w,<?php wkwkrnht_eyecatch($size_320_crop);?> 320w,<?php wkwkrnht_eyecatch($size_480_crop);?> 480w,<?php wkwkrnht_eyecatch($size_560_crop);?> 560w,<?php wkwkrnht_eyecatch($size_640_crop);?> 640w,<?php wkwkrnht_eyecatch($size_720_crop);?> 720w,<?php wkwkrnht_eyecatch($size_800_crop);?> 800w,<?php wkwkrnht_eyecatch($size_1024_crop);?> 1024w,<?php wkwkrnht_eyecatch($size_1280_crop);?> 1280w,<?php wkwkrnht_eyecatch($size_1366_crop);?> 1366w,<?php wkwkrnht_eyecatch($size_1600_crop);?> 1600w,<?php wkwkrnht_eyecatch($size_1920_crop);?> 1920w,<?php wkwkrnht_eyecatch($size_2560_crop);?> 2560w" sizes="30vmax" alt="eyecatch" class="card-img">
                <div class="card-meta">
                    <h2 class="card-title">
                        <?php echo $title;?>
                    </h2>
                    <time class="entry-date updated card-time fa fa-calendar" datetime="<?php echo $time;?>">
                        <?php echo $time;?>
                    </time>
                </div>
            </a>
    <?php endwhile;
    endif;
    if(is_active_sidebar('listfooter')){
        dynamic_sidebar('listfooter');
    }?>
</div>
<?php
global $wp_query;
$big = 999999999;
$page_format = paginate_links(array(
    'base'      => str_replace($big,'%#%',esc_url(get_pagenum_link($big))),
    'format'    => '/page/%#%',
    'current'   => max(1,get_query_var('paged')),
    'total'     => $wp_query->max_num_pages,
    'prev_next' => false,
    'type'      => 'array'
));
if(is_array($page_format)===true){
    $echo  = '';
    $paged = (get_query_var('paged') === 0) ? 1 : get_query_var('paged');
    foreach($page_format as $page){
        if($page===$paged){
            $echo .= "<li class='current'>$page</li>";
        }else{
            $echo .= "<li>$page</li>";
        }
    }
    echo'<ul class="page-nation">' . $echo . '</ul>';
}
wp_reset_postdata();
if(is_active_sidebar('listunder')){
    dynamic_sidebar('listunder');
}?>