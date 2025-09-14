<?php

session_start();


if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location:../register.php");
    exit();
}


$konek = mysqli_connect("localhost","root","","aplikasi");

$hasil = mysqli_query($konek, "SELECT * FROM user");

if (isset($_POST['search'])) {
    $cari = mysqli_real_escape_string($konek, $_POST['cari']); 
    $query = "SELECT * FROM user WHERE nama LIKE '%$cari%'";
    $hasil = mysqli_query($konek, $query);

    if (mysqli_num_rows($hasil) === 0) {
        $pesan = "Nama tidak ditemukan";
    }

}

if(isset($_POST['next'])){
    $nip = $_POST['nip'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];


$query = mysqli_query($konek, "SELECT * FROM user WHERE nip = '$nip' AND username = '$username' AND role = '$role'");
$dataUser = mysqli_fetch_assoc($query);

if ($dataUser > 0) {
    if($role === "admin"){
        echo '
        <script>
            alert("selamat datang dihalaman admin")
            window.location.href="./formAdmin/formAdmin.php";
        </script>';
    } elseif($role === "guru") {
        echo '
        <script>
            alert("selamat datang dihalaman guru")
            window.location.href="./formGuru/formGuru.php";
        </script>';
    } else {
        echo '
        <script>
            alert("Role tidak valid");
            window.location.href="dataMasuk.php";
        </script>';
    }
} else {
    echo '
    <script>
        alert("Login gagal. Data tidak cocok.");
        window.location.href="dataMasuk.php";
    </script>';
}
}


$konek = mysqli_connect("localhost","root","","aplikasi");

$masuk = mysqli_query($konek, "SELECT * FROM table_siswa");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../icon/font/bootstrap-icons.css">
</head>
 <style>
        body {
            padding-left: 0;
        }
        @media (min-width: 768px) {
            body {
                padding-left: 25%;
            }
            .sidebar{
                height: 100vh;
                width: 50%;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 1000;
                overflow-y: auto;
             
            }

            .sidebar::-webkit-scrollbar{
                display: none;
            }
           
            #sidebarMenu{
                margin-bottom: 40%;
            }
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            overflow-y: auto;
            
        }

        .button .nav-link:hover{
            transition: all 0.1s ease-in-out;
            border-bottom: 1px solid white;
        }

        hr{
            border-bottom: 3px solid white;
        }
        .alert{
            background-color: black;
        }

        .cari{
            border: none;
            outline: none;
        }

        .burger{
            width: 40px;
            height: 45px;
            display: flex;
            justify-content: end;
        }

        .burger div{
            width: 5px;
            height: 5px;
            border-radius: 50%;
            margin: 2px 2px;
            background-color: white;
        }

        .burger .b{
            width: 5px;
            height: 5px;
            border-radius: 50%;
            margin: 2px 2px;
            background-color: black;
        }
    
    </style>
<body class="bg bg-secondary">
     <nav class="sidebar navbar bg-dark navbar-dark w-25  d-flex flex-column p-3 h-100">
        <!-- Toggle Button (visible only on small screens) -->
        <button class="btn btn-outline-light d-md-none mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
            ☰ Menu
        </button>

        <div id="sidebarMenu" class="collapse d-md-block w-100">
            <!-- Title -->
            <h1 class="text-light text-center py-2">ADMIN</h1>
            <hr class="text-light ">

            <!-- Menu Buttons -->
            <div class="button d-flex flex-column my-4 gap-5">
                <a href="#" class="btn btn-danger btn-lg"><i class="bi bi-house-dash"></i>Home</a>
                <a href="tableSiswa.php" class="btn btn-danger">Cek data siswa</a>
                <a href="../LaporanMasalah/cekPerubahan.php" class="btn btn-danger">Lihat komentar</a>
                <a href="#" class="btn btn-danger text-light">Status</a>
            </div>

            <!-- Social Media Icons -->
            <div class="d-flex flex-row gap-4 mt-auto">
                <a href="#" class="bi bi-facebook fs-3 text-light"></a>
                <a href="#" class="bi bi-instagram fs-3 text-light"></a>
                <a href="#" class="bi bi-youtube fs-3 text-light"></a>
            </div>
        </div>

    </nav>

    <div class="alert d-flex flex-row justify-content-evenly gap-5" role="alert">
        <strong class="fs-1 text-light bg-danger rounded-2 w-75 text-center">Data Masuk</strong>
        <i class="fas fa-info-circle me-1 fs-1"></i>
        <div class="dropdown">
  <button class="burger btn btn-dark d-flex flex-column" type="button" data-bs-toggle="dropdown" aria-expanded="false">
   <div></div>
   <div></div>
   <div></div>
  </button>
    <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="https://wa.me/6285934436173">Contact</a></li>
    <li><a class="dropdown-item" href="../logOut.php">Log-out</a></li>
    </ul>
    </div>
    </div>
   <div class="x_content m-4 p-2">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand text-danger fs-1" href="#"><h1>Dashboard</h1></a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon fs-2"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form action="formAdmin.php" method="POST" class="d-flex ms-auto">
                <input class="form-control me-2" name="cari" type="search" placeholder="Cari nama" required>
                <button class="btn btn-outline-success" type="submit" name="search">Cari</button>
            </form>


            <!-- <div class="ms-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Masuk Sebagai</button>
            </div> -->
            
    <div class="ms-5 d-flex gap-3">
    <div class="dropdown">
  <button class="burger btn btn-outline-secondary rounded border-0 d-flex flex-column me-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
   <div class="b"></div>
   <div class="b"></div>
   <div class="b"></div>
  </button>
    <ul class="dropdown-menu p-2">
    <li> <a href="../formAkun/akun.php" class="dropdown-item">Tambah Data <i class="bi bi-plus-lg"></i></a></li>
    <li><a href="../siswa/siswa.php" class="dropdown-item">Tambah Data Siswa<i class="bi bi-plus-lg"></i></a></li>
    </ul>
    </div>
    </div>
            </div>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <table class="table table-bordered bg-light text-dark">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while ($data = mysqli_fetch_array($hasil)) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['nip']; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['username']; ?></td>
                    <td><?= $data['role']; ?></td>
                    <td class="d-flex gap-3">
                        <a href="hapusDataGuru.php?nip=<?= $data['nip']; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                            <i class="bi bi-trash text-danger fs-5"></i>
                        </a>
                        <a href="update.php?nip=<?= $data['nip']; ?>" onclick="return confirm('Anda yakin ingin mengupdate data ini?')">
                            <i class="bi bi-pencil-square text-primary fs-5"></i>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php if (isset($pesan)): ?>
    <div class="alert alert-danger bg-danger text-light text-center mt-3">
    <?= $pesan ?>
        <?php endif; ?>
        </div>
        </div>
    </div>
   </div>
</body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>