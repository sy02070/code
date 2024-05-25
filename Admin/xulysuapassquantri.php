<?php
if(isset($_POST['change_pw'])){
    $maadmin = $_SESSION['maadmin'];
    $matkhaucu = $_POST['matkhaucu'];
    $matkhaumoi = $_POST['matkhaumoi'];
    $re_matkhaumoi = $_POST['re_matkhaumoi'];
    $set_matkhaucu = "select * from loginadmin where maadmin = '$maadmin' and matkhau = '$matkhaucu'";
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
    $change_password = "update loginadmin set matkhau = '$matkhaumoi' where maadmin = '$maadmin'";
    $run_change = mysqli_query($conn, $change_password);
    if($run_change){
        echo "<script>alert('Đổi mật khẩu thành công')</script>";
        echo "<script>window.open('suaquantri.php?suaquantri_pass', '_self')</script>";
    }
}
?>