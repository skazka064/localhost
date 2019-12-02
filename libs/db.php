<?php
$host = 'localhost'; // хост
$dbname = 'parser'; // название базы
$user = "root"; // логин пользователя
$pass = ''; // пароль
$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$sth = $db->prepare("SELECT * FROM links ");
$sth->execute();
$l = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
