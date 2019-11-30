<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<?php
ini_set('error_reporting', E_ALL);
$host = 'localhost'; // хост
$dbname = 'parser'; // название базы
$user = "root"; // логин пользователя
$pass = ''; // пароль
$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$sth = $db->prepare("SELECT * FROM links where dt not like '15-11%' and  dt not like '16-11%' order by id desc ");
$sth->execute();
$l = $sth->fetchAll(PDO::FETCH_ASSOC);
//echo "<pre>";
//var_dump($l);
$i=1;
echo "<table class='table'>";
echo "<thead>";
echo "<tr>";
echo"<th>";
echo "№";
echo "</th>";
echo"<th>";
echo "Дата";
echo "</th>";
echo"<th>";
echo "Ссылка";
echo "</th>";
echo"</tr>";
echo "</thead>";
foreach ($l as $value){
    if (date('d-m-Y',strtotime($value['dt'])))
    echo "<tr>";
    echo "<td>";
    echo $i;
    echo "</td>";
    echo "<td>";
    echo date('d-m-Y',strtotime($value['dt']));
    echo "</td>";

    echo "<td>";
    echo "<a href=".$value['a'].">".$value['a']."</a>";

    echo "</td>";
    echo "</tr>";
    $i++;
}

?>

