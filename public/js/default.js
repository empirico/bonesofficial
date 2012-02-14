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

var boot = { index: function(){
			   activate_ajaxLinks();

			    $("a[rel^='bonesGallery']").prettyPhoto({animationSpeed:'fast',slideshow:10000});
			},
			photos : function(){
				//alert('IM BOOTING PHOTOS');
				$("a[rel^='bonesPhotogallery']").prettyPhoto({animationSpeed:'fast',slideshow:10000});
			}
		};



$(document).ready(function(){
    boot.index();
    boot.photos();
   	// initialize scrollable
	$("#home_scroller").scrollable({circular: true}).autoscroll({
        interval: 5000
    }).navigator();


});
