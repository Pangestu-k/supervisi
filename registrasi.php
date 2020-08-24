<?php 
include "config/koneksi.php";

if (isset($_POST['Registrasi'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$re_password = $_POST['re_password'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['telp'];
	$akses = "guru";

	//skrip query ini digunakan untuk memvalidasi email yang masuk
	$query = mysqli_query($con,"SELECT * FROM tb_user WHERE email ='$email'");

	if (empty($username) || empty($email) || empty($telp) || empty($alamat) || empty($password) || empty($re_password) ) {
		echo "<script>alert('Ada Data yg Kosong')</script>";
	}elseif($password != $re_password) {
		echo "<script>alert('Password Tidak Sama')</script>";
	}elseif(mysqli_num_rows($query) == 1) { //ini berfungsi untuk memeriksa jumlah email jika nilai 1 berarti ada
		echo "<script>alert('Email Sudah Terdaftar')</script>";
	}
	else{
		mysqli_query($con,
			"INSERT INTO `tb_user` (`id_user`, `username`, `password`, `akses`, `alamat`, `telp`, `email`)
			 VALUES (NULL, '$username', '$password', '$akses', '$alamat', '$telp', '$email@')");
		header("Location:index.php");

	}
}

 ?>

<!DOCTYPE html>
 <html lang="en">

<!DOCTYPE html>
<html lang="en">

<head> 

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Superviosr | Aplikasi Supervisi</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="img/logo.png" />

</head>
 <body style="background-color: powderblue;">

 	 <div class="container" style="margin-top: 60px;margin-bottom: 60px;">

		    <!-- Outer Row -->
		    <div class="row justify-content-center">

		      <div class="col-xl-6 col-lg-12 col-md-9">

		        <div style="border-radius:50px;" class="card o-hidden border-0 shadow-lg my-6">
		          <div class="card-body p-0">
		            <!-- Nested Row within Card Body -->
		            <div class="row">

		              <div class="col-lg-12" >
		                <div class="p-5">

		                  <div class="text-center">
		                    <h1 class="h4 text-gray-900 mb-4">Registrasi Yukkk</h1>
		                  </div>

		                  <form method="post" class="user">

		                    <div class="form-group">
		                      <input type="text" name="username" class="form-control form-control-user" placeholder="Username">
		                    </div>

		                    <div class="form-group">
		                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
		                    </div>

		                     <div class="form-group">
		                      <input type="password" name="re_password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Ulang Password">
		                    </div>

		                    <div class="form-group">
		                      <input type="text" name="telp" class="form-control form-control-user" placeholder="No Telpon">
		                    </div>

		                    <div class="form-group">
		                      <input type="text" name="email" class="form-control form-control-user" placeholder="email">
		                    </div>

		                    <div class="form-group">
		                     <textarea name="alamat" class="form-control form-control-user" placeholder="alamat"></textarea>
		                    </div>

		                    <input type="submit" name="Registrasi" value="Registrasi" class="btn btn-primary btn-user btn-block">
		                  </form>

		                  <center>
		                  	<a href="index.php" style="font-size:10px;margin-left: 20px;text-align: center;margin-right: 20px;">Sudah Punya Akun ? Login!</a>
		                  </center>
		                  
		                </div>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>

  </div>


 <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>



 </body>
 </html>


