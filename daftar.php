<?php

$conn = mysqli_connect("localhost", "root", "", "aplikasi");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST['daftar'])) {
    $username = $_POST['username'];
    $password = $_POST['password'] ?? '';

    // Cek apakah username sudah digunakan
    $cek_query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $cek_hasil = mysqli_query($conn, $cek_query);

    if (!$cek_hasil) {
        die("Query Error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($cek_hasil) > 0) {
        // Username sudah dipakai
        echo '
            <script>
                alert("Username sudah digunakan");
                window.location.href = "daftar.php";
            </script>
        ';
    } else {
        // Lanjut insert user baru
        $query_masuk = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
        $hasil_query = mysqli_query($conn, $query_masuk);

        if ($hasil_query) {
            echo '
                <script>
                    alert("Selamat, anda berhasil membuat akun.");
                    window.location.href = "index.php";
                </script>
            ';
        } else {
            echo '
                <script>
                    alert("Gagal membuat akun.");
                    window.location.href = "daftar.php";
                </script>
            ';
        }
    }
}
?>
