<?php

$pageTemplate = str_replace("[CURRENTSEARCH]", "", $pageTemplate);
$pageTemplate = str_replace("[H1TAG]", $contactsh1, $pageTemplate);
$pageTemplate = str_replace("[TITLE]", $contactstitle, $pageTemplate);

$pageTemplate = str_replace("[KEYWORDS]", $contactskeywords, $pageTemplate);
$pageTemplate = str_replace("[DESCRIPTION]", $contactsdescription, $pageTemplate);

$pageTemplate = str_replace("[COMMENTS]", "", $pageTemplate);

$pageTemplate = str_replace("[CONTENT]", $contactscontent, $pageTemplate);
?>