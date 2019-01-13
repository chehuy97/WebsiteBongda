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
		<h2>Thông tin tài khoản</h2>
		<?php 
			$user = $_SESSION['user'];
			$link = mysqli_connect("localhost","root","","footballdb") or die ("Khong the ket noi den co so du lieu");
			$sql = "SELECT *FROM account WHERE nickname = '$user'";
			$rs = mysqli_query($link,$sql);
			$row=mysqli_fetch_array($rs,MYSQLI_BOTH);
			echo "<p>Họ và Tên: ".$row['name']."</p>";
			echo "<p>Giới Tính: ".$row['sex']."</p>";
			echo "<p>Ngày Sinh: ".$row['birthday']."</p>";
			echo "<p>Số điện thoại: ".$row['phone']."</p>";
			echo "<p>Địa chỉ: ".$row['address']."</p>";
			echo "<p>Tên tài khoản: ".$row['nickname']."</p>";

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
