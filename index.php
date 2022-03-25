<!DOCTYPE html>
<?php
session_start();
// include "ketnoi.php";
include "ketnoi2.php";
?>
<html lang="en">
<head>
	<title>Thế giới di động</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<style>
	/* Remove the navbar's default margin-bottom and rounded borders */ 
	.navbar {
		margin-bottom: 0;
		border-radius: 0;
	}
	/* Set height of the grid so .sidenav can be 100% (adjust as needed) */
	.row.content {
		height: 450px;
	}
	
	/* Set gray background color and 100% height */
	.sidenav {
		padding-top: 20px;
		background-color: #f1f1f1;
		height: 100%;
	}
	/* Set black background color, white text and some padding */
	footer {
		background-color: #555;
		color: white;
		padding: 15px;
	}
	/* On small screens, set height to 'auto' for sidenav and grid */
	@media screen and (max-width: 767px) {
		.sidenav {
			height: auto;
			padding: 15px;
		}
		.row.content {
			height:auto;
		}
	}
	.col-sm-2 {
		background-color: black;
		font-size: 20px;
		/* height: 100%;
		width: auto; */
	}
	.menu a {
		text-decoration: none;
	}
	</style>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<?php
					if (!isset($_SESSION["user"])) {
					?>
					<li><a href="index.php?page=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					<li><a href="index.php?page=Signup"><span class="glyphicon glyphicon-plus-sign"></span> Signup</a></li>
					<?php
					} else {
					?>
					<li><a href="#">Xin chào, <?php echo $_SESSION["user"];?></a></li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					<?php
					}?>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid text-center">
		<div class="row content">
			<div class="col-sm-2 sidenav">
				<div class="menu">
					<p><a href="index.php?page=trangchu">Trang chủ</a></p>
					<p><i class="fas fa-list-alt"></i><a href="index.php?page=danhsachhang"> Danh sách sản phẩm</a></p>
					<p><i class="fas fa-plus"></i><a href="index.php?page=themhang"> Thêm sản phẩm</a></p>
				</div>
			</div>
			<!-- contain -->
			<div class="col-sm-8 text-left">
				<!-- Login -->
				<?php
				$page = "trangchu";
				if (isset($_GET["page"])) {
					$page = $_GET["page"];
				}
				if ($page == "trangchu") {
					include_once("trangchu.php");
				}
				if ($page == "login") {
					include_once("login.php");
				}
				?>
				<!-- Signup -->
				<?php
				$page = "trangchu";
				if (isset($_GET["page"])) {
					$page = $_GET["page"];
				}
				if ($page == "trangchu") {
					include_once("trangchu.php");
				}
				if ($page == "Signup") {
					include_once("Signup.php");
				}
				?>
				<!-- danh sách hàng  -->
				<?php
				$page = "trangchu";
				if (isset($_GET["page"])) {
					$page = $_GET["page"];
				}
				if ($page == "trangchu") {
					include_once("trangchu.php");
				}
				if ($page == "danhsachhang") {
					include_once("danhsachhanghoa.php");
				}
				?>
				<!-- thêm hàng -->
				<?php
				$page = "trangchu";
				if (isset($_GET["page"])) {
					$page = $_GET["page"];
				}
				if ($page == "trangchu") {
					include_once("trangchu.php");
				}
				if ($page == "themhang") {
					include_once("themhang.php");
				}
				?>
				<?php
				$page = "trangchu";
				if (isset($_GET["page"])) {
					$page = $_GET["page"];
				}
				if ($page == "trangchu") {
					include_once("trangchu.php");
				}
				if ($page == "suahang") {
					include_once("suahang.php");
				}
				?>
				<?php
				$page = "trangchu";
				if (isset($_GET["page"])) {
					$page = $_GET["page"];
				}
				if ($page == "trangchu") {
					include_once("trangchu.php");
				}
				if ($page == "xoahang") {
					include_once("xoahang.php");
				}
				?>
			</div>
			<!-- end contain -->
			<div class="col-sm-2 sidenav">
				<h2>Sản phẩm nổi bật của chúng tôi</h2>
				<img src="img/13-chung-tet-td.jpg" width="100" height="200">
			</div>
		</div>
	</div>
</body>
</html>