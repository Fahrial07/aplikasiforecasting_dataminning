<?php

include "koneksi.php";

//cek sudah login atau belum
session_start();

if (!isset($_SESSION["login"])) {

    // header("Location: login.php");

    echo "
        <script>
            document.location.href='login.php';
        </script>
    ";

    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Aplikasi Forecasting 201951256</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Texturina:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style_index.css">

</head>

<div class="judul">

    <h1>APLIKASI FORECASTING - PERAMALAN PENJUALAN - 256</h1>

</div>

<nav>

    <ul>
        <li>
            <a href="">Halaman Utama</a>
        </li>
        <li>
            <a href="show_data_penjualan.php">Data Penjualan</a>
        </li>
        <li>
            <a href="peramalan.php">Peramalan</a>
        </li>
        <li>
            <a href="logout.php">Logout</a>
        </li>
    </ul>

</nav>

<body>


    <div class="container">

        <?php
        $query = "SELECT * FROM penjualan";

        $resultdata = mysqli_query($koneksi, $query);

        $row = mysqli_num_rows($resultdata)



        ?>

        <div class="jml">

            <p> Jumlah Data  <span> <?php echo $row; ?></span> </P>

        </div>


    </div>


</body>

</html>