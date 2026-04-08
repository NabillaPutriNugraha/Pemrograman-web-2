<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tabel Smartphome</title>

    <style>
        table {
            border: 1px solid black;
        }
        th, td {
            border: 1px solid black;
            padding: 3px 5px;
            font-family: "Times New Roman", Times, serif;
            font-size: 16px;
        }
        th {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
    $daftar_hp = array(
        "Samsung Galaxt S22",
        "Samsung Galaxy S22+",
        "Samsung Galaxy A03",
        "Samsung Galaxy Xcover 5"
    );
    ?>

    <table>
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>

        <?php
        foreach ($daftar_hp as $hp) {
            echo "<tr><td>$hp</td></tr>";
        }
        ?>
    </table>
</body>
</html>