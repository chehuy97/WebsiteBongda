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
  <div class="usermgcontent" >
   <h2 style="margin-left: 30%;">Phê duyệt bài viết</h2> 
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>ID bài viết</th>
        <th>Người viết</th>
        <th>Tiêu đề</th>
        <th>Nội dung</th>     
        <th>Phê duyệt</th>
        <th>Loại bỏ</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $link = mysqli_connect("localhost","root","","footballdb") or die ("Khong the ket noi den co so du lieu");
        mysqli_set_charset($link,'utf8');
       $sql = "SELECT *FROM post WHERE duyet = 0;";
        $rs = mysqli_query($link,$sql);
        while ($row=mysqli_fetch_array($rs,MYSQLI_BOTH)) {
       echo '<tr><th>'.$row['idaccount'].'</th><th>'.$row['nickname'].'</th><th>'.$row['header'].'</th><th><a href="noidungpheduyet.php?id='.$row['idaccount'].'">xem</a></th>><th><a href="duyetbaiviet.php?id='.$row['idaccount'].'">duyệt</a></th>><th><a href="xoabaiviet.php?id='.$row['idaccount'].'">xóa</a></th></tr>';
    }
      ?>
    </tbody>
  </table>
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
