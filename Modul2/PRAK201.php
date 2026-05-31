<!DOCTYPE html>
<html>
    <head>
        <title>Pengurutan Nama</title>
    </head>
    <body>

        <form action="" method="post">
            Nama : 1 <input type="text" name="nama1"><br>
            Nama : 2 <input type="text" name="nama2"><br>   
            Nama : 3 <input type="text" name="nama3"><br>
            <button type="submit" name="submit">Urutkan</button>
        </form>
        <br>

        <?php
        if (isset($_POST['submit'])) {
            $nama1 = $_POST['nama1'];
            $nama2 = $_POST['nama2'];
            $nama3 = $_POST['nama3'];

            $urutan1 = "";
            $urutan2 = "";
            $urutan3 = "";

            if ($nama1 < $nama2 && $nama1 < $nama3) {
                $urutan1 = $nama1;
                if ($nama2 < $nama3) {
                    $urutan2 = $nama2;
                    $urutan3 = $nama3;
                } else {
                    $urutan2 = $nama3;
                    $urutan3 = $nama2;
                }
            } elseif ($nama2 < $nama1 && $nama2 < $nama3) {
                $urutan1 = $nama2;
                if ($nama1 < $nama3) {
                    $urutan2 = $nama1;
                    $urutan3 = $nama3;
                } else {
                    $urutan2 = $nama3;
                    $urutan3 = $nama1;
                }
            } else {
                $urutan1 = $nama3;
                if ($nama1 < $nama2) {
                    $urutan2 = $nama1;
                    $urutan3 = $nama2;
                } else {
                    $urutan2 = $nama2;
                    $urutan3 = $nama1;
                }
            }

            echo "<table border='1' cellpadding='5' cellspacing='0' style='width: 300px; margin-top: 10px;'>";
            echo "<tr><th style='text-align: left;'>Output</th></tr>";
            echo "<tr><td>";
            echo "$urutan1 <br>";
            echo "$urutan2 <br>";
            echo "$urutan3";
            echo "</td></tr>";
            echo "</table>";
        }
        ?>
</body>
</html>