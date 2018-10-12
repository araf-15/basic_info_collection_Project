<?php
include "DB.php";
	 abstract class Main{
	 	protected $table;

	 	abstract public function insert();
	 	abstract public function update($id);
	 	
	 	public function readById($id){
			$sql = "SELECT *FROM $this->table WHERE id = :id";
			$stmt = DB::prepareOwn($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			return $stmt->fetch();
		}

		public function readAll(){
			$sql = "SELECT *FROM $this->table";
			$stmt = DB::prepareOwn($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		public function delete($id){
			$sql = "DELETE FROM $this->table WHERE id = :id";
			$stmt = DB::prepareOwn($sql);
			$stmt->bindParam(':id', $id);
			return $stmt->execute();
		}
	}

?>