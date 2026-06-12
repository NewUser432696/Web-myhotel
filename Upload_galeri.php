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
    <title>Tambah Galeri</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, sans-serif;
        }

        body{
            display:flex;
            background:#f5f5f5;
        }

        /* SIDEBAR */
        .sidebar{
            width:250px;
            height:100vh;
            background:black;
            color:white;
            padding:20px;
            position:fixed;
        }

        .sidebar h2{
            margin-bottom:30px;
        }

        .sidebar a{
            display:block;
            color:white;
            text-decoration:none;
            padding:12px 10px;
            margin-bottom:10px;
        }

        .sidebar a:hover{
            background:#333;
            border-radius:8px;
        }

        /* CONTENT */
        .content{
            margin-left:250px;
            width:100%;
            padding:30px;
        }

        .container{
            width:600px;
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 4px 10px rgba(0,0,0,0.1);
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        input{
            width:100%;
            padding:12px;
            margin-bottom:15px;
            border:1px solid #ccc;
            border-radius:8px;
        }

        button{
            width:100%;
            padding:12px;
            background:green;
            color:white;
            border:none;
            border-radius:8px;
            cursor:pointer;
        }

        button:hover{
            background:darkgreen;
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Admin</h2>

    <a href="admin.php">Dashboard</a>
    <a href="paket_admin.php">Paket Foto</a>
    <a href="gallery_admin.php">Galeri</a>
    <a href="booking_admin.php">Booking</a>
    <a href="review_admin.php">Review</a>
    <a href="logout.php">Logout</a>
</div>

<!-- CONTENT -->
<div class="content">
    <div class="container">
        <h2>Tambah Galeri</h2>

        <form action="proses_galeri.php" method="POST" enctype="multipart/form-data">

            <input type="text" name="judul" placeholder="Judul Foto" required>

            <input type="file" name="foto" required>

            <button name="upload">
                Upload
            </button>

        </form>
    </div>
</div>

</body>
</html>
