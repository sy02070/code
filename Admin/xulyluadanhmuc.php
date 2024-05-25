<?php
if(isset($_POST['create']))
{
    require '../inc/myconnect.php';
    $Tendanhmuc = $_POST['tendm'];
    $Madmcha = $_POST['Madmcha'];
    $sql="INSERT INTO  danhmuc  (Tendanhmuc,Madmcha) 
    VALUES ('$Tendanhmuc','$Madmcha')";
    if (mysqli_query($conn, $sql)) {
        header('Location: quanlydv.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
 ?>