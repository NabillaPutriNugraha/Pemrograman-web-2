<DOCTYPE html>
<html>
<head>
    <title> Soal 4 </title>
</head>
<body>

    <?php
    if (isset($_POST['submit'])) {
        $jumlah = (int)$_POST['angka_input'];
    } elseif (isset($_POST['tambah'])) {
        $jumlah = (int)$_POST['jumlah_sekarang'] + 1;
    } elseif (isset($_POST['kurang'])) {
        $jumlah = (int)$_POST['jumlah_sekarang'] - 1;
        if ($jumlah < 0) $jumlah = 0;
    } else {
        $jumlah = null; 
    }
    ?>

    <form method="POST">
        <label>Jumlah bintang </label>
        <input type="number" name="angka_input" value="<?php echo $jumlah; ?>">
        <br><br>
        <button type="submit" name="submit" >Submit</button>
        <input type="hidden" name="jumlah_sekarang" value="<?php echo $jumlah; ?>">
        <br><br>

        <?php if ($jumlah !== null): ?>
            <p>Jumlah bintang: <?php echo $jumlah; ?></p>

            <div style="margin-bottom: 10px;">
                <?php
                $i = 1;
                while ($i <= $jumlah) {
                    echo "<img src='bintang.png' width='80' style='margin: 5px;'>";
                    $i++;
                }
                ?>
            </div>

            <button type="submit" name="tambah">Tambah</button>
            <button type="submit" name="kurang">Kurang</button> 
        <?php endif; ?>
    </form>
</body>
</html>