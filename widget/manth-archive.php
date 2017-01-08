<style>
    .widget_wkwkrnht_manth_archive > ul{
        list-style:none;
    }
    .widget_wkwkrnht_manth_archive > ul > .list-year{
        margin:1em 0;
    }
    .widget_wkwkrnht_manth_archive > ul > .list-year > h3{
        background-color:<?php echo get_option('manth_archive_year_background','#03a9f4');?>;
        display:inline-block;
        height:100%;
        text-align:center;
        width:calc(30% - 1vmin);
    }
    .widget_wkwkrnht_manth_archive > ul > .list-year > h3 > a{
        color:<?php echo get_option('manth_archive_year_h3_color','#fff');?>;
        font-size:1.8rem;
        text-decoration:none;
    }
    .widget_wkwkrnht_manth_archive > ul > .list-year > .article-list{
        box-sizing:border-box;
        display:inline-block;
        list-style:none;
        padding:.75em 2em;
        width:70%;
    }
    .widget_wkwkrnht_manth_archive > ul > .list-year > .article-list > li{
        display:inline-block;
        font-size:1.6rem;
        height:2em;
        text-align:center;
        width:4.5em;
    }
    .widget_wkwkrnht_manth_archive > ul > .list-year > .article-list > li > a{
        text-decoration:none;
    }
</style>
<?php
$echo          = '';
$archives_year = strip_tags(wp_get_archives('type=yearly&show_count=0&format=custom&echo=0'));
$archives_year = explode("\n",$archives_year);
array_pop($archives_year);

$archives = wp_get_archives('type=monthly&show_post_count=1&use_desc_for_title=0&echo=0');
$archives = explode("\n",$archives);

echo'<ul>';
foreach($archives_year as $year_value){
    echo'<li class="list-year"><h3><a href="' . esc_url(home_url()) . '/' . ltrim($year_value) . '" tabindex="0">' . ltrim($year_value) . '年</a></h3>';
    foreach($archives as $archives_value){if(intval(strip_tags($archives_value)) == intval($year_value)){$echo .= str_replace(intval($year_value) . '年','',ltrim($archives_value));}}
    echo'<ul class="article-list">' . $echo . '</ul></li>';
}
echo'</ul>';
?>
