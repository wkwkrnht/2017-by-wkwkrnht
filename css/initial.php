:root{
    color:<?php echo $root_color;?>;
    font:400 62.5%/1.9 -apple-system,"Lucida Grande","Helvetica Neue","Hiragino Kaku Gothic ProN","游ゴシック","メイリオ",'Meiryo',sans-serif;
    font-feature-settings:"pkna" on;
}
body{
    padding-bottom:20vh;
    scroll-behavior:smooth;
    width:100%;
}
body > *{
    max-width:100%;
}
body,button,input,select,textarea,.vcard,.fn,.author{
    margin:0;
}
sub,sup,progress{
    vertical-align:baseline;
}
.none{
    display:none;
}
.block,details{
    display:block;
}
summary{
  display:list-item;
}
audio:not([controls]){
    display:none;
    height:0;
}
h1{
    font-size:2em;
    margin:.67em 0;
}
a{
    border-bottom:0;
    color:<?php echo get_option('a_color','#03a9f4');?>;
    -webkit-text-decoration-skip:objects;
    text-decoration:none;
}
a:visited{
    color:<?php echo get_option('a_visited_color','#03a9f4');?>;
}
a:active{
    color:<?php echo get_option('a_active_color','#03a9f4');?>;
}
abbr[title]{
    border-bottom:none;
    text-decoration:underline;
    text-decoration:underline dotted;
}
b,strong{
    font-weight:inherit;
    font-weight:bolder;
}
dfn{
    font-style:italic;
}
code,kbd,pre,samp{
    font-family:monospace,monospace;
    font-size:1em;
}
pre{
    tab-size:4;
}
mark{
    background-color:<?php echo get_option('mark_background','#ff0');?>;
    color:<?php echo get_option('mark_color','#000');?>;
}
small{
    font-size:80%;
}
sub,sup{
    font-size:75%;
    line-height:0;
    position:relative;
}
sub{
    bottom:-.25em;
}
sup{
    top:-0.5em;
}
img{
    -ms-interpolation-mode:bicubic;
    image-rendering:pixelated;
    object-fit:contain;
}
img[src$=".gif"],img[src$=".png"]{
    image-rendering:-moz-crisp-edges;
    image-rendering:-o-crisp-edges;
    image-rendering:-webkit-optimize-contrast;
    image-rendering:crisp-edges;
}
hr{
    box-sizing:content-box;
    height:0;
}
fieldset{
    border:1px solid silver;
    margin:0 2px;
    padding:.35em .625em .75em;
}
legend{
    box-sizing:border-box;
    display:table;
    max-width:100%;
    padding:0;
    white-space:normal;
}
hr,button,input{
    overflow:visible;
}
button,select{
    text-transform:none;
}
button,html [type="button"],[type="reset"],[type="submit"],::-webkit-file-upload-button{
    -webkit-appearance:button;
}
button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner{
    border-style:none;
    padding:0;
}
button:-moz-focusring,[type="button"]:-moz-focusring,[type="reset"]:-moz-focusring,[type="submit"]:-moz-focusring{
    outline:1px dotted ButtonText;
}
[type="number"]::-webkit-inner-spin-button,[type="number"]::-webkit-outer-spin-button{
    height:auto;
}
[type="search"]{
    -webkit-appearance:textfield;
    outline-offset:-2px;
}
[type="search"]::-webkit-search-cancel-button,[type="search"]::-webkit-search-decoration{
    -webkit-appearance:none;
}
::-webkit-input-placeholder{
    color:inherit;
    opacity:.54;
}
::-webkit-file-upload-button{
    font:inherit;
}
.screen-reader-text{
    clip:rect(1px,1px,1px,1px);
    clip-path:inset(50%);
    height:1px;
    overflow:hidden;
    position:absolute;
    width:1px;
    word-wrap:normal;
}
.screen-reader-text:focus{
    background-color:#eee;
    clip:auto;
    clip-path:none;
    color:#444;
    display:block;
    font-size:1em;
    height:auto;
    left:5px;
    padding:15px 23px 14px;
    text-decoration:none;
    top:5px;
    width:auto;
    z-index:100000;
}