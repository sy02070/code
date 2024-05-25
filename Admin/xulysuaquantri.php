<?php 
    if(isset($_POST['Edit']))
    {
        require '../inc/myconnect.php';
        $Tendangnhap = $_POST['tendn'];
        $Hoten = $_POST['hoten'];
        $Dienthoai = $_POST['dt'];
        $sql = "UPDATE loginadmin SET tendangnhap='$Tendangnhap',hoten ='$Hoten',dienthoai='$Dienthoai'
        WHERE maadmin= '$maadmin' " ;
        if ($conn->query($sql) === TRUE) {
            header('Location: index.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
  
?>
