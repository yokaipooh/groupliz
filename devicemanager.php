<!DOCTYPE>

<?php
    $user = 'root';
    $password = '';
    $db = 'devicemanager';
    $host = 'localhost';

    $link = mysqli_init();
    $success = mysqli_real_connect(
       $link,
       $host,
       $user,
       $password,
       $db
    );

	if (isset($_POST['Login'])){
		$username = $_POST['user'];
		$password = $_POST['pass'];
		$usertype = $_POST['usertype'];
		
		$result =( "SELECT * FROM userlogin WHERE username = '".$_POST['user']."' and  password ='".$_POST['pass']."' and usertype = '".$_POST['usertype']."'");


		if($result){
		
			if($usertype=="admin"){
				?> 
				<script type="text/javascript">window.location.href="admin.php"</script>
				<?php
			} else if ($usertype =="director"){
				?>
				<script type="text/javascript"> window.location.href="director.php" </script>
				<?php
			}else if ($usertype == "maintainer"){
				?>
				<script type="text/javascript"> window.location.href="maintainer.php"</script>
				<?php
			}else {
				echo ' no result';
			}
		}
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<title> Devices manager</title>
	</head>

	<body>
		<form method="POST">
			<table>
				<tr>
					<td> Username: <input type ="text" name="user" placeholder="Enter your username here"> </td>
				</tr>

				<tr>
					<td> Password: <input type ="text" name="pass" placeholder="Enter your password here"> </td>
				</tr>

				<tr>
					<td>
						Select user type: <select name="usertype">
							<option value="admin"> admin </option>
							<option value="director"> director </option>
							<option value ="maintainer"> maintainer </option>
						</select>
					</td>
				</tr>

				<tr>
					<td> <input type ="submit" name="Login" value="Login"> </td>
				</tr>
		</table>
		</form>
	</body>
</html>