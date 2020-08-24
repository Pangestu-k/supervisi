<?php 
session_start();
include "config/koneksi.php";

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = mysqli_query($con,"SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'");
	$cek = mysqli_num_rows($sql);
	if ($cek > 0) {
		$data = mysqli_fetch_assoc($sql);
		if ($data['akses'] == "kurikulum") {
			$_SESSION['username'] = $username;
			$_SESSION['akses'] = "kurikulum";
			header("location:main.php");
		}elseif ($data['akses'] == "guru") {
			$_SESSION['username'] = $username;
			$_SESSION['akses'] = "guru";
			header("location:main.php");
		}elseif ($data['akses'] == "kepsek") {
			$_SESSION['username'] = $username;
			$_SESSION['akses'] = "kepsek";
			header("location:main.php");
		}elseif ($data['akses'] == "supervisor") {
			$_SESSION['username'] = $username;
			$_SESSION['akses'] = "supervisor";
			header("location:main.php");
		}else{
			echo "<script>alert('Gagal Login Silakan cek username dan juga password');document.location.href='index.php'</script>";
		}
	}else{
		echo "<script>alert('Gagal Login Silakan cek username dan juga password');document.location.href='index.php'</script>";
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

 	 <div class="container" style="margin-top: 130px;">

		    <!-- Outer Row -->
		    <div class="row justify-content-center">

		      <div class="col-xl-10 col-lg-12 col-md-9">

		        <div style="border-radius:50px;" class="card o-hidden border-0 shadow-lg my-6">
		          <div class="card-body p-0">
		            <!-- Nested Row within Card Body -->
		            <div class="row">

		              <div class="col-lg-6 d-none d-lg-block" >
		                <img src="img/a.jpg" class="img-responsive" style="background-position: center; background-size:cover;margin-bottom:10px; width:480px; height:300px;" >  <br>
		                <span class="m-5" ><b>Supervisor | Aplikasi Supervisi Terbaik</b></span>            
		              </div>

		              <div class="col-lg-6" >
		                <div class="p-5">

		                  <div class="text-center">
		                    <h1 class="h4 text-gray-900 mb-4">Silakan Login</h1>
		                  </div>

		                  <form method="post" class="user">
		                    <div class="form-group">
		                      <input type="text" name="username" class="form-control form-control-user" placeholder="Username">
		                    </div>

		                    <div class="form-group">
		                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
		                    </div>

		                    <input type="submit" name="login" value="Login" class="btn btn-primary btn-user btn-block">
		                  </form>
		                  <center>
		                  	<a href="registrasi.php" style="font-size:10px;margin-left: 20px;text-align: center;margin-right: 20px;">Tidak Punya Akun ? Registrasi!</a>
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