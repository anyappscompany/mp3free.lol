<?php
include_once('/var/www/user1/data/www/'.$_SERVER['SERVER_NAME'].'/songsdb.php');
$lim = 10000;


$query = "SELECT * FROM songs";
$result = mysql_query($query);
$total=mysql_num_rows($result);
$filesnum = intval(($total - 1) / $lim) + 1;

// главный
$sm .= '<?xml version="1.0" encoding="UTF-8"?>';
$sm .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

for($i=0;$i<$filesnum;$i++){
  $sm .= '<sitemap><loc>http://'.$_SERVER['SERVER_NAME'].'/sm2/sitemap'.$i.'.xml.gz</loc></sitemap>';
}

$sm .= '</sitemapindex>';
$file_name = 'sitemap.xml';
$one_file = fopen($file_name, "w");
fwrite($one_file, $sm);
fclose($one_file);

// подкарты
$map_start .= '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
$map_start .= '<url><loc>http://'.$_SERVER['SERVER_NAME'].'/</loc><lastmod>'.date("Y-m-d\TH:i:s+02:00").'</lastmod><changefreq>hourly</changefreq><priority>1.00</priority></url>';
$map_end = '</urlset>';
$map_body = '';
$fn=0;
for ($i=0;$i<$total;$i++)
{
  $row = mysql_fetch_array($result);
  $map_body .= '<url><loc>http://'.$_SERVER['SERVER_NAME'].'/'.$row["translitkw"].'.html'.'</loc><changefreq>hourly</changefreq><priority>0.50</priority></url>';
  if(($i%$lim)==0&&$i>0){
    //
    $file_name = 'sitemap'.$fn.'.xml';
$one_file = fopen($file_name,"w");
fwrite($one_file,$map_start.$map_body.$map_end);
fclose($one_file);

$fp = gzopen ($file_name.".gz", 'w9');
gzwrite ($fp, file_get_contents($file_name));
gzclose($fp);

  $fn++;
  $map_body = "";
  }
}

// запись в файл
if(strlen($map_body)>0){
$file_name = 'sitemap'.$fn.'.xml';
$one_file = fopen($file_name,"w");
fwrite($one_file,$map_start.$map_body.$map_end);
fclose($one_file);

$fp = gzopen ($file_name.".gz", 'w9');
gzwrite ($fp, file_get_contents($file_name));
gzclose($fp);
}
?>