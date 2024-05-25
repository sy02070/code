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
<?php 
	if(isset($_GET["txttimkiem"])){
		$_SESSION['timkiem'] = $_GET["txttimkiem"] ;
	}
		$tentimkiem = $_SESSION['timkiem'];
?>
	<!--//////////////////////////////////////////////////-->
	<!--///////////////////Category Page//////////////////-->
	<!--//////////////////////////////////////////////////-->
	<div id="page-content" class="single-page">
		<div class="container">
			<!--div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
					<li><a href="index.php">Trang chủ</a></li>
					<li><a>Kết quả tìm kiếm</a></li>
					</ul>
				</div>
			</div-->

			<div class="row">
				<div id="main-content" class="col-md-8">

				<div class="row">
					<p>
  						<button class="btn btn-primary glyphicon glyphicon-filter" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    						
  						</button>
					</p>
					<div class="collapse" id="collapseExample">
  						<div class="card card-body col-md-12">
					  		
							<form action="timkiem.php" method="GET">
								
								<div class="row">
									<!-- <div class="col-md-6">
										<label class="heading">Theo danh mục :</label><br>
											<input type="radio"  name="vanhoc" value="1">
											<label for="vanhoc">Văn học</label><br>

											<input type="radio"  name="kinhte" value="2">
											<label for="kinhte">Kinh tế</label><br>

											<input type="radio"  name="tamly" value="3">
											<label for="tamly">Tâm lý - Kỹ năng sống</label><br>

											<input type="radio"  name="tieusu" value="4">
											<label for="tieusu">Tiểu sử - Hồi ký</label><br>

											<input type="radio"  name="sgk" value="5">
											<label for="sgk">Sách giáo khoa - Tham khảo</label><br>
									</div> -->
									<div class="col-md-6">
										<label class="heading"> Theo giá :</label>
											<select id="loctheogia" name="loctheogia">
    											<option value="100000">< 100.000₫</option>
    											<option value="200000">< 200.000₫</option>
												<option value="300000">< 300.000₫</option>
    											<option value="400000">< 400.000₫</option>
												<option value="500000">< 500.000₫</option>
											</select>
									</div>
								</div>
								<div class="row">
									<button type="submit" name="tk" class="btn"><span class="glyphicon glyphicon-search"></span></button> 
								</div>
							</form>
  						</div>
					</div>

				
					<!-- <div >

						<button class="btn btn-primary glyphicon glyphicon-filter" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
							
						</button>
					</div>
						<div class="collapse" id="collapseExample">
						<div class="card card-body">
						<form action="timkiem.php" method="GET">
						<label class="heading"> Theo giá :</label>
							<select id="loctheogia" name="loctheogia">
    							<option value="100">< 100.000₫</option>
    							<option value="200">< 200.000₫</option>
								<option value="300">< 300.000₫</option>
    							<option value="400">< 400.000₫</option>
								<option value="500">< 500.000₫</option>
							</select><br>
							<button type="submit" name="tk" class="btn"><span class="btn btn-primary glyphicon glyphicon-filter"></span></button> 
						</form>
						</div>
						</div> -->



				</div>

					<div class="row">
						<div class="col-md-12">
							<div class="products">
							<?php

							   require 'inc/myconnect.php';
							   //lay san pham theo id
							   //$tentimkiem = $_GET["txttimkiem"];
							   if(isset($_GET["loctheogia"])){
									$loctheogia = $_GET["loctheogia"] ;
									$result = mysqli_query($conn, "select count(ID) as total from sanpham where Ten like '%$tentimkiem%' or tacgia like '%$tentimkiem%' and Gia < $loctheogia" );
								}
								else{
									$result = mysqli_query($conn, "select count(ID) as total from sanpham where Ten like '%$tentimkiem%' or tacgia like '%$tentimkiem%'" );
								}
							   
							   $row = mysqli_fetch_assoc($result);
							   $total_records = $row['total'];
							   if($row['total'] == 0)
							   {
								header('Location: khongtimthay.php');
							   }
							   
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
								
							   // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
							   // Có limit và start rồi thì truy vấn CSDL lấy danh Sách tin tức
							   	if(isset($_GET["loctheogia"])){
									$loctheogia = $_GET["loctheogia"] ;
									$result = mysqli_query($conn, "SELECT * FROM sanpham where Ten like '%$tentimkiem%' or tacgia like '%$tentimkiem%' and Gia < $loctheogia LIMIT $start, $limit " );
								}
								else{
									$result = mysqli_query($conn, "SELECT * FROM sanpham where Ten like '%$tentimkiem%' or tacgia like '%$tentimkiem%'  LIMIT $start, $limit " );
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
					   <li class="active"><a href="#"><?php echo $i ?></a></li>					   
						  <?php 
				}

			?>
			<?php
			if($i != $current_page){
			 ?>	
			 	  <li><?php echo '<a href="timkiem.php?txttimkiem='.$tentimkiem.'&page='.$i.'">'.$i.'</a> '; ?></li>
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

