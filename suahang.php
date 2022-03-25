<!DOCTYPE html>
<?php
include "ketnoi.php";
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sửa hàng</title>
</head>
<body>
	<?php
	$mahang = $_GET["mahang"];
	$sql = "Select * From hanghoa Where Mahang = '$mahang'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	if (isset($_POST["submit"])) {
		$tenhang = $_POST["txtTenhang"];
		$dongia = $_POST["txtDongia"];
		$soluong = $_POST["txtSoluong"];
		$donvitinh = $_POST["txtDonvitinh"];
		$anh = "";
		if (isset($_FILES["txtAnh"])) {
			$anh = $_FILES["txtAnh"]["name"];
			$dd = $_FILES["txtAnh"]["tmp_name"];
			move_uploaded_file($dd, "img/$anh");
		}
		if ($anh == "") {
			$sql = "Update hanghoa Set Tenhang = '$tenhang', Dongia = $dongia, Soluong = $soluong, DVT = '$donvitinh' Where Mahang = '$mahang'";
		} else {
			$sql = "Update hanghoa Set Tenhang = '$tenhang', Dongia = $dongia, Soluong = $soluong, DVT = '$donvitinh', Anh = '$anh' Where Mahang = '$mahang'";
		}
		mysqli_query($conn, $sql);
		echo "<script>window.location.href='index.php?page=danhsachhang'</script>";
	}
	?>
	<form method="post" enctype="multipart/form-data">
		<table border="1" align="center" cellspacing="0" cellpading="3">
			<tr>
				<td>Mã hàng</td>
				<td><input type="text" name="txtMahang" value="<?php echo $row["Mahang"]?>" readonly="true"></td>
				<td rowspan="6"><img src="img/<?php echo $row["Anh"]?>" name="imgHang" width="150px" height="150px"></td>
			</tr>
			<tr>
				<td>Tên hàng</td>
				<td><input type="text" name="txtTenhang" value="<?php echo $row["Tenhang"]?>"></td>
			</tr>
			<tr>
				<td>Đơn giá</td>
				<td><input type="text" name="txtDongia" value="<?php echo $row["Dongia"]?>"></td>
			</tr>
			<tr>
				<td>Số lượng</td>
				<td><input type="text" name="txtSoluong" value="<?php echo $row["Soluong"]?>"></td>
			</tr>
			<tr>
				<td>Đơn vị tính</td>
				<td><input type="text" name="txtDonvitinh" value="<?php echo $row["DVT"]?>"></td>
			</tr>
			<tr>
				<td>Ảnh</td>
				<td><input type="file" name="txtAnh" value="<?php echo $row["Anh"]?>" onchange="change_img()"></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Sửa">
					<input type="reset" name="reset" value="Làm lại">
				</td>
			</tr>
		</table>
	</form>
	<script>
		function change_img() {
			var Element = document.getElementsByName("txtAnh")[0];
			var img = document.getElementsByName("imgHang")[0];
			var url = URL.createObjectURL(Element.files[0]);
			img.src = url;
		}
	</script>
</body>
</html>