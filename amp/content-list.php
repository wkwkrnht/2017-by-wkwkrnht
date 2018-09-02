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
    $size = 'crop';
    if(have_posts()):while(have_posts()):the_post();
            $title = the_title_attribute(array('echo'=>false));
            $time  = get_mtime('Y/n/j G:i.s');?>
            <a href="<?php the_permalink();?>" title="<?php echo $title;?>" tabindex="0" class="article-card">
                <div class="card-img">
                    <amp-img <?php wkwkrnht_img_srcs($size);?> sizes="30vmax" layout="fill" alt="eyecatch"></amp-img>
                </div>
                <div class="card-meta">
                    <h2 class="card-title">
                        <?php echo $title;?>
                    </h2>
                    <time class="card-time far fa-calendar" datetime="<?php echo $time;?>">
                        <?php echo $time;?>
                    </time>
                </div>
            </a>
    <?php endwhile;endif;?>
</main>