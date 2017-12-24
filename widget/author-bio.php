<?php
function make_author_info_array($setting){
    $array = array();
    foreach($setting as $value){
        $value = get_the_author_meta($key);
        if($value!==''){
            $array[$key] = $value;
        }
    }
    return $array;
}
function make_author_follow_button($array){
    foreach($array as $array_key => $array_value){
        switch($array_key){
            case 'twitter':
                $fw_class = 'fa-twitter-square';
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
            case 'Github':
                $fw_class = 'fa-github';
                break;
            case 'Gitlab':
                $fw_class = 'fa-gitlab';
                break;
            case 'Bitbucket':
                $fw_class = 'fa-bittbucket-square';
                break;
            case 'Amazonlist':
                $fw_class = 'fa-amazon';
                break;
            default:
                $fw_class = null;
        }
        if($fw_class===null){
            $name = '<span itemprop="name">' . $array_key . '</span>';
        }else{
            $name = '<span class="fa fa-3x ' . $fw_class . '" aria-hidden="true" itemprop="name"></span>';
        }
        echo'
        <li itemscope itemtype="http://schema.org/SiteNavigationElement">
            <a href="' . $array_value . '" title="' . $array_key . '" class="' . $array_key . '" tabindex="0" itemprop="url">
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
    'Twitch',
    'Github',
    'Gitlab',
    'Bitbucket',
    'Amazonlist'
);
$is_author   = is_author();
$author_name = get_the_author_meta('display_name');
$id          = get_the_author_meta('ID');
$line        = get_the_author_meta('LINE');
$USTREAM     = get_the_author_meta('USTREAM');
$fc2         = get_the_author_meta('fc2');
$livedoor    = get_the_author_meta('livedoor');
$ameba       = get_the_author_meta('ameba');
$mixi        = get_the_author_meta('mixi');
$hatenablog  = get_the_author_meta('hatenablog');
$hatenadiary = get_the_author_meta('hatenadiary');
$hatebu      = get_the_author_meta('hatebu');
$xda         = get_the_author_meta('xda');
$Quita       = get_the_author_meta('Quita');
$Codepen     = get_the_author_meta('Codepen');
$JSbuddle    = get_the_author_meta('JSbuddle');
$Yahooaction = get_the_author_meta('Yahooaction');
$Rakuma      = get_the_author_meta('Rakuma');
$Merukari    = get_the_author_meta('Merukari');
$array       = make_author_info_array($setting);
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
        if($line!==''){echo'<li>' . $line . '</li>';}
        if($USTREAM!==''){echo'<li itemprop="name"><a href="' . $USTREAM . '" class="ustream" tabindex="0" itemprop="url">U</a></li>';}
        if($fc2!==''){echo'<li itemprop="name"><a href="' . $fc2 . '" class="fc2" tabindex="0" itemprop="url"></a></li>';}
        if($livedoor!==''){echo'<li itemprop="name"><a href="' . $livedoor . '" class="livedoor" tabindex="0" itemprop="url"></a></li>';}
        if($ameba!==''){echo'<li itemprop="name"><a href="' . $ameba . '" class="ameba" tabindex="0" itemprop=”url”></a></li>';}
        if($mixi!==''){echo'<li itemprop="name"><a href="' . $mixi . '" class="mixi" tabindex="0" itemprop=”url”></a></li>';}
        if($hatenablog!==''){echo'<li itemprop="name"><a href="' . $hatenablog . '" class="hatena" tabindex="0" itemprop="url"></a></li>';}
        if($hatenadiary!==''){echo'<li itemprop="name"><a href="' . $hatenadiary . '" class="hatena" tabindex="0" itemprop="url"></a></li>';}
        if($hatebu!==''){echo'<li itemprop="name"><a href="' . $hatebu . '" class="hatena" tabindex="0" itemprop="url">B!</a></li>';}
        if($xda!==''){echo'<li itemprop="name"><a href="' . $xda . '" class="xda" tabindex="0" itemprop="url"></a></li>';}
        if($Quita!==''){echo'<li itemprop="name"><a href="http://qiita.com/' . $Quita . '" class="quiita" tabindex="0" itemprop="url">Q</a></li>';}
        if($Codepen!==''){echo'<li itemprop="name"><a href="' . $Codepen . '" class="codepen" tabindex="0" itemprop="url"></a></li>';}
        if($JSbuddle!==''){echo'<li itemprop="name"><a href="' . $JSbuddle . '" class="jsbuddle" tabindex="0" itemprop="url"></a></li>';}
        if($Yahooaction!==''){echo'<li itemprop="name"><a href="' . $Yahooaction . '" class="y-action" tabindex="0" itemprop="url">Y!</a></li>';}
        if($Rakuma!==''){echo'<li itemprop="name"><a href="' . $Rakuma . '" class="rakuma" tabindex="0" itemprop="url">R</a></li>';}
        if($Merukari!==''){echo'<li itemprop="name"><a href="' . $Merukari . '" class="merukari" tabindex="0" itemprop="url">merukari</a></li>';}?>
    </ul>
</<?php if($is_author===true){echo'header';}else{echo'div';}?>>