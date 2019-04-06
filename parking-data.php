<?php 
include './database/config.php';   
$sql = $db->prepare("SELECT * FROM tbl_slot"); //get data from database
$sql->execute(); //run the query
$data = $sql->fetchAll(); //make a array in php database table data
echo json_encode($data); //json encode the data to read in javascript
?>