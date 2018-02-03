<?php
$home          = esc_url(home_url());
$archives_year = strip_tags(wp_get_archives('type=yearly&show_count=0&format=custom&echo=0'));
$archives_year = explode("\n",$archives_year);
array_pop($archives_year);

$archives = wp_get_archives('type=monthly&show_post_count=1&use_desc_for_title=0&echo=0');
$archives = explode("\n",$archives);

foreach($archives_year as $year_value){
    foreach($archives as $archives_value){
        $year_int = intval($year_value);
        if(intval(strip_tags($archives_value)) == $year_int){
            $year_body .= str_replace($year_int . '年','',ltrim($archives_value));
        }
    }
    $year_echo = ltrim($year_value);
    $echo     .= '
    <li class="year-list">
        <h3 class="year-tite">
            <a href="' . $home . '/' . $year_echo . '" title="' . $year_echo . '年" tabindex="0">'
                . $year_echo . '年
            </a>
        </h3>
        <ul class="article-list">'
            . $year_body .
        '</ul>
    </li>';
}
echo'<ul>' . $echo . '</ul>';?>