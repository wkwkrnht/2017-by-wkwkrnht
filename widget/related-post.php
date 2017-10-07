<?php $categories=get_the_category();$category_ID=array();foreach($categories as $category):array_push($category_ID,$category->cat_ID);endforeach;
if(have_posts()):while(have_posts()):the_post();$now = get_the_ID();endwhile;endif;$array=array('numberposts'=>10,'category'=>$category_ID,'orderby'=>'rand','post__not_in'=>array($now),'no_found_rows'=>true,'update_post_term_cache'=>false,'update_post_meta_cache'=>false);
$query = new WP_Query($array);
if($query -> have_posts()):
	while($query -> have_posts()):$query -> the_post();
		$cat = get_the_category();?>
		<a href="<?php the_permalink()?>" title="<?php the_title_attribute();?>" tabindex="0" class="related-wrapper">
			<h3 class="related-title"><?php echo mb_strimwidth(get_the_title(),0,20,'…');?></h3><br>
			<span class="related-date">日付 : <time datetime="<?php get_mtime('Y/n/j G:i.s');?>"><?php the_time('Y/n');?></time></span><br>
			<span class="related-category">カテゴリー : <?php echo $cat[0]->name;?></span>
		</a>
	<?php endwhile;?>
	<?php wp_reset_postdata();?>
<?php else:
	wp_reset_postdata();
	$array=array('numberposts'=>10,'orderby'=>'rand','post__not_in'=>array($now),'no_found_rows'=>true,'update_post_term_cache'=>false,'update_post_meta_cache'=>false);
	$query = new WP_Query($array);
	while($query -> have_posts()):$query -> the_post();?>
		<a href="<?php the_permalink()?>" title="<?php the_title_attribute();?>" tabindex="0" class="related-wrapper">
			<h3 class="related-title"><?php echo mb_strimwidth(get_the_title(),0,20,'…');?></h3><br>
			<span class="related-date">日付 : <time datetime="<?php get_mtime('Y/n/j G:i.s');?>"><?php the_time('Y/n');?></time></span><br>
			<span class="related-category">カテゴリー : <?php echo $cat[0]->name;?></span>
		</a>
	<?php endwhile;?>
	<?php wp_reset_postdata();?>
<?php endif;?>