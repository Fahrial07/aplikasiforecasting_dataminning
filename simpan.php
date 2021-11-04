<?php  

    include "koneksi.php";

//cek sudah login atau belum

//cek sudah login atau belum
session_start();
if (!isset($_SESSION["username"])) {

    echo "
        <script>
            document.location.href='login.php';
        </script>
    ";
    // header("Location: login.php");

    exit;
}
    //

    extract($_GET);
    extract($_POST);



    if (isset ($_POST['submit'])) {

        $minggu = htmlspecialchars($_POST['minggu']);
        $bulan =  htmlspecialchars( $_POST['bulan']);
        $tahun =  htmlspecialchars( $_POST['tahun']);
        $jumlah =  htmlspecialchars($_POST['jumlah']);

        $query = " INSERT INTO penjualan (minggu, bulan, tahun, jumlah) 
                    VALUES
                    ('$minggu', '$bulan', '$tahun', '$jumlah' )  ";
        $result = mysqli_query($koneksi, $query);

        

        if(!$result) {

            echo "

                <script>
                alert('Data Penjualan Gagal di Simpan!');
                document.location.href='input.php';
                </script>

            ";

        } else {
        
            echo "
                <script>
                    alert('Data Penjualan Berhasil di Simpan');
                    document.location.href='show_data_penjualan.php';
                </script>
            
            ";

        }



    } 



?>