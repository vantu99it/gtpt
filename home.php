<?php
include "./include/connect.php";
date_default_timezone_set("Asia/Ho_Chi_Minh");
$sql = "SELECT m.*, u.name, u.phone, ca.category_name FROM motel m join user  u on u.id = m.user_id join category ca on ca.id = m.category_id";
$query= mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($query);
  $length = mysqli_num_rows($query);
  $username = $data['name'];
  $title = $data['title'];
  $area = $data['area'];
  $address = $data['address'];
  $image = $data['images'];
  $price = $data['price'];
  $time = $data['created_at'];
  $row = mysqli_fetch_array($query);
 var_dump($row);

$timenow = time();
$date = strtotime($time);
$tru = $timenow - $date;
$time = floor($tru/60/60/24);
$kq = localtime($tru,true);
echo 'hien tai '.$timenow;
echo"</br>";
echo "ngay ".$date;
echo"</br>";
echo "tru".$tru;
echo "<pre>";
echo $time;
echo "<pre>";
$today = localtime($tru,true);
print_r($today);
echo "</pre>";
// echo $kq['tm_hours'];

if(floor($tru/60/60/24)==0){
    if(floor($tru/60/60)==0){
        echo(ceil($tru/60)." phút trước");
    }else{
        echo(floor($tru/60/60)." tiếng trước");
    }
}else{
    echo(floor($tru/60/60/24)." ngày trước");
}

$tien =(int)'15100';
$trieu = $tien/1000000;
$foemat = number_format($tien,0,",",".");
echo "<pre>";
$bien =0;
if(strlen($tien)>=7){
    $bien =  $tien/1000000;
    echo $bien." Triệu/tháng";
}else {
    $bien = number_format($tien,0,",",".");
    echo $bien." đồng/tháng";
}

if($tien/10)
echo "<pre>";
echo strlen($tien);
echo "<pre>";
echo $foemat;
echo "<pre>";
echo $bien;
?>