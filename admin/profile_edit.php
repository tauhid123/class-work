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
                <div class="card_header">
                    <h5 class="card-title">Profile edit</h5>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_SESSION['Profile_edit_err'])){
                    ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                        echo $_SESSION['Profile_edit_err'];
                        unset($_SESSION['Profile_edit_err']);
                    ?>
                    </div>
                    <?php
                        }
                    ?>
                <form action="profile_edit_post.php" method="post">

                    <div class="mb-3">
                    <input type="hidden" name="user_email" class="form-control" value="<?=$login_email?>">

                    <label class="form-label">User name</label>
                    <input type="text" name="user_name" class="form-control" value="<?=$after_assoc['user_name']?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label">User mobile</label>
                    <input type="text"  name="user_mobile" class="form-control" value="<?=$after_assoc['user_mobile']?>">
                    </div>

                    <button type="submit" class="btn btn-info">Change</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>