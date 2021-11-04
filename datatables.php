<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>



</head>

<body>



    <table id="data" class="display">
        <thead>
            <tr>
                <th align="center">No</th>
                <th align="center">Time Series</th>
                <th align="center">Penjualan</th>

            </tr>


        </thead>
        <tbody>
            <?php
            $nomor = 1;
            $query = "SELECT*FROM penjualan ORDER BY idjual";
            $result = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_array($result)) {

            ?>
                <tr>
                    <td align="center"><?php echo $nomor; ?></td>
                    <td align="center"><?php echo 'Minggu Ke-' . $row['minggu']; ?>
                        <?php echo 'Bulan' . $row['bulan'];  ?>
                        <?php echo $row['tahun'];  ?></td>
                    <td align="center"><?php echo $row['jumlah']; ?></td>
                </tr>
        </tbody>
    <?php $nomor++;
            } ?>
    </table>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#data').DataTable({
            });
        });
    </script>

</body>

</html>