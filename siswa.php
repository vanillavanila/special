<?php
session_start();

$konek = mysqli_connect("localhost","root","","aplikasi");


if(isset($_POST['kirim'])){
    
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $password = $_POST['password'];

     $cek = mysqli_query($konek, "SELECT * FROM table_siswa WHERE nis = '$nis'");

    //  $validasi = mysqli_num_rows($query);
    
     if(mysqli_fetch_assoc($cek) > 0){
         echo '
         <script>
             alert("NIS sudah digunakan")
             window.location.href="siswa.php"
         </script>
         ';
     }else{
        
         $query = mysqli_query($konek, "INSERT INTO table_siswa (nis, nama, kelas, jurusan, password) VALUES ($nis,'$nama','$kelas','$jurusan', '$password')");

         if($query){
              echo '<script>
                alert("Data berhasil disimpan!");
                window.location.href="../formAdmin/formAdmin.php";
            </script>';
         }else{
              echo '<script>
                alert("Data gagal disimpan!");
                window.location.href="siswa.php";
            </script>';
         }
     }
   exit();
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Sekolah</title>
     <link rel="stylesheet" href="./src/output.css">
    <link rel="stylesheet" href="./css/akun.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<style>
    *{
        overflow: hidden;
    }
</style>
<body class="bg-[url('../aset/rplMedia.jpg')] w-screen h-screen bg-cover bg-center">
 <div class="flex justify-center p-10">
        <form action="siswa.php" method="post" enctype="multipart/form-data" class="bg-white shadow-md p-8 rounded w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Data Siswa</h2>

            <!-- NIS -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">NIS</label>
                <input type="number" name="nis" class="w-full border rounded p-2" required>
            </div>

            <!-- Nama -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Nama</label>
                <input type="text" name="nama" class="w-full border rounded p-2" required>
            </div>

            <!-- Kelas -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Kelas</label>
                <input type="text" name="kelas" class="w-full border rounded p-2" required>
            </div>

            <!-- JUrusan -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Jurusan</label>
                <input type="text" name="jurusan" class="w-full border rounded p-2" required>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password" class="w-full border rounded p-2" required>
            </div>

            <button type="submit" name="kirim" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
                Kirim
            </button>

        </form>
    </div>
</body>
</html>