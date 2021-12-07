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
    
        <title>sign up</title>
    
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
        
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }
        
        /* Set a style for all buttons */
        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }
        
        /* Extra styles for the cancel button */
        .cancelbtn {
            padding: 14px 20px;
            background-color: #f44336;
        }
        
        /* Float cancel and signup buttons and add an equal width */
        .cancelbtn, .signupbtn {
            
            width: 50%;
        }
        
        /* Add padding to container elements */
        .container {
            padding: 16px;
        }
        
        /* Clear floats */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
        
        /* Change styles for cancel button and signup button on extra small screens */
        @media screen and (max-width: 300px) {
            .cancelbtn, .signupbtn {
                width: 100%;
            }
        }

        .ptb{
            padding: 80px;
        }
    </style>
</head>
<body>
    <body data-new-gr-c-s-check-loaded="14.1036.0" data-gr-ext-installed="">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light py-3" style="background-color: #e3f2fd; font-size:x-large;">
            <a class="navbar-brand px-3" style="font-weight:bolder;" href="home.php">Friendly-Neighborhood</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
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
    
        <div class="container" style="text-align: center;">
            
            <form class="login100-form validate-form" action="signupcheck.php" method="POST" role="form">
                <h1 class="ptb">Thank you for using our service</h1>
                <hr>
                <div class="clearfix py-3">
                    <button type="submit" class="signupbtn" onclick="history.back();">Back to home page</button>
                </div>
            </form><br><br><br><br><br>
        </div>
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
</body>
</html>