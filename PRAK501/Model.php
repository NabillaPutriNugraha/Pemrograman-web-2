<?php
require 'Koneksi.php';

function getSemuaBuku() {
    global $koneksi;
    $query = "SELECT * FROM buku";
    $result = mysqli_query($koneksi, $query);
    
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function getBukuById($id) {
    global $koneksi;
    $query = "SELECT * FROM buku WHERE id_buku = $id";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

function tambahBuku($judul, $penulis, $penerbit, $tahun) {
    global $koneksi;

    $judul = mysqli_real_escape_string($koneksi, $judul);
    $penulis = mysqli_real_escape_string($koneksi, $penulis);
    $penerbit = mysqli_real_escape_string($koneksi, $penerbit);
    
    $query = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) 
              VALUES ('$judul', '$penulis', '$penerbit', '$tahun')";
              
    return mysqli_query($koneksi, $query);
}

function ubahBuku($id, $judul, $penulis, $penerbit, $tahun) {
    global $koneksi;
    $judul = mysqli_real_escape_string($koneksi, $judul);
    $penulis = mysqli_real_escape_string($koneksi, $penulis);
    $penerbit = mysqli_real_escape_string($koneksi, $penerbit);
    
    $query = "UPDATE buku SET 
                judul_buku = '$judul', 
                penulis = '$penulis', 
                penerbit = '$penerbit', 
                tahun_terbit = '$tahun' 
              WHERE id_buku = $id";
              
    return mysqli_query($koneksi, $query);
}

function hapusBuku($id) {
    global $koneksi;
    $query = "DELETE FROM buku WHERE id_buku = $id";
    return mysqli_query($koneksi, $query);
}

function getSemuaMember() {
    global $koneksi;
    $query = "SELECT * FROM member";
    $result = mysqli_query($koneksi, $query);
    
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function getMemberById($id) {
    global $koneksi;
    $query = "SELECT * FROM member WHERE id_member = $id";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

function tambahMember($nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar) {
    global $koneksi;
    $nama = mysqli_real_escape_string($koneksi, $nama);
    $nomor = mysqli_real_escape_string($koneksi, $nomor);
    $alamat = mysqli_real_escape_string($koneksi, $alamat);
    
    $query = "INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) 
              VALUES ('$nama', '$nomor', '$alamat', '$tgl_daftar', '$tgl_bayar')";
              
    return mysqli_query($koneksi, $query);
}

function ubahMember($id, $nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar) {
    global $koneksi;
    $nama = mysqli_real_escape_string($koneksi, $nama);
    $nomor = mysqli_real_escape_string($koneksi, $nomor);
    $alamat = mysqli_real_escape_string($koneksi, $alamat);
    
    $query = "UPDATE member SET 
                nama_member = '$nama', 
                nomor_member = '$nomor', 
                alamat = '$alamat', 
                tgl_mendaftar = '$tgl_daftar', 
                tgl_terakhir_bayar = '$tgl_bayar' 
              WHERE id_member = $id";
              
    return mysqli_query($koneksi, $query);
}

function hapusMember($id) {
    global $koneksi;
    $query = "DELETE FROM member WHERE id_member = $id";
    return mysqli_query($koneksi, $query);
}

function getSemuaPeminjaman() {
    global $koneksi;
    $query = "SELECT peminjaman.*, member.nama_member, buku.judul_buku 
              FROM peminjaman
              INNER JOIN member ON peminjaman.id_member = member.id_member
              INNER JOIN buku ON peminjaman.id_buku = buku.id_buku";
    $result = mysqli_query($koneksi, $query);
    
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function getPeminjamanById($id) {
    global $koneksi;
    $query = "SELECT * FROM peminjaman WHERE id_peminjaman = $id";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

function tambahPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    global $koneksi;
    $query = "INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) 
              VALUES ($id_member, $id_buku, '$tgl_pinjam', '$tgl_kembali')";
              
    return mysqli_query($koneksi, $query);
}

function ubahPeminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    global $koneksi;
    $query = "UPDATE peminjaman SET 
                id_member = $id_member, 
                id_buku = $id_buku, 
                tgl_pinjam = '$tgl_pinjam', 
                tgl_kembali = '$tgl_kembali' 
              WHERE id_peminjaman = $id";
              
    return mysqli_query($koneksi, $query);
}

function hapusPeminjaman($id) {
    global $koneksi;
    $query = "DELETE FROM peminjaman WHERE id_peminjaman = $id";
    return mysqli_query($koneksi, $query);
}
?>