<?php

require_once '../inc/header.php';
require_once 'navbar.php';
?>

<div class="container">
      <div class="row mt-5">
        <div class="col-6 m-auto">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h5 class="card-title">Form</h5>
                <a href="register.php">Register</a>
              </div>
              <div class="card-body">
                     <form action="change_pass_post.php" method="post">

                      <div class="mb-3">
                        <label class="form-label">Old password</label>
                        <input type="password"  name="old_pass" class="form-control">
                      </div>
                      
                      <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password"  name="new_pass" class="form-control" >
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password"  name="confirm_pass" class="form-control" >
                      </div>


                      <button type="submit" class="btn btn-info">login</button>
                    </form>
              </div>
            </div>
        </div>
      </div>
    </div>