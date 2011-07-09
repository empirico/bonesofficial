<?
$lang = 'it';
$langs = array('it', 'en');
$posted_lang = @$_POST['lang'];
if (in_array($posted_lang, $langs)) {
    $lang = $posted_lang;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> 
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Bones & Comfort - index</title>
        <meta property="fb:page_id" content="52988616067" />
        <meta name="keywords" content="Bones &amp; Comfort, Music, Biography, Pictures, In Fat we Trust, Luca Romanò, Daniele Murroni, Alberto Trentanni" />    <link href="/css/bones/jquery-ui-1.8.4.custom.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="/css/style.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="/css/slider.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="/css/prettyPhoto.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="/css/scrollable-horizontal.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="/css/scrollable-buttons.css" media="screen" rel="stylesheet" type="text/css" />        <script type="text/javascript">
            var lang = '<? $lang ?>';
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/js/default.js"></script> 
        <script type="text/javascript">
	
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-12833462-1']);
            _gaq.push(['_trackPageview']);
	
            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

        </script>
    </head>	    
    <body>
        <div id="background_container"><img src="images/main_background.jpg" width="100%"></div>
        <div id="wrapper">
             <div id="content">
              <div id="bio" class="panel"><? include('bio.php')?></div>
              <div id="music" class="panel"><? include('music.php')?></div>
              <div id="contacts" class="panel"><? include('contacts.php')?></div>
              <div id="menubar">
                    <div id="menu">
                        <a href="#" onclick="javascript:$('#bio').toggle( 'slide', {direction: 'down'} )">Music</a>
                        <a href="#" onclick="javascript:$('#music').toggle( 'slide', {direction: 'down'} )">Bio</a>
                        <a href="#" onclick="javascript:$('#contacts').toggle( 'slide', {direction: 'down'} )">Contact</a>
                        
                    </div>
              </div>  
            </div>
            

        </div>
    </body>
</html>
