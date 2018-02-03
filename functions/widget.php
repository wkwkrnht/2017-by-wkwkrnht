<?php
add_action('widgets_init','wkwkrnht_widgets_init');
function wkwkrnht_widgets_init(){
    register_widget('wkwkrnht_manth_archive');
    register_widget('disqus_widget');
    register_widget('duck_duck_go_search_widget');
    register_widget('google_search_widget');
    register_widget('google_search_ads_widget');
    register_widget('google_two_ads_widget');
    register_widget('google_translate_widget');
    register_widget('move_top');
    register_widget('post_nav');
    register_widget('post_nav_hover');
    register_widget('post_comment');
    register_widget('related_posts');
    register_widget('related_posts_img');
    register_widget('sns_follow');
    register_widget('sns_share');
}

class wkwkrnht_manth_archive extends WP_Widget{
    function __construct(){parent::__construct('wkwkrnht_manth_archive','月別アーカイブ(短縮版)',array());}
    public function widget($args,$instance){echo $args['before_widget'];include(get_template_directory() . '/widget/manth-archive.php');echo $args['after_widget'];}
    public function form($instance){$title=!empty($instance['title']) ? $instance['title'] : '';?>
		<p>
		<label for="<?php echo $this->get_field_id('title');?>">title</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>">
		</p>
		<?php
	}
	public function update($new_instance,$old_instance){$instance=array();$instance['title']=(!empty($new_instance['title'])) ? strip_tags($new_instance['title']):'';return $instance;}
}

class move_top extends WP_Widget{
    function __construct(){parent::__construct('move_top','先頭へのナビゲーション',array());}
    public function widget($args,$instance){
        echo $args['before_widget'] .
        '<a href="#top" title="Go to Top"  role="navigation">Λ</a>
        <script type="application/ld+json">{"@type" : "SiteNavigationElement","url" : "' . get_meta_url() . '#top","name" : "Page Top Button"}</script>'
        . $args['after_widget'];
    }
}

class post_nav extends WP_Widget{
    function __construct(){parent::__construct('post_nav','前後への記事のナビゲーション',array());}
    public function widget($args,$instance){echo $args['before_widget'];include(get_template_directory() . '/widget/post-nav.php');echo $args['after_widget'];}
    public function form($instance){$title=!empty($instance['title']) ? $instance['title'] : '';?>
		<p>
		<label for="<?php echo $this->get_field_id('title');?>">title</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>">
		</p>
		<?php
	}
	public function update($new_instance,$old_instance){$instance=array();$instance['title']=(!empty($new_instance['title'])) ? strip_tags($new_instance['title']):'';return $instance;}
}

class related_posts extends WP_Widget{
    function __construct(){parent::__construct('related_posts','関連記事',array());}
    public function widget($args,$instance){echo $args['before_widget'];include(get_template_directory() . '/widget/related-post.php');echo $args['after_widget'];}
    public function form($instance){$title=!empty($instance['title']) ? $instance['title'] : '';?>
		<p>
		<label for="<?php echo $this->get_field_id('title');?>">title</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>">
		</p>
		<?php
	}
	public function update($new_instance,$old_instance){$instance=array();$instance['title']=(!empty($new_instance['title'])) ? strip_tags($new_instance['title']):'';return $instance;}
}

class related_posts_img extends WP_Widget{
    function __construct(){parent::__construct('related_posts_img','関連記事(画像付)',array());}
    public function widget($args,$instance){echo $args['before_widget'];include(get_template_directory() . '/widget/related-post-img.php');echo $args['after_widget'];}
    public function form($instance){$title=!empty($instance['title']) ? $instance['title'] : '';?>
		<p>
		<label for="<?php echo $this->get_field_id('title');?>">title</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>">
		</p>
		<?php
	}
	public function update($new_instance,$old_instance){$instance=array();$instance['title']=(!empty($new_instance['title'])) ? strip_tags($new_instance['title']):'';return $instance;}
}

