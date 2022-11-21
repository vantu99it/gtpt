<?php 
 include "../include/connect.php";
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
                <div class="add-district">
                    <form action="" method="post">
                        <h5>Khu vực</h5>
                        <p>Tên khu vực</p>
                        <input type="text">
                        <button class="btn-add">Thêm</button>
                    </form>
                </div>
                <div class="change-district">
                    <h5>Người dùng</h5>
                    <p>Tên khu vực</p>
                    <input type="text">
                    <button class="btn-add">cập nhật</button>
                </div>
                <div class="district">
                    <form action="#">
                        <h5>Danh sách khu vực</h5>
                        <table class="show-district">
                            <tr class="title">
                                <td>ID</td>
                                <td>Tên khu vực</td>
                                <td class="change-row change-row-manager">quản lý</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>khuc vực 1</td>
                                <td class="change-row">
                                    <button class="btn-change">Sửa</button>
                                    <button class="btn-delete">Xóa</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>khu vực 2</td>
                                <td class="change-row">
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