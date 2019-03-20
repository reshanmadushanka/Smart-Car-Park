<?php
include("./database/config.php");
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {//check data passing method
    // username and password sent from form 
    $myusername = $_POST['username']; //get post data
    $custommer = $_POST['type']; //get post data
    $hashed_password = $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT); //password convert hash 
    $email = $_POST['email'];
    $sql = "INSERT INTO `tbl_user`( `name`, `email`,type , `password`) VALUES ('$myusername','$email','$custommer','$hashed_password')"; //insert in to the database
    if (mysqli_query($db, $sql)) {//execute query
        $msg = "Records inserted successfully.";
    } else {
        $msg = "ERROR: Could not able to execute " . mysqli_error($db);
    }
    mysqli_close($db); //close db connection
}
?>
<?php include './header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Register</h5>
                    <?= $msg ?>
                    <form class="form-signin" method="post" action="register.php">
                        <div class="form-label-group">
                            <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                            <label for="inputEmail">Email address</label>
                        </div>
                        <div class="form-label-group">
                            <input name="username" type="text" id="inputName" class="form-control" placeholder="User Name" required autofocus>
                            <label for="inputName">First Name</label>
                        </div>
                         <div class="form-label-group">
                            <input name="username" type="text" id="inputName" class="form-control" placeholder="User Name" required autofocus>
                            <label for="inputName">Last Name</label>
                        </div>
                        <div class="form-label-group">
                            <input name="username" type="text" id="inputName" class="form-control" placeholder="User Name" required autofocus>
                            <label for="inputName">Mobile</label>
                        </div>
                        <div class="form-label-group">
                            <input name="username" type="text" id="inputName" class="form-control" placeholder="User Name" required autofocus>
                            <label for="inputName">City</label>
                        </div>
                        <input type="hidden" name="type" id="type" value="custommer" />
                        <div class="form-label-group">
                            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                            <label for="inputPassword">Password</label>
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember password</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
    