class post_nav_hover extends WP_Widget{
    function __construct(){parent::__construct('post_nav_hover','前後への記事のナビゲーション(hover)',array());}
    public function widget($args,$instance){
        $echo = '';
        $prev = get_previous_posts_link('◀');
        $next = get_next_posts_link('▶');
        if($prev){
            $echo .= '<div class="hide-nav-prev">' . $prev . '</div>';
        }
        if($next){
            $echo .= '<div class="hide-nav-next">' . $echo . '</div>';
        }
        echo $args['before_widget'] . $echo . $args['after_widget'];
    }
}

class post_comment extends WP_Widget{
    function __construct(){parent::__construct('post_comment','コメント',array());}
    public function widget($args,$instance){echo $args['before_widget'];comments_template('/widget/comment.php');echo $args['after_widget'];}
    public function form($instance){$title=!empty($instance['title']) ? $instance['title'] : '';?>
		<p>
		<label for="<?php echo $this->get_field_id('title');?>">title</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>">
		</p>
		<?php
	}
	public function update($new_instance,$old_instance){$instance=array();$instance['title']=(!empty($new_instance['title'])) ? strip_tags($new_instance['title']):'';return $instance;}
}

class disqus_widget extends WP_Widget{
    function __construct(){parent::__construct('disqus_widget','Disqus',array());}
    public function widget($args,$instance){
        extract($instance);
        echo $args['before_widget'] .
        '<div id="disqus_thread"></div>
        <script>(function(){var d=document,s=d.createElement("script");s.src="//' . $id . '.disqus.com/embed.js";s.setAttribute("data-timestamp",+new Date());(d.head||d.body).appendChild(s);})();</script>
        <noscript><a href="https://disqus.com/?ref_noscript" rel="nofollow">Please enable JavaScript to view the comments powered by Disqus.</a></noscript>' .
        $args['after_widget'];
    }
    public function form($instance){$id=!empty($instance['id']) ? $instance['id'] : '';?>
		<p>
		<label for="<?php echo $this->get_field_id('id');?>">ID</label>
		<input class="widefat" id="<?php echo $this->get_field_id('id');?>" name="<?php echo $this->get_field_name('id');?>" type="text" value="<?php echo esc_attr($id);?>">
		</p>
		<?php
	}
	public function update($new_instance,$old_instance){$instance=array();$instance['id']=(!empty($new_instance['id'])) ? strip_tags($new_instance['id']):'';return $instance;}
}

class duck_duck_go_search_widget extends WP_Widget{
    function __construct(){parent::__construct('duck_duck_go_search_widget','DuckDuckGo 検索',array());}
    public function widget($args,$instance){
        echo $args['before_widget'] .
        '<form action="https://duckduckgo.com/" role="search">
            <input name="sites" type="hidden" value="' . esc_url(substr(home_url('','http'),6)) . '">
            <input name="q" type="search" required label="キーワード">
            <input type="submit" value="Search" label="検索">
        </form>'
        . $args['after_widget'];
    }
}

class google_search_widget extends WP_Widget{
    function __construct(){parent::__construct('google_search_widget','Google 検索',array());}
    public function widget($args,$instance){
        extract($instance);
        echo $args['before_widget'] .
        "<script>(function(){var cx = '" . $cx . "';var gcse = document.createElement('script');gcse.type = 'text/javascript';gcse.async = true;gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(gcse, s);})();</script>
        <gcse:search></gcse:search>"
        . $args['after_widget'];
    }
    public function form($instance){$cx=!empty($instance['cx']) ? $instance['cx'] : '';?>
		<p>
		<label for="<?php echo $this->get_field_id('cx');?>">cx</label>
		<input class="widefat" id="<?php echo $this->get_field_id('cx');?>" name="<?php echo $this->get_field_name('cx');?>" type="text" value="<?php echo esc_attr($cx);?>">
		</p>
		<?php
	}
	public function update($new_instance,$old_instance){$instance=array();$instance['cx']=(!empty($new_instance['cx'])) ? strip_tags($new_instance['cx']):'';return $instance;}
}

