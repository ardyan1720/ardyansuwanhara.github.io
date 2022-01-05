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
			$edit = mysqli_query($koneksi, "UPDATE kandidat set
                                                kode = '$_POST[tkode]',
											 	nama_kandidat = '$_POST[tnama]',
											 	tentang = '$_POST[ttentang]'
											 WHERE id_kandidat = '$_GET[id]'
										   ");
		//upload foto
		$ekstensi_diperbolehkan = array('png', 'jpg', 'pdf', 'rar');
		$nama = $_FILES['foto']['name']; // untuk mendapatkan nama file yang diupload
		//nama_file.jpg
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran = $_FILES['foto']['size']; //untuk mendapatkan ukuran file yang akan di upload
		$file_tmp = $_FILES['foto']['tmp_name']; //untuk mendapatkan temporary file yang akan di upload (tmp)
				//PINDAHKAN FILE YANG DI UPLOAD KE FOLDER FILE aplikasi
				move_uploaded_file($file_tmp, 'file/'.$nama);
				//simpan data ke dalam database
				$simpan_foto = mysqli_query($koneksi, "UPDATE kandidat set foto = '$nama'
                                                        WHERE id_kandidat = '$_GET[id]'");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
                        document.location='kandidat.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
                        document.location='kandidat.php';
				     </script>";
			}
		}
		else
		{
            //upload foto
            $ekstensi_diperbolehkan = array('png', 'jpg', 'pdf', 'rar');
            $nama = $_FILES['foto']['name']; // untuk mendapatkan nama file yang diupload
            //nama_file.jpg
            $x = explode('.', $nama);
            $ekstensi = strtolower(end($x));
            $ukuran = $_FILES['foto']['size']; //untuk mendapatkan ukuran file yang akan di upload
            $file_tmp = $_FILES['foto']['tmp_name']; //untuk mendapatkan temporary file yang akan di upload (tmp)
                    //PINDAHKAN FILE YANG DI UPLOAD KE FOLDER FILE aplikasi
                    move_uploaded_file($file_tmp, 'file/'.$nama);
                    //Data akan disimpan Baru
                        $simpan = mysqli_query($koneksi, "INSERT INTO kandidat (kode, nama_kandidat, tentang, foto)
                        VALUES ('$_POST[tkode]', 
                                '$_POST[tnama]', 
                                '$_POST[ttentang]',
                                '$nama')
                    ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
                        document.location='kandidat.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
                        document.location='kandidat.php';
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
			$tampil = mysqli_query($koneksi, "SELECT * FROM kandidat WHERE id_kandidat = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
                $vkode = $data['kode'];
				$vnama = $data['nama_kandidat'];
				$vtentang = $data['tentang'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM kandidat WHERE id_kandidat = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
                        document.location='kandidat.php';
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
    <title>Admin-kandidat</title>
  </head>
<body>
<div class="container">
	<h1 class="text-center">INPUT DATA</h1>
	<!-- Awal Card Form -->
	<div class="card mt-3">
	  <div class="card-header bg-primary text-white">
	    Form Input Data Kandidat
	  </div>
	  <div class="card-body">
	    <form method="post" action="" enctype="multipart/form-data">
	    	<div class="form-group">
	    		<label>Kode</label>
	    		<input type="text" name="tkode" value="<?=@$vkode?>" class="form-control" placeholder="Input Nim anda disini!" required>
	    	</div>
            <div class="form-group">
	    		<label>Nama</label>
	    		<input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Input Nim anda disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Visi & Misi</label>
	    		<textarea class="form-control" name="ttentang" placeholder="Input Alamat anda disini!"><?=@$vtentang?></textarea>
	    	</div>
	    	<div class="form-group">
	    		<label>Foto</label> <br>
				<input type="file" name="foto">
				<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
			</div>
	    	<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>
            <a class="btn btn-primary me-3" href="dashboard.php" role="button" style="position: absolute; right: 0;">kembali</a>
	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->
	<!-- Awal Card Tabel -->
	<div class="card mt-3">
	  <div class="card-header bg-success text-white">
	    Daftar Kandidat
	  </div>
	  <div class="card-body">
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>No.</th>
                <th>Kode</th>
	    		<th>Nama</th>
	    		<th>Visi & Misi</th>
	    		<th>foto</th>
	    		<th>Aksi</th>
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from kandidat order by id_kandidat desc");
	    		while($data = mysqli_fetch_array($tampil)) :
	    	?>
	    	<tr>
	    		<td><?=$no++;?></td>
                <td><?=$data['kode']?></td>
	    		<td><?=$data['nama_kandidat']?></td>
	    		<td><pre><?=$data['tentang']?></pre></td>
                <td width="15%"><img src="<?php echo "file/".$data['foto'] ?>" style="width: 80px;height: auto"></td>
	    		<td width="15%">
                <a href="kandidat.php?hal=edit&id=<?=$data['id_kandidat']?>" class="btn"><i class="fas fa-edit bg-warning p-2 rounded"></i> </a>
                <a href="kandidat.php?hal=hapus&id=<?=$data['id_kandidat']?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn"><i class="fas fa-trash-alt text-white bg-danger p-2 rounded"></i></a>
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