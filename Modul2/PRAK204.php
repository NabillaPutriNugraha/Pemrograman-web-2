<!DOCTYPE html>
<html>
<head>
    <title> Soal 4 </title>
</head>
<body>
    <form action="" method="post">
        Nilai : <input type="number" name="nilai" value="<?= isset($_POST['nilai']) ? $_POST['nilai'] : '' ?>" required><br>
        <button type="submit" name="konversi"> Konversi </button>
    </form>
    <br>

<?php
if (isset($_POST['konversi'])) {
    $nilai = $_POST['nilai'];
    $hasil = "";

    if ($nilai == 0) {
        $hasil = "Nol";
    } elseif ($nilai > 0 && $nilai < 10) {
        $hasil = "Satuan";
    } elseif ($nilai >= 11 && $nilai < 20) {
        $hasil = "Belasan";
    } elseif ($nilai >= 10 && $nilai < 100) {
        $hasil = "Puluhan";
    } elseif ($nilai >= 100 && $nilai < 1000) {
        $hasil = "Ratusan";
    } elseif ($nilai >= 1000) {
        $hasil = "Anda Menginput Melebihi Limit Bilangan";
    } else {
        $hasil = "Input tidak valid";
    }

    echo "<h2> Hasil Konversi: $hasil </h2>";
}
?>
</body>
</html>