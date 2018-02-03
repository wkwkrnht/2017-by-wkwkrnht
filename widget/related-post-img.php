<?php
$categories  = get_the_category();
$category_ID = array();
$suffix      = 'crop';
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
		<img <?php wkwkrnht_img_srcs($suffix);?> sizes="30vmax" alt="thumbnail" class="card-img">
		<div class="card-meta">
			<?php the_title('<h3 class="card-title">','</h3>');?>
		</div>
	</a>
<?php endwhile;?>
<?php wp_reset_postdata();?>