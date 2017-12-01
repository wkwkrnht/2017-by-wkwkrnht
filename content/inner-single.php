<?php
if(have_posts()){
    while(have_posts()){
        the_post();
        $author_name = get_the_author_meta('display_name');
        $author_id   = get_the_author_meta('ID');
    }
}else{
    $author_name = 'unknown';
    $author_id   = '0';
}?>
<article id="post-<?php the_ID();?>" <?php post_class();?>>
    <header class="article-header">
        <img src="<?php wkwkrnht_eyecatch($size_160);?>" srcset="<?php wkwkrnht_eyecatch($size_2560);?> 2560w,<?php wkwkrnht_eyecatch($size_1920);?> 1920w,<?php wkwkrnht_eyecatch($size_1600);?> 1600w,<?php wkwkrnht_eyecatch($size_1366);?> 1366w,<?php wkwkrnht_eyecatch($size_1280);?> 1280w,<?php wkwkrnht_eyecatch($size_1024);?> 1024w,<?php wkwkrnht_eyecatch($size_1920);?> 1920w,<?php wkwkrnht_eyecatch($size_800);?> 800w,<?php wkwkrnht_eyecatch($size_720);?> 720w,<?php wkwkrnht_eyecatch($size_640);?> 640w,<?php wkwkrnht_eyecatch($size_560);?> 560w,<?php wkwkrnht_eyecatch($size_480);?> 480w,<?php wkwkrnht_eyecatch($size_320);?> 320w,<?php wkwkrnht_eyecatch($size_240);?> 240w" sizes="90vw" alt="eyecatch" class="article-eyecatch">
        <div class="article-meta">
            <h1 class="article-title entry-title">
                <?php the_title();?>
            </h1>
            <div>
                <span class="article-date fa fa-calendar">
                    <time class="updated" datetime="<?php the_mtime('Y/n/j G:i.s');?>">
                        <?php the_time('Y/n/j');?>
                    </time>
                </span>
                <span class="author article-author fa fa-user">
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
        if(have_posts()){
            while(have_posts()){
                the_post();
                the_content();
                wp_link_pages(array('before'=>'<div class="page-nav"><span>ページ：</span>','after'=>'</div>','separator'=>'','nextpagelink'=>'<','previouspagelink'=>'>'));
            }
        }?>
    </div>
    <footer class="article-footer" itemscope itemtype="http://schema.org/WPFooter">
        <?php if(is_active_sidebar('singularfooter')):?>
            <ul class="widget-area">
                <?php dynamic_sidebar('singularfooter');?>
            </ul>
        <?php endif;?>
        <a href="<?php echo esc_url(home_url(''));?>" class="copyright" tabindex="0">
            <span itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Organization">
                <span itemprop="name">
                    <?php bloginfo();?>
                </span>
            </span>
            &nbsp;&nbsp;&copy;
            <span itemprop="copyrightYear">
                <?php echo get_first_post_year();?>
            </span>
        </a>
    </footer>
</article>