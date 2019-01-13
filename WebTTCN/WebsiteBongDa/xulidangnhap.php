<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>xulidangnhap</title>
</head>
<?php
	$user = $_SESSION['user'];
	$pass = $_SESSION['pass'];
	$check =0;
	$_SESSION['check'] = $check;
	if($user == "" || $pass == ""){
		header("location:DangNhap.php");
	}else{
		$link = mysqli_connect("localhost","root","","footballdb") or die ("Khong the ket noi den co so du lieu");
		$sql = "SELECT *FROM account WHERE nickname = '$user' and password = '$pass'";
		$rs = mysqli_query($link,$sql);
		$role1 = mysqli_query($link,"SELECT *FROM account WHERE nickname = '$user' and role = 'admin'");
		$role2 = mysqli_query($link,"SELECT *FROM account WHERE nickname = '$user' and role = 'collabtor'");
		if(mysqli_num_rows($rs)==0){
			header("location:DangNhap.php");
		}else if(mysqli_num_rows($role1)==1 && mysqli_num_rows($role2)==0){
			$check=1;
			$_SESSION['check'] = $check;
			header("location:DangNhap.php");
		}else if(mysqli_num_rows($role1)==0 && mysqli_num_rows($role2)==1){
			$check=2;
			$_SESSION['check'] = $check;
			header("location:DangNhap.php");
		}
		mysqli_free_result($rs);
		mysqli_close($link);
	}
?> 
<body>
</body>
</html>
