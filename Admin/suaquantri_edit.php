<div class="box box-info">
<div class="box-header with-border">
    <h3 class="box-title">
        <a href="suaquantri.php?suaquantri_edit" class = "btn btn-secondary text-white me-3">Sửa thông tin</a>&emsp;
        <a href="suaquantri.php?suaquantri_pass" class = "btn btn-primary text-white me-3">Đổi mật khẩu</a><!--secondary-->
    </h3>
</div><!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal" method="POST" action="<?php include 'xulysuaquantri.php' ?>">
    <div class="box-body">

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Tên đăng nhập</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="tendn" required value="<?php echo $row["tendangnhap"] ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Họ tên</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="hoten" required value="<?php echo $row["hoten"] ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Điện thoại</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="dt" required value="<?php echo $row["dienthoai"] ?>">
        </div>
    </div>
    
    <div class="box-footer">
        <a href="index.php"><button type="button" name="cancel" class="btn btn-default">Thoát</button></a>
        <button type="submit" name="Edit" class="btn btn-info pull-right">Sửa</button>
    </div><!-- /.box-body -->
    </div><!-- /.box-footer -->
</form>
</div><!-- /.box -->