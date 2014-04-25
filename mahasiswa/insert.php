<?php
	require_once "repositorymahasiswa.php";
	$repo = new repositorymahasiswa();
?>

<!DOCTYPE html>
<html>
<head>
	<title>edit</title>
</head>
<body>

<h1>edit mahasiswa</h1>
	<form method="post">
		<input type="hidden" name="id">
		<div>
			<label>Nim</label>
			<input type="text" name="nim">
		</div>

		<div>
			<label>Nama</label>
			<input type="text" name="nama">
		</div>

		<div>
			<label>Inisial</label>
			<input type="text" name="inisial">
		</div>

		<div>
          <button type="submit">Simpan</button>
          <a href="index.php">Batal</a>
        </div>
	</form>

</body>
</html>


<?php 
	if ($_POST) 
	{
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$inisial = $_POST['inisial'];
		if ($nim !=null && $nama != null && $inisial != null) 
		{
			$result = $repo->save($nim,$nama,$inisial);

			if ($result) 
			{
				header("location:index.php");
			}
			else
			{
				echo "Data gagal ditambahkan";
			}
		}
		else
		{
			echo "Data belum di lengkapi !!";
		}
	}
?>