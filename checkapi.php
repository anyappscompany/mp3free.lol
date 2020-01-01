<?php

//include_once('tokens.php');
$access_tokens = array(
"5066685:322957421",
"5066695:322958255"
);
$count = 1;
foreach($access_tokens as $vkid){
  $count++;
  $arrvkid = explode(":", $vkid);
  //echo $count." ";
  $html = get_web_page("http://".$_SERVER['SERVER_NAME']."/jsonvk.php?apiid=".$arrvkid[0]."&vkid=".$arrvkid[1]."&query=%D0%9A%D0%B8%D0%BF%D0%B5%D0%BB%D0%BE%D0%B2&count=100");
  $pos = strpos($html, "error_code");
  if ($pos === false) {
    //echo "Строка '$findme' не найдена в строке '$mystring1'";
} else {
    //echo "Строка '$findme' найдена в строке '$mystring1'";
    //echo " в позиции $pos";
    echo $count." - ".$arrvkid[0].":".$arrvkid[1]."<hr />";
}

}


function get_web_page( $url )
{
  $ch = curl_init($url);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );

    $response = curl_exec( $ch );
    curl_close( $ch );
    return $response;
}
?>