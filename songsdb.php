<?php

$db = mysql_connect("localhost","mp3freeloluser","MkialION");

mysql_select_db("mp3freelol", $db);
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $db);

?>