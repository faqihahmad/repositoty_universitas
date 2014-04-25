<?php
	require_once "repositorymatakuliah.php";
	$repo = new repositorymatakuliah();
?>

<!DOCTYPE html>
<html>
<head>
	<title>edit</title>
</head>
<body>

<h1>edit matakuliah</h1>
	<form method="post">
		<input type="hidden" name="id">
		<div>
			<label>kodemakul</label>
			<input type="text" name="kodemakul">
		</div>

		<div>
			<label>Namamakul</label>
			<input type="text" name="namamakul">
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
		$kodemakul = $_POST['kodemakul'];
		$namamakul = $_POST['namamakul'];
		
		if ($kodemakul !=null && $namamakul != null) 
		{
			$result = $repo->save($kodemakul,$namamakul);

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