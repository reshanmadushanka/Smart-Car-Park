<?php
include "./database/config.php";
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") { //check data passing method
    // username and password sent from form
    $f_name = $_POST['f_name']; //get post data
    $l_name = $_POST['l_name']; //get post data
    $nic = $_POST['nic']; //get post data
    $mobile = $_POST['mobile']; //get post data
    $city = $_POST['city']; //get post data
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT); //password convert hash
    $email = $_POST['email'];
    $sql = $db->prepare("INSERT INTO `tbl_user`( `f_name`,`l_name`,`NIC`,`mobile`, `city`,`email`,`role_id`,`password`) VALUES ('$f_name','$l_name','$nic','$mobile','$city','$email','2','$hashed_password')"); //insert in to the database
    $sql->execute();

    if($sql){
        echo "Successfully inserted data";
    }else{
        echo "failed to insert data";
    }
}
?>
<?php include './header.php';?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Register</h5>
                    <?=$msg?>
                    <form class="form-signin" method="post" action="register.php">
                        <div class="form-label-group">
                        <label for="inputEmail">Email address</label><br>
                        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>                          
                        </div>
                        <div class="form-label-group">
                        <label for="f_name">First Name</label><br>
                        <input name="f_name" type="text" id="f_name" class="form-control" placeholder="First Name" required autofocus>                            
                        </div>
                         <div class="form-label-group">
                         <label for="l_name">Last Name</label><br>
                         <input name="l_name" type="text" id="l_name" class="form-control" placeholder="Last Name" required autofocus>                            
                        </div>
                        <div class="form-label-group">
                        <label for="nic">NIC No.</label><br>
                        <input name="nic" type="text" id="nic" class="form-control" placeholder="NIC No." required autofocus>                            
                        </div>
                        <div class="form-label-group">
                        <label for="mobile">Mobile</label><br>
                        <input name="mobile" type="text" id="mobile" class="form-control" placeholder="Mobile" required autofocus>                            
                        </div>
                        <div class="form-label-group">
                        <label for="city">City</label><br>
                        <input name="city" type="text" id="city" class="form-control" placeholder="City" required autofocus>                            
                        </div>
                        <input type="hidden" name="type" id="type" value="custommer" />
                        <div class="form-label-group">
                        <label for="inputPassword">Password</label><br>
                        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>                           
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                        <label class="custom-control-label" for="customCheck1">Remember password</label>
                        <input type="checkbox" class="custom-control-input" id="customCheck1">                            
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php';?>
