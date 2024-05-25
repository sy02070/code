<?php
ob_start();
?>
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
	<!--//////////////////////////////////////////////////-->
	<!--///////////////////Danh muc///////////////////////-->
	<!--//////////////////////////////////////////////////-->
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
				<div id="main-content" class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<div class="products">
							<?php
							   require 'inc/myconnect.php';
							   //lay san pham theo id
							   $madm = $_GET["madm"];
							   if($madm <= 15){
									$result = mysqli_query($conn, 'select count(s.ID) as total from sanpham s left join danhmuc d on s.Madm = d.Madanhmuc where d.Madmcha = '.$madm );	
							   }
							   else{
									$result = mysqli_query($conn, 'select count(ID) as total from sanpham where Madm = '.$madm );
							   }
							   
							   $row = mysqli_fetch_assoc($result);
							   $total_records = $row['total'];		
							   if($row['total'] == 0)
							   {
								 header('Location: khongcosanpham.php');
							   }					   
							   //$offset =1;
							   // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
							   $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
							   $limit = 9;
							   // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
							   // tổng số trang
							   $total_page = ceil($total_records / $limit);
								
							   // Giới hạn current_page trong khoảng 1 đến total_page
							   if ($current_page > $total_page){
								   $current_page = $total_page;
							   }
							   else if ($current_page < 1){
								   $current_page = 1;
							   }
								
							   // Tìm Start
							   $start = ($current_page - 1) * $limit;
								
							   // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH
							   // Có limit và start rồi thì truy vấn CSDL lấy danh Sách
							   if($madm <= 15){
								$result = mysqli_query($conn, "SELECT * FROM sanpham s left join danhmuc d on s.Madm = d.Madanhmuc where Madmcha = '$madm' LIMIT $start, $limit " );
							   }
							   else{
								$result = mysqli_query($conn, "SELECT * FROM sanpham where Madm = '$madm' LIMIT $start, $limit " );
							   }
							   
	// output data of each row
	while ($row = mysqli_fetch_assoc($result)){

?>

								<div class="col-lg-4 col-md-6 col-xs-6">
								<div class="product">
								<div class="image"><a href="product.php?id=<?php echo $row["ID"]?>"><img src="images/<?php echo $row["HinhAnh"]?>" style="width:250px;height:300px"/></a></div>
								<div class="caption">
									<div class="name" style="height:50px"><h3><a href="product.php?id=<?php echo $row["ID"]?>"><?php echo $row["Ten"]?></a></h3></div>
									<div class='star-rating'>
                                  		<ul class='list-inline' style="color:yellow; font-size:20px">
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star-empty'></i></li>
                                  		</ul>
                                	</div>
									<?php
                                 if($row["KhuyenMai"] == true)
								 {                                      
								?>
									<div class="price"><?php echo currency_format($row["giakhuyenmai"])?><span><?php echo currency_format($row["Gia"])?></span></div>
								<?php 
								}
								?>
								<?php
                                 if($row["KhuyenMai"] == false)
								 {
								?>
								    
									<div class="price"><?php echo currency_format($row["Gia"])?><span></span></div>
								<?php 
								}
								?>
								</div>
							</div>
								</div>
					<?php
						}
					?>
							</div>
						</div>
	
					</div>
		
		
					<div class="row text-center">
						<ul class="pagination">
						<?php 
						// PHẦN HIỂN THỊ PHÂN TRANG
			// BƯỚC 7: HIỂN THỊ PHÂN TRANG
			 
			// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
			for ($i = 1; $i <= $total_page; $i++){
				if ($i == $current_page){

					   ?>
					   <li class="active"><a href="#"><?php echo $i  ?></a></li>					   
						  <?php 
				}

			?>
			<?php
			if($i != $current_page){
			 ?>	
			 	  <li><?php echo '<a href="category2.php?madm='.$madm.'&page='.$i.'">'.$i.'</a> '; ?></li>
			 <?php
			}
			  ?>	
						  <?php 
			}
						  ?>
						</ul>
					</div>
				
		
				</div>
				<?php 
	
	include "sidebar.php"
	?>
			</div>
		</div>
	</div>	
	<?php 
	include "footer.php"
	?>
    </body>
</html>
<?php ob_end_flush(); ?>

