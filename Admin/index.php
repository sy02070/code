<?php
ob_start();
?>
<?php 
 include "head.php";
?>
<?php
 require "loginAdmin.php";
      if(!isset($_SESSION['tendangnhap'] )) // If session is not set then redirect to Login Page
       {
           header("Location:login.php");  
       }
?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

    <?php 
 include "Header.php";
?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php 
 include "aside.php";
?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Trang quản trị
            <small>Admin</small>
          </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Trang quản trị</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                  <h4>Sản phẩm đã bán</h4>
                  <h3>
                    <?php 
                    require '../inc/myconnect.php';
                    $select_spban = "SELECT soluong from chitiethoadon";
                    $run_spban = mysqli_query($conn, $select_spban);
                    $count_spban = mysqli_num_rows($run_spban);
                    $spban = 0;
                    if ($count_spban > 0) {
                        while($row_spban = mysqli_fetch_array($run_spban)){
                          // $spban += $row_spban["soluong"];
                          $spban += $row_spban["soluong"];
                        }
                        echo $spban;
                    }
                    ?>
                  </h3>
                  </div>
                </div>
              </div><!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-info ">
                  <div class="inner">
                  <h4>Doanh thu</h4>
                  <h3>
                    <?php 
                    require '../inc/myconnect.php';
                    $select_doanhthu = "SELECT thanhtien from hoadon";
                    $run_doanhthu = mysqli_query($conn, $select_doanhthu);
                    $count_doanhthu = mysqli_num_rows($run_doanhthu);
                    $doanhthu = 0;
                    if ($count_doanhthu > 0) {
                        while($row_doanhthu = mysqli_fetch_array($run_doanhthu)){
                          $doanhthu += $row_doanhthu["thanhtien"];
                        }
                        echo currency_format($doanhthu);
                    }
                    ?>
                  </h3>
                  </div>
                </div>
              </div><!-- ./col -->
          </div><br><br><br>
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                <h4>Bảo trì</h4>
                <h3>Sản phẩm</h3>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="qlysanpham.php" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                <h4>Bảo trì</h4>
                <h3>Nhà xuất bản</h3>
                </div>
                <div class="icon">
                  <i class="ion-ios-home"></i>
                </div>
                <a href="qlynhasx.php" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
              <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                <h4>Bảo trì</h4>
                <h3>Danh mục</h3>
                </div>
                <div class="icon">
                  <i class="ion-ios-home"></i>
                </div>
                <a href="quanlydv.php" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                <h4>Bảo trì</h4>
                <h3>Bình luận</h3>
                </div>
                <div class="icon">
                  <i class="fa fa-television"></i>
                </div>
                <a href="quanlybinhluan.php" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                <h4>Bảo trì</h4>
                <h3>Khách hàng</h3>
                </div>
                <div class="icon">
                  <i class="ion-person-stalker"></i>
                </div>
                <a href="qlykhachhang.php" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                <h4>Bảo trì</h4>
                <h3>Đơn hàng</h3>
                </div>
                <div class="icon">
                  <i class="ion-printer"></i>
                </div>
                <a href="quanlyhoadon.php?hd_dangcho" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            </div><!-- /.row -->
          <!-- Main row -->
        
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php 
 include "footer.php";
?>

      <!-- Control Sidebar -->
      <?php 
 include "ControlSidebar.php";
?>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <?php 
 include "script.php";
?>
  </body>
</html>
<?php ob_end_flush(); ?>
