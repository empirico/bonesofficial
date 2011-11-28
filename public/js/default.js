//TEST
function activate_ajaxLinks() {
    $(".ajaxLink").unbind('click').click(function(){
        src = '<img src="/images/loading.gif" widht="24" height="24" style="margin:10px 50%"/>';
        $('#content').html(src);
        $('#content').load($(this).attr('rel'));
    });
}

function activate_emails() {
    info =  "info";
    info += "@" ;
    info += "welovelheart" + ".it"
    //$("a#booking").attr('href', "mailto:" + booking).html(booking);
    $("a#mail_info").attr('href', "mailto:" + info).html(info);
}

function activate_mouseover(){
    $(".work-item-thumb, .work-gallery-thumb").mouseover(function(){
        $(this).css('opacity','1');
    }).mouseout(function(){
        $(this).css('opacity','.8');
    });
}

var boot = {
    index: function(){
        $('#slideshow').cycle({
            fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
            speed: 500
        });
        activate_ajaxLinks();

        $("a[rel^='bonesGallery']").prettyPhoto({
            animationSpeed:'fast',
            slideshow:10000
        });
    },
    photos : function(){
        //alert('IM BOOTING PHOTOS');
        $("a[rel^='bonesPhotogallery']").prettyPhoto({
            animationSpeed:'fast',
            slideshow:10000
        });
    }
};

$(document).ready(function(){
    boot.index();
    activate_emails();
    activate_mouseover();
});
