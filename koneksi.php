<?php

// session_start();
// if (!isset($_SESSION["login"])) {

//     echo "
//         <script>
//         alert('Maaf Anda Tidak Memiliki Akses Kehalaman ini! Silahkan Login!');
//             document.location.href='login.php';
//         </script>
//     ";
//     //header("Location: login.php");

//     exit;
// }
//cek sudah login atau belum


    //koneksi ke databse mysqli

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "dbforecasting_256";

    $koneksi = mysqli_connect($host, $username, $password, $database);

    if (!$koneksi) 
    {

        die("Koneksi Terputus");

    }  // else {
        
       // echo "Koneksi Berhasil";

   // }


?>