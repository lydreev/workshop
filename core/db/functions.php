<?php

function get_user_info($user_id)
{
    global $user_info;
    $query = mysql_query("SELECT * FROM users WHERE id='".$user_id."' LIMIT 1");
    $user_info = mysql_fetch_assoc($query); 
}

function update_user_info($user_id, $username, $age)
{
    $query = mysql_query("UPDATE users SET `username` = '$username',`age` = '$age' WHERE users.id =".$user_id);
}

?>