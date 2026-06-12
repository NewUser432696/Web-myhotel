<?php
session_start();
include 'koneksi.php';

if(isset($_POST['bayar'])){

    // cek id booking
    if(isset($_POST['id_booking'])){
        $id_booking = $_POST['id_booking'];
    } else {
        die("ID booking tidak ditemukan");
    }

    // cek metode bayar
    if(isset($_POST['metode_bayar'])){
        $metode = $_POST['metode_bayar'];
    } else {
        die("Metode pembayaran belum dipilih");
    }

    // cek file upload
    if(isset($_FILES['bukti']) && $_FILES['bukti']['error'] == 0){

        $namaFile = $_FILES['bukti']['name'];
        $tmpFile = $_FILES['bukti']['tmp_name'];

        if(!is_dir("upload")){
            mkdir("upload");
        }

        $namaBaru = time() . "_" . $namaFile;
        $path = "upload/" . $namaBaru;

        if(move_uploaded_file($tmpFile, $path)){

            $update = mysqli_query($conn,"
                UPDATE booking 
                SET metode_bayar='$metode',
                    bukti_bayar='$namaBaru',
                    status='lunas'
                WHERE id='$id_booking'
            ");

            if($update){
                echo "
                <script>
                    alert('Pembayaran berhasil!');
                    window.location='history_booking.php';
                </script>
                ";
            } else {
                echo "Gagal update database: " . mysqli_error($conn);
            }

        } else {
            echo "Upload file gagal";
        }

    } else {
        echo "Bukti pembayaran wajib diupload";
    }

} else {
    echo "Akses ditolak";
}
?>
