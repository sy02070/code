<div class="box">
    <div class="box-header">
        <h3 class="box-title">Đơn hàng chờ xác nhận</h3>
    </div><!-- /.box-header -->
    <p>&emsp;
        <a href="quanlyhoadon.php?hd_dangcho" class = "btn btn-secondary text-white me-3">Chờ xác nhận</a>&emsp;
        <a href="quanlyhoadon.php?hd_danggiao" class = "btn btn-primary text-white me-3">Đang giao</a>&emsp;
        <a href="quanlyhoadon.php?hd_dagiao" class = "btn btn-primary text-white me-3">Đã giao</a><!--secondary-->

    </p>
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>Mã hóa đơn</th>
            <th>Ngày đặt</th>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Điện thoại</th> 
            <th>Địa chỉ</th>
            <th>Hình thức thanh toán</th>
            <th>Thành tiền</th>
            <th>Thao tác</th>               
            </tr>
        </thead>
        <tbody>  
    
        <?php
                require '../inc/myconnect.php';

                $sql="SELECT * from hoadon where trangthai ='Đang chờ'";
                $result = $conn->query($sql); 
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                //chuyen ngay thanh kieu ngay thang nam
            // $date=date_create($row["ngaydat"]);
            // echo date_format($date,"d/m/Y");
            ?>       
            <tr>     
            <td><?php  echo $row["sodh"] ?></td>                                                   
            <td><?php  $date=date_create($row["ngaydat"]); echo date_format($date,"d/m/Y"); ?></td>
            <td><?php  echo $row["tenkh"] ?></td>
            <td><?php  echo $row["emailkh"] ?></td>
            <td><?php  echo $row["dienthoai"] ?></td>
            <td><?php  echo $row["diachi"] ?></td>
            <td><?php  echo $row["hinhthucthanhtoan"] ?></td>
            <td><?php  echo currency_format($row["thanhtien"]) ?></td>  
            <form action="" method="post">
                <td><a class="btn btn-primary" href="xemchitiethoadon.php?sodh=<?php  echo $row["sodh"]  ?>">Chi tiết</a>&emsp;
                <button name="xacnhan" onclick="return confirm('Bạn muốn xác nhận đơn hàng này ?');" class="btn btn-primary text-white">Xác nhận</button>&emsp;
                <button name="huyxn"   onclick="return confirm('Bạn muốn hủy đơn hàng này ?');" class="btn btn-danger dropdown-toggle"<acronym title="Thông tin khách hàng không phù hợp"></acronym>Hủy</button>
                <input type="hidden" name="sodh" value="<?= $row["sodh"]; ?>">
            </form>
        
            
            </td>          
            </tr>

            <?php
            
                }
            }
                ?>
        </tbody>                   
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
<?php
    if(isset($_POST['xacnhan'])){
        $sodh = $_POST['sodh'];
        $update_order = "update hoadon set trangthai = 'Đang giao' where sodh = '$sodh'";
        $run_update = mysqli_query($conn, $update_order);
        if($run_update){
            echo "<script>window.open('quanlyhoadon.php?hd_dangcho', '_self')</script>";
        }
    }
    if(isset($_POST['huyxn'])){
        $sodh = $_POST['sodh'];
        $update_order = "update hoadon set trangthai = 'Không được xác nhận (Thông tin liên hệ không phù hợp)' where sodh = '$sodh'";
        $run_update = mysqli_query($conn, $update_order);
        if($run_update){
            echo "<script>window.open('quanlyhoadon.php?hd_dangcho', '_self')</script>";
        }
    }
?>