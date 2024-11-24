
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự án 1</title>
    <link rel="stylesheet" href="./assets/css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <style>

    </style>
</head>

<body>
    <div class="boxcenter">
        <!-- BIGIN HEADER -->
        <header>
            <div class="row mb header_admin">
                <h1>Admin</h1>
            </div>
            <div class="row mb menu">
                <ul>

                    <li><a href="">Trang chủ</a></li>
                    <li><a href="index.php?pg=danhmuc&action=list">Danh mục</a></li>
                    <li><a href="index.php?pg=sanpham&action=list">Hàng hóa</a></li>
                    <li><a href="index.php?pg=nguoidung&action=list">Khách hàng</a></li>
                    <li><a href="">Bình luận</a></li>
                    <li><a href="">Thống kê</a></li>
                </ul>
            </div>
             <!--  <b><?= $username = strstr($email['email'], '@', true); ?></b>  --> <a href="index.php?pg=logout">Đăng xuất</a>
        </header>
    