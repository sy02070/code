<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>Mã hóa đơn</th>
            <th>Ngày đặt</th>
            <th>Địa chỉ nhận hàng</th>
            <th>Hình thức thanh toán</th>
            <th>Thành tiền</th>
            <th>Trạng thái</th>
            <th>Ngày nhận</th>
            <th>Thao tác</th>
        </tr>
        <?php
            if(isset($_SESSION['Makh'])){
                $Makh = $_SESSION['Makh'];
                $select_hoadon_dagiao = "select * from hoadon where makhachhang = '$Makh' and trangthai='Đã giao' ORDER BY ngaynhan DESC";
                $run_hoadon_dagiao = mysqli_query($conn, $select_hoadon_dagiao);
                while($row_hoadon_dagiao = mysqli_fetch_array($run_hoadon_dagiao)){
                    $sodh = $row_hoadon_dagiao['sodh'];
                    $ngaydat = strtotime($row_hoadon_dagiao['ngaydat']);
                    $ngaydat_format = date("d/m/Y", $ngaydat);
                    $ngaynhan = strtotime($row_hoadon_dagiao['ngaynhan']);
                    $ngaynhan_format = date("d/m/Y", $ngaynhan);
                    $diachi = $row_hoadon_dagiao['diachi'];
                    $hinhthucthanhtoan = $row_hoadon_dagiao['hinhthucthanhtoan'];
                    $trangthai = $row_hoadon_dagiao['trangthai'];
                    $thanhtien = currency_format($row_hoadon_dagiao['thanhtien']);
                    echo "
                    <tr class='bg-white'>
                    <td>$sodh</td>
                    <td>$ngaydat_format</td>
                    <td>$diachi</td>
                    <td>$hinhthucthanhtoan</td>
                    <td class='text-danger'>$thanhtien</td>
                        <td class='";
                        if($trangthai=='Đã giao') echo "text-success";
                        else echo "text-secondary";  
                    echo "' style='width: 15%'>$trangthai</td>
                        
                        <td>$ngaynhan_format</td>
                        <td>
                            <form action='' method='post'>
                                <input type='hidden' name='sodh' value='$sodh'>
                                <a class='btn btn-primary' href='hoadon_chitiet.php?sodh=$sodh'>Chi tiết</a>&emsp;
                            </form>
                        </td>
                    </tr>    
                    ";
                }
            }
        ?>
        
    </table> 
</div>
