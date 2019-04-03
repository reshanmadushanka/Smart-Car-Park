<?php
session_start();
include "../database/config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $db->prepare("DELETE FROM `tbl_slider` WHERE id=$id"); //get slider details
    $sql->execute();
    if ($sql) {
        $_SESSION['success']="Delete Record Successful";
        header("location: ../admin/slider_list.php");
       } else {
        echo " <aside class='pure-message message-warning'>";
        echo "<p><strong>SUCCESS</strong>: Error </p>";
        echo "</aside>";
       }
} else {
    echo "Error";
}
