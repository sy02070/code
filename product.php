<?php
	session_start();
?>
<?php 
	include "head.php";
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
	<!--///////////////////Product Page///////////////////-->
	<!--//////////////////////////////////////////////////-->
	<div id="page-content" class="single-page">
	<?php
   require 'inc/myconnect.php';
   //lay san pham theo id
   $id = $_GET["id"];
   $query="SELECT s.ID,s.Ten,s.date,s.Gia,s.HinhAnh,s.tacgia,s.KhuyenMai,s.giakhuyenmai,s.Mota, n.Ten as Tennhasx,s.Manhasx
   from sanpham s 
   LEFT JOIN nhaxuatban n on n.ID = s.Manhasx
	WHERE  s.id =".$id;
   $result = $conn->query($query);
$row = $result->fetch_assoc();
if(isset($_POST['themgiohang']))
{
    $idsp = $_POST["idsp"];
    $sl;
        if(isset($_SESSION['cart'][$idsp]))
        {
            $sl = $_SESSION['cart'][$idsp] +1;
        }
        else
        {
            $sl=1;
        }
        $_SESSION['cart'][$idsp] = $sl;
        echo "<script>window.location.replace('./cart.php'); </script>";
		
}
if(isset($_POST['subcomment'])){
	if(isset($_SESSION['Makh'])){
	  $Makh = $_SESSION['Makh'];
	  $masanpham = $id;
	  $path = $_SERVER['SCRIPT_NAME'];
	  $queryString = $_SERVER['QUERY_STRING'];
	  $noidung = $_POST['Comment'];
	  $diemdanhgia = 4;
	  $insert_comment = "insert into comment (noidung, diemdanhgia, masanpham, makhachhang) 
	  values ('$noidung', '$diemdanhgia', '$masanpham', '$Makh')";
	  $run_comment = mysqli_query($conn, $insert_comment);
	  if($run_comment){
	   	// echo "<script>alert('Đã thêm bình luận')</script>";
	  	echo "<script>window.open('$path?$queryString','_self')</script>";
	  }
	}
	else{
	  echo "<script>alert('Bạn cần đăng nhập để thực hiện')</script>";
	  }
  }
