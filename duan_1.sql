-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2025 at 08:49 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `chiTietDonHang_id` int NOT NULL,
  `donHang_id` int NOT NULL,
  `sanPham_id` int NOT NULL,
  `soLuong` int NOT NULL,
  `gia` decimal(10,2) NOT NULL,
  `thanhTien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`chiTietDonHang_id`, `donHang_id`, `sanPham_id`, `soLuong`, `gia`, `thanhTien`) VALUES
(17, 143, 25, 4, '166000.00', '664000.00'),
(18, 143, 30, 3, '22.00', '66.00'),
(19, 143, 23, 3, '166000.00', '498000.00'),
(20, 144, 25, 4, '166000.00', '664000.00'),
(21, 144, 30, 3, '22.00', '66.00'),
(22, 144, 23, 3, '166000.00', '498000.00'),
(23, 145, 25, 4, '166000.00', '664000.00'),
(24, 145, 30, 3, '22.00', '66.00'),
(25, 145, 23, 3, '166000.00', '498000.00'),
(26, 146, 25, 4, '166000.00', '664000.00'),
(27, 146, 22, 1, '164.00', '164.00'),
(28, 147, 22, 1, '164.00', '164.00'),
(29, 148, 22, 1, '164.00', '164.00'),
(30, 149, 25, 1, '166.00', '166.00'),
(31, 150, 25, 1, '166.00', '166.00'),
(32, 151, 31, 1, '33.00', '33.00'),
(33, 152, 22, 1, '164.00', '164.00'),
(34, 153, 31, 1, '33.00', '33.00'),
(35, 153, 25, 1, '166.00', '166.00'),
(36, 154, 25, 1, '166.00', '166.00');

-- --------------------------------------------------------

--
-- Table structure for table `chitietgiohang`
--

CREATE TABLE `chitietgiohang` (
  `chiTietGioHang_id` int NOT NULL,
  `gioHang_id` int NOT NULL,
  `sanPham_id` int NOT NULL,
  `soLuong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhgiasanpham`
--

CREATE TABLE `danhgiasanpham` (
  `danhGiaSanPham_id` int NOT NULL,
  `sanPham_id` int NOT NULL,
  `nguoiDung_id` int NOT NULL,
  `danhGia` int NOT NULL COMMENT '(0-5, representing star rating)',
  `binhLuan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngayDanhGia` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `madm` int NOT NULL,
  `tendm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hinhanh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`madm`, `tendm`, `hinhanh`, `status`) VALUES
(1, 'Áo Khoác', 'assets/img/aonam7.jpg', 0),
(2, 'Áo len', 'assets/img/aonam4.jpg', 0),
(3, 'Áo hoodie', 'assets/img/aonam5.jpg', 1),
(4, 'Áo Da', 'assets/img/aonam6.jpg', 1),
(5, 'Áo giữ nhiệt.', 'assets/img/aonam3.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `donHang_id` int NOT NULL,
  `madh` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tongGia` double(10,2) NOT NULL DEFAULT '0.00',
  `pttt` tinyint(1) NOT NULL DEFAULT '1',
  `nguoiDung_id` int DEFAULT '0',
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('Đã đặt hàng','Chờ vận chuyển','Đang giao','Đã giao','Đã hủy') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Đã đặt hàng',
  `ngayTao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `lyDoHuy` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`donHang_id`, `madh`, `tongGia`, `pttt`, `nguoiDung_id`, `name`, `address`, `email`, `tel`, `status`, `ngayTao`, `lyDoHuy`) VALUES
