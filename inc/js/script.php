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
<?php if(has_class('ba-slider')===true):?>
    jQuery(document).ready(function(){
        jQuery('.ba-slider').each(function(){
            let cur = jQuery(this);
            // Adjust the slider
            let width = cur.width() + 'px';
            cur.find('.resize img').css('width', width);
            // Bind dragging events
            drags(cur.find('.handle'), cur.find('.resize'), cur);
        });
    });
    // Update sliders on resize.
    // Because we all do this: i.imgur.com/YkbaV.gif
    jQuery(window).resize(function(){
        jQuery('.ba-slider').each(function(){
            let cur = jQuery(this);
            let width = cur.width() + 'px';
            cur.find('.resize img').css('width', width);
        });
    });
    function drags(dragElement, resizeElement, container) {
        // Initialize the dragging event on mousedown.
        dragElement.on('mousedown touchstart', function(e) {
            dragElement.addClass('draggable');
            resizeElement.addClass('resizable');
            // Check if it's a mouse or touch event and pass along the correct value
            let startX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;
            // Get the initial position
            let dragWidth = dragElement.outerWidth(),
            posX = dragElement.offset().left + dragWidth - startX,
            containerOffset = container.offset().left,
            containerWidth = container.outerWidth();
            // Set limits
            minLeft = containerOffset + 10;
            maxLeft = containerOffset + containerWidth - dragWidth - 10;
            // Calculate the dragging distance on mousemove.
            dragElement.parents().on("mousemove touchmove", function(e) {
                // Check if it's a mouse or touch event and pass along the correct value
                let moveX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;
                leftValue = moveX + posX - dragWidth;
                // Prevent going off limits
                if ( leftValue < minLeft) {
                    leftValue = minLeft;
                } else if (leftValue > maxLeft) {
                    leftValue = maxLeft;
                }
                // Translate the handle's left value to masked divs width.
                widthValue = (leftValue + dragWidth/2 - containerOffset)*100/containerWidth+'%';
                // Set the new values for the slider and the handle.
                // Bind mouseup events to stop dragging.
                jQuery('.draggable').css('left', widthValue).on('mouseup touchend touchcancel', function () {
                    jQuery(this).removeClass('draggable');
                    resizeElement.removeClass('resizable');
                });
                jQuery('.resizable').css('width', widthValue);
            }).on('mouseup touchend touchcancel', function(){
                dragElement.removeClass('draggable');
                resizeElement.removeClass('resizable');
            });
            e.preventDefault();
        }).on('mouseup touchend touchcancel', function(e){
            dragElement.removeClass('draggable');
            resizeElement.removeClass('resizable');
        });
    }
<?php endif;?>