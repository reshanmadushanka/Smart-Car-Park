<?php

include("./database/config.php");
session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($db, "select * from tbl_user where f_name LIKE '$user_check' ");
$data = $ses_sql->fetch_assoc();
$login_session = $data['f_name'];

if (!isset($_SESSION['login_user'])) {
    header("location:login.php");
}
?>