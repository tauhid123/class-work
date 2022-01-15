<?php

require_once '../inc/header.php';
require_once 'navbar.php';
require_once '../db.php';

require_once 'check_admin.php';

$login_email = $_SESSION['user_email'];


$get_profile_query = "SELECT user_name,user_mobile FROM users WHERE user_email='$login_email'";
$from_db = mysqli_query($db_connect,$get_profile_query);
$after_assoc = mysqli_fetch_assoc($from_db);

?>



<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card_header d-flex justify-content-between">
                    <h5 class="card-title">profile</h5>
                    <a href="profile_edit.php" class="btn btn-info">edit</a>
                </div>
                <div class="card-body">

                <p><strong>Name:</strong><?=$after_assoc['user_name']?></p>
                <p><strong>Mobile:</strong><?=$after_assoc['user_mobile']?></p>
                
                 <!-- <table class="table">
                    <thead>
                        <tr>
                        
                        <th>Last</th>
                        <th>Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                        <td></td>
                        <td></td>
                        </tr>
                        
                    </tbody>
                    </table> -->
                </div>
            </div>
        </div>
    </div>
</div>