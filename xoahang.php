<!DOCTYPE html>
<?php
include "ketnoi.php";
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Xóa hàng hóa</title>
</head>
<body>
	<?php
		$mahang = $_GET["mahang"];
		$sql = "Delete From hanghoa Where Mahang = '$mahang'";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "Xóa thành công";
		}
		echo "<script>window.location.href='index.php?page=danhsachhang'</script>";
	?>
</body>
</html>