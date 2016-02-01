<?php
include('../core/db/db_login.php');
registration($_POST['login'], $_POST['pass']); 
function registration($login, $password) 
{ 
    $pass_hash = md5(md5(trim($password)));
    $query = mysql_query("INSERT INTO users (`username` ,`password`) VALUES ('".mysql_real_escape_string($login)."', '".mysql_real_escape_string($pass_hash)."' )");
}
?>