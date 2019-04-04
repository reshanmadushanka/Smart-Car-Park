<?php
include "./database/config.php";
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") { //check data passing method
    
    $name = $_POST['name']; //get post data
    $email = $_POST['email']; //get post data
    $subject = $_POST['subject']; //get post data
    $message = $_POST['message']; //get post data
     
    $sql = $db->prepare("INSERT INTO `tbl_contact`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$message')"); //insert into the database
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
                    <h5 class="card-title text-center">Contact Us</h5>
                    <?=$msg?>
                    <form class="form-signin" method="post" action="contact.php">
                    <div class="form-label-group">
                        <label for="name">Name</label><br>
                        <input name="name" type="text" id="name" class="form-control" placeholder="Name" required autofocus>                            
                        </div>
                        <div class="form-label-group">
                        <label for="inputEmail">Email address</label><br>
                        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>                          
                        </div>                        
                         <div class="form-label-group">
                         <label for="subject">Subject</label><br>
                         <input name="subject" type="text" id="subject" class="form-control" placeholder="Subject" required autofocus>                            
                        </div>
                        <div class="form-label-group">
                        <label for="message">Message</label><br>
                        <input name="message" type="text" id="message" class="form-control" placeholder="Message" required autofocus>                            
                        </div>
                        
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Send</button>
                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php';?>
