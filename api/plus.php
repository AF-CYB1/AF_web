<?php
session_start();
//Это комментарий

$x = $_REQUEST["x"];
$y = $_REQUEST["y"];
$z = $x + $y;
$u = $_SESSION["user"];
// Здесь нарушены принципы безопасности:
// 1. Принцип наименьших привилегий
// 2. Слабый пароль
// 3. Секрет в коде
//$conn = mysqli_connect("localhost","root","","calc");
// 4. Код, уязвимый для Sql-injection

//Первые три проблемы исправлены ниже:
//include(getenv("MYAPP_CONFIG"));
//include("C:\\AppParams\\params.php");
include(getenv("MYAPP_CONFIG"));
$conn = mysqli_connect($DB_URL,$DB_USER,$DB_PWD,$DB_NAME);

$sql = "INSERT INTO log(Number1,Number2,Result,UserID,Timestamp) VALUES($x,$y,$z,'$u',now()";
mysqli_query($conn,$sql);
//echo(mysqli_error($conn));
mysqli_close($conn);
echo($z);
?>