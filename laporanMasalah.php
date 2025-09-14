<?php

session_start();

$conn = mysqli_connect("localhost","root","","aplikasi");

if(isset($_SESSION['username'])){

    $data = $_SESSION['username'];
    
}

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $nip = $_SESSION['nip'];
    $nama =mysqli_real_escape_string($conn, $_POST['nama']);
    $masalah = mysqli_real_escape_string($conn, $_POST['masalah']);
    $status = 'belum';

    $query = "INSERT INTO masalah (nama,masalah,username,status,nip) VALUES ('$nama', '$masalah','$data','$status','$nip')";

    mysqli_query($conn,$query);

    if(isset($_POST['laporkan'])){
        echo '
        <script>
            alert("laporan berhasil dikirim")
            window.location.href="../formGuru/laporan.php"
        </script>
        ';
    }else{
        echo '
        <script>
            alert("gagal mengirim laporan")
             window.location.href="laporanMasalah.php"
        </script>
        ';
    }

    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Sekolah</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-[url('../aset/rplMedia.jpg')] w-screen h-screen  bg-center bg-cover">
    <div class="flex justify-center py-10">
        <form action="laporanMasalah.php" method="POST" class="bg-white shadow-md p-8 rounded w-full max-w-md">
            <div class="logo flex flex-row justify-center gap-15">
                <img src="../aset/smk.png" alt="#" width="50px" height="auto" >
                <img src="../aset/rplLogo.jpg" alt="#" width="50px" height="auto" class="rounded-2xl">
            </div>
            <h2 class="text-2xl font-bold mb-6 text-center ">Laporkan Masalah</h2>

            <!-- NAMA -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Nama</label>
                <input type="text" name="nama" class="w-full border rounded p-2" placeholder="nama" required>
            </div>

            <!-- MASALAH -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Masalah</label>
                <input type="text" name="masalah" class="w-full border rounded p-2" placeholder="Tulis masalah disini" required>
            </div>

            <button type="submit" name="laporkan" class="w-full bg-blue-600 text-white cursor-pointer p-2 rounded hover:bg-blue-700">
                laporkan
            </button>
            <button type="reset" name="batal" class="w-full mt-2 bg-red-600 text-white cursor-pointer p-2 rounded hover:bg-red-700" onclick="window.location.href='../formGuru/formGuru.php'">
                batal
            </button>
        </form>
    </div>
</body>
</html>