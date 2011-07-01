//TEST
function activate_ajaxLinks() {

    $(".ajaxLink").unbind('click').click(function(){
		src = '<img src="/images/loading.gif" widht="24" height="24" style="margin:10px 50%"/>';
		$('#content').html(src);
		$('#content').load($(this).attr('rel'));
	});
    
}
function activate_emails() {
	  info =  "bonesrock";
	  info += "@" ;
	  info += "gmail" + ".com"
	  booking = "booking";
	  booking += "@";
	  booking += "bonesofficial.com";

	  $("a#booking").attr('href', "mailto:" + booking).html(booking);
	  $("a#mail_info").attr('href', "mailto:" + info).html(info);
}
$.easing.custom = function (x, t, b, c, d) {
	var s = 1.0; 
	if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
	return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
}

$(document).ready(function(){
   $("#mainpanel").scrollable({
       speed: 800,
       circular: true,
       easing: 'custom'
   }).navigator({
       navi: '#menu',
       naviItem: 'a'
    }); 
});
