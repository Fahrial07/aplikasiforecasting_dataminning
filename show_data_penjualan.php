<?php

error_reporting(0);
include "koneksi.php";

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
    <title>Page 256 | View Data Penjualan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Texturina:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style_index.css">
    <link rel="stylesheet" href="css/data.css">


</head>



<div class="judul">

    <h1>APLIKASI FORECASTING - PERAMALAN PENJUALAN - 256 </h1>

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




<div class="show">
    <h1>Data Penjualan</h1>
</div>

<body>
    <div class="container-show-data">

        <div class="tombol-tambah">
            <a href="input.php"> + Tambah Data</a>
        </div>
        <br>
        <!--Div Awal tabe;-->
        <div class="tabel">

            <table border="" cellspacing="0" cellpadding="10">

                <thead>

                    <tr>
                        <td align="center">No</td>
                        <td align="center">Time Series</td>
                        <td align="center">Penjualan</td>
                        <td align="center">X</td>
                        <td align="center"> Y</td>
                        <td align="center">XX</td>
                        <td align="center">XY</td>
                        <td align="center">Aksi</td>
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
                            <td align="center">

                                <a class="edit" href="edit.php?id=<?php echo $row['idjual']; ?>">Edit</a>
                                |
                                <a class="hapus" href="hapus.php?id=<?php echo $row['idjual']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data penjualan nomor : <?php echo $nomor; ?> Minggu : <?php echo $minggu; ?> Bulan : <?php echo $bulan; ?> ? ');
                                ">Hapus</a>
                            </td>

                        </tr>






                    <?php
                    // end query
                }
                    ?>

                    <tr>

                        <!--Awal Body Untuk Jumlah Data-->

                        <td colspan="3" align="center">Jumlah</td>
                        <td align="center"><?php echo "$total_x"; ?></td>
                        <td align="center"><?php echo "$total_y"; ?></td>
                        <td align="center"><?php echo "$total_xx"; ?></td>
                        <td align="center"><?php echo "$total_xy"; ?></td>
                        <td align="center">########</td>

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
                        <td colspan="3">###################</td>
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
                <td class="tdd">Rumus Regresi Linear :</td> <br><br>
                <td class="tdd" colspan="7"><?php echo "y = $bO + $b1 X"; ?></td>
            </tr>
        </div>

        <br>

    </div>

</body>

</html>