<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Website bóng đá</title>
  <link rel="shortcut icon" href="Library/Image/footballicon.jpg">
    <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="PHP, HTML, CSS, JS">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="Library/FootballLibrary.css">
 <link rel="stylesheet" type="text/css" href="Library/League.css">
</head>
<body>
<?php
	 if ($_SESSION['check'] == 0) {
	 	include("header.php");
	}else if($_SESSION['check'] == 1){
      	include("headerloggedadmin.php");
	 }
	 else if($_SESSION['check'] == 2){
      	include("headerloggedctv.php");
	 }
 ?>
 <div id="content">
	<div class="space" style="float: left;height: 700px;"></div>
	<div class="loginborder">
		<form id="myForm" method="POST">
		<h2 style="margin-left: 14%;margin-top: 5%;margin-bottom: 3%;"><b>Đăng Nhập</b></h2>
		<p>Tên đăng nhập: <input type="text" name="user"></p>
		<p>Mật Khẩu: <input type="password" name="pass" style="margin-left: 7.1%;"></p>
		<input type="submit" name="login" value="Đăng Nhập" style="margin-right: 2%;width: 150px;font-weight: bold;">
		<input type="reset" value="Reset" style="width: 150px;font-weight: bold;">
		</form>
		  <?php
				if (isset($_POST['login'])) {
					$_SESSION['user'] = $_POST['user'];
					$_SESSION['pass'] = $_POST['pass'];
					header("location: xulidangnhap.php");
				}
		?>
	</div>
	<div class="space" style="float: right;height: 700px;"></div>
</div>
<div class="footer" style="color: white;padding-left: 35%;">
    <div style="font-size: 17px;">
	<h3>bongda.vn</h3>
	<p>Trang web được tạo bởi :</p>
    <p>Chế Quang Huy</p>
    <p>Dương Minh Phúc</p>
    <p>Hồ Văn Đức</p>
  </div>
</div>
</body>
</html>
</html>
