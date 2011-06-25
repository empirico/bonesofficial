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

var boot = {index: function(){
				
		}
    };



$(document).ready(function(){
  // initialize scrollable
    $('#bio').load('/' + lang + "/biography/",
    function(){
        $('#music').load('/' + lang + "/music/", function(){
            $('#contact').load('/' + lang + "/contacts/", function(){
               $(".scrollable").scrollable(); 
            });
        });
    });
});
