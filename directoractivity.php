<?php

	$conn = new mysqli("localhost", "root", "" ,"devicemanager") or die ("Error:" . mysql_error($conn));

	//save data
	if (isset($_POST['save'])){
		if (!empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['type'])  && !empty($_POST['serial'])  &&  !empty($_POST['model']) &&  !empty($_POST['date']) ){
			$id = $_POST['id'];
			$name = $_POST['name'];
			$type = $_POST['type'];
			$serial = $_POST['serial'];
			$model = $_POST['model'];
			$date = $_POST['date'];

			$qry1 = "INSERT INTO deviceinfo(machine_id, machine_name, Type, serials, Model, dates) VALUES  (? ,? ,? ,?, ?, ?)";

			$stmt = $conn->prepare($qry1);
			$stmt-> bind_param("isssss", $id, $name, $type, $serial, $model, $date);

			if($stmt ->execute()){
				$_SESSION['msg'] = "New account has been added";
				$_SESSION['alert'] = "alert alert-success";
			}
			$stmt->close();
			$conn->close();
	}
	else {
		$_SESSION['msg'] = "New account can not be added";
		$_SESSION['alert'] = "alert alert-warning";
	}
	header("location: directortest.php");

}

#delete function
if (isset($_POST['delete'])){
	$id=$_POST['delete'];

	$qry2 = "DELETE FROM deviceinfo WHERE id = ?";
	$stmt = $conn->prepare($qry2);
	$stmt->bind_param('i', $id);
	if($stmt ->execute()){
	$_SESSION['msg'] = "Account has been deleted";
	$_SESSION['alert'] = "alert alert-danger";
	}
	$stmt->close();
	$conn->close();
	header("location: directortest.php");
}
#update
if (isset($_POST['edit'])){
	if (!empty($_POST['id']) && !empty($_POST['user']) && !empty($_POST['pass'])  && !empty($_POST['usertype'])  &&  !empty($_POST['email']) &&  !empty($_POST['number']) ){
			$id = $_POST['id'];
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			$usertype = $_POST['usertype'];
			$email = $_POST['email'];
			$number = $_POST['number'];
		$qry3 = "UPDATE deviceinfo SET machine_id = ?, machine_name =?, Type =?, serials =? , Model=?, dates=?";

		$stmt = $conn->prepare($qry3);
		$stmt->bind_param("isssss", $id, $name, $type, $serial, $model, $date);
	if($stmt ->execute()){
	$_SESSION['msg'] = "Account has been deleted";
	$_SESSION['alert'] = "alert alert-danger";
	}
	$stmt->close();
	$conn->close();
	}
	else {
		$_SESSION['msg'] = "New account can not be added";
		$_SESSION['alert'] = "alert alert-warning";
	}
	header("location: directortest.php");
}
?>