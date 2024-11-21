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