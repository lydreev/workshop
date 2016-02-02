<?php

function db_connect()
{
    $db_host='localhost';
    $db_database='workshop';
    $db_username='root';
    $db_password='';
    
    $connection = mysql_connect($db_host, $db_username, $db_password); mysql_query("SET NAMES 'utf8'"); 
    //if (!$connection) { die("Невозможно подключиться к базе данных:". mysql_error()); }
    $db_select = mysql_select_db($db_database); 
    //if (!$db_select)  { die("Невозможно выбрать базу данных:". mysql_error()); } 
}

function get_user_info($user_id)
{
    global $user_info;
    $user_info = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id='".$user_id."' LIMIT 1")); 
}

function update_user_info($user_id, $username, $age)
{
    $query = mysql_query("UPDATE users SET `username` = '".$username."',`age` = '".$age."' WHERE users.id =".$user_id);
}

function registration($login, $password) 
{ 
    $pass_hash = md5(md5(trim($password)));
    mysql_query("INSERT INTO users (username, password) VALUES ('".$login."', '".$pass_hash."' )");
    authorization($login, $password);
}

function authorization($login, $password) 
{ 
	global $user_login;
	$user_login=false; 
    $query = mysql_query("SELECT id, password FROM users WHERE username='".$login."' LIMIT 1");
    if($query)
    {
        $data = mysql_fetch_assoc($query);
        if($data['password'] === md5(md5(trim($password))))
        {
            $_SESSION['auth']=true; 
            $_SESSION['user_id']=$data['id'];  
            $user_login=true; 
            session_write_close();
            header("Location: ../room"); 
            exit();
        }
        else
        {
            $user_login=false; 
            $_SESSION['auth']=false; 
        }
    }
	return $user_login; 
}

?>