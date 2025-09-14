<?php

    $konek = mysqli_connect("localhost","root","","aplikasi");
    
    $tugas = mysqli_query($konek, "SELECT * FROM tugas_siswa WHERE kelas IN ('X','XI', 'XII') ");

    // while($data = mysqli_fetch_array($tugas)) {
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    // }


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

        .sidebar::-webkit-scrollbar{
            display: none;
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
        
        dialog form .close{
            position: absolute;
            bottom: 0;
            right: 0;
        }

        dialog::-webkit-scrollbar{
            display: none;
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
            <h1 class="text-light text-center py-2">SISWA</h1>
            <hr class="text-light ">

            <!-- Menu Buttons -->
            <div class="button d-flex flex-column my-4 gap-5">
                <a href="../formGuru/tableGuru.php" class="btn btn-info btn-lg text-light"><i class="bi bi-house-dash p-2"></i>Home</a>
                <!-- <a href="../LaporanMasalah/formPesan.php" class="btn btn-info text-light">Cek Pesanan</a>
                <a href="#" class="btn btn-info text-light">Lihat Masalah</a> -->
                <a href="#" class="btn btn-info text-light">Status</a>
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
      <strong class="fs-1 text-light bg-info rounded-2 w-75 text-center">Tabel Tugas Siswa</strong>
        <i class="fas fa-info-circle me-1 fs-1"></i>
        <div class="dropdown">
  <button class="burger btn btn-dark d-flex flex-column" type="button" data-bs-toggle="dropdown" aria-expanded="false">
   <div></div>
   <div></div>
   <div></div>
  </button>
    <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Back to Home page</a></li>
    <li><a class="dropdown-item" href="#">Contact</a></li>
    <li><a class="dropdown-item" href="../logOut.php">Log-out</a></li>
    </ul>
    </div>
    </div>
   <div class="x_content m-3 p-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
    <div class="container">
        <h1 class="text-secondary">Dashboard</h1>
        <a class="navbar-brand text-danger fs-1" href="#"></a>

        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon fs-2"></span>
        </button>
        <div class="collapse navbar-collapse p-3 w-100 d-flex justify-content-between gap-2" id="navbarSupportedContent">
            
        <!-- <div class="d-flex gap-5 "> -->


            <form action="formAdmin.php" method="POST" class="d-flex ms-auto">
                <input class="form-control me-2" name="cari" type="search" placeholder="Cari nama" required>
                <button class="btn btn-outline-success bi bi-search" type="submit" name="search"></button>
            </form>

            <button class="bi bi-list btn btn-outline-primary fs-5" id="opneModal"></button>
            <dialog id="modal" class="border-0 w-25 h-50 overflow-hidden bg-light">
                <div class="excel w-75 h-25 bg-success p-2 rounded-3 ms-4">
                    <a href="../localServer/template.xlsx" class="text-decoration-none
                        text-light">download template 
                        <i class="bi bi-download fs-3 ms-2"></i>
                    </a>
                </div>
            <form class="position-absolute d-flex justify-content-center bottom-0 left-0 bg-light right-4 w-100">
                <button id="closeModal" class="btn btn-outline-secondary w-50">close</button>
            </form>         
            </dialog>
            
        </div>
    </div>
</nav>

<div class="container-fluid mt-4">
    <table class="table table-bordered bg-light text-dark w-screen">
        <thead class="table-secondary">
            <tr>
                <th>NIS Siswa</th>
                <th>Tugas Siswa</th>
                <th>Keterangan</th>
                <th>Jenis</th>
                <th>Kelas</th>
                <th>Tanggal</th>
                <th>Dowload</th>
            </tr>
        </thead>

        <?php
        while($data = mysqli_fetch_array($tugas)):
        ?>

        <tr>
            <td><?=$data['nis_siswa'] ?></td>
            <td><?=$data['file_tugas'] ?></td>
            <td><?=$data['keterangan'] ?></td>
            <td><?=$data['jenis'] ?></td>
            <td><?=$data['kelas'] ?></td>
            <td><?=$data['tanggal'] ?></td>
            <td><a href="./tugas/<?=$data['file_tugas'] ?>">download</a></td>
        </tr>

        <?php
         endwhile;
        ?>
        </table>
</div>


</div>
   </div>
</body>
<script>


    const opneModal = document.getElementById('opneModal');
    const dialog = document.getElementById('modal');
    const closeModa = document.getElementById('closeModal');
    
    opneModal.addEventListener('click', () => {
        dialog.showModal();
    })

    closeModal.addEventListener('click', () => {
        dialog.closest();
    });

      document.getElementById('upload-file').addEventListener('change', function() {
    const fileName = this.files[0]?.name || 'Belum ada file dipilih';
    document.getElementById('file-name').textContent = 'File dipilih: ' + fileName;
  });
</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>