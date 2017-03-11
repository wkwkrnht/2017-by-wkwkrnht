<style>
	.widget_related_posts_img{
		align-items:center;
		display:flex;
		flex-wrap:nowrap;
		height:calc(30vmax + 2vh * 2);
		justify-content:space-around;
		margin:6vh 0;
		overflow-x:auto;
		overflow-y:hidden;
		-webkit-overflow-scrolling:touch;
		width:100%;
	}
	.widget_related_posts_img > *{
		-webkit-transform:translateZ(0px);
	}
	.widget_related_posts_img .related-wrapper{
		background-color:#fff;
		border-radius:3vmin;
		box-shadow:0 0 2vmin rgba(0,0,0,.3);
		color:#fff;
		display:block;
		height:30vmax;
		margin:2vh 4vh;
		position:relative;
		text-align:center;
		text-decoration:none;
		width:30vmax;
	}
	.widget_related_posts_img .related-wrapper:visited{
		color:#fff;
	}
	.widget_related_posts_img .related-thumb{
		color:#333;
		height:30vmax;
		width:30vmax;
	}
	.widget_related_posts_img .related-title{
		background-color:rgba(0,0,0,.4);
		bottom:0;
		font-size:1.8rem;
		height:calc(30vmax / 10 * 4);
		position:absolute;
		vertical-align:middle;
		width:30vmax;
	}
	li.widget.widget_related_posts_img{
		display:flex;
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
foreach($categories as $category){
	array_push($category_ID,$category->cat_ID);
}
if(have_posts()):while(have_posts()):the_post();$now = get_the_ID();endwhile;endif;
$array = array('numberposts'=>10,'category'=>$category_ID,'orderby'=>'rand','post__not_in'=>array($now),'no_found_rows'=>true,'update_post_term_cache'=>false,'update_post_meta_cache'=>false);
$query = new WP_Query($array);?>
<?php if($query->have_posts()):
	while($query->have_posts()):$query->the_post();?>
		<a href="<?php the_permalink()?>" title="<?php the_title_attribute();?>" tabindex="0" class="related-wrapper">
			<img src="<?php wkwkrnht_eyecatch($size_full);?>" sizes="30vw" srcset="<?php wkwkrnht_eyecatch($size_128);?> 320w,<?php wkwkrnht_eyecatch($size_256);?> 1270w,<?php wkwkrnht_eyecatch($size_512);?> 1920w,<?php wkwkrnht_eyecatch($size_1024);?> 2560w" alt="thumbnail" class="related-thumb">
			<?php the_title('<div class="related-title">','</div>');?>
		</a>
	<?php endwhile;?>
	<?php wp_reset_postdata();?>
<?php else:?>
	<?php
	wp_reset_postdata();
	$array = array('numberposts'=>10,'orderby'=>'rand','post__not_in'=>array($now),'no_found_rows'=>true,'update_post_term_cache'=>false,'update_post_meta_cache'=>false);
	$query = new WP_Query($array);
	while($query->have_posts()):$query->the_post();?>
		<a href="<?php the_permalink()?>" title="<?php the_title_attribute();?>" tabindex="0" class="related-wrapper">
			<img src="<?php wkwkrnht_eyecatch($size_full);?>" sizes="30vw" srcset="<?php wkwkrnht_eyecatch($size_128);?> 320w,<?php wkwkrnht_eyecatch($size_256);?> 1270w,<?php wkwkrnht_eyecatch($size_512);?> 1920w,<?php wkwkrnht_eyecatch($size_1024);?> 2560w" alt="thumbnail" class="related-thumb">
			<?php the_title('<div class="related-title">','</div>');?>
		</a>
	<?php endwhile;?>
	<?php wp_reset_postdata();?>
<?php endif;?>