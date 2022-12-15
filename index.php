<?php 
 include "./include/connect.php";
  date_default_timezone_set("Asia/Ho_Chi_Minh");
  $item_per_page = !empty($_GET['per-page'])?$_GET['per-page']:2;
  $current_page = !empty($_GET['page'])?$_GET['page']:1 ;
  $offset = ($current_page - 1) * $item_per_page;


  $key= isset($_GET['keyword'])?$_GET['keyword']:'';
  $totalPages = mysqli_query($conn, "SELECT m.*, u.name, u.phone, ca.category_name FROM motel m join user  u on u.id = m.user_id join category ca on ca.id = m.category_id WHERE  m.address LIKE '%".$key."%' or m.utilities LIKE '%".$key."%' and m.status = 1 ");
  $totalPages = $totalPages -> num_rows;
  $totalPages = ceil($totalPages/$item_per_page);

  if(isset($_POST['search-address'])&& isset($_POST['search-address'])){
    $keyword = $_POST['address'];
    $sql = "SELECT m.*, u.name, u.phone, ca.category_name FROM motel m join user  u on u.id = m.user_id join category ca on ca.id = m.category_id WHERE m.status = 1 and m.address LIKE '%".$keyword."%' LIMIT ".$item_per_page." OFFSET ".$offset;
  }
  elseif(isset($_POST['search-convenient'])&& isset($_POST['search-convenient'])){
    $keyword = $_POST['convenient'];
    $sql = "SELECT m.*, u.name, u.phone, ca.category_name FROM motel m join user  u on u.id = m.user_id join category ca on ca.id = m.category_id WHERE m.status = 1 and m.utilities LIKE '%".$keyword."%' LIMIT ".$item_per_page." OFFSET ".$offset;
  }
  elseif(isset($_POST['search-price'])&& isset($_POST['search-price'])){
    $keyword = $_POST['price'];
    if($keyword == '1'){
      $sql = "SELECT m.*, u.name, u.phone, ca.category_name FROM motel m join user  u on u.id = m.user_id join category ca on ca.id = m.category_id WHERE m.status = 1 AND m.price < 1000000 LIMIT ".$item_per_page." OFFSET ".$offset;
    }
    elseif($keyword == '2'){
      $sql = "SELECT m.*, u.name, u.phone, ca.category_name FROM motel m join user  u on u.id = m.user_id join category ca on ca.id = m.category_id WHERE m.status = 1 AND m.price BETWEEN 1000000 AND 2000000 LIMIT ".$item_per_page." OFFSET ".$offset;
    }else{
      $sql = "SELECT m.*, u.name, u.phone, ca.category_name FROM motel m join user  u on u.id = m.user_id join category ca on ca.id = m.category_id WHERE m.status = 1 AND m.price >2000000 LIMIT ".$item_per_page." OFFSET ".$offset;
    }
  }
  else {
    $keyword = "";
    $sql = "SELECT m.*, u.name, u.phone, ca.category_name FROM motel m join user  u on u.id = m.user_id join category ca on ca.id = m.category_id WHERE m.status = 1 and m.address LIKE '%".$keyword."%' and m.utilities LIKE '%".$keyword."%' LIMIT ".$item_per_page." OFFSET ".$offset;
  }
  $query= mysqli_query($conn, $sql);
  

  $postNews = mysqli_query($conn, "SELECT m.*, u.name, u.phone, ca.category_name FROM motel m join user  u on u.id = m.user_id join category ca on ca.id = m.category_id WHERE m.status = 1  ORDER BY m.id DESC LIMIT 4");
  $postViews = mysqli_query($conn, "SELECT m.*, u.name, u.phone, ca.category_name FROM motel m join user  u on u.id = m.user_id join category ca on ca.id = m.category_id WHERE m.status = 1  ORDER BY m.count_view DESC LIMIT 4");
  
