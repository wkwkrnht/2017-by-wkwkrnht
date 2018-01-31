<?php
$charset = get_option('blog_charset');
header('Content-Type: ' . feed_content_type('rss2') . '; charset=' . $charset,true);
echo'<?xml version="1.0" encoding="' . $charset . '"?' . '>';
do_action('rss_tag_pre','rss2');
?>
<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
    xmlns:media="http://search.yahoo.com/mrss/"
    xmlns:snf="http://www.smartnews.be/snf"
	<?php do_action('rss2_ns');?>
>

<channel>
	<title><?php wp_title_rss();?></title>
    <snf:logo>
		<url><?php meta_image();?></url>
	</snf:logo>
	<atom:link href="<?php self_link();?>" rel="self" type="application/rss+xml" />
	<link><?php bloginfo_rss('url');?></link>
	<description><?php bloginfo_rss("description");?></description>
	<lastBuildDate><?php
		$date = get_lastpostmodified('GMT');
		echo $date ? mysql2date('r',$date,false) : date('r');
	?></lastBuildDate>
	<language><?php bloginfo_rss('language');?></language>
	<sy:updatePeriod><?php echo apply_filters('rss_update_period');?></sy:updatePeriod>
	<sy:updateFrequency><?php echo apply_filters('rss_update_frequency','1');?></sy:updateFrequency>
	<?php
	do_action('rss2_head');
	while(have_posts()):the_post();
	?>
    	<item>
    		<title><?php the_title_rss();?></title>
    		<link><?php the_permalink_rss();?></link>
            <?php if(get_comments_number() || comments_open()):?>
            		<comments><?php comments_link_feed();?></comments>
            <?php endif;?>
    		<pubDate><?php echo mysql2date('D, d M Y H:i:s +0000',get_post_time('Y-m-d H:i:s',true),false);?></pubDate>
    		<dc:creator><![CDATA[<?php the_author();?>]]></dc:creator>
    		<?php the_category_rss();?>
            <media:thumbnail><?php wkwkrnht_img_src('full');?></media:thumbnail>
            <guid isPermaLink="false"><?php the_guid();?></guid>
            <?php if(get_option('rss_use_excerpt')):?>
                <description><![CDATA[<?php echo the_excerpt_rss();?>]]></description>
            <?php endif;?>
            <content:encoded><![CDATA[<?php echo get_the_content_feed('rss2');?>]]></content:encoded>
            <?php if(get_comments_number() || comments_open()):?>
            		<wfw:commentRss><?php echo esc_url(get_post_comments_feed_link(null,'rss2'));?></wfw:commentRss>
            		<slash:comments><?php echo get_comments_number();?></slash:comments>
            <?php endif;?>
            <?php rss_enclosure();?>
        	<?php do_action('rss2_item');?>
    	</item>
	<?php endwhile;?>
</channel>
</rss>