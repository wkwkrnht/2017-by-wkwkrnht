<?php
$made_time = get_mtime('Y/n/j G:i.s');
$size      = 'full';
if(have_posts()){
    while(have_posts()){
        the_post();
        $author_name = get_the_author_meta('display_name');
        $author_id   = get_the_author_meta('ID');
        $now_ID      = get_the_ID();
        $content     = apply_filters('the_content',get_the_content());
        $content     = str_replace(']]>',']]&gt;',$content);
        $content     = sanitize_for_amp($content);
        $page_nation = wp_link_pages(array('before'=>'<div class="page-nation">','after'=>'</div>','separator'=>'','nextpagelink'=>'<','previouspagelink'=>'>'));
    }
}else{
    $author_name = 'unknown';
    $author_id   = '0';
    $now_ID      = false;
    $content     = 'This is unknown request. Wolud you check your request again?';
    $page_nation =  '';
}?>
<article <?php post_class('article-wrapper');?>>
    <header class="article-header">
        <div class="article-eyecatch">
            <amp-img <?php wkwkrnht_img_srcs($size);?> sizes="90vw" layout="fill" alt="eyecatch"></amp-img>
        </div>
        <div class="article-meta">
            <h1 class="article-title entry-title">
                <?php the_title();?>
            </h1>
            <div>
                <time class="article-date fa fa-calendar" datetime="<?php echo $made_time;?>">
                    <?php echo $made_time;?>
                </time>
                <a href="<?php echo site_url() . '?author=' . $author_id;?>" title="<?php echo $author_name;?>" class="article-author fa fa-user" tabindex="0">
                    <?php echo $author_name;?>
                </a>
            </div>
            <div class="widget_tag_cloud">
                <?php the_tags('','','');?>
            </div>
        </div>
    </header>
    <main class="article-main">
        <?php
        echo $content;
        echo $page_nation;?>
    </main>
    <footer itemscope itemtype="http://schema.org/WPFooter">
        <aside class="amp-sharebutton">
            <h2>share : </h2>
            <ul>
                <?php if(is_ssl()===true):?>
                    <li>
                        <amp-social-share type="system"></amp-social-share>
                    </li>
                <?php endif;?>
                <li>
                    <amp-social-share type="twitter"></amp-social-share>
                </li>
                <li>
                    <amp-social-share type="facebook"></amp-social-share>
                </li>
                <li>
                    <amp-social-share type="gplus"></amp-social-share>
                </li>
                <li>
                    <amp-social-share type="linkedin"></amp-social-share>
                </li>
                <li>
                    <amp-social-share type="pinterest"></amp-social-share>
                </li>
                <li>
                    <amp-social-share type="tumblr"></amp-social-share>
                </li>
                <li>
                    <amp-social-share type="whatsapp"></amp-social-share>
                </li>
                <li>
                    <amp-social-share type="sms"></amp-social-share>
                </li>
                <li>
                    <amp-social-share type="email"></amp-social-share>
                </li>
            </ul>
        </aside>
        <aside class="widget_related_posts">
            <?php
            $category_ID = array();
            $categories  = get_the_category();
            foreach($categories as $category){
                $category_ID[] = $category->cat_ID;
            }
            $array = array('numberposts'=>10,'category'=>$category_ID,'orderby'=>'rand','post__not_in'=>array($now_ID),'no_found_rows'=>true,'update_post_term_cache'=>false,'update_post_meta_cache'=>false);
            $query = new WP_Query($array);
            if($query->have_posts()):
                while($query -> have_posts()):$query -> the_post();
                    $cat = get_the_category();?>
                    <a href="<?php the_permalink()?>" title="<?php the_title_attribute();?>" tabindex="0" class="related-wrapper">
                        <h3 class="related-title"><?php echo mb_strimwidth(get_the_title(),0,20,'…');?></h3><br>
                        <span class="related-date">投稿日時 : <time datetime="<?php get_mtime('Y/n/j G:i.s');?>"><?php the_time('Y/n');?></time></span><br>
                        <span class="related-category">カテゴリー : <?php echo $cat[0]->name;?></span>
                    </a>
                <?php endwhile;?>
                <?php wp_reset_postdata();?>
            <?php else:
                wp_reset_postdata();
                $array=array('numberposts'=>10,'orderby'=>'rand','post__not_in'=>array($now_ID),'no_found_rows'=>true,'update_post_term_cache'=>false,'update_post_meta_cache'=>false);
                $query = new WP_Query($array);
                while($query -> have_posts()):$query -> the_post();?>
                    <a href="<?php the_permalink()?>" title="<?php the_title_attribute();?>" tabindex="0" class="related-wrapper">
                        <h3 class="related-title"><?php echo mb_strimwidth(get_the_title(),0,20,'…');?></h3><br>
                        <span class="related-date">投稿日時 : <time datetime="<?php get_mtime('Y/n/j G:i.s');?>"><?php the_time('Y/n');?></time></span><br>
                        <span class="related-category">カテゴリー : <?php echo $cat[0]->name;?></span>
                    </a>
                <?php endwhile;?>
                <?php wp_reset_postdata();?>
            <?php endif;?>
        </aside>
        <aside class="amp-copyright">
            <span itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Organization">
                <span itemprop="name">
                    <?php echo $blog_name;?>
                </span>
            </span>
            &nbsp;&nbsp;&copy;
            <span itemprop="copyrightYear">
                <?php echo get_first_post_year();?>
            </span>
        </aside>
    </footer>
</article>