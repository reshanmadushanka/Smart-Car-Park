<?php
include "./database/config.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") { //check data passing method
    $date = $_POST['date'];
    $f_time = $_POST['time']; //real search time
    $timestamp = (strtotime($f_time) + 60 * 60); //add one hour
    $time = date('H:i', $timestamp);
//get booking data with slot detail------------
    $sql = $db->prepare("SELECT
tbl_booking.*,
tbl_slot.slot_name AS name,
tbl_slot.status AS status
FROM
`tbl_booking`
INNER JOIN tbl_slot ON tbl_slot.id = tbl_booking.slot_id
WHERE
tbl_booking.from >= '$f_time' AND tbl_booking.from < '$time' AND tbl_booking.book_date = '$date'");
    $sql->execute(); //execute query
    $data = $sql->fetchAll(); //insert in to array
    // get not booking slot data----------------
    $slot = $db->prepare("SELECT
    *
FROM
    tbl_slot
WHERE
    id NOT IN(
    SELECT
        slot_id
    FROM
        tbl_booking
    WHERE
        tbl_booking.from >= '$f_time' AND tbl_booking.from < '$time' AND tbl_booking.book_date = '$date'
);");
    $slot->execute();
    $slotdata = $slot->fetchAll();
}
include './header.php';
?>
<div id="parking" class="col-lg-12 pull-left">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center ">
                <h2 class="text-white">Parking Slots</h2>
<p class="text-white">Search result for <?=$date . ' in ' . $f_time . ' to ' . $time?> </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
        <?php
foreach ($data as $slotall) {?>

            <div class="col-lg-3 col-md-6 text-center">
                <div id="park1" class="parking-box mt-5 mx-auto booked">
                     <h3 class="text-white"><?=$slotall['name']?></h3>
                     <p class="text-white"><?="(" . $slotall['from'] . "-" . $slotall['to'] . ") ";?></p>
                     <p class="text-white"><?= $slotall['status'] == '0' ? 'Now Vehicle Parked' : '';?></p>
                </div>
            </div>

        <?php }?>
        <?php
foreach ($slotdata as $slotval) {?>
            <div class="col-lg-3 col-md-6 text-center">
                <div id="park2" class="parking-box mt-5 mx-auto <?=$slotval['status'] == '0' ? 'parked' : '';?>">
                <h3 class="text-white"><?=$slotval['slot_name']?> </h3>
<!-- send data to booking -->
                <form action="booking.php" method="post" >
                <input type="hidden" name="slot_id" value="<?=$slotval['id'];?>">
                <input type="hidden" name="date" value="<?=$date;?>">
                <input type="hidden" name="t_from" value="<?=$f_time;?>">
                <input type="hidden" name="t_to" value="<?=$time;?>">
                 <input class="btn btn-light btn-xl js-scroll-trigger" type="submit" value="Click to Book">
                </form>
                <p  class="text-white"><?=$slotval['status'] == '0' ? 'Now Parked' : '';?></p>
                 </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>
