<?php 
require "inc/myconnect.php";
        if(isset($_POST['Dat']))
		{
            if(isset($_SESSION['cart']))
            {

				foreach($_SESSION['cart'] as $key  => $value)
				{
					$item[]=$key;
				}
                $str= implode(",",$item);
			    $query = "SELECT s.ID,s.Ten,s.date,s.Gia,s.HinhAnh,s.KhuyenMai,s.giakhuyenmai,s.Mota,s.soluongkho, n.Ten as Tennhasx,s.Manhasx
				from sanpham s 
				LEFT JOIN nhaxuatban n on n.ID = s.Manhasx
				WHERE  s.ID  in ($str)";
				$result = $conn->query($query);
                $_SESSION['giagiam'] = 0;
                $total= $_POST['total'];
                $totals = $_POST['totals'];
                $makh = $_SESSION['Makh'];
                $email =  $_POST['emailkh'];
                $ngaydat = $_POST['date'];
                $tenkh = $_POST['tenkh'] ;
                $diachi = $_POST['dckh'];
                $dienthoai =  $_POST['dtkh'];
                $hinhthucthanhtoan = $_POST['hinhthuctt']; 
                $sql1="INSERT INTO hoadon (makhachhang,emailkh,ngaydat,tenkh,diachi,dienthoai,hinhthucthanhtoan,thanhtien,trangthai)
                VALUES ('$makh','$email','$ngaydat','$tenkh','$diachi','$dienthoai','$hinhthucthanhtoan','$totals','Đang chờ');";
                if ($conn->query($sql1) == TRUE) 
                {
                    foreach($result as $s)
                    {
                       $masp= $s["ID"];
                       
                       if($s["KhuyenMai"] == true)
                       {    
                       $dongia= $s["giakhuyenmai"];
                       }
                       if($s["KhuyenMai"] == false)
                       {    
                       $dongia= $s["Gia"];
                       }
                      //tao mang hd de lua sodh cua sql1
                       $hoadon[] =  mysqli_insert_id($conn);
                       //lua mang
                       $str= implode(",",$hoadon);
                       $sl= $_SESSION['cart'][$s["ID"]];
                       $thanhtien =  $sl * $dongia;
                       $soluongkhomoi = $s["soluongkho"] - $sl;
                       $sql2="INSERT INTO  chitiethoadon (sodh,masp,soluong,dongia,thanhtien) 
                              VALUES ('$str','$masp' ,'$sl','$dongia','$thanhtien');";
                       if ($conn->query($sql2) == TRUE){
                            $sql3="UPDATE sanpham SET soluongkho = '$soluongkhomoi' WHERE ID = '$masp';";
                       }
                       
                        if ($conn->query($sql3) == TRUE) {
                            header('Location: hoadon.php?hoadon_dangcho');
                            // destroy the session 
                            //session_destroy(); 

                            
                        } else {
                            echo "Error: " . $sql3 . "<br>" . $conn->error;
                        }
                    }
                }
            }
            //xóa giỏ hàng
            $cart=$_SESSION['cart'];
            unset($_SESSION['cart']);
        }
?>
