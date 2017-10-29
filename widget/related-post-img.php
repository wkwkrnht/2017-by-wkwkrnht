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
			<img src="<?php wkwkrnht_eyecatch($size_full);?>" sizes="30vw" srcset="<?php wkwkrnht_eyecatch($size_128);?> 320w,<?php wkwkrnht_eyecatch($size_256);?> 1270w,<?php wkwkrnht_eyecatch($size_512);?> 1920w,<?php wkwkrnht_eyecatch($size_1024);?> 2560w" alt="thumbnail" class="related-img">
			<!--<div class="card-meta">-->
				<?php the_title('<h3 class="related-title">','</h3>');?>
			<!--</div>-->
		</a>
	<?php endwhile;?>
	<?php wp_reset_postdata();?>
<?php else:?>
	<?php
	wp_reset_postdata();
	$array = array('numberposts'=>10,'orderby'=>'rand','post__not_in'=>array($now),'no_found_rows'=>true,'update_post_term_cache'=>false,'update_post_meta_cache'=>false);
	$query = new WP_Query($array);
	while($query->have_posts()):$query->the_post();?>
		<a href="<?php the_permalink()?>" title="<?php the_title_attribute();?>" tabindex="0" class="related-card">
			<img src="<?php wkwkrnht_eyecatch($size_full);?>" sizes="30vw" srcset="<?php wkwkrnht_eyecatch($size_128);?> 320w,<?php wkwkrnht_eyecatch($size_256);?> 1270w,<?php wkwkrnht_eyecatch($size_512);?> 1920w,<?php wkwkrnht_eyecatch($size_1024);?> 2560w" alt="thumbnail" class="related-img">
			<!--<div class="card-meta">-->
				<?php the_title('<h3 class="related-title">','</h3>');?>
			<!--</div>-->
		</a>
	<?php endwhile;?>
	<?php wp_reset_postdata();?>
<?php endif;?>