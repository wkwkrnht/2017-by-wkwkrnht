<?php
$size_full = array(2560,1440);
$size_128  = array(128,128);
$size_256  = array(256,256);
$size_512  = array(512,512);
$size_800  = array(800,800);
$size_1024 = array(1024,1024);
$size_1270 = array(1270,720);
$size_1344 = array(1344,576);
$size_1920 = array(1920,1080);
if(is_amp()===true):
	require_once(get_template_directory() . '/amp/template.php');
else:
    get_header();
    if(is_singular()===true):
		require_once(get_template_directory() . '/content/inner-single.php');
	else:
        if(is_author()===true){
            include_once(get_template_directory() . '/widget/author-bio.php');
        }
		if(is_active_sidebar('listabove')){
			dynamic_sidebar('listabove');
		}
		if(is_404()===true){
				if(is_active_sidebar('404')){
                    dynamic_sidebar('404');
                }
		}else{
			echo'<div class="card-list">';
			if(is_active_sidebar('listheader')){
                dynamic_sidebar('listheader');
            }
            if(have_posts()):while(have_posts()):the_post();
                    $title      = the_title_attribute(array('echo'=>false));
                    $categories = get_the_category();
    				$category   = $categories[0];
                    ?>
                    <a href="<?php the_permalink();?>" title="<?php echo $title;?>" tabindex="0" class="article-card">
                        <img src="<?php wkwkrnht_eyecatch($size_full);?>" srcset="<?php wkwkrnht_eyecatch($size_128);?> 320w,<?php wkwkrnht_eyecatch($size_256);?> 1270w,<?php wkwkrnht_eyecatch($size_512);?> 1920w,<?php wkwkrnht_eyecatch($size_1024);?> 2560w" sizes="30vmax" alt="eyecatch" class="card-img">
                        <div class="card-meta">
                            <h2>
                                <?php echo $title;?>
                            </h2>
                            <div>
                                <span>
                                    <span class="fa fa-calendar" aria-hidden="true"></span>
                                    <time class="entry-date updated" datetime="<?php the_time('Y-m-d');?>">
                                        <?php the_time('Y/n/j');?>
                                    </time>
                                </span>
                                <span>
									<span class="fa fa-bookmark" aria-hidden="true"></span>
                                    <?php echo $category->cat_name;?>
                                </span>
                            </div>
                        </div>
                    </a>
            <?php endwhile;endif;
            if(is_active_sidebar('listfooter')){
                dynamic_sidebar('listfooter');
            }
			echo'</div>';
		}
    	global $wp_query;
    	$big = 999999999;
    	$page_format = paginate_links(array(
    	    'base'      => str_replace($big,'%#%',esc_url(get_pagenum_link($big))),
    	    'format'    => '/page/%#%',
    	    'current'   => max(1,get_query_var('paged')),
    	    'total'     => $wp_query->max_num_pages,
    	    'prev_next' => True,
    	    'prev_text' => '<',
    	    'next_text' => '>',
    	    'type'      => 'array'
    	));
    	if(is_array($page_format)){
    	    $echo  = '';
    	    $paged = (get_query_var('paged')==0) ? 1 : get_query_var('paged');
    	    foreach($page_format as $page){if($page===$paged){$echo .= "<li class='current'>$page</li>";}else{$echo .= "<li>$page</li>";}}
    	    echo'<ul class="page-nation">' . $echo . '</ul>';
    	}
		wp_reset_postdata();
		if(is_active_sidebar('listunder')){
			dynamic_sidebar('listunder');
		}
    endif;
    get_footer();
endif;?>