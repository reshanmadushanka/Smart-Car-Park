<?php

include "../database/config.php";
session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = $db->prepare("select * from tbl_user where f_name LIKE '$user_check' ");
$ses_sql->execute();
$data = $ses_sql->fetch(PDO::FETCH_ASSOC);

$login_session = $data['f_name'];

if (!isset($_SESSION['login_user'])) {
    header("location:login.php");
}
