<?php 

require_once "repositorymatakuliah.php";

$repo = new repositorymatakuliah();


if (isset($_GET['aksi']) and $_GET['aksi'] == 'hapus') 
	{
		if ($repo->delete($_GET['id'])) 
		{
			header("location:index.php");
		}
		else
		{
			echo "Data gagal di hapus";
		}
	}

if (isset($_GET['q'])) 
	{
		
		$result = $repo->getBycari($_GET['q']);
	}
	else
	{
		$result= $repo->getAll();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>datamahsiswa</title>
</head>
<body>
		<h1>datamatakuliah</h1>

		

		<div>	
			<a href="insert.php">tambah</a>
		</div>


		<table>
		<tr>
			<th>No.</th>
			<th>Kodemakul</th>
			<th>Namamakul</th>
			
			<th>Aksi</th>
		</tr>
		<?php
			$no = 1;
			foreach ($result as $row) 
			{
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row->kodemakul; ?></td>
			<td><?php echo $row->namamakul; ?></td>
			
			<td align="right">
				<a href="edit.php?id=<?php echo $row->id; ?>">edit</a>
				<a href="index.php?id=<?php echo $row->id; ?>&aksi=hapus" onclick="return confirm('Yakin akan di hapus');">hapus</a>
			</td>
		</tr>
		<?php 
			}
		?>
		
	</table>
</body>
</html>