<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['admin_id'])){
    header("Location: login_admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Kelola Galeri</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    display: flex;
}

/* SIDEBAR */
.sidebar {
    width: 220px;
    background: #111;
    color: white;
    height: 100vh;
    padding: 20px;
    position: fixed;
    left: 0;
    top: 0;
}

.sidebar h2 {
    color: white;
}

.sidebar a {
    display: block;
    color: white;
    padding: 10px;
    text-decoration: none;
}

.sidebar a:hover {
    background: red;
    border-radius: 8px;
}

/* CONTENT */
.content {
    margin-left: 240px;
    padding: 20px;
    width: 100%;
}

h2 {
    text-align: center;
}

/* FORM */
.form-box {
    background: white;
    padding: 20px;
    border-radius: 10px;
    width: 300px;
    margin: auto;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.form-box input, .form-box button {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
}

/* GALERI */
.gallery {
    margin-top: 40px;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.card {
    background: white;
    padding: 10px;
    border-radius: 10px;
    width: 180px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 10px;
}

/* BUTTON HAPUS */
.btn-hapus {
    display: inline-block;
    margin-top: 10px;
    background: red;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 12px;
}

.btn-hapus:hover {
    background: darkred;
}

/* BACK BUTTON */
.back-btn {
    text-align: center;
    margin-top: 20px;
}

.back-btn a {
    background: #333;
    color: white;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 5px;
}
</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Admin</h2>

    <a href="admin.php">Dashboard</a>
    <a href="paket.php">Paket Foto</a>
    <a href="tambah_galeri.php">Galeri</a>
    <a href="booking_admin.php">Booking</a>
    <a href="review_admin.php">Review</a>
    <a href="logout.php">Logout</a>
</div>

<!-- CONTENT -->
<div class="content">

<h2>Kelola Galeri</h2>

<div class="form-box">
<form action="proses_galeri.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="judul" placeholder="Judul Foto" required>
    <input type="file" name="foto" required>
    <button name="upload">Upload</button>
</form>
</div>

<!-- TAMPIL DATA -->
<div class="gallery">

<?php
$data = mysqli_query($conn,"SELECT * FROM gallery ORDER BY id DESC");

if(mysqli_num_rows($data) > 0){
    while($d = mysqli_fetch_array($data)){
?>

<div class="card">
    <img src="upload/<?php echo $d['foto']; ?>">
    <p><?php echo $d['judul']; ?></p>

    <a href="hapus_galeri.php?id=<?php echo $d['id']; ?>" 
       class="btn-hapus"
       onclick="return confirm('Yakin hapus foto ini?')">
       Hapus
    </a>
</div>

<?php 
    }
} else {
    echo "<p style='text-align:center;'>Belum ada foto</p>";
}
?>

</div>

<!-- BACK BUTTON -->
<div class="back-btn">
    <a href="admin.php">⬅ Kembali</a>
</div>

</div>

</body>
</html>
