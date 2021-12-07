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
                            echo '<a class="btn btn-secondary" href="logout.php">Logout</a>';
                        }
                        ?>
                    </div>
                </form>
            </div>
        </nav>

        <br />
        <div class="container pb-5">
            <h1 style=>Assign staff</h1>
            <div style="clear:both"></div>
            <br />
            <div class="table-responsive">
                <table class="table table-bordered">
                <tr>
                        
                        <th width="20%" style="text-align:center;">Service Name</th>
                        <th width="20%" style="text-align:center;">Address</th>
                        <th width="8%" style="text-align:center;">Price</th>
                        <th width="9%" style="text-align:center;">Date</th>
                        <th width="8%" style="text-align:center;">Time</th>
                        <th width="15%" style="text-align:center;">Assign Staff</th>
                        
                    </tr>

                    <?php
                        $mysqli = new mysqli('localhost', 'root', '', 'homeservice');

                        if ($mysqli->connect_errno) {
                        echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
                        }

                        $q = "SELECT * FROM booking b INNER JOIN service s INNER JOIN user u ON b.ServiceID = s.ServiceID AND u.UserID = b.UserID";
                        $row = mysqli_fetch_all($mysqli->query($q));
                        

                        foreach ($row as $i) {
                    ?>

                    <tr>
                        
                        <td><?php echo $i[8]; ?></td>
                        <td><?php echo $i[18]; ?></td>
                        <td style="text-align:center;"><?php echo $i[10]; ?> THB</td>
                        <td style="text-align:center;"><?php echo date("d/m/Y", strtotime($i[4])); ?></td>
                        <td style="text-align:center;"><?php echo date("h.i a", strtotime($i[5])); ?></td>
                        <td style="text-align:center;">
                        <?php
                            $q2='SELECT * FROM staffassign sa INNER JOIN staff s INNER JOIN user u
                                ON s.StaffID = sa.StaffID AND s.UserID = u.UserID Where sa.BookingID = '.$i[0];
                            $row2 = mysqli_fetch_all($mysqli->query($q2));
                            if (isset($row2[0][0])) {
                                echo $row2[0][9].' '.$row2[0][10];
                            } else {
					    ?>
                            <form action="assign.php?id=<?php echo $i[0] ?>" method="POST">
                                <select name="assign" id="assign">
                        <?php
                            $q3='SELECT * FROM staff s INNER JOIN user u ON s.UserID = u.UserID;';
                            $row3 = mysqli_fetch_all($mysqli->query($q3));
                            foreach ($row3 as $i3) {
                                echo '<option value="'.$i3[0].'">'.$i3[6].' '.$i3[7].'</option>';
                            }
					    ?>
                                </select> <br>
                                <input type="submit" class="btn btn-success mt-2" value="Submit">
                            </form>
                        </td>
                    </tr>
                    <?php }} $mysqli->close(); ?>
                </table>
            </div>
        </div>
        <br /><br /><br /><br /><br /><br />
    </div> <!-- end wrapper -->
</body>
</html>