class google_search_ads_widget extends WP_Widget{
    function __construct(){parent::__construct('google_search_ads_widget','Google 検索 with Ads',array());}
    public function widget($args,$instance){
        extract($instance);
        echo $args['before_widget'] .
        '<form action="http://www.google.co.jp/cse" id="cse-search-box" target="_blank" role="searc﻿h﻿">
            <div>
                <input type="hidden" name="cx" value="partner-pub-' . $id . '">
                <input type="hidden" name="ie" value="UTF-8">
                <input type="text" name="q" size="55" label="キーワード">
                <input type="submit" name="sa" value="検索" label="検索">
            </div>
        </form>
        <script src="//www.google.co.jp/coop/cse/brand?form=cse-search-box&amp;lang=ja"></script>'
        . $args['after_widget'];
    }
    public function form($instance){$id=!empty($instance['id']) ? $instance['id'] : '';?>
		<p>
		<label for="<?php echo $this->get_field_id('id');?>">id</label>
		<input class="widefat" id="<?php echo $this->get_field_id('id');?>" name="<?php echo $this->get_field_name('id');?>" type="text" value="<?php echo esc_attr($id);?>">
		</p>
		<?php
	}
	public function update($new_instance,$old_instance){$instance=array();$instance['id']=(!empty($new_instance['id'])) ? strip_tags($new_instance['id']):'';return $instance;}
}

class google_two_ads_widget extends WP_Widget{
    function __construct(){parent::__construct('google_two_ads_widge','Google Adsense x2',array());}
    public function widget($args,$instance){
        extract($instance);
        echo $args['before_widget'] .
        '<div id="adsense" itemscope itemtype="https://schema.org/WPAdBlock">
            <p class="ad-label" itemprop="headline name">' . $label . '</p>
            <aside id="rectangle" itemprop="about">
                <div class="ad-1">
        			<div class="textwidget">
                        <script async  src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-' . $client . '" data-ad-slot="' . $slot . '" data-ad-format="rectangle"></ins>
                        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
                    </div>
        		</div>
                <div class="ad-2">
        			<div class="textwidget">
                        <script async  src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-' . $client . '" data-ad-slot="' . $slot . '" data-ad-format="rectangle"></ins>
                        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
                    </div>
        		</div>
            </aside>
        </div>'
        . $args['after_widget'];
    }
    public function form($instance){
        $label=!empty($instance['label']) ? $instance['label'] : '';
        $client=!empty($instance['client']) ? $instance['client'] : '';
        $slot=!empty($instance['slot']) ? $instance['slot'] : '';?>
    		<p>
        		<label for="<?php echo $this->get_field_id('label');?>">label</label>
        		<input class="widefat" id="<?php echo $this->get_field_id('label');?>" name="<?php echo $this->get_field_name('label');?>" type="text" value="<?php echo esc_attr($label);?>">
        		<label for="<?php echo $this->get_field_id('client');?>">client</label>
        		<input class="widefat" id="<?php echo $this->get_field_id('client');?>" name="<?php echo $this->get_field_name('client');?>" type="text" value="<?php echo esc_attr($client);?>">
        		<label for="<?php echo $this->get_field_id('slot');?>">slot</label>
        		<input class="widefat" id="<?php echo $this->get_field_id('slot');?>" name="<?php echo $this->get_field_name('slot');?>" type="text" value="<?php echo esc_attr($slot);?>">
    		</p>
    	<?php
	}
	public function update($new_instance,$old_instance){
        $instance=array();
        $instance['label']  = (!empty($new_instance['label'])) ? strip_tags($new_instance['label']) : '';
        $instance['client'] = (!empty($new_instance['client'])) ? strip_tags($new_instance['client']) : '';
        $instance['slot']   = (!empty($new_instance['slot'])) ? strip_tags($new_instance['slot']) : '';
        return $instance;
    }
}

