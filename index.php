<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trang chủ | Giới thiệu phòng trọ</title>

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
  <?php include 'header.php'; ?>
  <div class="container">
    <h5 class="title">PHÒNG TRỌ MỚI ĐĂNG NHẤT</h5>
    <div class="grid">
      <div class="box flex">
        <div class="img">
          <img src="./image/anh_phong_1.jpg" />
        </div>
        <div class="content">
          <p class="name">Phòng trọ tầng 2</p>
          <div class="flex">
            <i class="fa-solid fa-user"></i>
            <p>Người đăng Hoàng Văn Công</p>
          </div>
          <div class="flex">
            <i class="fa-regular fa-circle-dot"></i>
            <p>Diện tích 12m</p>
          </div>
          <div class="flex">
            <i class="fa-solid fa-location-dot"></i>
            <p>Địa chỉ 36 Bạch Liêu</p>
          </div>
          <div class="flex">
            <i class="fa-regular fa-money-bill"></i>
            <p>Giá thuê 1.200.000</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="script.js"></script>
</body>

</html>