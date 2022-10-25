<?php 
include 'include/connect.php';
if(isset($_POST['login'])){
  header('location: login.php');
}
$err = [];
if(isset($_POST['username'])){
  $user = $_POST['username'];
  $pas = $_POST['password'];
  $rPass = $_POST['rpassword'];
  $email = $_POST['email'];
  $fullName = $_POST['fullname'];

  if(empty($user)){
    $err['username'] = '* Bạn chưa nhập tên đăng nhập';
  }
  if(empty($pas)){
    $err['password'] = '* Bạn chưa nhập mật khẩu';
  }
  if($pas != $rPass){
    $err['rpassword'] = '* Mật khẩu nhập lại chưa đúng';
  }
  if(empty($email)){
    $err['email'] = '* Bạn chưa nhập Email';
  }
  if(empty($fullName)){
    $err['fullname'] = '* Bạn chưa nhập tên hiển thị';
  }
  if(empty($err)){
    $sqlCheck = "SELECT * FROM user WHERE username = '$user' OR email = '$email'";
    $queryCheck = mysqli_query($conn,$sqlCheck);
    $data = mysqli_fetch_assoc($queryCheck);
    $check = mysqli_num_rows($queryCheck);
    if($user == $data['username']){
        $err['username'] = "Tên tài khoản đã tồn tại";
    }
    if($email == $data['email']){
        $err['email'] = "Tên Email đã tồn tại";
    }
    if($check == 0){
    $passHash = password_hash($pas,PASSWORD_DEFAULT);
    $sql = "INSERT INTO user(name,username,password,email) VALUES('$fullName','$user','$passHash','$email')";
    $query = mysqli_query($conn,$sql);
    if($query){
         header('location: login.php');
    }
    }
    
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tạo tài khoản | Giới thiệu phòng trọ</title>

    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap"
    />
  </head>
  <body>
    <div class="main">
      <div class="container container-cent">
        <div class="main-container">
        <!-- form đăng ký -->
          <div class="form-container b-container is-txl" id="b-container">
            <form action="" method="post" class="form" id="a-form">
              <h2 class="form_title title">Đăng ký</h2>
              <input
                class="form__input"
                type="text"
                name="username"
                id=""
                placeholder="Tên tài khoản"
              />
              <div class="has__error">
                <span><?php echo(isset($err['username']))?$err['username']:''?></span>
              </div>
              <input
                class="form__input"
                type="password"
                name="password"
                id=""
                placeholder="Nhập mật khẩu"
              />
              <div class="has__error">
                <span><?php echo(isset($err['password']))?$err['password']:''?></span>
              </div>
              <input
                class="form__input"
                type="password"
                name="rpassword"
                id=""
                placeholder="Nhập lại mật khẩu"
              />
              <div class="has__error">
                <span><?php echo(isset($err['rpassword']))?$err['rpassword']:''?></span>
              </div>
              <input
                class="form__input"
                type="email"
                name="email"
                id=""
                placeholder="Nhập email"
              />
              <div class="has__error">
                <span><?php echo(isset($err['email']))?$err['email']:''?></span>
              </div>
              <input
                class="form__input"
                type="text"
                name="fullname"
                id=""
                placeholder="Nhập tên hiển thị"
              />
              <div class="has__error">
                <span><?php echo(isset($err['fullname']))?$err['fullname']:''?></span>
              </div>
              <button class="form__button button" type="submit">Đăng ký</button>
            </form>
          </div>
          <div class="switch is-txr" id="switch-cnt">
            <div class="switch__circle is-txr"></div>
            <div class="switch__circle switch__circle--t is-txr"></div>
            <div class="switch__container  " id="switch-c1">
              <h2 class="switch__title title">Xin chào</h2>
              <p class="switch__description description">
                Bạn đã có tài khoản! <br />
                Hãy đăng nhập ngay để tìm kiếm nhà trọ nhé!
              </p>
              <a href="login.php" class="switch__button button switch-btn">Đăng nhập</a>
            </div>
          </div>        
        </div>
      </div>
    </div>
    <script src="script.js"></script>
  </body>
</html>
