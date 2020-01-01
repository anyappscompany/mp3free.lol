<?php
$cachetime = 14400;
$cachepath = 'cache/';
$play = "Слушать";
$download = "Start Download";
$duration = "Продолжительность";
$genre = "Жанр";
$totaltracks = "Треков найдено: ";
$downloadAltTitleBefore = "Скачать mp3 "; //  50-80 знаков (обычно — 75)
$downloadAltTitleAfter = "";
$pageTitleBefore = "";
$pageTitleAfter = " free Mp3 Music download or listen on ".$_SERVER['SERVER_NAME'].". Songs. Albums. Ringtones.";
$keywords = array('songs','mp3 ','ringtones','listening','stream','search','download','free','search','composition','artist','ogg','album','fast','music','files','audio','tracks','minus','library','top','news','audiobooks','quality','fresh','good','collection','format'); //до 250 (250 — максимум, ориентируйтесь на ударные первые 150 знаков).
$descriptionBefore = "NEW music and latest songs "; //около 150-200
$descriptionAfter = ". Listen and download free! Play songs for free.";
$zeroresult = "Найдено 0 результатов.";
$pagenavih1 = "Browsing Songs for songs with first letter ";
$text1 = "Пожалуйста, введите название трэка или имя исполнителя, группы, рингтона";
$h1hometag = "Mp3free.lol Free search MP3 music over the internet";
$contenthometag = "Download Mp3 Music english songs All hollyWood New top songs full Mp3 Dj Remix latest music play audio mp3 skull";
$genreshometxt = "Жанры";
$hometitle = "MP3FREE.LOL - Free MP3 Music Search Engine - Listen and download music";
$homekeywords = "mp3, search, music, engine, online, free, listen, ringtones, artist, track, download, audiobooks";
$homedescription = "Free MP3 Music Search Engine. Download ringtones, message tones, alert tones etc...";
$headertext = " на сайте <span style='text-transform: uppercase'>".$_SERVER['SERVER_NAME']."</span>";
$georegion = "RU";
$geoplacename = "Нижний Новгород";
$geoposition = "56.296504;43.936059";
$geoicbm = "56.296504, 43.936059";
$organizationname = "Поисковик mp3 файлов, аудиокниг, рингтонов, композиций, альбомов";
$organizationlocation = "Расположение:";
$streetaddress = "ул. Трамвайная 4";
$addresslocality = "Нижний Новгород";
$addressregion = "Нижний Новгород";
$phone = "Телефон:";
$phonenumber = "(831) 223-45-15 ";
$sitename = $_SERVER['SERVER_NAME'];
//$socialnetworks = '<div class="share42init"></div><script async type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/share42/share42.js"></script>';
$socialnetworks = '';
$lastqueriestext = "Recent Searches MP3:";
/*ping*/
$psitename = "Free Mp3 поиск музыки на ".$_SERVER['SERVER_NAME'];
$psiteurl = "http://".$_SERVER['SERVER_NAME'];
$ppageurl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$pfeedurl = "";
/*ping*/
$home = "Home";
$songsbygenre = "Genres";
$hits100 = "Top 100 songs";
$hits100h1 = "Music top 100 hits";

$songsbygenretitle = "Music Genre List (download, listen). Fundamental music styles list on ".$_SERVER['SERVER_NAME'];
$songsbygenrekeywords = "music, genres, styles, download, rock, rap, beat, cult, dream, duet, ethnic, bass, fusion, folk, pop, metal, opera, polka, samba, rave";
$songsbygenredescription = "List of music styles";

