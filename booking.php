<?php
include "./database/config.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") { //check data passing method
    if (isset($_SESSION['user_id'])) {
        $date = $_POST['date'];
        $f_time = $_POST['f_time'];
        $t_time = $_POST['t_time'];
        $slot_id = 1;
        $user_id = $_SESSION['user_id'];
        $sql = $db->prepare("INSERT INTO `tbl_booking`(  `user_id`, `book_date`, `from`, `to`, `slot_id`) VALUES ('$user_id','$date','$f_time','$t_time','$slot_id')"); //insert in to the database
        $sql->execute();
        if ($sql) {
            $msg = " Booking Successful";
        }
    }else{
        header("location: login.php");
    }
}

include 'header.php';
?>
<br>
<br>
<br>
<div class="filter-box col-lg-12 pull-left">
<?php if (isset($msg)) {?>
                <aside class="pure-message message-success text-white text-center">
                        <p><?=$msg;?></p>
                    </aside>
<?php }?>
<div class="container">
<div class="row">

        <form method="post" action="booking.php"  class="col-lg-6 pull-left">
            <div class="col-lg-12 pull-left">
            <label class="text-white" for="date">Select Date</label>
                <input name="date" class="form-control" type="date">
            </div>
            <div class="col-lg-12 pull-left">
            <label class="text-white" for="date">Select From Time</label>
                <input name="f_time" class="form-control" type="time">
            </div>
            <div class="col-lg-12 pull-left">
            <label class="text-white" for="date">Select To Time</label>
                <input name="t_time" class="form-control" type="time">
            </div>
            <div class="col-lg-12 pull-left">
                <button type="submit">Book</button>
            </div>
        </form>

</div>
</div>
</div>











<?php include 'footer.php';?>