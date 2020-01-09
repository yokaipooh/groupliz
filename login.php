<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="frm">
		<form action="process1.php" method="POST">
			<p>
				<label>Username:</label>
				<input type="text"  id="user" name="user">
			</p>
			<p>
				<label>Password:</label>
				<input type="password"  id="pass" name="pass">
			</p>
			<tr>
				<td>
					Select user type: <select name="usertype">
						<option value="admin"> admin </option>
						<option value="director"> director </option>
						<option value ="maintainer"> maintainer </option>
					</select>
				</td>
			</tr>
			<p>
				<input type="submit" id="btn" value="Login">
			</p>
		</form>
	</div>
</body>
</html>