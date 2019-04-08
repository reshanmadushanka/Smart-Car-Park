<?php
include './header.php';
session_start();

?>
<section>
<div class="container">
<div class="text-center">
    <h1 class="text-white">Welcome to Smart Car Parking <br> <?php print_r($_SESSION['login_user']);?></h1>
    </div>
    </div>
     <!-- <h2><a href = "logout.php">Sign Out</a></h2> -->
</section>
<?php include './footer.php';?>