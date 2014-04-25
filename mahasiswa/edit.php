<?php
	require_once "repositorymahasiswa.php";
	$repo = new repositorymahasiswa();
	$rows = $repo->getById($_GET['id']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>edit</title>
</head>
<body>

<h1>edit mahasiswa</h1>
	<form method="post">
		<input type="hidden" name="id" value="<?php echo $rows->id; ?>" />
		<div>
			<label>Nim</label>
			<input type="text" name="nim" value="<?php echo $rows->nim ?>">
		</div>

		<div>
			<label>Nama</label>
			<input type="text" name="nama" value="<?php echo $rows->nama ?>">
		</div>

		<div>
			<label>Inisial</label>
			<input type="text" name="inisial" value="<?php echo $rows->inisial ?>">
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
		$id = $_POST['id'];
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$inisial = $_POST['inisial'];

		$result = $repo->Update($nim,$nama,$inisial,$id);
		if ($result) 
		{
			header("location:index.php");
		}
		else
		{
			echo "gagal";
		}

	}