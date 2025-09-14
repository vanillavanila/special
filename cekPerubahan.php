<?php

session_start();

$konek = mysqli_connect("localhost","root","","aplikasi");



$nip = $_SESSION['nip'];

$loop = mysqli_query($konek, "SELECT * FROM laporan_perubahan");



?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apliaksi Sekolah</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="overlow-y-hidden bg-[url('../aset/gedungRpl.jpg')]">
 <div class="w-full sticky  max-w-screen-md border px-5 min-h-auto mx-auto mb-5 mt-5 bg-white rounded-sm">
  
  <div class="flex gap-10 pt-10">
    <img src="../aset/icon.jpeg" alt="" class="size-40">
  </div>

  <hr class="mt-5 w-full">

  <div class="button w-30 h-20 py-3">
    <a href="../formAdmin/formAdmin.php" class="p-2 m-2 bg bg-red-900 text-white px-3 rounded text-xl font-mono hover:bg-blue-700">back</a>
  </div>

<div class="mt-5 rounded overflow-hidden">

    <div class="max-h-96 overflow-y-auto ">
      <table class="w-full table-fixed">
        <thead class="sticky top-0 bg-gray-300 z-10">
          <tr>
            <th class="w-[5%] text-center p-2">No</th>
            <th class="w-[15%] text-center p-2">NIP Guru</th>
            <th class="w-[15%] text-center p-2">Komentar</th>
            <th class="w-[15%] text-center p-2">aksi</th>
          </tr>
        </thead>

        <?php

        $no=1;
        while($data = mysqli_fetch_array($loop)):
        ?>

        <tbody>
          <tr class="bg-sky-200">
            <td class="text-center p-2"><?=$no ?></td>
            <td class="p-2 text-center"><?=$data['nip_guru'] ?></td>
            <td  class="p-2 text-center"><?=$data['komentar'] ?></td>
            <td class="p-2 whitespace-nowrap text-center">
              <!-- <a href="" class="bg-green-500 px-3 py-1 rounded text-white">ubah</a> -->
              <a href="hapus.php?id=<?=$data['id'] ?>" class="bg-red-500 px-3 py-1 rounded text-white" name="hapus">hapus</a>
            </td>
          </tr>
          Komen masuk
        </tbody>

        <?php
        $no+=1;
        endwhile;
        ?>
      </table>
    </div>
  </div>
</div>


</body>
</html>