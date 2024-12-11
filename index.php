<?php
session_start();
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
// Commons
require_once "commons/env.php";
require_once "commons/function.php";

// Models
require_once "models/DanhMuc.php";
require_once "models/SanPham.php";
require_once "models/NguoiDung.php";
require_once "models/DonHang.php";

// Controllers
require_once "controllers/admin/DanhMucController.php";
require_once "controllers/admin/SanPhamController.php";
require_once "controllers/admin/NguoiDungController.php";
require_once "controllers/client/HomeController.php";
require_once "controllers/client/ClientProductController.php";
require_once "controllers/admin/DonHangController.php";
require_once "controllers/client/OrderController.php";

// Safely handle the 'pg' parameter
$pg = $_GET["pg"] ?? ""; // Default to empty string if 'pg' is not set
$action = $_GET['action'] ?? "list";
$madm = $_GET['madm'] ?? null;

switch ($pg) {
    case '':
        (new HomeController)->homedm();
        break;
    case 'contact':
        include "./view/client/contact.php";
        break;
    case "shop":
        include "./view/client/shop.php";
        break;
    case "detail1":
        (new ClientProductController)->show($madm);
        break;
    case "ordersuccess":
        include "./view/client/ordersuccess.php";
        break;
    case "addcart":
        //lấy dữ liệu từ form để lưu vào giỏ hàng
        if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
            $sanPham_id = $_POST['sanPham_id'];
            $anh = $_POST['anh'];
            $ten = $_POST['ten'];
            $gia = $_POST['gia'];
            var_dump($_POST);
            if (isset($_POST['sl']) && ($_POST['sl'] > 0)) {
                $sl = $_POST['sl'];
            } else {
                $sl = 1;
            }
            $fg = 0;
            //kiểm tra sản phẩm có tồn tại trong giỏ hàng hay không?
            //Nếu có chỉ cập nhật lại số lượng
            $i = 0;
            foreach ($_SESSION['giohang'] as  $item) {
                if ($item[2] === $ten) {
                    $slnew = $sl + $item[4];
                    $_SESSION['giohang'][$i][4] = $slnew;
                    $fg = 1;
                    break;
                }
                $i++;
            }
            //Còn ngược lại add mới sp vào giỏ hàng

            //khởi tạo 1 mảng con trước khi đưa vào giỏ hàng
            if ($fg == 0) {
                $item = [$sanPham_id, $anh, $ten, $gia, $sl];
                $_SESSION['giohang'][] = $item;
            }
            header('location: index.php?pg=addcart');
        }

        //view giỏ hàng lên
        //include "./view/client/cart.php";
        (new ClientProductController)->cart();
        break;
    case 'delcart':
        if (isset($_GET['i']) && ($_GET['i'] > 0)) {
            if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0))
                array_splice($_SESSION['giohang'], $_GET['i'], 1);
        } else {
            if (isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
        }
        if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
            header('location: index.php?pg=addcart');
        } else {
            header('location: index.php');
        }
        break;
    case "checkout":
        include "./view/client/checkout.php";
        break;
    case "thanhtoan":
        (new DonHangController)->showOrderDetails();
        break;
        // $Order->showOrderDetails();
        // if ((isset($_POST['thanhtoan'])) && ($_POST['thanhtoan'])) {
        //     //lấy dữ liệu
        //     $tongGia = $_POST['tongGia'];
        //     $name = $_POST['name'];
        //     $address = $_POST['address'];
        //     $email = $_POST['email'];
        //     $tel = $_POST['tel'];
        //     $pttt = $_POST['pttt'];
        //     $madh = "LOINUNA" . rand(0, 999999);
        //     //tạo đơn hàng
        //     //và trả về 1 id đơn hàng
        //     // $item=[$sanPham_id,$anh,$ten,$gia,$sl];
        //     $nguoiDung_id = $_POST['nguoiDung_id'];
        //     if (isset($_POST['thanhtoan'])) {
        //         echo "<pre>";
        //         print_r($_POST);
        //         echo "</pre>";
        //     }
            
        //     // var_dump($_POST);die;
        //     try {
        //         $donHang_id = taodonhang($madh, $tongGia, $pttt, $name, $address, $email, $tel, $nguoiDung_id);
        //         if ($donHang_id) {
        //             echo "Đơn hàng được tạo thành công. ID: " . $donHang_id;
        //         } else {
        //             echo "Đơn hàng không được tạo. Kiểm tra hàm taodonhang.";
        //         }
        //     } catch (Exception $e) {
        //         echo "Lỗi trong quá trình tạo đơn hàng: " . $e->getMessage();
        //     }
        //                 // var_dump($donHang_id); die;
        //     // $_SESSION['donHang_id'] = $donHang_id;
        //     // (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
        //     //     foreach ($_SESSION['giohang'] as $item) {
        //     //         // Truyền đúng tham số: $sanPham_id, $gia, $soLuong
        //     //         addtoorder($donHang_id, $item[0], 0, $item[1], $item[2]);
        //     //     }
        //     //     // Xóa giỏ hàng sau khi đặt hàng xong
        //     //     unset($_SESSION['giohang']);
        //     // }
            
        // }
        // include "./view/client/order.php";
        // break;
    case "danhmuc":
        (new DanhMucController)->list();
        break;
    case "andm":
        if ($action == 'list') {
            (new DanhMucController)->hien();
        } elseif ($action == 'an' && $madm) {
            (new DanhMucController)->an($madm);
        } elseif ($action == 'show' && $madm) {
            (new DanhMucController)->show($madm);
        }
        break;
    case "add":
        (new DanhMucController)->add();
        break;
    case "store":
        (new DanhMucController)->store();
        break;
    case "edit":
        (new DanhMucController)->edit();
        break;
    case 'delete':
        (new DanhMucController)->delete();
        break;
    case "sanpham":
        (new SanPhamController)->list();
        break;
    case "addsp":
        (new SanPhamController)->add();
        break;
    case "storesp":
        (new SanPhamController)->store();
        break;
    case "editsp":
        (new SanPhamController)->edit();
        break;
    case "ansp":
        $sanPham_id = $_GET['sanPham_id'] ?? "list"; // Ensure $sanPham_id is defined
        if ($action == 'list') {
            (new SanPhamController)->hien();
        } elseif ($action == 'an' && $sanPham_id) {
            (new SanPhamController)->an($sanPham_id);
        } elseif ($action == 'show' && $sanPham_id) {
            (new SanPhamController)->show($sanPham_id);
        }
        break;
    case 'deletesp':
        (new SanPhamController)->delete();
        break;
    case "nguoidung":
        (new NguoiDungController)->list();
        break;
    case "adduser":
        (new NguoiDungController)->add();
        break;
    case "deleteuser":
        (new NguoiDungController)->delete();
        break;
    case "storeuser":
        (new NguoiDungController)->store();
        break;
    case "edituser":
        (new NguoiDungController)->edit();
        break;
    case "login":
        (new NguoiDungController)->login();
        break;
    case "register":
        include "./view/client/myaccount/register.php";
        break;
    case "logout":
        (new NguoiDungController)->logout();
        break;
    case "donhang":
        (new OrderController)->list();
        break;
    case "detailCart":
        if (isset($_GET['id'])) {
            (new OrderController)->detail($_GET['id']);
        }
        break;
    case "updateStatus":
        (new OrderController)->updateStatus();
        break;
    case "listcart":
        if (isset($_GET['id'])) {
            (new DonHangController)->listcart($_GET['id']);
        }
        break;
    case "detailcart":
        if (isset($_GET['id'])) {
        (new DonHangController)->detailcart($_GET['id']);
        }
        break;
    case "submitCancel_order":
        (new DonHangController)->submitCancel_order();
        break;
    default:
        echo "404 FILE NOT FOUND!";
        break;
}
