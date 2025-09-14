<?php

session_start();

$konek = mysqli_connect("localhost", "root", "", "aplikasi");

// echo $_SESSION['nis'];
// exit();

if(isset($_GET['nis'])){
    $siswa = $_GET['nis'];

    $query2 = "DELETE FROM table_siswa WHERE nis = $siswa ";
    mysqli_query($konek,$query2);

    header("Location:tableSiswa.php");
    exit();
    
}


?>