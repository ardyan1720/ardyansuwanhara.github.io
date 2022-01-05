<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "program_pi";
	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));
    //Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal'])){
        if($_GET['hal'] == "lihat"){
        //Tampilkan Data yang akan diedit
                $lihat = mysqli_query($koneksi, "SELECT * FROM kandidat WHERE id_kandidat = '$_GET[id]' ");
                $data = mysqli_fetch_array($lihat);
                if($data){
                    //Jika data ditemukan, maka data ditampung ke dalam variabel
                    $vkode = $data['kode'];
                    $vnama_kandidat = $data['nama_kandidat'];
                    $vtendang = $data['tentang'];
                    $vfoto = $data['foto']; 
                    }
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
    <script src="https://kit.fontawesome.com/9476473f58.js" crossorigin="anonymous"></script>
    <title>Calon Ketua Osis</title>
  </head>
  <body style="background-color:#a2d9ff;">
    <!-- calon ketua -->
      <div class="container">
        <div class="row text-center mb-4 mt-5">
          <div class="col">
            <h2>Calon Ketua Osis</h2>
          </div>
        </div>
        <center>
        <div class="row">
             <div class="col">
            <div class="card " style="width: 600px;height: auto">
            <img src="<?php echo "admin/file/".$data['foto'] ?>" class="card-img-top m-auto" style="width: 280px;height: auto"/>
              <div class="card-body">
              <h3 class="card-title"> <?=$data['kode']?></h3>
                <h4 class="card-title"> <?=$data['nama_kandidat']?> <hr></h4>
                <pre class="fs-6"><?=$data['tentang']?></pre>
                <a class="btn btn-primary mt-3 me-3" href="hal_utama.php" role="button">Kembali</a>
              </div>
            </div>
          </div>
        </div>
        </center>
      </div>
  </body>
</html>
