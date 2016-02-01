<?php
session_start();
//Проверка правильности ввода логин-пароль
if (isset($_POST['login']) and isset($_POST['pass']) and !isset($_POST['isreg'])){include_once("../core/auth/auth_check.php");}
if (isset($_POST['login']) and isset($_POST['pass']) and isset($_POST['isreg'])){include_once("../core/auth/registration.php");}

//Если пользователь авторизован - перенаправление в личный кабинет
if($_SESSION['auth']){session_write_close(); header("Location: ../room"); exit();}
?>

<!DOCTYPE html>
<html>
<head>
<title>Workshop | Вход </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

    
<?php if(!isset($_POST['isreg'])){ ?>
    <h1>Авторизация</h1>    
    <form method="post">
        <p>Логин<br/><input type="text" name="login" /></p>
        <p>Пароль<br/> <input type="password" name="pass" /></p>
        <p><input type="submit" value="Авторизоваться"/></p>
    </form>
    <hr/>    
    <form method="post">
        <input type="hidden" name="isreg" value="true">
        <p><input type="submit" value="Регистрация"/></p>
    </form>
<?php } else { ?>    
    <h1>Регистрация</h1>    
    <form method="post">
        <p>Логин<br/><input type="text" name="login" /></p>
        <p>Пароль<br/> <input type="password" name="pass" /></p>
        <input type="hidden" name="isreg" value="true">
        <p><input type="submit" value="Зарегистрироваться"/></p>
    </form>
    <hr/>    
    <form method="post">
        <p><input type="submit" value="Авторизация"/></p>
    </form>
<?php } ?>    
</body>
</html>