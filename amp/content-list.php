<header class="site-header" itemscope itemtype="http://schema.org/WPHeader">
    <?php if(is_404()===true):?>
        <a href="<?php echo $site_url;?>" tabindex="0" itemprop="url">
            <h1 class="site-title" itemprop="name headline">
                404 Not Found｜<?php echo $blog_name;?>
            </h1>
            <summary class="site-description" itemprop="about">
                このサイトにはお探しのものはございません。お手数を掛けますが、再度お探しください。
            </summary>
        </a>
    <?php elseif(is_category()===true):?>
        <h1 class="site-title" itemprop="name headline about">
            <?php echo'「' . single_cat_title('',false) . '」の記事一覧｜' . $blog_name;?>
        </h1>
    <?php elseif(is_tag()===true):?>
        <h1 class="site-title" itemprop="name headline about">
            <?php echo'「' . single_tag_title('',false) . '」の記事一覧｜' . $blog_name;?>
        </h1>
    <?php elseif(is_search()===true):
        global $wp_query;
        $serachresult = $wp_query->found_posts;
        $maxpage      = $wp_query->max_num_pages;
        wp_reset_query();?>
        <h1 class="site-title" itemprop="name headline">
            <?php '「' . get_search_query() . '」の検索結果｜' . $blogname;?>
        </h1>
        <summary class="site-description" itemprop="about">
            <?php echo $serachresult . ' 件 / ' . $maxpage . ' ページ';?>
        </summary>
    <?php elseif(is_author()===true):
        $author_name = the_author_meta('display_name');?>
        <amp-img src-"<?php echo get_avatar_url(get_the_author_meta('ID'),array('sizes'=>256,));?>" alt="bio-img" class="bio-img" height="256" width="256" layout="fixed"></amp-img>
        <div class="bio-info" itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Organization">
            <h2 itemprop="name"><?php echo $author_name;?></h2><br>
            <p class="bio-description" itemprop="about"><?php the_author_meta('user_description');?></p>
        </div>
    <?php else:?>
        <a href="<?php echo $site_url;?>" tabindex="0" itemprop="url">
            <h1 class="site-title" itemprop="name headline">
                <?php echo $blog_name;?>
            </h1>
        </a>
    <?php endif;?>
    <div class="copyright">
        <span itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Organization">
            <span itemprop="name">
                <?php echo $blog_name;?>
            </span>
        </span>
        &nbsp;&nbsp;&copy;
        <span itemprop="copyrightYear">
            <?php echo get_first_post_year();?>
        </span>
    </div>
    <?php if(has_nav_menu('header')===true):?>
        <nav>
            <?php wp_nav_menu(array('theme_location'=>'header','container'=>false,'items_wrap'=>'<ul id="%1$s" class="header-nav %2$s" itemscope itemtype="http://schema.org/SiteNavigationElement">%3$s</ul>'));?>
        </nav>
    <?php endif;?>
</header>
<main class="card-list">
    <?php
    if(have_posts()):while(have_posts()):the_post();
            $title = the_title_attribute(array('echo'=>false));
            $time  = get_mtime('Y/n/j G:i.s');?>
            <a href="<?php the_permalink();?>" title="<?php echo $title;?>" tabindex="0" class="article-card">
                <amp-img src="<?php wkwkrnht_eyecatch($size_160_crop);?>" srcset="<?php wkwkrnht_eyecatch($size_240_crop);?> 240w,<?php wkwkrnht_eyecatch($size_320_crop);?> 320w,<?php wkwkrnht_eyecatch($size_480_crop);?> 480w,<?php wkwkrnht_eyecatch($size_560_crop);?> 560w,<?php wkwkrnht_eyecatch($size_640_crop);?> 640w,<?php wkwkrnht_eyecatch($size_720_crop);?> 720w,<?php wkwkrnht_eyecatch($size_800_crop);?> 800w,<?php wkwkrnht_eyecatch($size_1024_crop);?> 1024w,<?php wkwkrnht_eyecatch($size_1280_crop);?> 1280w,<?php wkwkrnht_eyecatch($size_1366_crop);?> 1366w,<?php wkwkrnht_eyecatch($size_1600_crop);?> 1600w,<?php wkwkrnht_eyecatch($size_1920_crop);?> 1920w,<?php wkwkrnht_eyecatch($size_2560_crop);?> 2560w" sizes="30vmax" layout="fill" alt="eyecatch" class="card-img"></amp-img>
                <div class="card-meta">
                    <h2 class="card-title">
                        <?php echo $title;?>
                    </h2>
                    <time class="card-time fa fa-calendar" datetime="<?php echo $time;?>">
                        <?php echo $time;?>
                    </time>
                </div>
            </a>
    <?php endwhile;endif;?>
</main>