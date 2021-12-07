<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<?php
    if ($_SESSION["login"] == NULL){
        $_SESSION["login"] == "start";
    }
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
    
    </head>
    <style>
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        
        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }
        
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
        
        button:hover {
            opacity:1;
        }
        
        /* Extra styles for the cancel button */
        .cancelbtn {
            padding: 14px 20px;
            background-color: #f44336;
        }
        
        /* Float cancel and signup buttons and add an equal width */
        .cancelbtn, .signupbtn {
            float: left;
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
        </nav>
    
        <div class="container">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
            <form class="login100-form validate-form" action="signupcheck.php" method="POST" role="form">
                <label for="firstname"><b>Firstname</b></label>
                <input type="text" placeholder="Enter Firstname" name="Firstname" required>

                <label for="lastname"><b>Lastname</b></label>
                <input type="text" placeholder="Enter Lastname" name="Lastname" required>
                
                <label for="gender"><b>Gender</b></label>
                <br>
                <input type="radio" name="gender" value="Male" checked>Male
                <input type="radio" name="gender" value="Female">Female
                <br><br>

                <label for="usertype"><b>User Type</b></label>
                <br>
                <input type="radio" name="usertype" value="user" checked>Customer
                <input type="radio" name="usertype" value="staff">Staff
                <br><br>

                <label for="address"><b>Address</b></label>
                <input type="text" placeholder="Enter Address" name="address" required>

                <label for="phone"><b>Phone No.</b></label>
                <input type="text" placeholder="Enter Phone No." name="phone" required>
            
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>
            
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
            
                <label for="psw-repeat"><b>Confirm Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

                <div class="clearfix">
                    <button type="button" class="cancelbtn" onclick="history.back();">Cancel</button>
                    <button type="submit" class="signupbtn">Sign Up</button>
                </div>
            </form>
        </div>
    </body>
</body>
</html>