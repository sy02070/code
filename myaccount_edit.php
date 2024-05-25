
<div>
    <div class="myaccount-content">
        <h3>Chỉnh sửa thông tin cá nhân</h3>
        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Họ tên</label>
                <input type="text" class="form-control" value="<?php echo $_SESSION['HoTen']; ?>" name="customer_name" id="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" name="customer_email" id="email">
            </div>
            <div class="mb-3">
                <label for="phonenumber" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" value="<?php echo $_SESSION['dienthoai']; ?>" name="customer_phone" id="phonenumber">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" value="<?php echo $_SESSION['DiaChi']; ?>" name="customer_address" id="address">
            </div>
            <button class="btn btn-primary" name="update">Sửa</button>
        </form>
    </div>
</div>

<?php

if(isset($_POST['update'])){
    $Makh = $_SESSION['Makh'];
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_phone = $_POST['customer_phone'];
    $customer_address = $_POST['customer_address'];
    $update_customer = "update loginuser set HoTen='$customer_name', email='$customer_email', DienThoai='$customer_phone', DiaChi='$customer_address' 
    where makh='$Makh'";
    $run_update = mysqli_query($conn, $update_customer);
    if($run_update){
        echo "<script>alert('Cập nhật thông tin cá nhân thành công. Mời đăng nhập lại.')</script>";
        echo "<script>window.open('dangxuat.php', '_self')</script>";
    }
}
?>
