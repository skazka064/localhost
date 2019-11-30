<?php




ini_set('error_reporting', E_ALL);
include_once 'libs/simple_html_dom.php';
include_once 'libs/curl_query.php';
include_once 'libs/charset.php';
include_once 'libs/pattern.php';
//include_once 'libs/array.php';


exec('chcp 65001');
$array = array('http://gtrk-saratov.ru','www.novosti-saratova.ru','http://saratov-segodnya.ru','http://sp-64.ru','http://sovetov.su','https://www.kommersant.ru/regions/64','http://medialeaks64.ru','http://g-64.ru/official.php','http://reporter64.ru','http://izvestia64.ru','http://www.saratovmer.ru','https://saratov.gov.ru','http://akirp.ru','https://vladeilegko.ru','https://news-life.ru','https://123ru.net/saratov','http://saratov-news.net','http://www.mfc64.ru','http://sartpp.ru/ru','http://lizagubernii.ru');
//$text = 'Кадастр|Ахмеров|Терехова|Варакина|Росреестр|Гришин';

$outs[] = [];
echo "В массиве " . count($array) . " адресов" . "<br>";

$host = 'localhost'; // хост
$dbname = 'parser'; // название базы
$user = "root"; // логин пользователя
$pass = ''; // пароль
$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$sth = $db->prepare("SELECT * FROM links ");
$sth->execute();
$l = $sth->fetchAll(PDO::FETCH_ASSOC);
$a[] = [];
for ($i = 0; $i < count($l); $i++) {

    $a[$i] = $l[$i]['a'];

}


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

    if ($charset == 'windows-1251') {
        $encoding = mb_convert_encoding($text, 'Windows-1251', 'utf-8');
        $pattern = "~" . $encoding . "~si";
    } else {
        $pattern = "~" . $text . "~si";
    }

    foreach ($links as $link) {
        if (preg_match('|^/|', $link)) {
            $link = $url . $link;
        }

        $html2 = curl_get($link);


        if ((preg_match($pattern, $html2, $out)) && !in_array($link, $outs) && !in_array($link, $a)) {
            $outs[] = $link;
            $dt = date('d.m.Y H:i:s');
            $sql = "INSERT INTO links(dt,a) VALUES('$dt','$link')";
            $res = $db->exec($sql);

        }

    }
}
echo "<pre>";
print_r($a);
print_r($outs);
//sleep('30000000');



