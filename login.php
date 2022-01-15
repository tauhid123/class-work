<?php
session_start();
require_once 'inc/header.php';

if(isset($_SESSION['status'])){
  header('location: admin/dashboard.php');
}

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
                <?php
                  if(isset( $_SESSION['login_err'])){
               ?>
                  <div class="alert alert-danger" role="alert">
                <?php
                  echo  $_SESSION['login_err'];
                  unset($_SESSION['login_err']);
                ?>
              </div>
                <?php
                  }
                ?>

                     <form action="login_post.php" method="post">

                      <div class="mb-3">
                        <label class="form-label">User Email</label>
                        <input type="email"  name="user_email" class="form-control">
                      </div>
                      
                      <div class="mb-3">
                        <label class="form-label">User Password</label>
                        <input type="password"  name="user_pass" class="form-control" >
                      </div>

                      <button type="submit" class="btn btn-info">login</button>
                    </form>
              </div>
            </div>
        </div>
      </div>
    </div>

    <?php
    
    require_once 'inc/footer.php';
    
    ?>