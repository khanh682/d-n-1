<?php
// class DonHangController{
//     //Hiển thi dữ liệu
//     public function list(){
//     //Lấy dữ liệu từ models
//     $donhangs = (new DonHang)->all();
//     //render view
//     view("admin/donhang/list",['donhangs'=>$donhangs]);
//     }
// }
class OrderController{
    public $OrderAdmin;

    public function __construct() {
        $this->OrderAdmin = new DonHang();
    }
    public function list(){
        $donhangs = (new DonHang)->all();
        view("admin/donhang/list", ['donhangs' => $donhangs]);
    }
    public function detail($donHang_id){
        $donHangDetail = (new DonHang)->detail($donHang_id);
        // var_dump($donHangDetail);die;
        view("admin/donhang/detailcart", ['donHangDetail' => $donHangDetail]);
    }
    public function updateStatus() {
        // Kiểm tra phương thức POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $donHang_id = $_POST['idDonHang'] ?? null;
            $status = $_POST['status'] ?? null;
    
            // Danh sách trạng thái hợp lệ
            $validStatuses = ["Chờ vận chuyển", "Đang giao", "Đã giao"];
    
            // Kiểm tra ID đơn hàng và trạng thái
            if (!$donHang_id || !$status) {
                echo "Dữ liệu không hợp lệ! Vui lòng kiểm tra lại.";
                return;
            }
    
            if (!in_array($status, $validStatuses)) {
                echo "Trạng thái không hợp lệ!";
                return;
            }
    
            // Gọi model để cập nhật trạng thái
            $updateStatusOrder = $this->OrderAdmin->OrderModels($donHang_id, $status);
    
            // Kiểm tra kết quả
            if ($updateStatusOrder) {
                echo "Cập nhật trạng thái thành công!";
                header("Location: index.php?pg=orderList"); // Điều hướng sau khi cập nhật
                exit();
            } else {
                echo "Có lỗi xảy ra khi cập nhật trạng thái.";
            }
        } else {
            echo "Phương thức không được hỗ trợ.";
        }
    }
    
}

?>