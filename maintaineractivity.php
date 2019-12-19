<?php
	$conn = new mysqli("localhost", "root", "" ,"devicemanager") or die ("Error:" . mysql_error($conn));


	$receiver = $_POST['receiver'];
	$sender = $_POST['sender'];
	$Subject = $_POST['Subject'];
	$body = $_POST['Message'];


	ini_set("SMTP", "smtp.gmail.com");
	ini_set("sendmail_from", "$sender");
	ini_set("smtp_port", "25");

	$headers = "FROM: $sender";

	mail($receiver,$Subject,$body,$headers);

	echo"Message has been sent! <a href='maintainer.php'>CLICK HERE</a> if you want to continue";

?>