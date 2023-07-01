<?php
include "koneksi.php";
session_start();
if (isset($_POST['submit'])) {
 $user = $_POST['user'];
 $password = $_POST['password'];
 $sql = "SELECT * FROM users WHERE username='$user' AND password='$password'";
 $result = mysqli_query($conn, $sql);
 if ($jml=mysqli_num_rows($result) > 0) {
 $row = mysqli_fetch_array($result);
 $_SESSION['username'] = $row['username'];
 header("Location:tampilan.php");
 } else {
 echo "<script>alert('Email atau password Anda salah.
Silahkan coba lagi!')</script>";
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
</head>
<body>
   <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGIN</title>
    <link href="style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  </head>
  <body>
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
    <div class="row justify-content-center mt-5">
        <div class="card border-primary mb-3" style="max-width: 540px">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="images.jpg" class="img-fluid rounded-start" alt="logo" />
            </div>
            <div class="col-md-8">
            <div div class="card-body">
            <div class="form-floating mb-3">
            <input type="text" class="form-control" name="user" id="floatingInput" placeholder="user">
                <label for="floatingInput">username</label>
                </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <a href="tampilan.php" type="submit" name="submit" value="LOGIN" class="btn btn-primary">LOGIN</a>
        </div>
            </div>
        </div>
        </div>
    </div>
  </body>
</html>

</body>
</html>
