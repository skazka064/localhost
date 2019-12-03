<?php
require_once "libs/phpQuery.php";
require_once "libs/curl_query.php";
require_once  "libs/pattern.php";

$url ="http://prov-telegraf.ru";
$pattern = "~" . $text . "~si";
function parser_a($url){
    $obj[]=null;
    $html = phpQuery::newDocument(curl_get($url));
    foreach ($html->find("a") as $value){
        $a = pq($value)->attr("href");

        if (!in_array($a,$obj)){
            $obj[]=$a;
        }
    }
    return $obj;
}

function parser_p($url){
    $html = phpQuery::newDocument(curl_get($url));

    foreach ($html->find("#body_table_meddle") as $value){
        $obj = pq($value);
        $text = $obj-> find("p")->text()."<br>"."<br>";
    }
    return $text;
}

$links= parser_a($url);

/*echo "<pre>";
print_r($links);*/

foreach ($links as $link){
    if (preg_match("~/~siU",$link)) {
        $value= "http://prov-telegraf.ru".$link;
        $content = parser_p($value);
        if (preg_match($pattern,$content)){
            echo $value."<br>";
            echo $content."<br>";
        }
    }
}
?>