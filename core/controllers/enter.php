<?php

session_start();
//Подключение функций и БД
include("../core/functions.php");
db_connect();
//Определение $mode
if (isset($_POST['isreg'])) $mode = "registration"; else $mode = "authorization";

if (isset($_POST['login']) and isset($_POST['pass']))
{
    if ($mode ==  "registration")  registration($_POST['login'], $_POST['pass']); 
    if ($mode == "authorization") authorization($_POST['login'], $_POST['pass']);
}

//Если пользователь авторизован - перенаправление в личный кабинет
if($_SESSION['auth']){session_write_close(); header("Location: ../room"); exit();}

?>