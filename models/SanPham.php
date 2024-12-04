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
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getLatestProducts()
{
    $sql = "SELECT * FROM sanpham ORDER BY sanPham_id DESC LIMIT 8";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    //lấy 4 sản phẩm có nhiều lượt xem nhất
    public function getMostViewedProducts()
{
    $sql = "SELECT * FROM sanpham ORDER BY luotxem DESC LIMIT 4"; // Sắp xếp theo lượt xem giảm dần
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về 4 sản phẩm nhiều lượt xem nhất
}

    //lấy sản phẩm theo danh mục
    public function sanPhamInDanhMuc($madm){
        $sql = "SELECT * FROM sanpham WHERE madm = :madm ORDER BY sanPham_id DESC LIMIT 4";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':madm', $madm, PDO::PARAM_INT); // Ràng buộc biến với giá trị
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
    //Cập nhật lượt xem
    public function updateLuotxem($sanPham_id){
        $sql = "UPDATE sanpham SET luotxem = luotxem + 1 WHERE sanPham_id =$sanPham_id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }
}
