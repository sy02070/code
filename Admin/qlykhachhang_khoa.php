<?php
require '../inc/myconnect.php';
if(isset($_GET['makh'])){
    $makh = $_GET['makh'];
    $get_Trangthai = "select * from loginuser where makh = '$makh'";
    $run_Trangthai = mysqli_query($conn, $get_Trangthai);
    $row_Trangthai = mysqli_fetch_array($run_Trangthai);
    $Trangthai = $row_Trangthai['Trangthai'];

    if($Trangthai == "Active"){
        $update_Trangthai = "update loginuser set Trangthai = 'Locked' where makh = '$makh'";
        $run_update = mysqli_query($conn, $update_Trangthai);
        if($run_update){
            echo "<script>window.open('qlykhachhang.php', '_self')</script>";
        }
    }

    else{
        $update_Trangthai = "update loginuser set Trangthai = 'Active' where makh = '$makh'";
        $run_update = mysqli_query($conn, $update_Trangthai);
        if($run_update){
            echo "<script>window.open('qlykhachhang.php', '_self')</script>";
        }
    }
}
?>