class google_translate_widget extends WP_Widget{
    function __construct(){parent::__construct('google_translate_widget','Google 翻訳',array());}
    public function widget($args,$instance){
        extract($instance);
        if($analytics_id===''){
            $analytics = 'gaTrack: false';
        }else{
            $analytics = ' gaTrack: true, gaId: "' . $analytics_id . '"';
        }
        echo $args['before_widget'] .
        '<div id="google_translate_element"></div>
        <script>
            function googleTranslateElementInit(){
                new google.translate.TranslateElement(
                    {
                        pageLanguage: "' . $lang . '",
                        layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL,
                        ' . $analytics . '
                    },
                    "google_translate_element"
                );
            }
        </script>
        <script async="" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>'
        . $args['after_widget'];
    }
    public function form($instance){
        $lang         =!empty($instance['lang']) ? $instance['lang'] : '';
        $analytics_id =!empty($instance['analytics_id']) ? $instance['analytics_id'] : '';?>
		<p>
    		<label for="<?php echo $this->get_field_id('lang');?>">言語</label>
    		<input class="widefat" id="<?php echo $this->get_field_id('lang');?>" name="<?php echo $this->get_field_name('lang');?>" type="text" value="<?php echo esc_attr($lang);?>">
            <label for="<?php echo $this->get_field_id('analytics_id');?>">Google アナリティクス ID</label>
    		<input class="widefat" id="<?php echo $this->get_field_id('analytics_id');?>" name="<?php echo $this->get_field_name('analytics_id');?>" type="text" value="<?php echo esc_attr($analytics_id);?>">
		</p>
		<?php
	}
	public function update($new_instance,$old_instance){$instance=array();$instance['lang']=(!empty($new_instance['lang'])) ? strip_tags($new_instance['lang']):'';$instance['analytics_id']=(!empty($new_instance['analytics_id'])) ? strip_tags($new_instance['analytics_id']):'';return $instance;}
}

class sns_follow extends WP_Widget{
    function __construct(){parent::__construct('sns_follow','バイラル風SNSフォローウィジェット',array());}
    public function widget($args,$instance){
        echo $args['before_widget'];include(get_template_directory() . '/widget/sns-follow.php');echo $args['after_widget'];
    }
}

class sns_share extends WP_Widget{
    function __construct(){parent::__construct('sns_share','SNS シェアボタン',array());}
    public function widget($args,$instance){
        echo $args['before_widget'];
        include(get_template_directory() . '/widget/sns-share.php');
        echo $args['after_widget'];
    }
    public function form($instance){
        $title=!empty($instance['title']) ? $instance['title'] : '';?>
		<p>
		<label for="<?php echo $this->get_field_id('title');?>">title</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>">
		</p>
		<?php
	}
	public function update($new_instance,$old_instance){$instance=array();$instance['title']=(!empty($new_instance['title'])) ? strip_tags($new_instance['title']):'';return $instance;}
}

function wkwkrnht_search_form($form){
    $tags     = get_tags();
    $tag_echo = '';
    foreach($tags as $tag){$tag_echo .= '<option value="' . esc_html($tag->slug) . '">' . esc_html($tag->name) . '</option>';}
    $form = '
    <aside id="search" class="search-form role="searc﻿h﻿">
        <form method="get" action="' . home_url() . '">
            <input name="s" id="s" type="text" label="キーワード" title="キーワード"><br>'
            . wp_dropdown_categories('depth=0&orderby=name&echo=0&hide_empty=1&show_option_all=カテゴリー')
            . wp_dropdown_categories('depth=0&orderby=name&echo=0&hide_empty=1&show_option_all=タグ&taxonomy=post_tag')
            . '<button type="submit" label="検索" title="検索" id="submit" class="fa fa-search">検索</button>
        </form>
    </aside>';
    return $form;
}
add_filter('get_search_form','wkwkrnht_search_form');

