<?php
require_once '../inc/header.php';
require_once 'navbar.php';
require_once '../db.php';

$get_bannar_query = "SELECT * FROM bannars";
$from_bd = mysqli_query($db_connect,$get_bannar_query);

?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title">Bannar add form</h5>
                    </div>
                    <div class="card-body">
                        <form action="bannar_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="text" name="sub_title" class="form-control" placeholder="sub_title">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="title_top" class="form-control" placeholder="title_top">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="title_bottom" class="form-control" placeholder="title_bottom">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="detail" class="form-control" placeholder="detail">
                            </div>
                            <div class="mb-3">
                                <input type="file" name="bannar_image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary w-100">add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title">BAn</h5>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered">
                    <thead>
                        <th>sub title</th>
                        <th>title2</th>
                        <th>title3</th>
                        <th>detail</th>
                        <th>image location</th>
                        <th>active status</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach($from_bd as $bannars):
                        ?>
                        <tr>
                            <td><?=$bannars['sub_title']?></td>
                            <td><?=$bannars['title_top']?></td>
                            <td><?=$bannars['title_bottom']?></td>
                            <td><?=$bannars['detail']?></td>
                            <td><img src="../<?=$bannars['image_location']?>" alt="" style="width:100px;"></td>
                            <td><?=$bannars['sub_title']?></td>
                            <td></td>
                           
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
</section>









<?php
    require_once '../inc/footer.php';
?>