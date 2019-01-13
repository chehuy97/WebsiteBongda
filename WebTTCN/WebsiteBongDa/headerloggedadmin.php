
<nav class="navbar navbar-inverse header_block" style="padding-right: 1%;">
  <div class="container-fluid " style="margin-left: 4%;">
    <div class="navbar-header">
      <a class="navbar-brand" href="Index.php">bongda.vn</a>
    </div>
       <ul class="nav navbar-nav">
      <li class="active"><a href="Index.php">Trang chủ</a></li>
      <li><a href="Anh.php">Anh</a></li>
      <li><a href="TBN.php">TBN</a></li>
      <li><a href="Phap.php">Pháp</a></li>
      <li><a href="Duc.php">Đức</a></li>
      <li><a href="Y.php">Ý</a></li>
      <li><a href="C1.php">Champion League</a></li>
      <li><a href="ChuyenNhuong.php">Chuyển nhượng</a></li>
      <li><a href="LichThiDau.php">Lịch thi đấu</a></li>
      <li><a href="TimKiem.php">Tìm kiếm</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="usermanagement.php">Quản lí User</a></li>
          <li><a href="adduser.php">Thêm User</a></li>
          <li><a href="pheduyetbaiviet.php">Phê duyệt bài viết</a></li>
        </ul>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="AccountInfor.php"><span class="glyphicon glyphicon-user"></span><?php echo "".$_SESSION['user']; ?></a></li>
      <li>
      <form method="POST">
      <input type="submit" name="logout" value="logout" style="margin-top: 20%;color: #333;">
     </form>
     </li>
    </ul>
    <?php
        if (isset($_POST['logout'])) {
          $check=0;
          $_SESSION['check'] = $check;
          header("location: DangNhap.php");
        }
    ?>
  </div>
</nav>