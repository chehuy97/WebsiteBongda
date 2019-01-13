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
	<div>
   <?php
      $idwt = $_REQUEST['idpostwt'];
      $user = $_REQUEST['user'];
      $imgwt = $imagetmp=addslashes (file_get_contents($_FILES['imagewt']['tmp_name']));
      $headerwt = $_REQUEST['headerwt'];
      $titlewt = $_REQUEST['titlewt'];

      $contentwt = $_REQUEST['contentwt'];
      foreach($_POST['typewt'] as $selected){
      $typewt .= $selected;
      }
      $duyet = 0;
      $link = mysqli_connect("localhost","root","","footballdb") or die ("Khong the ket noi den co so du lieu");
      mysqli_set_charset($link,'utf8');
      $sql = "INSERT INTO post VALUES ('$idwt','$user','$imgwt','$headerwt','$titlewt','$contentwt','$typewt','$duyet')";
      $rs = mysqli_query($link,$sql);
      header("location:vietbai.php")
   ?> 
  </div>
	<div class="space" style="float: right;height: 700px;"></div>
</div>
</body>
</html>
