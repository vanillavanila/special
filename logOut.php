<?php

session_start();
session_destroy();

echo '
    <script>
        alert("log-out berhasil")
        window.location.href="index.php";
    </script>
';

exit();


?>