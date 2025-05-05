<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];

    $stmt = $conn->prepare("UPDATE mahasiswa SET nama=?, tempat_lahir=?, tanggal_lahir=?, jenis_kelamin=?, agama=?, alamat=? WHERE id=?");
    $stmt->bind_param("ssssssi", $nama, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $agama, $alamat, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal mengupdate data.";
    }
}
