<?php  

    //include koneksi ke database

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


    //

    $id = $_GET["id"];

    //$id = $_GET["idjual"];


    $query = "DELETE FROM penjualan WHERE idjual = $id";

    $result = mysqli_query($koneksi, $query);


    if (!$result) {

        echo "
                <script>
                alert('Data Penjualan Gagal Dihapus');
                document.location.href='show_data_penjualan.php';
                </script>
        ";

    } else {

        echo "
        <script>
            document.location.href = 'show_data_penjualan.php';
        </script>
        ";

    }






?>