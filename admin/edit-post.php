
<?php 
 include "../include/connect.php ";
 include '../include/function.php';
 $role = (isset($_SESSION['role']))? $_SESSION['role']:[];
 $checkid = $role['id'];
 $checkRole = $role['role'];

 $categoryQr = mysqli_query($conn, "SELECT * FROM  category");
 $districtsQr = mysqli_query($conn, "SELECT * FROM  districts");
 $id = $_GET['id'];
$motel = mysqli_query($conn, "SELECT m.*, ca.category_name, dis.name, ca.id, dis.id FROM  motel m join category ca on ca.id = m.category_id join districts dis on dis.id = m.district_id  WHERE m.id = $id ");
$row = mysqli_fetch_assoc($motel);

 if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
    $ids = $_POST['id'];
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
        if(empty($imagePNG)){
            $target_file = $row['images'];
        }else{
        $imageName = strtolower(vn2en($imagePNG));
        $target_dir = "./image/";
        $target_file = $target_dir . $imageName;
        move_uploaded_file($_FILES["image"]["tmp_name"], "../image/". $imageName);
        }
    }

    $sql = "UPDATE motel SET title ='$title', category_id = '$category',district_id = '$districts',description = '$description',address = '$address',phone = '$phone',price ='$price' ,area ='$area' ,utilities ='$utilities' ,status  = '$status',images  =  '$target_file' WHERE id = $id";
    $query = mysqli_query($conn,$sql);
    // var_dump($sql);
    // die();
    if($query){
        if($checkRole == 1){
            header("Location: ./post-admin.php");
        }else{
            header("Location: ./post.php");
        }
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
                <div class="add-post" style = "padding-bottom: 30px;">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h5>Bài viết</h5>
                        <input type="hidden" value ="<?php echo $row['id'] ?>" name = "id">
                        <p>Tiêu đề</p>
                        <input type="text" name="title" id="" value ="<?php echo $row['title'] ?>">
                        <p>Chuyên mục</p>
                        <select class = "select" name ="category">
                            <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
                            <?php foreach ($categoryQr as $key => $value) {?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['category_name'] ?></option>
                            <?php } ?>
                        </select>
                        <p>Khu vực</p>
                        <select class = "select" name ="districts">
                            <option value="<?php echo $row['district_id'] ?>"><?php echo $row['name'] ?></option>
                            <?php foreach ($districtsQr as $key => $value) {?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                            <?php } ?>
                        </select>
                        <p>Mô tả</p>
                        <input type="text" name="description" value ="<?php echo $row['description'] ?>" id="">
                        <p>Địa chỉ trọ</p>
                        <input type="text" name="address"value ="<?php echo $row['address'] ?>" id="">
                        <p>Điện thoại</p>
                        <input type="number" name="phone"value ="<?php echo $row['phone'] ?>" id="">
                        <p>Giá cho thuê</p>
                        <input type="number" name="price" value ="<?php echo $row['price'] ?>" id="">
                        <p>Diện tích</p>
                        <input type="number" name="area" value ="<?php echo $row['area'] ?>" id="">
                        <p>Hình ảnh</p>
                        <input type="file" name = "image">
                        <p>Chi tiết tiện ích</p>
                        <textarea name="utilities" id="" cols="30" rows="10"> <?php echo $row['utilities'] ?></textarea>
                        <?php if($checkRole == 1){?>
                            <p>Trạng thái</p>
                            <div class="status">
                                <label>
                                    <input type="radio" name="status" id="" value ="1" <?php if($row['status'] == 1) echo  "checked = 'Checked'" ?>> Hiện

                                </label>
                                <label>
                                    <input type="radio" name="status" value ="0" <?php if($row['status'] == 0) echo  "checked = 'Checked'" ?> id="" > Ẩn
                                </label>
                            </div>
                        <?php }?>
                        <input type="submit" name ="capnhat" value="Cập nhật" class="btn-add btn-add1" >
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