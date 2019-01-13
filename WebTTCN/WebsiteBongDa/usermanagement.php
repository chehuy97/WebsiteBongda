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
      	include("headerloggedadmin.php");
?>
<div id="content">
	<div class="space" style="float: left;height: 700px;"></div>
	<div class="usermgcontent" >
   <h2 style="margin-left: 30%;">Thông tin cộng tác viên</h2> 
	<table class="table table-condensed">
    <thead>
      <tr>
        <th>ID</th>
        <th>Họ và tên</th>
        <th>Tên đăng nhập</th>
        <th>Gmail</th>
        <th>SĐT</th>
        <th>Xem chi tiết</th>       
        <th>sửa</th>
        <th>xóa</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    		$link = mysqli_connect("localhost","root","","footballdb") or die ("Khong the ket noi den co so du lieu");
		$sql = "SELECT *FROM account WHERE role='collabtor'";
		$rs = mysqli_query($link,$sql);
		while ($row=mysqli_fetch_array($rs,MYSQLI_BOTH)) {
			echo '<tr><th>'.$row['idaccount'].'</th><th>'.$row['name'].'</th><th>'.$row['nickname'].'</th><th>'.$row['gmail'].'</th><th>'.$row['phone'].'</th><th><a href="UserInfor.php?id='.$row['idaccount'].'">chi tiết</a></th>><th><a href="sua.php?id='.$row['idaccount'].'">sửa</a></th>><th><a href="xoa.php?id='.$row['idaccount'].'">xóa</a></th></tr>';
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