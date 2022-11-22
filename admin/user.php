<?php 
 include "../include/connect.php";

    $role = (isset($_SESSION['role']))? $_SESSION['role']:[];
    $checkRole = $role['role'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../libs/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="./style/style.css">
    <title>Admin</title>
</head>
<body>
    <div class="footer_admin">
        
        <!-- header -->
        <?php include "./include/header.php" ?>
        <!-- /header -->
            <div class="container">
                <div class="add-user">
                    <form action="" method="post">
                        <h5>Người dùng</h5>
                        <p>Tên người dùng</p>
                        <input type="text">
                        <p>Tên tài khoản</p>
                        <input type="text">
                        <p>Thư điện tử</p>
                        <input type="text">
                        <p>Mật khẩu</p>
                        <input type="text">
                        <p>Phân quyền</p>
                        <input type="text">
                        <p>Điện thoại</p>
                        <input type="text">
                        <p>Ảnh đạo diện</p>
                        <input type="file">
                        <button class="btn-add">Thêm</button>
                    </form>
                </div>
                <div class="change-user">
                    <h5>Người dùng</h5>
                    <p>Tên người dùng</p>
                    <input type="text">
                    <p>Tên tài khoản</p>
                    <input type="text">
                    <p>Thư điện tử</p>
                    <input type="text">
                    <p>Mật khẩu</p>
                    <input type="text">
                    <p>Phân quyền</p>
                    <input type="text">
                    <p>Điện thoại</p>
                    <input type="text">
                    <p>Ảnh đạo diện</p>
                    <input type="file">
                    <button class="btn-add">cập nhật</button>
                </div>
                <div class="user">
                    <form action="#">
                        <h5>Danh sách người dùng</h5>
                        <table class="show-user">
                            <tr class="title">
                                <td>ID</td>
                                <td>Tên người dùng</td>
                                <td>Tên tài khoản</td>
                                <td>Thư điện tử</td>
                                <td>Mật khẩu</td>
                                <td>Phân quyền</td>
                                <td>Điện thoại</td>
                                <td>Ảnh đại diện</td>
                                <td>Quản lý</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Thành</td>
                                <td>thanhmblue</td>
                                <td>nguyenbathanh88888@gmail.com</td>
                                <td>123456</td>
                                <td>1</td>
                                <td>0123456789</td>
                                <td>image</td>
                                <td>
                                    <button class="btn-change">Sửa</button>
                                    <button class="btn-delete">Xóa</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Thành</td>
                                <td>thanhmblue</td>
                                <td>nguyenbathanh88888@gmail.com</td>
                                <td>123456</td>
                                <td>0</td>
                                <td>0123456789</td>
                                <td>image</td>
                                <td>
                                    <button class="btn-change">Sửa</button>
                                    <button class="btn-delete">Xóa</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="javascript.js"></script>
</body>
</html>