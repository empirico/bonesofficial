<?
$lang = 'it';
$langs = array('it', 'en');
$posted_lang = @$_POST['lang'];
if (in_array($posted_lang, $langs)) {
    $lang = $posted_lang;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Bones & Comfort - index</title>
        <meta property="fb:page_id" content="52988616067" />
        <meta name="keywords" content="Bones &amp; Comfort, Music, Biography, Pictures, In Fat we Trust, Luca Romanò, Daniele Murroni, Alberto Trentanni" />    <link href="/css/bones/jquery-ui-1.8.4.custom.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="/css/slider.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="/css/prettyPhoto.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="/css/scrollable-horizontal.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="/css/scrollable-buttons.css" media="screen" rel="stylesheet" type="text/css" />        <script type="text/javascript">
            var lang = '<? $lang ?>';
        </script>
        <script src="http://cdn.jquerytools.org/1.2.5/full/jquery.tools.min.js"></script>
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
        <div class="navi" id="menu">
            <a href="#index">index</a>
            <a href="#bio">bio</a>
            <a href="#music">music</a>
            <a href="#contact">contact</a>
        </div>
        <div id="content">
            <div id="mainpanel">
                <div class="items">
                    <div id="" class="page_content"><img src="/images/frontpage.jpg" alt="Bones &amp; comfort" border="0" width="840"></div>
                    <div id="" class="page_content"><? include_once('bio.php') ?></div>
                    <div id="" class="page_content"><? include_once('music.php') ?></div>
                    <div id="" class="page_content"><? include_once('contacts.php') ?></div>
                </div>
            </div>
        </div>


    </body>
</html>
