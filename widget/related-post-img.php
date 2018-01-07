<?php
$size_160_crop  = 'wkwkrnht-thumb-160-crop';
$size_240_crop  = 'wkwkrnht-thumb-240-crop';
$size_320_crop  = 'wkwkrnht-thumb-320-crop';
$size_480_crop  = 'wkwkrnht-thumb-480-crop';
$size_560_crop  = 'wkwkrnht-thumb-560-crop';
$size_640_crop  = 'wkwkrnht-thumb-640-crop';
$size_720_crop  = 'wkwkrnht-thumb-720-crop';
$size_800_crop  = 'wkwkrnht-thumb-800-crop';
$size_1024_crop = 'wkwkrnht-thumb-1024-crop';
$size_1280_crop = 'wkwkrnht-thumb-1280-crop';
$size_1366_crop = 'wkwkrnht-thumb-1366-crop';
$size_1600_crop = 'wkwkrnht-thumb-1600-crop';
$size_1920_crop = 'wkwkrnht-thumb-1920-crop';
$size_2560_crop = 'wkwkrnht-thumb-2560-crop';
$categories  = get_the_category();
$category_ID = array();
foreach($categories as $category){
	array_push($category_ID,$category->cat_ID);
}
if(have_posts()===true){
	while(have_posts()):
		the_post();
		$now = get_the_ID();
	endwhile;
}
$array = array('numberposts'=>10,'category'=>$category_ID,'orderby'=>'rand','post__not_in'=>array($now),'no_found_rows'=>true,'update_post_term_cache'=>false,'update_post_meta_cache'=>false);
$query = new WP_Query($array);
if($query->have_posts()===false){
	wp_reset_postdata();
	$array = array('numberposts'=>10,'orderby'=>'rand','post__not_in'=>array($now),'no_found_rows'=>true,'update_post_term_cache'=>false,'update_post_meta_cache'=>false);
	$query = new WP_Query($array);
}
while($query->have_posts()):$query->the_post();?>
	<a href="<?php the_permalink()?>" title="<?php the_title_attribute();?>" tabindex="0" class="article-card">
		<img src="<?php wkwkrnht_eyecatch($size_160_crop);?>" srcset="<?php wkwkrnht_eyecatch($size_240_crop);?> 240w,<?php wkwkrnht_eyecatch($size_320_crop);?> 320w,<?php wkwkrnht_eyecatch($size_480_crop);?> 480w,<?php wkwkrnht_eyecatch($size_560_crop);?> 560w,<?php wkwkrnht_eyecatch($size_640_crop);?> 640w,<?php wkwkrnht_eyecatch($size_720_crop);?> 720w,<?php wkwkrnht_eyecatch($size_800_crop);?> 800w,<?php wkwkrnht_eyecatch($size_1024_crop);?> 1024w,<?php wkwkrnht_eyecatch($size_1280_crop);?> 1280w,<?php wkwkrnht_eyecatch($size_1366_crop);?> 1366w,<?php wkwkrnht_eyecatch($size_1600_crop);?> 1600w,<?php wkwkrnht_eyecatch($size_1920_crop);?> 1920w,<?php wkwkrnht_eyecatch($size_2560_crop);?> 2560w" sizes="30vmax" alt="thumbnail" class="card-img">
		<div class="card-meta">
			<?php the_title('<h3 class="card-title">','</h3>');?>
		</div>
	</a>
<?php endwhile;?>
<?php wp_reset_postdata();?>