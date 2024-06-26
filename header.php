<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Smart Car Parking</title>

    <!-- Bootstrap core CSS -->
    <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="./assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="./assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./assets/css/creative.min.css" rel="stylesheet">
    <link href="./assets/css/full-slider.css" rel="stylesheet">
    <link href="./assets/css/custom.css" rel="stylesheet">
    <link href="./assets/css/jquery.datetimepicker.css" rel="stylesheet" type="text/css" />

</head>
<?php session_start(); ?>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="index.php">Smart Car Park</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="parking.php">Parking</a>
                    </li>
                    <?php if (isset($_SESSION['login_user'])) { ?>
                        <li class="nav-item">
                            <a href="profile.php" class="nav-link js-scroll-trigger"><?php echo $_SESSION['login_user']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link js-scroll-trigger">Logout</a>
                        </li>
                    <?php } else{
                ?>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="logout.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="register.php">Register</a>
                    </li>
                    <?php } ?>
                    
                </ul>
            </div>
        </div>
    </nav>