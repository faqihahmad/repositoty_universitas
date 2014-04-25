<?php
	require_once "repositorymatakuliah.php";
	$repo = new repositorymatakuliah();
	$rows = $repo->getById($_GET['id']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>edit</title>
</head>
<body>

<h1>edit mataluliah</h1>
	<form method="post">
		<input type="hidden" name="id" value="<?php echo $rows->id; ?>" />
		<div>
			<label>Kode makul</label>
			<input type="text" name="kodemakul" value="<?php echo $rows->kodemakul ?>">
		</div>

		<div>
			<label>Namamakul</label>
			<input type="text" name="namamakul" value="<?php echo $rows->namamakul ?>">
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
		$kodemakul = $_POST['kodemakul'];
		$namamakul = $_POST['namamakul'];
		

		$result = $repo->Update($kodemakul,$namamakul,$id);
		if ($result) 
		{
			header("location:index.php");
		}
		else
		{
			echo "gagal";
		}

	}