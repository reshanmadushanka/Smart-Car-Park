<?php
session_start();
include "../database/config.php";
if ("POST" == $_SERVER["REQUEST_METHOD"]) {
 $id = $_POST['id'];
 if ('' != $_POST['password']) {
//if password enter
  $f_name          = $_POST['f_name']; //get post data
  $l_name          = $_POST['l_name']; //get post data
  $nic             = $_POST['nic']; //get post data
  $mobile          = $_POST['mobile']; //get post data
  $city            = $_POST['city']; //get post data
  $role            = $_POST['role'];
  $hashed_password = $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT); //password convert hash
  $email           = $_POST['email'];
  $sql             = $db->prepare("UPDATE `tbl_user` SET `f_name`= '$f_name',`l_name`='$l_name',`NIC`='$nic',`email`='$email',`mobile`='$mobile',`city`='$city',`role_id`=  '$role',`password`='$hashed_password' WHERE id=$id ");
  $sql->execute();
  
 } else {
//if password not enter use old password
  $f_name = $_POST['f_name']; //get post data
  $l_name = $_POST['l_name']; //get post data
  $nic    = $_POST['nic']; //get post data
  $mobile = $_POST['mobile']; //get post data
  $city   = $_POST['city']; //get post data
  $email  = $_POST['email'];
  $role   = $_POST['role'];
  $sql    = $db->prepare("UPDATE `tbl_user` SET `f_name`= '$f_name',`l_name`='$l_name',`NIC`='$nic',`email`='$email',`mobile`='$mobile',`city`='$city',`role_id`=  '$role' WHERE id='$id' ");
  $sql->execute();
  
  if ($sql) {
    $_SESSION['success']="User Update Successful";
    header("location: ../admin/user_list.php");
   } else {
    $_SESSION['success']="Error";
    header("location: ../admin/user_list.php");
   }

 }
 
}
