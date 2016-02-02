<?php
include("../core/controllers/enter.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Workshop | Вход </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <?php if($mode == "authorization"){ ?>

        <h1>Авторизация</h1>
        <hr/>
        <form method="post">
            <p>Логин<br/>  <input type="text" name="login" required /></p>
            <p>Пароль<br/> <input type="password" name="pass" required /></p>
            <p><input type="submit" value="Авторизоваться"/></p>
        </form>
        <hr/>    
        <form method="post">
            <input type="hidden" name="isreg" value="true">
            <p><input type="submit" value="Регистрация"/></p>
        </form>

    <?php } if($mode == "registration"){ ?>    
    
        <h1>Регистрация</h1> 
        <hr/>
        <form method="post">
            <p>Логин<br/><input type="text" name="login"  required/></p>
            <p>Пароль<br/> <input type="password" name="pass" required/></p>
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