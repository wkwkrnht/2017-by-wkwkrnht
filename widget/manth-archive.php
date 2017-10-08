<?php
$echo          = '';
$year          = '';
$archives_year = strip_tags(wp_get_archives('type=yearly&show_count=0&format=custom&echo=0'));
$archives_year = explode("\n",$archives_year);
array_pop($archives_year);

$archives = wp_get_archives('type=monthly&show_post_count=1&use_desc_for_title=0&echo=0');
$archives = explode("\n",$archives);

foreach($archives_year as $year_value){
    foreach($archives as $archives_value){
        if(intval(strip_tags($archives_value)) == intval($year_value)){
            $year .= str_replace(intval($year_value) . '年','',ltrim($archives_value));
        }
    }
    $echo .= '
    <li class="list-year">
        <h3>
            <a href="' . esc_url(home_url()) . '/' . ltrim($year_value) . '" tabindex="0">'
                . ltrim($year_value) . '年
            </a>
        </h3>
        <ul class="article-list">'
            . $year .
        '</ul>
    </li>';
}
echo'<ul>' . $echo . '</ul>';?>