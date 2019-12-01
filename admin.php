<!DOCTYPE>



<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
		<title> admin page </title>
	</head>

	<body>

		<?php



    $conn = mysqli_connect( "localhost", "root", "");

  	if (!$conn)
	  {
	    die('Could not connect: ' . mysqli_error());
  	  }

    mysqli_select_db($conn, "devicemanager");

    if(isset($_GET[''])){

    $username = $_GET['user'];
	$password = $_GET['password'];
	$usertype = $_GET['usertype'];

  

	$counter = 0;
	$recordersetrow =  mysql_query("select count(*) from account");
	$rows = mysql_fetch_array($recordersetrow);
	$totalrow = $rows[0];
	$pagesize = 5;
	$totalpage= 1;

	if($totalrow % $totalpage == 0)
		$totalpage = $totalrow/$pagesize;
	else
		$totalpage = int($totalrow/$pagesize) + 1;

	$firstrow = 1;
	$firstpage = 1;

	if((isset ($_GET['recentpage'])) || ($_GET['recentpage'] == '1')){
		$startrow = 0;
		$recentpage = 1;
	} else {
		$startrow = ($_GET['recentpage'] -1)*$pagesize;
		$recentpage = $_GET['recentpage'];
	}

	$recordset = mysqli_query("SELECT * FROM userlogin where username = '$username' and  password ='$password' and usertype = '$usertype' limit {$startrow},{$pagesize}");
	$results = mysqli_result($recordset);
}

?>

		<form action ="admin.php" method="GET">
			<table width="700" border ="1" cellspacing="1" cellpadding="1">
				<tr>
					<th>Username</th>
					<th>password</th>
					<th>Type</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>

				<?php
					while ($rows = mysqli_fetch_array($results)){
						$counter++;
					}
				?>

				<tr>
					<?php
						if($counter%2 ==0)
							$background = "style = 'background:aqua;'";
						else
							$background = "style ='background:grey;'";
					?>
					<td <?php echo $background;?>> <?php echo $rows['username']; ?></td>
					<td <?php echo $background;?>> <?php echo $rows['password']; ?></td>
					<td <?php echo $background;?>> <?php echo $rows['$usertype']; ?></td>
					<td <?php echo $background;?>> <a href="Update.php?id=<?php echo $rows['username'];?>">Update</a></td>
					<td <?php echo $background;?>> <a href="Delete.php?id=<?php echo $rows['username']; ?>" onclick= " returnconfirm ('Do you want to continue?');" > Delete </a> </td>
				</tr>

			</table>
			<script language="javascript">
				function nextpage(page)
				{
					t1109h.recentpage.value = page;
					t1109h.submit();
				}
			</script>

		</form>
		<a href="Add.php">Add account</a>
	</body>
</html>