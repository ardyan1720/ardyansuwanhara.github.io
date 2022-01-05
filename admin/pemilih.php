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
			$edit = mysqli_query($koneksi, "UPDATE pemilih set
											 	nama_pemilih = '$_POST[tnama]',
											 	NIS = '$_POST[tNIS]',
												NISN = '$_POST[tNISN]'
											 WHERE id_siswa = '$_GET[id]'
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
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO pemilih (nama_pemilih, NIS, NISN)
										  VALUES ('$_POST[tnama]', 
										  		 '$_POST[tNIS]', 
										  		 '$_POST[tNISN]')
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
			$tampil = mysqli_query($koneksi, "SELECT * FROM pemilih WHERE id_siswa = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vnama = $data['nama_pemilih'];
				$vNIS = $data['NIS'];
				$vNISN = $data['NISN'];
				$vpilihan = $data['pilihan']; 
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM pemilih WHERE id_siswa = '$_GET[id]' ");
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
  <body>
    <div class="container">
      <h1 class="text-center">INPUT DATA</h1>
      <!-- Awal Card Form -->
      <div class="card mt-3">
        <div class="card-header bg-primary text-white">Form Input Data Pemilih</div>
        <div class="card-body">
          <form method="post" action=""> 
            <div class="form-group mb-2">
              <label>Nama</label>
              <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Input nama disini" required />
            </div>
            <div class="form-group mb-2">
              <label>NIS</label>
              <input type="text" name="tNIS" value="<?=@$vNIS?>" class="form-control" placeholder="Input NIS disini" required />
            </div>
            <div class="form-group mb-2">
              <label>NISN</label>
              <input type="text" name="tNISN" value="<?=@$vNISN?>" class="form-control" placeholder="Input NISN disini" required />
            </div>
            <button type="submit" class="btn btn-success mt-3" name="bsimpan" >Simpan</button>
            <button type="reset" class="btn btn-danger mt-3">Kosongkan</button>
			<a class="btn btn-primary mt-3 me-3" href="dashboard.php" role="button" style="position: absolute; right: 0;">kembali</a>
          </form>
        </div>
      </div>
      <!-- Akhir Card Form -->
      <!-- Awal Card Tabel -->
      <div class="card mt-3">
        <div class="card-header bg-success text-white">Daftar Pemilih</div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>NIS</th>
              <th>NISN</th>
              <th>Pilihan</th>
              <th>Aksi</th>
            </tr>
            <?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from pemilih order by id_siswa desc");
	    		while($data = mysqli_fetch_array($tampil)) :
	    	?>
            <tr>
              <td><?=$no++;?></td>
              <td><?=$data['nama_pemilih']?></td>
              <td><?=$data['NIS']?></td>
              <td><?=$data['NISN']?></td>
              <td><?=$data['pilihan']?></td>
              <td>
                <a href="pemilih.php?hal=edit&id=<?=$data['id_siswa']?>" class="btn"><i class="fas fa-edit bg-warning p-2 rounded"></i> </a>
                <a href="pemilih.php?hal=hapus&id=<?=$data['id_siswa']?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn"><i class="fas fa-trash-alt text-white bg-danger p-2 rounded"></i></a>
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

