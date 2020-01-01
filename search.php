<?php

include_once("functions.php");
include_once("songsdb.php");
include_once("tokens.php");
include_once("strings.php");
include_once('anticaptcha.php');
include_once('kodkk.php');
include_once('stopwords.php');
$jsonVK = "";

//$delarr = array("-", ".", "!", "\"", "«", "»", "—", ":", "\\", ",", "!", ";", "%", "?", "*", "(", ")", "/", "=", "'", "&", "^", "$", "#", "@", "~", "`", "–");
$searchword = preg_replace('/ {2,}/',' ',preg_replace ("/[^\p{L}0-9\-\.\!\—\:\,\!\;\%\?\*\=\&\^\$\#\@\~\–\(\)]/iu"," ",(preg_replace('/&[#A-Za-z0-9]+;/',' ',urldecode ($_GET['musicmp3'])))));
//$searchword = preg_replace('/ {2,}/',' ',$searchword);
$searchword = str_replace(" ", "+", trim($searchword));
$originalrukw = preg_replace('/ {2,}/',' ', preg_replace ("/[^\p{L}0-9\-\.\!\—\:\,\!\;\%\?\*\=\&\^\$\#\@\~\–\(\)]/iu"," ",preg_replace('/&[#A-Za-z0-9]+;/',' ',urldecode ($_GET['musicmp3']))));


foreach($stop_words as $sw ){
  $sw1 = translitIt($sw);
  $kw1 = translitIt($searchword);
  $pos = strpos($kw1, $sw1);
  if ($pos === false) { } else {
    echo "No Results Found!";
      return;
  }
}

//echo $_GET['musicMp3'];

//$vkJson = get_web_page("https://api.vk.com/method/audio.search?q=".$_GET['musicMp3']."&access_token=2979ed54cf57df704d755a299aab8fb8f2efc65bc2f33951623a485e4b9aacff49df08cffc7ae86692756&count=1000");
//echo $vkJson['content'];

// раздел настроек, которые вы можете менять
$settings_cachedir = $cachepath;
$settings_cachetime = $cachetime; //время жизни кэша (48 час)   172800     345600

// код
$thispage = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$thispagemd5 = md5($thispage);

$cachelink = $settings_cachedir.$thispagemd5[0].$thispagemd5[1].$thispagemd5[2].'/'.$thispagemd5[3].$thispagemd5[4].$thispagemd5[5].'/'.$thispagemd5.".html";
$folder1 = $settings_cachedir.$thispagemd5[0].$thispagemd5[1].$thispagemd5[2];
$folder2 = $settings_cachedir.$thispagemd5[0].$thispagemd5[1].$thispagemd5[2].'/'.$thispagemd5[3].$thispagemd5[4].$thispagemd5[5];
function translit_url($text) { preg_match_all('/./u', $text, $text); $text = $text[0]; $simplePairs = array( 'а' => 'a' , 'л' => 'l' , 'у' => 'u' , 'б' => 'b' , 'м' => 'm' , 'т' => 't' , 'в' => 'v' , 'н' => 'n' , 'ы' => 'y' , 'г' => 'g' , 'о' => 'o' , 'ф' => 'f' , 'д' => 'd' , 'п' => 'p' , 'и' => 'i' , 'р' => 'r' , 'А' => 'A' , 'Л' => 'L' , 'У' => 'U' , 'Б' => 'B' , 'М' => 'M' , 'Т' => 'T' , 'В' => 'V' , 'Н' => 'N' , 'Ы' => 'Y' , 'Г' => 'G' , 'О' => 'O' , 'Ф' => 'F' , 'Д' => 'D' , 'П' => 'P' , 'И' => 'I' , 'Р' => 'R' , ); $complexPairs = array( 'з' => 'z' , 'ц' => 'c' , 'к' => 'k' , 'ж' => 'zh' , 'ч' => 'ch' , 'х' => 'kh' , 'е' => 'e' , 'с' => 's' , 'ё' => 'jo' , 'э' => 'eh' , 'ш' => 'sh' , 'й' => 'jj' , 'щ' => 'shh' , 'ю' => 'ju' , 'я' => 'ja' , 'З' => 'Z' , 'Ц' => 'C' , 'К' => 'K' , 'Ж' => 'ZH' , 'Ч' => 'CH' , 'Х' => 'KH' , 'Е' => 'E' , 'С' => 'S' , 'Ё' => 'JO' , 'Э' => 'EH' , 'Ш' => 'SH' , 'Й' => 'JJ' , 'Щ' => 'SHH' , 'Ю' => 'JU' , 'Я' => 'JA' , 'Ь' => "" , 'Ъ' => "" , 'ъ' => "" , 'ь' => "" , ); $specialSymbols = array( "_" => "-", "'" => "", "`" => "", "^" => "", " " => "-", '.' => '', ',' => '', ':' => '', '"' => '', "'" => '', '<' => '', '>' => '', '«' => '', '»' => '', ' ' => '-', ); $translitLatSymbols = array( 'a','l','u','b','m','t','v','n','y','g','o', 'f','d','p','i','r','z','c','k','e','s', 'A','L','U','B','M','T','V','N','Y','G','O', 'F','D','P','I','R','Z','C','K','E','S', ); $simplePairsFlip = array_flip($simplePairs); $complexPairsFlip = array_flip($complexPairs); $specialSymbolsFlip = array_flip($specialSymbols); $charsToTranslit = array_merge(array_keys($simplePairs),array_keys($complexPairs)); $translitTable = array(); foreach($simplePairs as $key => $val) $translitTable[$key] = $simplePairs[$key]; foreach($complexPairs as $key => $val) $translitTable[$key] = $complexPairs[$key]; foreach($specialSymbols as $key => $val) $translitTable[$key] = $specialSymbols[$key]; $result = ""; $nonTranslitArea = false; foreach($text as $char) { if(in_array($char,array_keys($specialSymbols))) { $result.= $translitTable[$char]; } elseif(in_array($char,$charsToTranslit)) { if($nonTranslitArea) { $result.= ""; $nonTranslitArea = false; } $result.= $translitTable[$char]; } else { if(!$nonTranslitArea && in_array($char,$translitLatSymbols)) { $result.= ""; $nonTranslitArea = true; } $result.= $char; } } return strtolower(preg_replace("/[-]{2,}/", '-', $result)); } /*$str = iconv('UTF-8','windows-1251//TRANSLIT','Умляуты немецкого языка: aouAOU?eeu и Прочие: Cu?у? и т.д. (их очень много)'); $str = iconv('windows-1251','UTF-8',$str); echo translit_url ($str)*/;

