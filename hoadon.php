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
            <div class="col-lg-12">
                <?php
                    if(isset($_SESSION['Makh'])){
                        $Makh = $_SESSION['Makh'];
                        $select_hoadon_dangcho = "select * from hoadon where makhachhang = '$Makh' and (trangthai='Đang chờ' or trangthai LIKE 'Không được xác nhận%')";
                        $run_hoadon_dangcho = mysqli_query($conn, $select_hoadon_dangcho);
                        $count_hoadon_dangcho = mysqli_num_rows($run_hoadon_dangcho);

                        $select_hoadon_danggiao = "select * from hoadon where makhachhang = '$Makh' and trangthai='Đang giao'";
                        $run_hoadon_danggiao = mysqli_query($conn, $select_hoadon_danggiao);
                        $count_hoadon_danggiao = mysqli_num_rows($run_hoadon_danggiao);

                        $select_hoadon_dagiao = "select * from hoadon where makhachhang = '$Makh' and trangthai='Đã giao'";
                        $run_hoadon_dagiao = mysqli_query($conn, $select_hoadon_dagiao);
                        $count_hoadon_dagiao = mysqli_num_rows($run_hoadon_dagiao);

                        $select_hoadon_dahuy = "select * from hoadon where makhachhang = '$Makh' and trangthai='Đã hủy'";
                        $run_hoadon_dahuy = mysqli_query($conn, $select_hoadon_dahuy);
                        $count_hoadon_dahuy = mysqli_num_rows($run_hoadon_dahuy);
                    }
                ?>

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button onclick="location.href='hoadon.php?hoadon_dangcho'" class="nav-link position-relative <?php if(isset($_GET['hoadon_dangcho'])){echo "active";} ?> px-5 me-3" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-selected="true">Chờ xác nhận
                        <?php
                            if($count_hoadon_dangcho!=0){
                                echo "
                                <span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>
                                    $count_hoadon_dangcho
                                </span>
                                ";
                            }
                        ?>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button onclick="location.href='hoadon.php?hoadon_danggiao'" class="nav-link position-relative <?php if(isset($_GET['hoadon_danggiao'])){echo "active";} ?> px-5 mx-3" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-selected="false">Đang giao
                        <?php
                            if($count_hoadon_danggiao!=0){
                                echo "
                                <span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>
                                    $count_hoadon_danggiao
                                </span>
                                ";
                            }
                        ?>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button onclick="location.href='hoadon.php?hoadon_dagiao'" class="nav-link position-relative <?php if(isset($_GET['hoadon_dagiao'])){echo "active";} ?> px-5 mx-3" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-selected="false">Đã giao
                        <?php
                            if($count_hoadon_dagiao!=0){
                                echo "
                                <span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>
                                    $count_hoadon_dagiao
                                </span>
                                ";
                            }
                        ?>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button onclick="location.href='hoadon.php?hoadon_dahuy'" class="nav-link position-relative <?php if(isset($_GET['hoadon_dahuy'])){echo "active";} ?> px-5 mx-3" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-selected="false">Đã hủy
                        <?php
                            if($count_hoadon_dahuy!=0){
                                echo "
                                <span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>
                                    $count_hoadon_dahuy
                                </span>
                                ";
                            }
                        ?>
                        </button>
                    </li>
                </ul><br>

                <?php
                    
                    if(isset($_GET['hoadon_dangcho'])){
                        if($count_hoadon_dangcho == 0){
                            include("hoadon_trong.php");
                        }
                        else{
                            include("hoadon_dangcho.php");
                        }
                       
                    }
                    if(isset($_GET['hoadon_danggiao'])){
                        if($count_hoadon_danggiao == 0){
                            include("hoadon_trong.php");
                        }
                        else{
                            include("hoadon_danggiao.php");
                        }
                       
                    }
                    if(isset($_GET['hoadon_dagiao'])){
                        if($count_hoadon_dagiao == 0){
                            include("hoadon_trong.php");
                        }
                        else{
                            include("hoadon_dagiao.php");
                        }
                       
                    }
                    if(isset($_GET['hoadon_dahuy'])){
                        if($count_hoadon_dahuy == 0){
                            include("hoadon_trong.php");
                        }
                        else{
                            include("hoadon_dahuy.php");
                        }
                       
                    }

                ?>
            </div>                    
        </div>
		</div>
	</div>
	<?php 
	include "footer.php"
	?>
</body>
</html>
