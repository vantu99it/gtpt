<?php
 include "../include/connect.php ";
 include '../include/function.php';

 $id = $_GET['id'];
$userQr = mysqli_query($conn, "SELECT * FROM  user WHERE id = $id");
$row = mysqli_fetch_assoc($userQr);

if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $phone = $_POST['phone'];
    if (isset($_FILES["image"])) {
        $imagePNG = basename($_FILES["image"]["name"]);
        $imageName = strtolower(vn2en($imagePNG));
        $target_dir = "./image/";
        $target_file = $target_dir . $imageName;
        move_uploaded_file($_FILES["image"]["tmp_name"], "../image/" . $imageName);
    }
    $sql = "UPDATE user SET name= '$name', username= '$username', email = '$email', password = '$password', role = $role, phone = '$phone', avatar = '$target_file' WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    // var_dump($sql);
    // die();
    if ($query) {
        header("Location: user.php");
    } else {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
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
            <div class="change-user">
                <form action="" method="post" enctype="multipart/form-data">
                    <h5>Người dùng</h5>
                    <p>Tên người dùng</p>
                    <input type="text" value="<?php echo $row['name'] ?>" name="name">
                    <p>Tên tài khoản</p>
                    <input type="text" value="<?php echo $row['username'] ?>" name="username">
                    <p>Thư điện tử</p>
                    <input type="email" value="<?php echo $row['email'] ?>" name="email">
                    <p>Mật khẩu</p>
                    <input type="password" value="<?php echo $row['password'] ?>" name="password">
                    <p>Phân quyền</p>
                    <select name="role" id="role_user">
                        <option value="0"<?php if($row['role'] == 0) ?>>Người dùng</option>
                        <option value="1" <?php if($row['role'] == 1) ?> >Admin</option>
                    </select>
                    <p>Điện thoại</p>
                    <input type="number" value="<?php echo $row['phone'] ?>" name="phone">
                    <p>Ảnh đạo diện</p>
                    <input type="file" name="image">
                    <input type="submit" name="capnhat" value="Cập nhật" class="btn-add"></input>
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