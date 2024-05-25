-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 14, 2024 lúc 06:06 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ban_sach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `id_chi_tiet_hoadon` bigint(10) NOT NULL,
  `sodh` bigint(20) NOT NULL,
  `masp` bigint(10) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `thanhtien` decimal(9,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`id_chi_tiet_hoadon`, `sodh`, `masp`, `soluong`, `dongia`, `thanhtien`) VALUES
(205, 183, 212, 1, 50000, 50000),
(206, 183, 220, 1, 120000, 120000),
(207, 183, 223, 2, 75000, 150000),
(218, 192, 221, 2, 120000, 240000),
(219, 193, 223, 1, 75000, 75000),
(220, 194, 225, 1, 120000, 120000),
(221, 195, 223, 1, 75000, 75000),
(222, 196, 224, 1, 175000, 175000),
(223, 197, 224, 1, 175000, 175000),
(224, 198, 221, 1, 120000, 120000),
(225, 198, 223, 1, 75000, 75000),
(226, 199, 224, 1, 175000, 175000),
(227, 200, 224, 2, 175000, 350000),
(238, 208, 212, 10, 50000, 500000),
(239, 209, 216, 1, 110000, 110000),
(240, 209, 221, 1, 120000, 120000),
(241, 209, 223, 1, 75000, 75000),
(242, 210, 223, 1, 75000, 75000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `macomment` bigint(10) NOT NULL,
  `noidung` varchar(500) NOT NULL,
  `diemdanhgia` double NOT NULL,
  `masanpham` bigint(10) NOT NULL,
  `makhachhang` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`macomment`, `noidung`, `diemdanhgia`, `masanpham`, `makhachhang`) VALUES
(1, 'cũng hay', 4, 223, 2),
(4, 'ổn', 4, 222, 2),
(5, 'tạm ổn', 4, 224, 2),
(15, 'ổn', 4, 223, 2),
(16, 'tạm', 4, 223, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `Madanhmuc` bigint(10) NOT NULL,
  `Tendanhmuc` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Madmcha` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`Madanhmuc`, `Tendanhmuc`, `Madmcha`) VALUES
(1, 'Văn học', 0),
(2, 'Kinh tế', 0),
(3, 'Tâm lý - Kỹ năng sống', 0),
(4, 'Tiểu sử - Hồi ký', 0),
(5, 'Sách giáo khoa - Tham khảo', 0),
(16, 'Tiểu thuyết', 1),
(17, 'Truyện ngắn', 1),
(18, 'Light novel', 1),
(19, 'Ngôn tình', 1),
(20, 'Nhân vật - Bài học', 2),
(21, 'Quản trị lãnh đạo', 2),
(22, 'Marketing - Bán hàng', 2),
(23, 'Phân tích kinh tế', 2),
(24, 'Kỹ năng sống', 3),
(25, 'Rèn luyện nhân cách', 3),
(26, 'Tâm lý', 3),
(27, 'Tuổi mới lớn', 3),
(28, 'Câu chuyện cuộc đời', 4),
(29, 'Chính trị', 4),
(30, 'Nghệ thuật', 4),
(31, 'Giải trí', 4),
(32, 'Sách giáo khoa', 5),
(33, 'Sách tham khảo', 5),
(34, 'Luyện thi THPT', 5),
(35, 'Mẫu giáo', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `magiohang` bigint(10) NOT NULL,
  `makhachhang` bigint(10) NOT NULL,
  `masanpham` bigint(10) NOT NULL,
  `soluong` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `sodh` bigint(20) NOT NULL,
  `makhachhang` bigint(10) NOT NULL,
  `emailkh` varchar(50) NOT NULL,
  `ngaydat` date NOT NULL,
  `tenkh` varchar(100) NOT NULL,
  `diachi` varchar(250) NOT NULL,
  `dienthoai` varchar(50) NOT NULL,
  `hinhthucthanhtoan` varchar(100) NOT NULL,
  `thanhtien` decimal(9,0) NOT NULL,
  `trangthai` varchar(100) NOT NULL,
  `ngaynhan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`sodh`, `makhachhang`, `emailkh`, `ngaydat`, `tenkh`, `diachi`, `dienthoai`, `hinhthucthanhtoan`, `thanhtien`, `trangthai`, `ngaynhan`) VALUES
