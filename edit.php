<?php
include_once("koneksi.php");

if(isset($_POST['update'])) {
    $id_buku = $_POST['id_buku'];
    $judul_buku = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];

    $query = "UPDATE tb_buku SET judul_buku='$judul_buku', pengarang='$pengarang', tahun_terbit='$tahun_terbit', kategori='$kategori' WHERE id_buku=$id_buku";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}

$id = $_GET['id'];
$query = "SELECT * FROM tb_buku WHERE id_buku=$id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" 
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="alert alert-success text-center" role="alert">
        <h2>EDIT KOLEKSI BUKU PERPUSTAKAAN</h2>
    </div>

    <h1 class="ml-5">Edit Koleksi Buku</h1>
    <form method="post" action="edit.php" class="ml-5">
        <input type="hidden" name="id_buku" value="<?php echo $data['id_buku']; ?>">
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">Judul Buku</label>
            <div class="col-sm-3">
                <input type="text" name="judul" class="form-control" value="<?php echo $data['judul_buku']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">Pengarang</label>
            <div class="col-sm-3">
                <input type="text" name="pengarang" class="form-control" value="<?php echo $data['pengarang']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">Tahun Terbit</label>
            <div class="col-sm-3">
                <input type="number" name="tahun_terbit" class="form-control" value="<?php echo $data['tahun_terbit']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">Kategori</label>
            <div class="col-sm-3">
                <input type="text" name="kategori" class="form-control" value="<?php echo $data['kategori']; ?>">
            </div>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>