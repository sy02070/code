<div class="box">
    <div class="box-header">
        <h3 class="box-title">Đơn hàng đã giao</h3>
    </div><!-- /.box-header -->
    <p>&emsp;
        <a href="quanlyhoadon.php?hd_dangcho" class = "btn btn-primary text-white me-3">Chờ xác nhận</a>&emsp;
        <a href="quanlyhoadon.php?hd_danggiao" class = "btn btn-primary text-white me-3">Đang giao</a>&emsp;
        <a href="quanlyhoadon.php?hd_dagiao" class = "btn btn-secondary text-white me-3">Đã giao</a><!--secondary-->

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
            <th>Ngày nhận</th>
            <th>Thao tác</th>               
            </tr>
        </thead>
        <tbody>  
    
        <?php
                require '../inc/myconnect.php';

                $sql="SELECT * from hoadon where trangthai ='Đã giao'";
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
            <td><?php  $date=date_create($row["ngaynhan"]); echo date_format($date,"d/m/Y"); ?></td>
            <td><a class="btn btn-primary" href="xemchitiethoadon.php?sodh=<?php  echo $row["sodh"]  ?>">Chi tiết</a></td>          
            </tr>

            <?php
            
                }
            }
                ?>
        </tbody>                   
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->