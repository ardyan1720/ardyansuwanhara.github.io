<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "program_pi";
	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

  // href="vote.php?hal=vote&id=NISN";

  if(isset($_POST['login'])){
    $username = $_POST['NIS'];
    $password = $_POST['NISN'];
  
    $get_user = "SELECT * FROM pemilih WHERE NIS ='$username' ";
    $result = mysqli_query($koneksi, $get_user);
    $data = mysqli_fetch_array($result);
    if($data){
      if($password == $data['NISN']){
        echo "<script>
              alert('Login suksess!');
                          document.location='vote2.php?hal=vote&id=$password';
               </script>";
        // header("Loaction: dashboard.php");
      }else{
        echo "<script>
              alert('Login GAGAL!!');
                          document.location='hal_utama.php';
               </script>";
        // header("Loaction: login_admin.php");
      }
    }else {
      header("Loaction: hal_utama.php");
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
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/9476473f58.js" crossorigin="anonymous"></script>

    <title>Ardyan Suwanhara</title>
  </head>
  <body id="home">
    <!-- navabar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow fixed-top" style="background-color: #00f7ff">
      <div class="container">
        <a class="navbar-brand" href="#">SMPIT AN-NAHLA AL-ISLAMY</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#syarat">Cara Voting</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#calon">Calon Ketua Osis</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#voting">Voting</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- end navbar -->

    <!-- jumbotron -->
    <section class="jumbotron text-center">
      <img src="foto/logo.jpg" alt="foto1" width="200" class="rounded-circle" />
      <h1 class="display-4">E-Voting</h1>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#ffffff"
          fill-opacity="1"
          d="M0,224L48,208C96,192,192,160,288,160C384,160,480,192,576,176C672,160,768,96,864,96C960,96,1056,160,1152,186.7C1248,213,1344,203,1392,197.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg>
    </section>
    <!-- end jumbotron -->
    <!-- cara milih -->
    <section class="our-process" id="syarat">
      <div class="container">
        <div class="row">
          <div class="col-sm-6" data-aos="fade-up">
            <h3 class="font-weight-medium text-dark">Cara Mengikuti Voting!</h3>
            <p class="font-weight-medium mb-4">
              Untuk dapat login, kamu dapat menggunakan NIS dan NISN milik kamu
              <br />
              Jika terdapat kendala, silahkan hubungi nomor yang tertera di paling bawah
            </p>
            <div class="d-flex justify-content-start mb-3">
              <p class="mb-0"><i class="fas fa-sign-in-alt me-3"></i>Login</p>
            </div>
            <div class="d-flex justify-content-start mb-3">
              <p class="mb-0"><i class="fas fa-location-arrow me-3"></i> Masukkan Kandidat yang Dipilih</p>
            </div>
            <div class="d-flex justify-content-start mb-3">
              <p class="mb-0"><i class="fas fa-save me-3"></i>Klik Tombol Simpan</p>
            </div>
            <div class="d-flex justify-content-start">
              <p class="mb-0"><i class="fas fa-clipboard-check me-3"></i>Selesai</p>
            </div>
          </div>
          <div class="col-sm-6 text-right" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#cef9ff"
          fill-opacity="1"
          d="M0,128L48,117.3C96,107,192,85,288,112C384,139,480,213,576,234.7C672,256,768,224,864,192C960,160,1056,128,1152,133.3C1248,139,1344,181,1392,202.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg>
    </section>
    <!-- end cara milih -->
    <!-- calon ketua -->
    <section id="calon">
      <div class="container">
        <div class="row text-center mb-4">
          <div class="col">
            <h2>Calon Ketua Osis</h2>
          </div>
        </div>
        <center>
        <div class="row">
            <?php
             $tampil = mysqli_query($koneksi, "SELECT * from kandidat order by id_kandidat desc");
             while($data = mysqli_fetch_array($tampil)) : ?>
             <div class="col-md-4 mb-4">
            <div class="card col-md-4 mb-4" style="width: 280px;height: auto">
            <img src="<?php echo "admin/file/".$data['foto'] ?>" class="card-img-top m-auto" style="width: 280px;height: auto"/>
              <div class="card-body">
              <h5 class="card-title"><?=$data['kode']?></h5>
                <h5 class="card-title"><?=$data['nama_kandidat']?></h5>
                <a href="form_calon.php?hal=lihat&id=<?=$data['id_kandidat']?>" class="btn btn-primary">Lihat Detail</a>
              </div>
            </div>
          </div>
          <?php endwhile; //penutup perulangan while ?>
        </div>
        </center>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#ffffff"
          fill-opacity="1"
          d="M0,128L48,117.3C96,107,192,85,288,112C384,139,480,213,576,234.7C672,256,768,224,864,192C960,160,1056,128,1152,133.3C1248,139,1344,181,1392,202.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg>
    </section>
    <!-- akhir calon -->
    <div class="container">
        <div class="card-body">
          <div class="row">
            <section id="jumlah">
              <div class="container">
              <div class="row pt-2 mt-2 pb-2 mb-2">
                <div class="col-sm-3">
                  <div class="d-flex py-3 my-3 my-lg-0 justify-content-center" data-aos="fade-down">
                    <div>
                    <?php $pemilih = mysqli_query($koneksi,"SELECT * FROM pemilih"); ?>
                    <h5 class="text-dark mb-0">Jumlah Pemilih</h5>
                      <h4 class="font-weight-bold text-dark mb-0"><span><?php echo mysqli_num_rows($pemilih); ?></span></h4>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="d-flex py-3 my-3 my-lg-0 justify-content-center" data-aos="fade-up">
                    <div>
                    <?php $kandidat = mysqli_query($koneksi,"SELECT * FROM kandidat"); ?>
                    <h5 class="text-dark mb-0">Jumlah Kandidat</h5>
                      <h4 class="font-weight-bold text-dark mb-0"><span><?php echo mysqli_num_rows($kandidat); ?></span></h4>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="d-flex py-3 my-3 my-lg-0 justify-content-center" data-aos="fade-down">
                    <div>
                    <?php $sudah = mysqli_query($koneksi,"SELECT * from pemilih where pilihan > 0 "); ?>
                    <h5 class="text-dark mb-0">Pemilih sudah memilih</h5>
                      <h4 class="font-weight-bold text-dark mb-0"><span><?php echo mysqli_num_rows($sudah); ?></span></h4>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="d-flex py-3 my-3 my-lg-0 justify-content-center" data-aos="fade-up">
                    <div>
                    <?php $belum = mysqli_query($koneksi,"SELECT * from pemilih where pilihan = 0 "); ?>
                    <h5 class="text-dark mb-0">Pemilih belum memilih</h5>
                      <h4 class="font-weight-bold text-dark mb-0"><span><?php echo mysqli_num_rows($belum); ?></span></h4>
                    </div>
                  </div>
                </div>
              </div>
              </section>
          </div>
        </div>
    </div>

    <!-- voting -->
    <section id="voting">
      <div class="container mt-5">
        <div class="row text-center mb-4">
          <div class="col">
            <h2>login</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-4">
          <form method="post" action=""> 
            <div class="form-group mb-2">
              <label>NIS</label>
              <input type="text" name="NIS" class="form-control" placeholder="Input NIS disini" required />
            </div>
            <div class="form-group mb-2">
              <label>NISN</label>
              <input type="text" name="NISN" class="form-control" placeholder="Input NISN disini" required />
            </div>
            <button type="submit" name ="login" class="btn btn-primary mt-3 me-3">Masuk</button>
          </form>
          </div>
        </div>
      </div>
      <a class="navbar-brand fw-bold ms-5 text-dark" href="admin/login_admin.php"  style="position: absolute; right: 0;"> <u>Login Admin</u></a>
    </section>
    <!-- end voting -->
    <!-- footer -->
    <footer class="footer footer-expand-lg footer-light shadow text-center p-2" style="background-color: #8cedfa">
      <p>Dibuat oleh <a href="https://www.instagram.com/ardyan_swn/" class="text-black fw-bold">Ardyan Suwanhara </a><i class="fab fa-whatsapp me-2 ms-3"></i>085775145702</p>
     
    </footer>
    <!-- end footer -->
    <!-- https://startbootstrap.com/theme/sb-admin-2 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>