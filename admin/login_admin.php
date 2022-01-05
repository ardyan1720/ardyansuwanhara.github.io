<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "program_pi";
	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

  if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $get_user = "SELECT * FROM data_admin WHERE pengguna_admin ='$username' ";
  $result = mysqli_query($koneksi, $get_user);
  $data = mysqli_fetch_array($result);
  if($data){
    if($password == $data['kata_kunci']){
      echo "<script>
						alert('Login suksess!');
                        document.location='dashboard.php';
				     </script>";
      // header("Loaction: dashboard.php");
    }else{
      echo "<script>
						alert('Login GAGAL!!');
                        document.location='login_admin.php';
				     </script>";
      // header("Loaction: login_admin.php");
    }
  }else {
    header("Loaction: login_admin.php");
  }
}
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <!-- css -->
    <link rel="stylesheet" href="admin_css.css" />
    <script src="https://kit.fontawesome.com/9476473f58.js" crossorigin="anonymous"></script>
    <title>login-admin</title>
  </head>
  <body>
    <div class="container">
      <h1 class="text-center mt-5">LOGIN ADMIN</h1>
      <!-- Awal Card Form -->
      <div class="card mt-5 m-auto"style="width: 30rem; ">
        <div class="card-header bg-primary text-white" >Form Input Data Pemilih</div>
        <div class="card-body">
          <form method="post" action=""> 
            <div class="form-group mb-2">
              <label>User Name</label>
              <input type="text" name="username" class="form-control" placeholder="Input user name disini" required />
            </div>
            <div class="form-group mb-2">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Input password disini" required />
            </div>
            <button type="submit" name = "login" class="btn btn-success mt-3 me-3">Masuk</button>
            <button type="reset" class="btn btn-danger mt-3">Kosongkan</button>
			<a class="btn btn-primary mt-3 me-3" href="../hal_utama.php" role="button" style="position: absolute; right: 0;">Kembali</a>
          </form>
        </div>
      </div>
      <!-- Akhir Card Form -->
      </div>
  </body>
</html>