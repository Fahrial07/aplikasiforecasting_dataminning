<?php

//include koneksi
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

    $id = $_GET["id"];

$queryambil = "SELECT * FROM penjualan WHERE idjual =$id ";

$resultambil = mysqli_query($koneksi, $queryambil);

    while ($rowambil = mysqli_fetch_array($resultambil)) {

    $id = htmlspecialchars($rowambil["idjual"]);
    $minggu = htmlspecialchars($rowambil["minggu"]);
    $bulan = htmlspecialchars($rowambil["bulan"]);
    $tahun = htmlspecialchars($rowambil["tahun"]);
    $jumlahpenjualan = htmlspecialchars($rowambil["jumlah"]);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/style_edit.css">

        <title>Page 256 | Edit Data </title>
    </head>

    <body>
        <div class="container-input">


            <div class="form-input">

                <form action="fungsiedit.php" method="post" enctype="multipart/form-data">
                    <!--Form Input Data Penjualan-->

                    <div class="judul">
                        <h3>Edit Data Penjualan</h3>
                    </div>

                    <input type="hidden" name="idjual" value=" <?php echo $rowambil["idjual"]; ?> ">

                    <!--Form Input Minggu-->


                    <div class="minggu">

                        <label for="ist_minggu">Minggu Ke :</label>
                        <select class="minggu-s" name="minggu" id="list_minggu">
                        <?php  
                            //logic selected data minggu untuk edit from db
                            if ($rowambil["minggu"] == "1")  echo "<option value='1' selected>I</option>";
                                else echo "<option value='1'>I</option>";
                            if ($rowambil["minggu"] == "2")  echo "<option value='2' selected>II</option>";
                                else echo "<option value='2'>II</option>";
                            if ($rowambil["minggu"] == "3")  echo "<option value='3' selected>III</option>";
                                else echo "<option value='3'>III</option>";
                            if ($rowambil["minggu"] == "4")  echo "<option value='4' selected>IV</option>";
                                else echo "<option value='4'>IV</option>";
                            if ($rowambil["minggu"] == "5")  echo "<option value='5' selected>V</option>";
                                else echo "<option value='5'V</option>";
                        ?>
                        </select>
                    </div>
                    <br>
                    <!--Form Input Bulan-->
                    <div class="list-bulan">

                        <label for="list_bulan">Bulan :</label>
                        <select class="bulan-s" name="bulan" id="list_bulan">

                    

                    <?php  
                    //logic mengambil data selected option untuk edit dari db

                        if($rowambil["bulan"] == "01") echo " <option value='01' selected > Januari</option> ";
                            else echo "<option value='01' > Januari</option>";
                        if($rowambil["bulan"] == "02") echo" <option value='02' selected>Februari</option>";
                            else echo "<option value='02' > Februari</option>";
                        if ($rowambil["bulan"] == "03") echo " <option value='03' selected>Maret</option>";
                            else echo "<option value='03' >Maret</option>";
                        if ($rowambil["bulan"] == "04") echo " <option value='04' selected>April</option>";
                            else echo "<option value='04' >April</option>";
                        if ($rowambil["bulan"] == "05") echo " <option value='05' selected>Mei</option>";
                            else echo "<option value='06' >Mei</option>";
                        if ($rowambil["bulan"] == "06") echo " <option value='06' selected>Juni</option>";
                            else echo "<option value='06' >Juni</option>";
                        if ($rowambil["bulan"] == "07") echo " <option value='07' selected>Juli</option>";
                            else echo "<option value='07' >Juli</option>";
                        if ($rowambil["bulan"] == "08") echo " <option value='08' selected>Agustud</option>";
                            else echo "<option value='08' >Agustus</option>";
                        if ($rowambil["bulan"] == "09") echo " <option value='09' selected>September</option>";
                            else echo "<option value='09' >September</option>";
                        if ($rowambil["bulan"] == "10") echo " <option value='10' selected>Oktober</option>";
                            else echo "<option value='10' >Oktober</option>";
                        if ($rowambil["bulan"] == "11") echo " <option value='11' selected>November</option>";
                            else echo "<option value='11' >November</option>";
                        if ($rowambil["bulan"] == "12") echo " <option value='12' selected>Desember</option>";
                            else echo "<option value='12' >Desember</option>";
                    ?>
                            
                        </select>

                    </div>
                    <br>
                    <!--Form Input Tahun-->
                    <div class="thn">

                        <label for="tahun">Tahun :</label>
                        <input class="thn-in" type="year" name="tahun" id="tahun" value="<?php echo $rowambil["tahun"]; ?>">

                    </div>
                    <br>
                    <!--Form Input Jumlah Penjulan-->
                    <div class="jml">

                        <label for="jumlah">Jumlah Penjualan :</label>
                        <input class="jml-i" type="text" name="jumlah" id="jumlah" value="<?php echo $rowambil["jumlah"]; ?>">

                    </div>

                <?php } ?>
                <br>
                <!--Button Untuk Post Ke Database-->
                <div class="tombol">

                    <button type="submit" name="submitedit" value="submitedit">Simpan</button>

                    <a href="show_data_penjualan.php">Kembali</a>

                </div>




                </form>

            </div>


        </div>
    </body>

    </html>