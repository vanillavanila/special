<?php

    session_start();
    if(!isset($_SESSION['next'])){
        header("Location:../loginSiswa.php");
        exit();
    }


    $konek = mysqli_connect("localhost","root","","aplikasi");

    $masuk = mysqli_query($konek, "SELECT * FROM table_siswa WHERE kelas IN('XI')");
    
    $tugas = mysqli_query($konek, "SELECT * FROM guru WHERE status = 'enable' AND kelas IN ('XI') ");

    $ambil = $_SESSION['nis'] ?? null;
    if (!$ambil) {
    die("Session NIS tidak ditemukan. Silakan login ulang.");
    }

    if(isset($_POST['upload'])){
    $keterangan = $_POST['keterangan'] ?? '';
    $status = $_POST['status'] ?? '';
    $jenis = $_POST['jenis'] ?? '' ;
    $kelas = $_POST['kelas'] ?? '' ;
    $tanggal = $_POST['tanggal'] ?? '';

    $file = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $eror = $_FILES['file']['error'];
    
    $ekstensiFile = explode('.', $file);
    $ekstensiFile = end($ekstensiFile);
    
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;


   
    move_uploaded_file($tmp, '../siswa/tugas/' .$namaFileBaru);

    $query = "INSERT INTO tugas_siswa (nis_siswa, file_tugas, keterangan, jenis, kelas , tanggal) VALUES ('$ambil', '$namaFileBaru','$keterangan', '$jenis', '$kelas', '$tanggal' )";
    mysqli_query($konek,$query);
    echo "<script>alert('Tugas berhasil diupload');
    window.location.href='klsXI.php'
    </script>";
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                <a href="klsXI.php" class="btn btn-success btn-lg text-light"><i class="bi bi-house-dash"></i>Home</a>
                <a href="./kelas11/tugasKlsXI.php" class="btn btn-outline-success text-light">Cek Tugas Yang diupload</a>
                 <a href="./kelas11/tugasGuru.php" class="btn btn-outline-success text-light">Lihat Tugas atau Ujian</a>
                <a href="./kelas11/dokumen.php" class="btn btn-outline-success text-light">Lihat Dokumen</a>
                <a href="#" class="btn btn-success">Status</a>
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
      <strong class="fs-1 text-light bg-success rounded-2 w-75 text-center">Tabel Siswa Kelas XI</strong>
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
   <div class="x_content m-3 p-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
    <div class="container">
        <h1 class="text-secondary">Dashboard</h1>
        <a class="navbar-brand text-danger fs-1" href="#"></a>

        <!-- modal upload tugas -->
        <button class="w-50 bg-primary border-0 text-light fs-5 rounded-3 p-2 ms-3" id="opneDialog">upload tugas</button>
            <dialog id="dialogTugas" class="border-0 w-75 h-75 overflow-hidden bg-light">

            <div class="container-fluid p-3 overflow-y-auto">
                <h2 class="text-2xl font-bold mb-6 text-center">Upload Tugas</h2>
            <form action="klsX.php" method="post" enctype="multipart/form-data" class="overflow-y-auto bg-white row p-3 shadow-md rounded w-full max-w-md">
                
                <!-- file -->
                <div class=" col-md-4 me-2">
                    <label class="block text-sm font-medium mb-1">File</label>
                    <input type="file" name="file" class="w-full border rounded p-2" style="cursor: pointer;" required>
                </div>
    
                <!-- keterangan -->
                <div class="col-md-4 ms-5">
                    <label class="block text-sm font-medium mb-1">Keterangan</label>
                    <input type="text" name="keterangan" class="w-full border rounded p-2" placeholder="keterangan" required>
                </div>
    
    
                  <!-- jenis -->
                <div class="col-md-4 p-2">
                    <label class="block text-sm font-medium mb-1">Jenis</label>
                   <select name="jenis" id="jenis" class="w-full border p-2 rounded">
                        <option value="#">Pilih Jenis</option>
                        <option value="dokummen">Dokumen</option>
                        <option value="tugas">Tugas</option>
                        <option value="ujian">Ujian</option>
                    </select>
                </div>
    
                <!-- kelas -->
                <div class="col-md-4 p-2">
                    <label class="block text-sm font-medium mb-1">Kelas</label>
                   <select name="kelas" id="jenis" class="w-full border p-2 rounded">
                        <option value="#">Pilih Kelas</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
    
                  <!-- tanggal -->
                <div class="col-md-4 p-2">
                    <label class="block text-sm font-medium mb-1">Tanggal</label>
                    <input type="datetime-local" name="tanggal" class="w-full border rounded p-2 display-none" required>
                </div>
            </div>

            <div class="d-flex p-3">
                <button type="submit" name="upload" class="w-25 btn btn-primary col-md-1 me-2">
                    Upload
                </button>
                <button class="w-25 btn btn-danger col-md-2" type="reset">
                    batal
                </button>
            </form>
        </div>

                <form class="position-absolute d-flex justify-content-center top-0 right-0 bg-light w-25 mt-2">
                    <button class="w-25 bg-danger border-0 text-light fs-5 rounded-3 p-2 ms-2" id="closeDialog">X</button>
                </form>
            </dialog>
        <!-- modal upload tugas end -->

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
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
            </tr>
        </thead>
       <?php
$no = 1;
while($data = mysqli_fetch_array($masuk)):
?>
<tr>
    <td><?=$no ?></td>
    <td><?=$data['nis'] ?></td>
    <td><?=$data['nama'] ?></td>
    <td><?=$data['kelas'] ?></td>
    <td><?=$data['jurusan'] ?></td>
    
</tr>
<?php $no++; endwhile; ?>

        </table>
        </div>


</div>
   </div>
</body>
<script>


    const opneModal = document.getElementById('opneModal');
    const dialog = document.getElementById('modal');
    const closeModal = document.getElementById('closeModal');
    
    opneModal.addEventListener('click', () => {
        dialog.showModal();
    })

    closeModal.addEventListener('click', () => {
        dialog.closest();
    });

    const opneDialog = document.getElementById('opneDialog');
    const dialogTugas = document.getElementById('dialogTugas');
    const closeDialog = document.getElementById('closeDialog');
    
    opneDialog.addEventListener('click', () => {
        dialogTugas.showModal();
    })

    closeDialog.addEventListener('click', () => {
        dialogTugas.closest();
    });




//     document.getElementById('upload-file').addEventListener('change', function() {
//     const fileName = this.files[0]?.name || 'Belum ada file dipilih';
//     document.getElementById('file-name').textContent = 'File dipilih: ' + fileName;
//   });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
  </body>
</html>