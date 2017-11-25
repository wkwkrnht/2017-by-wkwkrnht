        </main>
        <?php if(has_nav_menu('social')===true||has_nav_menu('main')===true||is_active_sidebar('floatmenu')===ture):?>
            <aside id="menu-wrap" class="none" aria-hidden="true">
                <?php if($social_menu===true):?>
                    <nav class="social-nav">
                        <?php wp_nav_menu(array('theme_location'=>'social','container'=>false,'items_wrap'=>'<ul id="%1$s" class="%2$s" itemscope itemtype="http://schema.org/SiteNavigationElement">%3$s</ul>'));?>
                    </nav>
                <?php endif;?>
                <?php if($main_nav===true):?>
                    <nav class="main-nav">
                        <?php wp_nav_menu(array('theme_location'=>'main','container'=>false,'items_wrap'=>'<ul id="%1$s" class="%2$s" itemscope itemtype="http://schema.org/SiteNavigationElement">%3$s</ul>'));?>
                    </nav>
                <?php endif;?>
                <?php if($main_menu===true):?>
                    <ul class="widget-area">
                        <?php dynamic_sidebar('floatmenu');?>
                    </ul>
                <?php endif;?>
            </aside>
            <a href="javascript:void(0)" id="menu-toggle" tabindex="0" role="button" title="メニューウィンドウの切り替えボタン">+</a>
        <?php
        endif;
        wp_footer();
        if(has_class('highlight-js')===true):?>
            <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.10.0/styles/default.min.css">
            <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.10.0/highlight.min.js"></script>
        <?php endif;
        if(get_post_format()==='link'):?>
            <script async="" src="//cdn.embedly.com/widgets/platform.js"></script>
        <?php endif;?>
        <script src="<?php get_parent_theme_file_path('/inc/script.php');?>"></script>
        <?php
        $txt = get_option('footer_txt');
        if(has_class('night_mode')===true){
            echo'<style>';
                include_once(get_parent_theme_file_path('/css/night-mode.php'));
            echo'</style>';
        }
        if($txt!==false){
            echo $txt;
        }?>
    </body>
</html>