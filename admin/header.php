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
</head>
<?php
include('../database/config.php');
session_start();
?>
<body>
    <div id="layout" class="pure-g">
        <div class="sidebar pure-u-1 pure-u-md-3-24">
            <div id="menu">
                <div class="pure-menu">
                    <p class="pure-menu-heading">
                    <?php echo $login_session.'Admin'; ?>
                        <a href="../logout.php" class="pure-button button-xxsmall">LOGOUT &raquo;</a>
                    </p>
                    <ul class="pure-menu-list">
                        <li class="pure-menu-selected">
                            <a href="dashboard.html" class="pure-menu-link">Dashboard</a>
                        </li>
                        <li>
                            <a href="../admin/user_list.php" class="pure-menu-link">User Management</a>
                        </li>
                        <li>
                            <a href="parking-list.php" class="pure-menu-link">Parking Management</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>