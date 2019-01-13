<?php
session_start();
//get api
     $APIkey = "1a951a45cb481c7bcdf26ac6d2de6f26e3b3e43aedfe523901b1abe4e77c5faf";
    //  $selectOption = $_POST['league'];
    //  if ($selectOption == 'Premier league'){
    //    echo $selectOption;  
    //  }
     $league_id = 62;
    $curl_options = array(
        CURLOPT_URL => "https://apifootball.com/api/?action=get_standings&league_id=$league_id&APIkey=$APIkey",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_CONNECTTIMEOUT => 5
    );
  
    $curl = curl_init();
    curl_setopt_array( $curl, $curl_options );
    $result = curl_exec( $curl );
    
    $result = json_decode($result, true);
    

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
  <style>
            table,th,td{
                border:1px solid black;
                border-collapse: collapse;
            }
            th{
                background-color: #4c4a4a;
                color: white;
            }
            table.standing{
                width: 350px;
                
               
            }
            table.standing tbody{
                overflow: auto;
                height: 100px;
            }
            th.th1{
                width: 7%;
                
            }
            th.th2{
                width: 37%;
         
            }
            th.th3{
                width: 8%;
            }
            th.th4{
                width: 8%;
            }
            th.th5{
                width: 8%;
            }
            th.th6{
                width: 8%;
            }
            th.th7{
                width: 16%;
            }
            th.th8{
                width: 8%;
            }
            table.select_league{
                width:350px;
            }
            select.title{
                text-align: left;
                background: #f30000;
                padding: 5px 0;
                color: #ffffff;
                font-weight: bold;
                width: 100%;
                float: left;
            }
        
            table.select_league span{
                text-align: center;
                vertical-align: middle;
                overflow: auto;
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
  <div class="space" style="float: left;height: 700px;"></div>
  <div class="newscontent">
    <center>
     <table class="select_league" >
            
            <tbody>
                <tr>
                    <td>
                    <form method="post">
                        <select name="league" class="title" onchange="validateSelectBox(this)">
                            <option value="Premier league">Premier league</option>
                            <option value="Bundesliga">Bundesliga</option>
                            <option value="Serie A">Serie A</option>
                            <option value="La Liga">La Liga</option>
                            <option value="Ligue 1">Ligue 1</option>
                            <option value="Vleague">Vleague</option>
                        </select>
                        </form>
                        <span>BẢNG XẾP HẠNG</span>
                    </td>
                </tr>
            </tbody>
            
        </table>
        <table class="standing table-striped">
            <tr>       
                <th class="th1"></th>
                <th class="th2"></th>
                <th class="th3">ST</th>
                <th class="th4">T</th>
                <th class="th5">H</th>
                <th class="th6">B</th>
                <th class="th7">HS</th>
                <th class="th8">Đ</th>
            </tr>
            <tbody>
                
                   <?php
                   $count = count($result);
                   for($i=0;$i<$count;$i++){
                    echo '<tr><td>'.$result[$i]['overall_league_position'].'</td>
                    <td>'.$result[$i]['team_name'].'</td>
                    <td>'.$result[$i]['overall_league_payed'].'</td>
                    <td>'.$result[$i]['overall_league_W'].'</td>
                    <td>'.$result[$i]['overall_league_D'].'</td>
                    <td>'.$result[$i]['overall_league_L'].'</td>
                    <td>'.$result[$i]['overall_league_GF'].' - '.$result[$i]['overall_league_GA'].'</td>
                    <td>'.$result[$i]['overall_league_PTS'].'</td>
                    </tr>';
                   }
                   
                    ?>
                    
            
            </tbody>
        </table>
       </center> 
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



















