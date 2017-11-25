        </main>
        <?php
        $main_menu   = is_active_sidebar('floatmenu');
        $social_menu = has_nav_menu('social');
        $main_nav    = has_nav_menu('main');
        $night_mode  = '<script>document.write(nightMode);</script>';
        if($main_nav===true||$social_menu===true||$main_menu===ture):?>
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
        <?php endif;?>
        <script src="<?php echo get_template_directory_uri();?>/inc/script.php"></script>
        <style>
            <?php
            wkwkrnht_load_style();?>
        </style>
        <?php
        wp_footer();
        if(has_class('highlight-js')===true):?>
            <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.10.0/styles/default.min.css">
            <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.10.0/highlight.min.js" onload="hljs.initHighlightingOnLoad();"></script>
        <?php endif;?>
        <?php if(get_post_format()==='link'):?>
            <script src="//cdn.embedly.com/widgets/platform.js" onload="linkStyled();"></script>
        <?php endif;
        $txt = get_option('footer_txt');
        if($txt!==false){
            echo $txt;
        }?>
    </body>
</html>