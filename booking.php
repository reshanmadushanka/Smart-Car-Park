<?php
include "./database/config.php";
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $time1 = strtotime($_POST['t_from']);
    $time2 = strtotime($_POST['t_to']);
    $location =  $_POST['location'];
    $difference = round(abs($time2 - $time1) / 3600, 2); //calculate hours
    $cal_cost = $difference * 100; //calculate cost
    // get customer detail
    $sql = $db->prepare("SELECT
*
FROM
`tbl_user`
WHERE
id = $user_id");
$sql2 = $db->prepare("SELECT
*
FROM
`tbl_location`
WHERE
id = $location");
    $sql->execute(); //execute query
    $sql2->execute(); //execute query
    $datas = $sql->fetchAll(); //insert in to array
    $locations = $sql2->fetch(PDO::FETCH_ASSOC);
    include 'header.php';
    ?>
    <br>
    <br>
    <br>
    <div class="filter-box col-lg-12 pull-left text-white">
        <h1>Booking Detail</h1>
        <?php if (isset($_SESSION['success'])) { ?>
            <aside class="pure-message message-success">
                <p><?= $_SESSION['success']; ?></p>
            </aside>
        <?php
    } ?>
        <div class="container">
            <div class="row">
                <form method="post" action="payment.php" class="col-lg-6 pull-left">
                    <div class="col-lg-12 pull-left">
                        <label class="text-white" for="date">Name</label>
                        <input name="user_name" value="<?= $_SESSION['login_user']; ?>" readonly class="form-control" type="text">
                    </div>
                    <div class="col-lg-12 pull-left">
                        <label class="text-white" for="date">Vehicle No.</label>
                        <input name="vehical_no" class="form-control" type="text" required="true">
                    </div>
                    
                    <div class="col-lg-12 pull-left">
                        <input type="hidden" name="location" value="<?= $_POST['location'] ?>" />
                        <label class="text-white" for="date">Location </label>
                        <input name="palce" value="<?= $locations['name'] ?>" class="form-control" type="text" required="true">
                    </div>
                    <div class="col-lg-12 pull-left">
                        <label class="text-white" for="date">Select Date</label>
                        <input name="date" value="<?= $_POST['date']; ?>" readonly class="form-control" type="text">
                    </div>
                    <div class="col-lg-12 pull-left">
                        <label class="text-white" for="date">Select From Time</label>
                        <input name="f_time" value="<?= $_POST['t_from'] ?>" class="form-control" type="text" readonly>
                    </div>
                    <div class="col-lg-12 pull-left">
                        <label class="text-white" for="date">Select To Time</label>
                        <input name="t_time" value="<?= $_POST['t_to'] ?>" class="form-control" type="text" readonly>
                    </div>
                    <div class="col-lg-12 pull-left">
                        <label class="text-white" for="date">Parking Slot No.</label>
                        <input name="slot_name" value="<?= $_POST['slot_name'] ?>" class="form-control" type="text" readonly>
                    </div>
                    <div class="col-lg-12 pull-left">
                        <label class="text-white" for="date">No Of Hours</label>
                        <input name="no.of_hours" value="<?= $difference ?>" class="form-control" type="text" readonly>
                    </div>
                    <div class="col-lg-12 pull-left">
                        <label class="text-white" for="date">Price</label>
                        <input name="price" value="<?= $cal_cost; ?>" class="form-control" type="text" readonly>
                    </div>
                    <div>
                        <input type="hidden" name="slot_id" value="<?= $_POST['slot_id']; ?>">
                    </div>
                    <div class="col-lg-12 pull-left">
                        <button type="submit">Book Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>


<?php } else {
    header("location: login.php");
}
?>
<?php include 'footer.php'; ?>