<?php
include_once("koneksi.php");

if(isset($_GET['id'])) {
    $id_buku = $_GET['id'];
    
    $query = "DELETE FROM tb_buku WHERE id_buku=$id_buku";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!');</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location.href='index.php';</script>";
}
?>
