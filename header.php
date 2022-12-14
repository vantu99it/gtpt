<?php 
include 'include/connect.php';
$name = (isset($_SESSION['name']))? $_SESSION['name']:[];
if(isset($_SESSION['name'])){
  $sqlCheck = "SELECT * FROM user WHERE username= '".$name['username']."'";
  $queryCheck = mysqli_query($conn, $sqlCheck);
  $data = mysqli_fetch_assoc($queryCheck);
  $fullName = $data['name'];
  $avatar = $data['avatar'];
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang chủ | Giới thiệu phòng trọ</title>

    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./libs/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="./style/style.css">
  </head>
  <body>
    <div id="header">
      <div class="container">
        <div class="logo">
          <a href="#"><img src="./image/logo.png" alt="logo" /></a>
        </div>
        <div class="nav-menu">
          <ul>
            <li><a href="./index.php">Trang chủ</a></li>
            <li><a href="">Phòng trọ</a></li>
            <li><a href="">Liên hệ</a></li>
            <li><a href="">Giúp đỡ</a></li>
          </ul>
        </div>
        <?php if(isset($fullName)){ ?>
        <div class="account account--right">
          <div class="account__avt">
            <?php if($avatar != ""){ ?>
              <img src="<?php echo $avatar?>" alt="avata" />
            <?php } else{?>
              <i class="fa-solid fa-user"></i>
              <?php } ?>
          </div>
          <div class="account__name">
            <p class="account__fullname"><?php echo $fullName ?></p>
            <div class="account__menu">
              <ul>
                <li><a href="personal-page.php">Hồ sơ của tôi</a></li>
                <li><a href="logout.php">Đăng xuất</a></li>
              </ul>
            </div>
          </div>
        </div>
        <?php } else {?>
        <div class="login">
          <a href="login.php" class="js-registration">Đăng nhập</a> /
          <a href="register.php" class="js-login">Đăng ký</a>
        </div>
        <?php }?>
      </div>
    </div>
    <div class="container">
      <div class="secrch grid_search" style="margin-top: 70px;">
      <div class="search_address">
        <form action="" method="post">
          <input type="text" class="search searchAddress" name = "address" placeholder="Tìm kiếm địa chỉ">
          <button type="submit" name = "search-address" class="btn_ml searchButton">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>
        <form action="" class="search_convenient" method="post">
          <input type="text" class="search searchConvenient" name = "convenient" placeholder="Tìm kiếm tiện nghi">
          <button type="submit" name = "search-convenient" class="btn_ml searchButton">
             <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
        <form action="" class="search_price" method="post" >
          <select class="search" name="price">
            <option value="0">Chọn khoảng giá</option>
            <option value="1">Dưới 1 triệu</option>
            <option value="2">Từ 1 - 2 triệu</option>
            <option value="3">Trên 2 triệu</option>
          </select>
          <button type="submit" name = "search-price" class="searchButton">
              <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
        </div>
      </div>
    <script src="script.js"></script>
  </body>
</html>
