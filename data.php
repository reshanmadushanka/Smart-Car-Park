<?php
include("./database/config.php");
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {//check data passing method
    //slot one
    if ($_POST['distances_s1'] > 5) {
        $status = 1;
    } else {
        $status = 0;
    }

    if ($_POST['distances_s2'] > 5) {
        $status1 = 1;
    } else {
        $status1 = 0;
    }
    // username and password sent from form 
    $sql = "UPDATE `tbl_slot` SET `status` = '$status' WHERE `tbl_slot`.`id` = 2"; //insert in to the database
    if (mysqli_query($db, $sql)) {//execute query
        $msg = "Records inserted successfully.";
    } else {
        $msg = "ERROR: Could not able to execute " . mysqli_error($db);
    }
    echo $msg;
    mysqli_close($db); //close db connection
}