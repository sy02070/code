

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
    <?php 
 include "aside.php";
?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Bảo trì bình luận
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Bảo trì bình luận</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số bình luận</th>
                            <th>Thao tác</th>               
                            </tr>
                        </thead>
                        <tbody>  
                    
                        <?php
                                require '../inc/myconnect.php';
                                $select_sanpham="SELECT ID,Ten from sanpham ";
                                $run_sanpham = mysqli_query($conn, $select_sanpham);
                                $count_sanpham = mysqli_num_rows($run_sanpham);
                                if ( $count_sanpham > 0) {
                                // output data of each row
                                while($row_sanpham = mysqli_fetch_array($run_sanpham)) {
                                    $masp = $row_sanpham['ID'];
                                    $select_comment="SELECT * from comment where masanpham = '$masp'";
                                    $run_comment = mysqli_query($conn, $select_comment);
                                    $count_comment = mysqli_num_rows($run_comment);
                            ?>       
                            <tr>     
                            <td><?php  echo $row_sanpham["Ten"] ?></td>                                                   
                            <td><?php echo $count_comment ?></td>
                            <td><a class="btn btn-primary" href="xemchitietbinhluan.php?masp=<?php  echo $row_sanpham["ID"]  ?>">Chi tiết</a></td>          
                            </tr>

                            <?php
                            
                                }
                            }
                                ?>
                        </tbody>                   
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
        <!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php 
      include "footer.php";
     ?>                 			
  <?php 
 include "ControlSidebar.php";
?>
      <!-- Control Sidebar -->
  
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
