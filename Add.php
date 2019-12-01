<!DOCTYPE>
<?php



    $conn = mysqli_connect( "localhost", "root", "");

  	if (!$conn)
	  {
	    die('Could not connect: ' . mysqli_error());
  	  }

    mysqli_select_db($conn, "devicemanager");
      if (isset($_POST['Add'])){

	$username = $_POST['user'];
	$password = $_POST['password'];
	$usertype = $_POST['usertype'];


	$sql = " INSERT INTO `userlogin`(`username`, `password`, `usertype`) VALUES ('$username' ,'$password' ,'$usertype');";


	if (mysqli_query($conn, $sql) === TRUE){
		echo '<script type ="text/javascript"> alert("DATA ADDED SUCCESSFULLY") </script>';
	} else{
		echo '<script type ="text/javascript"> alert("ERROR CAN NOT ADD THE DATA") </script>';
	}
	}
	?>


<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
		<title> admin page </title>
	</head>

	<body>
		<form action="admin.php" method="POST">
			<table>
				Username: <input type ="text" name="user" placeholder="Enter your username here"> 
				Password: <input type ="text" name="password" placeholder="Enter your password here">
				Select user type: <select name="usertype">
							<option value="admin"> admin </option>
							<option value="director"> director </option>
							<option value ="maintainer"> maintainer </option>
						</select>
				<input type ="submit" name="Add" value="Add">
			</table>
		</form>
	</body>
</html>