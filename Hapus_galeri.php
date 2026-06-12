<?php
include 'koneksi.php';
if(!isset($_GET['id'])){
    die("ID tidak ditemukan");
}

$id = $_GET['id'];


$query = mysqli_query($conn,"SELECT * FROM gallery WHERE id='$id'");
$data = mysqli_fetch_array($query);

if(!$data){
    die("Data tidak ditemukan");
}

$foto = $data['foto'];


$path = "upload/".$foto;
if(file_exists($path)){
    unlink($path);
}

mysqli_query($conn,"DELETE FROM gallery WHERE id='$id'");

header("Location: tambah_galeri.php");
exit;
