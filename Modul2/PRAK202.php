<!DOCTYPE html>
<html>
<head>
    <title>Soal 2</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>

<?php
$namaErr = $nimErr = $jkErr = "";
$nama = $nim = $jk = "";

if (isset($_POST['submit'])) {

    if (empty($_POST['nama'])) {
        $namaErr = "Nama tidak boleh kosong";
    } else {
        $nama = htmlspecialchars($_POST['nama']);
    }

    if (empty($_POST['nim'])) {
        $nimErr = "NIM tidak boleh kosong";
    } else {
        $nim = htmlspecialchars($_POST['nim']);
    }

    if (empty($_POST['jk'])) {
        $jkErr = "Jenis kelamin tidak boleh kosong";
    } else {
        $jk = $_POST['jk'];
    }
}
?>

<form method="post">

    Nama:
    <input type="text" name="nama" value="<?php echo $nama; ?>">
    <span class="error">* <?php echo $namaErr; ?></span>
    <br><br>

    NIM:
    <input type="text" name="nim" value="<?php echo $nim; ?>">
    <span class="error">* <?php echo $nimErr; ?></span>
    <br><br>

    Jenis Kelamin:
    <span class="error">* <?php echo $jkErr; ?></span><br>

    <input type="radio" name="jk" value="Laki-Laki"
    <?php if ($jk == "Laki-Laki") echo "checked"; ?>>
    Laki-Laki <br>

    <input type="radio" name="jk" value="Perempuan"
    <?php if ($jk == "Perempuan") echo "checked"; ?>>
    Perempuan

    <br><br>

    <button type="submit" name="submit">Submit</button>
</form>

<?php
if (isset($_POST['submit']) && empty($namaErr) && empty($nimErr) && empty($jkErr)) {
    echo "<h2>Output:</h2>";
    echo "$nama <br>";
    echo "$nim <br>";
    echo "$jk";
}
?>

</body>
</html>