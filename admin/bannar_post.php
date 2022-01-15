<?php
session_start();
require_once '../db.php';

$sub_title = $_POST['sub_title'];
$title_top = $_POST['title_top'];
$title_bottom = $_POST['title_bottom'];
$detail = $_POST['detail'];

$upload_size = $_FILES['bannar_image']['size'];

if($upload_size <= 2000000){
    $upload_image_name = $_FILES['bannar_image']['name'];
    $after_explode = explode('.',$upload_image_name);
    $upload_image_ext = end($after_explode);
    $allow_ext = array('jpg','png','jpeg','JPEG','JPG','PNG');
    if(in_array($upload_image_ext,$allow_ext)){
        $insert_bannar_query = "INSERT INTO bannars(sub_title,title_top,title_bottom,detail,image_location)
        VALUES('$sub_title','$title_top','$title_bottom','$detail','primary location')";
        $bannar_from_db = mysqli_query($db_connect,$insert_bannar_query);
        $id_from_db = mysqli_insert_id($db_connect);

       $new_name = $id_from_db. "." .$upload_image_ext;
       $upload_location = "../uploads/bannar/ ".$new_name;

       move_uploaded_file($_FILES['bannar_image']['tmp_name'],$upload_location);
       $db_location = "uploads/bannar/" .$new_name;

       $update_location_query = "UPDATE bannars SET image_location='$db_location' WHERE id=$id_from_db";
       mysqli_query($db_connect,$update_location_query);
       header('location: bannar.php');

    }
    else{
        echo "format thik nai";
    }
}
else{
    echo "upload kor jabe na";
}

?>