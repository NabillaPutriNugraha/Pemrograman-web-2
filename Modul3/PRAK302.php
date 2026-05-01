<!DOCTYPE html>
<html>
<head>
    <title>Soal 2</title>
</head>
<body>

    <?php
    $tinggi = isset($_POST['tinggi']) ? $_POST['tinggi'] : '';
    $link = isset($_POST['link']) ? $_POST['link'] : 'https://cdn0.iconfinder.com/data/icons/web-and-mobile-icons-volume-2/128/52-512.png';
    ?>

    <form method="POST">
        <div>
            <label>Tinggi : </label>
            <input type="number" name="tinggi" value="<?php echo $tinggi; ?>" required>
        </div>
        <div>
            <label>Alamat Gambar : </label>
            <input type="text" name="link" value="<?php echo $link; ?>" style="width: 300px;" required>
        </div>
        <div style="margin-top: 10px;">
            <button type="submit" name="cetak">Cetak</button>
        </div>
    </form>

    <br>

    <?php
    if (isset($_POST['cetak'])) {
        $t = (int)$_POST['tinggi'];
        $url = $_POST['link'];
        
        $i = 0;
        while ($i < $t) {
            
            $s = 0;
            while ($s < $i) {
                echo "<span style='display:inline-block; width:54px;'></span>";
                $s++;
            }

            $j = 0;
            while ($j < ($t - $i)) {
                echo "<img src='$url' width='50' style='margin: 2px;'>";
                $j++;
            }

            echo "<br>"; 
            $i++;
        }
    }
    ?>

</body>
</html>