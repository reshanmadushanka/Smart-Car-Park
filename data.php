<?php
include("./database/config.php");
//check data passing method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //get slot status from arduino
    $status1 = $_POST['s1_status'];
    $status2 = $_POST['s2_status'];
    $status3 = $_POST['s3_status'];
    $status4 = $_POST['s4_status'];
    //update database
    $sql1 = $db->prepare("UPDATE `tbl_slot` SET `status` = '$status1' WHERE `tbl_slot`.`id` = 1"); //insert in to the database
    $sql1->execute();
    $sql2 = $db->prepare("UPDATE `tbl_slot` SET `status` = '$status2' WHERE `tbl_slot`.`id` = 2"); //insert in to the database
    $sql2->execute();
    $sql3 = $db->prepare("UPDATE `tbl_slot` SET `status` = '$status3' WHERE `tbl_slot`.`id` = 3"); //insert in to the database
    $sql3->execute();
    $sql4 = $db->prepare("UPDATE `tbl_slot` SET `status` = '$status4' WHERE `tbl_slot`.`id` = 4"); //insert in to the database
    $sql4->execute();
   
}