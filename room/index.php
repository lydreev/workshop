<?php
session_start();
//Закончить сессию,если нажали кнопку ВЫХОД
if ($_POST['logout']){session_destroy();header("Location: ../enter");exit;}
//Перенаправление на страницу входа, если юзер не авторизовался
if (!$_SESSION['auth']) { header("Location: ../enter"); exit;}

include('../core/db/db_login.php');
include('../core/db/functions.php');

if($_POST['edit']) update_user_info($_SESSION['user_id'],$_POST['username'],$_POST['age']);

get_user_info($_SESSION['user_id']);

?>

<!DOCTYPE html>
<html>
<head>
<title>Workshop | Кабинет </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <h1>Кабинет</h1>
    <hr/>
    
    
<?php if (!$_POST['edit-regime']){?>
    <table border="1">
        <tr>
            <td>id</td>    
            <td><?php echo $user_info['id'];?></td>
        </tr>
        <tr>
            <td>username</td>    
            <td><?php echo $user_info['username'];?></td>
        </tr>
        <tr>
            <td>age</td>    
            <td><?php echo $user_info['age'];?></td>
        </tr>
    </table>
    
    <form method="post">
        <input type="hidden" name="edit-regime" value="true" />
        <p><input type="submit" value="Редактировать"/></p>
    </form>
    
<?php } else {?>
    
    <form method="post">
        username <br/>
        <input type='text' name="username" value="<?php echo $user_info['username'];?>" required /><br/>
        age <br/>
        <input type='text' name="age" value="<?php echo $user_info['age'];?>" />
        <input type="hidden" name="edit" value="true" />
        <p><input type="submit" value="Сохранить"/></p>
    </form>
    
    <form method="post">
        <p><input type="submit" value="Отмена"/></p>
    </form>
    
<?php } ?>    
    
    
    <hr/>
    <form method="post">
        <input type="hidden" name="logout" value="true" />
        <p><input type="submit" value="Выход"/></p>
    </form>
</body>
</html>