<?php
ob_start();
?>
<?php
 require "login.php";
      if(!isset($_SESSION['txtus'])) // If session is not set then redirect to Login Page
       {
           header("Location:giohangchuacodnhap.php");  
       }

?>
<?php 
	include "head.php"
	?>
<?php
$title ="Book store";
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
	<!--///////////////////Cart Page//////////////////////-->
	<!--//////////////////////////////////////////////////-->
	<?php 
	if(is_countable($_SESSION['cart']) == 0)
	{
		header('Location: baogiohangtrong.php');
	}
	?>
	<div id="page-content" class="single-page">
		<div class="container">
			<!--div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li><a href="cart.php">Giỏ hàng</a></li>
					</ul>
				</div>
			</div-->
			
		<div class="row">
			<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<tr>
					<th>Sản phẩm</th>
					<th>Giá</th>
					<th>Số lượng</th>
					<th>Thành tiền</th>
					<th></th>
				</tr>
					<?php 
				require "inc/myconnect.php";
				if(isset($_SESSION['cart']))
				{
					foreach($_SESSION['cart'] as $key  => $value)
					{
						$item[]=$key;
					}
					// echo $item;
					$str= implode(",",$item);
			    	$query = "SELECT s.ID,s.Ten,s.date,s.Gia,s.HinhAnh,s.KhuyenMai,s.giakhuyenmai,s.Mota,s.soluongkho, n.Ten as Tennhasx,s.Manhasx
					from sanpham s 
					LEFT JOIN nhaxuatban n on n.ID = s.Manhasx
				 	WHERE  s.id  in ($str)";
					$result = $conn->query($query);
					$total = 0;
					$sosanpham = 0;
					foreach($result as $s)
					{
						$sosanpham += ($_SESSION['cart'][$s["ID"]]);
					?>
					<form name="form5" id="ff5" method="POST" action="removecart.php">
					<tr>
						<td>
							<a href="product.php?id=<?php  echo $s["ID"]?>">
							<img src="images/<?php  echo $s["HinhAnh"]?>" style="width:30px;height:40px"/> <?php  echo $s["Ten"]?>
						</a>
						</td>
						<td>
							<?php
							if($s["KhuyenMai"] == true)
							{                                      
							?>
								<?php  echo currency_format($s["giakhuyenmai"])?><!--span style="text-decoration:line-through;color: #aaa"><?php // echo currency_format($s["Gia"])?></span-->
							<?php 
							}
							?>
							<?php
							if($s["KhuyenMai"] == false)
							{
							?>
								<?php  echo currency_format($s["Gia"])?></div>
							<?php 
							}
							?>
						</td>
						<td>
							<input class="form-inline quantity" style="width:35px" min="1" max ="99" type="number" name ="qty[<?php echo $s["ID"] ?>]" value="<?php echo $_SESSION['cart'][$s["ID"]]?>"> 
							<input type="submit" name="update" value="cập nhật" style="width:60px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cập nhật số lượng"/>
							<?php 
							if($_SESSION['cart'][$s["ID"]] > $s["soluongkho"]){
								//echo "<script>alert('Có sách trong giỏ hàng không đủ số lượng trong kho')</script>";
								echo "Sản phẩm không đủ số lượng!";
							}
							?>
						</td>
						<td>
							<?php
							if($s["KhuyenMai"] == true)
							{                                      
							?>
								<label style="color:red"><?php 
								echo  currency_format($_SESSION['cart'][$s["ID"]] * $s["giakhuyenmai"])?></label> 
							<?php 
							}
							?>
							<?php
							if($s["KhuyenMai"] == false)
							{
							?>
								<label style="color:red"><?php
								echo  currency_format($_SESSION['cart'][$s["ID"]] * $s["Gia"])?></label> 
								<?php 
							}
							?>
						</td>
						<td>
							<input type="submit" name="remove" value="Xóa" class="fa fa-times pull-right" style="color:black;"/>	
							<input type="hidden" name="idsprm" value="<?php echo $s["ID"] ?>" />
						</td>
					</tr>
					</form>
					<?php
						if($s["KhuyenMai"] == true)
						{           
							$total +=$_SESSION['cart'][$s["ID"]] * $s["giakhuyenmai"];
						
						}
						if($s["KhuyenMai"] == false)
						{
							$total +=$_SESSION['cart'][$s["ID"]] * $s["Gia"];
						}
						
					}
				}
				?>
			</table>
		</div>
		</div><br><br><br>
		<div class="row">
			<div class="col-6" ><br><br><br>
			</div>
			<div class="col-6">
				<center><div class="col-6">
				<div class="well" style="border: 1px solid #333">
					<div class="row" style="border-bottom: 1px solid #333; padding-bottom:20px">
						<h6><?php echo $sosanpham ?> Sản phẩm</h6>
						<h6>Tổng: <?php echo currency_format($total) ?></h6>
					</div>
						<?php 
						if($_SESSION['cart'][$s["ID"]] > $s["soluongkho"]){
							?>
							
								<a href="#" class="btn btn-1" >Đặt hàng</a>
							
							<?php
						}
						else{
							?>
							
								<a href="dathang.php" class="btn btn-1" >Đặt hàng</a>
							
							<?php
						}
						?>
							
				</div>
				</div></center>
			</div>
		</div>
		</div>	
	</div>
	<?php 
	include "footer.php"
	?>
</body>
</html>
<?php ob_end_flush(); ?>

