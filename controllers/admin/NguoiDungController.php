<?php
class NguoiDungController{
    
 //Hiển thị dữ liệu
 public function list()
 {
     //Lấy dữ liệu danh mục từ models
     $nguoidungs = (new NguoiDung)->all();
     //render view
     view("admin/nguoidung/list", ['nguoidungs' => $nguoidungs]);
 }
 //hàm xoá dữ liệu
 public function delete(){
    //lấy thông tin id trên URL
    $nguoiDung_id = $_GET['nguoiDung_id'];
    //Xoá dữ liệu
    (new NguoiDung)->delete($nguoiDung_id);
    header("location: index.php?pg=nguoidung");
    die;
 }
 //hàm thêm dữ liệu
 public function add(){
    // render view
    view("admin/nguoidung/add");
 }
 //Lưu dữ liệu được thêm vào database
 public function store(){
    $data = $_POST;
    (new NguoiDung)->insert($data);
    header("Location: index.php?pg=nguoidung");
    die;
 }
 
 public function login() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Lấy thông tin người dùng từ database
        $nguoidung = (new NguoiDung)->getUser($email);

        if ($nguoidung) {
            // Kiểm tra mật khẩu
            if ($nguoidung['password'] == $password) {
                // Lưu thông tin vào session
                $_SESSION['email'] = $nguoidung;
                $_SESSION['name'] = $nguoidung['ten']; // Lưu tên người dùng
                $_SESSION['role'] = $nguoidung['role']; // Lưu vai trò (role)

                // Điều hướng người dùng
                if ($nguoidung['role'] == 0) {
                    header('location: index.php');
                } else if ($nguoidung['role'] == 1) {
                    header('location: index.php?pg=danhmuc');
                }
                die;
            } else {
                $errors['email'] = "Tài khoản hoặc mật khẩu không đúng";
            }
        } else {
            $errors['email'] = "Tài khoản hoặc mật khẩu không đúng";
        }
    }

    // Hiển thị trang đăng nhập cùng thông báo lỗi (nếu có)
    view("client/myaccount/login", [
        'errors' => $errors ?? '',
        'email' => $email ?? ''
    ]);
}

 public function logout(){
    unset($_SESSION['email']);
    unset($_SESSION['name']);
    unset($_SESSION['role']);
    header("Location: index.php?pg=login");
    die;
 }
 //Cập nhật dữ liệu
 public function edit(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = $_POST;
        //cập nhật
        (new NguoiDung)->update($data);

    }
    //lấy thông tin id user trên URL
    $nguoiDung_id =$_GET['nguoiDung_id'];
    //lấy dữ liệu user
    $nguoidung = (new NguoiDung)->find_one($nguoiDung_id);
    //render view
    view("admin/nguoidung/edit",['nguoidung'=>$nguoidung]);
    
 }
 
}

?>