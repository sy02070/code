<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>Mã hóa đơn</th>
            <th>Ngày đặt</th>
            <th>Địa chỉ nhận hàng</th>
            <th>Hình thức thanh toán</th>
            <th>Thành tiền</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
        <?php
            if(isset($_SESSION['Makh'])){
                $Makh = $_SESSION['Makh'];
                $select_hoadon_danggiao = "select * from hoadon where makhachhang = '$Makh' and trangthai='Đang giao' ORDER BY ngaydat DESC";
                $run_hoadon_danggiao = mysqli_query($conn, $select_hoadon_danggiao);
                while($row_hoadon_danggiao = mysqli_fetch_array($run_hoadon_danggiao)){
                    $sodh = $row_hoadon_danggiao['sodh'];
                    $ngaydat = strtotime($row_hoadon_danggiao['ngaydat']);
                    $ngaydat_format = date("d/m/Y", $ngaydat);
                    $diachi = $row_hoadon_danggiao['diachi'];
                    $hinhthucthanhtoan = $row_hoadon_danggiao['hinhthucthanhtoan'];
                    $trangthai = $row_hoadon_danggiao['trangthai'];
                    $thanhtien = currency_format($row_hoadon_danggiao['thanhtien']);
                    echo "
                    <tr class='bg-white'>
                    <td>$sodh</td>
                    <td>$ngaydat_format</td>
                    <td>$diachi</td>
                    <td>$hinhthucthanhtoan</td>
                    <td class='text-danger'>$thanhtien</td>
                        <td class='";
                        if($trangthai=='Đang giao') echo "text-warning";
                        else echo "text-secondary";  
                    echo "' style='width: 15%'>$trangthai</td>
                        
                        <td>
                            <form action='' method='post'>
                                <input type='hidden' name='sodh' value='$sodh'>
                                <a class='btn btn-primary' href='hoadon_chitiet.php?sodh=$sodh'>Chi tiết</a>&emsp;
                                <button name='nhanhang' class='btn btn-white bg-success p-2 text-white' style='border: none; padding: 0'>Đã nhận hàng</button>
                            </form>
                        </td>
                        
                    </tr>    
                    ";
                }
            }
        ?>
        
    </table> 
</div>
<?php
    if(isset($_POST['nhanhang'])){
        $sodh = $_POST['sodh'];
        $update_hoadon = "update hoadon set trangthai='Đã giao', ngaynhan = NOW() where sodh='$sodh'";
        $run_update = mysqli_query($conn, $update_hoadon);
        if($run_update){
            echo "
                <script>alert('Cảm ơn quý khách đã mua hàng của chúng tôi')</script>
            ";
            echo "
                <script>window.open('hoadon.php?hoadon_dangcho', '_self')</script>
            ";
        }
    }
?>