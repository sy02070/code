<?php
ob_start();

 ?>
<?php
 require "login.php";
      if(!isset($_SESSION['txtus'])) // If session == null thi tra ve trang login
       {
           header("Location:account.php");  
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

  	<form name="form6" id="ff6" method="POST" action="<?php include 'luudonhang.php'?>">
	<div id="page-content" class="single-page">
	<div class="container">
			<!--div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Trang chủ</a></li>
						<li><a style="text-align:center">Xác nhận đơn hàng</a></li>
					</ul>
				</div>
			</div-->

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
			    $query = "SELECT s.ID,s.Ten,s.date,s.Gia,s.HinhAnh,s.KhuyenMai,s.giakhuyenmai,s.Mota, n.Ten as Tennhasx,s.Manhasx
				from sanpham s 
				LEFT JOIN nhaxuatban n on n.ID = s.Manhasx
				WHERE  s.id  in ($str)";
				$result = $conn->query($query);
				$total=0;
				foreach($result as $s)
				{
				?>
					<input class="form-inline quantity"  type="hidden" name ="qty[<?php echo $s["ID"] ?>]" value="<?php echo $_SESSION['cart'][$s["ID"]]?>"> 
					<input type="hidden" name="idsprm" value="<?php echo $s["ID"] ?>" />
						<?php
						if($s["KhuyenMai"] == true){                                      
						?>
					<input type="hidden" name="dongia" value="<?php echo $s["giakhuyenmai"] ?>"/>
						<?php 
						}
						?><?php
						if($s["KhuyenMai"] == false){
						?>
					<input type="hidden" name="dongia" value="<?php echo $s["Gia"] ?>" />
						<?php 
						}
				 	$total +=$_SESSION['cart'][$s["ID"]] * $s["Gia"];
				}
			}?>

	
			<div class="row" >
		
			<div class="col-6" >
				    <div class="panel panel-default">
					<div class="panel-heading">Thông tin khách hàng</div>
             		<div class="panel-body">		 
			 		<div class="col-md-12" >
					<table class="table table-bordered ">
						<tr>
							<th>Tên khách hàng: </th>
							<th><input class="col-md-12" type="text" name="tenkh" value="<?php echo  $_SESSION['HoTen']?>"></th>
						</tr>
						<tr>
							<th>Điện thoại: </th>
							<th><input class="col-md-12" type="text" name="dtkh" value="<?php echo  $_SESSION['dienthoai']?>"></th>
						</tr>
						<tr>
							<th>Email: </th>
							<th><input class="col-md-12" type="text" name="emailkh" value="<?php echo  $_SESSION['email']?>"></th>
						</tr>
						<tr>
							<th>Địa chỉ: </th>
							<th><input class="col-md-12" type="text" name="dckh" value="<?php echo  $_SESSION['DiaChi']?>"></th>
						</tr>
						<tr>
							<th>Hình thức thanh toán: </th>
							<th>
								<select class="selectpicker col-md-12" name="hinhthuctt">
									<option value="Trực tuyến">Trực tuyến</option>
									<option value="Khi nhận hàng">Khi nhận hàng</option>
								</select>
							</th>
						</tr>
						<input type="date" style="display: none;" class="form-control" placeholder="Ngày giao  :" name="date" id="datechoose"  required >
					</table>
			 		</div>
				   </div>	 
					</div>
					<center><input type="submit" name="Dat" value="Đặt hàng" class="btn btn-1"/></center>
			</div>        
		<div class="col-6">
			<div class="panel panel-default">
			<div class="panel-heading">Thông tin đơn hàng</div>
             <div class="panel-body">		 
			 <div class="col-md-12">
			 <div class="table-responsive">          
  				<table class="table">
    			<thead>
      			<tr>
        			<th>Sản phẩm</th>
        			<th>Số lượng</th>
        			<th>Giá</th>
      			</tr>
    			</thead>
    		<tbody>
			<?php
			if(isset($_SESSION['cart']))
			{
				foreach($_SESSION['cart'] as $key  => $value)
				{
					$item[]=$key;
				}
				// echo $item;
				$str= implode(",",$item);
			    $query = "SELECT s.ID,s.Ten,s.date,s.Gia,s.HinhAnh,s.KhuyenMai,s.giakhuyenmai,s.Mota, n.Ten as Tennhasx,s.Manhasx
				from sanpham s 
				LEFT JOIN nhaxuatban n on n.ID = s.Manhasx
				 WHERE  s.id  in ($str)";
				$result = $conn->query($query);
				
				$total=0;
				foreach($result as $s)
				{

				?>
      			<tr>
	  
				<td><?php echo $s["Ten"]?></td>
				<td><?php echo $slts=$_SESSION['cart'][$s["ID"]]?></td>
				<?php
               if($s["KhuyenMai"] == true)
								 {                                      
								?>
						 <td><?php  echo currency_format($s["giakhuyenmai"])?></td>
								<?php 
								}
								?>
								<?php
                if($s["KhuyenMai"] == false)
								 {
								?>
								     <td><?php  echo currency_format($s["Gia"])?></td>
								<?php 
								}
								?>
   
				</tr>
				<?php
               if($s["KhuyenMai"] == true)
								 {                                      
								?>
			  	<?php 
				 $total +=$_SESSION['cart'][$s["ID"]] * $s["giakhuyenmai"]  ?>
								<?php 
								}
								?>
								<?php
                if($s["KhuyenMai"] == false)
								 {
								?>
								  <?php 
				 $total +=$_SESSION['cart'][$s["ID"]] * $s["Gia"]  ?>
								<?php 
								}
								?>

	  			<?php 
				}
			}
			if($total > 200000){
				$phivc = 0;
			}
			else{
				$phivc = 20000;
			}
			?>
			
    	</tbody>
		<thead>
				<tr>
					<td>Phí vận chuyển <br>(miễn phí vận chuyển với đơn hàng trên 200.000₫)</td>
					<td></td>
					<td><?php echo '';echo currency_format($phivc) ?></td>
				</tr>
      			<tr>
        			<th>Tổng tiền:</th>
        			<th></th>
        			<th style="color:red"><strong style="color:red"  name="total"><?php echo currency_format($total + $phivc) ?></strong></th>  
					<input type="hidden" id="thannhtien" name="totals" value="<?php echo  ($total + $phivc) ?>"/>     
					<input type="hidden" name="total" id="total" value="" />  
      			</tr>
    			</thead>
  </table>
  
  		</div>
		</div>            
		</div>
		</div>
		</div> 
		</div> 

	</div>
	</div>	
    </form>		
	<?php 
	include "footer.php"
	?>
</body>
</html>
<!-- Lấy ngày hiện tại -->
<script>
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;
    document.getElementById("datechoose").value = today;
</script>
  <script src="plugins/select2/select2.full.min.js"></script>
<script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
      });
</script>

<?php ob_end_flush(); ?>