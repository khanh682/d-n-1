<?php
class SanPham
{
    //tạo thuộc tính lưu đối tượng kết nối
    public $conn = null;
    //Hàm khởi tạo
    public function __construct()
    {
        $this->conn = connection();
    }
    //hàm lấy dữ liệu
    public function all()
    {
        $sql = "SELECT * FROM sanpham ORDER BY sanPham_id DESC";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //hàm insert dữ liệu
    public function insert($data)
    {
        $sql = "INSERT INTO sanpham(ten,moTa,gia,soLuong,kichCo,mauSac,ngayTao,ngaySua,anh,madm)
        VALUES(:ten,:moTa,:gia,:soLuong,:kichCo,:mauSac,:ngayTao,:ngaySua,:anh,:madm)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    // hàm update dữ liệu
    public function update($data)
    {
        $sql = "UPDATE sanpham SET sanPham_id=:sanPham_id,ten=:ten,moTa=:moTa,gia=:gia,soLuong=:soLuong,kichCo=:kichCo,mauSac=:mauSac,ngayTao=:ngayTao,ngaySua=:ngaySua,anh=:anh,madm=:madm WHERE sanPham_id=:sanPham_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    // find_one lấy ra 1 bản ghi theo id
    public function find_one($sanPham_id)
    {
        $sql = "SELECT * FROM sanpham WHERE sanPham_id = :sanPham_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['sanPham_id' => $sanPham_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
     // Ẩn sản phẩm bằng cách cập nhật status = 0
     public function ansp($sanPham_id) {
        $sql = "UPDATE sanpham SET status = 0 WHERE sanPham_id =:sanPham_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':sanPham_id', $sanPham_id);
        return $stmt->execute();
    }
    // Hiện sản phẩm bằng cách cập nhật status = 1
     public function hiensp($sanPham_id) {
        $sql = "UPDATE sanpham SET status = 1 WHERE sanPham_id =:sanPham_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':sanPham_id', $sanPham_id);
        return $stmt->execute();
    }
    public function delete($sanPham_id){
        $sql = "DELETE FROM sanpham WHERE sanPham_id=$sanPham_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}
