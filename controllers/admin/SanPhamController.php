<?php
class SanPhamController
{
    public function __construct(){
        if(!isset($_SESSION['email'])){
            header("Location: index.php?pg=login");
            exit;
        }
    }
    //Hiển thị dữ liệu
    public function list()
    {
        //Lấy dữ liệu sanpham từ models
        $sanphams = (new sanpham)->all();
        //render view
        view("admin/sanpham/list", ['sanphams' => $sanphams]);
    }
    //Thêm dữ liệu
    public function add()
    {
        //render view
        view("admin/sanpham/add");
    }
    //Lưu dữ liệu được thêm và data
    public function store()
    {
        $data = $_POST;
        $anh = ""; //Nếu người dùng không nhập ảnh
        $file_anh = $_FILES['anh'];
        if ($file_anh['size'] > 0) {
            $anh = "assets/img/" . $file_anh['name'];
            //upload ảnh lên website
            move_uploaded_file($file_anh['tmp_name'], $anh);
        }
        $data['anh'] = $anh;
        (new SanPham)->insert($data);
        header("Location: index.php?pg=sanpham&action=list");
        die;
    }
    //Cập nhật dữ liệu
    public function edit()
    {
        // Check for POST request (updating product)
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            $file_anh = $_FILES['anh'];
            if ($file_anh['size'] > 0) {
                $anh = "assets/img/" . $file_anh['name'];
                $data['anh'] = $anh;
                move_uploaded_file($file_anh['tmp_name'], $anh);
            }
            (new SanPham)->update($data);
            header("Location: index.php?pg=sanpham&action=list");
            die;
        }

        // Fetch product data for editing
        $sanPham_id = $_GET['sanPham_id'] ?? null;
        if (!$sanPham_id) {
            die("Invalid product ID.");
        }

        $sanpham = (new SanPham)->find_one($sanPham_id);
        if (!$sanpham) {
            die("Product not found.");
        }

        // Pass data to view
        view("admin/sanpham/edit", ['sanpham' => $sanpham]);
    }
    // Hiển thị tất cả các sản phẩm có trạng thái là hiển thị
    public function hien()
    {
        $hiensp = (new SanPham)->all();
        include "./view/admin/sanpham/list.php";
    }
    // Ẩn một sản phẩm cụ thể
    public function an($sanPham_id)
    {
        $ansp = (new SanPham)->ansp($sanPham_id);
        header("Location: index.php?pg=sanpham&action=list");
        exit;
    }
    // Hiển thị một sản phẩm cụ thể
    public function show($sanPham_id)
    {
        $hiensp = (new SanPham)->hiensp($sanPham_id);
        header("Location: index.php?pg=sanpham&action=list");

        exit;
    }
    //Xoá dữ liệu
    public function delete()
    {
        //lấy thông tin id trên URL
        $sanPham_id = $_GET['sanPham_id'];
        //xoá dữ liệu
        (new SanPham)->delete($sanPham_id);
        //chuyển hướng
        header("Location: index.php?pg=sanpham&action=list");
        die;
    }
}
