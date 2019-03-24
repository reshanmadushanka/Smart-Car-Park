<?php

include "../database/config.php";
$rolse = $db->prepare("SELECT * FROM tbl_role");
$rolse->execute();
$role = $rolse->fetchAll(); //insert in to array
if ("POST" == $_SERVER["REQUEST_METHOD"]) {

 $f_name          = $_POST['f_name']; //get post data
 $l_name          = $_POST['l_name']; //get post data
 $nic             = $_POST['nic']; //get post data
 $mobile          = $_POST['mobile']; //get post data
 $city            = $_POST['city']; //get post data
 $hashed_password = $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT); //password convert hash
 $email           = $_POST['email'];
 $sql             = $db->prepare("INSERT INTO tbl_user (`f_name`,`l_name`,`NIC`,`mobile`, `city`,`email`,`role_id`,`password`) VALUES('$f_name','$l_name','$nic','$mobile','$city','$email','2','$hashed_password')");
 $sql->execute();

 if ($sql) {
    header("location: ../admin/user_list.php");
 } else {
    echo " <aside class='pure-message message-warning'>";
    echo "<p><strong>SUCCESS</strong>: Success message.</p>";
    echo "</aside>";
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
                    <form action="register_user.php" method="post" autocomplete="off" class="pure-form pure-form-stacked">
                        <fieldset>
                            <label for="firstname">First Name</label>
                            <input required id="f_name" name="f_name" type="text" placeholder="First Name" class="pure-input-1" value="">

                            <label for="lastname">Last Name</label>
                            <input required id="l_name" name="l_name" type="text" placeholder="Last Name" class="pure-input-1" value="">

                            <label for="email">Email</label>
                            <input required id="email" type="email" name="email" placeholder="Email" class="pure-input-1" value="" >

                           <label for="nic">NIC</label>
                            <input required id="nic" type="text" name="nic" placeholder="NIC" class="pure-input-1" value="" >

                            <label for="mobile">Mobile</label>
                            <input required id="mobile" type="number" name="mobile" placeholder="Mobile" class="pure-input-1" value="" >

                            <label for="city">City</label>
                            <input required id="city" type="text" name="city" placeholder="City" class="pure-input-1" value="" >

                            <label for="role">Role</label>
                            <select required id="role" name="role" class="pure-input-1">
                            <?php foreach($role as $roledata) {?>
                                <option value="<?= $roledata['id']?>"><?= $roledata['name'];?></option>
                            <?php }?>
                            </select>

                            <label for="password">Password</label>
                            <input required id="password" name="password" type="password" placeholder="Password" class="pure-input-1" value="">


                            <!-- <input type="hidden" name="id" value="1"> -->
                            <button type="submit" class="pure-button button-success">Save</button>
                        </fieldset>
                    </form>
                </div>


            </div>
        </div>
    </div>