(143, 'LOINUNA610827', 1162066.00, 1, 7, 'khazcv123', '14/106/79 Cầu Giấy,Phường Láng Hạ', 'kt9754220@gmail.com', '09129374', 'Đã giao', '2024-12-11 13:44:04', ''),
(144, 'LOINUNA974726', 1162066.00, 1, 7, 'Khanh', '14 Cầu Giấy', 'loipham86@gmail.com', '09129374', 'Chờ vận chuyển', '2024-12-11 13:51:20', 'Cần thay đổi phương thức thanh toán'),
(145, 'LOINUNA181945', 1162066.00, 1, 7, 'Khanh', '14 Cầu Giấy', 'loipham86@gmail.com', '09129374', 'Chờ vận chuyển', '2024-12-11 13:51:33', 'Cần thay đổi phương thức thanh toán'),
(146, 'LOINUNA198746', 664164.00, 1, 7, 'Khanh', '142 Cầu Giấy', 'phamkhu27@gmail.com', '09129374', 'Chờ vận chuyển', '2024-12-11 13:53:24', ''),
(147, 'LOINUNA122132', 164.00, 1, 7, 'Khanh', '142 Cầu Giấy', 'phamkhu27@gmail.com', '09129374', 'Chờ vận chuyển', '2024-12-11 13:55:49', ''),
(148, 'LOINUNA725522', 164.00, 1, 12, 'Khanh', '142 Xuân Thủy', 'kt9754220@gmail.com', '09129374', 'Đã hủy', '2024-12-12 00:44:39', 'Cần thay đổi địa chỉ này'),
(149, 'LOINUNA985546', 166000.00, 1, 12, 'Khanh1', '14 Cầu Giấy', 'kt9754220@gmail.com', '09129374', 'Chờ vận chuyển', '2024-12-12 00:53:37', NULL),
(150, 'LOINUNA475358', 166.00, 1, 12, 'Khanh', '142 Cầu Giấy', 'kt9754220@gmail.com', '09129374', 'Đã giao', '2024-12-12 01:46:28', NULL),
(151, 'LOINUNA251678', 33.00, 1, 12, 'khazcv123', '14 Cầu Giấy', 'kt9754220@gmail.com', '09129374', 'Đã đặt hàng', '2024-12-12 02:31:47', NULL),
(152, 'LOINUNA517750', 164.00, 1, 12, 'Khanh', '142 Cầu Giấy', 'kt9754220@gmail.com', '09129374', 'Đã giao', '2024-12-12 02:58:37', NULL),
(153, 'LOINUNA456687', 199.00, 1, 12, 'Khanh', '14 Cầu Giấy', 'kt9754220@gmail.com', '09129374', 'Đã hủy', '2024-12-12 03:00:36', 'Cần thay đổi phương thức thanh toán'),
(154, 'LOINUNA628985', 166.00, 1, 12, 'Khanh', '14/106/79 Cầu Giấy,Phường Láng Hạ', 'kt9754220@gmail.com', '09129374', 'Đã hủy', '2024-12-12 03:15:47', 'Cần thay đổi địa chỉ này');

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `gioHang_id` int NOT NULL,
  `nguoiDung_id` int DEFAULT NULL,
  `sanPham_id` int NOT NULL,
  `soluong` int NOT NULL DEFAULT '0',
  `dongia` double(10,2) NOT NULL DEFAULT '0.00',
  `ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `anh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `khuyenMai_id` int NOT NULL,
  `ten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `moTa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `loaiGiamGia` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `giaTriGiamGia` decimal(10,2) NOT NULL,
  `ngayBatDau` datetime NOT NULL,
  `ngayKetThuc` datetime NOT NULL,
  `ngayTao` datetime NOT NULL,
  `ngayCapNhat` datetime NOT NULL,
  `sanPham_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `nguoiDung_id` int NOT NULL,
  `ten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngayTao` datetime NOT NULL,
  `ngaySua` datetime NOT NULL,
  `soDienThoai` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`nguoiDung_id`, `ten`, `email`, `password`, `ngayTao`, `ngaySua`, `soDienThoai`, `role`) VALUES
(6, 'phạm xuân lợi', 'loipham86@gmail.com', '01236434849', '2024-11-22 12:08:00', '2024-11-22 12:08:00', '0836434849', 1),
(7, 'Phạm Xuân Khu', 'phamkhu27@gmail.com', '01236434849', '2024-11-22 12:09:00', '2024-11-22 12:09:00', '0913374815', 0),
(8, 'Phạm Thị Hồng Thu', 'loipham88@gmail.com', '01236434849', '2024-11-22 12:09:00', '2024-11-22 12:09:00', '012345622', 1),
(11, 'phạm xuân lợi', 'loipham86@gmail.com', '01236434849', '2024-11-22 16:13:00', '2024-11-22 17:13:00', '0987654321', 0),
(12, 'Khánh', 'kt9754220@gmail.com', '0123456', '2024-12-12 00:26:52', '2024-12-12 00:26:52', '0912319471', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `sanPham_id` int NOT NULL,
  `ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `moTa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gia` decimal(10,2) NOT NULL,
  `soLuong` int NOT NULL,
  `kichCo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mauSac` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngayTao` date NOT NULL,
  `ngaySua` date NOT NULL,
  `anh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `luotxem` int NOT NULL DEFAULT '0',
  `khuyenMai_id` int DEFAULT NULL,
  `madm` int NOT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`sanPham_id`, `ten`, `moTa`, `gia`, `soLuong`, `kichCo`, `mauSac`, `ngayTao`, `ngaySua`, `anh`, `luotxem`, `khuyenMai_id`, `madm`, `status`) VALUES
