<?php
include("../core/controllers/room.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Workshop | Кабинет </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    
    <h1>Кабинет</h1><hr/>

    <?php if ($mode == "view"){?>

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
            <input type="hidden" name="edit" value="true" />
            <p><input type="submit" value="Редактировать"/></p>
        </form>

    <?php } if ($mode == "edit"){?>

        <form method="post">
            username <br/>
            <input type='text' name="username" value="<?php echo $user_info['username'];?>" required /><br/>
            age <br/>
            <input type='text' name="age" value="<?php echo $user_info['age'];?>" />
            <input type="hidden" name="update" value="true" />
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