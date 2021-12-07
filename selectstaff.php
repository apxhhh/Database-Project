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
    
        <title>selectstaff</title>
    
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
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
            .cancelbtn {
                width: 100%;
            }

    }</style>
</head>
<body>
    <body data-new-gr-c-s-check-loaded="14.1036.0" data-gr-ext-installed="">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light py-3" style="background-color: #e3f2fd; font-size:x-large;">
            <a class="navbar-brand px-3" style="font-weight:bolder;" href="home.php">Friendly-Neighborhood</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    
        <form  method="post">
            <div class="container">
            <h1>Staff</h1>
            <p></p>
            <hr><br><br>
                <label for="email"><b>Enter Staff ID</b></label>
                <input type="text" placeholder="Enter Staff ID" name="ID" required>
                
                <?php
						$q='select * from staff;';
						if($result=$mysqli->query($q)){
							while($row=$result->fetch_array()){
								echo '<option value="'.$row[0].'">'.$row[0].'</option>';
							}
						}else{
							echo 'Query error: '.$mysqli->error;
						}
					?>
                <button type="submit" href="staffassign.php">Assign</button>
            </div>
        </form>
    </body>
</body>
</html>