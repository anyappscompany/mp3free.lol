<?php                die;
include_once('/var/www/user1/data/www/'.$_SERVER['SERVER_NAME'].'/songsdb.php');
// указываем заголовок XML документа, говоря ему о том, что это SITEMAP.XML
$s_map = '<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9

http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'."\r\n";

// указываем главную страницу сайта
$s_map .= '
<url>
    <loc>http://'.$_SERVER['SERVER_NAME'].'/</loc>
    <lastmod>'.date("Y-m-d\TH:i:s+02:00").'</lastmod>
    <changefreq>hourly</changefreq>
    <priority>1.00</priority>
</url>'."\r\n";

// тут нужно получить ссылку на страницу
$query = "SELECT * FROM songs";
$result = mysql_query($query);
$num_result = mysql_num_rows($result);
for ($i=0;$i<$num_result;$i++)
{
$row = mysql_fetch_array($result);
$s_map .= '<url>';
$s_map .= '<loc>http://'.$_SERVER['SERVER_NAME'].'/'.$row["translitkw"].'.html'.'</loc>';
$s_map .= '<changefreq>hourly</changefreq>';
$s_map .= '<priority>0.50</priority>';
$s_map .= '</url>'."\r\n";
}
$s_map .= '</urlset>';

// запись в файл
$file_name = 'sitemap.xml';
$one_file = fopen($file_name,"w");
fwrite($one_file,$s_map);
fclose($one_file);
?>