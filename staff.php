<?php session_start(); require_once('connect.php');?>

<!DOCTYPE html>
<html lang="en">

<?php
    if (!isset($_SESSION["login"])) {
        $_SESSION["login"] = "start";
    }
    if ($_SESSION["login"] == "False") {
        $_SESSION["login"] = "start";
    }

    $uid = $_SESSION['uid'];

    $q = "SELECT FirstName, LastName FROM user WHERE UserID = '$uid'";
    $row = mysqli_fetch_row($mysqli->query($q));
    $mysqli->close();
?>

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
    <link href="profile.css" rel="stylesheet">
    <!--<link href="css/landing-page.min.css" rel="stylesheet">-->

</head>
<body>
    <div id="wrapper"> 

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
                    <li class="nav-item active">
                        <a class="nav-link" href=""></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href=""></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 mx-3">
                    <!--<form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" />
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>-->
                    <div class="float-right">
                        <?php
                        if ($_SESSION["login"] == "start") {
                            echo '<a class="btn btn-primary mr-2" href="login.php">Login</a>';
                            echo '<a class="btn btn-secondary" href="signup.php">Sign Up</a>';
                        }
                        else {
                            echo '<a>'.$row[0]." ".$row[1].'</a>';
                            echo '<a class="btn btn-primary mr-2 ml-3" href="user-profile.php">My Profile</a>';
                            echo '<a class="btn btn-secondary" href="logout.php">Logout</a>';
                        }
                        ?>
                    </div>
                </form>
            </div>
        </nav>

        <br />
        <div class="container pb-5">
            <h1 style=>Task</h1>
                <div style="clear:both"></div>
                <br />
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th width="50%" style="text-align:center;">Service Name</th>
                            <th width="30%" style="text-align:center;">Address</th>
                            <th width="10%" style="text-align:center;">Date</th>
                            <th width="10%" style="text-align:center;">Time</th>
                        </tr>

                        <?php
                            $mysqli = new mysqli('localhost', 'root', '', 'homeservice');

                            if ($mysqli->connect_errno) {
                            echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
                            }

                            $q = "Call assigntostaff('$uid')";
                            $row = mysqli_fetch_all($mysqli->query($q));
                            $mysqli->close();

                            foreach ($row as $i) {
                        ?>

                        <tr>
                            <td><?php echo $i[22]; ?></td>
                            <td style="text-align:center;"><?php echo $i[18]; ?> </td>
                            <td style="text-align:center;"><?php echo date("d/m/Y", strtotime($i[9])); ?></td>
                            <td style="text-align:center;"><?php echo date("h.i a", strtotime($i[10])); ?></td>
                        </tr>
                        
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <br /><br /><br /><br /><br /><br />
    </div> <!-- end wrapper -->
</body>
</html>

