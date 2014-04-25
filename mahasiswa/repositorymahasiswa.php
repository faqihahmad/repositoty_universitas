<?php 
	require_once "../koneksi/db.php";

	class repositorymahasiswa{
		private $db;
		private $rowCount;
		private $query = "SELECT * FROM mahasiswa ORDER BY nim";

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
			$query = $this->db->prepare("DELETE FROM mahasiswa WHERE id=? ");
			$query->bindParam(1,$id);
			return $query->execute();
		}

		public function getById($id)
		{
			$query = $this->db->prepare("SELECT * FROM mahasiswa WHERE id = ?");
			$query->bindParam(1,$id);
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		}

		public function Save($nim,$nama,$inisial)
		{
			$sql = "INSERT INTO mahasiswa(nim,nama,inisial) VALUES(?,?,?)";
			$query = $this->db->prepare($sql);
			$query->bindParam(1,$nim);
			$query->bindParam(2,$nama);
			$query->bindParam(3,$inisial);

			return 	$query->execute();
		}

		public function Update($nim,$nama,$inisial,$id)
		{
			$sql = "UPDATE mahasiswa SET nim=?, nama=?, inisial=? WHERE id = ?";
			$query = $this->db->prepare($sql);
			$query->bindParam(1,$nim);
			$query->bindParam(2,$nama);
			$query->bindParam(3,$inisial);
			$query->bindParam(4,$id);
			return 	$query->execute();
		}

		public function getBycari($cari)
		{
			$query = $this->db->prepare("SELECT * FROM mahasiswa WHERE nim LIKE ? OR nama LIKE ? OR inisial LIKE ?");
			$cari = "%".$cari."%";
			$query->bindParam(1,$katakunci);
			$query->bindParam(2,$katakunci);
			$query->bindParam(3,$katakunci);
			$query->execute();
			$this->rowCount = $query->rowCount();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

	}
?>