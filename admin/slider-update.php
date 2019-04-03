<?php
session_start();
include "../database/config.php";
if ("POST" == $_SERVER["REQUEST_METHOD"]) {
    $id = $_POST['id'];
    if (isset($_FILES['file'])) {
    $errors = array();
    $title = $_POST['title'];
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $fle_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $extensions = array("jpeg", "jpg", "png");

        if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "../assets/img/" . $file_name);
        $sql = $db->prepare("INSERT INTO `tbl_slider`(`image`, `title`) VALUES ('$file_name', '$title' )");
        $sql->execute();
        $_SESSION['success']="Slider Update Successful";
        header("location: slider_form.php");
        } else {
        print_r($errors);
        }
    }
}

