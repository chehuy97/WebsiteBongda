<?php
			
			
			 $id = $_GET['id'];
			$link = mysqli_connect("localhost","root","","footballdb") or die ("Khong the ket noi den co so du lieu");
			mysqli_set_charset($link,'utf8');
			$sql = "UPDATE post SET duyet = 1 WHERE idaccount = '$id'";
			$rs = mysqli_query($link,$sql);
			header("location:pheduyetbaiviet.php")
		?>
