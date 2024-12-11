<?php

class DonHangController {
    public $Order;

    public function __construct() {
        $this->Order = new DonHang();
    }

    public function showOrderDetails() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tongGia = $_POST['tongGia'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $pttt = $_POST['pttt'];
            $madh = "LOINUNA" . rand(0, 999999);
            $soLuong = $_POST['soluong'];
            $sanPham_id = $_POST['sanpham_id'];
            $nguoiDung_id = $_POST['nguoiDung_id'];
            $gia = $_POST['gia'];
            $Orders = $this->Order->OrderModel($tongGia, $name, $address, $email, $tel, $pttt, $madh, $nguoiDung_id, $soLuong, $sanPham_id, $gia);
            if($Orders){
                header("location:./?pg=ordersuccess");
            }

            // var_dump($_POST); // Debug dữ liệu POST
            // die;
        }
    }
    // hiển thị danh sách đơn hàng
    public function listcart(){
        $nguoiDung_id = $_GET['id'];
        $listcarts = $this->Order->getallcart($nguoiDung_id);
        require_once './view/client/listcart.php';
        // var_dump($listcarts); die;
    }
    // hiển thị danh sách chi tiết đơn hàng
    public function detailcart(){
        $idOrder = $_GET['id'];
        $detailcart = $this->Order->detailcartmodel($idOrder);
        // var_dump($detailcart);die;
        require_once './view/client/detailcart.php';
        
    }
    // cập nhật trạng thái hủy
    public function submitCancel_order(){
        $idOrder = $_POST['idOrder'];
        $trangthai = $_POST['trangThai'];
        $cancel_reason = $_POST['cancel_reason'];
        $updateStatus = $this->Order->updateStatusModel($idOrder, $trangthai, $cancel_reason);

        // var_dump($_POST);die;
    }
}
