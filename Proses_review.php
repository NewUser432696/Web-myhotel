<?php
session_start();
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $id_user = $_POST['id_user'];
    $rating  = $_POST['rating'];
    $komentar = mysqli_real_escape_string($conn, $_POST['komentar']);
    
   
    $id_booking = isset($_POST['id_booking']) ? $_POST['id_booking'] : 'NULL';

    $query = "INSERT INTO review (id_user, id_booking, rating, komentar) 
              VALUES ('$id_user', $id_booking, '$rating', '$komentar')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Terima kasih atas review Anda!');
                window.location='review.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
