<?php
ob_start();
session_start();
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
	<!--///////////////////Account Page///////////////////-->
	<!--//////////////////////////////////////////////////-->
	<?php
$tk = "" ;
$mk = "" ;
$kq = "";
if(isset($_POST['submit']))
{
    require 'inc/myconnect.php';
    $tk = $_POST['txtus'] ;
    $mk = $_POST['txtem'];
    $sql="SELECT * FROM loginuser  where email = '$tk'  and matkhau = '$mk'  ";
    $result = $conn->query($sql);
    // echo  $mk;

    if($result->num_rows > 0){
			while($row = $result->fetch_assoc()) {
			$_SESSION['txtus'] = $tk ;
			$_SESSION['giagiam'] = 0;
			$_SESSION['Makh'] = $row["makh"];
			$_SESSION['HoTen'] = $row["HoTen"];
			$_SESSION['DiaChi'] = $row["DiaChi"];
			$_SESSION['email'] = $row["email"];
			$_SESSION['dienthoai'] = $row["DienThoai"];
				header('Location: index.php');
				$row = $result->fetch_assoc();  
			}  
    }
    else
    {
        $kq ="Thông tin không đúng vui lòng kiềm tra lại";
    }
}
?>
<?php
$name = "" ;
$email = "" ;
$dt= "";
$diachi="";
$mk= "";
$kqdk ="";
$repass ="";

if(isset($_POST['dangky']))
{
    require 'inc/myconnect.php';
    $name  = $_POST['fullname'] ;
    $email = $_POST['email'];
    $dt = $_POST['phone'];
	$diachi = $_POST['diachi'];
    $mk = $_POST['password'];
    $repass = $_POST['repass'];
    if($repass != $mk  )
    {
        $kqdk = "Mật khẩu nhập lại không chính xác";
    }
    else
    {
        $sql="INSERT INTO  loginuser (email,matkhau,hoten,DienThoai,DiaChi,Trangthai) 
        VALUES ('$email','$mk' ,'$name','$dt','$diachi','Active') ";
        // echo  $mk;
        if (mysqli_query($conn, $sql)) {
            $name = "" ;
            $email = "" ;
            $dt= "";
			$diachi="";
            $mk= "";
            $repass ="";
            $kqdk = "Đăng ký thành công";
        } else {
            $kqdk = "Đăng ký không thành công xin hay kiểm tra lại thông tin";
        }
    }

    
    mysqli_close($conn);
}
?>
	<div id="page-content" class="single-page">
		<div class="container">
			<!--div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li><a href="account.php">Account</a></li>
					</ul>
				</div>
			</div-->
			<div class="row">
				<div class="col-md-6">
					<div class="heading"><h2>Đăng nhập</h2></div>
					<form name="form1" id="ff1" method="POST" action="#">
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Email" name="txtus" required value="">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Mật khẫu" name="txtem"required value="">
						</div>
						<button type="submit" name="submit" class="btn btn-1" name="login" id="login">Đăng nhập</button>
						<P style="color:red"><?php echo $kq; ?></p>
						<a href="#"></a>
						<br>
					<i>* Bạn chưa có tài khoản? Vui lòng đăng ký.</i>
					</form>
				</div>
				<div class="col-md-6">
					<div class="heading"><h2> Đăng ký tài khoản</h2></div>
					<form name="form2" id="ff2" method="post" action="#">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Họ Tên" name="fullname" id="firstname" value="<?php echo $name;?>" required >
						</div>
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Email" name="email" id="email"  value="<?php echo $email;?>" required>
						</div>
						<div class="form-group">
						<input type="number" class="form-control" placeholder="Điện thoại" name="phone" id="phone" value="<?php echo $dt;?>" required >
						</div>
						<div class="form-group">
						<input type="diachi" class="form-control" placeholder="Địa chỉ" name="diachi" id="diachi" value="<?php echo $diachi;?>" required >
						</div>
						<div class="form-group">
						<input type="password" class="form-control" placeholder="Mật khẩu" name="password" id="password"  value="<?php echo $mk;?>"required >
						</div>
						<div class="form-group">
						<input type="password" class="form-control" placeholder="Mật khẩu nhập lại" name="repass" id="repass" value="<?php echo $repass;?>" required >
						</div>
						<button type="submit" name="dangky" class="btn btn-1">Đăng ký</button>
						<P style="color:red"><?php echo $kqdk; ?></p>
					</form>
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
