<?php
include "./database/config.php";
session_start();
$user_id = $_SESSION['user_id'];
$booking_id = $_POST['booking_id'];
$price = $_POST['price'];
$book_date = $_POST['date'];
// insert payment data
$sql2 = $db->prepare("INSERT INTO `tbl_payment`(`user_id`, `booking_id`, `book_date`, `amount`, `status`) VALUES ('$user_id', '$booking_id', '$book_date', '$price', 'online')");
$sql2->execute(); //execute query
include './header.php';
?>
<section>
<div class="container">
<div class="text-center">
    <h1 class="text-white">Your Payment Success Welcome to Smart Car Parking <br> <?php print_r($_SESSION['login_user']);?></h1>
    </div>
    </div>
     <!-- <h2><a href = "logout.php">Sign Out</a></h2> -->
</section>
<?php include './footer.php';?>