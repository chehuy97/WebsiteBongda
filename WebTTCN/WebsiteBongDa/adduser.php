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
    height: 105%;
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
	 $link = mysqli_connect("localhost","root","","footballdb") or die ("Khong the ket noi den co so du lieu");
		$sql = "SELECT *FROM account ORDER BY idaccount DESC";
		$rs = mysqli_query($link,$sql);
		$row=mysqli_fetch_array($rs,MYSQLI_BOTH);
		$autoid = $row['idaccount']+1;
 ?>
 <div id="content">
	<div class="space" style="float: left;height: 700px;"></div>
	<div class="loginborderadduser">
		<form action="xulithemuser.php" method="POST">
			<h2><b style="margin-left: 15%;">Thêm User</b></h2>
			<input type="hidden" name="id" style="margin-left: 100px;" value="<?php echo $autoid ?>">
			<p>Tên đăng nhập:<input type="text" name="user" style="margin-left: 14px;"></p>
			<p>Mật Khẩu:<input type="password" name="pass" style="margin-left: 53px;"></p>
			<p>Chức vụ:
				<input type="radio" name="role" value="admin" style="margin-left: 65px;">Admin
				<input type="radio" name="role" value="collabtor" style="margin-left: 10px;">Cộng tác viên<br></p>
			<p>Tên:<input type="text" name="name" style="margin-left: 95px;"></p>
			<p>Giới Tính:<input type="radio" name="sex" value="nam" style="margin-left: 65px;">Nam
				<input type="radio" name="sex" value="nu" style="margin-left: 10px;">Nữ<br></p></p>
			<p>Ngày Sinh<input type="date" name="birth" style="margin-left: 54px;"></p>
			<p>Gmail:<input type="text" name="gmail" style="margin-left: 84px;"></p>
			<p>SDT:<input type="text" name="phone" style="margin-left: 94px;"></p>
			<p>Địa Chỉ:<input type="text" name="address" style="margin-left: 72px;"></p>
			<input type="submit" name="btnADD" value="Thêm" class="btnAddUser" style="margin-left: 10%;">
			<input type="reset" name="btnREset" value="Reset"class="btnAddUser">
		</form>
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
