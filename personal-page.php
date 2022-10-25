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
                        <?php if (isset($name['name'])) { ?>
                            <div class="account">
                                <div class="account__avt">
                                    <i class="fa-solid fa-user"></i>
                                    <img src="./image/avt.jpg" alt="avata" />
                                </div>
                                <div class="account__name">
                                    <p class="account__fullname" style="color:#000"><?php echo $name['name'] ?></p>
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
                                <i class="fa-solid fa-user"></i>
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
                                                <input type="text" name="" id="" value="admin" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="infor-detail__list">
                                        <div class="infor-list flex">
                                            <div class="infor-list__title">
                                                <lable>Tên đầy đủ</lable>
                                            </div>
                                            <div class="infor-list__input">
                                                <input type="text" name="" id="" value="Nguyễn Văn Tú">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="infor-detail__list">
                                        <div class="infor-list flex">
                                            <div class="infor-list__title">
                                                <lable>Email</lable>
                                            </div>
                                            <div class="infor-list__input">
                                                <input type="email" name="" id="" value="test@gmail.com">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="infor-detail__list">
                                        <div class="infor-list flex">
                                            <div class="infor-list__title">
                                                <lable>Số điện thoại</lable>
                                            </div>
                                            <div class="infor-list__input">
                                                <input type="tel" name="" id="" value="0932379943">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form__btn button">Lưu</div>
                                </form>
                            </div>
                            <div class="infor-detail__avt">
                                <div class="account__avt image">
                                    <i class="fa-solid fa-user"></i>
                                    <img src="./image/avt.jpg" alt="avata" />
                                </div>
                                <div class="btn__img">
                                    <button>Chọn ảnh</button>
                                </div>
                                <div class="desc_img">
                                    <p>Dụng lượng file tối đa 1 MB</p>
                                    <p>Định dạng:.JPEG, .PNG</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>