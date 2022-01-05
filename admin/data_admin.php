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
		if($_GET['hal'] == "edit")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE data_admin set
											 	nama_admin = '$_POST[tnama]',
											 	kata_kunci = '$_POST[tpassword]',
												pengguna_admin = '$_POST[tuser]'
											 WHERE id_admin = '$_GET[id]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
                        document.location='data_admin.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
                        document.location='data_admin.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO data_admin (nama_admin, kata_kunci, pengguna_admin)
										  VALUES ('$_POST[tnama]', 
										  		 '$_POST[tpassword]', 
										  		 '$_POST[tuser]')
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
                        document.location='data_admin.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
                        document.location='data_admin.php';
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
			$tampil = mysqli_query($koneksi, "SELECT * FROM data_admin WHERE id_admin = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vnama = $data['nama_admin'];
				$vpassword = $data['kata_kunci'];
				$vuser = $data['pengguna_admin'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM data_admin WHERE id_admin = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
                        document.location='data_admin.php';
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
    <link rel="stylesheet" href="admin_css.css" />
    <script src="https://kit.fontawesome.com/9476473f58.js" crossorigin="anonymous"></script>
    <title>User Admin</title>
  </head>
<body>
<div class="container">
	<h1 class="text-center">INPUT DATA</h1>
	<!-- Awal Card Form -->
	<div class="card mt-3">
	  <div class="card-header bg-primary text-white">
	    Form Input Data Admin
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group mb-2">
	    		<label>Nama</label>
	    		<input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Input Nim anda disini!" required>
	    	</div>
	    	<div class="form-group mb-2">
	    		<label>User Name</label>
	    		<input type="text" name="tuser" value="<?=@$vuser?>" class="form-control" placeholder="Input Nama anda disini!" required>
	    	</div>
	    	<div class="form-group mb-2">
	    		<label>Password</label>
	    		<input type="text" name="tpassword" value="<?=@$vpassword?>" class="form-control" placeholder="Input Nama anda disini!" required>
	    	</div>
	    	<button type="submit" class="btn btn-success mt-3" name="bsimpan">Simpan</button>
	    	<button type="reset" class="btn btn-danger mt-3" name="breset">Kosongkan</button>
			<a class="btn btn-primary mt-3 me-3" href="dashboard.php" role="button" style="position: absolute; right: 0;">kembali</a>
	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->
	<!-- Awal Card Tabel -->
	<div class="card mt-3">
	  <div class="card-header bg-success text-white">
	    Daftar Admin
	  </div>
	  <div class="card-body">   
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>No.</th>
	    		<th>Nama</th>
	    		<th>User Name</th>
	    		<th>Password</th>
	    		<th>Aksi</th>
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from data_admin order by id_admin desc");
	    		while($data = mysqli_fetch_array($tampil)) :
	    	?>
	    	<tr>
	    		<td><?=$no++;?></td>
	    		<td><?=$data['nama_admin']?></td>
	    		<td><?=$data['pengguna_admin']?></td>
	    		<td><?=$data['kata_kunci']?></td>
	    		<td>
                <a href="data_admin.php?hal=edit&id=<?=$data['id_admin']?>" class="btn"><i class="fas fa-edit bg-warning p-2 rounded"></i> </a>
                <a href="data_admin.php?hal=hapus&id=<?=$data['id_admin']?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn"><i class="fas fa-trash-alt text-white bg-danger p-2 rounded"></i></a>
	    		</td>
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>
	    </table>
	  </div>
	</div>
	<!-- Akhir Card Tabel -->
</div>
</body>
</html>