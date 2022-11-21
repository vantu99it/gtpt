<?php
include "../include/connect.php";
include '../include/function.php';

$role = (isset($_SESSION['role']))? $_SESSION['role']:[];
$checkRole = $role['role'];
if(isset($checkRole)){
    header('location: home.php');

}else{
    header('location: ../login.php');
}
?>