?>

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
  <div id="main">
    <div class="container">
      <div class="all-rooms">
        <div>
          <h5 class="list_title">TẤT CẢ PHÒNG TRỌ</h5>
        </div>
        <div class="grid" style=" margin-bottom: 25px;">
          <?php if ($query -> num_rows > 0) {
           while ($row = $query->fetch_assoc()){ ?>
            <div class="grid-list">
              <div class="img">
                <img src="<?php echo  $row['images'] ?>" style="width: 100%; height: 100%;" />
                <p class="text_img"><?php echo $row['category_name'] ?></p>
              </div>
              <div class="content">
                <a href="./rooms_details.php?id=<?php echo $row['Id'] ?>"><p class="name"><?php echo $row['title'] ?></p></a>
                <div class="flex">
                  <i class="fa-solid fa-user"></i>
                  <p>Người đăng: <span> <?php echo $row['name'] ?></span></p>
                </div>
                <div class="flex">
                  <i class="fa-regular fa-circle-dot"></i>
                  <p>Diện tích: <span><?php echo $row['area'] ?> m&sup2;</span></p>
                </div>
                <div class="flex">
                  <i class="fa-solid fa-location-dot"></i>
                  <p>Địa chỉ: <span><?php echo $row['address'] ?></span></p>
                </div>
                <div class="flex">
                <i class="fa-solid fa-money-bill"></i>
                  <p>Giá thuê: <span>
                    <?php
                      $tien = (int) $row['price'];
                      $bien =0;
                      if(strlen($tien)>=7){
                        $bien =  $tien/1000000;
                        echo $bien." triệu/tháng";
                      }else {
                          $bien = number_format($tien,0,",",".");
                          echo $bien." đồng/tháng";
                      }
                    ?> </span></p>
                </div>
              </div>
              <div class="date">
                <div class="flex">
                  <i class="fa-regular fa-clock"></i>
                  <p><?php 
                    $time = time() - strtotime($row['created_at']);
                    if(floor($time/60/60/24)==0){
                      if(floor($time/60/60)==0){
                        echo(ceil($time/60)." phút trước");
                      }else{
                        echo(floor($time/60/60)." tiếng trước");
                      }
                    }else{
                      echo(floor($time/60/60/24)." ngày trước");
                    }
                  ?>
                  </p>
                </div>
                <div class="flex">
                  <i class="fa-solid fa-eye"></i>
                  <p>Lượt xem <span><?php echo $row['count_view'] ?></span></p>
                </div>
              </div>
            </div>
          <?php }}?>
        </div>
        <!-- phân trang -->
        <?php include 'include/page-division.php'; ?>
      </div>
      <div class="new-rooms">
        <div>
          <h5 class="list_title">PHÒNG MỚI NHẤT</h5>
        </div>
        <div class="grid" style=" margin-bottom: 25px;">
          <?php 
            foreach ($postNews as $key => $row){ ?>
            <div class="grid-list">
              <div class="img">
                <img src="<?php echo  $row['images'] ?>" style="width: 100%; height: 100%;" />
                <p class="text_img"><?php echo $row['category_name'] ?></p>
              </div>
              <div class="content">
                <a  href="./rooms_details.php?id=<?php echo $row['Id'] ?>"><p class="name"><?php echo $row['title'] ?></p></a>
                <div class="flex">
                  <i class="fa-solid fa-user"></i>
                  <p>Người đăng: <span> <?php echo $row['name'] ?></span></p>
                </div>
                <div class="flex">
                  <i class="fa-regular fa-circle-dot"></i>
                  <p>Diện tích: <span><?php echo $row['area'] ?> m&sup2;</span></p>
                </div>
                <div class="flex">
                  <i class="fa-solid fa-location-dot"></i>
                  <p>Địa chỉ: <span><?php echo $row['address'] ?></span></p>
                </div>
                <div class="flex">
                <i class="fa-solid fa-money-bill"></i>
                  <p>Giá thuê: <span>
                    <?php
                      $tien = (int) $row['price'];
                      $bien =0;
                      if(strlen($tien)>=7){
                        $bien =  $tien/1000000;
                        echo $bien." triệu/tháng";
                      }else {
                          $bien = number_format($tien,0,",",".");
                          echo $bien." đồng/tháng";
                      }
                    ?> </span></p>
                </div>
              </div>
              <div class="date">
                <div class="flex">
                  <i class="fa-regular fa-clock"></i>
                  <p><?php 
                    $time = time() - strtotime($row['created_at']);
                    if(floor($time/60/60/24)==0){
                      if(floor($time/60/60)==0){
                        echo(ceil($time/60)." phút trước");
                      }else{
                        echo(floor($time/60/60)." tiếng trước");
                      }
                    }else{
                      echo(floor($time/60/60/24)." ngày trước");
                    }
                  ?>
                  </p>
                </div>
                <div class="flex">
                  <i class="fa-solid fa-eye"></i>
                  <p>Lượt xem <span><?php echo $row['count_view'] ?></span></p>
                </div>
              </div>
            </div>
          <?php }?>
        </div>
      </div>
      <div class="new-rooms">
        <div>
          <h5 class="list_title">PHÒNG XEM NHIỀU NHẤT</h5>
        </div>
        <div class="grid" style=" margin-bottom: 25px;">
          <?php 
            foreach ($postViews as $key => $row){ ?>
            <div class="grid-list">
              <div class="img">
                <img src="<?php echo  $row['images'] ?>" style="width: 100%; height: 100%;" />
                <p class="text_img"><?php echo $row['category_name'] ?></p>
              </div>
              <div class="content">
                <a  href="./rooms_details.php?id=<?php echo $row['Id'] ?>"><p class="name"><?php echo $row['title'] ?></p></a>
                <div class="flex">
                  <i class="fa-solid fa-user"></i>
                  <p>Người đăng: <span> <?php echo $row['name'] ?></span></p>
                </div>
                <div class="flex">
                  <i class="fa-regular fa-circle-dot"></i>
                  <p>Diện tích: <span><?php echo $row['area'] ?> m&sup2;</span></p>
                </div>
                <div class="flex">
                  <i class="fa-solid fa-location-dot"></i>
                  <p>Địa chỉ: <span><?php echo $row['address'] ?></span></p>
                </div>
                <div class="flex">
                <i class="fa-solid fa-money-bill"></i>
                  <p>Giá thuê: <span>
                    <?php
                      $tien = (int) $row['price'];
                      $bien =0;
                      if(strlen($tien)>=7){
                        $bien =  $tien/1000000;
                        echo $bien." triệu/tháng";
                      }else {
                          $bien = number_format($tien,0,",",".");
                          echo $bien." đồng/tháng";
                      }
                    ?> </span></p>
                </div>
              </div>
              <div class="date">
                <div class="flex">
                  <i class="fa-regular fa-clock"></i>
                  <p><?php 
                    $time = time() - strtotime($row['created_at']);
                    if(floor($time/60/60/24)==0){
                      if(floor($time/60/60)==0){
                        echo(ceil($time/60)." phút trước");
                      }else{
                        echo(floor($time/60/60)." tiếng trước");
                      }
                    }else{
                      echo(floor($time/60/60/24)." ngày trước");
                    }
                  ?>
                  </p>
                </div>
                <div class="flex">
                  <i class="fa-solid fa-eye"></i>
                  <p>Lượt xem <span><?php echo $row['count_view'] ?></span></p>
                </div>
              </div>
            </div>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
  <script src="script.js"></script>
</body>

</html>