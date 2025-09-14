<?php 
session_start();

$konek = mysqli_connect("localhost", "root", "", "aplikasi");

if (isset($_POST['simpan'])) {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Cek apakah NIP sudah ada
    $cek = mysqli_query($konek, "SELECT * FROM user WHERE nip = '$nip'");
    
    if (mysqli_num_rows($cek) > 0) {
        echo '<script>
            alert("NIP sudah terdaftar. Silakan gunakan NIP lain.");
        </script>';
    } else {
        $query = mysqli_query($konek, "INSERT INTO user (nip,nama,username,password,role) VALUES 
            ('$nip','$nama','$username','$password','$role')");

        if ($query) {
            echo '<script>
                alert("Data berhasil disimpan!");
                window.location.href="../formAdmin/formAdmin.php";
            </script>';
        } else {
            echo '<script>
                alert("Gagal menyimpan data: ' . mysqli_error($konek) . '");
                window.location.href="../akun.php";
            </script>';
        }
    }
}
?>
