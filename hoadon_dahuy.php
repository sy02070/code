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
                $select_hoadon_dangcho = "select * from hoadon where makhachhang = '$Makh' and trangthai='Đã hủy' ORDER BY ngaydat DESC";
                $run_hoadon_dangcho = mysqli_query($conn, $select_hoadon_dangcho);
                while($row_hoadon_dangcho = mysqli_fetch_array($run_hoadon_dangcho)){
                    $sodh = $row_hoadon_dangcho['sodh'];
                    $ngaydat = strtotime($row_hoadon_dangcho['ngaydat']);
                    $ngaydat_format = date("d/m/Y", $ngaydat);
                    $diachi = $row_hoadon_dangcho['diachi'];
                    $hinhthucthanhtoan = $row_hoadon_dangcho['hinhthucthanhtoan'];
                    $trangthai = $row_hoadon_dangcho['trangthai'];
                    $thanhtien = currency_format($row_hoadon_dangcho['thanhtien']);
                    $select_chitiethoadon = "select * from chitiethoadon where sodh='$sodh'";
                    $run_chitiethoadon = mysqli_query($conn, $select_chitiethoadon);
                    $count_chitiethoadon = mysqli_num_rows($run_chitiethoadon);
                    echo "
                    <tr class='bg-white'>
                    <td>$sodh</td>
                    <td>$ngaydat_format</td>
                    <td>$diachi</td>
                    <td>$hinhthucthanhtoan</td>
                    <td class='text-danger'>$thanhtien</td>
                        <td class='";
                        if($trangthai=='Đã hủy') echo "text-danger";
                        else echo "text-secondary";  
                    echo "' style='width: 15%'>$trangthai</td>
                        
                        <td>
                            <form action='' method='post'>
                                <input type='hidden' name='sodh' value='$sodh'>
                                <a class='btn btn-primary' href='hoadon_chitiet.php?sodh=$sodh'>Chi tiết</a>&emsp;
                                <!--td class=''><button name='buy_again' class='btn btn-white bg-danger p-2 text-white' style='border: none; padding: 0'>Mua lại</button></td-->
                            </form>
                        </td>
                        
                    </tr>    
                    ";
                }
            }
        ?>
        
    </table> 
</div>
