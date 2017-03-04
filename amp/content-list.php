<header class="site-header" itemscope itemtype="http://schema.org/WPHeader">
    <?php if(is_404()===true):?>
        <a href="<?php echo $site_url;?>" tabindex="0" itemprop="url">
            <h1 class="site-title" itemprop="name headline">
                404 Not Found｜<?php echo $blog_name;?>
            </h1><br>
            <p class="site-description" itemprop="about">
                このサイトにはお探しのものはございません。お手数を掛けますが、再度お探しください。
            </p>
        </a>
    <?php elseif(is_category()===true):?>
        <h1 class="site-title" itemprop="name headline about">
            <?php echo'「' . single_cat_title('',false) . '」の記事一覧｜' . $blogname;?>
        </h1>
    <?php elseif(is_tag()===true):?>
        <h1 class="site-title" itemprop="name headline about">
            <?php echo'「' . single_tag_title('',false) . '」の記事一覧｜' . $blogname;?>
        </h1>
    <?php elseif(is_search()===true):
        global $wp_query;
        $serachresult = $wp_query->found_posts;
        $maxpage      = $wp_query->max_num_pages;
        wp_reset_query();?>
        <h1 class="site-title" itemprop="name headline about">
            <?php '「' . get_search_query() . '」の検索結果｜' . $blogname;?>
        </h1><br>
        <p class="site-description">
            <?php echo $serachresult . ' 件 / ' . $maxpage . ' ページ';?>
        </p>
    <?php elseif(is_author()===true):
        $author_name = the_author_meta('display_name');?>
        <amp-img src-"<?php echo get_avatar_url(get_the_author_meta('ID'),array('sizes'=>256,));?>" alt="bio-img" class="bio-img" height="256" width="256" layout="responsive"></amp-img>
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
    <br>
    <span class="copyright">
        <span itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Organization">
            <span itemprop="name">
                <b>
                    <?php echo $blog_name;?>
                </b>
            </span>
        </span>
        &nbsp;&nbsp;&copy;
        <span itemprop="copyrightYear">
            <?php echo get_first_post_year();?>
        </span>
    </span>
</header>
<main class="card-list">
    <?php
    $default_value = get_option('posts_per_page');
    update_option('posts_per_page',9999999999999);
    if(have_posts()):while(have_posts()):the_post();
            $title      = the_title_attribute(array('echo'=>false));
            $categories = get_the_category();
            $category   = $categories[0];
            ?>
            <a href="<?php the_permalink();?>" title="<?php echo $title;?>" tabindex="0" class="article-card">
                <amp-img src="<?php wkwkrnht_eyecatch($size_full);?>" alt="eyecatch" class="card-img">
                <div class="card-meta">
                    <h2>
                        <?php echo $title;?>
                    </h2>
                    <div>
                        <span>
                            <time datetime="<?php the_time('Y-m-d');?>">
                                <?php the_time('Y/n/j');?>
                            </time>
                        </span>
                        <span>
                            <?php echo $category->cat_name;?>
                        </span>
                    </div>
                </div>
            </a>
    <?php endwhile;endif;
    update_option('posts_per_page',$default_value);?>
</main>