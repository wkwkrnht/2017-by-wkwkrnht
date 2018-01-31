<?php
$more    = 1;
$charset = get_option('blog_charset');
header('Content-Type: ' . feed_content_type('atom') . '; charset=' . $charset, true);
echo'<?xml version="1.0" encoding="' . $charset . '"?'.'>';
do_action('rss_tag_pre','atom');
?>
<feed xmlns="http://www.w3.org/2005/Atom" xml:lang="<?php bloginfo_rss('language');?>" xmlns:gnf="http://assets.gunosy.com/media/gnf" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:media="http://search.yahoo.com/mrss/">
    <title><?php wp_title_rss();?></title>
    <link type="text/html" href="<?php bloginfo_rss('url');?>" rel="alternate"/>
    <subtitle><?php bloginfo_rss("description");?></subtitle>
    <updated><?php echo mysql2date('Y-m-d\TH:i:s\Z',get_lastpostmodified('GMT'),false);?></updated>
    <rights><?php wp_title_rss();?></rights>
    <logo><?php meta_image();?></logo>
    <?php
    while(have_posts()):the_post();
        global $post;
        $post_id   = get_the_ID();
        $thumb     = get_the_post_thumbnail_url($post_id,'full');
        $thumb_cap = get_the_post_thumbnail_caption($post_id);
        $post_tags = get_the_tags();?>
        <entry>
            <title><![CDATA[<?php the_title_rss();?>]]></title>
            <link type="text/html" href="<?php the_permalink_rss();?>" rel="alternate"/>
            <id><?php echo $post_id;?></id>
            <published><?php echo get_post_time(DATE_RFC3339,true);?></published>
            <updated><?php echo get_post_modified_time(DATE_RFC3339,true);?></updated>
            <summary><?php the_excerpt_rss();?></summary>
            <content><![CDATA[
                <?php if(has_post_thumbnail()===true):?>
                            <figure>
                                <img src="<?php echo $thumb;?>">
                                <figcaption><?php echo $thumb_cap;?></figcaption>
                            </figure>
                <?php endif;?>
                <?php the_content_feed('atom');?>
            ]]></content>
            <?php the_category_rss('atom');?>
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
            <?php if(has_post_thumbnail()===true):?>
                    <link rel="enclosure" type="image/jpeg" title="<?php echo $thumb_cap;?>" href="<?php echo $thumb;?>" />
            <?php endif;?>
            <media:status state="<?php echo (get_post_status($post_id)=='publish') ? 'active' : 'deleted';?>"/>
            <?php do_action('atom_entry');?>
        </entry>
    <?php endwhile;?>
</feed>