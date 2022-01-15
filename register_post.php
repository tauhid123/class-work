<?php
session_start();
require_once 'db.php';

$user_name =filter_var($_POST["user_name"],FILTER_SANITIZE_STRING);
$user_email =filter_var($_POST["user_email"],FILTER_SANITIZE_EMAIL);
$user_mobile = $_POST["user_mobile"];
$user_pass = $_POST["user_pass"];

$after_valid_email =filter_var($_POST["user_email"],FILTER_VALIDATE_EMAIL);




$all_cap = preg_match('@[A-Z]@',$user_pass);
$all_small = preg_match('@[a-z]@',$user_pass);
$all_num = preg_match('@[0-9]@',$user_pass);
$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
$all_spe_char = preg_match($pattern,$user_pass);




if($_POST['user_name'] == NULL || $_POST['user_email'] == NULL || $_POST['user_mobile'] == NULL || $_POST['user_pass'] == NULL){
    $_SESSION['reg_err'] = "All field requierd";
    header('location: register.php');
}
else{
    if(strlen($user_mobile)==11){
    $check_query = "SELECT COUNT(*) AS total_userss FROM users WHERE user_email='$user_email'";
    ($query_result = mysqli_query($db_connect,$check_query));
    ($afer_assoc = mysqli_fetch_assoc($query_result));
    if($afer_assoc['total_userss'] == 0){
        if($after_valid_email){
            if(strlen($user_pass) > 5 && $all_cap == 1 && $all_small == 1 && $all_num == 1 && $all_spe_char == 1){
                $encript = md5($user_pass);
                $insert_query = "INSERT INTO users(user_name,user_email,user_mobile,user_pass)VALUES('$user_name','$user_email','$user_mobile','$encript')";

                mysqli_query($db_connect,$insert_query);
                $_SESSION['reg_success'] = "Registration successfull";
                header('location: register.php');
            }
            else{
                $_SESSION['reg_err'] = "pass must be 1 small , 1 Cap , 1 num, 1 special char";
                header('location: register.php');
            }
        }
        else{
            $_SESSION['reg_err'] = "invalid Email";
            header('location: register.php');
        }
        
        
    }else{
        $_SESSION['reg_err'] = "alredy registered";
        header('location: register.php');
    }
    }
    else{
        $_SESSION['reg_err'] = "11 digit input kora hoini";
        header('location: register.php');
    }
}




















// if($_POST['user_name'] == NULL || $_POST['user_email'] == NULL || $_POST['user_mobile'] == NULL || $_POST['user_pass'] == NULL){
//     echo "shob form puron kora lagbe";
// }else{
//     if(strlen($user_mobile)==11){
//         $check_query = "SELECT COUNT(*) AS total_users FROM users WHERE user_email='$user_email'";
//         $result = mysqli_query($db_connect,$check_query);
//         $after_assoc = mysqli_fetch_assoc($result);
//         if($after_assoc['total_users'] == 1){
//             echo "Alredy register";
//         }else{
//             $insert_query = "INSERT INTO users(user_name,user_email,user_mobile,user_pass)VALUES('$user_name','$user_email','$user_mobile','$user_pass')";

//             mysqli_query($db_connect,$insert_query);
//             header('location:register.php');
//         }
//     }else{
//         echo "enter 11 digit";
//     }
// }



?> 