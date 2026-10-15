<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $username_akun = mysqli_real_escape_string($conn, $_POST['username_akun']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $total = mysqli_real_escape_string($conn, $_POST['total']);

    $query = "INSERT INTO pesanan (nama, username_akun, email, total)
              VALUES ('$nama', '$username_akun', '$email', '$total')";
    
    if (mysqli_query($conn, $query)) {
        $last_id = mysqli_insert_id($conn);
        header("Location: tagihan.php?id=$last_id");
        exit;
    } else {
        echo "<script>
            alert('Gagal menyimpan pesanan: " . mysqli_error($conn) . "');
            window.history.back();
        </script>";
    }
}
?>
