<?php 
	include "login.php"
?>
<?php 
	include "head.php"
	?>
<?php 
	include "top.php"
    ?>
    <?php 
	include "header.php"
	?>
	<?php 
	include "navigation.php"
	?>
	<div id="page-content" class="single-page">
		<div class="container">
			<!--div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Trang chủ</a></li>
					</ul>
				</div>
			</div-->
            <div class="row">
                <h5>Chi tiết hóa đơn <?= $_GET['sodh']; ?></h5>
            </div>
			<div class="row">
            <div class="col-lg-12">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>            
                        </tr>
                    </thead>
                    <tbody>  
                
                    <?php
                            require 'inc/myconnect.php';
                            $sodh = $_GET['sodh'];
                            $sql="SELECT * from chitiethoadon c
                            left join sanpham s on c.masp = s.ID
                            where sodh = $sodh";
                            $result = $conn->query($sql); 
                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                            //chuyen ngay thanh kieu ngay thang nam
                        // $date=date_create($row["ngaydat"]);
                        // echo date_format($date,"d/m/Y");
                        ?>       
                        <tr>     
                        <td><a href='product.php?id=<?= $row["masp"] ?>' target='_blank'><img src='images/<?= $row["HinhAnh"] ?>' width='40px' height='50px' class='img-fluid' alt=''><?php echo $row["Ten"] ?></a></td>                                                   
                        <td><?php  echo $row["soluong"] ?></td>
                        <td><?php  echo currency_format($row["dongia"]) ?></td>
                        <td><?php  echo currency_format($row["thanhtien"]) ?></td>   
                        </tr>
            
                        <?php
                        
                            }
                        }
                            ?>
                    </tbody>                   
                </table>
            </div>                    
        </div>
        <div class="row">
            <a href="hoadon.php?hoadon_dangcho"><button type="button" name="cancel" class="btn btn-default">Thoát</button></a>
        </div>
		</div>
	</div>
	<?php 
	include "footer.php"
	?>
</body>
</html>
