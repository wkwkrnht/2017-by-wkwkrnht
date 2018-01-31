<?php
$more    = 1;
$date    = get_lastpostmodified('GMT');
$charset = get_option('blog_charset');
header('Content-Type: ' . feed_content_type('rss2') . '; charset=' . $charset, true);
echo'<?xml version="1.0" encoding="' . $charset . '"?'.'>';
do_action('rss_tag_pre','rss2');
?>
<rss version="2.0" xmlns:gnf="http://assets.gunosy.com/media/gnf" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:media="http://search.yahoo.com/mrss/" <?php do_action('rss2_ns');?>>
    <title><?php wp_title_rss();?></title>
    <link type="text/html" href="<?php bloginfo_rss('url');?>" rel="alternate"/>
    <subtitle><?php bloginfo_rss("description");?></subtitle>
    <lastBuildDate><?php echo $date ? mysql2date('r',$date,false) : date('r');?></lastBuildDate>
    <rights><?php wp_title_rss();?></rights>
    <language><?php bloginfo_rss('language');?></language>
    <image>
        <url><?php meta_image();?></url>
        <title><?php wp_title_rss();?></title>
        <link><?php bloginfo_rss('url');?><link/>
    </image>
    <gnf:wide_image_link><?php meta_image();?></gnf:wide_image_link>
    <ttl><?php echo apply_filters('rss_update_period');?></ttl>
    <?php
    do_action('rss2_head');
    while(have_posts()):the_post();
        global $post;
        $post_id   = get_the_ID();
        $post_tags = get_the_tags();?>
        <item>
            <media:status state="<?php echo (get_post_status($post_id)=='publish') ? 'active' : 'deleted';?>"/>
            <title><![CDATA[<?php the_title_rss();?>]]></title>
            <link type="text/html" href="<?php the_permalink_rss();?>" rel="alternate"/>
            <guid><?php echo $post_id;?></guid>
            <pubDate><?php echo get_post_time(DATE_RFC3339,true);?></pubDate>
            <gnf:modified><?php echo get_post_modified_time(DATE_RFC3339,true);?></gnf:modified>
            <description><?php the_excerpt_rss();?></description>
            <content:encoded><![CDATA[
                <?php if(has_post_thumbnail()===true):?>
                            <figure>
                                <img src="<?php wkwkrnht_img_src('full');?>" alt="eyecatch">
                                <figcaption><?php echo get_the_post_thumbnail_caption($post_id);?></figcaption>
                            </figure>
                <?php endif;?>
                <?php the_content_feed('rss2');?>
            ]]></content:encoded>
            <?php the_category_rss();?>
            <?php if(isset($post_tags)===true):?>
                <gnf:keyword>
                    <?php
                    $i = 0;
                    foreach($post_tags as $tag){
                        if($i > 0){
                            echo',';
                        }
                        echo $tag->name;
                        ++$i;
                    }?>
                </gnf:keyword>
            <?php endif;?>
            <?php rss_enclosure();?>
            <?php do_action('rss2_item');?>
        </item>
    <?php endwhile;?>
</rss>