<?php

include "../database/config.php";
$rolse = $db->prepare("SELECT * FROM tbl_role");
$rolse->execute();
$role = $rolse->fetchAll(); //insert in to array
if ("POST" == $_SERVER["REQUEST_METHOD"]) {
    if (isset($_FILES['file'])) {
        $errors = array();
        $title = $_POST['title'];
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        $extensions = array("jpeg", "jpg", "png");

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "../assets/img/" . $file_name);
            $sql = $db->prepare("INSERT INTO `tbl_slider`(`image`, `title`) VALUES ('$file_name', '$title' )");
            $sql->execute();
            $_SESSION['success']="User Update Successful";
            header("location: slider_form.php");
        } else {
            print_r($errors);
        }
    }

}
include '../admin/header.php';
?>
 
<div class="content pure-u-1 pure-u-md-21-24">
            <div class="header-small">

                <div class="items">
                    <h1 class="subhead">Profile</h1>
<!--
                    <aside class="pure-message message-success">
                        <p><strong>SUCCESS</strong>: Success message.</p>
                    </aside>
                    <aside class="pure-message message-error">
                        <p><strong>ERROR</strong>: Error message.</p>
                    </aside>
                    <aside class="pure-message message-warning">
                        <p><strong>WARNING</strong>: Warning message.</p>
                    </aside> -->
                    <form action="slider_add.php" enctype="multipart/form-data" method="post" autocomplete="off" class="pure-form pure-form-stacked">
                        <fieldset>
                            <label for="firstname">Title</label>
                            <input required id="title" name="title" type="text" placeholder="Title" class="pure-input-1" value="">

                            <label for="lastname">Image </label>
                            <input required id="file" name="file" type="file" placeholder="Last Name" class="pure-input-1" value="">

                            <!-- <input type="hidden" name="id" value="1"> -->
                            <button type="submit" class="pure-button button-success">Save</button>
                        </fieldset>
                    </form>
                </div>


            </div>
        </div>
    </div>
