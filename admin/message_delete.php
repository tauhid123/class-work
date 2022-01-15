<?php
require_once '../db.php';
$id = $_GET['msg_id'];
$delete_query = "DELETE FROM guest WHERE id=$id";
mysqli_query($db_connect,$delete_query);
header('location: show_guest_message.php');
?>