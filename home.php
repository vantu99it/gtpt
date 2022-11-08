<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
$timenow = time();
$date = strtotime('2022-11-02 12:10:20');
$tru = $timenow - $date;
$time = floor($tru/60/60/24);
$kq = localtime($tru,true);
echo 'hien tai '.$timenow;
echo"</br>";
echo $date;
echo"</br>";
echo $tru;
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
    echo(floor($tru/60/60/24));
}

$tien =(int)'151000';
$trieu = $tien/1000000;
$foemat = number_format($tien,0,",",".");


$bien =0;
if(strlen($tien)>=7){
    $bien =  $tien/1000000;
}else {
    $bien = number_format($tien,0,",",".");
}

if($tien/10)
echo "<pre>";
echo strlen($tien);
echo "<pre>";
echo $foemat;
echo "<pre>";
echo $bien;
?>