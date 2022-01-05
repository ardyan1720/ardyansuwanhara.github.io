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
      <a class="navbar-brand fw-bold text-white ms-5" href="#">ADMIN</a>
    </nav>
    <!-- end navbar -->
    <div class="container">
      <div class="row text-center mb-4 mt-5">
        <div class="col mt-5">
          <h2>HASIL SUARA</h2>
        </div>
      </div>
    <div class="card mt-3">
        <div class="card-header bg-success text-white">Hasil Suara
        </div>
    <div class="card-body">	    
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>No.</th>
                <th>Kode</th>
	    		<th>Nama</th>
	    		<th>foto</th>
	    		<th>Jumlah Suara</th>
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from kandidat order by id_kandidat desc");
	    		while($data = mysqli_fetch_array($tampil)) :
	    	?>
	    	<tr>
                <?php $suara = $data['kode'];
                    ?>
	    		<td><?=$no++;?></td>
                <td><?=$data['kode']?></td>
	    		<td><?=$data['nama_kandidat']?></td>
                <td width="15%"><img src="<?php echo "file/".$data['foto'] ?>" style="width: 80px;height: auto"></td>
	    		<td width="15%">
                <?php $suara2 = mysqli_query($koneksi,"SELECT * from pemilih where pilihan = $suara ");
                echo mysqli_num_rows($suara2);
                ?>
	    		</td>
	    	</tr>         
	    <?php endwhile; //penutup perulangan while ?>
	    </table>
        <a class="btn btn-primary me-3" href="dashboard.php" role="button" style=" right: 0;">kembali</a>
	  </div>
    </div>
    </div>
  </body>
</html>
