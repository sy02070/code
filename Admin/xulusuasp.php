<?php 
    if(isset($_POST['Edit']))
    {
    require '../inc/myconnect.php';
    move_uploaded_file($_FILES['hinhanh']['tmp_name'] , '../images/'.$_FILES['hinhanh']['name']);
    $id = $_POST['id'];
    $name = $_POST['name'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $manhasx = $_POST['manhasx'];
    $madanhmuc = $_POST['madanhmuc'];
    $ngay = $_POST['ngay'];
    $gia = $_POST['gia'];
    $khuyenmai  = $_POST['khuyenmai'];
    $mota = $_POST['editor1'];
    $anh =  $_POST['anh'];
    $giakhuyenmai = $_POST['giakhuyenmai'];
    $tacgia = $_POST['tacgia'];
    $soluongkho = $_POST['soluongkho'];
    if($hinhanh == null)
    {
        $sql = "UPDATE sanpham SET Ten='$name', HinhAnh='$anh', tacgia='$tacgia', Manhasx= '$manhasx', date='$ngay',Gia='$gia', 
        KhuyenMai='$khuyenmai', Mota='$mota',giakhuyenmai ='$giakhuyenmai',Madm ='$madanhmuc',soluongkho ='$soluongkho'
        WHERE id= '$id ' " ;
        if ($conn->query($sql) === TRUE) {
            header('Location: qlysanpham.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
    else{
        $sql = "UPDATE sanpham SET Ten='$name', HinhAnh='$hinhanh', tacgia='$tacgia', Manhasx= '$manhasx', date='$ngay',Gia='$gia',  
        KhuyenMai='$khuyenmai ', Mota='$mota',giakhuyenmai ='$giakhuyenmai',Madm ='$madanhmuc',soluongkho ='$soluongkho'
        WHERE id= '$id ' " ;
        if ($conn->query($sql) === TRUE) {
            header('Location: qlysanpham.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
        }
    }
  
?>