(17, 'Áo sweater len nam nữ dệt hoạ tiết hình cún ngực phối 4 sọc trắng tay bo ống dày dặn cao cấp AN43P', ' Tên sản phẩm: Áo sweater len thu đông nam nữ dệt hoạ tiết hình cún ngực phối 4 sọc tay bo ống dày dặn boy phố\r\n✔️ Xuất xứ: Việt Nam\r\n✔️ Chất liệu: Vải len dệt cao cấp dày dặn, lì mịn, mềm mại, co dãn 4 chiều nhẹ tạo khả năng giữ nhiệt, giữ ấm tốt và cảm giác thoải mái cho người dùng\r\n✔️ Kích cỡ: Free size(45- 75kg)\r\n✔️ Màu sắc: Đen, xám', '166.00', 3345, 'S', 'trắng', '2024-11-12', '2024-11-12', '2.jpg', 0, NULL, 1, 1),
(18, 'Áo sweater Rap Lau Rừn thêu ngựa logo nỉ bông swt thêu ngựa cao cấp siêu dày vải nam nữ unisex Loix', 'Áo sweater Rap Lau Rừn unisex chuẩn sản xuất, tem mác chuẩn chính hãng.\r\n\r\nChất liệu áo swt Rap Lau Rừn unisex: thun cotton 100%, co giãn 4 chiều, vải mềm, vải mịn, thoáng mát, không xù lông.\r\n\r\nĐường may chuẩn chỉnh, tỉ mỉ, chắc chắn.', '122.00', 342, 'M', 'Xám', '2024-11-12', '2024-11-12', '3.jpg', 0, NULL, 2, 1),
(19, 'Áo Sweater CUNA Áo Sweater Nam Nữ Form Rộng Chất Cotton Nỉ Ngoại Hàng Xuất Cao Cấp Trơn Cổ Tròn Dài Tay Local Brand', '\r\n✔️ Chất Liệu: Cotton Nỉ Ngoại có lót hàng xuất cao cấp\r\n\r\n✔️ Kiểu dáng: Áo nỉ sweater form rộng unisex trơn basic cực dễ phối đồ\r\n\r\n✔️ Thiết Kế Độc Đáo: Có đường line bo viền cả cổ, gấu và tay áo cực cá tính và phong cách,...\r\n\r\n✔️ Màu sắc: Áo Sweater Nam Nữ Đủ màu basic cực dễ tôn da tôn dáng, phối đồ,...', '433.00', 345, 'XL', 'Đen', '2024-11-12', '2024-11-12', '4.jpg', 0, NULL, 2, 1),
(20, 'Áo khoác phao nam nữ DWIN local brand form oversize cổ cao unisex trần bông dày dặn siêu ấm', '- Chất liệu áo khoác phao nam nữ Dwin: Vải gió dù cao cấp- Form: Cơ bản- Đem lại sự thoải mái tiện lợi nhất cho người mặc đi mưa,cản gió,chống nắng- Áo khoác phao nam nữ Dwin được thiết kế theo đúng form chuẩn của nam giới Việt NamHướng dẫn sử dụng áo khoác phao nam nữ Dwin:', '160.00', 345, 'M', 'trắng', '2024-11-12', '2024-11-12', 'assets/img/aonam7.jpg', 29, NULL, 1, 0),
(21, 'Áo Sweater, Áo Len Lông Cao Cấp Họa Tiết Vằn Luxury Nam Nữ Mặc Đều Đẹp - Áo Len Hổ Vằn Chất Liệu Đẹp Fom Dáng Trung Quốc', '? THÔNG TIN SẢN PHẨM Vải / chất liệu: Sợi hóa học / polyester (sợi polyester) Thành phần chất liệu: 81% - 90% ?HƯỚNG DẪN CHỌN SIZE: M:     1m60-1m70/ 50-55kgL:      1m65-1m75/ 55-65kgXL:    1m70-1m80/ 65-75kg2XL:  1m75-1m85/ 70-80kg', '160.00', 3345, 'XL', 'Xám', '2024-11-12', '2024-11-12', 'assets/img/aonam8.jpg', 7, NULL, 2, 1),
(22, 'Áo Giữ Nhiệt Nam UMA MEN Lông Thỏ Chất Nỉ Lông Cao Cấp Mặc Mùa Thu Đông Giữ Ấm Cơ Thể Cực Tốt AGN26', 'Áo Giữ Nhiệt Nam UMA Lông Thỏ, Chất Nỉ Lông Cao Cấp Mặc Mùa Thu Đông Giữ Ấm Cơ Thể Cực Tốt,  Áo Thun Nam Dài Tay AGN26 - Sự Mềm Mại và Ấm Áp Cho Mùa ĐôngKhám phá cảm giác êm ái và ấm áp với Áo Giữ Nhiệt của chúng tôi, một lựa chọn hoàn hảo để đối mặt với những ngày lạnh giá của mùa đông. Chất liệu nỉ lông cao cấp không chỉ giữ ấm mà còn mang lại sự mềm mại tuyệt vời cho làn da của bạn.', '164.00', 345, 'XL', 'Đen', '2024-11-12', '2024-11-12', 'assets/img/aonam6.jpg', 187, NULL, 1, 0),
(23, 'Áo khoác len nam HANLU có ve áo họa tiết ca rô áo khoác công sở rộng ấm áp', '❣Tay nghề tinh tế, chất lượng đảm bảo, thoải mái khi mặc❣Nếu bạn muốn vừa vặn hơn, vui lòng mua một kích thước lớn hơn.❣Nếu bạn có bất kỳ câu hỏi nào, chào mừng bạn đến hỏi và cung cấp cho bạn câu trả lời thỏa đáng       ', '166.00', 234, 'XL', 'trắng', '2024-11-12', '2024-11-12', 'assets/img/aonam5.jpg', 33, NULL, 2, 0),
(24, 'Áo khoác bomber nam Musta MKCLEVER Chất liệu vải Gió trần bông, chống nước cản gió tốt, dày dặn, phom trẻ trung', 'Vừa đẹp vừa đa di năng, siêu phẩm này xứng đáng là item ', '160.00', 642, 'S', 'Xám', '2024-11-12', '2024-11-12', 'assets/img/aonam4.jpg', 5, NULL, 2, 0),
(25, 'Áo Sweater Frozen Night Life Nỉ Chân Cua lót lông Cotton 100% Unisex Local Brand', 'Áo sweater Frozen nỉ chân cua lót lông.• Chất liệu :  Thành phần vải nỉ chân cua 100% cotton• Size: M / L / XL• Hình in: In Pet chuyển nhiệt cao cấp sắc nét.', '166.00', 345, 'M', 'trắng', '2024-11-12', '2024-11-12', 'assets/img/aonam3.jpg', 86, NULL, 1, 0),
(30, 'Áo thu đông', '- Áo chống nắng được các chàng trai, cô gái khi đi ra đường lựa chọn khi đi ra ngoài, vì vừa bảo vệ được bản thân trước ánh nắng mặt trời, bảo vệ khỏi tia UV và mang phong cách thời trang  - Chất liệu: vải Polyester cao cấp dày dặn chống tia UV', '22.00', 333, 'M', 'đen', '2023-03-11', '2024-02-11', 'assets/img/aonam1.jpg', 35, NULL, 2, 0),
(31, 'Áo Sweater Frozen', '- Áo chống nắng được các chàng trai, cô gái khi đi ra đường lựa chọn khi đi ra ngoài, vì vừa bảo vệ được bản thân trước ánh nắng mặt trời, bảo vệ khỏi tia UV và mang phong cách thời trang  - Chất liệu: vải Polyester cao cấp dày dặn chống tia UV', '33.00', 221, 'S', 'Trắng', '2002-02-12', '2023-02-12', 'assets/img/aonam2.jpg', 166, NULL, 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`chiTietDonHang_id`),
  ADD KEY `fk_chiTietDonHang_donHang` (`donHang_id`),
  ADD KEY `fk_chiTietDonHang_sanPham` (`sanPham_id`);

