<?php
require_once "libs/phpQuery.php";
require_once "libs/curl_query.php";

$url ="http://www.sarbc.ru";

function parser_a($url){
    $html = phpQuery::newDocument(curl_get($url));
    foreach ($html->find("a") as $value){
        $obj[] = pq($value)->attr("href");
    }
    return $obj;
}

function parser_p($url){
    $html = phpQuery::newDocument(curl_get($url));

    foreach ($html->find(".news-page-content") as $value){
        $obj = pq($value);
        $text = $obj-> find("p")->text()."<br>"."<br>";
    }
    return $text;
}



$arr= parser_a($url);
foreach ($arr as $value){
    if (preg_match("~^http[s]{0,1}://news.sarbc.ru~siU",$value)) {
       echo "$value"."<br>";
      print parser_p($value);
    }

}






?>
