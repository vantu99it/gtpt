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
  <link rel="stylesheet" href="./style/style.css">
</head>

<body>
  <?php include 'header.php'; ?>
  <div class="wrapper">
    <h5 class="list_title">PHÒNG TRỌ MỚI ĐĂNG NHẤT</h5>
    <div class="grid">
      <div class="grid-list">
        <div class="img">
          <img src="./image/anh_phong_1.jpg" style="width: 200px; height: 200px;" />
          <p class="text_img">Ở ghép</p>
        </div>
        <div class="content">
          <p class="name">Phòng trọ tầng 2</p>
          <div class="flex">
            <i class="fa-solid fa-user"></i>
            <p>Người đăng: <span> Hoàng Văn Công</span></p>
          </div>
          <div class="flex">
            <i class="fa-regular fa-circle-dot"></i>
            <p>Diện tích: <span>12m</span></p>
          </div>
          <div class="flex">
            <i class="fa-solid fa-location-dot"></i>
            <p>Địa chỉ: <span>36 Bạch Liêu</span></p>
          </div>
          <div class="flex">
          <i class="fa-solid fa-money-bill"></i>
            <p>Giá thuê: <span>1.200.000</span></p>
          </div>
        </div>
        <div class="date">
          <div class="flex">
            <i class="fa-regular fa-clock"></i>
            <p>2 ngày trước</p>
          </div>
          <div class="flex">
            <i class="fa-solid fa-eye"></i>
            <p>Lượt xem <span>4</span></p>
          </div>
        </div>
      </div>
      <div class="grid-list">
        <div class="img">
          <img src="./image/anh_phong_1.jpg" style="width: 200px; height: 200px;" />
          <p class="text_img">Ở ghép</p>
        </div>
        <div class="content">
          <p class="name">Phòng trọ tầng 2</p>
          <div class="flex">
            <i class="fa-solid fa-user"></i>
            <p>Người đăng: <span> Hoàng Văn Công</span></p>
          </div>
          <div class="flex">
            <i class="fa-regular fa-circle-dot"></i>
            <p>Diện tích: <span>12m</span></p>
          </div>
          <div class="flex">
            <i class="fa-solid fa-location-dot"></i>
            <p>Địa chỉ: <span>36 Bạch Liêu</span></p>
          </div>
          <div class="flex">
          <i class="fa-solid fa-money-bill"></i>
            <p>Giá thuê: <span>1.200.000</span></p>
          </div>
        </div>
        <div class="date">
          <div class="flex">
            <i class="fa-regular fa-clock"></i>
            <p>2 ngày trước</p>
          </div>
          <div class="flex">
            <i class="fa-solid fa-eye"></i>
            <p>Lượt xem <span>4</span></p>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  <script src="script.js"></script>
</body>

</html>