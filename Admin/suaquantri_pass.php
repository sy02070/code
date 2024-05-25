<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">
        <a href="suaquantri.php?suaquantri_edit" class = "btn btn-primary text-white me-3">Sửa thông tin</a>&emsp;
        <a href="suaquantri.php?suaquantri_pass" class = "btn btn-secondary text-white me-3">Đổi mật khẩu</a><!--secondary-->
    </h3>
</div><!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal" method="POST" action="<?php include 'xulysuapassquantri.php' ?>">
    <div class="box-body">

    <div class="form-group">
        <label for="oldpw" class="col-sm-2 control-label">Mật khẩu cũ</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" name="matkhaucu" required id="oldpw">
        </div>
    </div>
    <div class="form-group">
        <label for="newpw" class="col-sm-2 control-label">Mật khẩu mới</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" name="matkhaumoi" required id="newpw">
        </div>
    </div>
    <div class="form-group">
        <label for="renewpw" class="col-sm-2 control-label">Xác nhận mật khẩu mới</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" name="re_matkhaumoi" required id="renewpw">
        </div>
    </div>
    
    <div class="box-footer">
        <a href="index.php"><button type="button" name="cancel" class="btn btn-default">Thoát</button></a>
        <button type="submit" name="change_pw" class="btn btn-info pull-right">Đổi mật khẩu</button>
    </div><!-- /.box-body -->
    </div><!-- /.box-footer -->
</form>
</div><!-- /.box -->