<?php 
$conn = mysqli_connect('localhost','root','','gtpt');
mysqli_set_charset($conn,'utf8');
// session_start();
if(!isset($_SESSION)){ 
    session_start();
}

?>