<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
	
<head>
<title>User Profile</title>
<link rel="stylesheet" href="css\default.css">
</head>

<body>

<div id="wrapper"> 
		<div id="div_left">
		</div>
		<div id="div_content" class="form">

			<form action="User_History.php" method="post"> 
					<h2>Add History</h2>

					<label>HistoryID</label>

					<input type="text" name="HistoryID">
					
					<label>Service</label>

					<input type="text" name="Service">

					<label>Date</label>
					<input type="text" name="Date">
					
					<div class="center">

					<input type="submit" name=submit value="Submit" >		
					</div>
				</form>
		</div> <!-- end div_content -->
	</div> <!-- end div_main -->
	<div id="div_footer">  
	</div>
</div>
</body>
</html>


