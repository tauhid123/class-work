<?php
session_start();
require_once 'db.php';

$user_email = $_POST['user_email'];
$user_pass = md5($_POST['user_pass']);

if($user_email == NULL || $user_pass == NULL){
    echo $_SESSION['login_err'] = "email and password field required";
    header('location: login.php');
}
else{
    $checking_query = "SELECT COUNT(*) AS total_users FROM users WHERE user_email='$user_email' AND user_pass='$user_pass'";
     $result = mysqli_query($db_connect,$checking_query);
     $after_assoc = mysqli_fetch_assoc($result);
     if($after_assoc['total_users'] == 1){
         header('location: admin/dashboard.php');
         $_SESSION['user_email'] = $user_email;
         $_SESSION['status'] = "yes";
     }
     else{
        $_SESSION['login_err'] = "login error ,Register first";
        header('location: login.php');
     }
}

?>