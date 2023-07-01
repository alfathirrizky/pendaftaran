<?php
include "koneksi.php";

$n = $_GET['no'];

$query = "SELECT * FROM psb where no_pendaftaran='$n'";

$result = mysqli_query($conn, $query);

while ($data = mysqli_fetch_array($result)) {
    $np = $data['no_pendaftaran'];
    $ncs = $data['nama_calonsiswa'];
    $alt = $data['alamat'];
    $tgl = $data['tgl_lahir'];
    $nrt = $data['nilai_rata'];
    $foto = $data['foto'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>update data mahasiswa</title>
  </head>
  <body>
    <!-- form-->
    <form class="row g-3" action="" method="post" enctype="multipart/form-data">
      <div class="col-md-6">
        <label for="inputNO" class="form-label">NOMOR PENDAFTARAN</label>
        <input type="text" class="form-control" name="no_pendaftaran" id="inpuTNO" value="<?php echo $np ?>" readonly>
      </div>
      <div class="col-md-6">
        <label for="inputNAMA" class="form-label">NAMA CALON SISWA</label>
        <input type="text" class="form-control" name="nama_calonsiswa" id="inputNAMA" value="<?php echo $ncs ?>">
      </div>
      <div class="col-12">
        <label for="inputALAMAT" class="form-label">ALAMAT</label>
        <input type="text" class="form-control" name="alamat" id="inputAddress" placeholder="ALAMAT" value="<?php echo $alt ?>">
      </div>
      <div class="col-md-4">
        <label for="inputTGL" class="form-label">TANGGAL LAHIR</label>
        <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $tgl ?>" id="inputTGL" >
      </div>
      <div class="col-md-4">
        <label for="inputnrt" class="form-label">NILAI RATA-RATA</label>
        <input type="text" class="form-control" name="nilai_rata" id="inputnrt" >
      </div>
      <div class="col-md-4">
        <label for="inputTGL" class="form-label">FOTO</label>
        <input type="file" class="form-control" name="gbr" value="<?php echo $foto ?>" id="inputgbr" >
        <img src="<?php echo $foto;?>" width="100" height="140">
      </div>
      </div>
      <div class="col-12">
        <button type="submit" name="edit" value="UPDATE" class="btn btn-primary">UPDATE</button>
      </div>
      <a href="tampilan.php" >kembali Kehalaman tampil</a>
    </form>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0d6efd" fill-opacity="1" d="M0,128L60,122.7C120,117,240,107,360,106.7C480,107,600,117,720,154.7C840,192,960,256,1080,266.7C1200,277,1320,235,1380,213.3L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    <!-- akhir form -->
  </body>
</html>

<?php

if (isset($_POST['edit'])) {
    $np = $_POST['no_pendaftaran'];
    $ncs = $_POST['nama_calonsiswa'];
    $alt = $_POST['alamat'];
    $tgl = $_POST['tgl_lahir'];
    $nrt = $_POST['nilai_rata'];
    $foto = $_FILES['gbr']['name'];

    if($foto != ""){
      $ekstensi = array('jpg','png');
      $x = explode('.',$foto);
      $ext = strtolower(end($x));
      $file_tmp = $_FILES['gbr']['tmp_name'];

      if(in_array($ext, $ekstensi) == true) { 
        move_uploaded_file($file_tmp, 'gambar/'.$foto);
      
    $q = "UPDATE psb SET nama_calonsiswa='$ncs', alamat='$alt', tgl_lahir='$tgl', nilai_rata='$nrt',  foto='gambar/$foto' WHERE no_pendaftaran='$np'";

    $perintah = mysqli_query($conn, $q);

    if($perintah){
      header ("location: tampilan.php");
    }else
    {
      echo "Gagal diupdate";
    }
  }
  else{
    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tampilan.php';</script>";
  }
    }
    else{
        $q="UPDATE psb SET nama_calonsiswa='$ncs', alamat='$alt', tgl_lahir='$tgl', nilai_rata='$nrt',  WHERE no_pendaftaran='$np'";

        $result= mysqli_query ($conn, $q);
      
      if($result)
      {
        header ("location: tampilan.php");
      }
      else {
        echo "Gagal diupdate";
      }
    }
}
?>