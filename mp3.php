<?php
include_once("functions.php");
$fil = base64_decode ($_GET['link']);
$title = preg_replace('/ {2,}/',' ',preg_replace ("/[^\p{L}0-9]/iu","_",translitIt(str_replace(" - ", "_",htmlspecialchars_decode(urldecode ($_GET['song']))))));
$filename = preg_replace ("/[^\p{L}0-9]/iu","_",translitIt(base64_decode ($_GET['link'])));
	header("Content-Type: audio/mpeg, audio/x-mpeg, audio/x-mpeg-3, audio/mpeg3");
	header("Content-Disposition: attachment; filename=".preg_replace('/_{2,}/','_',$title)."_(".str_replace(".", "_", $_SERVER['SERVER_NAME']).").mp3");
	readfile($fil);
	exit;

?>