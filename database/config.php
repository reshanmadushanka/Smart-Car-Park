<?php

$dsn = 'mysql:hosy=localhost;dbname=car_park_db';
$username = 'reshan';
$password = 'reshan@123';

try{
    // connect to mysql
    $db = new PDO($dsn,$username,$password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex) {
    echo 'Not Connected '.$ex->getMessage();
}
?>