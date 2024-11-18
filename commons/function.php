<?php
//hàm connection dùng để kết nối đến CSDL
function connection()
{
    try {
        //Tạo đối tượng kết nối
        $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME . ";port=" . PORT . ";charset=utf8", USERNAME, PASSWORD);
        //Thiết đặt thuộc tính để kiểm soát ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Lỗi kết nối CSDL: " . $e->getMessage();
    }
}

//Hàm để render view
function view($view, $data = [])
{
    //hàm extract để tạo các biến la key theo mảng liên kết như sau:
    //$data=['id'=>1, 'name'=>'nguyễn văn a'] thì khi sử dụng hàm extract sẽ được biến $id=1 và biến $name='nguyễn văn a'
    extract($data);
    include_once "view/$view.php";
}
//hàm dd dùng để debug
function dd($data)
{
    echo "<pre>";
    var_dump($data);
    die;
}
