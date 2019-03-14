<?php
include('sessions.php');
?>
<?php include './header.php'; ?>
<section>
    <h1>Welcome Keshaw <?php echo $login_session; ?></h1> 
    <h2><a href = "logout.php">Sign Out</a></h2>
</section>
<?php include './footer.php'; ?>