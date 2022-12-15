<?php 
include 'include/connect.php';
include 'include/function.php';


$role = (isset($_SESSION['role']))? $_SESSION['role']:[];
$checkRole = $role['role'];

$user = (isset($_SESSION['username']))? $_SESSION['username']:[];
$username = $user['username'];
$display = '';
if(isset($_POST['change'])&&$_POST['change']){
    $pass = $_POST['pass'];
    $newPass = $_POST['newpass'];
    $rePass = $_POST['repass'];

    $err = [];
    if(empty($pass)){
    $err['pass'] = '* Bạn chưa nhập mật khẩu';
    }
    if(empty($newPass)){
    $err['newpass'] = '* Bạn chưa nhập mật khẩu';
    }
    if($newPass != $rePass){
    $err['rpassword'] = '* Mật khẩu nhập lại chưa đúng';
    }
    if(empty($err)){
        $sqlCheck = "SELECT * FROM user WHERE username = '$username'";
        $queryCheck = mysqli_query($conn, $sqlCheck);
        $data = mysqli_fetch_assoc($queryCheck);
        $check = mysqli_num_rows($queryCheck);
        if($check == 1){
            $checkPass = password_verify($pass, $data['password']);
            if($checkPass=='true'){
                $passHash = password_hash($newPass,PASSWORD_DEFAULT);
                $sqlUpade = "UPDATE user SET password = '$passHash' WHERE  username = '$username'";
                $queryUpade = mysqli_query($conn,  $sqlUpade);
                if($queryUpade){
                    $display = '1';
                }
            }else{
                $err['pass'] = 'Mật khẩu cũ chưa chính xác';
            }
        }
        
    }

}
if(isset($_POST['close'])){
    $display = '';
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
    <link rel="stylesheet" href="./style/style.css" />
</head>

<body>
    <?php include 'header.php' ?>;
    <div id="main">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <section class="sidebar">
                        <?php if (isset($nameVl)) { ?>
                            <div class="account">
                                <div class="account__avt">
                                <?php if($avatar != ""){ ?>
                                    <img src="<?php echo $avatar?>" alt="avata" />
                                <?php } else{?>
                                    <i class="fa-solid fa-user"></i>
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
                                <a href="./personal-page.php">Hồ sơ</a>
                            </li>
                            <li class="sidebar__list">
                                <i class="fa-solid fa-lock"></i>
                                <a href="./personal-repass.php">Thay đổi mật khẩu</a>
                            </li>
                            
                            <?php if(isset($checkRole)&& $checkRole == 1){ ?>
                            <li class="sidebar__list">
                                <i class="fa-solid fa-screwdriver-wrench"></i>
                                <a href="./admin/post.php">Trang quản trị</a>
                            </li>
                            <?php }else{?>
                                <li class="sidebar__list">
                                    <i class="fa-solid fa-folder-plus"></i>
                                    <a href="./admin/post.php">Đăng bài</a>
                                </li>
                            <?php }?>
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
                                                <lable>Mật khẩu cũ</lable>
                                            </div>
                                            <div class="infor-list__input">
                                                <input type="password" name="pass" id="">
                                            </div>
                                            <div class="has__error">
                                                <p><?php echo(isset($err['pass']))?$err['pass']:''?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="infor-detail__list">
                                        <div class="infor-list flex">
                                            <div class="infor-list__title">
                                                <lable>Mật khẩu mới</lable>
                                            </div>
                                            <div class="infor-list__input">
                                                <input type="password" name="newpass" id="">
                                            </div>
                                            <div class="has__error">
                                                <p><?php echo(isset($err['newpass']))?$err['newpass']:''?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="infor-detail__list">
                                        <div class="infor-list flex">
                                            <div class="infor-list__title">
                                                <lable>Nhập lại mật khẩu</lable>
                                            </div>
                                            <div class="infor-list__input">
                                                <input type="password" name="repass" id="">
                                            </div>
                                            <div class="has__error">
                                                <p><?php echo(isset($err['rpassword']))?$err['rpassword']:''?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" name="change" value="Lưu" class="form__btn button">
                                    
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <?php if($display == 1) { ?>
            <form action="" method="post">
                <div class="notify js-modal__notify" style = "display: block">
                    <p class="notify__title">Mật khẩu đã thay đổi thành công</p>
                    <input type="submit" value="OK" class="notify_button" name = 'close'>
                </div>
            </form>
            
            <?php } else {?>
                <form action="" method="post">
                    <div class="notify js-modal__notify" style = "display: none">
                        <p class="notify__title">Có lỗi xảy ra, vui lòng xem lại!</p>
                        <input type="submit" value="OK" class="notify_button" name = 'close'>
                        
                    </div>
                </form>
            <?php } ?>
    </div>
    <script src="script.js"></script>
</body>

</html>