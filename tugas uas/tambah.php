<?php
include "koneksi.php"
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>PENDAFTARAN</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="#">the academia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">about</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">more</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->
    <!-- form-->
    <form class="row g-3" action="tambah.php" method="post" name="form1" enctype="multipart/form-data">
      <div class="col-md-6">
        <label for="inputNO" class="form-label">NOMOR PENDAFTARAN</label>
        <input type="text" class="form-control" name="no_pendaftaran" id="inpuTNO">
      </div>
      <div class="col-md-6">
        <label for="inputNAMA" class="form-label">NAMA CALON SISWA</label>
        <input type="text" class="form-control" name="nama_calonsiswa" id="inputNAMA">
      </div>
      <div class="col-12">
        <label for="inputALAMAT" class="form-label">ALAMAT</label>
        <input type="text" class="form-control" name="alamat" id="inputAddress" placeholder="ALAMAT">
      </div>
      <div class="col-md-4">
        <label for="inputTGL" class="form-label">TANGGAL LAHIR</label>
        <input type="date" class="form-control" name="tgl_lahir" id="inputTGL" >
      </div>
      <div class="col-md-4">
        <label for="inputnrt" class="form-label">NILAI RATA-RATA</label>
        <input type="text" class="form-control" name="nilai_rata" id="inputnrt" >
      </div>
      <div class="col-md-4">
        <label for="inputgbr" class="form-label">UPLOAD FOTO</label>
        <input type="file" class="form-control" name="gbr" id="inputgbr" >
      </div>
      </div>
      <div class="col-12">
        <button type="submit" name="Submit" class="btn btn-primary">SUBMIT</button>
      </div>
      <a href="tampilan.php" >kembali Kehalaman tampil</a>
    </form>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0d6efd" fill-opacity="1" d="M0,128L60,122.7C120,117,240,107,360,106.7C480,107,600,117,720,154.7C840,192,960,256,1080,266.7C1200,277,1320,235,1380,213.3L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    <!-- akhir form -->
  </body>
</html>

    <?php

    $conn = mysqli_connect("localhost", "root", "", "02sifp002_alfathir");

    // Check if form submitted, insert form data into users table.

    if (isset($_POST['Submit'])) {
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

          if(in_array($ext, $ekstensi) == true){
            move_uploaded_file($file_tmp, 'gambar/'.$foto);
           
        
        //Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO psb (no_pendaftaran,nama_calonsiswa,alamat,tgl_lahir,nilai_rata,foto) VALUES('$np','$ncs','$alt','$tgl','$nrt','gambar/$foto')");
        
          if($result){
            header("location:tampil.php");
          }else{
            echo "Data Gagal Disimpan";
          }
        }else{
          echo "<script> alert('Maaf file ekstensi bukan .png atau .jpg');
          window.location='tambah.php';</scrirpt>";

        }
      }
    }      
          
        // Show message when user added

        //echo "Data Mahasiswa Sukses ditambahkan.
        //<br> 
        //Silahkan Klik Link untuk Lihat data Mahasiswa : <a href= 'tampilan.php'>View Mahasiswa</a>";
    
    ?>
</body>

</html>