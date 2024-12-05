<?php
function taodonhang($madh, $tongGia, $pttt, $name, $address, $email, $tel, $nguoiDung_id = null) {
    $conn = connection();
    
    $tongGia = floatval($tongGia);

    $sql = "INSERT INTO donhang (madh, tongGia, pttt, name, address, email, tel, nguoiDung_id) 
            VALUES (:madh, :tongGia, :pttt, :name, :address, :email, :tel, :nguoiDung_id)";
    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':madh' => $madh,
        ':tongGia' => $tongGia,
        ':pttt' => $pttt,
        ':name' => $name,
        ':address' => $address,
        ':email' => $email,
        ':tel' => $tel,
        ':nguoiDung_id' => $nguoiDung_id
    ]);

    $last_id = $conn->lastInsertId();
    return $last_id;
}
//  // $item=[$sanPham_id,$anh,$ten,$gia,$sl];
function addtocart($iddh, $sanPham_id, $anh, $ten, $dongia, $soluong) {
    $conn = connection();

    $soluong = floatval($soluong);

    $sql = "INSERT INTO giohang (iddh, sanPham_id, anh, ten, dongia, soluong) 
            VALUES (:iddh, :sanPham_id, :anh, :ten, :dongia, :soluong)";
    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':iddh' => $iddh,
        ':sanPham_id' => $sanPham_id,
        ':anh' => $anh,
        ':ten' => $ten,
        ':dongia' => $dongia,
        ':soluong' => $soluong,
       
    ]);
}
function getshowcart($iddh)
{
    $conn = connection();
    $stmt = $conn->prepare("SELECT * FROM giohang WHERE iddh = :iddh");
    $stmt->bindParam(':iddh', $iddh, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function getorderinfo($iddh)
{
    $conn = connection();
    $stmt = $conn->prepare("SELECT * FROM donhang WHERE donHang_id = :iddh");
    $stmt->bindParam(':iddh', $iddh, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

class DonHang{
    public $conn = null;
    //Hàm khởi tạo
    public function __construct()
    {
        $this->conn = connection();
    }
    // hàm lấy dữ liệu
    public function all(){
       $sql = "SELECT * FROM donhang ORDER BY donHang_id DESC";
       $stmt = $this->conn->prepare($sql);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // hàm insert dữ liệu
    public function insert($data){
        $sql = "INSERT INTO donhang (madh, tongGia, pttt, name, address, email, tel, nguoiDung_id) VALUES (:madh, :tongGia, :pttt, :name, :address, :email, :tel, :nguoiDung_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    // hàm update dữ liệu
    public function update($data){
        $sql = "UPDATE donhang SET madh=:madh, tongGia=:tongGia, pttt=:pttt, name=:name, address=:address, email=:email, tel=:tel, nguoiDung_id=:nguoiDung_id WHERE donHang_id=:donHang_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
public function delete($donHang_id){
    $sql = "DELETE FROM books WHERE donHang_id=$donHang_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
}
}
?>