<?php 
 include "../include/connect.php ";
 
 $id = $_GET['id'];
$category = mysqli_query($conn, "SELECT * FROM  category WHERE id = $id");
$row = mysqli_fetch_assoc($category);



 if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
    $ids = $_POST['id'];
    $categoryName = $_POST['category-name'];
    $title = $_POST['title'];

    $sql = "UPDATE category SET category_name = '$categoryName', title = '$title' WHERE id = $ids";
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
                        <input type="hidden" value ="<?php echo $row['id'] ?>" name = "id">
                        <input type="text" name="category-name" id="" value="<?php echo $row['category_name'] ?>">
                        <p>Tên tiêu đề</p>
                        <input type="text" name="title" id="" value="<?php echo $row['title'] ?>">
                        <input type="submit" value="Cập nhật" name ="capnhat" class="btn-add">
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