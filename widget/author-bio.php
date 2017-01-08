<style>
    .bio-wrapper{
        background-color:#fff;
		border-radius:3vmin;
		box-shadow:0 0 3vmin rgba(0,0,0,.2);
		box-sizing:border-box;
        display:block;
		font-size:1.8rem;
		margin:4vh 2vh;
		min-height:40.5vmin;
		padding:2vh 4vh;
        position:relative;
		text-align:center;
        width:80vw;
    }
    .bio-img{
        left:4vmin;
        position:absolute;
        top:2vmin;
        width:calc(80vw / 10 * 3 - 1vmin);
    }
    .bio-info,.follow-button{
        width:calc(80vw / 10 * 7);
    }
    .bio-info{
        position:absolute;
        right:0;
        top:0;
    }
    .bio-name{
        font-size:2.3rem;
        text-align:center;
        vertical-align:middle;
    }
    .bio-description{
        font-size:1.6rem;
    }
    .follow-button{
        bottom:0;
        list-style:none;
        overflow-x:auto;
        overflow-y:hidden;
        position:absolute;
        right:0;
    }
    .follow-button li{
        display:inline-block;
        height:3em;
        padding:.5em;
        text-align:center;
        vertical-align:middle;
        width:3em;
    }
    @media screen and (min-width:992px){
        .bio-img{
            height:30vmin;
        }
	}
    @media screen and (max-width:992px){
        .bio-img{
            height:45vmin;
        }
    }
