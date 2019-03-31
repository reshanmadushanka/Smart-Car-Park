<?php 
include "./database/config.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") { //check data passing method
$date = $_POST['date'];
$f_time = $_POST['f_time'];
$t_time = $_POST['t_time'];
$sql = $db->prepare("");
}
?>