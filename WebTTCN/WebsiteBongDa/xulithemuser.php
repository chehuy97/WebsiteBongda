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
 <style type="text/css">
 .loginborderadduser{
	border: 2px solid #333;
    width: 60%;
    margin-left: 7%;
    height: 110%;
    float: left;
    padding-left: 18%;
    font-size: 16px;
}
.btnAddUser{
     width: 110px;
    height: 40px;
    margin-left: 2%;
    margin-top: 9%;
}
}

 </style>
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
	<div class="loginborderadduser" style="padding-left: 0%;border: 2px solid white;">
		<?php
			$id = $_REQUEST['id'];
			$user = $_REQUEST['user'];
			$pass = $_REQUEST['pass'];
			$role = $_REQUEST['role'];
			$name = $_REQUEST['name'];
			$sex = $_REQUEST['sex'];
			$birth = $_REQUEST['birth'];
			$gmail = $_REQUEST['gmail'];
			$phone = $_REQUEST['phone'];
			$address = $_REQUEST['address'];
			$link = mysqli_connect("localhost","root","","footballdb") or die ("Khong the ket noi den co so du lieu");
			$sql = "INSERT INTO account VALUES ('$id','$user','$pass','$role','$name','$sex','$birth','$gmail','$phone','$address')";
			$rs = mysqli_query($link,$sql);
			echo '<div class="alert alert-success" style="padding-left: 30%;">
    	<strong>Thành công!</strong> Thêm account thành công.
  		</div>';
		?>
		<a href="adduser.php" style="padding-left: 45%;">Quay lại</a>
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
