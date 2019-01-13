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
   .newscontentborder{
    border-right: 240px solid #e6e6e6;
    border-left: 240px solid #e6e6e6;
    padding: 1% 5% 3% 5%;
    width: 96%;
    float: left;
    margin-left: 2%;
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
<!-- 	//<div class="space" style="float: left;height: 700px;"></div> -->
  <div class="newscontentborder">
      <?php
    $id = $_GET['id'];
    $link = mysqli_connect("localhost","root","","footballdb") or die ("Khong the ket noi den co so du lieu");
      mysqli_set_charset($link,'utf8');
      $sql = "SELECT *FROM post WHERE  idaccount = '$id' and duyet = 0;";
      $rs = mysqli_query($link,$sql);
      $row=mysqli_fetch_array($rs,MYSQLI_BOTH);
      echo '<h1><a href="newscontent.php" style="text-decoration: none;">'.$row['header'].'</a></h1>
      <h3>'.$row['title'].'</h3>
      <p style="font-size: 17px;">'.$row['content'].'</p>'
    ?>
  </div>
<!-- 	<div class="space" style="float: right;height: 700px;"></div> -->
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
