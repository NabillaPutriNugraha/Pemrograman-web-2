<!DOCTYPE html>
<html>
<head>
    <title> Soal 3 </title>
</head>
<body>

    <?php
    $bawah = isset($_POST['bawah']) ? $_POST['bawah'] : '';
    $atas = isset($_POST['atas']) ? $_POST['atas'] : '';
    ?>

    <form method ="POST">
        <div>
            <label>Batas Bawah : </label>
            <input type="number" name="bawah" value="<?php echo $bawah; ?>" required>
        </div>
        <div style="margin-top: 5px;">
            <label>Batas Atas : </label>
            <input type="number" name="atas" value="<?php echo $atas; ?>" required>
        </div>
        <div style="margin-top: 10px;">
            <button type="submit" name="cetak">Cetak</button>
        </div>
    </form>
    <br>

    <div style="font-size: 24px; font-family: Arial;">
    <?php
    if (isset($_POST['cetak'])) {
        $i = (int)$_POST['bawah'];
        $max = (int)$_POST['atas'];

        $img_star = "bintang.png"; 

        if ($i <= $max) {
            do {
                if (($i + 7) % 5 == 0) {
                    echo "<img src='$img_star' width='30' style='vertical-align: middle;'>";
                } else {
                    echo "$i ";
                }
            } while (++$i <= $max);
        } else {
            echo "Batas bawah harus lebih kecil dari batas atas.";
        }
    }
    ?>
    </div>
</body>
</html>
