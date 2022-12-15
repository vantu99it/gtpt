<?php
    include 'include/connect.php';
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $name = (isset($_SESSION['name']))? $_SESSION['name']:[];
    $id = $_GET['id'];

    $view = mysqli_query($conn,'UPDATE motel SET count_view=count_view + 1 WHERE Id = '.$id);
    
    $query = mysqli_query($conn,'SELECT m.*, u.name, u.phone, ca.category_name FROM motel m join user  u on u.id = m.user_id join category ca on ca.id = m.category_id WHERE m.Id='.$id);
    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>

<body>
  <?php include('./header.php') ?>
  <div class="container" style="margin-top:50px ;">
    <div class="grid_room">
      <div class="content_left">
          <p class="name_room"><?php echo $row['title'] ?></p>
          <div class="desc_room">
              <p><span class="price_room"><?php
                $tien = (int) $row['price'];
                $bien =0;
                if(strlen($tien)>=7){
                  $bien =  $tien/1000000;
                  echo $bien." triệu/tháng";
                }else {
                  $bien = number_format($tien,0,",",".");
                  echo $bien." đồng/tháng";
                }
              ?></span></p>
              <p>Lượt xem: <span class="view"><?php echo $row['count_view'] ?></span>, Ngày đăng: <span class="date_room" style="color: red ;font-weight: bold;">
              <?php 
              $time = time() -  strtotime($row['created_at']);
              if(floor($time/60/60/24)==0){
                if(floor($time/60/60)==0){
                  echo(ceil($time/60)." phút trước");
                }else{
                  echo(floor($time/60/60)." tiếng trước");
                }
              }else{
                echo(floor($time/60/60/24)." ngày trước");
              }
            ?></span></p>
          </div>
          <div style = "width: 666px">
              <img src="<?php echo  $row['images'] ?>" style = "width: 100%" class="img_room" />
          </div>
          <div>
              <h4>Mô tả</h4>
              <p class="info_room"><?php echo  $row['description'] ?>
              </p>
          </div>
      </div>
      <div class="content_right">
          <h4>Thông tin người đăng</h4>
          <button class="btn_phone">
              <i class="fa-solid fa-phone"></i>
              <a href="tel:+<?php echo  $row['phone'] ?>" style="color: #fff;"><p>SĐT: <?php echo  $row['phone'] ?></p></a>
          </button>
          <div class="top">
              <p>Địa chỉ: <span class="address_room"><?php echo  $row['address'] ?></span></p>
              <p>Giá phòng: <span class="price_room">
              <span class="price_room"><?php
                $tien = (int) $row['price'];
                $bien =0;
                if(strlen($tien)>=7){
                  $bien =  $tien/1000000;
                  echo $bien." triệu/tháng";
                }else {
                  $bien = number_format($tien,0,",",".");
                  echo $bien." đồng/tháng";
                }
              ?>
              </span></p>
          </div>
          <div class="middle">
              <p>Diện tích: <span class="area_room"><?php echo $row['area'] ?> m&sup2;</span> </p>
              <p>Tiện ích phòng trọ: <span class="utilities"><?php echo $row['utilities'] ?></span></p>
              <!-- <h5>BÁO CÁO</h5> -->
          <!-- </div>
          <div class="wrap_btn">
              <button class="btn_send">Gửi bài đăng</button>
              <button class="btn_edit">Sửa bài đăng</button>
          </div> -->
      </div>
    </div>
  </div>
  </div>
  <?php include 'footer.php'; ?>
</body>


</html>