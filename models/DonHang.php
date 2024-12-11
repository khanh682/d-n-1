<?php
class DonHang {
    public $conn = null;

    // Hàm khởi tạo kết nối CSDL
    public function __construct()
    {
        $this->conn = connection(); // Kết nối đến database
    }

    // Hàm xử lý đơn hàng
    public function OrderModel($tongGia, $name, $address, $email, $tel, $pttt, $madh, $nguoiDung_id, $soLuong, $sanPham_id, $gia) {
        try {
            // Chèn dữ liệu vào bảng `donhang`
            $stmt = $this->conn->prepare("
                INSERT INTO donhang (madh, tongGia, pttt, name, address, email, tel, nguoiDung_id, ngayTao) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())
            ");
            $stmt->execute([$madh, $tongGia, $pttt, $name, $address, $email, $tel, $nguoiDung_id]);

            // Lấy ID của đơn hàng vừa được thêm
            $OrderId = $this->conn->lastInsertId();

            // Kiểm tra nếu dữ liệu chi tiết đơn hàng là mảng
            if (is_array($sanPham_id) && is_array($soLuong) && is_array($gia)) {
                foreach ($sanPham_id as $index => $sanpham_id) {
                    // Lấy số lượng và giá tại vị trí tương ứng
                    $quantity = $soLuong[$index] ?? 0;
                    $price = $gia[$index] ?? 0;

                    // Tính thành tiền cho từng sản phẩm
                    $thanhTien = $quantity * $price;

                    // Chèn dữ liệu vào bảng `chitietdonhang`
                    $sql = "
                        INSERT INTO chitietdonhang (donHang_id, sanPham_id, soLuong, gia, thanhTien) 
                        VALUES (:donHang_id, :sanPham_id, :soLuong, :gia, :thanhTien)
                    ";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute([
                        'donHang_id' => $OrderId,
                        'sanPham_id' => $sanpham_id,
                        'soLuong' => $quantity,
                        'gia' => $price,
                        'thanhTien' => $thanhTien
                    ]);
                }
            } else {
                throw new Exception("Dữ liệu đầu vào không hợp lệ: sanPham_id, soLuong, và gia phải là mảng.");
            }
            unset($_SESSION['giohang']);
            return true;
        } catch (Exception $e) {
            echo "Lỗi khi chèn đơn hàng: " . $e->getMessage();
            return false;
        }
    }
    public function all(){
        $sql= "SELECT * FROM donhang ORDER BY donHang_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function detail($donHang_id){
        $sql = "SELECT 
        donhang.name,
        donhang.address,
        donhang.email,
        donhang.tel,
        donhang.madh,
        chitietdonhang.soLuong,
        chitietdonhang.gia,
        chitietdonhang.thanhTien,
        sanpham.anh,
        sanpham.ten,
        donhang.donHang_id
        FROM chitietdonhang 
        JOIN sanpham ON chitietdonhang.sanPham_id = sanpham.sanPham_id
        JOIN donhang ON chitietdonhang.donHang_id = donhang.donHang_id
        WHERE chitietdonhang.donHang_id =:donHang_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['donHang_id'=>$donHang_id]);
        return $stmt->fetchAll();
    }
    public function OrderModels($donHang_id, $status) {
        try {
        $sql = "UPDATE donhang SET status = :status WHERE donHang_id = :donHang_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['donHang_id' => $donHang_id, 'status' => $status]);
        return true;
        }catch(PDOException $e){
            echo "Error: ". $e->getMessage();
            return false;
        }
    }
    public function getallcart($nguoiDung_id){
        $sql= "SELECT * FROM donhang WHERE nguoiDung_id =:nguoiDung_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['nguoiDung_id'=>$nguoiDung_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function detailcartmodel($idOrder){
        $sql = "SELECT 
        donhang.name,
        donhang.address,
        donhang.email,
        donhang.tel,
        donhang.madh,
        chitietdonhang.soLuong,
        chitietdonhang.gia,
        chitietdonhang.thanhTien,
        sanpham.anh,
        sanpham.ten,
        donhang.donHang_id,
        donhang.status,
        donhang.lyDoHuy
        FROM chitietdonhang 
        JOIN sanpham ON chitietdonhang.sanPham_id = sanpham.sanPham_id
        JOIN donhang ON chitietdonhang.donHang_id = donhang.donHang_id
        WHERE chitietdonhang.donHang_id =:donHang_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['donHang_id'=>$idOrder]);
        return $stmt->fetchAll();
    }
    public function updateStatusModel($idOrder, $trangthai, $cancel_reason){
        try {
            $sql = "UPDATE donhang SET status=:status, lyDoHuy=:lyDoHuy WHERE donHang_id=:donHang_id";
            $stmt =$this->conn->prepare($sql);
            $stmt->execute([
            'donHang_id'=> $idOrder,
            'status'=> $trangthai,
            'lyDoHuy'=>$cancel_reason
        ]);
            return true;
         } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
}
