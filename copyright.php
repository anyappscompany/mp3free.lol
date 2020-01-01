<?php

$pageTemplate = str_replace("[CURRENTSEARCH]", "", $pageTemplate);
$pageTemplate = str_replace("[H1TAG]", $copyrighth1, $pageTemplate);
$pageTemplate = str_replace("[TITLE]", $copyrighttitle, $pageTemplate);

$pageTemplate = str_replace("[KEYWORDS]", $copyrightkeywords, $pageTemplate);
$pageTemplate = str_replace("[DESCRIPTION]", $copyrightdescription, $pageTemplate);

$pageTemplate = str_replace("[COMMENTS]", "", $pageTemplate);

$pageTemplate = str_replace("[CONTENT]", $copyrightcontent, $pageTemplate);
?>