--
-- Indexes for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD PRIMARY KEY (`chiTietGioHang_id`),
  ADD KEY `fk_chiTietGioHang_gioHang` (`gioHang_id`),
  ADD KEY `fk_chiTietGioHang_sanPham` (`sanPham_id`);

--
-- Indexes for table `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD PRIMARY KEY (`danhGiaSanPham_id`),
  ADD KEY `fk_danhGiaSanPham_sanPham` (`sanPham_id`),
  ADD KEY `fk_danhGiaSanPham_nguoiDung` (`nguoiDung_id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`madm`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`donHang_id`),
  ADD KEY `fk_donHang_nguoiDung` (`nguoiDung_id`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`gioHang_id`),
  ADD KEY `fk_gioHang_nguoiDung` (`nguoiDung_id`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`khuyenMai_id`),
  ADD KEY `fk_khuyenMai_sanPham` (`sanPham_id`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`nguoiDung_id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sanPham_id`),
  ADD KEY `fk_sanpham_khuyenmai` (`khuyenMai_id`),
  ADD KEY `fk_sanpham_danhmuc` (`madm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `chiTietDonHang_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  MODIFY `chiTietGioHang_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  MODIFY `danhGiaSanPham_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `madm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1223;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `donHang_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `gioHang_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `khuyenMai_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `nguoiDung_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sanPham_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `fk_chiTietDonHang_donHang` FOREIGN KEY (`donHang_id`) REFERENCES `donhang` (`donHang_id`),
  ADD CONSTRAINT `fk_chiTietDonHang_sanPham` FOREIGN KEY (`sanPham_id`) REFERENCES `sanpham` (`sanPham_id`);

--
-- Constraints for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD CONSTRAINT `fk_chiTietGioHang_gioHang` FOREIGN KEY (`gioHang_id`) REFERENCES `giohang` (`gioHang_id`),
  ADD CONSTRAINT `fk_chiTietGioHang_sanPham` FOREIGN KEY (`sanPham_id`) REFERENCES `sanpham` (`sanPham_id`);

--
-- Constraints for table `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD CONSTRAINT `fk_danhGiaSanPham_nguoiDung` FOREIGN KEY (`nguoiDung_id`) REFERENCES `nguoidung` (`nguoiDung_id`),
  ADD CONSTRAINT `fk_danhGiaSanPham_sanPham` FOREIGN KEY (`sanPham_id`) REFERENCES `sanpham` (`sanPham_id`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_donHang_nguoiDung` FOREIGN KEY (`nguoiDung_id`) REFERENCES `nguoidung` (`nguoiDung_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `fk_gioHang_nguoiDung` FOREIGN KEY (`nguoiDung_id`) REFERENCES `nguoidung` (`nguoiDung_id`);

--
-- Constraints for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `fk_khuyenMai_sanPham` FOREIGN KEY (`sanPham_id`) REFERENCES `sanpham` (`sanPham_id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_danhmuc` FOREIGN KEY (`madm`) REFERENCES `danhmuc` (`madm`),
  ADD CONSTRAINT `fk_sanpham_khuyenmai` FOREIGN KEY (`khuyenMai_id`) REFERENCES `khuyenmai` (`khuyenMai_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
