<?php
include('../core/db/db_login.php');
authorization($_POST['login'], $_POST['pass']); 
function authorization($login, $password) 
{ 
	global $user_login;
	$user_login=false; 
    $query = mysql_query("SELECT * FROM users WHERE username='".mysql_real_escape_string($login)."' LIMIT 1");
    if($query)
    {
        $data = mysql_fetch_assoc($query);

        if($data['password'] === md5(md5(trim($password))))
        {
            $_SESSION['auth']=true; 
            $_SESSION['username']=$data['username'];  
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