(183, 2, 'sy@gmail.com', '2024-03-25', 'Sy', 'Hà Nội', '1234567890', 'Trực tuyến', 320000, 'Đang giao', '0000-00-00'),
(192, 2, 'sy@gmail.com', '2024-04-10', 'Sy', 'Hà Nội', '1234567890', 'Trực tuyến', 240000, 'Không được xác nhận (Thông tin khách hàng không phù hợp)', '0000-00-00'),
(193, 2, 'sy@gmail.com', '2024-04-10', 'Sy', 'Hà Nội', '1234567890', 'Trực tuyến', 75000, 'Đang chờ', '0000-00-00'),
(194, 2, 'sy@gmail.com', '2024-04-10', 'Sy', 'Hà Nội', '1234567890', 'Trực tuyến', 120000, 'Đang giao', '0000-00-00'),
(195, 2, 'sy@gmail.com', '2024-04-10', 'Sy', 'Hà Nội', '1234567890', 'Trực tuyến', 75000, 'Đã giao', '2024-04-25'),
(196, 2, 'sy@gmail.com', '2024-04-10', 'Sy', 'Hà Nội', '1234567890', 'Trực tuyến', 175000, 'Đã giao', '2024-04-14'),
(197, 2, 'sy@gmail.com', '2024-04-10', 'Sy', 'Hà Nội', '1234567890', 'Trực tuyến', 175000, 'Đã giao', '2024-04-18'),
(198, 2, 'sy@gmail.com', '2024-04-10', 'Sy', 'Hà Nội', '1234567890', 'Trực tuyến', 195000, 'Đã hủy', '0000-00-00'),
(199, 2, 'sy@gmail.com', '2024-04-11', 'Sy', 'Hà Nội', '1234567890', 'Trực tuyến', 175000, 'Đã giao', '2024-04-21'),
(200, 2, 'sy@gmail.com', '2024-04-11', 'Sy', 'Hà Nội', '1234567890', 'Trực tuyến', 350000, 'Đã giao', '2024-04-24'),
(208, 2, 'sy@gmail.com', '2024-05-06', 'Sy', 'Hà Nội', '1234567890', 'Trực tuyến', 490000, 'Đang chờ', ''),
(209, 2, 'sy@gmail.com', '2024-05-09', 'Sy', 'Hà Nội', '1234567890', 'Khi nhận hàng', 305000, 'Đang chờ', ''),
(210, 2, 'sy@gmail.com', '2024-05-13', 'Sy', 'Hà Nội', '1234567890', 'Trực tuyến', 95000, 'Đang chờ', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loginadmin`
--

CREATE TABLE `loginadmin` (
  `maadmin` bigint(10) NOT NULL,
  `tendangnhap` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `dienthoai` varchar(15) NOT NULL,
  `chucvu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loginadmin`
--

INSERT INTO `loginadmin` (`maadmin`, `tendangnhap`, `matkhau`, `hoten`, `dienthoai`, `chucvu`) VALUES
(1, 'admin', 'admin', 'Admin', '0123456789', 'Quản lý'),
(2, 'nhanvien1', 'nhanvien', 'Nhanvien1', '0987654321', 'Nhân viên'),
(3, 'nhanvien2', 'nhanvien', 'Nhanvien2', '0121212121', 'Nhân viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loginuser`
--

CREATE TABLE `loginuser` (
  `makh` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `matkhau` int(200) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `DienThoai` varchar(50) NOT NULL,
  `Trangthai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loginuser`
--

INSERT INTO `loginuser` (`makh`, `email`, `matkhau`, `DiaChi`, `HoTen`, `DienThoai`, `Trangthai`) VALUES
(1, 'abc@gmail.com', 0, 'Hà Nội', 'abc', '0987654321', 'Active'),
(2, 'sy@gmail.com', 123, 'Hà Nội', 'Sy', '1234567890', 'Active'),
(3, 'sy1@gmail.com', 123, 'Hà Nội', 'Sy', '0123456789', 'Locked');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaxuatban`
--

CREATE TABLE `nhaxuatban` (
  `ID` bigint(10) NOT NULL,
  `Ten` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhaxuatban`
--

INSERT INTO `nhaxuatban` (`ID`, `Ten`) VALUES
(15, 'NXB Trẻ'),
(16, 'NXB Hà Nội'),
(17, 'NXB Thế Giới'),
(18, 'NXB Hội Nhà Văn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ID` bigint(10) NOT NULL,
  `Ten` varchar(200) NOT NULL,
  `Gia` double NOT NULL,
  `HinhAnh` varchar(200) NOT NULL,
  `Manhasx` bigint(10) NOT NULL,
  `Madm` bigint(10) NOT NULL,
  `Mota` text NOT NULL,
  `date` date NOT NULL,
  `KhuyenMai` tinyint(1) NOT NULL,
  `giakhuyenmai` double NOT NULL,
  `tacgia` varchar(256) NOT NULL,
  `soluongkho` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID`, `Ten`, `Gia`, `HinhAnh`, `Manhasx`, `Madm`, `Mota`, `date`, `KhuyenMai`, `giakhuyenmai`, `tacgia`, `soluongkho`) VALUES
(212, 'Bản Án Chế Độ Thực Dân Pháp', 50000, 'DSHCM.jpg', 15, 16, 'Ngày xuất bản: 15/01/2024<br>\r\nKích thước: 13.0 x 20.5 cm<br>\r\nSố trang: 168 trang<br>\r\nTrọng lượng: 320 gram<br><br>\r\n<b>Tóm tắt</b><br>\r\n&ldquo;Bản &aacute;n chế độ thực d&acirc;n Ph&aacute;p&rdquo; (Le Proc&egrave;s de la Colonisation Fran&ccedil;aise) l&agrave; t&aacute;c phẩm của Hồ Chủ tịch viết bằng tiếng Ph&aacute;p trong khoảng những năm 1921-1925, đăng tải lần đầu ti&ecirc;n năm 1925 tại Paris (thủ đ&ocirc; nước Ph&aacute;p) tr&ecirc;n b&aacute;o Impr&eacute;kor của Quốc tế Cộng sản. T&aacute;c phẩm gồm 12 chương v&agrave; phần phụ lục, với c&aacute;ch h&agrave;nh văn ngắn gọn, s&uacute;c t&iacute;ch, c&ugrave;ng với những sự kiện đầy sức thuyết phục, t&aacute;c phẩm tố c&aacute;o thực d&acirc;n Ph&aacute;p d&ugrave;ng mọi thủ đoạn khốc liệt bắt &ldquo;d&acirc;n bản xứ&rdquo; phải đ&oacute;ng &ldquo;thuế m&aacute;u&rdquo; cho ch&iacute;nh quốc... để &ldquo;phơi th&acirc;y tr&ecirc;n chiến trường ch&acirc;u &Acirc;u&rdquo;; đ&agrave;y đọa phụ nữ, trẻ em &ldquo;thuộc địa&rdquo;; c&aacute;c thống sứ, quan lại thực d&acirc;n độc &aacute;c như một bầy th&uacute; dữ, v.v... T&aacute;c phẩm đ&atilde; g&acirc;y được tiếng vang lớn ngay từ khi ra đời, thức tỉnh lương tri của những con người y&ecirc;u tự do, b&igrave;nh đẳng, b&aacute;c &aacute;i, hướng c&aacute;c d&acirc;n tộc bị &aacute;p bức đi theo con đường C&aacute;ch mạng th&aacute;ng Mười Nga v&agrave; chủ nghĩa M&aacute;c &ndash; L&ecirc;nin, thắp l&ecirc;n ngọn lửa đấu tranh cho độc lập, tự do v&agrave; chủ nghĩa x&atilde; hội của d&acirc;n tộc Việt Nam. Nh&acirc;n hưởng ứng cuộc vận động học tập v&agrave; l&agrave;m theo tấm gương đạo đức Hồ Ch&iacute; Minh, Nh&agrave; xuất bản Trẻ in t&aacute;c phẩm &ldquo;Bản &aacute;n chế độ thực d&acirc;n Ph&aacute;p&rdquo; &ndash; một trong những đỉnh cao của văn chương ch&iacute;nh luận c&aacute;ch mạng.\r\n', '2021-06-26', 0, 0, 'Hồ Chí Minh', 40),
(213, 'Và Rồi Chẳng Còn Ai', 110000, 'VRCCA.jpg', 15, 16, 'Ngày xuất bản: 15/01/2024<br>\r\nKích thước: 13.0 x 20.5 cm<br>\r\nSố trang: 168 trang<br>\r\nTrọng lượng: 320 gram<br><br>\r\n<b>Tóm tắt</b><br>\r\n&ldquo;Mười&hellip;&rdquo; Mười người bị lừa ra một h&ograve;n đảo nằm trơ trọi giữa biển khơi thuộc vịnh Devon, tất cả được bố tr&iacute; cho ở trong một căn nh&agrave;. T&aacute;c giả của tr&ograve; bịp n&agrave;y l&agrave; một nh&acirc;n vật b&iacute; hiểm c&oacute; t&ecirc;n &ldquo;U.N.Owen&rdquo;. &ldquo;Ch&iacute;n&hellip;&rdquo; Trong bữa ăn tối, một th&ocirc;ng điệp được thu &acirc;m sẵn vang l&ecirc;n lần lượt buộc tội từng người đ&atilde; g&acirc;y ra những tội &aacute;c b&iacute; mật. V&agrave;o cuối buổi tối h&ocirc;m đ&oacute;, một vị kh&aacute;ch đ&atilde; thiệt mạng. &ldquo;T&aacute;m&hellip;&rdquo; Bị kẹt lại giữa mu&ocirc;n tr&ugrave;ng khơi v&igrave; gi&ocirc;ng b&atilde;o c&ugrave;ng nỗi &aacute;m ảnh về một b&agrave;i v&egrave; đếm ngược, từng người, từng người một&hellip; những vị kh&aacute;ch tr&ecirc;n đảo bắt đầu bỏ mạng. &ldquo;Bảy&hellip;&rdquo; Ai trong số mười người tr&ecirc;n đảo l&agrave; kẻ giết người, v&agrave; liệu ai trong số họ c&oacute; thể sống s&oacute;t? &ldquo;Một trong những t&aacute;c phẩm g&acirc;y t&ograve; m&ograve; hay nhất, xuất sắc nhất của Christie.&rdquo; &ndash; Tạp ch&iacute; Observer &ldquo;Kiệt t&aacute;c của Agatha Christie.&rdquo; &ndash; Tạp ch&iacute; Spectator\r\n', '2021-06-26', 1, 94000, 'Agatha Christie', 50),
(214, 'Muôn Kiếp Nhân Sinh Tập 2', 130000, 'MKNS.jpg', 15, 17, 'Ngày xuất bản: 15/01/2024<br>\r\nKích thước: 13.0 x 20.5 cm<br>\r\nSố trang: 168 trang<br>\r\nTrọng lượng: 320 gram<br><br>\r\n<b>Tóm tắt</b><br>\r\nT&aacute;c phẩm Mu&ocirc;n Kiếp Nh&acirc;n Sinh tập 1 của t&aacute;c giả Nguy&ecirc;n Phong xuất bản giữa t&acirc;m điểm của đại dịch đ&atilde; thực sự tạo n&ecirc;n một hiện tượng xuất bản hiếm c&oacute; ở Việt Nam. Cuốn s&aacute;ch đ&atilde; khơi dậy những trực cảm tiềm ẩn của con người, l&agrave;m thay đổi g&oacute;c nh&igrave;n cuộc sống v&agrave; thức tỉnh nhận thức của ch&uacute;ng ta giữa một thế giới đang ng&agrave;y c&agrave;ng bất ổn v&agrave; đầy biến động. Ngo&agrave;i việc ph&aacute;t h&agrave;nh hơn 200.000 bản trong 6 th&aacute;ng, chưa kể lượng ph&aacute;t h&agrave;nh Ebook v&agrave; Audio Book qua Voiz-FM, First News c&ograve;n nhận được h&agrave;ng ng&agrave;n tin nhắn, e-mail chuyển lời cảm ơn đến t&aacute;c giả Nguy&ecirc;n Phong. Điều n&agrave;y chứng tỏ sức lan tỏa của cuốn s&aacute;ch đ&atilde; tạo n&ecirc;n một hiện tượng trong văn h&oacute;a đọc của năm 2020.\r\n', '2021-06-26', 1, 110000, 'Nguyên Phong', 50),
(216, 'Hiểu Về Trái Tim (Tái Bản 2019) ', 138000, 'image_195509_1_14922.jpg', 16, 17, 'Ngày xuất bản: 15/01/2024<br>\r\nKích thước: 13.0 x 20.5 cm<br>\r\nSố trang: 168 trang<br>\r\nTrọng lượng: 320 gram<br><br>\r\n<b>Tóm tắt</b><br>\r\nHIỂU VỀ TRÁI TIM – CUỐN SÁCH MỞ CỬA THẾ GIỚI CẢM XÚC CỦA MỖI NGƯỜI  \r\n\r\n“Hiểu về trái tim” là một cuốn sách đặc biệt được viết bởi thiền sư Minh Niệm. Với phong thái và lối hành văn gần gũi với những sinh hoạt của người Việt, thầy Minh Niệm đã thật sự thổi hồn Việt vào cuốn sách nhỏ này.\r\n\r\nXuất bản lần đầu tiên vào năm 2011, Hiểu Về Trái Tim trình làng cũng lúc với kỷ lục: cuốn sách có số lượng in lần đầu lớn nhất: 100.000 bản. Trung tâm sách kỷ lục Việt Nam công nhận kỳ tích ấy nhưng đến nay, con số phát hành của Hiểu về trái tim vẫn chưa có dấu hiệu chậm lại.\r\n\r\nLà tác phẩm đầu tay của nhà sư Minh Niệm, người sáng lập dòng thiền hiểu biết (Understanding Meditation), kết hợp giữa tư tưởng Phật giáo Đại thừa và Thiền nguyên thủy Vipassana, nhưng Hiểu Về Trái Tim không phải tác phẩm thuyết giáo về Phật pháp. Cuốn sách rất “đời” với những ưu tư của một người tu nhìn về cõi thế. Ở đó, có hạnh phúc, có đau khổ, có tình yêu, có cô đơn, có tuyệt vọng, có lười biếng, có yếu đuối, có buông xả… Nhưng, tất cả những hỉ nộ ái ố ấy đều được khoác lên tấm áo mới, một tấm áo tinh khiết và xuyên suốt, khiến người đọc khi nhìn vào, đều thấy mọi sự như nhẹ nhàng hơn…\r\n', '2021-06-26', 1, 110000, 'Minh Niệm', 49),
(218, 'Đừng Chạy Theo Số Đông ', 100000, 'image_195509_1_37011.jpg', 17, 18, 'Ngày xuất bản: 15/01/2024<br>\r\nKích thước: 13.0 x 20.5 cm<br>\r\nSố trang: 168 trang<br>\r\nTrọng lượng: 320 gram<br><br>\r\n<b>Tóm tắt</b><br>\r\nNếu tất cả mọi người ai cũng làm chủ doanh nghiệp, thì ai sẽ đi làm thuê?\r\n\r\nTôi.\r\n\r\nBởi lúc đó họ sẽ phải đấu giá để có được tôi.\r\n\r\nNhưng điều này không bao giờ xảy ra. Bởi ngay từ trong trứng đến lúc mọc cánh, chúng ta đã được dạy phải làm cho người khác cả đời. Chỉ có 1% được dạy khác.\r\n\r\nBạn không chạy theo số đông.\r\n\r\nBạn LÀ số đông.\r\n\r\nTuy nhiên bạn đừng nhầm lẫn. Cuốn sách này không chỉ nói về vấn đề “làm thuê” hay “làm riêng”. Đây chỉ là một trong những khía cạnh rất nhỏ.\r\n\r\nCuốn sách này muốn làm nổi bật một hệ tư duy ngầm lớn và khủng khiếp hơn thế mà chúng ta không nhận ra. Một sức hút vô hình nhưng mạnh mẽ.', '2021-06-26', 0, 0, 'Kiên Trần', 50),
(219, 'Nhà Giả Kim (Tái Bản 2020) ', 79000, 'image_195509_1_36793.jpg', 18, 19, 'Ngày xuất bản: 15/01/2024<br>\r\nKích thước: 13.0 x 20.5 cm<br>\r\nSố trang: 168 trang<br>\r\nTrọng lượng: 320 gram<br><br>\r\n<b>Tóm tắt</b><br>\r\nTất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người. \r\n\r\nTiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.\r\n\r\n“Nhưng nhà luyện kim đan không quan tâm mấy đến những điều ấy. Ông đã từng thấy nhiều người đến rồi đi, trong khi ốc đảo và sa mạc vẫn là ốc đảo và sa mạc. Ông đã thấy vua chúa và kẻ ăn xin đi qua biển cát này, cái biển cát thường xuyên thay hình đổi dạng vì gió thổi nhưng vẫn mãi mãi là biển cát mà ông đã biết từ thuở nhỏ. Tuy vậy, tự đáy lòng mình, ông không thể không cảm thấy vui trước hạnh phúc của mỗi người lữ khách, sau bao ngày chỉ có cát vàng với trời xanh nay được thấy chà là xanh tươi hiện ra trước mắt. ‘Có thể Thượng đế tạo ra sa mạc chỉ để cho con người biết quý trọng cây chà là,’ ông nghĩ.”', '2021-06-26', 1, 59000, 'Paulo Coelho', 50),
(220, 'Con chó nhỏ mang giỏ hoa hồng', 140000, '203534_p67314mconchonho.jpg', 15, 19, 'Ngày xuất bản: 15/01/2024<br>\r\nKích thước: 13.0 x 20.5 cm<br>\r\nSố trang: 168 trang<br>\r\nTrọng lượng: 320 gram<br><br>\r\n<b>Tóm tắt</b><br>\r\nCuốn sách thuộc thể loại truyện dài gồm 252 trang của tác giả Nguyễn Nhật Ánh do NXB Trẻ xuất bản. Với 86 câu chuyện cực kỳ thú vị và hài hước về 5 con chó - 5 loài - 5 tính cách khác nhau, chúng cùng chung sống trong gia đình nhà Chị Ni.\r\n\r\nCâu chuyện về 5 chú chó đầy thú vị và cũng không kém cảm xúc lãng mạn – tác phẩm của nhà văn Nguyễn Nhật Ánh sẽ khiến bạn thay đổi nhiều trong cách nhìn về loài thú cưng số 1 thế giới này.\r\n\r\nQua cái nhìn của nhân vật tôi – chính là chú chó tên là Batô - nó tự cho mình là con chó xấu nhất đàn... Suku “thiên thần” – con chó đực duy nhất trong đàn, nó béo ục ịch đến mức báo động nhưng lại có vẻ ngoài với đôi mắt thiên thần có thể hạ gục bất cứ ai; Haili – một chú chó thông minh, có vẻ khá là chảnh chọe; Êmê – một con chó cứng đầu, “nó không muốn cai trị ai và cũng không muốn ai cai trị nó”; Pig – một con chó săn nhưng lại rất hiền lành.', '2024-01-14', 1, 120000, 'Nguyễn Nhật Ánh', 45),
(221, 'Con Chim Xanh Biếc Bay Về', 150000, 'ConChimXanhBiecBayVe.jpg', 15, 19, 'Ngày xuất bản: 15/01/2024<br>\r\nKích thước: 13.0 x 20.5 cm<br>\r\nSố trang: 168 trang<br>\r\nTrọng lượng: 320 gram<br><br>\r\n<b>Tóm tắt</b><br>\r\nNhân vật chính trong truyện là Khuê, một sinh viên mới tốt nghiệp đại học. Khuê vốn là một cô gái có tính tình bộc trực, hay hờn, nhưng cũng là điển hình cho những người con gái trẻ với tâm hồn đa sầu đa cảm. Vì chưa tìm được việc làm đúng với năng lực, cô tạm làm việc cho một quán ăn của người chủ trẻ tên là Sâm. \r\n\r\nTrái ngược hoàn toàn với Khuê, Sâm lại là một người chủ quán có phần kĩ tính, thậm chí có thể nói là nguyên tắc thái quá. Sâm yêu cầu Khuê phải lấy hàng ở những mối thân quen, kể cả có đắt hơn ít nhiều. Anh còn yêu cầu Khuê phải trả lại những món quá được bạn hàng tặng cho nhân dịp Tết.\r\n\r\nKhông ít lần chủ cửa hàng – Sâm và người làm thuê – Khuê phát sinh mâu thuẫn vì sự trái ngược trong tính cách. Dẫu vậy, qua một số chi tiết, chúng ta vẫn cảm nhận được sự quan tâm âm thầm mà cả hai dành cho nhau.\r\n\r\nLâu dần, Khuê phát hiện mình có cảm tình với chính người chủ quán khó tính ấy. Nhưng cô cũng tự thuyết phục mình rằng đó chỉ là thứ tình cảm đơn phương ngây dại, “Trong bộ phim tình cảm được đạo diễn bởi bàn tay của thần may rủi đó, hóa ra tôi chỉ là một nhân vật phụ ngớ ngẩn, chết ngay ở cú vấp té đầu tiên ở cảnh đầu tiên… Tôi tự thuyết phục rằng giữa tôi và Sâm không hề tồn tại cuộc tình nào, vì một cuộc tình thực sự thì không thể tạo ra từ một phía, cũng như một nụ hôn không thể được thực hiện chỉ bởi một người”.', '2024-01-14', 1, 120000, 'Nguyễn Nhật Ánh', 47),
(222, 'Đọc suy nghĩ - Thấu tâm trí', 150000, 'docscuynghi.jpg', 15, 19, 'Ngày xuất bản: 15/01/2024<br>\r\nKích thước: 13.0 x 20.5 cm<br>\r\nSố trang: 168 trang<br>\r\nTrọng lượng: 320 gram<br><br>\r\n<b>Tóm tắt</b><br>\r\nHầu hết nhân viên trẻ mới bước chân vào thị trường lao động đều sẽ đối mặt với những khó khăn nhất định trong việc hòa nhập vào môi trường làm việc và văn hóa công ty. Đối với những người làm đầu tiên đi làm, vấn đề lớn nhất có lẽ đến từ từ mối quan hệ với đồng nghiệp và các lãnh đạo trực tiếp cũng như gián tiếp. Khoảng 30% nhân viên trẻ và nhân viên mới rời công ty sau khoảng 3 năm gắn bó vì lý do giao tiếp công việc và áp lực từ cấp trên, nhưng không có gì đảm bảo rằng đến công ty mới họ sẽ không phải gặp lại vấn đề tương tự.\r\n\r\nTrong cuốn sách “Đọc suy nghĩ – Thấu tâm trí”, tác giả Hironori Furukawa trình bày một số nguyên nhân khiến nhân viên không thể gắn bó lâu dài với công ty:\r\n\r\n- Bất mãn với người trong công ty\r\n\r\n- Lo lắng năng lực của bản thân không thể đáp ứng các công việc được giao\r\n\r\n- Lo lắng về tương lai của mình khi làm việc ở công ty\r\n\r\n- Không tìm thấy định hướng nghề nghiệp khi làm ở công ty đó\r\n\r\nBởi ở bất kỳ công ty nào cũng có các vị sếp “đáng sợ”, vậy nên việc rèn luyện kỹ năng giao tiếp nơi làm việc sẽ giúp các nhân viên trẻ mới đi làm không còn cảm thấy áp lực hay sợ hãi khi làm việc leader. Bên cạnh đó, tác giả cũng hướng dẫn các nhân viên cấp dưới các kỹ năng để nâng cao năng lực bản thân, chủ động trong công việc, tạo dựng được sự tín nhiệm và ủng hộ từ đồng nghiệp và xây dựng mối quan hệ làm việc hiệu quả với các cấp trên và tận hưởng công việc mỗi ngày của mình.', '2024-01-14', 1, 125000, 'Hironori Furukawa', 49),
(223, 'Chính Sách Tiền Tệ Thế Kỷ 21', 100000, 'chinhsachtiente.jpg', 15, 19, 'Ngày xuất bản: 15/01/2024<br>\r\nKích thước: 13.0 x 20.5 cm<br>\r\nSố trang: 168 trang<br>\r\nTrọng lượng: 320 gram<br><br>\r\n<b>Tóm tắt</b><br>\r\nChiến lược ứng phó của cục dự trữ liên bang mỹ từ đại lạm phát đến nay\r\n\r\nCuốn sách đầu tiên bàn về lịch sử chống lạm phát & khủng hoảng của cục dự trữ liên bang Hoa Kỳ\r\n\r\nĐược viết bởi Ben S. Bernanke - người giữ chức Chủ tịch của Cục Dự trữ Liên bang Hoa Kỳ FED từ năm 2006 đến năm 2014, cuốn sách mang đến cho người đọc một cái nhìn tổng quan về các chính sách của FED cùng những thách thức và thay đổi trong nền kinh tế mà họ phải đối mặt như lạm phát, rủi ro, tài chính và cách vượt qua để giữ kinh tế Mỹ giữ vững vị trí hàng đầu trên thương trường thế giới.\r\n\r\n\"Như tôi thường nhận xét khi còn lãnh đạo Fed, chính sách tiền tệ không phải là thuốc chữa bách bệnh. Nhưng tiền thì quan trọng – rất quan trọng. Như phản ứng của Fed dưới thời Powell trước đại dịch đã minh họa, chính sách tiền tệ trong thế kỷ 21 – và hoạt động ngân hàng trung ương nói chung – được định hình bởi những đổi mới và thay đổi đáng chú ý.\"', '2024-01-14', 1, 75000, 'Ben S.Bernake', 44),
(224, 'Để thịnh vượng và hạnh phúc', 200000, 'dethinhvuongvahanhphuc.jpg', 15, 22, 'Ngày xuất bản: 15/01/2024<br>\r\nKích thước: 13.0 x 20.5 cm<br>\r\nSố trang: 168 trang<br>\r\nTrọng lượng: 320 gram<br><br>\r\n<b>Tóm tắt</b><br>\r\nGiàu có không đến nhờ may mắn, hạnh phúc cũng vậy.\r\n\r\nHạnh phúc, giàu có, sự thịnh vượng là những điều nằm trong tầm với của TẤT CẢ MỌI NGƯỜI đơn giản bởi vì chúng là kỹ năng chúng ta có thể học được. Vậy thì câu hỏi được đặt ra là: Những kỹ năng này là gì, chúng ta phải học như thế nào và đâu là những nguyên tắc nền tảng dẫn lối chúng ta vươn tới khát vọng?\r\n\r\nNaval Ravikant - Để Thịnh Vượng Và Hạnh Phúc là cuốn sách bạn nên đọc càng sớm càng tốt vì nó chứa đựng câu trả lời toàn diện nhất cho những câu hỏi về sự giàu có và hạnh phúc. Tập hợp trí tuệ và kinh nghiệm của Naval Ravikant - một doanh nhân nổi tiếng với những nguyên tắc tạo ra cuộc sống thịnh vượng, cuốn sách chứa đầy những chiêm nghiệm sâu sắc của ông về sự giàu có trong tài chính, sức khỏe, trải nghiệm và tâm hồn.\r\n\r\nMỗi trang sách sẽ khai mở cho bạn nhiều ý nghĩa để tạo ra những thay đổi tích cực trong cuộc sống của mình, dẫn lối bạn hướng tới tương lai giàu có hơn, hạnh phúc hơn.\r\n\r\nNếu bạn đang có những suy nghĩ hỗn loạn về hạnh phúc và sự giàu có, đừng chờ đợi mà hãy tìm đáp án cho chính mình trong quyển sách này!', '2024-01-14', 1, 175000, 'Naval Ravikant', 45),
(225, 'Toko Và Em - Khi Cánh Hoa Anh Đào Rơi', 140000, 'tokovaem.jpg', 16, 23, 'Ngày xuất bản: 15/01/2024<br>\r\nKích thước: 13.0 x 20.5 cm<br>\r\nSố trang: 168 trang<br>\r\nTrọng lượng: 320 gram<br><br>\r\n<b>Tóm tắt</b><br>\r\nNguyễn Hoàng Mai thể nghiệm những cuộc đuổi bắt riêng tư của mình về một tháp ngà mơ mộng bằng việc lí giải cho câu hỏi \"Tuổi trẻ là gì?\" và, câu hỏi tiếp theo trong chuỗi suy niệm ấy, hẳn chẳng thể nào khác được, \"Tình yêu là gì?\"\r\n\r\nNhững ám ảnh của tuổi trẻ là tình yêu, là những trải nghiệm với ngàn vạn cung bậc cảm giác bản năng rất người. Trong quá trình học tập và làm việc nơi xứ Phù Tang, những người trẻ như Nguyễn Hoàng Mai chắc hẳn đã có khá nhiều cảm nghiệm về thế giới, về nền văn hóa của Nhật Bản cùng với sự cộng hưởng các góc nhìn từ sự biến chuyển phức tạp trong đời sống nội tâm của chính họ.', '2024-01-17', 1, 120000, 'Nguyễn Hoàng Mai', 49);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeuthich`
--

CREATE TABLE `yeuthich` (
  `mayeuthich` bigint(10) NOT NULL,
  `makhachhang` bigint(10) NOT NULL,
  `masanpham` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `yeuthich`
--

INSERT INTO `yeuthich` (`mayeuthich`, `makhachhang`, `masanpham`) VALUES
(18, 2, 223),
(19, 2, 221);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`id_chi_tiet_hoadon`),
  ADD KEY `chitiethoadon` (`sodh`),
  ADD KEY `fk_chitiethoadon_sanpham` (`masp`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`macomment`),
  ADD KEY `fk_comment_khachhang` (`makhachhang`),
  ADD KEY `fk_comment_sanpham` (`masanpham`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`Madanhmuc`),
  ADD UNIQUE KEY `Tendanhmuc` (`Tendanhmuc`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`magiohang`),
  ADD KEY `fk_giohang_sanpham` (`masanpham`),
  ADD KEY `fk_giohang_khachhang` (`makhachhang`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`sodh`),
  ADD KEY `fk_hoadon_khachhang` (`makhachhang`);

--
-- Chỉ mục cho bảng `loginadmin`
--
ALTER TABLE `loginadmin`
  ADD PRIMARY KEY (`maadmin`,`tendangnhap`);

--
-- Chỉ mục cho bảng `loginuser`
--
ALTER TABLE `loginuser`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Ten` (`Ten`),
  ADD KEY `sanpham` (`Manhasx`),
  ADD KEY `giakhuyenmai` (`giakhuyenmai`),
  ADD KEY `giakhuyenmai_2` (`giakhuyenmai`),
  ADD KEY `giakhuyenmai_3` (`giakhuyenmai`),
  ADD KEY `giakhuyenmai_4` (`giakhuyenmai`),
  ADD KEY `giakhuyenmai_5` (`giakhuyenmai`),
  ADD KEY `fk_sanpham_danhmuc` (`Madm`);
ALTER TABLE `sanpham` ADD FULLTEXT KEY `Ten_2` (`Ten`);

--
-- Chỉ mục cho bảng `yeuthich`
--
ALTER TABLE `yeuthich`
  ADD PRIMARY KEY (`mayeuthich`),
  ADD KEY `fk_yeuthich_sanpham` (`masanpham`),
  ADD KEY `fk_yeuthich_khachhang` (`makhachhang`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `id_chi_tiet_hoadon` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `macomment` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `Madanhmuc` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `magiohang` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `sodh` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT cho bảng `loginadmin`
--
ALTER TABLE `loginadmin`
  MODIFY `maadmin` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `loginuser`
--
ALTER TABLE `loginuser`
  MODIFY `makh` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  MODIFY `ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT cho bảng `yeuthich`
--
ALTER TABLE `yeuthich`
  MODIFY `mayeuthich` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `fk_chitiethoadon_hoadon` FOREIGN KEY (`sodh`) REFERENCES `hoadon` (`sodh`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_chitiethoadon_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`ID`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_khachhang` FOREIGN KEY (`makhachhang`) REFERENCES `loginuser` (`makh`),
  ADD CONSTRAINT `fk_comment_sanpham` FOREIGN KEY (`masanpham`) REFERENCES `sanpham` (`ID`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `fk_giohang_khachhang` FOREIGN KEY (`makhachhang`) REFERENCES `loginuser` (`makh`),
  ADD CONSTRAINT `fk_giohang_sanpham` FOREIGN KEY (`masanpham`) REFERENCES `sanpham` (`ID`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_hoadon_khachhang` FOREIGN KEY (`makhachhang`) REFERENCES `loginuser` (`makh`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_danhmuc` FOREIGN KEY (`Madm`) REFERENCES `danhmuc` (`Madanhmuc`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_sanpham_nhaxuatban` FOREIGN KEY (`Manhasx`) REFERENCES `nhaxuatban` (`ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `yeuthich`
--
ALTER TABLE `yeuthich`
  ADD CONSTRAINT `fk_yeuthich_khachhang` FOREIGN KEY (`makhachhang`) REFERENCES `loginuser` (`makh`),
  ADD CONSTRAINT `fk_yeuthich_sanpham` FOREIGN KEY (`masanpham`) REFERENCES `sanpham` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
