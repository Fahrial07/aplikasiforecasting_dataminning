<?php

include "koneksi.php";

//cek sudah login atau belum
session_start();
if (!isset($_SESSION["login"])) {

    echo "
        <script>
            document.location.href='login.php';
        </script>
    ";
    //header("Location: login.php");

    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_tambah.css">
    <title>Page - 256 | Input Data </title>
</head>

<body>
    <div class="container-input">


        <div class="form-input">

            <form action="simpan.php" method="post" enctype="multipart/form-data">
                <!--Form Input Data Penjualan-->
                <div class="judul">
                    <h3>Data Penjualan</h3>
                </div>
                <!--Form Input Minggu-->
                <div class="minggu">

                    <label for="ist_minggu">Minggu Ke :</label>
                    <select class="minggu-s" name="minggu" id="list_minggu">

                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>
                        <option value="5">V</option>

                    </select>
                </div>
                <br>
                <!--Form Input Bulan-->
                <div class="list-bulan">

                    <label for="list_bulan">Bulan :</label>
                    <select class="bulan-s" name="bulan" id="list_bulan">

                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>

                    </select>

                </div>
                <br>
                <!--Form Input Tahun-->
                <div class="thn">

                    <label for="tahun">Tahun :</label>
                    <input class="thn-i" type="year" name="tahun" id="tahun" autocomplete="off">

                </div>
                <br>
                <!--Form Input Jumlah Penjulan-->
                <div class="jml">

                    <label for="jumlah">Jumlah Penjualan :</label>
                    <input class="jml-i" type="text" name="jumlah" id="jumlah" autocomplete="off">

                </div>
                <br>
                <!--Button Untuk Post Ke Database-->
                <div class="tombol">

                    <button type="submit" name="submit" value="submit">Simpan</button>

                    <a class="tombol_kembali" href="show_data_penjualan.php">Kembali</a>

                </div>




            </form>

        </div>


    </div>
</body>

</html>