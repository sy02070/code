<?php
    require '../inc/myconnect.php';
    $Madanhmuc = $_GET['Madanhmuc'];

    // sql to delete a record
    $sql = "DELETE FROM danhmuc WHERE Madanhmuc=".$Madanhmuc;

    if ($conn->query($sql) === TRUE) {
        header('Location: quanlydv.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

$conn->close();
?>
</script>