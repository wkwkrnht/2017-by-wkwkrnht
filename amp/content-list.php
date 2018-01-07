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
<main class="article-list">
    <?php
    if(have_posts()):while(have_posts()):the_post();
            $title = the_title_attribute(array('echo'=>false));
            $time  = get_mtime('Y/n/j G:i.s');?>
            <a href="<?php the_permalink();?>" title="<?php echo $title;?>" tabindex="0" class="article-card">
                <div class="card-img">
                    <amp-img src="<?php wkwkrnht_eyecatch($size_160_crop);?>" srcset="<?php wkwkrnht_eyecatch($size_240_crop);?> 240w,<?php wkwkrnht_eyecatch($size_320_crop);?> 320w,<?php wkwkrnht_eyecatch($size_480_crop);?> 480w,<?php wkwkrnht_eyecatch($size_560_crop);?> 560w,<?php wkwkrnht_eyecatch($size_640_crop);?> 640w,<?php wkwkrnht_eyecatch($size_720_crop);?> 720w,<?php wkwkrnht_eyecatch($size_800_crop);?> 800w,<?php wkwkrnht_eyecatch($size_1024_crop);?> 1024w,<?php wkwkrnht_eyecatch($size_1280_crop);?> 1280w,<?php wkwkrnht_eyecatch($size_1366_crop);?> 1366w,<?php wkwkrnht_eyecatch($size_1600_crop);?> 1600w,<?php wkwkrnht_eyecatch($size_1920_crop);?> 1920w,<?php wkwkrnht_eyecatch($size_2560_crop);?> 2560w" sizes="30vmax" layout="fill" alt="eyecatch"></amp-img>
                </div>
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