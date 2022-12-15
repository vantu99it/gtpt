
<?php
include "../include/connect.php";
include '../include/function.php';

$role = (isset($_SESSION['role']))? $_SESSION['role']:[];
$checkRole = $role['role'];
$checkid = $role['id'];

$categoryQr = mysqli_query($conn, "SELECT * FROM  category");
$districtsQr = mysqli_query($conn, "SELECT * FROM  districts");
$motel =  mysqli_query($conn, "SELECT m.*, d.name, ca.category_name FROM motel m join districts d on d.id = m.district_id join category ca on ca.id = m.category_id");
if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
    $title = $_POST['title'];
    $category = $_POST['category'];
    $districts = $_POST['districts'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $price = $_POST['price'];
    $area = $_POST['area'];
    $utilities = $_POST['utilities'];
    $status = $_POST['status'];
    if(isset($_FILES["image"])){
        $imagePNG = basename($_FILES["image"]["name"]);
        $imageName = strtolower(vn2en($imagePNG));
        $target_dir = "./image/";
        $target_file = $target_dir . $imageName;
        move_uploaded_file($_FILES["image"]["tmp_name"], "../image/". $imageName);
    }
    $sql = "INSERT INTO motel(title,user_id, category_id,district_id,description,address,phone,price,area,utilities,status,images) VALUES ('$title',$checkid ,'$category','$districts','$description','$address','$phone','$price','$area','$utilities','$status','$target_file')";
    // echo ($sql);
    // die();
    $query = mysqli_query($conn, $sql);
    if($query){
        header("Location: ./post.php");
    }
    else{
        echo "loi";
    }

}
// xóa
if(isset($_REQUEST['del'])&&($_REQUEST['del'])){
    $delid = intval($_GET['del']);
    $sql = "DELETE FROM motel WHERE id = $delid";
    $query = mysqli_query($conn,$sql);
    if($query){
        header("Location: ./post.php");
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
            <div class="container" >
                <div class="add-post">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h5>Bài viết</h5>
                        <p>Tiêu đề</p>
                        <input type="text" name="title" id="">
                        <p>Chuyên mục</p>
                        <select class = "select" name ="category">
                            <option value="0">--- Chọn danh mục ---</option>
                            <?php foreach ($categoryQr as $key => $value) {?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['category_name'] ?></option>
                            <?php } ?>
                        </select>
                        <p>Khu vực</p>
                        <select class = "select" name ="districts">
                            <option value="0">--- Khu vực ---</option>
                            <?php foreach ($districtsQr as $key => $value) {?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                            <?php } ?>
                        </select>
                        <p>Mô tả</p>
                        <input type="text" name="description" id="">
                        <p>Địa chỉ trọ</p>
                        <input type="text" name="address" id="">
                        <p>Điện thoại</p>
                        <input type="number" name="phone" id="">
                        <p>Giá cho thuê</p>
                        <input type="number" name="price" id="">
                        <p>Diện tích</p>
                        <input type="number" name="area" id="">
                        <p>Hình ảnh</p>
                        <input type="file" name = "image">
                        <p>Chi tiết tiện ích</p>
                        <textarea name="utilities" id="" cols="30" rows="10"></textarea>
                        <p>Trạng thái</p>
                        <div class="status">
                            <label>
                                <input type="radio" name="status" id="" value ="1" checked = "Checked"> Hiện
                            </label>
                            <label>
                                <input type="radio" name="status" value ="0" id="" > Ẩn
                            </label>
                        </div>
                        <input type="submit" name ="themmoi" value="Thêm mới" class="btn-add btn-add1" >
                    </form>
                </div>

                <div class="post" style = "padding-bottom: 30px;">
                    <form action="#">
                        <h5>Danh sách bài viết</h5>
                        <table class="show-post">
                            <thead>
                                <tr class="title">
                                    <td>STT</td>
                                    <td>Tên bài viết</td>
                                    <td>Địa chỉ</td>
                                    <td>Giá</td>
                                    <td>Diện tích</td>
                                    <td>Liên hệ</td>
                                    <td>Khu vực</td>
                                    <td>Danh mục</td>
                                    <td>Trạng thái</td>
                                    <td>Quản lý</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                             foreach ($motel as $key => $value) { ?>
                                <tr>
                                    <td><?php echo  $key + 1  ?></td>
                                    <td><?php echo $value['title'] ?></td>
                                    <td><?php echo $value['address'] ?></td>
                                    <td><?php echo $value['price'] ?></td>
                                    <td><?php echo $value['area'] ?></td>
                                    <td><?php echo $value['phone'] ?></td>
                                    <td><?php echo $value['name'] ?></td>
                                    <td><?php echo $value['category_name'] ?></td>
                                    <td><?php if( $value['status'] == 1){
                                        echo "Hiện";
                                    }else{
                                        echo "Ẩn";
                                    } ?>
                                    </td>
                                    <td>
                                        <a href="./edit-post.php?id=<?php echo $value['Id']?>" class=" btn-add btn-change">Sửa</a>
                                        <a href="./post.php?del=<?php echo $value['Id']?>" class="btn-add btn-delete" onclick="return confirm('Bạn chắc chắn muốn xóa?');" >Xóa</a>
                                    </td>
                                </tr>
                            <?php }  ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="javascript.js"></script>
</body>
</html>