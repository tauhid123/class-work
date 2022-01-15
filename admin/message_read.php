<?php
require_once '../db.php';
$id = $_GET['msg_id'];
$read_query = "UPDATE guest SET read_status = 2 WHERE id='$id'";
mysqli_query($db_connect,$read_query);
header('location: show_guest_message.php');
?>