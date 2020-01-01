<?php

$pageTemplate = str_replace("[CURRENTSEARCH]", "", $pageTemplate);
$pageTemplate = str_replace("[H1TAG]", $playlistsh1, $pageTemplate);
$pageTemplate = str_replace("[TITLE]", $playliststitle, $pageTemplate);

$pageTemplate = str_replace("[KEYWORDS]", $playlistskeywords, $pageTemplate);
$pageTemplate = str_replace("[DESCRIPTION]", $playlistsdescription, $pageTemplate);

$pageTemplate = str_replace("[COMMENTS]", "", $pageTemplate);

$pageTemplate = str_replace("[CONTENT]", $playlistscontent, $pageTemplate);
?>