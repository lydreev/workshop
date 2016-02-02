<?php

session_start();
//Перенаправление на страницу входа
if (!$_SESSION['auth']) {header("Location: ../enter"); exit;}
//Деавторизация
if ($_POST['logout'])   {session_destroy(); header("Location: ../enter"); exit;}
//Подключение функций и БД
include("../core/functions.php");
db_connect();
//Определение $mode
if ($_POST['edit']) $mode = "edit"; else $mode = "view";

if ($_POST['update']) update_user_info($_SESSION['user_id'],$_POST['username'],$_POST['age']);

get_user_info($_SESSION['user_id']);

?>