$firstlettertitle = "Music on the letter ".$_GET['letter']." on the site ".$_SERVER['SERVER_NAME'].". Page "; if(is_numeric($_GET['page'])){$firstlettertitle.=$_GET['page'];}else{$firstlettertitle.="1";}
$hits100title = "Music top 100 hits. Worldwide Top 100 Popular Songs";
$firstletterkeywords = "music, music by letter, free, songs";
$firstletterdescription = "The First Letter - ".$_GET['letter'].". Download and play MP3 music for free.";
$hits100description = "Top 100 Songs - New songs. Worldwide Top 100 Popular Songs. Billboard Hot 100 Chart on ".$_SERVER['SERVER_NAME'];
$hits100keywords = "download, music, listen, charts, top, 100, greatest, free";
$radio = "Radio";
$radioh1 = "Free Radio";
$radiotitle = "Free Internet Radio - ".$_SERVER['SERVER_NAME'];
$radiokeywords = "radion, listen, online, stations, free, music, fm, streaming, internet, live, 80s";
$radiodescription = "Free Music Online - Internet Radio. Listen to online radio. Free internet radio.";
$urlliststotal = 500;
$rsstitle = "MP3FREE.LOL RSSFeed";
$rsslink = "http://".$_SERVER['SERVER_NAME'];
$rssdescription = "MP3FREE.LOL - Professional Mp3 Search Engine.";
$rsstotal = 1000;
$rssauthor = "MP3FREE.LOL";
$rsslang = "en-US";
$rssgenerator = "MP3FREE.LOL 1.0";
$rsscopyright = "Copyright 2015 MP3FREE.LOL";
$rssmanagingeditor = "managingeditor@gmail.com (Peter Jackson)";
$rsswebmaster = "webmaster@gmail.com (Peter Jackson)";
$rssoneitemafter = " (mp3, search, engine)";
$rssoneitemafterdescription = " free Mp3 download or listen";
$titlesymbol = "► ";

/*$comments = "<div id=\"hypercomments_widget\"></div>
<script type=\"text/javascript\">
_hcwp = window._hcwp || [];
_hcwp.push({widget:\"Stream\", widget_id: 60471});
(function() {
if(\"HC_LOAD_INIT\" in window)return;
HC_LOAD_INIT = true;
var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage || \"en\").substr(0, 2).toLowerCase();
var hcc = document.createElement(\"script\"); hcc.type = \"text/javascript\"; hcc.async = true;
hcc.src = (\"https:\" == document.location.protocol ? \"https\" : \"http\")+\"://w.hypercomments.com/widget/hc/60471/\"+lang+\"/widget.js\";
var s = document.getElementsByTagName(\"script\")[0];
s.parentNode.insertBefore(hcc, s.nextSibling);
})();
</script>
<a href=\"http://hypercomments.com\" class=\"hc-link\" title=\"comments widget\">comments powered by HyperComments</a>";*/
$comments = "";

$radiostationname = "Название станции";
$radiogenre = "Жанр";
$radiolanguage = "Язык";

$downloadsongtitle = "Download mp3 ";
$downloadsongh1 = "Download MP3 File> ";

$contacts = "Contacts";
$contactsh1 = "Contacts:";
$contactstitle = "Contacts and feedback ".$_SERVER['SERVER_NAME'];
$contactscontent = "<b>Email:</b> <a href='mailto:mp3freelol@gmail.com'>mp3freelol@gmail.com</a>";
$contactskeywords = "contacts, feedback";
$contactsdescription = "Contacts and Feedback. ".$_SERVER['SERVER_NAME'].". Contacts. Email.";

$copyright = "Copyright";
$copyrighth1 = "Copyright:";
$copyrighttitle = "Copyright ".$_SERVER['SERVER_NAME'];
$copyrightcontent = "Copyright";
$copyrightkeywords = "copyright, music";
$copyrightdescription = "Copyright.";

$blockedpagetext = "<div id='blockedpagemessage'>Music is blocked at the request of the copyright owner.</div>";

$playlists = "Плейлисты";        // menu
$playlistscontent = "Плейлисты";  // page content
$playlistsh1 = "Плейлисты";
$playliststitle = "Плейлисты";
$playlistskeywords = "Плейлисты";
$playlistsdescription = "Плейлисты";
/*player*/
$repeatsong = "Повтор трека";
$repeatplaylist = "Повтор плейлиста";
$previoussong = "Предыдущий";
$nextsong = "Следующий";
$stopsong = "Стоп";
$volumesong = "Вкл/Выкл звук";
$playpausesong = "Играть/Приостановить";
$randomsong = "Случайная песня";
$placeholder = "Search...";
$headline = "Mp3free.lol ;)";
$slogan = "Free Mp3 search, download music, listen songs, listen radio, share!";
$searchbuttontext = "Search";
?>