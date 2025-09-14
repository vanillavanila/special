<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location:../register.php");
    exit();
}

$konek = mysqli_connect("localhost", "root", "", "aplikasi");


if (isset($_GET['nip'])) {
    $data = $_GET['nip'];
    $query = "SELECT * FROM user WHERE nip = '$data'";
    $hasil = mysqli_query($konek, $query);
    $result = mysqli_fetch_assoc($hasil);
}

if (isset($_POST['update'])) {
    $nip_lama = $_POST['nip_lama']; // nip lama sebagai acuan WHERE
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = password_hash($_POST[$password], PASSWORD_DEFAULT );
    $role = $_POST['role'];

    // Jika password diisi, update password, kalau tidak, jangan update password
    if (!empty($password)) {
        $updatePassword = "`password` = '$password',";
    } else {
        $updatePassword = "";
    }
    
    $query = "UPDATE `user` SET 
        `nip` = '$nip',
        `nama` = '$nama',
        `username` = '$username',
        $updatePassword
        `role` = '$role'
        WHERE nip = '$nip_lama'";

    mysqli_query($konek, $query);

    echo '
    <script>
        alert("Data berhasil diupdate");
        window.location.href= "formAdmin.php";
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
    <link rel="stylesheet" href="src/output.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 text-black">
    <div class="flex justify-center py-10">
        <form action="update.php" method="post" class="bg-white shadow-md p-8 rounded w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Update Data</h2>

            <!-- NIP (hidden for original value) -->
            <input type="hidden" name="nip_lama" value="<?= $result['nip'] ?>">

            <!-- NIP -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">NIP</label>
                <input type="number" name="nip" class="w-full border rounded p-2" value="<?= $result['nip'] ?>" required>
            </div>

            <!-- Nama -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Nama</label>
                <input type="text" name="nama" class="w-full border rounded p-2" value="<?= $result['nama'] ?>" required>
            </div>

            <!-- Username -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Username</label>
                <input type="text" name="username" class="w-full border rounded p-2" value="<?= $result['username'] ?>" required>
            </div>

            <!-- Password (kosongkan untuk tidak update) -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Password (kosongkan jika tidak ingin mengubah)</label>
                <input type="password" name="password" class="w-full border rounded p-2">
            </div>

            <!-- Role -->
            <div class="mb-6">
                <label class="block text-sm font-medium mb-1">Role</label>
                <select name="role" class="w-full border rounded p-2" required>
                    <option disabled <?= $result['role'] == '' ? 'selected' : '' ?>>Pilih Role</option>
                    <option value="guru" <?= $result['role'] == 'guru' ? 'selected' : '' ?>>Guru</option>
                    <option value="admin" <?= $result['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                </select>
            </div>

            <button type="submit" name="update" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
                Update
            </button>
        </form>
    </div>
</body>
</html>
