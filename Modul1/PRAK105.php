<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tabel Smartphone</title>

    <style>
        table {
            border: 1px solid black;
        }
        th, td {
            border: 1px solid black;
            padding: 5px 5px;
            font-family: "Times New Roman", Times, serif;
            font-size: 16px;
        }
        th {
            font-weight: bold;
            text-align: center;
            background-color: red;
            font-size: 25px;
            padding-top: 20px;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php
    $daftar_hp = array(
        "hp_1" => "Samsung Galaxy S22",
        "hp_2" => "Samsung Galaxy S22+",
        "hp_3" => "Samsung Galaxy A03",
        "hp_4" => "Samsung Galaxy Xcover 5"
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