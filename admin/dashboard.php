<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "program_pi";
	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));
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
    <title>Admin</title>
  </head>
  <body id="home">
    <!-- navabar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow fixed-top" style="background-color: #0d6efd">
      <a class="navbar-brand fw-bold text-white ms-5" style="position: absolute; right: 0;" href="../hal_utama.php">Log Out</a>
      <p class="fs-4 text-white" style="position: absolute;"><i class="fas fa-user-circle ms-3 mt-3 me-2"></i>ADMIN<hr size="5" class="bg-light">
    </nav>
    <!-- end navbar -->
    <div class="container">
      <div class="row text-center mb-4 mt-5">
        <div class="col mt-5">
          <h2>DASHBOARD</h2>
        </div>
      </div>
      <div class="card" style="background-color: #acf3f8">
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
    </div>
    <div class="card-body">
      <div class="row mt-4">
        <div class="col-md-3 mb-4">
          <div class="row text-white">
            <div class="card bg-danger ms-4 mt-3" style="width: 18rem">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-users me-2"></i>
                </div>
                <h5 class="card-title">DATA PEMILIH</h5>
                <div class="display-4">100</div>
                <a href="pemilih.php"
                  ><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ms-2"></i></p
                ></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-4">
          <div class="row text-white">
            <div class="card bg-warning ms-3 mt-3" style="width: 18rem">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-users me-2"></i>
                </div>
                <h5 class="card-title">DATA KANDIDAT</h5>
                <div class="display-4">100</div>
                <a href="kandidat.php"
                  ><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ms-2"></i></p
                ></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-4">
          <div class="row text-white">
            <div class="card bg-success ms-3 mt-3" style="width: 18rem">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-users me-2"></i>
                </div>
                <h5 class="card-title">HASIL SUARA</h5>
                <div class="display-4">100</div>
                <a href="suara.php"
                  ><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ms-2"></i></p
                ></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-4">
          <div class="row text-white">
            <div class="card bg-info ms-3 mt-3" style="width: 18rem">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-users me-2"></i>
                </div>
                <h5 class="card-title">DATA ADMIN</h5>
                <div class="display-4">100</div>
                <a href="data_admin.php"
                  ><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ms-2"></i></p
                ></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
