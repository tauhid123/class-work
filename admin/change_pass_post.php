<?php
require_once '../db.php';

$user_email = $_POST['user_email'];

$old_pass = $_POST['old_pass'];
$new_pass = $_POST['new_pass'];
$confirm_pass = $_POST['confirm_pass'];


if($new_pass == $confirm_pass){
    $encpt_old_pass = md5($old_pass);
    $checking_old_pass = "SELECT COUNT(*) AS total_user FROM users WHERE user_email='$user_email' AND user_pass='$encpt_old_pass'";

    $from_db = mysqli_query($db_connect,$checking_old_pass);

    $after_assoc = mysqli_fetch_assoc($from_db);

    // if($after_assoc['total_user'] == 1){
    //     echo "go";
    // }
    // else{
    //     echo "back";
    // }

}
else{
    echo "new and confirm pass did not match";
}


?>