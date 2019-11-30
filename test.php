<?php
//ini_set('error_reporting', E_ALL);
include_once 'libs/simple_html_dom.php';
include_once 'libs/curl_query.php';
include_once 'libs/charset.php';



$array = array('http://krasny-kut.ru');
$text = 'Кадастр|Ахмеров|Терехова|Варакина|Росреестр|Гришин';

//Создаем цикл, в процессе которого проходим весь массив с url адресами
foreach ($array as $arr) {
    echo $url = $arr;
    echo "<br>";
    $html = curl_get($url);
    echo $charset = detect_charset($html);
    echo "<br>";

    $dom = str_get_html($html);

    if ($dom == true) {
        $objects = $dom->find('a');
    }

    foreach ($objects as $object) {
        $links[] = $object->href;
    }
    foreach ($links as $link) {
        if (preg_match('|^/|', $link)) {
            $link = $url . $link;
        }
        echo$html2 = curl_get($link);
        $dom2 = str_get_html(html2);
        $headlines = array();
        $header = $dom2->find('p');
        $headlines[] = $header->plaintext;
    }






}
foreach ($headlines as $headline){

if ($charset == 'windows-1251') {
    $encoding = mb_convert_encoding($text, 'Windows-1251', 'utf-8');
    $pattern = "~" . $encoding . "~si";
} else {
    $pattern = "~" . $text . "~si";
}
if (preg_match($pattern, $headline, $out)) {
    $outs[] = $out;

}
}
var_dump($outs);
?>