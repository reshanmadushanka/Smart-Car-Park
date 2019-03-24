<?php
include '../admin/header.php';

if (isset($_GET['id'])) {
 $id  = $_GET['id']; // for testing purposes
 $sql = $db->prepare("SELECT * FROM tbl_user WHERE id = '$id'"); //get user details
 $sql->execute();
 $data = $sql->fetch(PDO::FETCH_ASSOC);
// get role list
$rolse = $db->prepare("SELECT * FROM tbl_role");
$rolse->execute();
$role = $rolse->fetchAll(); //insert in to array

} else {
 echo "Something went wrong!";
}

?>
<div class="content pure-u-1 pure-u-md-21-24">
            <div class="header-small">

                <div class="items">
                    <h1 class="subhead">Profile</h1>
                    <form action="update-user.php" method="post" autocomplete="off" class="pure-form pure-form-stacked">
                        <fieldset>
                            <label for="firstname">First Name</label>
                            <input required id="f_name" name="f_name" type="text" placeholder="First Name" class="pure-input-1" value="<?=$data['f_name']; ?>">

                            <label for="lastname">Last Name</label>
                            <input required id="l_name" name="l_name" type="text" placeholder="Last Name" class="pure-input-1" value="<?=$data['l_name']; ?>">

                            <label for="email">Email</label>
                            <input required id="email" type="email" name="email" placeholder="Email" class="pure-input-1" value="<?=$data['email']; ?>" >

                           <label for="nic">NIC</label>
                            <input required id="nic" type="text" name="nic" placeholder="NIC" class="pure-input-1" value="<?=$data['NIC']; ?>" >

                            <label for="mobile">Mobile</label>
                            <input required id="mobile" type="number" name="mobile" placeholder="Mobile" class="pure-input-1" value="<?=$data['mobile']; ?>" >

                            <label for="city">City</label>
                            <input required id="city" type="text" name="city" placeholder="City" class="pure-input-1" value="<?=$data['city']; ?>" >

                            <label for="role">Role</label>
                            <select required id="role" name="role" class="pure-input-1">
                            <?php foreach($role as $roledata) {?>
                                <option <?= $roledata['id']==$data['role_id']?'selected':''; ?> value="<?= $roledata['id']?>"><?= $roledata['name'];?></option>
                            <?php }?>
                            </select>

                            <label for="password">Password</label>
                            <input id="password" name="password" type="password" placeholder="Password" class="pure-input-1" value="">


                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button type="submit" class="pure-button button-success">Save</button>
                        </fieldset>
                    </form>
                </div>


            </div>
        </div>
    </div>