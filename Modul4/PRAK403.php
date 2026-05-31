<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK403 - KRS Mahasiswa</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 85%;
            font-family: "Times New Roman", Times, serif;
            font-size: 18px;
        }
        th {
            border: 1px solid black;
            background-color: #cccccc; 
            padding: 6px;
            text-align: left;
            font-weight: bold;
        }
        td {
            border: 1px solid black;
            padding: 6px;
            text-align: left;
            vertical-align: top; 
        }
    </style>
</head>
<body>

<?php
$mahasiswa = [
    [
        "no" => 1,
        "nama" => "Ridho",
        "matkul" => [
            ["nama_matkul" => "Pemrograman I", "sks" => 2],
            ["nama_matkul" => "Praktikum Pemrograman I", "sks" => 1],
            ["nama_matkul" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
            ["nama_matkul" => "Arsitektur Komputer", "sks" => 3]
        ]
    ],
    [
        "no" => 2,
        "nama" => "Ratna",
        "matkul" => [
            ["nama_matkul" => "Basis Data I", "sks" => 2],
            ["nama_matkul" => "Praktikum Basis Data I", "sks" => 1],
            ["nama_matkul" => "Kalkulus", "sks" => 3]
        ]
    ],
    [
        "no" => 3,
        "nama" => "Tono",
        "matkul" => [
            ["nama_matkul" => "Rekayasa Perangkat Lunak", "sks" => 3],
            ["nama_matkul" => "Analis dan Perancangan Sistem", "sks" => 3],
            ["nama_matkul" => "Komputasi Awan", "sks" => 3],
            ["nama_matkul" => "Kecerdasan Bisnis", "sks" => 3]
        ]
    ]
];
?>

<table>
    <tr>
        <th style="width: 40px;">No</th>
        <th style="width: 100px;">Nama</th>
        <th>Mata Kuliah diambil</th>
        <th style="width: 60px;">SKS</th>
        <th style="width: 90px;">Total SKS</th>
        <th style="width: 140px;">Keterangan</th>
    </tr>

    <?php
    foreach ($mahasiswa as $mhs) {
        
        $total_sks = 0;
        foreach ($mhs["matkul"] as $mk) {
            $total_sks += $mk["sks"];
        }

        if ($total_sks < 7) {
            $keterangan = "Revisi KRS";
            $bg_color = "#ff0000"; /
        } else {
            $keterangan = "Tidak Revisi";
            $bg_color = "#00b050"; 
        }

        for ($i = 0; $i < count($mhs["matkul"]); $i++) {
            echo "<tr>";
            
            if ($i == 0) {
                echo "<td>" . $mhs["no"] . "</td>";
                echo "<td>" . $mhs["nama"] . "</td>";
                echo "<td>" . $mhs["matkul"][$i]["nama_matkul"] . "</td>";
                echo "<td>" . $mhs["matkul"][$i]["sks"] . "</td>";
                echo "<td>" . $total_sks . "</td>";
                echo "<td style='background-color: " . $bg_color . ";'>" . $keterangan . "</td>";
            } 
            else {
                echo "<td></td>";
                echo "<td></td>";
                echo "<td>" . $mhs["matkul"][$i]["nama_matkul"] . "</td>";
                echo "<td>" . $mhs["matkul"][$i]["sks"] . "</td>";
                echo "<td></td>";
                echo "<td></td>";
            }
            
            echo "</tr>";
        }
    }
    ?>
</table>

</body>
</html>