<?php
	$username = $_POST['user'];
	$password = $_POST['pass'];
	$usertype = $_POST['usertype'];

		$username = stripcslashes($username);
		$password = stripcslashes($password);
		$usertype = stripcslashes($usertype);



	$servername="localhost";
	$username="root";
	$password="";
	$dbname="devicemanager";
	$conn="mysqli_connect($servername, $dbname)";

	$query = "SELECT * FROM `userlogin` WHERE username = '$username' and  password ='$password' and usertype = '$usertype' ";
	$result = mysqli_query($conn, $query);

	if($result){
			while($row = mysqli_fetch_array($result)){
				echo'<script type ="text/javascript"> alert ("you are login successful")) </script>';
			}
			if($usertype=="admin"){
				?> 
				<script type="text/javascript"> window.location.href="admin.php"</script>
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
?>