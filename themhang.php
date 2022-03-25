<!DOCTYPE html>
<html lang="en">
<?php
include "ketnoi.php";
?>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thêm hàng hóa</title>
</head>
<body>
	<form method="post" enctype="multipart/form-data">
		<table border="1" align="center" cellspacing="0" cellpading="3">
		<caption>Thêm Mới Hàng Hóa</caption>
		<tr>
			<td>Mã hàng</td>
			<td><input type="text" name="txtMahang"></td>
		</tr>
		<tr>
			<td>Tên hàng</td>
			<td><input type="text" name="txtTenhang"></td>
		</tr>
		<tr>
			<td>Đơn giá</td>
			<td><input type="text" name="txtDongia"></td>
		</tr>
		<tr>
			<td>Số lượng</td>
			<td><input type="text" name="txtSoluong"></td>
		</tr>
		<tr>
			<td>Đơn vị tính</td>
			<td><input type="text" name="txtDVT"></td>
		</tr>
		<tr>
			<td>Ảnh</td>
			<td><input type="file" name="txtAnh"></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="submit" value="Thêm mới">
				<input type="reset" name="" value="Nhập lại">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><p id="loi" style="color: red;"></p></td>
		</tr>
		</table>
	</form>
	<?php
	if (isset($_POST["submit"])) {
		$mahang = $_POST["txtMahang"];
		$tenhang = $_POST["txtTenhang"];
		$dongia = $_POST["txtDongia"];
		$soluong = $_POST["txtSoluong"];
		$dvt = $_POST["txtDVT"];
		$anh = $_FILES["txtAnh"]["name"];
		$dd = $_FILES["txtAnh"]["tmp_name"];
		move_uploaded_file($dd, "img/$anh");
		$sql = "Select * from Hanghoa where Mahang = '$mahang'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0)
			echo "Mã hàng đã tồn tại, mời nhập lại";
		else {
			$sql = "insert into Hanghoa values ('$mahang','$tenhang','$dongia','$soluong','$dvt','$anh')";
			$result = mysqli_query($conn,$sql);
			if ($result) {
				echo "<script>window.location.href='index.php?page=danhsachhang'</script>";
			} else {
			?>
				<script type="text/javascript">
					document.getElementById("loi").innerHTML = "Lỗi ! Mời kiểm tra lại dữ liệu";
				</script>
			<?php
			}
		}
	}
	?>
</body>
</html>