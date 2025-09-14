<?php
// session_start();
require __DIR__ . '/../vendor/autoload.php';

$konek = mysqli_connect('localhost', 'root', '', 'aplikasi');


if(isset($_POST['upload'])){
        $err      = "";
        $ekstensi = "";
        $succces  = "";

        $file_name = $_FILES['filexls']['name']; //untukk mendapatkan nama file yang di upload
        $file_data = $_FILES['filexls']['tmp_name']; //untuk mendapatkan temorary data


        if(empty($file_name)){
            $err .= "<li>Silahkan masukan file yang kamu inginkan </li>";
        }else{
            $ekstensi = pathinfo($file_name, PATHINFO_EXTENSION);
        }

        $ekstensi_allowed = array("xls", "xlsx");
        if(!in_array($ekstensi, $ekstensi_allowed)){
            $err .= "<li><silahkan masukan file tipe  xls, atau xlsx.
            <b>$file_name</b> punya tipe <b>$ekstensi</b></li>";
        }

        if(empty($err)){
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile
            ($file_data);
           
            $spreadsheet = $reader->load($file_data);
            $sheetData = $spreadsheet->getActiveSheet()
            ->toArray();

            // echo "<pre>";
            // print_r($sheetData);
            // echo "</pre>";
            // exit;

            echo count($sheetData);
            $jumlahdata = 0;
            for ($i = 1; $i < count($sheetData); $i++) {
            $nis   = $sheetData[$i][0];
            $nama  = $sheetData[$i][1];
            $kelas = $sheetData[$i][2];
            $password = $sheetData[$i][3];

             echo $nis;


            $sql1 = "insert into table_siswa(nis,nama,kelas,password) values ($nis, '$nama', '$kelas', '$password')";

            mysqli_query($konek, $sql1);

            $jumlahdata++;

        }

        
    }
    
    if($jumlahdata > 0){
        $succces = "$jumlahdata berhaasil  dimmasukkan ke MYSQL silahkan riset browser anda";
    }

        if($err){
            ?>
            <div class="alert alert-danger">
                <ul><?php echo $err ?></ul>
            </div>
            <?php
        }

        if($succces){
            ?>
            <div class="alert alert-light bg-primary text-light">
                <?php echo $succces ?>
            </div>

            <?php

        }

    }

?>