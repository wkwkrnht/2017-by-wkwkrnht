<?php
$is_author   = is_author();
$author_name = the_author_meta('display_name');
$tw          = get_the_author_meta('twitter');
$fb          = get_the_author_meta('facebook');
$Instagram   = get_the_author_meta('Instagram');
$line        = get_the_author_meta('LINE');
$gp          = get_the_author_meta('Googleplus');
$ld          = get_the_author_meta('Linkedin');
$vine        = get_the_author_meta('vine');
$vimeo       = get_the_author_meta('vimeo');
$niconico    = get_the_author_meta('niconico');
$YouTube     = get_the_author_meta('YouTube');
$Twitch      = get_the_author_meta('Twitch');
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
$Github      = get_the_author_meta('Github');
$Codepen     = get_the_author_meta('Codepen');
$JSbuddle    = get_the_author_meta('JSbuddle');
$Amazonlist  = get_the_author_meta('Amazonlist');
$Yahooaction = get_the_author_meta('Yahooaction');
$Rakuma      = get_the_author_meta('Rakuma');
$Merukari    = get_the_author_meta('Merukari');?>
<<?php if($is_author===true){echo'header itemscope itemtype="http://schema.org/WPHeader"';}else{echo'div';}?> class="bio-wrapper">
    <?php echo get_avatar(get_the_author_meta('ID'),256,'','bio-img',array('class'=>'bio-img'));?>
    <a class="bio-info" href="<?php echo home_url() . '?author=' . get_the_author_meta('ID');?>" tabindex="0" title="<?php echo $author_name;?>'s summary"<?php if($is_author===true){echo'itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Organization"';}?>>
        <h2 class="bio-name" <?php if($is_author===true){echo'itemprop="name"';}?>><?php echo $author_name;?></h2><br>
        <p class="bio-description" <?php if($is_author===true){echo'itemprop="about"';}?>><?php the_author_meta('user_description');?></p>
    </a>
    <ul class="follow-button" itemscope itemtype="http://schema.org/SiteNavigationElement">
        <?php
        if($tw!==''){echo'<li itemprop="name"><a href="https://twitter.com/' . $tw . '" class="twitter" tabindex="0" itemprop="url"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a></li>';}
        if($fb!==''){echo'<li itemprop="name"><a href="https://www.facebook.com/profile.php?id=' . $fb . '" class="facebook" tabindex="0" itemprop="url"><i class="fa fa-facebook-official fa-3x" aria-hidden="true"></i></a></li>';}
        if($Instagram!==''){echo'<li itemprop="name"><a href="https://www.instagram.com/' . $Instagram . '" class="instagram" tabindex="0" itemprop="url"></a></li>';}
        if($line!==''){echo'<li>' . $line . '</li>';}
        if($gp!==''){echo'<li itemprop="name"><a href="https://plus.google.com/u/0/' . $gp . '" class="google-plus" tabindex="0" itemprop="url"><i class="fa fa-google-plus-official fa-3x" aria-hidden="true"></i></a></li>';}
        if($ld!==''){echo'<li itemprop="name"><a href="https://linkedin.com/in/' . $ld . '" class="linkedin" tabindex="0" itemprop="url"><i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a></li>';}
        if($vine!==''){echo'<li itemprop="name"><a href="' . $vine . '" class="vine" tabindex="0" itemprop="url"><i class="fa fa-vine" aria-hidden="true"></i></a></li>';}
        if($vimeo!==''){echo'<li itemprop="name"><a href="' . $vimeo . '" class="vimeo" tabindex="0" itemprop="url"><i class="fa fa-vimeo-square" aria-hidden="true"></i></a></li>';}
        if($niconico!==''){echo'<li itemprop="name"><a href="' . $niconico . '" class="nicnico" tabindex="0" itemprop="url"><i class="fa fa-television" aria-hidden="true"></i></a></li>';}
        if($YouTube!==''){echo'<li itemprop="name"><a href="https://youtube.com/channel/' . $YouTube . '" class="youtube" tabindex="0" itemprop="url"><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>';}
        if($Twitch!==''){echo'<li itemprop="name"><a href="' . $Twitch . '" class="twitch" tabindex="0" itemprop="url"><i class="fa fa-twitch" aria-hidden="true"></i></a></li>';}
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
        if($Github!==''){echo'<li itemprop="name"><a href="https://github.com/' . $Github . '" class="github" tabindex="0" itemprop="url"><i class="fa fa-github fa-3x" aria-hidden="true"></i></a></li>';}
        if($Codepen!==''){echo'<li itemprop="name"><a href="' . $Codepen . '" class="codepen" tabindex="0" itemprop="url"></a></li>';}
        if($JSbuddle!==''){echo'<li itemprop="name"><a href="' . $JSbuddle . '" class="jsbuddle" tabindex="0" itemprop="url"></a></li>';}
        if($Amazonlist!==''){echo'<li itemprop="name"><a href="' . $Amazonlist . '" class="amazon" tabindex="0" itemprop="url"><i class="fa fa-amazon" aria-hidden="true"></i></a></li>';}
        if($Yahooaction!==''){echo'<li itemprop="name"><a href="' . $Yahooaction . '" class="y-action" tabindex="0" itemprop="url">Y!</a></li>';}
        if($Rakuma!==''){echo'<li itemprop="name"><a href="' . $Rakuma . '" class="rakuma" tabindex="0" itemprop="url">R</a></li>';}
        if($Merukari!==''){echo'<li itemprop="name"><a href="' . $Merukari . '" class="merukari" tabindex="0" itemprop="url">merukari</a></li>';}?>
    </ul>
</<?php if($is_author===true){echo'header';}else{echo'div';}?>>
