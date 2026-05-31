<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK402 - Nilai Mahasiswa</title>
   <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 70%;
            font-family: "Times New Roman", Times, serif; 
        }
        th {
            border: 1px solid black;
            background-color: #cccccc; 
            padding: 8px;
            text-align: left;
            font-weight: bold;
        }
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<?php
$mahasiswa = [
    [
        "nama" => "Andi",
        "nim" => "2101001",
        "uts" => 87,
        "uas" => 65
    ],
    [
        "nama" => "Budi",
        "nim" => "2101002",
        "uts" => 76,
        "uas" => 79
    ],
    [
        "nama" => "Tono",
        "nim" => "2101003",
        "uts" => 50,
        "uas" => 41
    ],
    [
        "nama" => "Jessica",
        "nim" => "2101004",
        "uts" => 60,
        "uas" => 75
    ]
];
?>

<table>
    <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Nilai UTS</th>
        <th>Nilai UAS</th>
        <th>Nilai Akhir</th>
        <th>Huruf</th>
    </tr>

    <?php
    foreach ($mahasiswa as $mhs) {
        $nilai_akhir = (0.4 * $mhs["uts"]) + (0.6 * $mhs["uas"]);

        if ($nilai_akhir >= 80) {
            $huruf = "A";
        } elseif ($nilai_akhir >= 70 && $nilai_akhir <= 79) {
            $huruf = "B";
        } elseif ($nilai_akhir >= 60 && $nilai_akhir <= 69) {
            $huruf = "C";
        } elseif ($nilai_akhir >= 50 && $nilai_akhir <= 59) {
            $huruf = "D";
        } else {
            $huruf = "E";
        }

        echo "<tr>";
        echo "<td>" . $mhs["nama"] . "</td>";
        echo "<td>" . $mhs["nim"] . "</td>";
        echo "<td>" . $mhs["uts"] . "</td>";
        echo "<td>" . $mhs["uas"] . "</td>";
        echo "<td>" . $nilai_akhir . "</td>";
        echo "<td>" . $huruf . "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>