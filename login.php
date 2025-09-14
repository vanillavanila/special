<?php 

session_start();

$konek = mysqli_connect("localhost","root","","aplikasi");

if(isset($_POST['login'])){

    $nip = mysqli_real_escape_string($konek, $_POST['nip'] ?? '');
    $nama = mysqli_real_escape_string($konek, $_POST['nama'] ?? '');
    $username = mysqli_real_escape_string($konek, $_POST['username'] ?? '');
    $password = mysqli_real_escape_string($konek, $_POST['password'] ?? '');
    $role = mysqli_real_escape_string($konek, $_POST['role'] ?? '');

    $query = mysqli_query($konek, "SELECT * FROM user WHERE nip= '$nip' and username = '$username'");

    $validasi = mysqli_num_rows($query);

    if($validasi > 0){
        $result = mysqli_fetch_assoc($query);

            if($result['role'] == $role){
                $_SESSION['login'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
                $_SESSION['nip'] = $result['nip'];

                // echo $result['nip'];
                // exit();
                
                if($nip !== null){
                    $_SESSION['nip'] = $nip;
                }
    
                if($role == "admin"){
                    echo '<script>alert("Selamat datang di halaman admin");
                    window.location.href="./formAdmin/formAdmin.php";</script>';
                }elseif($role == "guru"){
                    echo '<script>alert("Selamat datang di halaman guru");
                    window.location.href="./formGuru/formGuru.php";</script>';
                }elseif($role == "kabeng"){
                    echo '<script>alert("Selamat datang di halaman kabeng");
                    window.location.href="./kabeng/kabeng.php";</script>';
                }
            }else{
                $error = "Role yang anda masukan tidak valid";
            }
        }else{
             $error = "gagal login periksa nip atau password anda";
        }

        }



// session_start();

// $konek = mysqli_connect("localhost", "root", "", "aplikasi");

// if (isset($_POST['login'])) {
//     // $nama = mysqli_real_escape_string($konek, $_POST['nama']);
//     $username = mysqli_real_escape_string($konek, $_POST['username']);
//     $password = mysqli_real_escape_string($konek, $_POST['password']);
//     $role     = mysqli_real_escape_string($konek, $_POST['role']);
//     $nip      = isset($_POST['nip']) ? mysqli_real_escape_string($konek, $_POST['nip']) : null;

//     // Ambil user berdasarkan username dan password saja
//     $query = mysqli_query($konek, "SELECT * FROM login  WHERE username = '$username' AND password = '$password'");
//     $validasi = mysqli_num_rows($query);

//     if ($validasi > 0) {
//         $result = mysqli_fetch_assoc($query);

//         if ($result['role'] === $role) {
//             // Login berhasil
//             $_SESSION['login'] = true;
//             $_SESSION['id'] = $result['id'];
//             $_SESSION['username'] = $username;
//             $_SESSION['role'] = $result['role'];

//             // Simpan nip jika ada
//             if ($nip !== null) {
//                 $_SESSION['nip'] = $nip;
//             }

//             if ($role === "admin") {
//                 echo '<script>alert("Selamat datang di halaman admin");
//                 window.location.href="./formAdmin&Guru/formAdmin.php";</script>';
//             } elseif ($role === "guru") {
//                 echo '<script>alert("Selamat datang di halaman guru");
//                 window.location.href="./formAdmin&Guru/formGuru.php";</script>';
//             } elseif($role === "kabeng") {
//                  echo '<script>alert("Selamat datang di halaman kabeng");
//                 window.location.href="./kabeng.php";</script>';
//             }
//         } else {
//           $error = "Role yang anda masukan tidak valid";
//         }

//     } else {
//        $error = "gagal login periksa username atau password anda";
//     }
// }


?>
