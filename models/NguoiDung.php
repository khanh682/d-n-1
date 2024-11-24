<?php
class NguoiDung
{
    //Tạo thuộc tính lưu đối tượng kết nối
    public $conn = null;
    //Hàm khởi tạo
    public function __construct()
    {
        $this->conn = connection();
    }
    //Hàm lấy dữ liệu
    public function all()
    {
        $sql = "SELECT * FROM nguoidung ORDER BY nguoiDung_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //hàm insert dữ liệu
    public function insert($data)
    {
        $sql = "INSERT INTO nguoidung(ten,email,password,ngayTao,ngaySua,soDienThoai,role)
        VALUES(:ten,:email,:password,:ngayTao,:ngaySua,:soDienThoai,:role)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    //hàm update dữ liệu
    public function update($data){
        $sql = "UPDATE nguoidung SET nguoiDung_id=:nguoiDung_id,ten=:ten,email=:email,password=:password,ngayTao=:ngayTao,ngaySua=:ngaySua,soDienThoai=:soDienThoai,role=:role WHERE nguoiDung_id=:nguoiDung_id";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute($data);
    }
    //hàm delete dữ liệu
    public function delete($nguoiDung_id){
        $sql = "DELETE FROM nguoidung WHERE nguoiDung_id=$nguoiDung_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
    //find_one lấy ra 1 user
    public function find_one($nguoiDung_id){
        $sql = "SELECT * FROM nguoidung WHERE nguoiDung_id=$nguoiDung_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    /* 
    @method getUser: để lấy thông tin tài khoản theo tài khoản
    @param $taikhoan: tên tài khoản
    */
    public function getUser($email){
        $sql = "SELECT * FROM nguoidung WHERE email=:email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
