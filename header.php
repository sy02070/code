<?php
if (!function_exists('currency_format')) {
  function currency_format($number, $suffix = '₫') {
      if (!empty($number)) {
          return number_format($number, 0, ',', '.') . "{$suffix}";
      }
  }
}

if(isset($_SESSION['Makh'])){
  require 'inc/myconnect.php';
  $Makh = $_SESSION['Makh'];
  $get_Trangthai = "select * from loginuser where Makh = '$Makh'";
  $run_Trangthai = mysqli_query($conn, $get_Trangthai);
  $row_Trangthai = mysqli_fetch_array($run_Trangthai);
  $Trangthai = $row_Trangthai['Trangthai'];
  if($Trangthai == "Locked"){
      echo "<script>alert('Tài khoản đã bị khóa do vi phạm chính sách của cửa hàng')</script>";
      echo "<script>window.open('dangxuat.php', '_self')</script>";
  }
}
?>
	<header class="container">
		<div class="row">
			<div class="col-md-4" style="margin-top: -50px;">
				<div id="logo"><a href="index.php" ><img src="images/logo.png" style="width:200px;height:80px"/></a></div>
			</div>
			<div class="col-md-4" style="margin-top: -30px;">
				<form class="form-search" method="GET" action="timkiem.php">
					<?php
					if(isset($_GET['txttimkiem']))
					{
					   ?>
					   <input type="text"  class="input-medium search-query" name="txttimkiem" required value="<?php echo $_GET["txttimkiem"] ?> "> 
					   <?php
					}
					else{
						?>
						<input type="text"  class="input-medium search-query" name="txttimkiem" required placeholder="Bạn muốn tìm gì?">  
						<?php
					}
					?>
					<button type="submit" name="tk" class="btn"><span class="glyphicon glyphicon-search"></span></button>  
				</form>
			</div>
			<div class="col-md-4" style="margin-top: -30px;">
				<div id="cart">
        <button class="btn btn-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Yêu thích"><i class='glyphicon glyphicon-heart'></i></button>
				<a class="btn btn-1" href="hoadon.php?hoadon_dangcho" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lịch sử đơn hàng"><span class="glyphicon glyphicon-list-alt" ></span>  </a>
				<a class="btn btn-1" href="cart.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Giỏ hàng"><span class="glyphicon glyphicon-shopping-cart">
        <span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-black'>
        (<?php
			$ok=1;
			 if(isset($_SESSION['cart']))
			 {
				 foreach($_SESSION['cart'] as $key => $value)
				 {
					 if(isset($key))
					 {
						$ok=2;
					 }
				 }
			 }
			
			 if($ok == 2)
			 {
				echo count($_SESSION['cart']);
			 }
			else
			{
				echo   "0";
			}
			
			
			?>)
        </span></span>  
      </a>
      </div>
				
			</div>
		</div>
		
		<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header">
        <h5 class="text-danger fw-bold" id="offcanvasRightLabel">Sản phẩm yêu thích</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
      <?php 
      require 'inc/myconnect.php';
      if(isset($_SESSION['Makh'])){
        $Makh = $_SESSION['Makh'];
        $get_favorite_products = "select * from yeuthich where makhachhang = '$Makh'";
        $run_get_favorite = mysqli_query($conn, $get_favorite_products);
        $count_favorite = mysqli_num_rows($run_get_favorite);
        if($count_favorite==0){
      ?>
          <div class="row justify-content-center">
            <div class="col-12">
                <div class="text-center">
                    <i class="bi bi-bag-x-fill text-danger" style="font-size: 80px"></i>
                </div>
                <p class="text-center">Không có sản phẩm yêu thích</p>
            </div>
        </div>
      <?php
        }
        else{
          while($row_favorite = mysqli_fetch_array($run_get_favorite)){
            $Masp = $row_favorite['masanpham'];
            $select_product = "select * from sanpham where ID = '$Masp'";
            $run_select_product = mysqli_query($conn, $select_product);
            $row_select_product = mysqli_fetch_array($run_select_product);
            $Ten = $row_select_product['Ten'];
            $Anh = $row_select_product['HinhAnh'];
            $Giakhuyenmai = $row_select_product['giakhuyenmai'];
            $Gia = $row_select_product['Gia'];
      ?>
          <div class="row mb-2">
            <div class="col-3">
            <a href="product.php?id=<?php echo $row_select_product["ID"]?>" target="_blank"><img src="images/<?= $Anh;?>" class="img-fluid" style="object-fit: contain !importaint;" alt=""></a>
            </div>
            <div class="col-7">
              <a href="product.php?id=<?php echo $row_select_product["ID"]?>" target="_blank" class="fw-bold text-decoration-none">
                <?php echo $Ten; ?>
              </a>
              <?php
                if($row_select_product["KhuyenMai"] == true)
								{                                      
								?>
									<div class="price"><?= currency_format($Giakhuyenmai) ?><!--span><?= currency_format($Gia) ?></span--></div>
                  
								<?php 
								}
								?>
								<?php
                 if($row_select_product["KhuyenMai"] == false)
								 {
								?>
									<div class="price" style="color: red;"><?= currency_format($Gia) ?></div>
								<?php 
								}
								?>
            </div>
            <div class="col-2">
              <form action="" method="post">
                <input type="hidden" name="Makh" value="<?= $Makh; ?>">
                <input type="hidden" name="Masp" value="<?= $Masp; ?>">
                <button onclick="delete_favorite(<?= $Masp; ?>, <?= $Makh; ?>)" id="delete_favorite<?=$Masp;?><?=$Makh;?>" class="btn btn-white text-danger" style="border: none; padding: 0"><i class="fa fa-times me-1"></i>Xóa</button>
              </form>
            </div>
          </div>
      <?php
          }
        }
      }
      else{
      ?>
          <div class="row text-center justify-content-center">
            <p>Bạn cần đăng nhập để xem</p>
            <div class="col-4">
              <a href="account.php" class="btn btn-primary text-white">Đăng nhập</a>
            </div>
          </div>
      <?php
        }
      ?>
      </div>
    </div>
    	
	</header>
	

