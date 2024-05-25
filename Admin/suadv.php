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
    <?php 
 include "aside.php";
?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Bảo trì danh mục
          </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang quản trị</a></li>
          </ol> -->
        </section>
        <?php
   require '../inc/myconnect.php';
   //lay san pham theo id
   $Madanhmuc = $_GET["Madanhmuc"];
   $query="SELECT * from danhmuc where Madanhmuc =".$Madanhmuc;
   $result = $conn->query($query);
$row = $result->fetch_assoc();
?>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->

            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Sửa danh mục</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="<?php include 'xulysuadv.php' ?>">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tên danh mục</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="tendm" required value="<?php echo $row["Tendanhmuc"] ?>">
                        <input type="hidden" class="form-control" name="madm" value="<?php echo $row["Madanhmuc"] ?>">
                      </div>
                    </div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Mã danh mục gốc</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="madmcha">
                      <option selected="selected" value="0"></option>
                      <?php
                         require '../inc/myconnect.php';
                         $sqls="SELECT * from danhmuc ";
                         $results = $conn->query($sqls); 
                         if ($results->num_rows > 0) {
                          // output data of each row
                          while($rows = $results->fetch_assoc()) {
                      ?>
                        <option value="<?php echo $rows["Madanhmuc"] ?>"><?php echo $rows["Madanhmuc"] ?> - <?php echo $rows["Tendanhmuc"] ?></option>
                      <?php 
                          }
                        }
                      ?>
                    </select>
                    </div>
                    </div>
                    <div class="box-footer">
                      <a href="quanlydv.php"><button type="button" name="cancel" class="btn btn-default">Thoát</button></a>
                      <button type="submit" name="Edit" class="btn btn-info pull-right">Sửa</button>
                    </div><!-- /.box-body -->
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
              <!-- general form elements disabled -->
            <!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     
      <!-- Control Sidebar -->
      <?php 
      include "footer.php";
     ?>
  <?php 
 include "ControlSidebar.php";
?>
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>