<?php 
 include "../include/connect.php";
 date_default_timezone_set("Asia/Ho_Chi_Minh");

 if(isset($_REQUEST['id'])){
    $id = $_GET['id'];
    $districts_sel = mysqli_query($conn, "SELECT * FROM  districts WHERE id = $id");
   $row = mysqli_fetch_assoc($districts_sel );
 };


 $district = mysqli_query($conn, "SELECT * FROM  districts");

if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
   $districtName = $_POST['district-name'];
    //  var_dump($districtName);
    //  die();

    $sql = "INSERT INTO districts (name) value ('$districtName')";
    $query = mysqli_query($conn,$sql);
    if($query){
        header("Location: ./district.php");
    }
    else{
        echo "loi";
    }
}
// capnhat
if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
    $ids = $_POST['id'];
    $districtName = $_POST['district-name'];
     //  var_dump($districtName);
     //  die();
 
     $sql = "UPDATE districts SET name = '$districtName'WHERE id = $ids";
     $query = mysqli_query($conn,$sql);
     if($query){
         header("Location: ./district.php");
     }
     else{
         echo "loi";
     }
 }

if(isset($_REQUEST['del'])&&($_REQUEST['del'])){
    $delid = intval($_GET['del']);
    $sql = "DELETE FROM districts WHERE id = $delid";
    $query = mysqli_query($conn,$sql);
    if($query){
        header("Location: ./district.php");
    }
    else{
        echo "loi";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../libs/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="./style/style.css">
    <title>Admin</title>
</head>
<body>
    <div class="footer_admin">
        
        <!-- header -->
        <?php include "./include/header.php" ?>
        <!-- /header -->
            <div class="container">
            <?php if(!isset($_REQUEST['id'])){?>
                <div class="add-district">
                    <form action="" method="post">
                        <h5>Khu vực</h5>
                        <p>Tên khu vực</p>
                        <input type="text" name="district-name">
                        <input type="submit" value="Thêm" name="themmoi" class="btn-add">
                    </form>
                </div>
                <?php }else{ ?>
                <div class="change-district">
                <form action="" method="post">
                    <h5>Khu vực</h5>
                    <p>Tên khu vực</p>
                    <input type="hidden" value ="<?php echo $row['id'] ?>" name = "id">
                    <input type="text" name="district-name" value ="<?php echo $row['name']?>">
                    <input type="submit" value="Cập nhật" name="capnhat" class="btn-add">
                </form>
                </div>

                <?php } ?>

                <div class="district">
                    <form action="#">
                        <h5>Danh sách khu vực</h5>
                        <table class="show-district">
                            <thead>
                            <tr class="title">
                                <td style = "width: 10%;">ID</td>
                                <td style = "width: 80%;">Tên khu vực</td>
                                <td style = "width: 10%;">Quản lý</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($district as $key => $value) { ?>
                                <tr>
                                <td><?php echo $key + 1 ?> </td>
                                <td><?php echo $value['name'] ?></td>
                                <td>
                                    <a href="./district.php?id=<?php echo $value['id']?>" class=" btn-add btn-change">Sửa</a>
                                    <a href="./district.php?del=<?php echo $value['id']?>" class="btn-add btn-delete" onclick="return confirm('Bạn chắc chắn muốn xóa?');" >Xóa</a>
                                </td>
                            </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="js/javascript.js"></script>
</body>
</html>