

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
                  <h3 class="box-title">Chi tiết bình luận</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>Nội dung</th>
                            <th>Điểm đánh giá</th>
                            <th>Tác vụ</th>            
                        </tr>
                    </thead>
                    <tbody>  
               
                    <?php
                        require '../inc/myconnect.php';
                        $masp = $_GET['masp'];
                        $sql="SELECT * from comment c
                        left join loginuser l on c.makhachhang = l.makh
                        where masanpham = $masp";
                         $result = $conn->query($sql); 
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            ?>       
                                <tr>     
                                <td><?php  echo $row["HoTen"] ?></td>                                                   
                                <td><?php  echo $row["noidung"] ?></td>
                                <td><?php  echo $row["diemdanhgia"] ?></td>
                                <td>
                                <form action="" method="post">    
                                    <button class="btn btn-danger" name="xoabl" onclick="return confirm('Bạn có thật sự muốn xóa không ?');">
                                    <i class="fa fa-trash-o fa-lg" <acronym title="Xóa">
                                    </acronym></i></button>
                                    <input type="hidden" name="id" value="<?php  echo $row["macomment"] ?>">
                                </form>
                                </td>   
                                </tr>
                
                            <?php
                        
                            }
                        }
                        if(isset($_POST['xoabl'])){
                            require '../inc/myconnect.php';
                            $id = $_POST['id'];
                            $path = $_SERVER['SCRIPT_NAME'];
                            $queryString = $_SERVER['QUERY_STRING'];
                            // sql to delete a record
                            $sql = "DELETE FROM comment WHERE macomment=".$id;
                            if ($conn->query($sql) === TRUE) {
                                echo "<script>window.open('$path?$queryString','_self')</script>";
                            } 
                            else {
                                echo "Error deleting record: " . $conn->error;
                            }
                        }
                        ?>

                      
                    </tbody>                   
                  </table>
                  <div class="box-footer">
                      <a href="quanlybinhluan.php"><button type="button" name="cancel" class="btn btn-default">Thoát</button></a>
                    </div>
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
