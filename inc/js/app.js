"use strict";
function getCookie(key){
    let s, e;
    let c = document.cookie + ";";
    let b = c.indexOf(key,0);
    if (b != -1) {
        c = c.substring(b,c.length);
        s = c.indexOf("=",0) + 1;
        e = c.indexOf(";",s);
        return(unescape(c.substring(s,e)));
    }
    return("");
}
function setCookie(key,n){
    let myDate = new Date();
    myDate.setTime(myDate.getTime() + 30 * 24 * 60 * 60 * 1000);
    document.cookie = "key=" + escape(key) + escape(n) + ";expires=" + myDate.toGMTString() + ";";
}
(function(){
    const key = location.hostname;
    let n = getCookie(key);
    if (n == "") {
        +n;
        if(window.confirm("このサイトでは、よりよいサイト運営のためにCookieを使用しています。そこでお預かりした情報は、各提携先と共有する場合があります。ご了承ください。")){
            n++;
            setCookie(key,n);
            return;
        } else {
            window.back();
        }
    } else {
        n++;
        setCookie(key,n);
        return;
    }
})();
(function(){
    const wpCss = document.getElementById("wpcss");
    if (wpCss === null) {
        return;
    }
    const wpCssL = wpCss.length;
    for ( let i = 0; i < wpCssL; i++ ) {
        let wpStyle = document.createElement("style");
        wpStyle.textContent = wpCss[i].textContent.replace(/\s{2,}/g,"");
        document.head.appendChild(wpStyle);
    }
})();
(function(){
    document.getElementById("menu-toggle").onclick = function(){
        document.getElementById("menu-wrap").classList.toggle("none");
        document.getElementById("menu-wrap").classList.toggle("block");
        let attr = document.getElementById("menu-wrap").attributes;
        if (attr['aria-hidden'].value == "true") {
            document.getElementById("menu-wrap").setAttribute("aria-hidden","false");
        } else {
            document.getElementById("menu-wrap").setAttribute("aria-hidden","true");
        }
    }
})();
function linkStyled(){
    const targets = document.querySelectorAll(".format-link .article-main a");
    const length = targets.length;
    for ( let i = 0; i < length; i++ ) {
        let target = targets[i];
        target.classList.add("embedly-card");
    }
}