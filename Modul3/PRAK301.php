<!DOCTYPE html>
<html>
<head>
    <title> Soal 1 </title>
</head>
<body>

    <?php
    $jumlah_input = isset($_POST['jumlah_peserta']) ? $_POST['jumlah_peserta'] : '';
    ?>

    <form method="POST">
        <div>
            <label> Jumlah Peserta: </label>
            <input type="number" name="jumlah_peserta" value="<?php echo $jumlah_input; ?>" required>
        </div>

        <div style="margin-top: 10px;">
            <button type="submit" name="cetak"> Cetak </button>
        </div>
    </form>
    <br>

    <?php
    if (isset($_POST['cetak'])) {
        $jumlah_peserta = $_POST['jumlah_peserta'];
        $i = 1;

        while ($i <= $jumlah_peserta) {
            if ($i % 2 != 0) {
                $warna = "red";
            } else {
                $warna = "green";
            }

            echo "<h2 style='color: $warna;'> Peserta ke-$i </h2>";
            $i++;
        }
    }
    ?>
</body>
</html>