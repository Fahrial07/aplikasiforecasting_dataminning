<?php

include "koneksi.php";

session_start();

//cek ada sesi login atau belum

if (isset($_SESSION["login"])) {

    header("Location:index.php");

    exit;
}

if (isset($_POST['login'])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    //query
    $queryuser = "SELECT * FROM user WHERE username = '$username' AND password = '$password'  ";
    $resultuser =  mysqli_query($koneksi, $queryuser);

    $cek = mysqli_num_rows($resultuser);

    if ($cek > 0) {

        //cek password

        $rowuser = mysqli_fetch_assoc($resultuser);

        //fungsi cek session login
        $_SESSION["login"] = true;


        header("Location: index.php");

        exit;
    } else {

        $error = true;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=" width=device-width, initial-scale=1.0">
    <title>Page 256 | Login User</title>
    <link rel=" preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Texturina:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Texturina:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_login.css">
</head>

<div class="headt">

    <h1>APLIKASI FORECASTING - PERAMALAN PENJUALAN </h1>
    <h3>DATA MINING - 256</h3>

</div>


<body>
    <div class="pn">

        <?php
        //logic gagal login
        if (isset($error)) { ?>
            <p>Username atau Password Salah</p>
        <?php } ?>


    </div>


    <div class="container">

        <div class="page-login">

            <div class="judul-login">

                <h1>Silahkan Login</h1>

            </div>

            <div class="form">

                <form action="" method="post">

                    <label for="username">Username :</label> <br>
                    <input type="taxt" name="username" id="username" placeholder="Input Username" autocomplete="off">
                    <br>
                    <label for="password">Password :</label> <br>
                    <input type="password" name="password" id="password" placeholder="Input Password">
                    <br>
                    <button type="submit" name="login">Login</button>
                </form>
            </div>


        </div>
    </div>
</body>

<footer>
   <p> Username : <span>user</span> & Password : <span>12345</span>  </P>  <!-- - untuk source code bisa japri </P>-->
    &copy2020 - 201951256
</footer>

</html>