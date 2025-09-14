<?php

$conn = mysqli_connect("localhost","root","","aplikasi");

if(isset($_GET['id'])){
    $data = intval($_GET['id']); // mencegah SQL injection jika ID numerik

    $query2 = "UPDATE `pesanan` SET `status` = 'sudah disediakan' WHERE id = '$data'";

    $ubah2 = mysqli_query($conn, $query2);

    header("Location:kabeng.php");
    exit();

} 

?>