<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "program_pi";
	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));
	//jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		//Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "vote")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE pemilih set
                                                pilihan = '$_POST[tpilihan]'
											 WHERE NISN = '$_GET[id]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Kamu telah menilih !');
						document.location='vote2.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='vote2.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO pemilih (pilihan)
										  VALUES ('$_POST[tpilihan]')		 
										 "); 
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='pemilih.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='pemilih.php';
				     </script>";
			}
		}
	}
	//Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "edit")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM pemilih WHERE NISN = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vNISN = $data['NISN'];
				$vpilihan = $data['pilihan']; 
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM pemilih WHERE pilihan = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='pemilih.php';
				     </script>";
			}
		}
	}
  unset($_POST['breset']);
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
    <title>Admin-pemilih</title>
  </head>
  <body style="background-color:#a2d9ff;">
  <div class="container">
        <div class="row text-center mb-3 mt-2">
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
            <div class="card col-md-4 mb-2" style="width: 200px;height: auto">
            <img src="<?php echo "admin/file/".$data['foto'] ?>" class="card-img-top m-auto" style="width: 200px;height: auto"/>
              <div class="card-body">
              <h5 class="card-title"><?=$data['kode']?></h5>
                <h5 class="card-title"><?=$data['nama_kandidat']?></h5>
              </div>
            </div>
          </div>
          <?php endwhile; //penutup perulangan while ?>
        </div>
        </div>
    <div class="container">
      <!-- Awal Card Form -->
      <center>
      <div class="card" style="width: 280px;height: auto">
        <div class="card-header bg-primary text-white">Form Input Data Pemilih</div>
        <div class="card-body">
          <form method="post" action=""> 
            <div class="form-group mb-2">
              <input type="text" name="tpilihan" class="form-control" placeholder="Input NISN disini" required />
              <button type="submit" class="btn btn-success mt-3" name="bsimpan" >Simpan</button>
			<a class="btn btn-primary mt-3 me-3" href="hal_utama.php" role="button" style="position: absolute; right: 0;">kembali</a>
            </div>
          </form>
        </div>
      </div>
      </center>
    </div>
  </body>
</html>

