<?php
session_start();

// commons
require_once "commons/env.php";
require_once "commons/function.php";
// model
require_once "model/SanPham.php";
require_once "model/DanhMuc.php";
require_once "model/User.php";
// controller
require_once "controller/client/ClientProductController.php";
require_once "controller/client/HomeController.php";
require_once "controller/client/ClientLoginController.php";
$ctl = $_GET['ctl'] ?? "";
match ($ctl){
    
    '', 'home' =>(new HomeController)->index(),
    'login' => (new ClientLoginController)->handleLogin(),
    'formLogin' => (new ClientLoginController)->formLogin(),
    default => "Không tìm thấy file"
};

//Commons
require_once "commons/env.php";
require_once "commons/function.php";

// Models
require_once "models/DanhMuc.php";
require_once "models/SanPham.php";

//Controllers
require_once "controllers/admin/DanhMucController.php";
require_once "controllers/admin/SanPhamController.php";


if (isset($_GET["pg"])) {
    $pg = $_GET["pg"];
    $action = $_GET['action'] ?? "list";
    $madm = $_GET['madm'] ?? null;
    switch ($pg) {
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
        case "addd":
            (new SanPhamController)->add();
            break;
        case "storee":
            (new SanPhamController)->store();
            break;
        case "editt":
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
        case 'deletee':
            (new SanPhamController)->delete();
            break;

        default:
            include "./view/client/home.php";
            break;
    }
} else {
    include "./view/client/home.php";
}

