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
        $(this).css('opacity','.8');
    }).mouseout(function(){
        $(this).css('opacity','1');
    });
}

$(document).ready(function(){
    activate_emails();
    activate_mouseover();
});
