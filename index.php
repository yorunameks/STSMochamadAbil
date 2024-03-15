<?php
require_once('database.php');
session_start(); // memulai session
$_SESSION['status'] = ""; 
if ($_SESSION['status']=="login") { // cek session jika sudah login lanjutkan ke index.php 
    header("location:index.php");
}else{ // jika status belum login tampilkan ke form login 
    if (isset($_POST['masuk'])) {  // jika tombol submit ditekan 
        $username = $_POST['username'];
        if (cek_login($_POST['username'], $_POST['password'])) {
            $_SESSION['username'] = $username; // masukan session username
            $_SESSION['status'] = "login"; // masukan session status login
            if ($_SESSION['role']=="admin") {  // jika role admin
                header("location:admin_barang.php"); // arahkan ke halaman index
            }else if($_SESSION['role']=="member"){
                header("location:user_barang.php"); // arahkan ke halaman member
            }
        } else {
            header("location:login.php?msg=gagal"); // jika gagal login arahkan ke halaman login
        }
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<div class="card position-absolute top-50 start-50 translate-middle" style="width: 18rem;" >
  <div class="card-body">
  <form Action="" method="post">
  <div class="mb-3">
  <h1 class="text-center">Sign In!</h1>
  <hr>
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="masuk" value="login">Submit</button>
</form>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>