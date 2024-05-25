<div class="row">
    <div class="col-lg-7 col-md-9 col-12 myaccount-content">
        <h3>Đổi mật khẩu</h3>
        <form action="" method="post">
            <div class="mb-3">
                <label for="oldpw" class="form-label">Mật khẩu cũ</label>
                <input type="password" class="form-control" name="matkhaucu" id="oldpw">
            </div>
            <div class="mb-3">
                <label for="newpw" class="form-label">Mật khẩu mới</label>
                <input type="password" class="form-control" name="matkhaumoi" id="newpw">
            </div>
            <div class="mb-3">
                <label for="renewpw" class="form-label">Xác nhận mật khẩu</label>
                <input type="password" class="form-control" name="re_matkhaumoi" id="renewpw">
            </div>
            <button type="submit" name="change_pw" class="btn btn-primary">Đổi mật khẩu</button>
        </form>
    </div>
</div>

<?php
if(isset($_POST['change_pw'])){
    $Makh = $_SESSION['Makh'];
    $matkhaucu = $_POST['matkhaucu'];
    $matkhaumoi = $_POST['matkhaumoi'];
    $re_matkhaumoi = $_POST['re_matkhaumoi'];
    $set_matkhaucu = "select * from loginuser where makh = '$Makh' and matkhau = '$matkhaucu'";
    $run_set_old = mysqli_query($conn, $set_matkhaucu);
    $check_matkhaucu = mysqli_fetch_array($run_set_old);
    if($check_matkhaucu == 0){
        echo "<script>alert('Mật khẩu hiện tại không đúng.')</script>";
        exit();
    }
    if($matkhaumoi != $re_matkhaumoi){
        echo "<script>alert('Mật khẩu mới không trùng khớp.')</script>";
        exit();
    }
    $change_password = "update loginuser set matkhau = '$matkhaumoi'";
    $run_change = mysqli_query($conn, $change_password);
    if($run_change){
        echo "<script>alert('Đổi mật khẩu thành công')</script>";
        echo "<script>window.open('myaccount.php?myaccount_info', '_self')</script>";
    }
}
?>