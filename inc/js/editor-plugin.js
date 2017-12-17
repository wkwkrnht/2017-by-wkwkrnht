jQuery(function($){
    function catFilter(header,list){
        var form = jQuery('<form>').attr({'class':'filterform','action':'#'}).css({'position':'absolute','top':'3vmin'}),
        input = jQuery('<input>').attr({'class':'filterinput','type':'text','placeholder':'カテゴリー検索'});
        jQuery(form).append(input).appendTo(header);
        jQuery(header).css({'padding-top':'3.5vmin'});
        jQuery(input).change(function(){
            var filter = jQuery(this).val();
            if(filter){
                jQuery(list).find('label:not(:contains('+filter+'))').parent().hide();
                jQuery(list).find('label:contains('+filter+')').parent().show();
            } else {
                jQuery(list).find('li').show();
            }return false;
        }).keyup(function(){
            jQuery(this).change();
        });
    }
    jQuery(function(){
        catFilter(jQuery('#category-all'),jQuery('#categorychecklist'));
    });
});
jQuery(function($){
    var count = 120;
    jQuery('#postexcerpt .hndle span').after('<span style=\"padding-left:1em;color:#888;\">現在の文字数： <span id=\"excerpt-count\"></span> / '+ count +'</span>');
    jQuery('#excerpt-count').text($('#excerpt').val().length);
    jQuery('#excerpt').keyup(function(){
        jQuery('#excerpt-count').text(jQuery('#excerpt').val().length);
        if(jQuery(this).val().length > count){
            jQuery(this).val(jQuery(this).val().substr(0,count));
        }
    });
    jQuery('#postexcerpt .inside p').html('※ここには <strong>"'+ count +'文字"</strong> 以上は入力できません。').css('color','#888');
});
jQuery(function($){
    if('post' == jQuery('#post_type').val() || 'page' == jQuery('#post_type').val()){
        jQuery("#post").submit(function(e){
            if('' == jQuery('#title').val()){
                alert('タイトルを入力してください！');
                jQuery('.spinner').hide();
                jQuery('#publish').removeClass('button-primary-disabled');
                jQuery('#title').focus();
                return false;
            }
        });
    }
});
(function(){
    for(var textareas=document.getElementsByTagName("textarea"),count=textareas.length,i=0;count>i;i++)textareas[i].onkeydown=function(t){
        if(9===t.keyCode||9===t.which){
            t.preventDefault();
            var e = this.selectionStart;
            this.value = this.value.substring(0,this.selectionStart)+"	"+this.value.substring(this.selectionEnd),this.selectionEnd=e+1
        }
    };
})();