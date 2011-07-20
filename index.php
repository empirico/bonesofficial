<?
$lang = 'en';
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
        <title>Bones & Comfort - Official web Site</title>
        <meta property="fb:page_id" content="52988616067" />
        <meta name="keywords" content="Stoner, southern, hard rock, fuzz, overdrive, brunetti, orange, tamburo, Bones, Comfort, Music, Biography, myspace, In Fat we Trust, Luca Romanò, Daniele Murroni, Alberto Trentanni" />    
        <META name="Description" content="Enter the world of Bones & Comfort, Souther stoner band from milan, italy. Lot of Groove and Heavy Riffs at your service."/>
        <link href="/css/bones/jquery-ui-1.8.4.custom.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="/css/style.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="/css/slider.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="/css/prettyPhoto.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="/css/scrollable-horizontal.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="/css/scrollable-buttons.css" media="screen" rel="stylesheet" type="text/css" />        <script type="text/javascript">
            var lang = '<? $lang ?>';
        </script>
        <script src="http://cdn.jquerytools.org/1.2.5/full/jquery.tools.min.js"></script>
        <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
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
        <div id="logo">&nbsp;</div>
        <div id="content">
            <div id="header">
                <div class="navi" id="menu">
                    <a href="#index" onclick="javascript:_gaq.push(['_trackPageview', 'index']);">index</a>
                    <a href="#bio" onclick="javascript:_gaq.push(['_trackPageview', 'bio']);">bio</a>
                    <a href="#music" onclick="javascript:_gaq.push(['_trackPageview', 'music']);">music</a>
                </div>
            </div>
            <div id="mainpanel">
                <div class="items">
                    <div id="index" class="page_content"><img src="/images/frontpage.jpg" alt="Bones &amp; comfort" border="0" width="840"></div>
                    <div id="" class="page_content"><? include_once('bio.php') ?></div>
                    <div id="" class="page_content"><? include_once('music.php') ?></div>
                </div>
            </div>
            <div id="aside">
                    <g:plusone count="true" size="tall" href="http://www.bonesofficial.com/"></g:plusone>
                    <div style="height: 10px"></div>
                    <div id="fblike">
                        <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=190551664332051&amp;xfbml=1"></script><fb:like href="http://www.bonesofficial.com" send="false" layout="box_count" width="400" show_faces="false" font="trebuchet ms"></fb:like>
            </div>  </div>
            <div id="footer" class="clear">
                <div id="external_links">
                    <a target="_blank" href="http://www.facebook.com/pages/Bones-Comfort/52988616067" alt="facebook"><img title="facebook" src="/images/facebook_32.png" border="0" height="32" width="32"></a>
                    <a target="_blank" href="http://www.lastfm.it/music/Bones%2B%2526%2BComfort" alt="last-fm"><img title="last-fm" src="/images/lastfm_32.png" border="0" height="32" width="32"></a>
                    <a target="_blank" href="http://www.myspace.com/bonesofficial" alt="myspace"><img title="myspace" src="/images/myspace_32.png" border="0" height="32" width="32"></a>
                    <a target="_blank" href="http://bonescomfort.bandcamp.com/" alt="bandcamp"><img title="bandcamp" src="/images/bandcamp_32.png" border="0" height="32" width="32"></a>
                </div>
                <div class="right">info: <a id="mail_info" href=""></a> booking:<a id="booking" href=""></a>               </div>
                <div class="clear"></div>
            </div>
        </div>


    </body>
</html>
