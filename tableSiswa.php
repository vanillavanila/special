<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location:../register.php");
    exit();
}


$konek = mysqli_connect("localhost","root","","aplikasi");

$masuk = mysqli_query($konek, "SELECT * FROM table_siswa");

// if(isset($_POST['export_excel'])){
    // header("Content-type: application/vnd-ms-excel");
    // header("Content-Disposition: attachment; filename=export-to-excel.xls");

    // untuk membuat excel hanya menampilkan tabel data saja
    // echo '<table border = "1">';
    // echo '
    //     <tr>
    //         <th>No</th>
    //         <th>NIS</th>
    //         <th>Nama</th>
    //         <th>Kelas</th>
    //     </tr>
    // ';

    // $no = 1;
    // while($row = mysqli_fetch_assoc($masuk)){
    //     echo "
    //         <tr>
    //             <td>{$no}</td>
    //             <td>{$row['nis']}</td>
    //             <td>{$row['nama']}</td>
    //             <td>{$row['kelas']}</td>
    //         </tr>
    //     ";
    //     $no++;
    // }

    // echo '</table>';
    // exit(); // untuk menghentikan output HTML lain
// }

if(isset($_SESSION['nis'])){
    $nis_siswa = $_SESSION['nis'];
}

if(isset($_POST['submit'])){

    $perubahan = $_POST['update'];

    $query = "INSERT INTO perubahan (nis_siswa, perubahan) VALUES ($nis_siswa,'$perubahan')";

    $hasil = mysqli_query($konek,$query);

    

}


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
            <h1 class="text-light text-center py-2">ADMIN</h1>
            <hr class="text-light ">

            <!-- Menu Buttons -->
            <div class="button d-flex flex-column my-4 gap-5">
                <a href="formAdmin.php" class="btn btn-danger btn-lg"><i class="bi bi-house-dash"></i>Home</a>
                <a href="../LaporanMasalah/cekPerubahan.php" class="btn btn-danger text-light">Lihat Komentar</a>
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
        <!-- <div class="dropdown">
  <button class="burger btn btn-dark d-flex flex-column" type="button" data-bs-toggle="dropdown" aria-expanded="false">
   <div></div>
   <div></div>
   <div></div>
  </button>
    <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Back to Home page</a></li>
    <li><a class="dropdown-item" href="#">Contact</a></li>
    <li><a class="dropdown-item" href="../logOut.php">Log-out</a></li>
    </ul> -->
    </div>
    </div>
   <div class="x_content m-3 p-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand text-danger fs-1" href="#"></a>


        <!-- memasukan excel ke database -->
         <div style="margin: auto;width:600px;padding:20px;" class="w-50 d-block justify-content-center">
                <?php include ("excel.php") ?>
                   
             <form action="tableSiswa.php" method="post" enctype="multipart/form-data">
               <div class="mb-3">
                <label for="upload-file" class="form-label">Upload File Excel</label>
                <input class="form-control" type="file" id="upload-file" name="filexls" required>
                <div class="form-text" id="file-name">Belum ada file yang dipilih</div>
                </div>

                 <div class="col-auto ">
                     <input type="submit" name="upload" value="Upload File XLS/XLSX" class="btn btn-primary" style="cursor: pointer;">
                 </div>
             </form>
         </div>
        <!-- endd -->

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

<!-- Modal Login -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header d-flex flex-column">
        <h5 class="modal-title" id="modalLabel">Masukkan Data untuk Melanjutkan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <form action="tableSiswa.php" method="post">
            <div class="mb-3">
                <label>NIS</label>
                <input type="text" name="nis" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Kelas</label>
                <input type="text" name="kelas" class="form-control" required>
            </div>
             <div class="mb-3">
                <label>Jurusan</label>
                <input type="text" name="jurusan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            </div>
            <button type="submit" name="next" class="btn btn-primary w-100">Next</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt-4">
    <table class="table table-bordered bg-light text-dark w-screen">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Aksi</th>
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
    <td class="d-flex p-2 justify-content-evenly rounded">
        <a href="hapusDataSiswa.php?nis=<?=$data['nis'] ?>" class="bi bi-trash-fill fs-4" onclick="return confirm('yakin ingin menghapus data?')"></a>
        <a href="updateSiswa.php?nis=<?=$data['nis'] ?>" class="bi bi-pencil-square fs-4"></a>
    </td>
</tr>
<?php $no++; endwhile; ?>

        </table>
        </div>

        <!--  -->
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