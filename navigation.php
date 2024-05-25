
    <nav id="navigation" style="margin-top: -50px;">
        <ul class="container">
            <li><a href="index.php" >Trang chủ</a></li>
            <li><a href="gioithieu.php" >Giới thiệu</a></li>
            <li><a href="#" >Danh mục</a>
                <!-- /*menu con sổ xuống cấp 1 -->
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'ban_sach');
                $sql = 'SELECT * FROM danhmuc';
                $result = mysqli_query($conn, $sql);
                $danhmuc = array();
                while ($row = mysqli_fetch_assoc($result)){
                    $danhmuc[] = $row;
                }
                // BƯỚC 2: HÀM ĐỆ QUY HIỂN THỊ danhmuc
                function showdanhmuc($danhmuc, $Madmcha = 0,)
                {
                    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
                    $cate_child = array();
                    foreach ($danhmuc as $key => $item)
                    {
                        // Nếu là chuyên mục con thì hiển thị
                        if ($item['Madmcha'] == $Madmcha)
                        {
                            $cate_child[] = $item;
                            unset($danhmuc[$key]);
                        }
                    }
                    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
                    if ($cate_child)
                    {
                        echo '<ul>';
                        foreach ($cate_child as $key => $item)
                        {
                            // Hiển thị tiêu đề chuyên mục
                            ?>
                            <li><a href="category2.php?madm=<?php echo $item["Madanhmuc"]?>"><?php echo $item["Tendanhmuc"]?></a>
                            <?php
                            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp 
                            showdanhmuc($danhmuc, $item['Madanhmuc']);
                            echo '</li>';
                        }
                        echo '</ul>';
                    }
                }
                showdanhmuc($danhmuc)
                ?>
            </li>
            <li><a href="#" >Hỗ trợ khách hàng</a>
                <ul>
                    <li><a href="huongdandathang.php" >Hướng dẫn đặt hàng</a></li>
                    <li><a href="huongdanthanhtoan.php" >Hướng dẫn thanh toán</a></li>
                </ul>
            </li>
            <li><a href="contact.php" >Liên hệ</a></li>
        </ul>
    </nav>
