<!DOCTYPE html>
<html>
<head>
    <title> Soal 3 </title>
</head>
<body>
    <form method="post">
        Nilai : <input type="number" step="any" name="nilai" value="<?= isset($_POST['nilai']) ? $_POST['nilai'] : '' ?>"><br>
        Dari : <br>
        <input type="radio" name="dari" value="Celcius"
        <?php if (isset($_POST['dari']) && $_POST['dari'] == 'Celcius') echo 'checked'; ?>> Celcius <br>

        <input type="radio" name="dari" value="Fahrenheit"
        <?php if (isset($_POST['dari']) && $_POST['dari'] == 'Fahrenheit') echo 'checked'; ?>> Fahrenheit <br>

        <input type="radio" name="dari" value="Rheamur"
        <?php if (isset($_POST['dari']) && $_POST['dari'] == 'Rheamur') echo 'checked'; ?>> Rheamur <br>

        <input type="radio" name="dari" value="Kelvin"
        <?php if (isset($_POST['dari']) && $_POST['dari'] == 'Kelvin') echo 'checked'; ?>> Kelvin <br>

        Ke : <br>
        <input type="radio" name="ke" value="Celcius"
        <?php if (isset($_POST['ke']) && $_POST['ke'] == 'Celcius') echo 'checked'; ?>> Celcius<br>

        <input type="radio" name="ke" value="Fahrenheit"
        <?php if (isset($_POST['ke']) && $_POST['ke'] == 'Fahrenheit') echo 'checked'; ?>> Fahrenheit<br>

        <input type="radio" name="ke" value="Rheamur"
        <?php if (isset($_POST['ke']) && $_POST['ke'] == 'Rheamur') echo 'checked'; ?>> Rheamur<br>

        <input type="radio" name="ke" value="Kelvin"
        <?php if (isset($_POST['ke']) && $_POST['ke'] == 'Kelvin') echo 'checked'; ?>> Kelvin<br>

        <button type="submit" name="konversi"> Konversi </button>
</form>

<?php
if (isset($_POST['konversi'])) {
    $nilai = $_POST['nilai'];
    $dari = $_POST['dari'];
    $ke = $_POST['ke'];
    $hasil = 0;
    $satuan = '';

    $celcius = 0;
    if ($dari == 'Celcius') {
        $celcius = $nilai;
    } elseif ($dari == 'Fahrenheit') {
        $celcius = ($nilai - 32) * 5 / 9;
    } elseif ($dari == 'Rheamur') {
        $celcius = $nilai * 5 / 4;
    } elseif ($dari == 'Kelvin') {
        $celcius = $nilai - 273.15;
    }

    if ($ke == 'Celcius') {
        $hasil = $celcius;
        $satuan = '°C';
    } elseif ($ke == 'Fahrenheit') {
        $hasil = ($celcius * 9 / 5) + 32;
        $satuan = '°F';
    } elseif ($ke == 'Rheamur') {
        $hasil = $celcius * 4 / 5;
        $satuan = '°R';
    } elseif ($ke == 'Kelvin') {
        $hasil = $celcius + 273.15;
        $satuan = 'K';
    }

    echo "<h2> Hasil Konversi: $hasil $satuan </h2>";
}
?>
</body>
</html>