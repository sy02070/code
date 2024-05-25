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
                $select_hoadon_dangcho = "select * from hoadon where makhachhang = '$Makh' and (trangthai='Đang chờ' or trangthai LIKE '%Không được xác nhận%') ORDER BY ngaydat DESC";
                $run_hoadon_dangcho = mysqli_query($conn, $select_hoadon_dangcho);
                while($row_hoadon_dangcho = mysqli_fetch_array($run_hoadon_dangcho)){
                    $sodh = $row_hoadon_dangcho['sodh'];
                    $ngaydat = strtotime($row_hoadon_dangcho['ngaydat']);
                    $ngaydat_format = date("d/m/Y", $ngaydat);
                    $diachi = $row_hoadon_dangcho['diachi'];
                    $hinhthucthanhtoan = $row_hoadon_dangcho['hinhthucthanhtoan'];
                    $trangthai = $row_hoadon_dangcho['trangthai'];
                    $thanhtien = currency_format($row_hoadon_dangcho['thanhtien']);
                    echo "
                    <tr class='bg-white'>
                        <td>$sodh</td>
                        <td>$ngaydat_format</td>
                        <td>$diachi</td>
                        <td>$hinhthucthanhtoan</td>
                        <td class='text-danger'>$thanhtien</td>
                        <td class='";
                        if($trangthai=='Đang chờ') echo "text-warning";
                        else echo "text-warning";  
                    echo "' style='width: 15%'>$trangthai</td>
                        
                        <td>
                            <form action='' method='post'>
                                <input type='hidden' name='sodh' value='$sodh'>
                                <a class='btn btn-primary' href='hoadon_chitiet.php?sodh=$sodh'>Chi tiết</a>&emsp;
                                <button onclick='huydon($sodh)' id='huydon$sodh' class='btn btn-white text-danger'><i class='fa fa-times me-1'></i>Hủy</button>
                            </form>
                        </td>
                        
                    </tr>    
                    ";
                }
            }
        ?>
        
    </table> 
</div>
    <script>
        function huydon(id){
            var result = confirm("Bạn chắc chắn muốn hủy đơn hàng này? ");
            if(result==true){
                document.getElementById("huydon"+id).name = 'huydon';
            }
        }
    </script>
<?php
    if(isset($_POST['huydon'])){
        $sodh = $_POST['sodh'];
        $update_hoadon = "update hoadon set trangthai='Đã hủy' where sodh='$sodh'";
        $run_update = mysqli_query($conn, $update_hoadon);
        if($run_update){
            echo "
                <script>alert('Đã hủy đơn hàng')</script>
            ";
            echo "
                <script>window.open('hoadon.php?hoadon_dangcho', '_self')</script>
            ";
        }
    }
?>