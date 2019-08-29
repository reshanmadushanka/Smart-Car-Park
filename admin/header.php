<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Smart Car Parking">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../assets/admin/css/pure-min.css">
    <link rel="stylesheet" href="../assets/admin/css/pure-responsive-min.css">
    <link rel="stylesheet" href="../assets/admin/css/style.css">
    <link rel="stylesheet" href="../assets/admin/css/custom.css">
</head>
<?php
include '../database/config.php';
session_start();
$sql = $db->prepare('select * from tbl_booking where is_show = 0');
$sql->execute();
$data = $sql->fetchAll();
if (!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != '')) {

    header("Location: ../login.php");

}
?>
<body>
    <div id="layout" class="pure-g">
        <div class="sidebar pure-u-1 pure-u-md-3-24">
            <div id="menu">
                <div class="pure-menu">
                    <p class="pure-menu-heading">
                    <?php echo $_SESSION['login_user']; ?>
                        <a href="../logout.php" class="pure-button button-xxsmall">LOGOUT &raquo;</a>
                    </p>

                    <ul class="pure-menu-list">
                    <li class="pure-menu-link">
                            <a href="notification_list.php" class="notification">
                                 <span>New Booking</span>
                                 <span class="badge"><?php echo count($data); ?></span>
                            </a>
                        </li>
                        <li class="pure-menu-selected">
                            <a href="index.php" class="pure-menu-link">Dashboard</a>
                        </li>

                        <li>
                            <a href="user_list.php" class="pure-menu-link">User Profile Management</a>
                        </li>
                        <li>
                            <a href="parking-list.php" class="pure-menu-link">Parking Slot Management</a>
                        </li>
                        <li>
                            <a href="slider_list.php" class="pure-menu-link">Frontend Management</a>
                        </li>
                        <li>
                            <a href="booking_list.php" class="pure-menu-link">Slot Booking Management</a>
                        </li>
                        <li>
                            <a href="report_list.php" class="pure-menu-link">User Report Management</a>
                        </li>
                        <li>
                            <a href="user_reservation_list.php" class="pure-menu-link">User Reservation Management</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
