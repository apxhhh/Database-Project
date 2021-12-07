<?php session_start(); require_once('connect.php'); 

$id = $_SESSION['uid'];
    $q = "SELECT * FROM user WHERE UserID = '$id'";
    
    if (!$mysqli->query($q))
    echo "UPDATE failed. Error: " .$mysqli->error;
    $result = $mysqli->query($q);
    $row = $result->fetch_array();

    $mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

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

    </head>
</head>


<body data-new-gr-c-s-check-loaded="14.1036.0" data-gr-ext-installed="">
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
                <li class="nav-item active">
                    <a class="nav-link" href="tips.php">Tips</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="aboutus.php">About Us</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 mx-3">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" />
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <div class="float-right">
                    <?php
                    if ($_SESSION["login"] == "start") {
                        echo '<a class="btn btn-primary mr-2" href="login.php">Login</a>';
                        echo '<a class="btn btn-secondary" href="signup.php">Sign Up</a>';
                    }
                    else {
                        echo '<a>'.$row[4]." ".$row[5].'</a>';
                        echo '<a class="btn btn-primary mr-2 ml-3" href="userprofile.php">My Profile</a>';
                        echo '<a class="btn btn-secondary" href="logout.php">Logout</a>';
                    }
                    ?>
                </div>
            </form>
        </div>
    </nav>
    <div class="py-5" style="">
        <div class="container">
            <div class="col-md-8" style="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="">UserID</h2>
                            </div>
                            <div class="col-md-6">
                                <h2 class=""><?php echo $row['UserID']; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12" style="">
                            <h2 class="">Firstname</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <h2 class=""><?php echo $row['FirstName']; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <h2 class="">Lastname</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <h2 class=""><?php echo $row['LastName']; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <h2 class="">Gender</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <h2 class=""><?php echo $row['Gender']; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <h2 class="">Address</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <h2 class=""><?php echo $row['Address']; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <h2 class="">Phone No</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <h2 class=""><?php echo $row['PhoneNo']; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <h2 class="">E-mail</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <h2 class=""><?php echo $row['Email']; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <h2 class="">Password</h2>
                        </div>
                    </div>
                    <div class="col-md-6" style="">
                        <div class="col-md-12">
                            <h2 class="" contenteditable="true"><?php echo $row['Password']; ?></h2>
                        </div>
                    </div>
                <div class="col-md-6">
                    <a href="">
                        <h6 id="edit" style="color: DodgerBlue;"> Edit Profile <i class="fa fa-edit" style="color: DodgerBlue;"></i>
                        </h6>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>