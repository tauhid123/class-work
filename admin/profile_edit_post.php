<?php
session_start();
require_once '../db.php';

$user_name =filter_var($_POST['user_name'],FILTER_SANITIZE_STRING);
$user_mobile =$_POST['user_mobile'];
$user_email =filter_var($_POST['user_email'],FILTER_SANITIZE_EMAIL);
$after_valid_email =filter_var($_POST['user_email'],FILTER_VALIDATE_EMAIL);

if($_POST['user_name'] == NULL || $_POST['user_mobile'] == NULL){
    $_SESSION['Profile_edit_err'] = "all feild required";
    header('location: profile_edit.php');

}
else{
    if(strlen($user_mobile)==11){
        $update_query ="UPDATE users SET user_name='$user_name' , user_mobile='$user_mobile' WHERE user_email='$user_email'";
        mysqli_query($db_connect,$update_query);
        header('location: profile.php');

    }else{
        echo "vull";
        header('location: profile_edit.php');
    }
}



?>