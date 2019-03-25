<?php 
include './database/config.php';   
$sql = $db->prepare("SELECT * FROM tbl_slot"); //get data from database
$sql->execute();
$data = $sql->fetchAll(); 
echo json_encode($data);
?>