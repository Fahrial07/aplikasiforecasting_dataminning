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

    // header("Location: login.php");

    exit;
}

    //

$id = ["id"];

if (isset($_POST["submitedit"])) {

    $id = $_POST["idjual"];
    $minggu = htmlspecialchars( $_POST["minggu"]);
    $bulan = htmlspecialchars( $_POST["bulan"]);
    $tahun =  htmlspecialchars( $_POST["tahun"]);
    $jumlah =  htmlspecialchars( $_POST["jumlah"]);

    $queryup = " UPDATE penjualan SET

            minggu = '$minggu',
            bulan = '$bulan',
            tahun = '$tahun',
            jumlah = '$jumlah'

            WHERE idjual = $id

        ";

    $resultup = mysqli_query($koneksi, $queryup);


        echo "
                <script>
                    alert('Data Berhasil di Update');
                    document.location.href='show_data_penjualan.php';
                </script>
        ";


    // if (!isset($_POST["submitedit"])) {
    //     echo "
    //     <>
    //             alert(Data Berhasil diedit!);
    //             document.location.href='';
    //     </>

    //     ";
    // } else {
    //     echo "
    //         <>
    //             alert(Data Gagal diedit!);
    //             document.location.href='show_data_penjulan.php';
    //         </>
    //     ";
    // }


} else {

    echo "

    <script>
        alert('Data gagal di update');
        document.location.href='edit.php';
    </script>
    
    ";

}





?>