?>
		<div class="container">
			<!--div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Trang chủ</a></li>
						<li><a href="#"><?php //echo $row["Ten"]?></a></li>
					</ul>
				</div>
			</div-->
			<div class="row">

				<div id="main-content" class="col-md-8">
					<div class="product">
						<div class="col-md-6">
							<div class="image">
								<img src="images/<?php echo $row["HinhAnh"]?>" style="width:250px;height:300px" />
								
							</div>
						</div>
						<div class="col-md-6">
							<div class="caption">
								<div class="name"><h5><?php echo $row["Ten"]?></h5></div>
								<div class='star-rating'>
                                  		<ul class='list-inline' style="color:yellow; font-size:20px">
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star-empty'></i></li>
                                  		</ul>
                                	</div>
								<div class="info">
									<ul>
										<li>Tác giả: <b><?php echo $row["tacgia"]?></b></li>
										<li>Ngày xuất bản: <?php $date=date_create($row["date"]); echo date_format($date,"d/m/Y"); ?></li>
										<li>Nhà xuất bản: <a href="category.php?manhasx=<?php echo $row["Manhasx"]?>"><?php echo $row["Tennhasx"]?></a> <h3></li>
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
								    <p style="color:red">Không có khuyến mãi</p>
									<div class="price"><?php echo currency_format($row["Gia"])?><span></span></div>
								<?php 
								}
								?>
								<div class="well">
								<form name="form3" id="ff3" method="POST" >
								<input type="submit" name="themgiohang" id="add-to-cart" class="btn btn-2" value="Thêm vào giỏ hàng" />
								<a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal">Mua ngay</a>
								<button name='like_product' class='btn btn-2 text-danger' style='background: none; border: none;font-size:20px'>
								<i class='text-danger 
								<?php
                                  if(isset($_SESSION['Makh'])){
                                    $Makh = $_SESSION['Makh'];
									$Masp = $row["ID"];
                                    $check_favorte = "select * from yeuthich where makhachhang = '$Makh' and masanpham = '$Masp'";
                                    $run_favorite = mysqli_query($conn, $check_favorte);
                                    $count_favorite = mysqli_num_rows($run_favorite);
                                    if($count_favorite==0){
                                      echo "glyphicon glyphicon-heart-empty";
                                    }
                                    else{
                                    echo "glyphicon glyphicon-heart";
                                    }
                                  }
                                  else{
                                    echo "glyphicon glyphicon-heart-empty";
                                  }
                                  ?>
									'></i></button>

								<input type="hidden" name="acction" value="them vao gio hang" />
								<input type="hidden" name="idsp" value="<?php echo $row["ID"] ?>" />
								</form>
								</div>
							
								
								
								

								
							</div>
						</div>
						<div class="clear"></div>
					</div>	
					<div class="product-desc">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#description">Thông tin sách</a></li>
						</ul>
						<div class="tab-content">
							<div id="description" class="tab-pane fade in active">
								
								<div innerHTML>
                      <p><?php echo $row["Mota"]?></p>
                    </div>						
							</div>
							
						</div>
					</div>



					<div class="p-comment">
                        <div class="container-fluid">
                            <div class="header ">
                                <p>NHẬN XÉT CỦA KHÁCH HÀNG</p>
                            </div>
                        </div>

                        <div class="">
                            <div class="container-fluid">
                                <div class="">
											<?php 
											$get_comment = "select * from comment where masanpham = '$id' order by macomment desc limit 0,5";
											$run_get_comment = mysqli_query($conn, $get_comment);
											$count_comment = mysqli_num_rows($run_get_comment);
											if($count_comment == 0){
											 	?>
												
											 		<p>Chưa có nhận xét</p>
												
											 	<?php
											}
											else{
												while($row_comment = mysqli_fetch_array($run_get_comment)){
													
													$makh = $row_comment['makhachhang'];
													$select_kh = "select * from loginuser where makh = '$makh'";
													$run_select_kh = mysqli_query($conn, $select_kh);
													$row_select_kh = mysqli_fetch_array($run_select_kh);
													$Ten = $row_select_kh['HoTen'];
													?>
													<div class="row">
														<div class="col-2"><b><?php echo $Ten ; ?></b></div>
														<div class="col-10">
															<ul class='list-inline' style="color:yellow; font-size:15px">
																<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
																<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
																<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
																<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
																<li class='list-inline-item'><i class='glyphicon glyphicon-star-empty'></i></li>
															</ul>
															<?php echo $row_comment['noidung']; ?>
														</div>
													</div>
													<?php
												}
											}
											?>  
                                </div>
                            </div>
                        </div>
						
                        <form  method="POST">
                            <div class="comment-form">
                                <div class="comment-from">
                                    <div class="">
										<strong>Nhận xét</strong>
										<div class='star-rating'>
                                  		<ul class='list-inline' style="color:yellow; font-size:15px">
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star-empty'></i></li>
                                  		</ul>
                                		</div>
										<input type="text" class="form-control" placeholder="Nội dung" name="Comment" id="Comment" required>
                                    </div>
                                    <div class="comment-btn" >
										<button name="subcomment" class="btn btn-primary">Gửi</button>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
					<?php 
					
					?>




					<?php 
					include "sanphamlienquan.php"
					?>
	
						<div class="clear"></div>
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
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		<div class="modal-header">
			<h4  >Thông tin khách hàng</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
			<p>Mua ngay giúp bạn mua nhanh nhưng chỉ có thể mua một loại sách trong một lần đặt hàng.</p>
			<form name="form6" id="ff6" method="POST" action="<?php include "luumuangay.php" ?>">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Tên:" name="name" id="name" required>
			</div>
			<div class="form-group">
				<input type="email" class="form-control" placeholder="Email :" name="email" id="email" required>
			</div>
			<div class="form-group">
				<input type="tel" class="form-control" placeholder="Điện thoại :" name="phone" id="phone" required>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Địa chỉ :" name="txtdiachi" id="txtdiachi" required>
			</div>
			<div >
				<input type="date" style="display: none;" class="form-control" placeholder="Ngày đặt  :" name="date" id="datechoose"  required >
			</div>
			<div class="form-group">
				<label> Hình thức thanh toán :<select class="selectpicker" name="hinhthuctt">
					<option value="Trực tuyến">Trực tuyến</option>
					<option value="Khi nhận hàng">Khi nhận hàng</option>
					</optgroup>
				</select>
				</lable>
			</div>
			<input type="hidden" name="makh" value="<?php echo $_SESSION['Makh'] ?>" />
			<input type="hidden" name="idsp" value="<?php echo $row["ID"] ?>" />
			<input type="hidden" name="gia" value="<?php	if($row["KhuyenMai"] == true){                                      
															echo $row["giakhuyenmai"];}
															if($row["KhuyenMai"] == false){
																echo $row["Gia"];} ?>" />
			<button type="submit" name="muangay" class="btn btn-1">Đặt hàng</button>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
		</div>
		</div>

	</div>
</div>
	<!-- IMG-thumb -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">         
          <div class="modal-body">
			
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
	
	<script>
	$(document).ready(function(){
		$(".nav-tabs a").click(function(){
			$(this).tab('show');
		});
		$('.nav-tabs a').on('shown.bs.tab', function(event){
			var x = $(event.target).text();         // active tab
			var y = $(event.relatedTarget).text();  // previous tab
			$(".act span").text(x);
			$(".prev span").text(y);
		});
	});
	</script>
</body>
</html>
<script>
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;
    document.getElementById("datechoose").value = today;
    // document.getElementById("add-to-cart").onclick = function(){
    // 	setTimeut(function(){
    // 		window.location.replace("http://localhost/TTTN/BanSachOnline/cart.php");
    // 	}, 2000);
    // }
</script>