<!-- offcanvas for like -->
 

    <script>
      function delete_favorite(id1,id2){
          var result = confirm("Bạn chắc chắn muốn xóa khỏi Yêu thích? ");
          if(result==true){
            document.getElementById("delete_favorite"+id1+id2).name = 'delete_favorite';
          }
      }
      
  </script>

    <?php
      if(isset($_POST['like_product'])){
        if(isset($_SESSION['Makh'])){
          $Makh = $_SESSION['Makh'];
          $Masp = $_POST['idsp'];
          
          $path = $_SERVER['SCRIPT_NAME'];
          $queryString = $_SERVER['QUERY_STRING'];
          $check_favorte = "select * from yeuthich where makhachhang = '$Makh' and masanpham = '$Masp'";
          $run_check_favorite = mysqli_query($conn, $check_favorte);
          $count_check_favorite = mysqli_num_rows($run_check_favorite);
          if($count_check_favorite==0){
            $insert_favorite_product = "insert into yeuthich (makhachhang, masanpham) values ('$Makh', '$Masp')";
            $run_favorite_product = mysqli_query($conn, $insert_favorite_product);
            if($run_favorite_product){
              echo "<script>alert('Đã thêm vào Yêu thích')</script>";
              echo "<script>window.open('$path?$queryString','_self')</script>";
            }
          }
          else{
            $delete_favorite_product = "delete from yeuthich where makhachhang = '$Makh' and masanpham = '$Masp'";
            $run_delete_favorite_product = mysqli_query($conn, $delete_favorite_product);
            if($run_delete_favorite_product){
              echo "<script>alert('Đã xóa khỏi Yêu thích')</script>";
              echo "<script>window.open('$path?$queryString','_self')</script>";
            }
          }
        }
        else{
          echo "<script>alert('Bạn cần đăng nhập để thực hiện chức năng này')</script>";
        }
      }

      if(isset($_POST['delete_favorite'])){
        $Makh = $_POST['Makh'];
        $Masp = $_POST['Masp'];
        $path = $_SERVER['SCRIPT_NAME'];
        $queryString = $_SERVER['QUERY_STRING'];
        $delete_favorite_product = "delete from yeuthich where makhachhang = '$Makh' and masanpham = '$Masp'";
        $run_delete_favorite = mysqli_query($conn, $delete_favorite_product);
        if($run_delete_favorite){
          echo "<script>alert('Đã xóa khỏi Yêu thích')</script>";
          echo "<script>window.open('$path?$queryString','_self')</script>";
        }
      }


      
    ?>
