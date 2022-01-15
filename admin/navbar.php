<?php
require_once '../inc/header.php';
require_once 'check_admin.php';

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse container" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <div class="dropdown">
  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    frontend
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="show_guest_message.php">guest_message <?php
    require_once '../db.php';
    $get_unread_message = "SELECT COUNT(*) AS unread FROM guest WHERE read_status= '1'";
    $unread_msg_from_db = mysqli_query($db_connect,$get_unread_message);
    $after_msg_assoc = mysqli_fetch_assoc($unread_msg_from_db);
    ?> <span class="badge bg-danger"><?=$after_msg_assoc['unread']?></span></a></li>
    <li><a class="dropdown-item" href="bannar.php">bannar</a></li>
    <li><a class="dropdown-item" href="#">someting else</a></li>
  </ul>
</div>
    </ul>
    
    <div class="dropdown">
  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    <?=$_SESSION['user_email']?>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
    <li><a class="dropdown-item" href="change_pass.php">Password change</a></li>
    <li><a class="dropdown-item text-danger" href="../loguot.php">Loguot</a></li>
  </ul>
</div>


</nav>
<?php
require_once '../inc/footer.php';

?>