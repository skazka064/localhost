<?php
ini_set('error_reporting', E_ALL);
$host = 'localhost'; // хост
$dbname = 'parser'; // название базы
$user = "root"; // логин пользователя
$pass = ''; // пароль
$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$sth = $db->prepare("SELECT a FROM links ");
$sth->execute();
$l = $sth->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
var_dump($l);

?>

