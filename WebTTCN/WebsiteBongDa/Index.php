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
</head>
<body>
  <!--header-->
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
<!--end header-->
<!--content-->
<?php
    $link = mysqli_connect("localhost","root","","footballdb") or die ("Khong the ket noi den co so du lieu");
      mysqli_set_charset($link,'utf8');
?>
<div class="home_content">
  <div class="homecontent_space"></div>
  <div class="home_leftcontent">
    <h2 class="home_leftcontent_hotnews">Tin nóng</h2>
    <?php
      $sql = "SELECT *FROM post WHERE duyet = 1 ORDER BY idaccount DESC LIMIT 9";
      $rs = mysqli_query($link,$sql);
      while ($row=mysqli_fetch_array($rs,MYSQLI_BOTH)) {
        echo '<div class="home_leftcontent_newsborder">
      <a href="newscontent.php?id='.$row['idaccount'].'" class="home_leftcontent_a" style="text-decoration: none;">'.$row['header'].'</a>
    </div>
    <div class="home_leftcontent_newsborder" style="background-color: #d8d8d8">
      <a href="newscontent.php?id='.$row['idaccount'].'" class="home_leftcontent_a" style="text-decoration: none;">'.$row['header'].'</a>
    </div>';
      }
    ?>
  </div>
  <div class="homecontent_block_hotnews">
    <?php
    $sql = "SELECT * FROM post WHERE duyet = 1 ORDER BY idaccount desc";
    $rs = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($rs);
    echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" class="home_mainimage">
    <h3><b><a href="newscontent.php?id='.$row['idaccount'].'" class="home_maintitle" style="text-decoration: none;">'.$row['header'].'</a></b></h3>
    <p class="home_maincontent">'.$row['title'].'</p>';
    ?>
  </div>
    <div class="home_readmost">
      <h2 class="home_leftcontent_hotnews">Tin đọc nhiều nhất</h2>
      <?php
       $sql = "SELECT * FROM post WHERE duyet = 1 ORDER BY idaccount desc";
      $rs = mysqli_query($link,$sql);
      $row=mysqli_fetch_array($rs,MYSQLI_BOTH);
      echo '<div class="home_MainExtra" style="width: 290px;">
      <img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" class="home_readmost_img">
      <b><a href="newscontent.php?id='.$row['idaccount'].'" class="home_maintitle home_readmost_tille" style="text-decoration: none;">'.$row['header'].'</a></b>
    </div>';
      ?>
    <div class="home_readmost_extranews">
      <img src="Library/Image/kane.jpg" class="home_readmost_extranews_img">
       <b><a href="#" class="home_maintitle home_readmost_extranews_title" style="text-decoration: none;;">Chiến thắng trước PSV,Tottenham nuôi hi vong đi tiếp vào vòng sau Champion League</a></b>
    </div>
    <div class="home_readmost_extranews">
      <img src="Library/Image/kane.jpg" class="home_readmost_extranews_img"">
      <b><a href="#" class="home_maintitle home_readmost_extranews_title" style="text-decoration: none;">Chiến thắng trước PSV,Tottenham nuôi hi vong đi tiếp vào vòng sau Champion League</a></b>
    </div>
    <div class="home_readmost_extranews">
      <img src="Library/Image/kane.jpg" class="home_readmost_extranews_img"">
      <b><a href="#" class="home_maintitle home_readmost_extranews_title" style="text-decoration: none;">Chiến thắng trước PSV,Tottenham nuôi hi vong đi tiếp vào vòng sau Champion League</a></b>
    </div>
 
  </div>
  <div class="homecontent_space" style="float: right;"></div>
  <div class="home_extranews">
    <h2 class="home_leftcontent_hotnews">Ngoại hạng Anh</h2>
     <?php 
      $sql = "SELECT * FROM post WHERE type LIKE '%Anh%' and duyet = 1 ORDER BY idaccount desc";
      $rs = mysqli_query($link,$sql);
      $row=mysqli_fetch_array($rs,MYSQLI_BOTH);
      echo '<div class="home_MainExtra">
      <img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" class="
      home_MainExtraImg">
      <b><a href="newscontent.php?id='.$row['idaccount'].'" class="home_maintitle home_MainExtraSize" style="text-decoration: none;font-size: 17px;">'.$row['header'].'</a></b>
      <p class="home_MainExtraSize">'.$row['title'].'</p>
    </div>';
      $sql = "SELECT * FROM post WHERE type LIKE '%Anh%' and duyet = 1 ORDER BY idaccount desc limit 6";
      $rs = mysqli_query($link,$sql);
     while ($row=mysqli_fetch_array($rs,MYSQLI_BOTH)) {
      echo '<div class="home_ExtraNewsSize">
      <img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" width="100px" height="70px">
      <div class="home_ExtraNewsContent">
        <a href="newscontent.php?id='.$row['idaccount'].'" class="home_leftcontent_a" style="text-decoration: none;">'.$row['header'].'</a>
      </div>
    </div>';
    }
    ?>
  </div>
    <div class="home_extranews">
    <h2 class="home_leftcontent_hotnews">Tây Ban Nha</h2>
    <?php 
      $sql = "SELECT * FROM post WHERE type LIKE '%TBN%' and duyet = 1 ORDER BY idaccount desc";
      $rs = mysqli_query($link,$sql);
      $row=mysqli_fetch_array($rs,MYSQLI_BOTH);
      echo '<div class="home_MainExtra">
      <img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" class="
      home_MainExtraImg">
      <b><a href="newscontent.php?id='.$row['idaccount'].'" class="home_maintitle home_MainExtraSize" style="text-decoration: none;font-size: 17px;">'.$row['header'].'</a></b>
      <p class="home_MainExtraSize">'.$row['title'].'</p>
    </div>';
      $sql = "SELECT * FROM post WHERE type LIKE '%TBN%' and duyet = 1 ORDER BY idaccount desc limit 6";
      $rs = mysqli_query($link,$sql);
     while ($row=mysqli_fetch_array($rs,MYSQLI_BOTH)) {
      echo '<div class="home_ExtraNewsSize">
      <img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" width="100px" height="70px">
      <div class="home_ExtraNewsContent">
        <a href="newscontent.php?id='.$row['idaccount'].'" class="home_leftcontent_a" style="text-decoration: none;">'.$row['header'].'</a>
      </div>
    </div>';
    }
    ?>
  </div>
</div>
<!--end content-->
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