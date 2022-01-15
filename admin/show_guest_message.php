<?php
require_once 'navbar.php';
require_once '../db.php';

if(!isset($_SESSION['status'])){
    header('location: ../../login.php');
}

$get_message_query = "SELECT * FROM guest ";
$message_from_db = mysqli_query($db_connect,$get_message_query);


?>


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>guest message list</h2>
                </div>
                <div class="card-body">
                    <table class="table table-border">
                        <thead>
                            <th>Srial no</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach($message_from_db as $key=> $message):
                            ?>
                            <tr class="<?=($message['read_status']==1) ? 'bg-info' : 'bg-white'
                            ?>">
                                <td><?=$key+1?></td>
                                <td><?=$message['guest_name']?></td>
                                <td><?=$message['guest_email']?></td>
                                <td><?=$message['guest_subject']?></td>
                                <td><?=$message['guest_message']?></td>
                                <td><?php
                                    if($message['read_status']==1):
                                ?>
                                <a href="message_read.php?msg_id=<?=$message['id']?>" class="btn btn-warning">mark as read</a>
                                <?php
                                    endif
                                ?>    
                                <a href="message_delete.php?msg_id=<?=$message['id']?>" class="btn btn-danger">delete</a>
                            </td>

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