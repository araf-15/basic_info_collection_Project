<?php
include "Main.php";
	class Teacher extends Main{
		protected $table = 'teacher_tbl';
		
		private $name;
		private $dept;
		private $age;


		public function setName($name){
			$this->name = $name;
		}

		public function setDept($dept){
			$this->dept = $dept;
		}

		public function setAge($age){
			$this->age = $age;
		}

		public function insert(){
			$sql = "INSERT INTO $this->table(name, dept, age) VALUES(:name, :dept, :age)";
			$stmt = DB::prepareOwn($sql);
			$stmt->bindParam(':name', $this->name);
			$stmt->bindParam(':dept', $this->dept);
			$stmt->bindParam(':age', $this->age);
			return $stmt->execute();
		}

		public function update($id){
			$sql = "UPDATE $this->table SET name= :name, dept= :dept, age = :age WHERE id = :id";
			$stmt = DB::prepareOwn($sql);
			$stmt->bindParam(':name', $this->name);
			$stmt->bindParam(':dept', $this->dept);
			$stmt->bindParam(':age', $this->age);
			$stmt->bindParam(':id', $id);
			return $stmt->execute();
		}
	}
?>