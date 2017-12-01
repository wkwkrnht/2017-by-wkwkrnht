<?php
$size_160_crop  = array(160,160);
$size_240_crop  = array(240,240);
$size_320_crop  = array(320,320);
$size_480_crop  = array(480,480);
$size_560_crop  = array(560,560);
$size_640_crop  = array(640,640);
$size_720_crop  = array(720,720);
$size_800_crop  = array(800,800);
$size_1024_crop = array(1024,1024);
$size_1280_crop = array(1280,1280);
$size_1366_crop = array(1366,1366);
$size_1600_crop = array(1600,1600);
$size_1920_crop = array(1920,1920);
$size_2560_crop = array(2560,2560);
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
		<img src="<?php wkwkrnht_eyecatch($size_60_crop);?>" srcset="<?php wkwkrnht_eyecatch($size_240_crop);?> 240w,<?php wkwkrnht_eyecatch($size_320_crop);?> 320w,<?php wkwkrnht_eyecatch($size_480_crop);?> 480w,<?php wkwkrnht_eyecatch($size_560_crop);?> 560w,<?php wkwkrnht_eyecatch($size_640_crop);?> 640w,<?php wkwkrnht_eyecatch($size_720_crop);?> 720w,<?php wkwkrnht_eyecatch($size_800_crop);?> 800w,<?php wkwkrnht_eyecatch($size_1024_crop);?> 1024w,<?php wkwkrnht_eyecatch($size_1280_crop);?> 1280w,<?php wkwkrnht_eyecatch($size_1366_crop);?> 1366w,<?php wkwkrnht_eyecatch($size_1600_crop);?> 1600w,<?php wkwkrnht_eyecatch($size_1920_crop);?> 1920w,<?php wkwkrnht_eyecatch($size_2560_crop);?> 2560w" sizes="30vmax" alt="thumbnail" class="card-img">
		<div class="card-meta">
			<?php the_title('<h3 class="card-title">','</h3>');?>
		</div>
	</a>
<?php endwhile;?>
<?php wp_reset_postdata();?>