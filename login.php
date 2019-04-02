<?php
include "./database/config.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myusername =  $_POST['username'];
    $mypassword =  $_POST['password'];

    $sql = $db->prepare("SELECT * FROM tbl_user WHERE email LIKE '$myusername'"); //get user details
    $sql->execute();
    $data = $sql->fetch(PDO::FETCH_ASSOC);
    if (password_verify($mypassword, $data['password'])) { //check password
        $_SESSION['login_user'] = $data['f_name']; //add data to session
        $_SESSION['user_id'] = $data['id']; //add data to session
        $_SESSION['user_type'] = $data['role_id']; //add data to session
        if ($data['role_id'] == "1") {
            header("location: admin/index.php");
        } else if ($data['role_id'] == "2") {
            header("location: dashboard.php");
        } else if ($data['role_id'] == "3") {
            header("location: dashboard.php");
        } else {
            header("location: admin/index.php");
        }
    }else{
        echo "Your Login Name or Password is invalid";
    }
}
?>
<?php include './header.php';?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign In</h5>
                    <form class="form-signin" method="post" action="login.php">
                        <div class="form-label-group">
                            <input name="username" type="text" id="name" class="form-control" placeholder="Email address" required autofocus>
                            <label for="name">Email address</label>
                        </div>

                        <div class="form-label-group">
                            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                            <label for="inputPassword">Password</label>
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember password</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php';?>