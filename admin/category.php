<?php 
 include "../include/connect.php";
 date_default_timezone_set("Asia/Ho_Chi_Minh");

    $category = mysqli_query($conn, "SELECT * FROM  category");

 if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
    $categoryName = $_POST['category-name'];
    $title = $_POST['title'];

    $sql = "INSERT INTO category (category_name,title) value ('$categoryName', '$title')";
    $query = mysqli_query($conn,$sql);
    if($query){
        header("Location: ./category.php");
    }
    else{
        echo "loi";
    }
}

// xóa
if(isset($_REQUEST['del'])&&($_REQUEST['del'])){
    $delid = intval($_GET['del']);
    $sql = "DELETE FROM category WHERE id = $delid";
    $query = mysqli_query($conn,$sql);
    if($query){
        header("Location: ./category.php");
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
                    <div class="add-category">
                        <form action="" method="POST">
                            <h5>Danh mục</h5>
                            <p>Tên danh mục</p>
                            <input type="text" name="category-name" id="">
                            <p>Tên tiêu đề</p>
                            <input type="text" name="title" id="">
                            <input type="submit" value="Thêm" name ="themmoi" class="btn-add">
                        </form>
                    </div>
                    <!-- <div class="change-category">
                        <form action="" method="POST">
                            <h5>Danh mục</h5>
                            <p>Tên danh mục</p>
                            <input type="text" name="category-name" id="">
                            <p>Tên tiêu đề</p>
                            <input type="text" name="title" id="">
                            <input type="submit" value="cập nhật" name ="capnhats" class="btn-add">
                        </form>
                    </div> -->
                    <div class="category">
                        <form action="#">
                            <h5>Danh sách danh mục</h5>
                            <table class="show-category">
                                <thead>
                                    <tr class="title">
                                        <td>ID</td>
                                        <td>Tên danh mục</td>
                                        <td>Tiêu đề</td>
                                        <td>Quản lý</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($category as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key + 1 ?></td>
                                            <td><?php echo $value['category_name'] ?></td>
                                            <td><?php echo $value['title'] ?></td>
                                            <td>
                                                <a href="./edit-category.php?id=<?php echo $value['id']?>" class=" btn-add btn-change">Sửa</a>
                                                <a href="./category.php?del=<?php echo $value['id']?>" class="btn-add btn-delete" onclick="return confirm('Bạn chắc chắn muốn xóa?');" >Xóa</a>
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
    <script src="javascript.js"></script>
</body>
</html>