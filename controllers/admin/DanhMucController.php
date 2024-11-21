<?php
class DanhMucController
{

    //Hiển thị dữ liệu
    public function list()
    {
        //Lấy dữ liệu danh mục từ models
        $danhmucs = (new DanhMuc)->all();
        //render view
        view("admin/danhmuc/list", ['danhmucs' => $danhmucs]);
    }
    // Hiển thị tất cả các danh mục có trạng thái là hiển thị
    public function hien()
    {
        $hiendm = (new DanhMuc)->all();
        include "./view/admin/danhmuc/list.php";
    }

    // Ẩn một danh mục cụ thể
    public function an($madm)
    {
        $andm = (new DanhMuc)->andm($madm);
        header("Location: index.php?pg=danhmuc&action=list");
        exit;
    }
    // Hiển thị một danh mục cụ thể
    public function show($madm)
    {
        $hiendm = (new DanhMuc)->hiendm($madm);
        header("Location: index.php?pg=danhmuc&action=list");
        exit;
    }

    //hàm thêm dữ liệu
    public function add()
    {
        // render view
        view("admin/danhmuc/add");
    }
    //Lưu dữ liệu được thêm vào database
    public function store()
    {
        $data = $_POST;
        $hinhanh = ""; //nếu người dùng không nhập ảnh
        $file_anh = $_FILES['hinhanh'];
        if ($file_anh['size'] > 0) {
            $hinhanh = "assets/img/" . $file_anh['name'];
            //upload ảnh lên website
            move_uploaded_file($file_anh['tmp_name'], $hinhanh);
        }

        $data['hinhanh'] = $hinhanh; //chúng ta ko thêm ảnh
        (new DanhMuc)->insert($data);
        header("Location: index.php?pg=danhmuc&action=list");
        die;
    }
    //Cập nhật dữ liệu
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            $file_anh = $_FILES['hinhanh'];
            if ($file_anh['size'] > 0) {
                $hinhanh = "assets/img/" . $file_anh['name'];
                $data['hinhanh'] = $hinhanh; //Cập nhật ảnh mới vào data
                move_uploaded_file($file_anh['tmp_name'], $hinhanh); //upload ảnh lên website
            }
            //Cập nhâp
            (new DanhMuc)->update($data);
            header("Location: index.php?pg=danhmuc&action=list");
        }
        //lấy thông tin id trên URL
        $madm = $_GET['madm'];
        //lấy ra dữ liệu
        $danhmuc = (new DanhMuc)->find_one($madm);
        //render view
        view("admin/danhmuc/edit", ['danhmuc' => $danhmuc]);
    }
    public function delete()
    {
        // Kiểm tra yêu cầu POST và lấy dữ liệu từ form
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['madm'])) {
            $madmList = $_POST['madm'];

            $danhMucModel = new DanhMuc();

            foreach ($madmList as $madm) {
                $danhMucModel->deleteDanhMuc($madm);
            }

            // Quay lại trang danh sách
            header("Location: index.php?pg=danhmuc&action=list");
            exit();
        }
    }
}
