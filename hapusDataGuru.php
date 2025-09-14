<?php 
$konek = mysqli_connect("localhost", "root", "", "aplikasi");

if (isset($_GET['nip'])) {

    $data = $_GET['nip'];

    $query = "DELETE FROM user WHERE nip='$data'";
    
    mysqli_query($konek, $query);

    header("Location:formAdmin.php ");
    exit(); 


}


?>
