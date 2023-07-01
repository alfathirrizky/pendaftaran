<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>DATA PENDAFTARAN SISWA BARU</title>
    
</head>

<body>

<h1 class="display-1">DATA PENDAFTARAN SISWA BARU</h1>
    <a class="button2" href="tambah.php" role="button">tambah data mahasiswa</a>
    <a class="button2" href="logout.php" role="button">logout</a>
    <br><br>
    <table class="table table-success table-striped">
        <tr>
            <th>Nomer pendaftaran</th>
            <th>Nama calon siswa</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>nilai rata-rata</th>
            <th>Foto siswa</th>
            <th>Aksi</th>
        </tr>


        <?php
        include "koneksi.php";

        $sql = "SELECT * FROM psb";
        $perintah = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($perintah)) {
            echo "<tr>
                <td>" . $data["no_pendaftaran"] . "</td>
                <td>" . $data["nama_calonsiswa"] . "</td>                                                                                                                                    
                <td>" . $data["alamat"] . "</td>
                <td>" . $data["tgl_lahir"] . "</td>
                <td>" . $data["nilai_rata"] . "</td>
                <td><img src='". $data["foto"] . "' width='85' height='100'></td>
                <td>
                    <a href='hapus.php?no=$data[no_pendaftaran]'>Hapus</a>|
                    <a href='edit.php?no=$data[no_pendaftaran]'>Edit</a>
                </td>
                
              
            </tr>";
        }
        ?>
    </table>
</body>