<?php 
$konek = mysqli_connect("localhost", "root", "", "aplikasi");

if (isset($_GET['id'])) {

    $data = $_GET['id'];

    $query = "DELETE FROM laporan_perubahan WHERE id='$data'";
    
    mysqli_query($konek, $query);

    header("Location:cekPerubahan.php ");
    exit(); 


}


?>
