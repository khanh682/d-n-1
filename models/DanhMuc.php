<?php
class DanhMuc{
    //tạo thuộc tính lưu đối tượng kết nối
    public $conn = null;
    //Hàm khởi tạo
    public function __construct(){
        $this->conn=connection();
    }

    //hàm lấy dữ liệu
    public function all(){
        $sql = "SELECT * FROM danhmuc ORDER BY madm ASC";
        $stmt =$this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    //hàm insert dữ liệu
    public function insert($data){
        $sql = "INSERT INTO danhmuc(madm,tendm,hinhanh) VALUES(:madm,:tendm,:hinhanh)";
        $stmt =$this->conn->prepare($sql);
        $stmt->execute($data);
    }
    //hàm update dữ liệu
    public function update($data){
        $sql = "UPDATE danhmuc SET madm=:madm,tendm=:tendm,hinhanh=:hinhanh WHERE madm=:madm";
        $stmt =$this->conn->prepare($sql);
        $stmt->execute($data);
    }

    // Ẩn danh mục bằng cách cập nhật status = 0
    public function andm($madm) {
        $sql = "UPDATE danhmuc SET status = 0 WHERE madm = :madm";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':madm', $madm);
        return $stmt->execute();
    }
     // Ẩn danh mục bằng cách cập nhật status = 1
     public function hiendm($madm) {
        $sql = "UPDATE danhmuc SET status = 1 WHERE madm = :madm";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':madm', $madm);
        return $stmt->execute();
    }

    // Lấy ra 1 bản ghi theo id
    public function find_one($madm){
        $sql = "SELECT * FROM danhmuc WHERE madm =$madm";
        $stmt =$this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}