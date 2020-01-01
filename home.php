<?php
$pageTemplate = str_replace("[CURRENTSEARCH]", "", $pageTemplate);
$pageTemplate = str_replace("[H1TAG]", $h1hometag, $pageTemplate);

$pageTemplate = str_replace("[TITLE]", $hometitle, $pageTemplate);
$pageTemplate = str_replace("[KEYWORDS]", $homekeywords, $pageTemplate);
$pageTemplate = str_replace("[DESCRIPTION]", $homedescription, $pageTemplate);
$pageTemplate = str_replace("[COMMENTS]", "", $pageTemplate);

//$genreshome .= "<h2>".$genreshometxt."</h2>";
$genreshomehtml = "";
$pageTemplate = str_replace("[CONTENT]", $contenthometag.$genreshome.$genreshomehtml, $pageTemplate);
?>