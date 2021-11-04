<?php

include "koneksi.php";

// cek sudah login atau belum
session_start();
if (!isset($_SESSION["login"])) {

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
    <title>Page 256 | Peramalan</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Texturina:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style_index.css">
    <link rel="stylesheet" href="css/style_peramalan.css">

</head>

<!--Header-->

<div class="judul">

<h1>APLIKASI FORECASTING - PERAMALAN PENJUALAN - 256</h1>

</div>


<nav>

    <ul>
        <li>
            <a href="index.php">Halaman Utama</a>
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



<div class="peramalan">

</div>

<body>
    <div class="container_peramalan">

        <form id="form1" name="form1" method="post" action="hasil_prediksi.php">
            <p> Peramalan Penjualan Untuk </P>

            <select name="list_pilihan" id="list_pilihan">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <p> Minggu berikutnya </P>

            <button type="submit" name="prediksi" id="prediksi" value="prediksi">Prediksi</button>

        </form>


    </div>
</body>

</html>