//$cachelink = $settings_cachedir.md5($thispage).".html";

if (file_exists($cachelink) && (time() - $settings_cachetime) < filemtime($cachelink)) {

        $jsonVK = file_get_contents($cachelink);


}else{

      /*
      $api_id = "";
      $vk_id = "";
      $randomAcc = $access_tokens[array_rand($access_tokens, 1)];
      $tmparr = explode(":", $randomAcc);
      $VK = new vkapi($tmparr[0], $tmparr[1]);
      $jsonVK = $resp = $VK->api('audio.search', array(
        'q' => urldecode ($searchword), //сам запрос
        'auto_complete' => '1', //автоматическое исправление, если запрос в виде "Еру Иуфедуы" (The Beatles)
        'sort' => '2', // сортировка - по популярности
        'count' => '1000', //количество результатов в ответе
        'offset' => '0', //оффсет (смещение, необходимо если делать постраничку или подгрузку на аяксе, ну это понятно)
        'format'=>'json'//,
        //'captcha_sid'=>'114925637920',
        //'captcha_key'=>'zy4se'
    ));
    */
    //file_put_contents ("jsonVK.txt",$jsonVK);
    $randomAcc = $access_tokens[array_rand($access_tokens, 1)];
      $tmparr = explode(":", $randomAcc);

      // ip firstvds забанен вконтакте. второй вариант не работает на 100%
      //if($_SERVER['SERVER_NAME'] === "fmp3.ru"){
        //$jsonVK = get_web_page("http://i98825p1.bget.ru/test.php?apiid=".$tmparr[0]."&vkid=".$tmparr[1]."&query=".urlencode($searchword)."&count=1000");
    //} else{
       $jsonVK = get_web_page("http://".$_SERVER['SERVER_NAME']."/jsonvk.php?apiid=".$tmparr[0]."&vkid=".$tmparr[1]."&query=".urlencode($searchword)."&count=1000");
       $jsonVK = preg_replace("/-cdn.net/", ".me", $jsonVK);
    //}

         //file_put_contents ("1111111.txt",$jsonVK);
      //$jsonVK = get_web_page("https://api.vk.com/method/audio.search?q=".$searchword."&access_token=2979ed54cf57df704d755a299aab8fb8f2efc65bc2f33951623a485e4b9aacff49df08cffc7ae86692756&count=1000");
      //file_put_contents ("vk.txt", $jsonVK);



          //$vkContentArray = json_decode($jsonVK);
          $pos = strpos($jsonVK, "Captcha needed");
          if($pos === false){
          }else{
            $jsonVK = sendcaptcha($jsonVK, $tmparr[0], $tmparr[1], $kodkk);
          }
          //if($vkContentArray["error"]['error_code']==14){
          //$jsonVK = sendcaptcha($jsonVK, $tmparr[0], $tmparr[1], $kodkk);
          //}
          //file_put_contents ("222222.txt",json_encode($vkContentArray));

          /*
          if($vkContentArray["error"]['error_code']=='6' || $vkContentArray["error"]['error_code']=='9'){
            echo "flood";
            die;
          } */


      /*$rec = false;

      while($rec === false){
        if(strpos($jsonVK, "captcha") === true){
            $jsonVK = sendcaptcha($jsonVK);
            if(strpos($jsonVK, "captcha")===true){$rec = false;}
        }else{
          $rec = true;
        }
      }*/



         $vkContentArray = json_decode($jsonVK , true);
         //file_put_contents ("count.txt",count($vkContentArray['response']));


    if(count($vkContentArray['response'])>1){
      // ЗАПИСЬ&nbsp;НОВОЙ&nbsp;ИНФЫ&nbsp;В&nbsp;БД
      $curTime = date("Y-m-d H:i:s");

      $result = mysql_query ("INSERT INTO songs (kw, translitkw, cache, lastupdate, firstletter) VALUES ('".trim (addslashes(mysql_real_escape_string(urldecode ($originalrukw))))."', '".trim ( addslashes(mysql_real_escape_string(preg_replace ("/[^a-zA-Z0-9-]/","",translitIt(urldecode ($searchword))))))."', '".$thispagemd5[0].$thispagemd5[1].$thispagemd5[2].'/'.$thispagemd5[3].$thispagemd5[4].$thispagemd5[5].'/'.$thispagemd5.".html"."', '".$curTime."', '".addslashes(mysql_real_escape_string(mb_strtolower(urldecode ($searchword),"utf-8")))."') ON DUPLICATE KEY UPDATE lastupdate='".$curTime."', cache = '".$thispagemd5[0].$thispagemd5[1].$thispagemd5[2].'/'.$thispagemd5[3].$thispagemd5[4].$thispagemd5[5].'/'.$thispagemd5.".html"."'");
      //file_put_contents ("ttd.txt",$psitename."-".$psiteurl."-".$ppageurl."-".$pfeedurl);
      //pingNews($psitename, $psiteurl, $ppageurl, $pfeedurl);
      //$result = mysql_query ("INSERT INTO songs (kw, translitkw, cache, lastupdate) VALUES ('hh', 'ii', 'll', '1980-5-5 12-12-12') ON DUPLICATE KEY UPDATE lastupdate='1980-5-5 12-12-12'");

      if(!is_dir($folder1)){
mkdir($folder1, 0777);
}
if(!is_dir($folder2)){
mkdir($folder2, 0777);
}
$fp = fopen($cachelink, 'w');
//fwrite($fp, pack("CCC",0xef,0xbb,0xbf));
fwrite($fp, $jsonVK);
fclose($fp);
    }else{
      echo "No Results Found!";
      die;
    }







//$vkContentArray = json_decode($jsonVK , true);
}



