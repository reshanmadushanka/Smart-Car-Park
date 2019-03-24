<?php
include("./database/config.php");
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {//check data passing method
    //slot one
    $status = $_POST['distances_s1'];
    print_r($_POST['distances_s2']);
  
    //update database
    $sql = $db->prepare("UPDATE `tbl_slot` SET `status` = '$status' WHERE `tbl_slot`.`id` = 2"); //insert in to the database
    $sql->execute();
   
}