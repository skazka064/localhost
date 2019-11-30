<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>
<body>
<!-- Шапка -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a href="#" class="navbar-brad"><img src="img/Rosreestr.jpg"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"><span class="navbar-torrler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

            <b style="color: #006fb7;">Парсинг новостных сайтов</b>
            <li class="nav-item"><a href="http://10.64.143.29/" class="nav-link">Назад</a></li>
        </div>
    </div>
</nav>
<br>
<div class="container">
    <form role="form" method="post"  >
        <div class="form-group">

            <input class="btn btn-success btn-lg " type="submit" value="Список_1" name="s1">
            <input class="btn btn-success btn-lg " type="submit" value="Список_2" name="s2">
        </div>
    </form>
</div>

<?php
//ini_set('error_reporting', E_ALL);


if ($_POST['s1']=='Список_1'){

    $host = 'localhost'; // хост
    $dbname = 'parser'; // название базы
    $user = "root"; // логин пользователя
    $pass = ''; // пароль
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $sth = $db->prepare("SELECT
*
FROM
links
WHERE
(dt not like '15-11%' 
and  dt not like '16-11%')
AND a not LIKE '%akirp.ru%'
and 
(a LIKE '%vzsar.ru%' 
OR  a LIKE '%4vsar%'
OR a LIKE  '%fn-volga%'
OR a LIKE '%saratov24.tv%'
OR a LIKE '%sarinform%'
OR a LIKE '%sarbc%'
OR a LIKE '%business-vector%'
OR a LIKE '%saroblnews%'
OR a LIKE '%prov-telegraf%'
OR a LIKE '%nversia%'
OR a LIKE '%om-saratov%'
OR a LIKE '%stroysar%' 
OR a LIKE '%saratovnews%'
OR a LIKE '%saratovdaily%'
OR a LIKE '%sarnovosti%'
OR a LIKE '%province%'
OR a LIKE '%saratov.mk%'
OR a LIKE '%saratov.kp%'
OR a LIKE '%riasar%'
OR a LIKE '%saratov.versia%'
OR a LIKE '%sarvesti%'
OR a LIKE '%delovoysaratov%'
OR a LIKE '%gtrk-saratov%'
OR a LIKE '%novosti-saratova%'
OR a LIKE '%saratov-segodnya%'
OR a LIKE '%sp-64%'
OR a LIKE '%sovetov%'
OR a LIKE '%kommersant%'
OR a LIKE '%medialeaks64%'
OR a LIKE '%g-64.ru%'
OR a LIKE '%reporter64%'
OR a LIKE '%izvestia64%'
OR a LIKE '%saratovmer%'
OR a LIKE '%saratov.gov%'
OR a LIKE '%saratovsegodnya%'

OR a LIKE '%vladeilegko%'
OR a LIKE '%news-life%'
OR a LIKE '%123ru%'
OR a LIKE '%saratov-news%'
OR a LIKE '%mfc64%'
OR a LIKE '%sartpp%'
OR a LIKE '%lizagubernii%'
OR a LIKE '%rsar%'
OR a LIKE '%kresdvor%'

 )
 
 ORDER BY id DESC 

");
    $sth->execute();
    $l = $sth->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
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
        if (date('d.m.Y',strtotime($value['dt'])))
            echo "<tr>";
        echo "<td>";
        echo $i;
        echo "</td>";
        echo "<td>";
        echo date('d.m.Y',strtotime($value['dt']));
        echo "</td>";

        echo "<td>";
        echo "<a href=".$value['a'].">".$value['a']."</a>";

        echo "</td>";
        echo "</tr>";
        $i++;
    }
    unset($_POST);
}else if ($_POST['s2']=='Список_2'){

    $host = 'localhost'; // хост
    $dbname = 'parser'; // название базы
    $user = "root"; // логин пользователя
    $pass = ''; // пароль
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $sth = $db->prepare("SELECT
*
FROM
links
WHERE
(dt not like '15-11%' 
and  dt not like '16-11%')
AND
(a LIKE '%balashover%' 
OR  a LIKE '%gobalakovo%'
OR a LIKE  '%kalininsk.sarmo%'
OR a LIKE '%вольск%'
OR a LIKE '%voskresensk64%'
OR a LIKE '%ekaterinovka.sarmo%'
OR a LIKE '%baladmin%'
OR a LIKE '%marksadm%'
OR a LIKE '%stepnoe-adm%'
OR a LIKE '%admbal%'
OR a LIKE '%ivanteevka.sarmo%' 
OR a LIKE '%pugachev-adm%'
OR a LIKE '%adm.lysyegor%'
OR a LIKE '%engels.me%'
OR a LIKE '%volskweek%'
OR a LIKE '%sutynews%'
OR a LIKE '%duhovnitskoe.sarmo%'
OR a LIKE '%ozinki.sarmo%'
OR a LIKE '%romanovka.sarmo%'
OR a LIKE '%dergachi.sarmo%'
OR a LIKE '%krasnoarmeysk64%'
OR a LIKE '%piterka.sarmo%'
OR a LIKE '%atkarskgazeta%'
OR a LIKE '%ershov.sarmo%'
OR a LIKE '%moyaokruga%'
OR a LIKE '%novouzensk%'
OR a LIKE '%adm-perelyb%'
OR a LIKE '%arkadak.sarmo%'
OR a LIKE '%hvalynsk.sarmo%'
OR a LIKE '%krasny-kut%'
OR a LIKE '%volsklife%'
OR a LIKE '%bkarabulak.sarmo%'
OR a LIKE '%натальино%'
OR a LIKE '%rtishevo.sarmo%'
OR a LIKE '%sam64%'
OR a LIKE '%algay.sarmo%'
OR a LIKE '%engels-city%'

 )
 
 ORDER BY id DESC 


");
    $sth->execute();
    $l = $sth->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
var_dump($_POST);
    echo "</pre>";
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
        if (date('d.m.Y',strtotime($value['dt'])))
            echo "<tr>";
        echo "<td>";
        echo $i;
        echo "</td>";
        echo "<td>";
        echo date('d.m.Y',strtotime($value['dt']));
        echo "</td>";

        echo "<td>";
        echo "<a href=".$value['a'].">".$value['a']."</a>";

        echo "</td>";
        echo "</tr>";
        $i++;
    }
    unset($_POST);

}


?>




</body>
</html>

