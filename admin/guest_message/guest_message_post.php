<?php
session_start(); 
require_once '../../db.php';

$guest_name = $_POST['guest_name'];
$guest_email = $_POST['guest_email'];
$guest_subject = $_POST['guest_subject'];
$guest_message = $_POST['guest_message'];


$flag = true;

if(!$guest_name){
    $flag = false;
    $_SESSION['guest_name_err'] = "guest name fill first";
}
if(!$guest_email){
    $flag = false;
    $_SESSION['guest_email_err'] = "guest email fill first";
}

if(!$guest_subject){
    $flag = false;
    $_SESSION['guest_subject_err'] = "guest subject fill first";
}

if(!$guest_message){
    $flag = false;
    $_SESSION['guest_message_err'] = "guest message fill first";
}


if($flag){
    $message_insert_query = "INSERT INTO `guest`(`guest_name`, `guest_email`, `guest_subject`, `guest_message`) VALUES ('[$guest_name]','[$guest_email]','[$guest_subject]','[$guest_message]')";
    mysqli_query($db_connect,$message_insert_query);
    $_SESSION['guest_message_succ'] = "your message was sent";

    header('location: ../../index.php');
}else{
    header('location: ../../index.php');
}

?>