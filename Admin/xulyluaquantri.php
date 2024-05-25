<?php
if(isset($_POST['create']))
{
    require '../inc/myconnect.php';
    $Tendangnhap = $_POST['tendn'];
    $Matkhau = $_POST['mk'];
    $Hoten = $_POST['hoten'];
    $Dienthoai = $_POST['dt'];
    $Chucvu = $_POST['cv'];
    $sql="INSERT INTO  loginadmin  (tendangnhap,matkhau,hoten,dienthoai,chucvu) 
    VALUES ('$Tendangnhap','$Matkhau','$Hoten','$Dienthoai','$Chucvu')";
    if (mysqli_query($conn, $sql)) {
        header('Location: qlyquantri.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
 ?>