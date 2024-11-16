<?php
session_start();
//Commons
require_once "commons/env.php";
require_once "commons/function.php";

// Models
require_once "models/DanhMuc.php";

//Controllers
require_once "controllers/admin/DanhMucController.php";


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
            }elseif($action == 'show' && $madm) {
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
        default:
            include "./view/client/home.php";
            break;
    }
} else {
    include "./view/client/home.php";
}
