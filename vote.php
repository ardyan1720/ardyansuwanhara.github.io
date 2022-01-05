<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "program_pi";
	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

  if(isset($_POST['bvote'])){
    if(isset($data['kode']))
	{
    $vkode = $data['kode'];
  }
  echo($vkode);
  }

    //jika tombol simpan diklik
	if(isset($_POST['bpilih']))
	{
        //Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "vote")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE pemilih set
                                            pilihan = '$_POST[tpilihan]'
											 WHERE NISN = '$_POS[id]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='pemilih.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='pemilih.php';
				     </script>";
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
    <!-- css -->
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/9476473f58.js" crossorigin="anonymous"></script>
    <title>Ardyan Suwanhara</title>
  </head>
  <body>
      <!-- calon ketua -->
      <div class="container">
        <div class="row text-center mb-4 mt-5">
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
            <div class="card col-md-4 mb-4" style="width: 300px;height: auto">
            <img src="<?php echo "admin/file/".$data['foto'] ?>" class="card-img-top" style="width: 280px;height: auto"/>
              <div class="card-body">
              <h5 class="card-title"><?=$data['kode']?></h5>
                <h5 class="card-title"><?=$data['nama_kandidat']?></h5>
                <button type="submit" class="btn btn-success mt-3" name="bvote" >pilih</button>
              </div>
            </div>
          </div>
          <?php endwhile; //penutup perulangan while ?>
        </div>
        <label>NISN</label>
              <input type="text" name="tpilihan" value="<?=@$vkode?>" class="form-control" placeholder="Input NISN disini"required />
        <button type="submit" class="btn btn-success mt-3" name="bpilih" >Simpan</button>
        </center>
      </div>
    <!-- akhir calon -->
  </body>
</html>