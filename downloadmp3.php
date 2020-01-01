<?php
//$file = "logs/newlog".date("Y-m-d-H-i-s").".txt";
//file_put_contents ($file, json_encode($_GET));

$soc ="<script>";
if(isset($_GET['inputtranslitkw']) && !empty($_GET['inputtranslitkw'])){
  $soc .= "var socialurl2 = 'http://".$_SERVER['SERVER_NAME']."/".$_GET['inputtranslitkw'].".html';";
}else{
   $soc .= "var socialurl2 = 'http://".$_SERVER['SERVER_NAME']."';";
}

if(isset($_GET['song']) && !empty($_GET['song'])){
  $soc .= "var socialtitle = '".$_GET['song']."';";
}else{
   $soc .= "var socialtitle = 'http://".$_SERVER['SERVER_NAME']."';";
}
$soc .= "</script>";

include_once('strings.php');
//print_r($_GET);
$pageTemplate = str_replace("[CURRENTSEARCH]", "", $pageTemplate);
$pageTemplate = str_replace("[H1TAG]", $downloadsongh1.$_GET['song'], $pageTemplate);
$pageTemplate = str_replace("[TITLE]", $downloadsongtitle.$_GET['song'], $pageTemplate);
$pageTemplate = str_replace("[COMMENTS]", $comments, $pageTemplate);
$dowloadcontent = "";

//$Headers = @get_headers(base64_decode ($_GET['link']));
  //if($Headers[/*18*/0] === 'HTTP/1.1 200 OK' || $Headers[18] === 'HTTP/1.1 200 OK') {
$dowloadcontent .= '<div class="plusplus_sl"><a id="downloadlink" href="http://'.$_SERVER['SERVER_NAME'].'/mp3.php?link='.$_GET['link'].'&song='.urlencode($_GET['song']).'">'.$download.'</a></div>';
//$dowloadcontent .= '<a id="downloadlink" href="http://'.$_SERVER['SERVER_NAME'].'/mp3.php?link='.$_GET['link'].'">'.$download.'</a>';
//}
$dowloadcontent .= "<a id='prevpage' href='".$_SERVER['HTTP_REFERER']."'>Go Back to Previous Page</a>";
/*$dowloadcontent .= '<br /><script type="text/javascript">
var begun_auto_pad = 416068448;
var begun_block_id = 421592540;
</script>
<script src="http://autocontext.begun.ru/autocontext2.js" type="text/javascript"></script>';*/

$pageTemplate = str_replace("[CONTENT]", $soc.$dowloadcontent, $pageTemplate);
$pageTemplate = str_replace("[KEYWORDS]", $downloadkeywords, $pageTemplate);
$pageTemplate = str_replace("[DESCRIPTION]", $downloaddescription, $pageTemplate);


?>
