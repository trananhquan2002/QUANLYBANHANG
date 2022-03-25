<!DOCTYPE html>
<html lang="en">
<?php
include_once("ketnoi2.php");
include_once("ketnoi.php");
?>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form đăng nhập</title>
</head>
<body>
	<?php
	if (isset($_POST['submit'])) {
		$user = $_POST["txtUser"];
		$pass = $_POST["txtPass"];
		//Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
		if (!$user || !$pass) {
			echo "Vui lòng nhập đầy đủ thông tin".'<br>';
		}
		$sql = "Select * from account Where username = '$user'";
		$result = mysqli_query($con,$sql);
		if (mysqli_num_rows($result) == 0) {
			echo "Tên đăng nhập không tồn tại . Vui lòng đăng ký <a href='index.php?page=Signup'>tại đây</a>".'<br>';
			exit;
		}
		//so các dong tìm thay
		if (!$result) {
			echo "Tên đăng nhập hoặc mật khẩu không đúng!";
		} 
		$row = mysqli_fetch_array($result);
		if ($pass != $row["password"]) {
			echo "Mật khẩu không đúng ! vui lòng nhập lại <a href = 'javascript:history.go(-1)'>Trở lại</a>";
			exit;
		}
		$_SESSION['user'] = $user;
		$_SESSION['pass'] = $pass;
		echo "<script>window.location.href='index.php'</script>";
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
				<td><input type="Password" name="txtPass"></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Login">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>