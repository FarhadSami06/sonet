<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/config/database.php';


function add_user($email, $username, $password)
{
    global $db_link;

    $insert_query = 'INSERT '.TBL_USERS.'(`username`, `email`, `password`)
                        VALUES(
                            "'.addslashes($username).'",
                            "'.addslashes($email).'",
                            "'.addslashes($password).'")';


    if($result = mysql_query($insert_query))
    {
        return true;
    }
    return mysql_error();
}






function login_user ($username, $password) {
	global $db_link;
	
	
    $select_query = 'SELECT user_id, username, email FROM '.TBL_USERS.'
                        WHERE `username`="'.addslashes($username).'"
                        AND `password`="'.addslashes($password).'"';

    $result = mysql_query($select_query);
    if(mysql_num_rows($result) == 0)
    {
        return 'Invalid login credentials';
    }

    $row = mysql_fetch_assoc($result);

    // Save the user's data into the 'user' key of our session data
    //$_SESSION['user'] = $row;
   	return $row;
}
