 <?php 

include '../formAdmin&Guru/actionPesan/hapus.php';

session_start();

if(!isset($_SESSION['login'])){
header("Location:register.php");
exit();
}

if(isset($_SESSION['id'])){
  $data = $_SESSION['id'];
}

$conn = mysqli_connect("localhost","root","","aplikasi");

$masuk = mysqli_query($conn,"SELECT * FROM pesanan") ;

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
    <div class="flex flex-col">
      <div><label for="">NIK:</label> <b>123432</b></div>
      <div><label for="">Nama:</label> <b>Nadil</b></div>
    </div>
  </div>

  <hr class="mt-5 w-full ">

  <div class="py-5">
    <div class="flex justify-between">
      <a href="../pesanan.php" class="ms-10 py-2 px-5 text-center text-white rounded-xl bg-indigo-500 cursor-pointer hover:bg-red-800">buat pesan</a>
      <a href="../formAdmin&Guru/formAdmin.php" class="me-10 py-2 px-3 text-center text-white rounded-lg bg-red-500 cursor-pointer hover:bg-sky-800">back</a>
    </div>
  </div> 

<div class="mt-5 rounded overflow-hidden">

    <div class="max-h-96 overflow-y-auto ">
      <table class="w-full table-fixed">
        <thead class="sticky top-0 bg-gray-300 z-10">
          <tr>
            <th class="w-[5%] text-center p-2">No</th>
            <th class="w-[15%] text-center p-2">id user</th>
            <th class="w-[60%] text-left p-2">Pesan</th>
            <th class="w-[15%] text-left p-2">Status</th>
            <th class="w-[20%] text-left p-2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no=1;
            while($data=mysqli_fetch_array($masuk)):
          ?> 
         
          <tr class="bg-sky-200">
            <td class="text-center p-2"><?=$no ?></td>
            <td class="p-2 text-center"><?=$data ['id_user'] ?></td>
            <td class="p-2 truncate"><?=$data ['pesanan'] ?></td>
            <td class="p-2"><?=$data ['status'] ?></td>
            <td class="p-2 whitespace-nowrap">
              <a href="../formAdmin&Guru/actionPesan/ubah.php?id=<?=$data['id'] ?>" class="bg-green-500 px-3 py-1 rounded text-white">ubah</a>
              <a href="../formAdmin&Guru/actionPesan/hapus.php?id=<?=$data['id'] ?>" class="bg-red-500 px-1 py-1 rounded text-white" name="hapus">hapus</a>
            </td>
          </tr>
          Tambahkan baris lainnya 
           <?php
           $no+=1;
          endwhile;
           ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


</body>
</html>