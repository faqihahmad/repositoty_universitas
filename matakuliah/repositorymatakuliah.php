<?php 
	require_once "../koneksi/db.php";

	class repositorymatakuliah{
		private $db;
		private $rowCount;
		private $query = "SELECT * FROM matakuliah ORDER BY kodemakul";

		public function __construct()
		{
			$this->db = db::createConnection();
		}

		public function getAll()
		{
			$query = $this->db->prepare($this->query);
			$query->execute();
			$this->rowCount = $query->rowCount();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

		public function rowCount()
		{
			return $this->rowCount;
		}

		public function Delete($id)
		{
			$query = $this->db->prepare("DELETE FROM matakuliah WHERE id=? ");
			$query->bindParam(1,$id);
			return $query->execute();
		}

		public function getById($id)
		{
			$query = $this->db->prepare("SELECT * FROM matakuliah WHERE id = ?");
			$query->bindParam(1,$id);
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		}

		public function Save($kodemakul,$namamakul)
		{
			$sql = "INSERT INTO matakuliah(kodemakul,namamakul) VALUES(?,?)";
			$query = $this->db->prepare($sql);
			$query->bindParam(1,$kodemakul);
			$query->bindParam(2,$namamakul);
			

			return 	$query->execute();
		}

		public function Update($kodemakul,$namamakul,$id)
		{
			$sql = "UPDATE matakuliah SET kodemakul=?, namamakul=? WHERE id = ?";
			$query = $this->db->prepare($sql);
			$query->bindParam(1,$kodemakul);
			$query->bindParam(2,$namamakul);
			
			$query->bindParam(3,$id);
			return 	$query->execute();
		}

		public function getBycari($cari)
		{
			$query = $this->db->prepare("SELECT * FROM matakuliah WHERE kodemakul LIKE ? OR namamakul LIKE ?");
			$cari = "%".$cari."%";
			$query->bindParam(1,$katakunci);
			$query->bindParam(2,$katakunci);
			
			$query->execute();
			$this->rowCount = $query->rowCount();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

	}
?>