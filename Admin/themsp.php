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
          Bảo trì sản phẩm
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
                  <h3 class="box-title">Thêm sản phẩm</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="<?php include 'xulyluasp.php' ?>" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tên</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="name" placeholder="Tên" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label" >Hình ảnh</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control"  placeholder="Chọn tiệp" name="hinhanh" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tác giả</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="tacgia" placeholder="Tác giả" required>
                      </div>
                    </div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label" >Nhà xuất bản</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="manhasx">
                    <option selected="selected" value="0">Chọn Nhà xuất bản</option>
                     <?php
                         require '../inc/myconnect.php';
                         $sql="SELECT ID,Ten from nhaxuatban where ID != 0";
                         $result = $conn->query($sql); 
                         if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                      ?>
                      <option value="<?php echo $row["ID"] ?>"><?php echo $row["Ten"] ?></option>
                      <?php 
                          }
                        }
                      ?>
                    </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label" >Danh mục</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="madanhmuc">
                    <option selected="selected" value="0">Chọn Danh mục</option>
                     <?php
                         require '../inc/myconnect.php';
                         $sql="SELECT * from danhmuc where Madmcha != 0";
                         $result = $conn->query($sql); 
                         if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                      ?>
                      <option value="<?php echo $row["Madanhmuc"] ?>"><?php echo $row["Tendanhmuc"] ?></option>
                      <?php 
                          }
                        }
                      ?>
                    </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label" >Ngày xuất bản</label>
                    <div class="col-sm-10">
                    <input type="date" class="form-control" id="datechoose" name="ngay" required> 
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label" >Giá</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  name="gia">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label" >Khuyến mãi</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="khuyenmai">
                    <option selected="selected" value="1">Có khuyến mãi</option>
                    <option  value="0">Không khuyến mãi</option>
                    </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label" >Giá khuyến mãi</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  name="giakhuyenmai">
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label" >Số lượng kho</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  name="soluongkho">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-10">
                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                                            Nhập mô tả
                    </textarea>
                    </div>
                  </div>                 
     
                  <div class="box-footer">
                   <a href="qlysanpham.php"><button type="button" name="cancel" class="btn btn-default">Thoát</button></a>
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
    <!-- Lấy ngày hiện tại -->
<script>
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;
    document.getElementById("datechoose").value = today;
</script>
  </body>
</html>
<?php ob_end_flush(); ?>