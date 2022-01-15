<?php

require_once '../inc/header.php';
require_once 'navbar.php';
require_once '../db.php';

require_once 'check_admin.php';

$get_user_query = "SELECT * FROM users";
$from_db = mysqli_query($db_connect,$get_user_query);

?>



<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card_header">
                    <h5 class="card-title">user list</h5>
                </div>
                <div class="card-body">
                 <table class="table">
                    <thead>
                        <tr>
                        <th>First</th>
                        <th>Last</th>
                        <th>Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($from_db as $users_data):
                        ?>
                        <tr>
                        <td><?=$users_data['user_name']?></td>
                        <td><?=$users_data['user_email']?></td>
                        <td><?=$users_data['user_mobile']?></td>
                        </tr>
                        <?php
                            endforeach
                        ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>