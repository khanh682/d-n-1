<?php
session_start();
// Commons
require_once "commons/env.php";
require_once "commons/function.php";

// Models
require_once "models/DanhMuc.php";
require_once "models/SanPham.php";
require_once "models/NguoiDung.php";

// Controllers
require_once "controllers/admin/DanhMucController.php";
require_once "controllers/admin/SanPhamController.php";
require_once "controllers/admin/NguoiDungController.php";
require_once "controllers/client/HomeController.php";

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
    case "detail":
        include "./view/client/detail.php";
        break;
    case "cart":
        include "./view/client/cart.php";
        break;
    case "checkout":
        include "./view/client/checkout.php";
        break;
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
    case "logout":
        (new NguoiDungController)->logout();
        break;
    default:
        echo "404 FILE NOT FOUND!";
        break;
}
?>
