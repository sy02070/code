<?php
    require '../inc/myconnect.php';
    $maadmin = $_GET['maadmin'];

    // sql to delete a record
    $sql = "DELETE FROM loginadmin WHERE maadmin=".$maadmin;

    if ($conn->query($sql) === TRUE) {
        header('Location: qlyquantri.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

$conn->close();
?>
</script>