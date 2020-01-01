
<?php       // блокировка страниц
include_once("blockedaddresses.php");
$blocked = false;
foreach($blocked_addresses as $ba ){
  if ($ba === $_SERVER['REQUEST_URI']) {
     $blocked = true; break;
   } else {
     $blocked = false;
  }
}
//echo $ba.$_SERVER['REQUEST_URI'];
//if($blocked){echo "1";}else{echo "0";}

include_once('strings.php');
include_once('functions.php');
// подключиться к базе и получить адрес кеша
  //http://muz.tt/search.php?musicmp3=kk
  $translitkw = str_replace("/", "", strtolower($_SERVER['REQUEST_URI']));
  $translitkw = str_replace(".html", "", $translitkw);

  $result = mysql_query("SELECT kw, translitkw, cache, lastupdate FROM songs WHERE translitkw='".$translitkw."'");
  $foundSongs = mysql_fetch_assoc($result);

  if (mysql_num_rows($result)<1||!file_exists ("cache/".$foundSongs['cache'])){     // в базе нет записи - файл не существует
    $pageTemplate = str_replace("[CONTENT]", $zeroresult, $pageTemplate);
    $pageTemplate = str_replace("[H1TAG]", $zeroresult, $pageTemplate);
  $pageTemplate = str_replace("[CURRENTSEARCH]", $zeroresult, $pageTemplate);
  $pageTemplate = str_replace("[CONTENT]", $zeroresult, $pageTemplate);
  $pageTemplate = str_replace("[TITLE]", $zeroresult, $pageTemplate);
  $pageTemplate = str_replace("[COMMENTS]", "", $pageTemplate);
  $pageTemplate = str_replace("[KEYWORDS]", $zeroresult, $pageTemplate);
  $pageTemplate = str_replace("[DESCRIPTION]", $zeroresult, $pageTemplate);
    }else{

  $pageTemplate = str_replace("[H1TAG]", $foundSongs['kw'], $pageTemplate);
  $pageTemplate = str_replace("[CURRENTSEARCH]", $foundSongs['kw'], $pageTemplate);
  $pageTemplate = str_replace("[TITLE]", $pageTitleBefore.mb_convert_case($foundSongs['kw'],MB_CASE_TITLE,'UTF-8').$pageTitleAfter, $pageTemplate);

  // формирование ключевых слов с перемешкой
  //array_push($keywords, $foundSongs['kw']);
  //shuffle($keywords);
  array_unshift($keywords, $foundSongs['kw']);
  $keywordString  = "";
  for($i=0;$i<count($keywords);$i++){
    if($i>0){$keywordString.=", ".$keywords[$i];}else
    {$keywordString.=$keywords[$i];}
    }
  $pageTemplate = str_replace("[KEYWORDS]", $keywordString, $pageTemplate);

  // описание
  $pageTemplate = str_replace("[DESCRIPTION]", $descriptionBefore.$foundSongs['kw'].$descriptionAfter, $pageTemplate);
  $pageTemplate = str_replace("[COMMENTS]", $comments, $pageTemplate);








  /*АТОООБНОВЛЕНИЕ КЕША ПРИ ЗАГРУЗКЕ СТРАНИЦЫ РОБОТАМИ*/
  /*ОТКЛЮЧИТЬ ПРИ БОЛЬШОЙ ПОСЕЙЩАЕМОСТ*/
  /*if (file_exists("cache/".$foundSongs['cache']) && (time()> (filemtime("cache/".$foundSongs['cache'])+$cachetime))) {
    $pageTemplate = str_replace("</body>", "<script>startSearch(0);</script></body>", $pageTemplate);
    }*/

    //http://fmp3.ru/search.php?musicmp3=%D0%AD%D1%81%D1%82%D0%BE%D0%BD%D1%81%D0%BA%D0%B8%D0%B5%20%D0%BD%D0%B0%D1%80%D0%BE%D0%B4%D0%BD%D1%8B%D0%B5%20%D0%BF%D0%B5%D1%81%D0%BD%D0%B8


  $cachedVkJson = @file_get_contents("cache/".$foundSongs['cache']);

  $vkContentArray = json_decode($cachedVkJson , true);
  $url = $vkContentArray["response"][1]["url"];
  /*$Headers = @get_headers($url);
  if($Headers[18] === 'HTTP/1.1 200 OK') {
//echo "Файл существует";
} else*/
if(!url_exists($url)){
//echo "Файл не найден";

                             //ПРОВЕРИТЬ ЕСЛИ НЕ ФАЙЛ НЕ НАЙДЕН НА СЕРВЕРЕ КОНТАКТА  И ВРЕМЯ КЕША ВЫШЛО
// ТУТ ПЕРЕЗАГРУЗКА&nbsp;ПОСТОЯННО http://fmp3.ru/macka-b-2-legalize-the-herb.html

// если кеш устарел
$settings_cachedir = $cachepath;
$settings_cachetime = $cachetime;
$cachelink = "cache/".$foundSongs['cache'];

if (file_exists($cachelink) && (time() - $settings_cachetime) < filemtime($cachelink)) {

        //$pageTemplate = str_replace("</body>", "<script>startSearch(0);</script></body>", $pageTemplate);

} else{
   $pageTemplate = str_replace("</body>", "<script>startSearch(0);</script></body>", $pageTemplate);

}



// ДОЛБИТ САБ - АХУЕННО http://fmp3.ru/dolbit-sab-axuenno.html ПУСТОЙ
}


  if($cachedVkJson){
  $vkContentArray = json_decode($cachedVkJson , true);
  //$songList .= "<table width='100%' id='songlist' border='0'><tr><td>".$totaltracks.$vkContentArray['response'][0]."<br />";
  //$songList .= "<table id='songlist'><tr><td>";
  //if($blocked){$songList .= "<br />".$blockedpagetext;}
  //$songList .="</td></tr>";
  if($blocked){$songList .= "<br />".$blockedpagetext;}
  $songList .='<table id="playlist" class="mp3freelol-article" style="width: 100%; ">
                                <tbody>
                                <tr>
                                    <td class="panel"></td>
                                    <td class="panel" id="trackartistcol">Track-Artist</td>
                                    <td class="panel" id="durationcol">Duration</td>
                                    <td class="panel" id="genrecol">Genre</td>
                                    <td class="panel"></td>
                                </tr>';

  for($i=1;$i<sizeof($vkContentArray['response']);$i++){


  $pos  = strripos($vkContentArray["response"][$i]["url"], "vk-cdn.net");
  if ($pos === false) {
    //echo "К сожалению, ($needle) не найдена в ($haystack)";
} else {
    $file = "logs/newlog".date("Y-m-d").".txt";
    file_put_contents($file, PHP_EOL .$vkContentArray["response"][$i]["url"], FILE_APPEND);
}







    //$songList .= "<tr class='row'><td class='oneitem' itemscope itemtype='http://schema.org/AudioObject'><span id='song".$i."' data-track='".$vkContentArray['response'][$i]['artist']." - ".$vkContentArray['response'][$i]['title']."' data-value='".$vkContentArray["response"][$i]["url"]."'><a id='p".$i."' alt='".$play." ".$vkContentArray['response'][$i]['title']."' title='".$play." ".$vkContentArray['response'][$i]['title']."' class='playlink' onclick='updateSource(".$i.")' ><img src='/images/play.png' width='20px' />".$play."</a></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><a target='_blank' itemprop='contentUrl' class='downloadlink' alt='".$downloadAltTitleBefore.$vkContentArray['response'][$i]['title'].$downloadAltTitleAfter."' title='".$downloadAltTitleBefore.$downloadAltTitleAfter.$vkContentArray['response'][$i]['title']."' download='".$vkContentArray["response"][$i]["url"]."' href='".$vkContentArray["response"][$i]["url"]."'><img src='/images/download.png' width='20px' />".$download."</a></span>";

    // если страница не заблокирована    console.log('".$vkContentArray["response"][$i]["url"]."');
    if(!$blocked){       //".$vkContentArray["response"][$i]["url"]."
    /*$songList .= "<script> arrayOftracks.push(['".$vkContentArray["response"][$i]["url"]."', '".urlencode (onlyLettersAndSpaces($vkContentArray['response'][$i]['artist']))."', '".urlencode (onlyLettersAndSpaces($vkContentArray['response'][$i]['title']))."', '".$i."', '".$vkContentArray['response'][$i]['duration']."']);</script>";
    //$songList .= "<script> arrayOftracks.push(['http://".$_SERVER['SERVER_NAME']."/file.php?link=".base64_encode ($vkContentArray["response"][$i]["url"])."&song=song', '".urlencode (onlyLettersAndSpaces($vkContentArray['response'][$i]['artist']))."', '".urlencode (onlyLettersAndSpaces($vkContentArray['response'][$i]['title']))."', '".$i."', '".$vkContentArray['response'][$i]['duration']."']);</script>";
    //<a class='playlink' id='p".$i."' alt='".$play." ".onlyLettersAndSpaces($vkContentArray['response'][$i]['title'])."' title='".$play." ".onlyLettersAndSpaces($vkContentArray['response'][$i]['title'])."' onclick='updateSource(".$i.")' >

    $songList .= "<tr class='row'><td class='oneitem' itemscope itemtype='http://schema.org/AudioObject'>
    <table class='playdownloadtable'><tr><td class='tplaylink'>
    <span id='song".$i."' data-track='".onlyLettersAndSpaces($vkContentArray['response'][$i]['artist'])." - ".onlyLettersAndSpaces($vkContentArray['response'][$i]['title'])."' data-value='".$vkContentArray["response"][$i]["url"]."'>
        <a class='playlink' id='p".$i."' title='".$play." ".onlyLettersAndSpaces($vkContentArray['response'][$i]['title'])."' onclick='updateSource(".$i.")' >
            <img id='playimg' alt='play' src='/images/play.png' />".$play."</a>
    </span>
    </td><td class='tdowloadlink'>
     ";
        $songList .= "<form class='formdownload' method='post' action='http://".$_SERVER['SERVER_NAME']."/downloadmp3' target='_blank'><input type='hidden' name='song' value='".onlyLettersAndSpaces(htmlspecialchars_decode ($vkContentArray['response'][$i]['artist']))." - ".onlyLettersAndSpaces(htmlspecialchars_decode ($vkContentArray['response'][$i]['title']))."'>
            <input id='inputdownload' type='hidden' name='link' value='".base64_encode ($vkContentArray["response"][$i]["url"])."'>
            <input id='inputtranslitkw' type='hidden' name='inputtranslitkw' value='".$translitkw."'>

                    <button id='downloadbutoon' name='submit' type='submit' value='submit'><img id='downloadimg' alt='download' src='/images/download.png' />".$download."</button>
        </form>";
    //$songList .= "<a id='downloadbutoon' href='http://".$_SERVER['SERVER_NAME']."/mp3.php?link=".$vkContentArray["response"][$i]["url"]."&song=".urlencode(onlyLettersAndSpaces(htmlspecialchars_decode ($vkContentArray['response'][$i]['artist']))." - ".onlyLettersAndSpaces(htmlspecialchars_decode ($vkContentArray['response'][$i]['title'])))."'><img id='downloadimg' alt='download' src='/images/download.png' />".$download."</a>";
    $songList .= "
    </td></tr></table>";
    //$file = "logs/111.txt";
    //file_put_contents($file, PHP_EOL .$translitkw."---".onlyLettersAndSpaces(htmlspecialchars_decode ($vkContentArray['response'][$i]['artist']))." - ".onlyLettersAndSpaces(htmlspecialchars_decode ($vkContentArray['response'][$i]['title']))."---".$vkContentArray["response"][$i]["url"]."---", FILE_APPEND);
    */
    $songList .= '<tr>
                    <td>
                        <p data-value="http://'.$_SERVER['SERVER_NAME'].'/file.php?link='.base64_encode ($vkContentArray["response"][$i]["url"]).'&song=song" id="p'.$i.'" onclick="play(\''.$i.'\');" title="Play '.htmlspecialchars($vkContentArray['response'][$i]['title']).'" class="red-player"></p>
                    </td>
                    <td class="artitcont">
                        <div class="track" style="display: block;word-break: break-all;">'.$vkContentArray['response'][$i]['title'].'</div>
                        <div class="artist" style="display: block;word-break: break-all;">'.$vkContentArray['response'][$i]['artist'].'</div>
                    </td>
                    <td class="dur">'.round((($vkContentArray['response'][$i]['duration'])/60),3).'</td>
                    <td class="genre">'.$genres[$vkContentArray['response'][$i]['genre']].'</td>
                    <td class="downltd">';
                    //<a href="http://'.$_SERVER['SERVER_NAME'].'/mp3.php?link='.base64_encode ($vkContentArray["response"][$i]["url"]).'&song='.urlencode(onlyLettersAndSpaces(htmlspecialchars_decode ($vkContentArray['response'][$i]['artist']))." - ".onlyLettersAndSpaces(htmlspecialchars_decode ($vkContentArray['response'][$i]['title']))).'"><p title="Download '.htmlspecialchars($vkContentArray['response'][$i]['title']).'" class="downloadbtn"></p></a>

    //$songList .= '<a rel="nofollow" target="_blank" href="http://'.$_SERVER['SERVER_NAME'].'/downloadmp3?song='.urlencode (onlyLettersAndSpaces(htmlspecialchars_decode ($vkContentArray['response'][$i]['artist'])).' - '.onlyLettersAndSpaces(htmlspecialchars_decode ($vkContentArray['response'][$i]['title']))).'&link='.base64_encode ($vkContentArray["response"][$i]["url"]).'&inputtranslitkw='.$translitkw.'" ><p title="Download '.htmlspecialchars($vkContentArray['response'][$i]['title']).'" class="downloadbtn"></p></a>
    $songList .= '<a download rel="nofollow" target="_blank" href="'.$vkContentArray["response"][$i]["url"].'" ><p title="Download '.htmlspecialchars($vkContentArray['response'][$i]['title']).'" class="downloadbtn"></p></a>
                    </td>
                    </tr>';
    }else{
      $songList .= '<tr>
                    <td>
                        <p data-value="http://'.$_SERVER['SERVER_NAME'].'/file.php?link='.base64_encode ($vkContentArray["response"][$i]["url"]).'&song=song" id="p'.$i.'" title="Play '.htmlspecialchars($vkContentArray['response'][$i]['title']).'" class="red-player2"></p>
                    </td>
                    <td class="artitcont">
                        <div class="track" style="display: block;word-break: break-all;">'.$vkContentArray['response'][$i]['title'].'</div>
                        <div class="artist" style="display: block;word-break: break-all;">'.$vkContentArray['response'][$i]['artist'].'</div>
                    </td>
                    <td class="dur">'.round((($vkContentArray['response'][$i]['duration'])/60),3).'</td>
                    <td class="genre">'.$genres[$vkContentArray['response'][$i]['genre']].'</td>
                    <td class="downltd">';
                    //<a href="http://'.$_SERVER['SERVER_NAME'].'/mp3.php?link='.base64_encode ($vkContentArray["response"][$i]["url"]).'&song='.urlencode(onlyLettersAndSpaces(htmlspecialchars_decode ($vkContentArray['response'][$i]['artist']))." - ".onlyLettersAndSpaces(htmlspecialchars_decode ($vkContentArray['response'][$i]['title']))).'"><p title="Download '.htmlspecialchars($vkContentArray['response'][$i]['title']).'" class="downloadbtn"></p></a>

    $songList .= '<p title="Download '.htmlspecialchars($vkContentArray['response'][$i]['title']).'" class="downloadbtn2"></p>

                    </td>
                    </tr>';
    }



    /*
    //$songList .= "<span style='display:inline;' id='song".$i."' data-value='".$vkContentArray["response"][$i]["url"]."'><img width='30px;' src='http://fc00.deviantart.net/fs71/f/2011/253/9/c/play_glossy_button_by_stevanppp-d49fn3f.png' onclick='updateSource(".$i.")'></img></span>";
    //$songList .= "<span style='display:inline;' class='songtitle ellipsis'><img width='30px;' src='http://iconizer.net/files/Bunch_of_Bluish_Icons/orig/download.png' onclick='downloadSong(".$i.")'></img></span>";
    $songList .= "<p class='songtitle size' itemprop='name'>".$vkContentArray['response'][$i]['title']."</p>";
    $songList .= "<meta itemprop='encodingFormat' content='mp3' /><time itemprop='dateModified' datetime='".$foundSongs['lastupdate']."'></time>";
    //$songList .= "<meta itemprop='contentUrl' content='".$vkContentArray["response"][$i]["url"]."' />";
    //$songList .= "<meta itemprop='contentUrl' content='https://www.youtube.com/watch?v=h6s8tSorMA8' />";
    $songList .= "<div class='description'>";
    $songList .= "<p class='songartist size'><span onclick='startSearch(\"".$vkContentArray['response'][$i]['artist']."\");'>".$vkContentArray['response'][$i]['artist']."</span></p>";
    $songList .= "<meta itemprop='duration' content='".$vkContentArray['response'][$i]['duration']."' />";
    $songList .= "<p class='songdurationgenre size' itemprop='description'>".$duration.": ".round((($vkContentArray['response'][$i]['duration'])/60),3)."";
    $songList .= " ".$genre.": ".$genres[$vkContentArray['response'][$i]['genre']]."</p></div>";
    $songList .= '<div style="display: none;" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
 <meta itemprop="bestRating" content="5" />
 <meta itemprop="ratingValue" content="'.(4.5+rand(0,5)/10).'" />
 <meta itemprop="ratingCount" content="'.rand(10,200).'" />
 </div>';
    $songList .= "</td></tr>"; */                                  }
     //$songList .= "</table>";
     $songList .= "</tbody></table>";
  $pageTemplate = str_replace("[CONTENT]", $songList, $pageTemplate);
  }else{
    $pageTemplate = str_replace("[CONTENT]", $zeroresult, $pageTemplate);
  }


  }

?>