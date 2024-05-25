<?

//============================2 kiểu kết nối
require '../inc/myconnect.php';
$sql="SELECT * ...  ";
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
    }   
}

require '../inc/myconnect.php';
$select__ = "SELECT * ... ";
$run__ = mysqli_query($conn, $select__);
$count__ = mysqli_num_rows($run__);
if ($count__ > 0) {
    while($row__ = mysqli_fetch_array($run__)){

    }
}


//============================chuyen ngay thanh kieu ngay thang nam
$date=date_create($row["ngaydat"]); echo date_format($date,"d/m/Y");

//============================tải lại trang
$path = $_SERVER['SCRIPT_NAME'];
$queryString = $_SERVER['QUERY_STRING'];
echo "<script>window.open('$path?$queryString','_self')</script>";
echo "<script>alert('Bạn cần đăng nhập để thực hiện')</script>";

//===========================định dạng tiền VN
if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = '₫') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}



?>