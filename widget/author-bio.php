<?php
$setting = array(
    'twitter',
    'facebook',
    'Instagram',
    'Googleplus',
    'Linkedin',
    'vine',
    'vimeo',
    'niconico',
    'Youtube',
    'USTREAM',
    'Twitch',
    'fc2',
    'livedoor',
    'ameba',
    'mixi',
    'WordPress.com',
    'Tumblr',
    'Medium',
    'note',
    'hatenablog',
    'hatenadiary',
    'hatebu',
    'Pinterest',
    'Spotify',
    'SoundCloud',
    'Flickr',
    'FourSquare',
    'Steam',
    'UPlay',
    'xda',
    'Qiita',
    'Codepen',
    'JSbuddle',
    'Github',
    'Gitlab',
    'Bitbucket',
    'Yahooaction',
    'Rakuma',
    'Merukari',
    'Amazonlist',
    'PayPal',
    'Bitcoin'
);
$is_author   = is_author();
$author_name = get_the_author_meta('display_name');
$id          = get_the_author_meta('ID');
$line        = get_the_author_meta('LINE');
$array       = make_author_info_array($setting);?>
<aside<?php if($is_author===true){echo' itemscope itemtype="http://schema.org/WPHeader"';}?> class="bio-wrapper">
    <?php echo get_avatar($id,256,'','bio-img',array('class'=>'bio-img'));?>
    <a class="bio-info" href="<?php echo home_url() . '?author=' . $id;?>" tabindex="0" title="<?php echo $author_name;?>'s summary"<?php if($is_author===true){echo' itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Organization"';}?>>
        <h2 class="bio-name"<?php if($is_author===true){echo' itemprop="name"';}?>>
            <?php echo $author_name;?>
        </h2>
        <p class="bio-description"<?php if($is_author===true){echo' itemprop="about"';}?>>
            <?php the_author_meta('user_description');?>
        </p>
    </a>
    <ul class="follow-button">
        <?php
        make_author_follow_button($array);
        if($line!==''){echo'<li>' . $line . '</li>';}?>
    </ul>
</aside>