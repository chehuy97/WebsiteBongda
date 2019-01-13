<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Website bóng đá</title>
	<link rel="shortcut icon" href="Library/Image/footballicon.jpg">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
	<div class="space" style="float: left;"></div>
	<div class="newscontent">
		<div id="nameleagueblock">
		<h2 class="nameleague"
		style="	padding-left: 4%;
    	padding-top: 1%;
   		 padding-bottom: 1%;">
		Pháp
		</h2>
		</div>
 				 <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'footballdb');
        mysqli_set_charset($conn,'utf8');
 
        $result = mysqli_query($conn, 'select count(idaccount) as total from post');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
 
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8;
 
        $total_page = ceil($total_records / $limit);
 
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        $start = ($current_page - 1) * $limit;

        $result = mysqli_query($conn, "SELECT * FROM post  WHERE type LIKE '%Phap%' and duyet = 1 ORDER BY idaccount DESC LIMIT $start, $limit");
 
        ?>
        <div>
            <?php 
            while ($row = mysqli_fetch_assoc($result)){
				echo '<div class="newsborder" style="margin-top: 2%;">
			<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" class="newsimg">
			<div class="info">
			<a href="newscontent.php?id='.$row['idaccount'].'" style="text-decoration: none;"><b class="title">'.$row['header'].'</b></a>
			<p class="newsreview">'.$row['title'].'</p>
			</div>
			</div>';
            }
            ?>
        </div>
        <div class="paing">
           <?php 

            if ($current_page > 1 && $total_page > 1){
                echo '<a href="Phap.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            for ($i = 1; $i <= $total_page; $i++){
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="Phap.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="Phap.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
        </div>			
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