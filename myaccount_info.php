<div>
    <div class="myaccount-content">
        <h3><?php echo $_SESSION['HoTen']; ?></h3>
        <div class="row">
            <div class="table-responsive col-12">
                <table class="table table-striped table-hover">
                    <tr>
                        <td>Tên: </td>
                        <td><strong><?php echo $_SESSION['HoTen']; ?></strong></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><strong><?php echo $_SESSION['email']; ?></strong></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại: </td>
                        <td><strong><?php echo $_SESSION['dienthoai']; ?></strong></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ: </td>
                        <td><strong><?php echo $_SESSION['DiaChi']; ?></strong></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>