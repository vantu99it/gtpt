<?php 
include 'include/connect.php';
include 'include/function.php';
$display = '';
$user = (isset($_SESSION['username']))? $_SESSION['username']:[];
$username = $user['username'];
$sqlCheck = "SELECT * FROM user WHERE username = '$username'";
$queryCheck = mysqli_query($conn, $sqlCheck);
$data = mysqli_fetch_assoc($queryCheck);
$usernameVl = $data['username'];
$nameVl = $data['name'];
$emailVl = $data['email'];
$phoneVl = $data['phone'];
$avatar = $data['avatar'];

if(isset($_POST['fullname'])){
  
  $fullName= $_POST['fullname'];
  $email= $_POST['email'];
  $phone= $_POST['phone'];

    if($fullName != $data['name'] or $email != $data['email'] or $phone != $data['phone']){
    $sql = "UPDATE user SET name = '$fullName', email = '$email', phone = '$phone' WHERE username = '$username'";
    $query = mysqli_query($conn, $sql);
    if($query){
        $display = '1';
    }
  }
}
if(isset($_POST['change'])){
    $uploadOk = 1;
    $imagePNG = basename($_FILES["avtImage"]["name"]);
    $imageName = strtolower(vn2en($imagePNG));
    $imageFileType = pathinfo($imageName,PATHINFO_EXTENSION);
    // Upload
    $target_dir = "image/";
    $target_file = $target_dir . $imageName;
    // kiểm tra ảnh có tên đã tồn tại hay chưa
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }
    // kiểm tra size ảnh
    if ($_FILES["avtImage"]["size"] > 1000000) {
        $uploadOk = 0;
    }
    // check các định dạng file ảnh 
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $uploadOk = 0;
    }
    if($uploadOk == 0){
        $err = "Không thể tải ảnh lên!";
    }
    else{
        move_uploaded_file($_FILES["avtImage"]["tmp_name"], $target_file);
        $sqlAvt = "UPDATE user SET avatar = '$target_file' WHERE username = '$username'";
        $queryAvt = mysqli_query($conn, $sqlAvt);
        header('location: personal-page.php');
    }

}

if(isset($_POST['close'])){
    $display = '0';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang cá nhân</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./libs/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php include 'index.php' ?>;
    <div id="main">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <section class="sidebar">
                        <?php if (isset($nameVl)) { ?>
                            <div class="account">
                                <div class="account__avt">
                                    <i class="fa-solid fa-user"></i>
                                    <?php if($avatar != ""){ ?>
                                        <img src="<?php echo $avatar?>" alt="avata" />
                                    <?php } ?>
                                </div>
                                <div class="account__name">
                                    <p class="account__fullname" style="color:#000"><?php echo $nameVl ?></p>
                                    <div class="account__menu">
                                        <ul>
                                            <li><a href="">Hồ sơ của tôi</a></li>
                                            <li><a href="logout.php">Đăng xuất</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <ul class="sidebar_menu">
                            <li class="sidebar__list">
                                <i class="fa-solid fa-user"></i>
                                <a href="">Hồ sơ</a>
                            </li>
                            <li class="sidebar__list">
                            <i class="fa-solid fa-lock"></i>
                                <a href="">Thay đổi mật khẩu</a>
                            </li>
                        </ul>
                    </section>
                </div>
                <div class="col-9 col-9--white">
                    <section class="infor">
                        <h2 class="infor__title">Hồ sơ của tôi</h2>
                        <p class="infor__text">Quản lý thông tin cá nhân của bạn</p>
                        <div class="infor-detail flex">
                            <div class="infor-detail__form">
                                <form action="" method="post">
                                    <div class="infor-detail__list">
                                        <div class="infor-list flex">
                                            <div class="infor-list__title">
                                                <lable>Tên đăng nhập</lable>
                                            </div>
                                            <div class="infor-list__input">
                                                <input type="text" name="username" id="" value="<?php echo $user['username'] ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="infor-detail__list">
                                        <div class="infor-list flex">
                                            <div class="infor-list__title">
                                                <lable>Tên đầy đủ</lable>
                                            </div>
                                            <div class="infor-list__input">
                                                <input type="text" name="fullname" id="" value="<?php echo $nameVl ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="infor-detail__list">
                                        <div class="infor-list flex">
                                            <div class="infor-list__title">
                                                <lable>Email</lable>
                                            </div>
                                            <div class="infor-list__input">
                                                <input type="email" name="email" id="" value="<?php echo $emailVl ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="infor-detail__list">
                                        <div class="infor-list flex">
                                            <div class="infor-list__title">
                                                <lable>Số điện thoại</lable>
                                            </div>
                                            <div class="infor-list__input">
                                                <input type="tel" name="phone" id="" value="<?php echo $phoneVl ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" value="Lưu" class="form__btn button">
                                    
                                </form>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" method="post" class="form--flex">
                                <div class="infor-detail__avt">
                                    <div class="account__avt image">
                                        <i class="fa-solid fa-user"></i>
                                        <?php if($avatar != ""){ ?>
                                            <img src="<?php echo $avatar?>" alt="avata" />
                                        <?php } ?>
                                    </div>
                                    <div class="infor-detail_upload">
                                        <input type="file" name="avtImage" >
                                    </div>
                                    <div class="has__error">
                                        <span><?php echo(isset($err))?$err:''?></span>
                                    </div>
                                    <div >
                                        <input type="submit" value="Thay đổi" name ="change" class="btn__img" >
                                    </div>
                                    <div class="desc_img">
                                        <p>Dụng lượng file tối đa 1 MB</p>
                                        <p>Định dạng:.JPEG, .PNG</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <?php if($display == 1) { ?>
            <form action="" method="post">
                <div class="notify js-modal__notify" style = "display: block">
                    <p class="notify__title">Thông tin của bạn đã được cập nhật</p>
                    <input type="submit" value="OK" class="notify_button" name = 'close'>
                </div>
            </form>
            
            <?php } else {?>
                <form action="" method="post">
                    <div class="notify js-modal__notify" style = "display: none">
                        <p class="notify__title">Thông tin của bạn đã được cập nhật</p>
                        <input type="submit" value="OK" class="notify_button" name = 'close'>
                        
                    </div>
                </form>
            <?php } ?>
            
        </div>
        
    </div>
    <script src="script.js"></script>
</body>

</html>