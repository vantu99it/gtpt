<?php 
 include "../include/connect.php";

    $role = (isset($_SESSION['role']))? $_SESSION['role']:[];
    $checkRole = $role['role'];
?>
<div class="home-list-room">
            <div class="container home-list-room-chil">
                <div class="list_room">
                    <a href="#"><i class="back fa-regular fa-square-caret-left"></i></a>
                    <a class="list_admin" href="#">Trang quản lý phòng trọ</a>
                </div>
                <div class="list_room_right">
                    <div class="img-avatar">
                        <a href="#">
                            <img src="http://bold.vn/wp-content/uploads/2019/05/bold-academy-5.jpg" alt="avatar">
                        </a>
                    </div>
                    <i class="icon-logout fas fa-sort-down"></i>
                    <div class="logout">
                        <a  href="#">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="list_manager">
            <div class="container menu">
                <a class="back_home_a" href="../index.php"><i class="back_home fas fa-home"></i></a>
                <ul class="menu-chil">
                <?php if(isset($checkRole)&& $checkRole == 1){ ?>
                    <li><a href="category.php">Danh mục</a></li>
                    <li><a href="user.php">Người dùng</a></li>
                    <li><a href="district.php">Khu vực</a></li>
                    <li><a href="post-admin.php">Bài viết</a></li>
                    <li><a href="../index.php">Quay về trang chủ</a></a></li>
                <?php } else{?>
                    <li><a href="post.php">Bài viết</a></li>
                    <li><a href="../index.php">Quay về trang chủ</a></a></li>
                    <?php }?>
                </ul>
            </div>