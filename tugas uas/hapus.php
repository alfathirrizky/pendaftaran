<?php
//menghubungkan koneksi
include "koneksi.php";

$n = $_GET['no'];

$query = "DELETE FROM psb where no_pendaftaran='$n'";

$result = mysqli_query($conn, $query);

if ($result) {
    // echo "Data Sukses Terhapus, Lihat Tampilan <a href='tampil.php'>View</a>";
    header('location:tampilan.php');
} else {
    echo "Data Gagal Dihapus";
}
