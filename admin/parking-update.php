<?php
session_start();
include "../database/config.php";
if ("POST" == $_SERVER["REQUEST_METHOD"]) {
    $id = $_POST['id'];
//if password enter
    $name = $_POST['name']; //get post data
    $hashed_password = $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT); //password convert hash
    $email = $_POST['email'];
    $sql = $db->prepare("UPDATE `tbl_slot` SET `slot_name`= '$name' WHERE id=$id ");
    $sql->execute();

    if ($sql) {
        $_SESSION['success'] = " Update Successful";
        header("location: ../admin/parking-list.php");
    } else {
        echo " <aside class='pure-message message-warning'>";
        echo "<p><strong>SUCCESS</strong>: Error </p>";
        echo "</aside>";
    }

}
