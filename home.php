<?php session_start(); require_once('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php
    if (!isset($_SESSION["login"])) {
        $_SESSION["login"] = "start";
    }
    if ($_SESSION["login"] == "False") {
        $_SESSION["login"] = "start";
    }

    $id = $_SESSION['uid'];

    $q = "SELECT FirstName, LastName, UserType FROM user WHERE UserID = '$id'";
    $row = mysqli_fetch_row($mysqli->query($q));
    $mysqli->close();
?>
<head>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <title>Friendly-Neighborhood</title>
    
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
        <!-- Custom styles for this template -->
        <link href="css/landing-page.min.css" rel="stylesheet">
        <link href="profile.css" rel="stylesheet">
    
    </head>
    <style>
        .pb {
            padding-bottom: 50px;
            
        }
        .bg-white{
            background-color: white;
        }

    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light py-3" style="background-color: #e3f2fd; font-size:x-large;">
        <a class="navbar-brand px-3" style="font-weight:bolder;" href="home.php">Friendly-Neighborhood</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <!--<li class="nav-item active">
                    <a class="nav-link" href="#">Categories <span class="sr-only">(current)</span></a>
                </li>-->
                <?php
                    if ($_SESSION["login"] == "True" && $row[2]=='admin') {
                        echo '<li class="nav-item active">
                            <a class="nav-link" href="service.php?id=1">Admin</a>
                        </li>';
                    }
                    if ($_SESSION["login"] == "True" && $row[2]=='staff') {
                        echo '<li class="nav-item active">
                            <a class="nav-link" href="staff.php">Staff</a>
                        </li>';
                    }
                ?>
            </ul>
            <form class="form-inline my-2 my-lg-0 mx-3">
                <div class="float-right">
                    <?php
                    if ($_SESSION["login"] == "start") {
                        echo '<a class="btn btn-primary mr-2" href="login.php">Login</a>';
                        echo '<a class="btn btn-secondary" href="signup.php">Sign Up</a>';
                    }
                    else {
                        echo '<a>'.$row[0]." ".$row[1].'</a>';
                        echo '<a class="btn btn-primary mr-2 ml-3" href="user-profile.php">My Profile</a>';
                        if ($_SESSION["login"] == "True" && $row[2]=='user') {
                            echo '<a class="btn btn-primary" href="shoppingcart.php">My Cart</a>';
                        }
                        echo '<a class="btn btn-secondary" href="logout.php">Logout</a>';
                    }
                    ?>
                </div>
            </form>
        </div>
    </nav>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1 class="" style="color:white;">Welcome to our home service Friendly-Neighborhood</h1>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form action="shopfilter.php" method="POST" role="form">
                    </form>
                </div>
            </div>
        </div>
    </header>

    <section class="features-icons bg-light text-center bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-lg-0 mb-lg-3">
                        <a class="stretched-link" href="service.php?id=1" style="text-decoration:none; color:black;">
                            <div class="features-icons-icon d-flex">
                                <i class="icon-screen-desktop m-auto text-primary"></i>
                            </div>
                            <h3>Service</h3>
                            <p class="lead mb-0">If you want to find some service, search here!</p>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-lg-0 mb-lg-3">
                        <a class="stretched-link" href="tips.php" style="text-decoration:none; color:black;">
                            <div class="features-icons-icon d-flex">
                                <i class="icon-layers m-auto text-primary"></i>
                            </div>
                            <h3>Tips</h3>
                            <p class="lead mb-0">Many tips to maintenance your room, see it here!</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                        <a class="stretched-link" href="aboutus.php" style="text-decoration:none; color:black;">
                            <div class="features-icons-icon d-flex">
                                <i class="icon-check m-auto text-primary"></i>
                            </div>
                            <h3>About Us</h3>
                            <p class="lead mb-0">See more about us, click here!</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Image Showcases -->
    <section class="showcase">
        <div class="container-fluid pb">
            <div class="py-5" style="text-align: center;">
                <!--font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;-->
                <h1 style="text-align: center;">Service Categories</h1>
            </div>
            <div class="row no-gutters">

                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/setting.jpg');"></div>
                
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <a class="stretched-link" style="text-decoration:none; color:black;">
                    <h2>Check up / Setting</h2>
                    <p class="lead mb-0">Having problem setting up a new appliance? &nbsp; We can come and help you set up for your home.</p></a>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/maintenance.jpg');">
                </div>
                <div class="col-lg-6 my-auto showcase-text">
                    <a class="stretched-link" style="text-decoration:none; color:black;">
                    <h2>Maintenance</h2>
                    <p class="lead mb-0">Regular maintenance will no longer be a hassle. &nbsp; Our specialist can take care of it or you. </p></a>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/cleaning.jpg');"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <a class="stretched-link" style="text-decoration:none; color:black;">
                    <h2>Clean up</h2>
                    <p class="lead mb-0">If cleaning up is a trouble, why not let someone else do it? &nbsp; We can provide clean up service at your home.</p></a>
                </div>
            </div>
        </div>
    </section>
    <div name="site-footer">
        <footer class="footer" style="background-color:gainsboro;">
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <form>
                            <label for="email">Sign up to learn and get special offer </label>
                            <input type="text" id="email" name="email" placeholder="E-mail" />
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                            </svg><br><br>
                            <h5>Contact Us</h5><br>
                            <p>Email: &emsp;&emsp; friendlyneighborhood@gmail.com</p>
                            <p>Address: &emsp; Bangkok 10000, Thailand</p>
                        </form>
                    </div>
                    <div class="col-3" style="text-align: center;">
                        <br><br><br><br>
                        <h5 style="color: black;"> Follow Us </h5>
                        <img style="height: 30px; width: 30px;" src="./img/facebook.png">
                        <img style="height: 30px; width: 30px;" src="./img/instagram.png">
                        <img style="height: 30px; width: 30px;" src="./img/twitter.png">
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>