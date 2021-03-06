<?php
$made_time = get_mtime('Y/n/j G:i.s');
$size      = 'full';
if(have_posts()){
    while(have_posts()){
        the_post();
        $author_name = get_the_author_meta('display_name');
        $author_id   = get_the_author_meta('ID');
        $content     = apply_filters('the_content',get_the_content());
        $content     = str_replace(']]>',']]&gt;',$content);
        $page_nation = wp_link_pages(array('before'=>'<div class="page-nation">','after'=>'</div>','separator'=>'','nextpagelink'=>'<','previouspagelink'=>'>'));
    }
}else{
    $author_name = 'unknown';
    $author_id   = '0';
    $content     = 'This is unknown request. Wolud you check your request again?';
    $page_nation =  '';
}?>
<article id="post-<?php the_ID();?>" <?php post_class('article-wrapper');?>>
    <header class="article-header">
        <img <?php wkwkrnht_img_srcs($size);?> sizes="90vw" alt="eyecatch" class="article-eyecatch">
        <div class="article-meta">
            <h1 class="article-title entry-title">
                <?php the_title();?>
            </h1>
            <div>
                <time class="updated article-date far fa-calendar-alt" datetime="<?php echo $made_time;?>">
                    <?php echo $made_time;?>
                </time>
                <a href="<?php echo site_url() . '?author=' . $author_id;?>" title="<?php echo $author_name;?>" class="author article-author far fa-user" tabindex="0">
                    <span class="vcard author">
                        <span class="fn">
                            <?php echo $author_name;?>
                        </span>
                    </span>
                </a>
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
        echo $content;
        echo $page_nation;?>
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