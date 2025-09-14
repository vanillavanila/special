<?php

session_start();


$konek = mysqli_connect("localhost","root","","aplikasi");


// if(isset($_SESSION['nis'])){

//     echo $_SESSION['nis'];
//     exit();
// }

if(isset($_POST['next'])){
    
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];
    $password = $_POST['password'];

    $query = mysqli_query($konek,"SELECT * FROM table_siswa WHERE nis='$nis' ");
    
     $validasi = mysqli_num_rows($query);

     if($validasi > 0){

        $result = mysqli_fetch_assoc($query);

        if($result['kelas'] == $kelas && $result['password'] == $password ){
            $_SESSION['next'] = true;
            $_SESSION['kelas'] = $kelas;
            $_SESSION['password'] = $password;
            $_SESSION['nis'] = $nis;

            if($nis !== null){
                $_SESSION['nis'] = $nis;
            }

            if($kelas == "X"){
                echo '<script>alert("Selamat datang di halaman kelas X");
                window.location.href="../kelas/klsX.php";</script>';
            }elseif($kelas == "XI"){
                echo '<script>alert("Selamat datang di halaman kelas XI");
                window.location.href="../kelas/klsXI.php";</script>';
            }elseif($kelas == "XII"){
                echo '<script>alert("Selamat datang di halaman kelas XII");
                window.location.href="../kelas/klsXII.php";</script>';
            }

        }else{
         $pesan = "Gagal login periksa nis atau passowrd anda,dan pastikan kelas anda sesuai!";
        }
        }else{
            $pesan = "NIS belum terdaftar";
        }
        
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
 body{
    overflow: hidden;
 }
    form{
        color:rgb(255, 255, 255);
        background: linear-gradient(to  right,rgb(3, 13, 46),#8f68ff,#61346311);
        /* background: url(../aset/rumah.jpg); */
        background-position: center;
        background-size: cover;
        background-clip: border-box;
        background-attachment: fixed;
    }

    h2{
        background: linear-gradient(to right,rgb(124, 8, 126), #8f68ff,rgb(231, 18, 64),
        rgb(104, 237, 255),rgb(255, 255, 255));
        background-size: 200%;
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: text-gradasi 4.5s linear infinite;
    }

    @keyframes text-gradasi{
        to{
            background-position: 200%;
        }
        }

    .big{
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    form video{
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
    }
</style>
<body>
     <div class="big container-fluid p-10">
         <form action="loginSiswa.php" method="post" class="bg-white shadow-md p-8 rounded w-full max-w-md">
            
             <video autoplay loop muted playsinline>
                 <source src="../aset/roket.mp4">
             </video>
             <div class="logo flex flex-row justify-center gap-15">
                <img src="../aset/smk.png" alt="#" width="40px" height="auto" >
                <img src="../aset/rplLogo.jpg" alt="#" width="40px" height="auto" class="rounded-2xl">
            </div>
             <h2 class="text-2xl font-bold mb-6 text-center">Login di sini jika anda Siswa</h2>
             
             <?php if (isset($pesan)): ?>
                <p class="alert bg-primary text-primary text-center mt-3">
                    <?= $pesan ?>
                </p>
                <?php endif; ?>

            <!-- NIS -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">NIS</label>
                <input type="number" name="nis" class="w-full border rounded p-2" placeholder="NIS" required>
            </div>

              <!-- kelas -->
              <label class="block text-sm font-medium mb-1">Kelas</label>
            <div class="mb-4 border">
               <select name="kelas" id="jenis" class="w-full border-white p-2 rounded" >
                    <option value="#" class="text-white">Pilih Kelas</option>
                    <option value="X" style="color: black;">X</option>
                    <option value="XI" style="color: black;">XI</option>
                     <option value="XII" style="color: black;">XII</option>
                </select>
            </div>


            <!-- Password -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password" class="w-full border rounded p-2" placeholder="Password" required>
            </div>

            <div class="d-flex flex-column gap-2">
                <button type="submit" name="next" class="w-full bg-blue-600 text-white cursor-pointer p-2 rounded hover:bg-blue-700">
                    Kirim
                </button>
                <button type="reset" id="batal" name="batal" class="w-full bg-red-600 text-white cursor-pointer p-2 mt-4 rounded hover:bg-red-700">
                    Batal
                </button>
            </div>
        </form>
    </div>
</body>
<script>
    const batal = document.getElementById('batal');

    batal.addEventListener('click', () => {
        window.location.href="../index.php"
    })
</script>
</html>