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
          Bảo trì nhân viên
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->

            <!-- right column -->
  
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Thêm nhân viên</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="<?php include 'xulyluaquantri.php' ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3"  class="col-sm-2 control-label">Tên đăng nhập</label>
                      <div class="col-sm-10">
                        <input type="text" name="tendn" class="form-control" placeholder="Nhập tên dăng nhập" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3"  class="col-sm-2 control-label">Mật khẩu</label>
                      <div class="col-sm-10">
                        <input type="text" name="mk" class="form-control" placeholder="Nhập mật khẩu" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3"  class="col-sm-2 control-label">Họ tên</label>
                      <div class="col-sm-10">
                        <input type="text" name="hoten" class="form-control" placeholder="Nhập họ tên" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3"  class="col-sm-2 control-label">Số điện thoại</label>
                      <div class="col-sm-10">
                        <input type="text" name="dt" class="form-control" placeholder="Nhập số điện thoại" required>
                      </div>
                    </div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Chức vụ</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="cv">
                        <option  value="Nhân viên">Nhân viên</option>
                        <option  value="Quản lý">Quản lý</option>
                    </select>
                    </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                  <a href="qlyquantri.php"><button type="button" name="cancel" class="btn btn-default">Thoát</button></a>
                    <button type="submit" name="create" class="btn btn-info pull-right">Thêm</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
              <!-- general form elements disabled -->
            <!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
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
    <script src="../../dist/js/demo.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>

