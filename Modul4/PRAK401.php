<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK401 - Cetak Matriks</title>
    <style>
        .matriks {
            border: 1px solid black;
            border-collapse: collapse;
            margin-top: 10px; 
        }
        .matriks td {
            border: 1px solid black;
            width: 40px;
            height: 40px;
            text-align: center;
            font-size: 20px;
        }

        .form-table {
            border-collapse: collapse;
        }
        .form-table td {
            padding: 2px 0; 
            font-size: 18px;
        }
        .form-table input {
            font-size: 16px;
            padding: 2px;
        }
    </style>
</head>
<body>

<?php
$panjang = "";
$lebar = "";
$nilai_input = "";
$pesan_error = "";
$arr_nilai = [];

if (isset($_POST['cetak'])) {
    $panjang = $_POST['panjang'];
    $lebar = $_POST['lebar'];
    $nilai_input = trim($_POST['nilai']);

    if (!empty($nilai_input)) {
        $arr_nilai = explode(" ", $nilai_input);
    }

    if (count($arr_nilai) != ($panjang * $lebar)) {
        $pesan_error = "Panjang nilai tidak sesuai dengan ukuran matriks";
    }
}
?>

<form action="" method="POST">
    <table class="form-table">
        <tr>
            <td style="width: 80px;">Panjang :</td>
            <td><input type="number" name="panjang" value="<?php echo $panjang; ?>" required></td>
        </tr>
        <tr>
            <td>Lebar :</td>
            <td><input type="number" name="lebar" value="<?php echo $lebar; ?>" required></td>
        </tr>
        <tr>
            <td>Nilai :</td>
            <td><input type="text" name="nilai" value="<?php echo $nilai_input; ?>" size="45" required></td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 5px;">
                <button type="submit" name="cetak">Cetak</button>
            </td>
        </tr>
    </table>
</form>

<?php
if (isset($_POST['cetak'])) {
    if (!empty($pesan_error)) {
        echo "<p style='color: black; font-size: 18px; margin-top: 15px;'>" . $pesan_error . "</p>";
    } else {
        echo "<table class='matriks'>";
        $index = 0;
        
        for ($i = 0; $i < $panjang; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $lebar; $j++) {
                echo "<td>" . $arr_nilai[$index] . "</td>";
                $index++;
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>

</body>
</html>