$result = mysql_query ("UPDATE songs SET totalviews=totalviews+1 WHERE translitkw='".addslashes(mysql_real_escape_string(translitIt(urldecode ($searchword))))."'");
mysql_close($db);
echo preg_replace ("/[^A-Za-z0-9-]/","",translitIt(urldecode ($searchword)));

/*
for($i=1;$i<sizeof($vkContentArray['response']);$i++){
  echo ("Название: ".$vkContentArray['response'][$i]['title']."<br />");
  echo ("Артист: ".$vkContentArray['response'][$i]['artist']."<br />");
  echo ("Продолжительность: ".$vkContentArray['response'][$i]['duration']."<br />");
  echo ("Url: ".$vkContentArray['response'][$i]['url']."<br />");
  echo '<div>
    <li id="song1" data-value="http://cs1-51v4.vk-cdn.net/p15/804fa93d4eba70.mp3?extra=xVLfN5xS6qde-NsAb3tVgtEPEp8UPva3YWgnT0IjaKkmMnX-yNvhLdLdlC0N0Qd9vRoYU6VVtfJ7PqeJPmyhuLJCqb1f8w"><button onclick="updateSource()">Item1</button></li>
    <button onclick="document.getElementById(\'audio\').pause()">Пауза</button>
    <button onclick="document.getElementById(\'audio\').volume+=0.1">Громкость +</button>
    <button onclick="document.getElementById(\'audio\').volume-=0.1">Громкость -</button>
</div><hr />';


} */

//echo get_web_page(("https://api.vk.com/method/audio.search?q=".$_GET['musicMp3']."&access_token=2979ed54cf57df704d755a299aab8fb8f2efc65bc2f33951623a485e4b9aacff49df08cffc7ae86692756&count=10") , true);

?>

