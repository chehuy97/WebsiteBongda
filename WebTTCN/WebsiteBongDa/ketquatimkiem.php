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
	<div class="space" style="float: left;"></div>
	<div id="searchblock">
    <form name="form" action="ketquatimkiem.php" method="POST">
  		<label><b style="color: #333;font-size: 25px;">Tìm Kiếm: </b><input type="text" name="search" placeholder="Search.." class="search"></label>
	</form>
  <?php 
  $Search = $_REQUEST['search'];
  if (isset($Search)) {
      $link = mysqli_connect("localhost","root","","footballdb") or die ("Khong the ket noi den co so du lieu");
      mysqli_set_charset($link,'utf8');
      $sql = "SELECT *FROM post WHERE header LIKE '%$Search%' or title LIKE '%$Search%'";
      $rs = mysqli_query($link,$sql);
      while ($row=mysqli_fetch_array($rs,MYSQLI_BOTH)) {
        echo '<div class="newsborder" style="margin-top: 2%;">
      <img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" class="newsimg">
      <div class="info">
      <a href="newscontent.php?id='.$row['idaccount'].'" style="text-decoration: none;"><b class="title">'.$row['header'].'</b></a>
      <p class="newsreview">'.$row['title'].'</p>
      </div>
    </div>';
      } 
    }
    ?> 
  </div>
	<div class="space" style="float: right;"></div>
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