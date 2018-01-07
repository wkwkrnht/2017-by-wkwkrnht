<?php
function make_author_info_array($setting){
    $array = array();
    foreach($setting as $key){
        $value = get_the_author_meta($key);
        if($value){
            $array[$key] = $value;
        }
    }
    return $array;
}
function make_author_follow_button($array){
    foreach($array as $key => $value){
        $fw_class  = '';
        $character = '';
        switch($key){
            case 'twitter':
                $fw_class = 'fa-twitter-square';
                $value    = 'https://twitter.com/' . $value;
                break;
            case 'facebook':
                $fw_class = 'fa-facebook-official';
                break;
            case 'Instagram':
                $fw_class = 'fa-instagram';
                break;
            case 'Googleplus':
                $fw_class = 'fa-google-plus-official';
                break;
            case 'Linkedin':
                $fw_class = 'fa-linkedin-square';
                break;
            case 'vine':
                $fw_class = 'fa-vine';
                break;
            case 'vimeo':
                $fw_class = 'fa-vimeo-square';
                break;
            case 'niconico':
                $fw_class = 'fa-television';
                break;
            case 'YouTube':
                $fw_class = 'fa-youtube-square';
                break;
            case 'Twitch':
                $fw_class = 'fa-twitch';
                break;
            case 'USTREAM':
                $character = 'U';
                break;
            case 'Skype':
                $fw_class = 'fa-skype';
                break;
            case 'WordPress.com':
                $fw_class = 'fa-wordpress';
                break;
            case 'WordPress.org':
                $fw_class = 'fa-wordpress';
                break;
            case 'Tumblr':
                $fw_class = 'fa-tumblr-square';
                break;
            case 'Medium':
                $fw_class = 'fa-medium';
                break;
            case 'note':
                $character = 'n';
                break;
            case 'mixi':
                $character = 'm';
                break;
            case 'hatebu':
                $character = 'B!';
                break;
            case 'Pinterest':
                $fw_class = 'fa-pinterest-square';
                break;
            case 'Spotify':
                $fw_class = 'fa-spotify';
                break;
            case 'SoundCloud':
                $fw_class = 'fa-soundcloud';
                break;
            case 'Flickr':
                $fw_class = 'fa-flickr';
                break;
            case 'FourSquare':
                $fw_class = 'fa-foursquare';
                break;
            case 'Steam':
                $fw_class = 'fa-steam-square';
                break;
            case 'UPlay':
                $character = 'U';
                break;
            case 'Qiita':
                $character = 'Q';
                break;
            case 'Codepen':
                $fw_class = 'fa-codepen';
                break;
            case 'Github':
                $fw_class = 'fa-github';
                break;
            case 'Gitlab':
                $fw_class = 'fa-gitlab';
                break;
            case 'Bitbucket':
                $fw_class = 'fa-bittbucket-square';
                break;
            case 'Rakuma':
                $character = 'R';
                break;
            case 'Amazonlist':
                $fw_class = 'fa-amazon';
                break;
            case 'PayPal':
                $fw_class = 'fa-cc-paypal';
                break;
            case 'Bitcoin':
                $fw_class = 'fa-bitcoin';
                break;
            default:
                break;
        }
        if($fw_class!==''){
            $name = '<span class="fa fa-3x ' . $fw_class . '" aria-hidden="true" itemprop="name"></span>';
        }elseif($character!==''){
            $name = '<span itemprop="name">' . $character . '</span>';
        }else{
            $name = '<span itemprop="name">' . $key . '</span>';
        }
        echo'
        <li itemscope itemtype="http://schema.org/SiteNavigationElement">
            <a href="' . $value . '" title="' . $key . '" class="' . $key . '" tabindex="0" itemprop="url">
                ' . $name . '
            </a>
        </li>';
    }
}
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
<<?php if($is_author===true){echo'header itemscope itemtype="http://schema.org/WPHeader"';}else{echo'div';}?> class="bio-wrapper">
    <?php echo get_avatar($id,256,'','bio-img',array('class'=>'bio-img'));?>
    <a class="bio-info" href="<?php echo home_url() . '?author=' . $id;?>" tabindex="0" title="<?php echo $author_name;?>'s summary"<?php if($is_author===true){echo'itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Organization"';}?>>
        <h2 class="bio-name" <?php if($is_author===true){echo'itemprop="name"';}?>>
            <?php echo $author_name;?>
        </h2><br>
        <p class="bio-description" <?php if($is_author===true){echo'itemprop="about"';}?>>
            <?php the_author_meta('user_description');?>
        </p>
    </a>
    <ul class="follow-button">
        <?php
        make_author_follow_button($array);
        if($line!==''){echo'<li>' . $line . '</li>';}?>
    </ul>
</<?php if($is_author===true){echo'header';}else{echo'div';}?>>