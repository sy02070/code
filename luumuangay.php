
<?php 
require "inc/myconnect.php";
if(isset($_POST['muangay']))
			{
				// echo $item;
                $total="";
                $makh = $_POST['makh']; 
                $email =  $_POST['email']; 
                $ngaydat = $_POST['date'];
                $tenkh = $_POST['name']; 
                $diachi = $_POST['txtdiachi'];
                $dienthoai =  $_POST['phone']; 
                $hinhthucthanhtoan = $_POST['hinhthuctt']; 
                $masp= $_POST['idsp']; 
                $dongia= $_POST['gia']; 
                $sl= 1;
                $thanhtien =  $sl* $dongia;
                $sql1="INSERT INTO hoadon (makhahhang,emailkh,ngaydat,tenkh,diachi,dienthoai,hinhthucthanhtoan,thanhtien,trangthai)
                VALUES ('0','$email','$ngaydat','$tenkh','$diachi','$dienthoai','$hinhthucthanhtoan','$thanhtien','Đang chờ');";
               if ($conn->query($sql1) === TRUE) 
                {
                       $masp= $_POST['idsp']; 
                       $dongia= $_POST['gia']; 
                       $sl= $_POST['txtsoluong'];
                       $thanhtien =  $sl* $dongia;
                      //tao mang hd de lua sodh cua sql1
                       $hd =  mysqli_insert_id($conn);
                       //lua mang
                       $soluongkhomoi = $s["soluongkho"] - $sl;
                       $sql2="INSERT INTO  chitiethoadon (sodh,masp,soluong,dongia,thanhtien) 
                       VALUES ('$hd ','$masp' ,'$sl','$dongia','$thanhtien');";         
                        if ($conn->query($sql2) === TRUE){
                            $sql3="UPDATE sanpham SET soluongkho = '$soluongkhomoi' WHERE ID = '$masp';";
                       }
                        if ($conn->query($sql3) === TRUE) {
                            // destroy the session 
                            header('Location: hoadon.php?hoadon_dangcho');
                        } else {
                            echo "Error: " . $sql3 . "<br>" . $conn->error;
                        }
                }
        }
			?>
