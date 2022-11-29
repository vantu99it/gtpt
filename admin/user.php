<?php 
 include "../include/connect.php";
 include '../include/function.php';

    $role = (isset($_SESSION['role']))? $_SESSION['role']:[];
    $checkRole = $role['role'];
    $checkid = $role['id'];

    $userQr = mysqli_query($conn, "SELECT * FROM  user");
    if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $phone = $_POST['phone'];
        if(isset($_FILES["image"])){
            $imagePNG = basename($_FILES["image"]["name"]);
            $imageName = strtolower(vn2en($imagePNG));
            $target_dir = "./image/";
            $target_file = $target_dir . $imageName;
            move_uploaded_file($_FILES["image"]["tmp_name"], "../image/". $imageName);
        }
        $sql = "INSERT INTO user(name, username, email, password, role, phone, avatar) VALUES ('$name','$username','$email', '$password', '$role', '$phone', '$target_file')";
        $query = mysqli_query($conn,$sql);
        if($query){
            header("Location: ./user.php");
        }
        else{
            echo "loi";
        }
        // var_dump($name);
        // die();
    }
    if(isset($_REQUEST['delete'])&&($_REQUEST['delete'])){
        $delete = intval($_GET['delete']);
        $sql = "DELETE FROM user WHERE id = $delete";
        $query = mysqli_query($conn,$sql);
        if($query){
            header("Location: ./user.php");
        }
        else{
            echo "Không thực hiện được!";
        }
    }
    
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
                    <form action="" method="post" enctype="multipart/form-data">
                        <h5>Người dùng</h5>
                        <p>Tên người dùng</p>
                        <input type="text" name = "name">
                        <p>Tên tài khoản</p>
                        <input type="text" name = "username">
                        <p>Thư điện tử</p>
                        <input type="email" name = "email">
                        <p>Mật khẩu</p>
                        <input type="password" name = "password">
                        <p>Phân quyền</p>
                        <select name="role" id="role_user">
                            <option value="0">Người dùng</option>
                            <option value="1">Admin</option>
                        </select>
                        <p>Điện thoại</p>
                        <input type="number" name = "phone">
                        <p>Ảnh đạo diện</p>
                        <input type="file" name = "image">
                        <input type="submit" name="themmoi" value="Thêm" class="btn-add"></input>
                    </form>
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
                            <?php foreach($userQr as $key => $value){?>
                            <tr>
                                <td><?php echo $key + 1?></td>
                                <td><?php echo $value['name'] ?></td>
                                <td><?php echo $value['username'] ?></td>
                                <td><?php echo $value['email'] ?></td>
                                <td><?php $value['password'] ?></td>
                                <td><?php if($value['role'] == 0){
                                    echo "Người dùng";
                                }else{
                                    echo "Admin";
                                }
                                ?></td>
                                <td><?php echo $value['phone'] ?></td>
                                <td><?php echo $value['avatar'] ?></td>
                                <td>
                                    <a class="btn-change-1" href="./edit-user.php?id=<?php echo $value['id']?>">Sửa</a>
                                    <a class="btn-delete" href="./user.php?delete=<?php echo $value['id']?>" onclick="return confirm('Bạn chắc chắn muốn xóa?');">Xóa</a>
                                </td>
                            </tr>
                            <?php }?>
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