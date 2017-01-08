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
$myAmp     = false;
$string    = $post->post_content;
$nowurl    = $_SERVER["REQUEST_URI"];
if(strpos($nowurl,'amp')!==false && strpos($string,'<script>')===false && is_singular()===true){$myAmp = true;}
if($myAmp===true):
	require_once('amp.php');
else:
    get_header();
    if(is_singular()===true):
		if(have_posts()){while(have_posts()):the_post();
			$author_name = get_the_author_meta('display_name');
			$author_id   = get_the_author_meta('ID');
		endwhile;
		}else{
			$author_name = 'unknown';
			$author_id   = '0';
		}?>
        <article id="post-<?php the_ID();?>" <?php post_class();?>>
            <header class="article-header">
                <img src="<?php wkwkrnht_eyecatch($size_full);?>" srcset="<?php wkwkrnht_eyecatch($size_256);?> 256w,<?php wkwkrnht_eyecatch($size_512);?> 512w,<?php wkwkrnht_eyecatch($size_800);?> 800w,<?php wkwkrnht_eyecatch($size_1024);?> 1024w,<?php wkwkrnht_eyecatch($size_1270);?> 1270w,<?php wkwkrnht_eyecatch($size_1344);?> 1344w,<?php wkwkrnht_eyecatch($size_1920);?> 1920w" sizes="30vw" alt="eyecatch" class="article-eyecatch">
                <div class="article-meta">
                    <h1 class="article-title">
						<?php the_title();?>
					</h1>
                    <div>
                        <span class="article-date">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <time class="updated" datetime="<?php get_mtime('Y/m/d');?>" content="<?php the_time('Y/n/j G:i.s');?>">
                                <?php the_time('Y/n/j');?>
                            </time>
                        </span>
                        <span class="author article-author">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <a href="<?php echo site_url() . '?author=' . $author_id;?>" title="<?php echo $author_name;?>" tabindex="0">
        						<span class="vcard author">
        							<span class="fn">
        								<?php echo $author_name;?>
        							</span>
        						</span>
        					</a>
        				</span>
                    </div>
                    <div class="widget_tag_cloud">
                        <?php the_tags('','','');?>
                    </div>
                </div>
            </header>
            <?php if(is_active_sidebar('singularheader')):?>
    			<ul class="widget-area">
    				<?php dynamic_sidebar('singularheader');?>
    			</ul>
    		<?php endif;?>
    		<div class="article-main" role="main">
    			<?php
    			if(have_posts()):while(have_posts()):the_post();the_content();endwhile;endif;
    			wp_link_pages(array('before'=>'<div class="page-nav"><span>ページ：</span>','after'=>'</div>','separator'=>'','nextpagelink'=>'<','previouspagelink'=>'>'));?>
    		</div>
    		<footer class="article-footer" itemscope itemtype="http://schema.org/WPFooter">
    			<?php if(is_active_sidebar('singularfooter')):?>
    				<ul class="widget-area">
    					<?php dynamic_sidebar('singularfooter');?>
    				</ul>
    			<?php endif;?>
    		</footer>
        </article>
    <?php else:
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
			if(is_active_sidebar('listheader')){
                dynamic_sidebar('listheader');
            }
			echo'<div class="card-list">';
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
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <time class="entry-date updated" datetime="<?php the_time('Y-m-d');?>">
                                        <?php the_time('Y/n/j');?>
                                    </time>
                                </span>
                                <span>
                                    <?php echo $category->cat_name;?>
                                </span>
                            </div>
                        </div>
                    </a>
            <?php endwhile;endif;
            if(is_active_sidebar('listfooter')){
                dynamic_sidebar('listfooter');
            }
			echo'</div>';'
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
    	wp_reset_query();
    	if(is_active_sidebar('listunder')){
			dynamic_sidebar('listunder');
		}
    endif;
    get_footer();
endif;?>