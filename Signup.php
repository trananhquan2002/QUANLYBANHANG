<!DOCTYPE html>
<html lang="en">
<?php
include_once("ketnoi2.php");
?>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng ký</title>
</head>
<body>
	<?php
	$username = $password = "";
	if (isset($_POST["submit"])) {
		$username = $_POST["txtUser"];
		$password = $_POST["txtPass"];
		if ($username == "" || $password == "") {
			echo "Bạn phải nhập đầy đủ user và password";
		}
		$sql = "SELECT * from account WHERE username = '$username'";
		$result = mysqli_query($con, $sql);//thực hiện câu lệnh sql
		if (mysqli_num_rows($result) > 0) {
			echo '<script>alert("Bị trùng tên"); window.location="index.php?page=Signup";</script>';
			die();
		} else {
			$sql = "INSERT INTO account (username,password) VALUES ('$username','$password')";
			$result = mysqli_query($con, $sql);
			echo '<script>alert("Đăng ký thành công !")</script>';
		}
		echo "<script>window.location.href='index.php?page=login'</script>";
	}
	?>
	<form method="post">
		<table style="margin-top: 15px;" cellpadding="15px" align="center">
			<tr>
				<td>User:</td>
				<td><input type="text" name="txtUser"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="text" name="txtPass"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Signup"></td>
			</tr>
		</table>
	</form>
</body>
</html>