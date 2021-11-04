<?php

include "koneksi.php";

error_reporting(0);

//cek sudah login atau belum

session_start();

if (!isset($_SESSION["login"])) {
    echo "
        <script>
            document.location.href='login.php';
        </script>
    ";

    // header("Location: login.php");

    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page - 256 | Hasil Prediksi </title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Texturina:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style_index.css">
    <link rel="stylesheet" href="css/data.css">


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


<body>

    <div class="show">

        <h1>Hasil Peramalan</h1>

    </div>

    <!--Container Body-->
    <div class="container-show-data">


        <!--Div Awal tabe;-->
        <div class="tabel">

            <table border="2" cellspacing="0" cellpadding="10">

                <thead>

                    <tr>
                        <td align="center">No</td>
                        <td align="center">Time Series</td>
                        <td align="center">Penjualan</td>
                        <td align="center">X</td>
                        <td align="center"> Y</td>
                        <td align="center">XX</td>
                        <td align="center">XY</td>
                    </tr>

                </thead>






                <?php
                //Penjumlahan 
                $total_x = 0;
                $total_y = 0;
                $total_xx = 0;
                $total_xy = 0;
                $x = -1;

                //end penjumlahan


                //Start Query Ambil Data
                $query = " SELECT * FROM penjualan ORDER BY idjual ASC  ";

                $result = mysqli_query($koneksi, $query);



                while ($row = mysqli_fetch_array($result)) {

                    //operasi matematic utuk perhitungan data

                    $nomor++;
                    $x++;
                    $minggu = $row[1];
                    $bulan = $row[2];
                    $tahun = $row[3];
                    $jumlah = $row[4];
                    $xx = $x * $x;
                    $xy = $x * $jumlah;
                    $total_x = $total_x + $x;
                    $total_y = $total_y + $jumlah;
                    $total_xx = $total_xx + $xx;
                    $total_xy = $total_xy + $xy;

                ?>

                    <!--End Pembuka Kurung Kurawal Php-->



                    <tbody>

                        <tr>
                            <!--Awal Body Untuk data -->

                            <td align="center"> <?php echo "$nomor"; ?> </td>
                            <td align="center"> <?php echo "Minggu ke- $minggu Bulan $bulan $tahun"; ?> </td>
                            <td align="center"> <?php echo "$jumlah"; ?> </td>
                            <td align="center"> <?php echo "$x"; ?> </td>
                            <td align="center"> <?php echo "$jumlah"; ?> </td>
                            <td align="center"> <?php echo "$xx"; ?> </td>
                            <td align="center"> <?php echo "$xy"; ?> </td>
                        </tr>



                    <?php
                    //kurung penutup php dari query
                }

                    ?>


                    <tr>

                        <!--Awal Body Untuk Jumlah Data-->

                        <td colspan="3" align="center">Jumlah</td>
                        <td align="center"><?php echo "$total_x"; ?></td>
                        <td align="center"><?php echo "$total_y"; ?></td>
                        <td align="center"><?php echo "$total_xx"; ?></td>
                        <td align="center"><?php echo "$total_xy"; ?></td>

                    </tr>
                    <?php

                    //Operasi Matematic Untuk Menghitung Rata rata dari total x dan y
                    $ratarata_x = $total_x / $nomor;
                    $ratarata_y = $total_y / $nomor;

                    ?>

                    <tr>

                        <!--Awal Body Untuk Rata - rata Data-->

                        <td colspan="3" align="center">Rata - rata</td>
                        <td align="center"><?php echo "$ratarata_x"; ?></td>
                        <td align="center"><?php echo "$ratarata_y"; ?></td>
                        <td colspan="2">################</td>
                    </tr>


                    </tbody>




            </table>

            <!--Rumus Regresi Linear-->

            <?php

            $b1 = ($total_xy - (($total_x * $total_y) / $nomor)) / ($total_xx - (($total_x * $total_x) / $nomor));
            $bO  = ($total_y / $nomor) - $b1 * ($total_x / $nomor);

            ?>


        </div>
        <!--Div Akhir Dari Tabel-->

        <div class="rumus">
            <br>
            <tr>
                <td>Rumus Regresi Linear :</td> <br><br>
                <td colspan="7"><?php echo "y = $bO + $b1 X"; ?></td>
            </tr>
        </div>

        <br>


        <div class="hasil_prediksi">

            <?php
            //logic menghitung prediksi dari page peramalan.php
            if (isset($_POST["prediksi"])) {

                $list_pilihan = $_POST["list_pilihan"];

                $x = $x + $list_pilihan;
                $y = $bO + $b1 * $x;

                echo "Prediksi Penjualan untuk <span>$list_pilihan</span> minggu berikutnya adalah <span>$y</span>";
            } else {

                //logic untuk membatasi akses ke halaman hasil_prediksi.php
                echo "
                        <script>
                            alert('Anda tidak memiliki akses kehalaman ini! -  gagal Ambil data');
                            document.location.href='peramalan.php';
                        </script>
                    ";
            }

            ?>


        </div>




    </div>
    <!--Div Akhir Container-->
</body>

</html>