</style>
<<?php if(is_author()===true){echo'header itemscope itemtype="http://schema.org/WPHeader"';}else{echo'div';}?> class="bio-wrapper">
    <?php echo get_avatar(get_the_author_meta('ID'),256,'','bio-img',array('class'=>'bio-img'));?>
    <a class="bio-info" href="<?php echo home_url() . '?author=' . get_the_author_meta('ID');?>" tabindex="0" title="<?php the_author_meta('display_name');?>'s summary"<?php if(is_author()===true){echo'itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Organization"';}?>>
        <h2 class="bio-name" <?php if(is_author()===true){echo'itemprop="name"';}?>><?php the_author_meta('display_name');?></h2><br>
        <p class="bio-description" <?php if(is_author()===true){echo'itemprop="about"';}?>><?php the_author_meta('user_description');?></p>
    </a>
    <ul class="follow-button" itemscope itemtype=”http://schema.org/SiteNavigationElement”>
        <?php $tw = '';$tw = get_the_author_meta('twitter');if($tw!==''){echo'<li itemprop="name"><a href="https://twitter.com/' . $tw . '" class="twitter" tabindex="0" itemprop="url"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a></li>';}?>
        <?php $fb = '';$fb = get_the_author_meta('facebook');if($fb!==''){echo'<li itemprop="name"><a href="https://www.facebook.com/profile.php?id=' . $fb . '" class="facebook" tabindex="0" itemprop="url"><i class="fa fa-facebook-official fa-3x" aria-hidden="true"></i></a></li>';}?>
        <?php $Instagram = '';$Instagram = get_the_author_meta('Instagram');if($Instagram!==''){echo'<li itemprop="name"><a href="https://www.instagram.com/' . $Instagram . '" class="instagram" tabindex="0" itemprop="url"></a></li>';}?>
        <?php $line = '';$line = get_the_author_meta('LINE');if($line!==''){echo'<li>' . $line . '</li>';}?>
        <?php $gp = '';$gp = get_the_author_meta('Googleplus');if($gp!==''){echo'<li itemprop="name"><a href="https://plus.google.com/u/0/' . $gp . '" class="google-plus" tabindex="0" itemprop="url"><i class="fa fa-google-plus-official fa-3x" aria-hidden="true"></i></a></li>';}?>
        <?php $ld = '';$ld = get_the_author_meta('Linkedin');if($ld!==''){echo'<li itemprop="name"><a href="https://jp.linkedin.com/in/' . $ld . '" class="linkedin" tabindex="0" itemprop="url"><i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a></li>';}?>
        <?php $vine = '';$vine = get_the_author_meta('vine');if($vine!==''){echo'<li itemprop="name"><a href="' . $vine . '" class="vine" tabindex="0" itemprop="url"><i class="fa fa-vine" aria-hidden="true"></i></a></li>';}?>
        <?php $vimeo = '';$vimeo = get_the_author_meta('vimeo');if($vimeo!==''){echo'<li itemprop="name"><a href="' . $vimeo . '" class="vimeo" tabindex="0" itemprop="url"><i class="fa fa-vimeo-square" aria-hidden="true"></i></a></li>';}?>
        <?php $niconico = '';$niconico = get_the_author_meta('niconico');if($niconico!==''){echo'<li itemprop="name"><a href="' . $niconico . '" class="nicnico" tabindex="0" itemprop="url"><i class="fa fa-television" aria-hidden="true"></i></a></li>';}?>
        <?php $YouTube = '';$YouTube = get_the_author_meta('YouTube');if($YouTube!==''){echo'<li itemprop="name"><a href="https://youtube.com/channel/' . $YouTube . '" class="youtube" tabindex="0" itemprop="url"><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>';}?>
        <?php $Twitch = '';$Twitch = get_the_author_meta('Twitch');if($Twitch!==''){echo'<li itemprop="name"><a href="' . $Twitch . '" class="twitch" tabindex="0" itemprop="url"><i class="fa fa-twitch" aria-hidden="true"></i></a></li>';}?>
        <?php $USTREAM = '';$USTREAM = get_the_author_meta('USTREAM');if($USTREAM!==''){echo'<li itemprop="name"><a href="' . $USTREAM . '" class="ustream" tabindex="0" itemprop="url"></a></li>';}?>
        <?php $fc2 = '';$fc2 = get_the_author_meta('fc2');if($fc2!==''){echo'<li itemprop="name"><a href="' . $fc2 . '" class="fc2" tabindex="0" itemprop="url"></a></li>';}?>
        <?php $livedoor = '';$livedoor = get_the_author_meta('livedoor');if($livedoor!==''){echo'<li itemprop="name"><a href="' . $livedoor . '" class="livedoor" tabindex="0" itemprop="url"></a></li>';}?>
        <?php $ameba = '';$ameba = get_the_author_meta('ameba');if($ameba!==''){echo'<li itemprop="name"><a href="' . $ameba . '" class="ameba" tabindex="0" itemprop=”url”></a></li>';}?>
        <?php $mixi = '';$mixi = get_the_author_meta('mixi');if($mixi!==''){echo'<li itemprop="name"><a href="' . $mixi . '" class="mixi" tabindex="0" itemprop=”url”></a></li>';}?>
        <?php $hatenablog = '';$hatenablog = get_the_author_meta('hatenablog');if($hatenablog!==''){echo'<li itemprop="name"><a href="' . $hatenablog . '" class="hatena" tabindex="0" itemprop="url">' . $hatenablog . '</a></li>';}?>
        <?php $hatenadiary = '';$hatenadiary = get_the_author_meta('hatenadiary');if($hatenadiary!==''){echo'<li itemprop="name"><a href="' . $hatenadiary . '" class="hatena" tabindex="0" itemprop="url">' . $hatenadiary . '</a></li>';}?>
        <?php $hatebu = '';$hatebu = get_the_author_meta('hatebu');if($hatebu!==''){echo'<li itemprop="name"><a href="' . $hatebu . '" class="hatena" tabindex="0" itemprop="url"></a></li>';}?>
        <?php $xda = '';$xda = get_the_author_meta('xda');if($xda!==''){echo'<li itemprop="name"><a href="' . $xda . '" class="xda" tabindex="0" itemprop="url"></a></li>';}?>
        <?php $Quita = '';$Quita = get_the_author_meta('Quita');if($Quita!==''){echo'<li itemprop="name"><a href="http://qiita.com/' . $Quita . '" class="quiita" tabindex="0" itemprop="url">' . $Quita . '</a>';}?></li>
        <?php $Github = '';$Github = get_the_author_meta('Github');if($Github!==''){echo'<li itemprop="name"><a href="https://github.com/' . $Github . '" class="github" tabindex="0" itemprop="url"><i class="fa fa-github fa-3x" aria-hidden="true"></i></a></li>';}?>
        <?php $Codepen = '';$Codepen = get_the_author_meta('Codepen');if($Codepen!==''){echo'<li itemprop="name"><a href="' . $Codepen . '" class="codepen" tabindex="0" itemprop="url"></a></li>';}?>
        <?php $JSbuddle = '';$JSbuddle = get_the_author_meta('JSbuddle');if($JSbuddle!==''){echo'<li itemprop="name"><a href="' . $JSbuddle . '" class="jsbuddle" tabindex="0" itemprop="url"></a></li>';}?>
        <?php $Amazonlist = '';$Amazonlist = get_the_author_meta('Amazonlist');if($Amazonlist!==''){echo'<li itemprop="name"><a href="' . $Amazonlist . '" class="amazon" tabindex="0" itemprop="url"><i class="fa fa-amazon" aria-hidden="true"></i></a></li>';}?>
        <?php $Yahooaction = '';$Yahooaction = get_the_author_meta('Yahooaction');if($Yahooaction!==''){echo'<li itemprop="name"><a href="' . $Yahooaction . '" class="y-action" tabindex="0" itemprop="url">Y!</a></li>';}?>
        <?php $Rakuma = '';$Rakuma = get_the_author_meta('Rakuma');if($Rakuma!==''){echo'<li itemprop="name"><a href="' . $Rakuma . '" class="rakuma" tabindex="0" itemprop="url">rakuma</a></li>';}?>
        <?php $Merukari = '';$Merukari = get_the_author_meta('Merukari');if($Merukari!==''){echo'<li itemprop="name"><a href="' . $Merukari . '" class="merukari" tabindex="0" itemprop="url">merukari</a></li>';}?>
    </ul>
</<?php if(is_author()===true){echo'header';}else{echo'div';}?>>