add_filter('widget_meta_poweredby','__return_empty_string');
add_action('wp_meta','wkwkrnht_meta_widget');
function wkwkrnht_meta_widget(){ ?>
    <li>
        <a href="<?php echo esc_url(home_url());?>/wp-admin/post-new.php" target="_blank" rel="noopener" title="addpost" tabindex="0">
            <span class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></span>
        </a>
    </li>
    <?php if(is_singular()===true):
        $id      = '';
        $homeurl = '';
        if(is_ssl()===true){
            $homeurl = substr(home_url(),5);
        }else{
            $homeurl = substr(home_url(),4);
        }
        if(have_posts()){
            while(have_posts()):
                the_post();
                $id = get_the_ID();
            endwhile;
        }?>
        <li>
            <?php edit_post_link();?>
        </li>
        <li>
            <a href="<?php echo'wlw' . $homeurl . '/?postid=' . $id;?>" title="wlwedit" tabindex="0">
                <span class="fa fa-windows fa-2x" aria-hidden="true"><span class="fa fa-pencil" aria-hidden="true"></span></span>
            </a>
        </li>
    <?php endif;
}

function autoblank($text){
	$return = str_replace('<a','<a target="_blank" rel="noopener"',$text);
	return $return;
}
add_filter('comment_text','autoblank');
add_filter('comments_open','custom_comment_tags');
add_filter('pre_comment_approved','custom_comment_tags');
function custom_comment_tags($data){
	global $allowedtags;
    $allowedtags['style'] = array('class'=>array());
    $allowedtags['code']  = array('class'=>array());
    $allowedtags['pre']   = array('class'=>array());
	return $data;
}

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
                $value    = 'https://www.instagram.com/' . $value;
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
                $value     = 'https://www.ustream.tv/channel/' . $value;
                break;
            case 'Skype':
                $fw_class = 'fa-skype';
                break;
            case 'Blogger':
                $character = 'B';
                $value     = 'https://' . $value . 'blogspot.jp/';
                break;
            case 'WordPressCOM':
                $fw_class = 'fa-wordpress';
                $value    = 'https://' . $value . 'wordpress.com/';
                break;
            case 'WordPressORG':
                $fw_class = 'fa-wordpress';
                $value    = 'https://profiles.wordpress.org/' . $value;
                break;
            case 'Tumblr':
                $fw_class = 'fa-tumblr-square';
                $value    = 'https://' . $value . 'tumblr.com/';
                break;
            case 'Medium':
                $fw_class = 'fa-medium';
                $value    = 'https://medium.com/@' . $value;
                break;
            case 'note':
                $character = 'n';
                $value    = 'https://note.mu/' . $value;
                break;
            case 'mixi':
                $character = 'm';
                break;
            case 'hatebu':
                $character = 'B!';
                break;
            case 'Pinterest':
                $fw_class = 'fa-pinterest-square';
                $value    = 'https://www.pinterest.jp/' . $value;
                break;
            case 'Spotify':
                $fw_class = 'fa-spotify';
                break;
            case 'SoundCloud':
                $fw_class = 'fa-soundcloud';
                break;
            case 'Flickr':
                $fw_class = 'fa-flickr';
                $value    = 'https://www.flickr.com/people/' . $value;
                break;
            case 'FourSquare':
                $fw_class = 'fa-foursquare';
                break;
            case 'Steam':
                $fw_class = 'fa-steam-square';
                $value    = 'https://steamcommunity.com/id/' . $value;
                break;
            case 'UPlay':
                $character = 'U';
                $value    = 'https://club.ubisoft.com/ja-JP/profile/' . $value;
                break;
            case 'Qiita':
                $character = 'Q';
                $value    = 'https://qiita.com/' . $value;
                break;
            case 'Codepen':
                $fw_class = 'fa-codepen';
                $value    = 'https://codepen.io/' . $value;
                break;
            case 'Github':
                $fw_class = 'fa-github';
                $value    = 'https://github.com/' . $value;
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