<!DOCTYPE html>
<html>
<head>
    <title>Tugas Manipulasi String</title>
</head>
<body>

    <form method="POST">
        <input type="text" name="kata" value="<?php echo isset($_POST['kata']) ? $_POST['kata'] : ''; ?>" required>
        <button type="submit" name="submit">submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $input = $_POST['kata'];
        $panjang = strlen($input); 

        echo "<h3>Input:</h3>";
        echo "<p>$input</p>";

        echo "<h3>Output:</h3>";
        echo "<p>";
        
        $i = 0;
        while ($i < $panjang) {
            $karakter = $input[$i]; 
            
            $j = 0;
            while ($j < $panjang) {
                if ($j == 0) {
                    echo strtoupper($karakter);
                } else {
                    echo strtolower($karakter);
                }
                $j++;
            }
            $i++;
        }
        
        echo "</p>";
    }
    ?>

</body>
</html>