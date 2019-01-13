<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Website bóng đá</title>
  <link rel="shortcut icon" href="Library/Image/footballicon.jpg">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="PHP, HTML, CSS, JS">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="Library/ckeditor/ckeditor.js"></script>
  <link rel="stylesheet" type="text/css" href="Library/FootballLibrary.css">
 <link rel="stylesheet" type="text/css" href="Library/League.css">
 <style type="text/css">
 .loginborderwritenews{
    width: 60%;
    margin-left: 7%;
    height: 170%;
    float: left;
    padding-left: 3%;
    padding-right: 3%;
    font-size: 16px;
 }	
 .type{
 	margin-right: 2%;
 }
 .btn{
 	margin-top: 3%;
    margin-right: 3%;
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
		$sql = "SELECT *FROM post ORDER BY idaccount DESC";
		$rs = mysqli_query($link,$sql);
		if (mysqli_num_rows($rs)==0) {
			$idpostwt = 1;
		}else {
			$row=mysqli_fetch_array($rs,MYSQLI_BOTH);
			$idpostwt = $row['idaccount']+1;
		}
 ?>
 <div id="content">
	<div class="space" style="float: left;height: 900px;"></div>
	<div class="loginborderwritenews">
		<form method="POST" action="xulivietbai.php" enctype="multipart/form-data">
		<h1><b style="margin-left: 40%;">Bài viết</b></h1>
		<input type="hidden" name="idpostwt" value="<?php echo $idpostwt ?>">
		<input type="hidden" name="user" value="<?php echo $_SESSION['user'] ?>">
		<b>Chọn ảnh:</b>
		 <input type="file" name="imagewt">
		<b>Tiêu đề:</b> <br>
		<textarea rows="3" cols="88" name="headerwt"></textarea><br>
		<b>Nội dung sơ lược:</b><br>
		<textarea rows="4" cols="88" name="titlewt"></textarea><br>
		<b>Nội dung chính:</b><br>
		<textarea rows="15" cols="50" name="contentwt"></textarea><br>
		<script>CKEDITOR.replace('contentwt');</script>
		<p><b>Chủ đề: </b></br>
			<input type="checkbox" name="typewt[]" value="Anh" class="type"><label>Anh</label>
			<input type="checkbox" name="typewt[]" value="Phap" class="type"><label>Pháp</label>
			<input type="checkbox" name="typewt[]" value="Duc" class="type"><label>Đức</label>
			<input type="checkbox" name="typewt[]" value="Y" class="type"><label>Ý</label>
			<input type="checkbox" name="typewt[]" value="TBN" class="type"><label>Tây Ban Nha</label>
			<input type="checkbox" name="typewt[]" value="C1" class="type"><label>Champion League</label><br>
			<input type="checkbox" name="typewt[]" value="CN" class="type"><label>Chuyển Nhượng</label>
		</p>
		<input type="submit" name="send" value="Đăng bài" class="btn" style="margin-left: 34%;">
		<input type="reset" name="reset" value="Hủy bỏ" class="btn">
	</form>

	</div>
	<div class="space" style="float: right;height: 900px;"></div>
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
