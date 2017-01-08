<style>
	.widget_related_posts_img{
		height:calc(30vmax + 4vh * 2);
		margin:6vh auto;
		overflow-x:auto;
		overflow-y:hidden;
		width:100%;
	}
	.widget_related_posts_img > *{
		-webkit-transform:translateZ(0px);
	}
	.widget_related_posts_img > .article-card{
        box-shadow:0 0 3vmin rgba(0,0,0,.2);
        display:inline-block;
        height:30vmax;
		letter-spacing:4vh;
        position:relative;
		white-space:nowrap;
        width:30vmax;
    }
	.widget_related_posts_img > .article-card > *{
		letter-spacing:initial;
	}
    .widget_related_posts_img > .article-card,.widget_related_posts_img > .article-card:visited{
        color:#fff;
    }
    .widget_related_posts_img .card-img,.widget_related_posts_img .card-meta{
        bottom:0;
        position:absolute;
    }
    .widget_related_posts_img .card-img{
        height:100%;
        width:100%;
    }
    .widget_related_posts_img .card-meta{
        background-color:rgba(0,0,0,.5);
        height:35%;
        width:100%;
    }
    .widget_related_posts_img .card-meta > h2{
        overflow:hidden;
        text-align:center;
        text-overflow:ellipsis;
        white-space:nowrap;
    }
    .widget_related_posts_img .card-meta > div{
        font-size:1.8rem;
        width:100%;
    }
    .widget_related_posts_img .card-meta > div > span{
        box-sizing:border-box;
        display:inline-block;
        padding:0 1em;
        width:49%;
    }
</style>
<?php
$size_full   = array(1344,576);
$size_128    = array(128,128);
$size_256    = array(256,256);
$size_512    = array(512,512);
$size_1024   = array(1024,1024);
$categories  = get_the_category();
$category_ID = array();
foreach($categories as $category):array_push($category_ID,$category->cat_ID);endforeach;
if(have_posts()):while(have_posts()):the_post();$now = get_the_ID();endwhile;endif;
$array = array('numberposts'=>6,'category'=>$category_ID,'orderby'=>'rand','post__not_in'=>array($now),'no_found_rows'=>true,'update_post_term_cache'=>false,'update_post_meta_cache'=>false);
$query = new WP_Query($array);?>
<?php if($query -> have_posts()):
	while($query -> have_posts()):$query -> the_post();
		$title      = the_title_attribute(array('echo'=>false));?>
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
				</div>
			</div>
		</a>
	<?php endwhile;?>
	<?php wp_reset_postdata();?>
<?php else:?>
	<?php
	wp_reset_postdata();
	$array=array('numberposts'=>6,'orderby'=>'rand','post__not_in'=>array($now),'no_found_rows'=>true,'update_post_term_cache'=>false,'update_post_meta_cache'=>false);
	$query = new WP_Query($array);
	while($query -> have_posts()):$query -> the_post();
		$title      = the_title_attribute(array('echo'=>false));
		$categories = get_the_category();
		$category   = $categories[0];?>
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
	<?php endwhile;?>
	<?php wp_reset_postdata();?>
<?php endif;?>
