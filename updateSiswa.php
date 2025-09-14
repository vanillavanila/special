<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location:../register.php");
    exit();
}


$konek = mysqli_connect("localhost","root","","aplikasi");

if(isset($_GET['nis'])){
    $data = $_GET['nis'];
    $query = "SELECT * FROM table_siswa WHERE nis = '$data'";
    $hasil = mysqli_query($konek,$query);
    $result = mysqli_fetch_assoc($hasil);
}

if (isset($_POST['update'])) {
    $nis_lama = $_POST['nis_lama'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $password = $_POST['password'];

    // Mulai query
    $query2 = "UPDATE table_siswa SET 
        nis = '$nis',
        nama = '$nama',
        kelas = '$ke las'";

    // Tambah password jika tidak kosong
    if (!empty($password)) {
        $query2 .= ", password = '$password'";
    }

    // Tambahkan WHERE
    $query2 .= " WHERE nis = '$nis_lama'";

    // Eksekusi query
    mysqli_query($konek, $query2) or die("Query Error: " . mysqli_error($konek));

    echo '
    <script>
        alert("Data berhasil diupdate");
        window.location.href = "tableSiswa.php";
    </script>
    ';
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
        <form action="updateSiswa.php" method="post" enctype="multipart/form-data" class="bg-white shadow-md p-8 rounded w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Update Data Siswa</h2>

            <!-- NIS LAMA -->
            <input type="hidden" name="nis_lama" value="<?=$result['nis']?>">

            <!-- NIS -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">NIS</label>
                <input type="number" name="nis" class="w-full border rounded p-2" placeholder="NIS" value="<?=$result['nis'] ?>" required>
            </div>

            <!-- Nama -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Nama</label>
                <input type="text" name="nama" class="w-full border rounded p-2" placeholder="Nama" value="<?=$result['nama'] ?>" required>
            </div>

            <!-- Kelas -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Kelas</label>
                <input type="text" name="kelas" class="w-full border rounded p-2" placeholder="Kelas" value="<?=$result['kelas'] ?>" required>
            </div>

            <!-- Username -->
            <!-- <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Username</label>
                <input type="text" name="username" class="w-full border rounded p-2" required>
            </div> -->

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password" class="w-full border rounded p-2" placeholder="Password" value="<?=$result['password'] ?>" required>
            </div>

            <div class="button w-75 flex gap-5 ms-10">
                <button type="submit" name="update" class="w-50 bg-blue-600 text-white p-2 rounded hover:bg-blue-700 cursor-pointer">
                    update
                </button>
    
                <button type="reset" name="batal" class="w-50 bg-red-600 text-white p-2 rounded hover:bg-red-700 cursor-pointer" id="batal">
                    batal
                </button>
            </div>


        </form>
    </div>
</body>

<script>
    const batal = document.getElementById('batal');
    batal.addEventListener('click', () =>{
        window.location.href= "tableSiswa.php"
    })
</script>

</html>