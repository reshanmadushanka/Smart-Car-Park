<?php
session_start();
include "../database/config.php";
if ("POST" == $_SERVER["REQUEST_METHOD"]) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    if ($_FILES['file']['name']!="") {
    $errors = array();
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $fle_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $extensions = array("jpeg", "jpg", "png");
    move_uploaded_file( $fle_tmp , "../assets/img/" . $file_name);
        $sql = $db->prepare("UPDATE `tbl_slider` SET `image`='$file_name',`title`='$title' WHERE `id`='$id' ");
        $sql->execute();
        $_SESSION['success']="Slider Update Successful";
        header("location: slider_list.php");
        
    }else{
        $sql = $db->prepare("UPDATE `tbl_slider` SET `title`='$title' WHERE `id`='$id' ");
        $sql->execute();
        $_SESSION['success']="Slider Text Update Successful";
        header("location: slider_list.php");
    }
}

