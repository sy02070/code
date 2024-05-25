<?php 
    if(isset($_POST['Edit']))
    {
        require '../inc/myconnect.php';
        $Madanhmuc = $_POST['madm'];
        $Tendanhmuc = $_POST['tendm'];
        $Madmcha = $_POST['madmcha'];
        $sql = "UPDATE danhmuc SET Tendanhmuc='$Tendanhmuc',Madmcha ='$Madmcha'
        WHERE Madanhmuc= '$Madanhmuc' " ;
        if ($conn->query($sql) === TRUE) {
            header('Location: quanlydv.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
  
?>
