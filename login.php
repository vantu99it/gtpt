<?php 
include 'include/connect.php';

$err = [];
if(isset($_POST['username'])){
  $user = $_POST['username'];
  $pass = $_POST['password'];

  $sql = "SELECT * FROM user WHERE username = '$user'";
  $query = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($query);
  $checkUser = mysqli_num_rows($query);
  if($checkUser == 1){
    $checkPass = password_verify($pass, $data['password']);
    if($checkPass){
        $_SESSION['username'] = $data;
        $_SESSION['name']=$data;
        $_SESSION['email']=$data;
        $_SESSION['phone']=$data;
        header('location: index.php');

    }
    else{
        $err['password'] = "Mật khẩu không đúng";
    }
  }
  else{
    $err['username'] = "Tên tài khoản không tồn tại";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng nhập | Giới thiệu phòng trọ</title>

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
          <div class="form-container a-container" id="a-container">
              <form action="" method="post" class="form" id="form">
                <h2 class="form_title title">Đăng nhập</h2>
                <input
                  class="form__input"
                  type="text"
                  name="username"
                  id=""
                  placeholder="Nhập tên tài khoản"
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
                <a href="#" class="form__link">Quên mật khẩu?</a>
                <button class="form__button button" type="submit">Đăng nhập</button>
              </form>
          </div>
          <div class="switch " id="switch-cnt">
            <div class="switch__circle "></div>
            <div class="switch__circle switch__circle--t "></div>
            <div class="switch__container" id="switch-c1">
              <h2 class="switch__title title">Xin chào!</h2>
              <p class="switch__description description">
                Bạn chưa có tài khoản? <br/>
                Hãy đăng ký tài khoản ngay!
              </p>
              <a href="register.php" class="switch__button button switch-btn">Đăng kí</a>
            </div>
          </div>
        </div>
      </div>
      <!-- form dang nhap -->
    </div>
    <script src="script.js"></script>
  </body>
</html>
