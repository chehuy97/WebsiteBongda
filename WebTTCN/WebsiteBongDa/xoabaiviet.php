<!DOCTYPE html>
<html>
<head>
	<title>xulixoa</title>
</head>
<?php 
			$id = $_GET['id'];
			$link = mysqli_connect("localhost","root","","footballdb") or die ("Khong the ket noi den co so du lieu");
			$sql = "DELETE FROM post WHERE idaccount = '$id'";
			$rs = mysqli_query($link,$sql);
	header("location:pheduyetbaiviet.php");
	mysql_close($link);		

?>
<body>

</body>
</html>