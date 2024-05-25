<?php
    require "login.php";
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
                <div class="row d-flex align-items-start">
                    <div class="col-lg-3 col-md-4 col-12 pb-4 left-container">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button onclick="location.href='myaccount.php?myaccount_info'" class="nav-link <?php if(isset($_GET['myaccount_info'])){echo "active";} ?>" id="v-pills-profile-tab" data-bs-toggle="pill">
                                <i class="glyphicon glyphicon-user pe-3"></i>Thông tin cá nhân
                            </button>
                            <button onclick="location.href='myaccount.php?myaccount_edit'" class="nav-link <?php if(isset($_GET['myaccount_edit'])){echo "active";} ?>" name="myaccount_edit" id="v-pills-editprofile-tab" data-bs-toggle="pill">
                                <i class="glyphicon glyphicon-edit pe-3"></i>Chỉnh sửa thông tin cá nhân
                            </button>
                            <button onclick="location.href='myaccount.php?myaccount_pass'" class="nav-link <?php if(isset($_GET['myaccount_pass'])){echo "active";} ?>" id="v-pills-editpw-tab" data-bs-toggle="pill">
                                <i class="fa fa-key pe-3"></i>Đổi mật khẩu
                            </button>
                            <!-- <button onclick="location.href='dangxuat.php'" class="nav-link" id="v-pills-signup-tab" data-bs-toggle="pill">
                                <i class="	glyphicon glyphicon-log-out pe-3"></i>Đăng xuất
                            </button> -->
                          </div>
                    </div>
                    
                    <div class="col-lg-9 col-md-8 col-12 px-4">
                        <div class="tab-content" id="v-pills-tabContent">
                        <?php
                        if(isset($_GET['myaccount_info'])){
                            include("myaccount_info.php");
                        }
                        if(isset($_GET['myaccount_edit'])){
                            include("myaccount_edit.php");
                        }
                        if(isset($_GET['myaccount_pass'])){
                            include("myaccount_pass.php");
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

		</div>
	</div>
	<?php 
	include "footer.php"
	?>
</body>
</html>
